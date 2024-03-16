<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredOTP = $_POST["otp"];
    $email = $_POST["email"];

    // Your database connection code here

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kapil";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the entered OTP is valid
    $checkOtpQuery = "SELECT * FROM otp_table WHERE email = ? AND otp = ? AND TIMESTAMPDIFF(MINUTE, timestamp, NOW()) < 5";
    $checkOtpStmt = $conn->prepare($checkOtpQuery);
    
    if (!$checkOtpStmt) {
        die("Error preparing checkOtpStmt: " . $conn->error);
    }
    
    $checkOtpStmt->bind_param("si", $email, $enteredOTP);
    $checkOtpStmt->execute();
    $result = $checkOtpStmt->get_result();

    if ($result->num_rows > 0) {
        // Valid OTP, perform further actions (e.g., complete the signup process)
        echo "OTP verified successfully. You can proceed with the signup.";
    } else {
        echo "Invalid OTP or OTP expired. Please try again.";
    }

    $checkOtpStmt->close();
    $conn->close();
}
?>

<h2>OTP Verification</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="otp">Enter OTP:</label>
    <input type="text" name="otp" required><br>

    <button type="submit">Verify OTP</button>
</form>

</body>
</html>
