<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Result</title>
    <style>
     body {
font-family: 'Lemon', serif;
        background-color: #88a4eb !important; /* Add !important */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
			
        }

        .quiz-result {
            font-family: 'CursiveFont', Arial, sans-serif;
            background-color: white;
            border: 1px solid #ccc;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 800px;
        }

        h1 {
			font-family: 'Lemon', serif;
            font-size: 36px;
            color: #333;
			    margin-bottom: 20px; /* Improved spacing below heading */

        }


        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            display: block;
            margin: auto;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
		hr {
            
            background: black;

            
        }

        /* Additional styles for result details */
        .result-detail {
			font-family: 'Lemon', serif;
            font-size: 20px;
            text-align: left;
			padding-bottom:10px;
        }

        .result-detail span {
            float: right;
            padding-right: 30px;
        }

        .result-detail .right-point {
            color: darkgreen;
        }

        .result-detail .wrong-point {
            color: red;
        }

        .result-detail .total-questions {
            color: #66CCFF;
        }

        .result-detail .correct-answers {
            color: green;
        }

        .result-detail .wrong-answers {
            color: red;
        }

        .result-detail .total-score {
            float: right;
            padding-right: 30px;
        }
		 @media screen and (max-width: 768px) {
            .quiz-result {
                width: 90%;
            }

            .result-detail{
               
            font-size: 40px;
            text-align: left;
			padding-bottom:10px;
            }

            input[type="submit"] {
                padding: 8px 20px;
                font-size: 14px;
            }
        }

        @media screen and (max-width: 600px) {
            .quiz-result {
				        background-color: white !important; /* Add !important */

                width: 90%;
            }

            h1 {
                font-size: 24px;
            }

            .result-detail {
                font-size: 16px;
            }

            input[type="submit"] {
                padding: 8px 15px;
                font-size: 12px;
            }
        }
</style>

</head>
<body>
	
    <div class="quiz-result">
        <h1>Quiz Result</h1>

  
        <?php
session_start();
include('includes/config.php');
include('includes/source.php');


// Initialize the total score, quizLanguage, and additional variables
$totalScore = 0;
$totalQuestions = 0;
$correctAnswersCount = 0;
$wrongAnswersCount = 0;
$quizLanguage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected options from the hidden field
    $selectedOptionsJson = $_POST['selected-options'];
    $selectedOptions = json_decode($selectedOptionsJson, true);
	
	
	if (isset($_GET['quiz']) && isset($_GET['difficulty'])) {
    $quizName = $_GET['quiz'];
    $difficulty = $_GET['difficulty'];

    // Rest of your code here
} else {
    // Handle the case when quiz or difficulty is not set
    echo '<p>Error: Quiz or difficulty not specified.</p>';
    exit(); // Stop script execution
}
	
	

    // Check if $selectedOptions is set and not null
    if (isset($selectedOptions) && is_array($selectedOptions)) {
        // Loop through each question
        foreach ($selectedOptions as $questionNumber => $userAnswer) {
            // Sanitize the question number to prevent SQL injection
            $questionNumber = mysqli_real_escape_string($con, $questionNumber);

            // Retrieve the correct answer and scoring information from the database for the current question
            $query = "SELECT correct_ans, quiz_id, quiz_name FROM tbl_question WHERE qid = $questionNumber";
            $result = mysqli_query($con, $query);

            if (!$result) {
                die("Database query error: " . mysqli_error($con)); // Add error handling
            }

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $correctAnswer = strtolower($row['correct_ans']); // Convert correct answer to lowercase

                // Get the right_ans and wrong_ans points from tbl_quizz
                $quizId = $row['quiz_id'];
                $quizQuery = "SELECT right_ans, wrong_ans FROM tbl_quizz WHERE quiz_id = $quizId";
                $quizResult = mysqli_query($con, $quizQuery);

                if (!$quizResult) {
                    die("Database query error: " . mysqli_error($con)); // Add error handling
                }

                if (mysqli_num_rows($quizResult) > 0) {
                    $quizRow = mysqli_fetch_assoc($quizResult);
                    $rightAnswerPoints = $quizRow['right_ans'];
                    $wrongAnswerPoints = $quizRow['wrong_ans'];

                    // Check if the user answer is correct and update the counts and total score
                    $totalQuestions++;
                    if (strtolower($userAnswer) === $correctAnswer) {
                        $totalScore += $rightAnswerPoints;
                        $correctAnswersCount++;
                    } else {
                        $totalScore -= $wrongAnswerPoints;
                        $wrongAnswersCount++;
                    }

                    // Set the quizLanguage
                    $quizLanguage = $row['quiz_name'];
                }
            }
        }

        if ($totalQuestions > 0) {
            // Retrieve user information from tbl_user
            $userId = $_SESSION['userid'];
            $userQuery = "SELECT fname ,lname, email FROM tbl_user WHERE id = $userId";
            $userResult = mysqli_query($con, $userQuery);

            if (!$userResult) {
                die("Database query error: " . mysqli_error($con)); // Add error handling
            }
if (mysqli_num_rows($userResult) > 0) {
        $userRow = mysqli_fetch_assoc($userResult);
        $firstName = $userRow['fname'];
        $lastName = $userRow['lname'];
        $userEmail = $userRow['email'];

        // Combine first name and last name to create the username
        $userName = $firstName . ' ' . $lastName;

        // Insert user information and quiz result into tbl_history
        $insertHistoryQuery = $con->prepare("INSERT INTO tbl_history (user_id, quiz_name, score, username, email, difficulty) VALUES (?, ?, ?, ?, ?, ?)");
            $insertHistoryQuery->bind_param("isssss", $userId, $quizLanguage, $totalScore, $userName, $userEmail, $difficulty);
            $insertHistoryQuery->execute();
            $insertHistoryQuery->close();

    }
}


                // Display additional information in the quiz result box
				  echo '<div class="result-detail">Right Answer Point: <span class="right-point">+' . $rightAnswerPoints . '</span></div>';
        echo '<div class="result-detail">Wrong Answers Point: <span class="wrong-point">-' . $wrongAnswerPoints . '</span></div>';
        echo '<div class="result-detail">Total Questions: <span class="total-questions">' . $totalQuestions . '</span></div>';
        echo '<div class="result-detail">Correct Answers: <span class="correct-answers">' . $correctAnswersCount . '</span></div>';
        echo '<div class="result-detail">Wrong Answers: <span class="wrong-answers">' . $wrongAnswersCount . '</span></div>';
		echo '<hr>'; // Add a horizontal line after "Wrong Answers"

        echo '<div class="result-detail" style="font-weight: bold;
">Your total score: <span class="total-score">' . $totalScore . '</span></div>';
		echo '<hr>'; // Add a horizontal line after "Wrong Answers"

            } else {
                echo '<p>There was an error processing your quiz results.</p>';
            }
        }

        // Display "Exit Quiz" and "Try Again" buttons
         echo '<div class="button-container">';
		 echo '<a href="home.php"><input type="submit" value="Exit Quiz"></a>';
        ?>
    </div>
</body>
</html>
