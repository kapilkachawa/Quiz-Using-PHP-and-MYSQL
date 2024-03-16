<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['user_admin'])) {
    header("location: index.php");
    die();
}

date_default_timezone_set('Asia/Kolkata');
include('includes/source.php');
include('includes/function.php');
include('user_info.php');

$br = '\n';
$error = false;

if (isset($_POST['create'])) {
    $quiz_id = mysqli_real_escape_string($con, $_POST['quiz_id']); // Retrieve quiz_id
    $quiz_name = ''; // Define a variable for quiz_name (not present in the form)
	$level = mysqli_real_escape_string($con, $_POST['level']);
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $option_a = mysqli_real_escape_string($con, $_POST['option_a']);
    $option_b = mysqli_real_escape_string($con, $_POST['option_b']);
    $option_c = mysqli_real_escape_string($con, $_POST['option_c']);
    $option_d = mysqli_real_escape_string($con, $_POST['option_d']);
    $correct_ans = mysqli_real_escape_string($con, $_POST['correct_ans']);

    // You need to fetch the quiz_name from the database using $quiz_id, assuming there's a 'tbl_quizz' table
    $quiz_name_query = "SELECT quiz_name FROM tbl_quizz WHERE quiz_id = '$quiz_id'";
    $quiz_name_result = mysqli_query($con, $quiz_name_query);

    if ($quiz_name_result && $quiz_name_row = mysqli_fetch_assoc($quiz_name_result)) {
        $quiz_name = $quiz_name_row['quiz_name'];
    } else {
        // Handle the case where the quiz_name couldn't be retrieved.
        echo "Error fetching quiz name.";
        exit;
    }

    // Perform the SQL INSERT operation to add the question to the table
    $sql = "INSERT INTO tbl_question (quiz_id, difficulty, quiz_name, question, option_a, option_b, option_c, option_d, correct_ans) 
            VALUES ('$quiz_id','$level', '$quiz_name', '$question', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_ans')";

    if (mysqli_query($con, $sql)) {
        // Question added successfully
        // You can redirect or display a success message here
        header("location: question_list.php"); // Redirect to the question list page
    } else {
        // Error handling if the question couldn't be added
        echo "Error: " . mysqli_error($con);
    }
}
?>

<<!DOCTYPE html>
	<html xml:lang="en" lang="en">
	<head>
		<title>THE SYSTEM ADMINISTRATOR</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<style>
			.title_name {
				color: rgba(2, 90, 40);
				padding: 10px !important;
				font-family: 'Delicious Handrawn', cursive !important;
				font-family: 'Roboto Slab', serif !important;
			}

			.frm {
				font-family: 'Delicious Handrawn', cursive !important;
				font-family: 'Roboto Slab', serif !important;
			}

			.form-control {
				border: 1px solid rgba(2, 90, 40);
				color: rgba(2, 90, 40);
				border-radius: 0px;
				background-color: rgba(245, 245, 245);
			}
		</style>
	</head>
	<body>
	<?php include('nav_bar.php'); ?>
	<?php include('menu_bar.php'); ?>
	<div class="futt" id="futt">
		<div class="row" style="width: 100%; margin: 0px; padding: 0px;">
			<div class="col-lg-12 col-md-12 col-12" style="width: 100%; margin: 0px; padding: 0px;">
				<h3 class="p-4 title_name">ADD QUESTION</h3>
			</div>

			<div class="col-lg-6 col-md-12 col-12 frm">
				<form method="post" action="#">
			<div class="form-group">
					<label for="quiz_id">Select Quiz</label>
					<select name="quiz_id" id="quiz_id" class="form-control" required>
					<option value="" disabled selected>Select a Quiz</option>
					<?php
					// Fetch the list of quizzes from the database
					$quiz_query = "SELECT quiz_id, quiz_name FROM tbl_quizz";
					$quiz_result = mysqli_query($con, $quiz_query);

					while ($row = mysqli_fetch_assoc($quiz_result)) {
						echo "<option value='" . $row['quiz_id'] . "'>" . $row['quiz_name'] . "</option>";
					}
					?>
				</select>
			</div>
			
			
			<div class="form-group">
					<label for="level">Levels</label>
					<select class="form-control" name="level" id="level" required>
						<option value="" disabled selected>Select Difficulty</option>
						<option value="easy">easy</option>
						<option value="medium">medium</option>
						<option value="hard">hard</option>
					</select>
				</div>
			
			<div class="form-group">
					<label for="question">Question</label>
					<textarea name="question" id="question" class="form-control" placeholder="Enter Question" required></textarea>
				</div>
				<div class="form-group">
					<label for="option_a">Option A</label>
					<input type="text" name="option_a" id="option_a" class="form-control" placeholder="Enter Option A" required>
				</div>
				<div class="form-group">
					<label for="option_b">Option B</label>
					<input type="text" name="option_b" id="option_b" class="form-control" placeholder="Enter Option B" required>
				</div>
				<div class="form-group">
					<label for="option_c">Option C</label>
					<input type="text" name="option_c" id="option_c" class="form-control" placeholder="Enter Option C" required>
				</div>
				<div class="form-group">
					<label for="option_d">Option D</label>
					<input type="text" name="option_d" id="option_d" class="form-control" placeholder="Enter Option D" required>
				</div>
				<div class="form-group">
					<label for="correct_ans">Correct Answer</label>
					<select class="form-control" name="correct_ans" id="correct_ans" required>
						<option value="" disabled selected>Select correct answer</option>
						<option value="a">a</option>
						<option value="b">b</option>
						<option value="c">c</option>
						<option value="d">d</option>
					</select>
				</div>


					<button type="submit" name="create" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Add Question</button>
				</form>
			</div>
		</div>
	</div>
	</body>
	</html>
