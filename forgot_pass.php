<?php
session_start();

include('smtp/PHPMailerAutoload.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kapil";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email exists in the database
    $checkEmailQuery = "SELECT * FROM tbl_user WHERE email = ?";
    $checkEmailStmt = $conn->prepare($checkEmailQuery);
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $result = $checkEmailStmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, generate and store OTP
        $otp = rand(100000, 999999);

        // Store the OTP in the reset_password_otp table
        $insertOtpQuery = "INSERT INTO reset_password_otp (email, otp) VALUES (?, ?)";
        $insertOtpStmt = $conn->prepare($insertOtpQuery);
        $insertOtpStmt->bind_param("si", $email, $otp);
        $insertOtpStmt->execute();

        // Store the email in the session
        $_SESSION['reset_email'] = $email;

        // Send OTP email
        $subject = "Password Reset OTP";
        $emailBody = "Your OTP for password reset is: $otp";
        smtp_mailer($email, $subject, $emailBody);

        // Redirect to OTP verification page
        header("Location: verify_reset_otp.php");
        exit();
    } else {
					echo $error['info'] = "<script>alert('Email does not exist. Please enter a valid email.')</script>";
    }

    $checkEmailStmt->close();
    $conn->close();
}

function smtp_mailer($to,$subject, $msg){
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "madhukachchawaop@gmail.com";//write sender email address
    $mail->Password = "mywmkqiphdnxntrc"; //write app password of sender email
    $mail->SetFrom("madhukachchawaop@gmail.com"); //write sender email address
    $mail->Subject = $subject;
    $mail->Body =$msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->Send()){
        echo $mail->ErrorInfo;
    }else{
        echo "We've sent 6 Digit OTP code to your email: ".$to;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            max-width: 300px;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: inline-block;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            display: inline-block;
			background: linear-gradient(109.6deg, rgba(0, 0, 0, 0.93) 11.2%, rgb(63, 61, 61) 78.9%);
        }
    </style>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Forgot Password</h2>
    <label for="email">Enter your email:</label>
    <input type="email" name="email" required>
    <button type="submit">Submit</button>
</form>

</body>
</html>
