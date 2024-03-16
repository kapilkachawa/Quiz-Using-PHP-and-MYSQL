<!DOCTYPE html>
<html>
<head>
    <title>Quiz App Feedback</title>
    <style>
        body {
    font-family: 'Lemon', serif;
            background-color: #f4f4f4;
			    background: #e0f2f1; /* Light blue background color */

            margin: 0;
            padding: 0;
        }

        .container {
            border: 1px solid #f4f4f4;
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
			
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;

        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }	

        textarea {
            height: 100px;
			    resize: none; /* Disable resizing */

			
        }

        input[type="submit"] {
            background-color: #00bcd4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #008ba3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Feedback Form</h2>
        <form id="feedbackForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="feedback">Feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kapil";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters
        $name = $_POST['name'];
        $email = $_POST['email'];
        $feedback = $_POST['feedback'];

        $sql = "INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $feedback);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            echo "<script>alert('Thank you for your feedback!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
