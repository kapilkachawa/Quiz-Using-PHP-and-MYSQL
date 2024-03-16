<?php
session_start();

if (!isset($_SESSION['reset_email'])) {
    // Redirect to the forgot_pass.php page if the reset_email session variable is not set
    header("Location: forgot_pass.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('New password and confirm password do not match. Please try again.')</script>";
    } else {
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

        // Hash the new password using MD5
        $hashedPassword = md5($newPassword);

        // Check if the new password is the same as the previous password
        $checkPreviousPasswordQuery = "SELECT password FROM tbl_user WHERE email = ?";
        $checkPreviousPasswordStmt = $conn->prepare($checkPreviousPasswordQuery);

        if (!$checkPreviousPasswordStmt) {
            die("Error preparing checkPreviousPasswordStmt: " . $conn->error);
        }

        $checkPreviousPasswordStmt->bind_param("s", $email);
        $checkPreviousPasswordStmt->execute();
        $checkPreviousPasswordStmt->store_result();

        if ($checkPreviousPasswordStmt->num_rows > 0) {
            $checkPreviousPasswordStmt->bind_result($previousPassword);
            $checkPreviousPasswordStmt->fetch();

            if ($hashedPassword === $previousPassword) {
                echo "<script>alert('You cannot reuse your previous password. Please choose a different one.')</script>";
                exit();
            }
        }

        // Update the password in the tbl_user table with the hashed password
        $updatePasswordQuery = "UPDATE tbl_user SET password = ? WHERE email = ?";
        $updatePasswordStmt = $conn->prepare($updatePasswordQuery);

        if (!$updatePasswordStmt) {
            die("Error preparing updatePasswordStmt: " . $conn->error);
        }

        $updatePasswordStmt->bind_param("ss", $hashedPassword, $email);
        $updatePasswordStmt->execute();

        // Clear the reset_email session variable
        unset($_SESSION['reset_email']);
        echo "<script>alert('Password updated successfully. You can now login with your new password.')</script>";
        echo "<script>window.location='login.php'</script>";
        $updatePasswordStmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        input[type="password"] {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Reset Password</h2>
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" required>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" required>

    <button type="submit">Reset Password</button>
</form>

</body>
</html>
