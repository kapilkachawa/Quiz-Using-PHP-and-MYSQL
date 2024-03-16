<?php
session_start();
include('includes/config.php');

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
include('includes/source.php');


$user_id = $_SESSION['userid'];

$historyQuery = $con->prepare("SELECT u.fname, u.lname, u.email, h.user_id, h.score, q.quiz_name, h.difficulty, h.attempt_date
                               FROM tbl_user u
                               JOIN tbl_history h ON u.id = h.user_id
                               JOIN tbl_quizz q ON h.quiz_name = q.quiz_name
                               WHERE u.id = ?
                               ORDER BY h.attempt_date DESC
                               LIMIT 10");

$historyQuery->bind_param("i", $user_id);
$historyQuery->execute();
$historyResult = $historyQuery->get_result();

if (!$historyResult) {
    die("Database query error: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz History</title>
    <style>
        body {
font-family: 'Lemon', serif;
            
        }

        .container {
			
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            padding: 20px;
            text-align: left;
			        margin: 100px auto; /* Center the container horizontally and add top margin */



        }

        h1 {
            font-size: 30px;
            color: #333;

        }

        .quiz-history-item {
            margin-bottom: 15px;
            padding: 15px;
            border: 4px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;

        }
		

        
    </style>
</head

<body>
	<?php include('public-index/nav.php');?>  
							<?php include('preload.php');?>   


	
	<div class="container">
	

        <h1>Quiz History</h1>

        <?php
        // Display the user's quiz history
        if (mysqli_num_rows($historyResult) > 0) {
            while ($row = mysqli_fetch_assoc($historyResult)) {
                echo '<div class="quiz-history-item">';
                echo '<strong>Name:</strong> ' . $row['fname'] . ' ' . $row['lname'] . '<br>';
                echo '<strong>Email:</strong> ' . $row['email'] . '<br>';
                echo '<strong>Quiz Name:</strong> ' . $row['quiz_name'] . '<br>';
				echo '<strong>Difficulty:</strong> ' . $row['difficulty'] . '<br>';

                echo '<strong>Score:</strong> ' . $row['score'] . '<br>';
                echo '<strong>Attempt Date:</strong> ' . $row['attempt_date'] . '<br>';
                echo '</div>';
            }
        } else {
            echo '<p>No quiz history available.</p>';
        }
        ?>

        <!-- Add a link back to the home page or any other page as needed -->
        <p><a href="home.php">Back to Home</a></p>
    </div>


    
</body>
</html>
