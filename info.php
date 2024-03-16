<?php
// Check if quiz and difficulty are set in the URL parameters
if (isset($_GET['quiz']) && isset($_GET['difficulty'])) {
    $quizName =$_GET['quiz'];
    $difficulty =$_GET['difficulty'];

    // Use $quizName and $difficulty to fetch questions for the selected quiz from the database
    // You need to implement your own logic here or call a function that does this
} else {
    // Handle the case when no quiz or difficulty is selected
    // You might redirect the user back to the home page or show an error message
    header("Location: index.php"); // Redirect to index.php
    exit();
}

$qUrl = "q.php?quiz=".$quizName."&difficulty=" .$difficulty;
?>

<!DOCTYPE html> 	
<html lang="en">
<head>
    <script type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tronsoul Quiz</title>
      <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lemon', serif;
}

body {
    background-color: #88a4eb;
}

::selection {
    color: #fff;
    background: #007bff;
}

.info_box {
    width: 120%;
    max-width: 600px;
    background: #fff;
    border-radius: 5px;
    transform: translate(-50%, -50%) scale(0.9);
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
    position: absolute;
    top: 50%;
    left: 50%;
    border: 1px solid #004080; /* Darker border color */
}

.info_box.show {
    opacity: 1;
    pointer-events: auto;
    transform: translate(-50%, -50%) scale(1);
}

.info_box .info-title {
    height: auto; /* Set height to auto */
    width: 100%;
    border-bottom: 1px solid lightgrey;
    display: flex;
    flex-direction: column; /* Stack items vertically */
    align-items: center;
    justify-content: center;
    padding: 10px 30px; /* Adjust padding as needed */
    border-radius: 5px 5px 0 0;
    font-size: 40px;
    font-weight: 600;
}

.info_box .info-list {
    padding: 15px 30px;
}

.info_box .info-list .info {
    margin: 5px 0;
    font-size: 18px;
}

.info_box .info-list .info span {
    font-weight: 600;
    color: #007bff;
}

.info_box .buttons {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 0 30px;
    border-top: 1px solid lightgrey;
}

.info_box .buttons button {
    margin: 0 5px;
    height: 40px;
    width: 100px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    outline: none;
    border-radius: 5px;
    border: 1px solid #007bff;
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .info_box {
        width: 95%;
    }
    .info_box .info-list {
        padding: 10px;
        padding-right: 29px;
    }
    .info_box .info-list .info {
        font-size: 12px;
		line-height: 1.5;
		
    }
    .info_box .info-title {
        padding: 10px 50px; /* Adjust padding as needed */
		font-size:25px;
    }
    .info_box .buttons {
        padding: 0 10px;
    }
    .info_box .buttons button {
        font-size: 12px;
    }
}

@media (max-width: 600px) {
    .info_box .info-title {
        padding: 10px 20px; /* Adjust padding as needed */
    }
    .info_box .info-list {
        padding: 15px 20px;
    }
    .info_box .buttons {
        padding: 0 20px;
    }
    .info_box .buttons button {
        font-size: 14px;
        padding: 0 10px;
    }
}
    </style>
</head>
<body>
    <!-- Info Box -->
    <div class="info_box show">
        <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>Limited Time</span> for Quiz</div>
            <div class="info">2. Once you select your answer, The next Question Appear immediately</div>
            <div class="info">3. Each Level Contains 10 Questions</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
            <a href="home.php"><button class="quit">Exit Quiz</button></a>
            <a href="<?php echo $qUrl; ?>"><button class="restart">Start Quiz</button></a>
        </div>
    </div>
</body>
</html>
