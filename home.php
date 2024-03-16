		<?php 
		session_start();

$userId = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;


			include('includes/source.php');

		include('includes/config.php');
		$sql = "SELECT * FROM programming_languages";
		$result = $con->query($sql);
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>

		<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

		<title>Quiz Tronsoul</title>
		

		<style>
		
		
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
			margin: 0;
			padding: 0;
						transition: background-color 0.5s, color 0.5s;

		}
		  body.dark-mode {
				background-color: black;
				color: #fff;
			}

			body.light-mode {
				background-color: #F8F8FF;
				color: #333;
			}

		h1 {
			text-align: center;
			margin: 20px 0;
		}
		.card {
				background-color: #fff; /* Light mode background color */
				color: #333; /* Light mode text color */
			}

			body.dark-mode .card {
				background-color: #121212; /* Dark mode background color */
				color: #fff; /* Dark mode text color */
			}
		.sidebar {
			float: left;
			width: 250px;
			height: 100%;
			background-color: #333;
			color: #fff;
			padding-top: 20px;
		}
		.sidebar h2 {
			text-align: center;
			margin-bottom: 20px;
		}
		.sidebar ul {
			list-style-type: none;
			padding: 0;
		}
		.sidebar ul li {
			margin: 5px 0;
		}
		.sidebar ul li a {
			color: #fff;
			text-decoration: none;
			padding: 5px 15px;
			display: block;
		}
		.sidebar ul li a:hover {
			background-color: #444;
		}
		/* Content Styles */
		.content {
			margin-left: 260px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		.quiz-question {
			margin-bottom: 20px;
		}
		.quiz-options label {
			display: block;
			margin: 5px 0;
		}
		.quiz-submit-button {
			background-color: #007BFF;
			color: #fff;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
		}
		.quiz-submit-button:hover {
			background-color: #0056b3;
		}
		 .card-body {
					height: 450px; /* Adjust the height as needed */
					overflow: hidden;
					text-overflow: ellipsis;
					font-family: 'Lemon', serif;

				}
			 .checkbox {
				opacity: 0;
				position: absolute;
			}

			.checkbox-label {
				background-color: #111;
				width: 50px;
				height: 26px;
				border-radius: 50px;
				position: relative;
				padding: 5px;
				cursor: pointer;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.checkbox-label .fa-moon, .fa-sun {
				color: #fff;
			}

			.checkbox-label .ball {
				background-color: #fff;
				width: 22px;
				height: 22px;
				position: absolute;
				left: 2px;
				top: 2px;
				border-radius: 50%;
				transition: transform 0.2s linear;
			}

			.checkbox:checked + .checkbox-label .ball {
				transform: translateX(24px);
			}
			 .mr-3 {
				color: black; /* Light mode text color */
			}

			body.dark-mode .mr-3 {
				color: white; /* Dark mode text color */
			}
		

			</style>
		</head>
		<body class="scroll">
						<?php include('preload.php');?>   

		<?php include('public-index/nav.php');?>    

				

		
		
		
		

		<div class="row" style="width: 100%;margin: 0px;padding: 0px;margin-top:60px;">
		

			<?php
			// Loop through the database results and generate cards
			while ($row = $result->fetch_assoc()) {
				echo '<div class="col-lg-3 col-md-4 col-12 p-4">';
				echo '<div class="card">';
				echo '<div class="card-body">';
				echo '<h3 class="card-title">' . $row['language_name'] . '</h3>';
				echo '<img class="mt-4" src="' . $row['image_url'] . '" style="width:60%;display: block;margin-left: auto;margin-right: auto;">';
				echo '<p class="card-text mt-4">' . $row['description'] . '</p>';
				echo '<a href="level.php?quiz=' . $row['quiz_name'] . '" class="btn btn-primary">Let\'s Begin</a>';
				echo '</div></div></div>';
			}
			?>

		</div>
		
	 
					 



					 <?php include('footer.php'); ?>
				
		
		

		</body>
		</html>
