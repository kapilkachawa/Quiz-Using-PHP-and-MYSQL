<?php
session_start();

if (!isset($_SESSION['reset_email'])) {
    // Redirect to the forgot_pass.php page if the reset_email session variable is not set
    header("Location: forgot_pass.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST["otp"];

    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kapil";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_SESSION['reset_email'];

    // Check if the entered OTP is correct
    $checkOtpQuery = "SELECT * FROM reset_password_otp WHERE email = ? AND otp = ?";
    $checkOtpStmt = $conn->prepare($checkOtpQuery);
    $checkOtpStmt->bind_param("si", $email, $otp);
    $checkOtpStmt->execute();
    $result = $checkOtpStmt->get_result();

    if ($result->num_rows > 0) {
        // Correct OTP, proceed with resetting the password
        header("Location: reset_password.php");
        exit();
    } else {
        echo "Invalid OTP. Please enter the correct OTP.";
    }

    $checkOtpStmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP for Password Reset</title>
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

        p {
            color: #777;
            text-align: center;
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
    <h2>Verify OTP for Password Reset</h2>
    <p>Check your email for the OTP.</p>
    <label for="otp">Enter OTP:</label>
    <input type="text" name="otp" required>
    <button type="submit">Verify OTP</button>
</form>

</body>
</html>
