	<?php
	session_start();
	include('includes/config.php');
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<script type="text/javascript">
		window.history.forward();
		function noBack()
		{
			window.history.forward();
		}
	</script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Quiz</title>
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

		   *{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins', sans-serif;
		
	}

	body{
	//background: linear-gradient(108.1deg, rgb(167, 220, 225) 11.2%, rgb(217, 239, 242) 88.9%);	
				background-color: #88a4eb;

	}
	.back{
		border:1px solid #a1c4fd;
	}
	::selection{
		color: #fff;
		background: #007bff;
	}
	.quiz-container{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
					0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}




			.quiz-container {
				width: 550px;
		background: #fff;
		border-radius: 5px;
		transform: translate(-50%, -50%) scale(0.9);
		opacity: 2;
		transition: all 0.3s ease;
			}
			.quiz-container header{
		 position: relative;
		z-index: 2;
		height: 70px;
		padding: 0 30px;
		background: #fff;
		border-radius: 5px 5px 0 0;
		display: flex;
		align-items: center;
		justify-content: space-between;
		box-shadow: 0px 3px 5px 1px rgba(0,0,0,0.1);
		
	}
	.quiz-container header .title{
		font-size: 20px;
		font-weight: 600;
	}
	.quiz-container header .timer .time_left_txt{
		font-weight: 400;
		font-size: 17px;
		user-select: none;
	}

			h1 {
				text-align: center;
				color: #333;
			}

			p {
				text-align: center;
				color: #555;
			}
			
			.quiz-container header .timer{
		 color: #004085;
		background: #cce5ff;
		border: 1px solid #b8daff;
		height: 45px;
		padding: 0 8px;
		border-radius: 5px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		width: 170px;
	}

			#timer {
			 font-size: 18x;
		font-weight: 500;
		height: 30px;
		width: 80px;	
		color: #fff;
		border-radius: 5px;
		line-height: 30px;
		text-align: center;
		background: #343a40;
		border: 1px solid #343a40;
		user-select: none;
		
		
			}

			.question {
				font-size: 18px;
				font-weight: bold;
				text-align: center;
				margin: 10px 0;
					white-space: pre-line; /* Add this line */
						


			}

			

			.option {
    background: aliceblue;
    border: 1px solid #84c5fe;
    border-radius: 5px;
    padding: 8px 15px;
    font-size: 17px;
    margin-bottom: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.option:hover {
    color: #004085;
    background: #cce5ff;
    border: 1px solid #b8daff;
}

.option.selected {
    background-color: #007bff; /* Blue color for selected options */
    color: #fff;
}

.option.correct {
    background-color: #4caf50 !important; /* Green color for correct answers */
    color: #fff;
}

.option.incorrect {
    background-color: #ff5a5a !important; /* Red color for incorrect answers */
    color: #fff;
}

			section{
		padding: 25px 30px 20px 30px;
		background: #fff;
	}
	section .question-container{
		font-size: 25px;
		font-weight: 600;
	}

	section .selected-options{
		padding: 20px 0px;
		display: block;   
	}
	.question pre {
		background-color: #f8f8f8;
		padding: 10px;
		border: 1px solid #ddd;
		border-radius: 5px;
		font-family: 'Courier New', Courier, monospace;
		white-space: pre-wrap;
		word-wrap: break-word;
		overflow: auto;
		line-height: 1.5;
		font-size: 14px; /* Adjust the font size as needed */
		tab-size: 4;
		-moz-tab-size: 4;
	}

	.question code {
		display: block;
	}

	@media screen and (max-width: 768px) {
		.quiz-container header {
			height: 50px;
			padding: 0 15px;
		}

		.quiz-container header .title {
			font-size: 16px;
		}

		.quiz-container header .timer {
			height: 35px;
			padding: 0 5px;
			font-size: 14px;
		}
	}

	@media screen and (max-width: 600px) {
		.quiz-container {
			width: 100%; /* Adjusted width for smaller screens */
		}

		.quiz-container .question {
			font-size: 16px;
		}

		.quiz-container .options {
			margin-bottom: 15px;
		}

		.quiz-container .option {
			font-size: 14px;
		}

		input[type="submit"] {
			padding: 8px 15px;
			font-size: 14px;
		}
	}

		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.css" integrity="sha512-5Uwd+xj2kVh/oJSN/N08d9HbRh5RkoGWib7nY4I4r8Pu3n17AGryhNLp6AeL00LKmSb4HVIi8DYK8d2hnKFwHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js" integrity="sha512-BtUkmBNBUzzgZrFYzvCdZL23r9SbUGv8rwUtuSEb9H44Kev3v1YrrtI9e7x7U6n6sKEekGPTt8p3F1j8WRaJ8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</head>
	<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
	<div class="back">
	<?php


	if (isset($_GET['quiz'])) {
		$quizLanguage = $_GET['quiz'];
		$difficulty= $_GET['difficulty'];

		// Fetch quiz duration from the database
		$durationQuery = "SELECT duration FROM tbl_quizz WHERE quiz_name = '$quizLanguage' " ;
		$durationResult = mysqli_query($con, $durationQuery);

		if ($durationRow = mysqli_fetch_assoc($durationResult)) {
			$quizDuration = $durationRow['duration'];
		} else {
			$quizDuration = 600; // Default duration if not found
		}

		// Fetch questions from the database
		$query = "SELECT * FROM tbl_question WHERE quiz_name = '$quizLanguage'AND difficulty = '$difficulty'ORDER BY RAND() LIMIT 10";
		$result = mysqli_query($con, $query);

		// Check if there are questions
		if (mysqli_num_rows($result) > 0) {
			$questionsData = [];
			while ($row = mysqli_fetch_assoc($result)) {
				$questionsData[] = $row;
			}
		} else {
			echo '<script>alert("No questions found for the specified language.");</script>';
			echo "<script>window.location='home.php'</script>";
		}

		// Close the database connection
		mysqli_close($con);
	}
	?>
	<div class="quiz-container">
	<header>
		<div class="title">Quiz:<?php echo $quizLanguage." Difficulty:".$difficulty?></div>
		
		<div class="timer">
		<div class="time_left_txt">Time left: <span id="timer"></span></p>	</div>	
		</div>
		
<form method="post" id="quiz-form" action="submit_quiz.php?quiz=<?php echo $quizLanguage; ?>&difficulty=<?php echo $difficulty; ?>">
		</header>
		
		<section>
			<input type="hidden" id="question-index" value="0">
			
			


			<div id="question-container"></div>

			<!-- Add this hidden input field to store selected options -->
			<input type="hidden" id="selected-options" name="selected-options">
			
			</section>
			

			

		</form>
	</div>
	</div>
	<script>
		var quizDuration = <?php echo $quizDuration; ?>;
		var countdown = quizDuration;
		var questionsData = <?php echo json_encode($questionsData); ?>;
		var selectedOptions = {};
		var questionIndex = 0;

		function displayQuestion(index) {
			const questionContainer = document.getElementById("question-container");
			const currentQuestion = questionsData[index];

			if (currentQuestion) {
				const codeLines = currentQuestion.question.split(/(;|{|>|:)/g);
				const formattedCode = codeLines.map((line, index) => {
					if (index % 2 === 0) {
						return line;
					} else {
						return `${line}\n`;
					}
				}).join('');

				const questionHtml = `
					<div class="question">${index + 1}:
						<pre><code>${formattedCode}</code></pre>
					</div>
					<div class="options">
						<div class="option" id="option-a" onclick="selectOption('a')">${htmlspecialchars(`A: ${currentQuestion.option_a}`)}</div>
						<div class="option" id="option-b" onclick="selectOption('b')">${htmlspecialchars(`B: ${currentQuestion.option_b}`)}</div>
						<div class="option" id="option-c" onclick="selectOption('c')">${htmlspecialchars(`C: ${currentQuestion.option_c}`)}</div>
						<div class="option" id="option-d" onclick="selectOption('d')">${htmlspecialchars(`D: ${currentQuestion.option_d}`)}</div>
					</div>
				`;

				questionContainer.innerHTML = questionHtml;

				if (selectedOptions[currentQuestion.qid]) {
					const selectedOption = document.getElementById(`option-${selectedOptions[currentQuestion.qid]}`);
					if (selectedOption) {
						selectedOption.classList.add('selected');
					}
				}
				
			} else {
				questionContainer.innerHTML = "Quiz completed!";
				document.getElementById("quiz-form").style.display = "none";
			}
		}

		function htmlspecialchars(str) {
			return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
		}

	 function selectOption(option) {
        if (selectedOptions[questionsData[questionIndex].qid]) {
            return;
        }

        const selectedOption = document.getElementById(`option-${option}`);
        if (selectedOption) {
            selectedOptions[questionsData[questionIndex].qid] = option;
            document.getElementById("selected-options").value = JSON.stringify(selectedOptions);
            console.log("Selected Option:", option);

            const isCorrect = option === questionsData[questionIndex].correct_ans;

            // Remove 'selected', 'correct', 'incorrect' from all options
            document.querySelectorAll('.option').forEach((opt) => {
                opt.classList.remove('selected', 'correct', 'incorrect');
            });

            selectedOption.classList.add('selected');
            if (isCorrect) {
                selectedOption.classList.add('correct');
            } else {
                selectedOption.classList.add('incorrect');
                // Highlight the correct option if the selected one is incorrect
                const correctOption = document.getElementById(`option-${questionsData[questionIndex].correct_ans}`);
                if (correctOption) {
					
                    correctOption.classList.add('correct');
                }
            }

            setTimeout(() => {
                questionIndex++;
                document.getElementById("question-index").value = questionIndex;

                if (questionIndex < questionsData.length) {
                    displayQuestion(questionIndex);
                } else {
                    document.getElementById("quiz-form").submit();
                }
            }, 1000);
        }
    }

		function startTimer() {
			var timerInterval = setInterval(function () {
				countdown--;
				if (countdown <= 0) {
					clearInterval(timerInterval);
					window.location.href = 'home.php';
				} else {
					var minutes = Math.floor(countdown / 60);
					var seconds = countdown % 60;
					document.getElementById('timer').textContent = minutes + 'm ' + seconds + 's';
				}
			}, 1000);
		}

		startTimer();
		displayQuestion(0);
	</script>

	</body>
	</html>
