<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['user_admin'])) {
    header("location:index.php");
    die();
}

date_default_timezone_set('Asia/Kolkata');
include('includes/source.php');
include('includes/function.php');
include('user_info.php');

$br = '\n';
$error = false;

// Check if quiz_id is set in the session
if (!isset($_SESSION['quiz_id'])) {
    // Redirect to the add_quiz.php page or take appropriate action
    echo "<script>window.location='add_quiz.php'</script>";
    die();
}

// Fetch quiz ID from the session
$quizId = $_SESSION['quiz_id'];

// Fetch the total_question value from the database
$sql = "SELECT total_question, quiz_name FROM tbl_quizz WHERE quiz_id = $quizId";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $numQuestions = $row['total_question'];
	$quizName = $row['quiz_name'];

} else {
    // Handle the case where the quiz ID is not found or there's an error
     $numQuestions = 0; // Default to 0 questions or handle the error as needed
    $quizName = "";    // Default to an empty quiz name

}

if (isset($_POST['create'])) {
	    $level = isset($_POST['level']) ? mysqli_real_escape_string($con, $_POST['level']) : "";
    for ($i = 1; $i <= $numQuestions; $i++) {
        $question = isset($_POST['qns' . $i]) ? mysqli_real_escape_string($con, $_POST['qns' . $i]) : "";
        $optionA = isset($_POST[$i . '1']) ? mysqli_real_escape_string($con, $_POST[$i . '1']) : "";
        $optionB = isset($_POST[$i . '2']) ? mysqli_real_escape_string($con, $_POST[$i . '2']) : "";
        $optionC = isset($_POST[$i . '3']) ? mysqli_real_escape_string($con, $_POST[$i . '3']) : "";
        $optionD = isset($_POST[$i . '4']) ? mysqli_real_escape_string($con, $_POST[$i . '4']) : "";
        $correctAnswer = isset($_POST['ans' . $i]) ? mysqli_real_escape_string($con, $_POST['ans' . $i]) : "";

        // Insert the question into the database (modify the SQL query accordingly)
        $sql = "INSERT INTO tbl_question(quiz_id, quiz_name, difficulty ,question, option_a, option_b, option_c, option_d, correct_ans)
                VALUES ('$quizId', '$quizName','$level','$question', '$optionA', '$optionB', '$optionC', '$optionD', '$correctAnswer')";

        if (mysqli_query($con, $sql)) {
            echo '<script type="text/javascript">window.location.href="quiz_list.php"</script>';
        } else {
            echo "Error adding question $i: " . mysqli_error($con) . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
    <title>THE SYSTEM ADMINISTRATOR</title>
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

        /* Add CSS to push the question form down below the navigation bar */
        .question-container {
            margin-top: 60px; /* Adjust the value as needed to avoid overlapping */
        }
    </style>
</head>
<body>
<?php include('nav_bar.php'); ?>
<?php include('menu_bar.php'); ?>
<div class="futt" id="futt">
    <div class="row" style="width: 100%; margin: 0px; padding: 0px;">
        <div class="col-lg-12 col-md-12 col-12" style="width: 100%; margin: 0px; padding: 0px;">
            <h3 class="p-4 title_name">Add Questions For Quiz</h3>
        </div>
		
			


        <div class="col-lg-6 col-md-12 col-12 frm">
		<form method="post" action="#">
                <div class="form-group">
                    <label for="level">Levels</label>
                    <select class="form-control" name="level" id="level" required>
                        <option value="" disabled selected>Select Difficulty</option>
                        <option value="easy">Easy</option>
                        <option value="medium">Medium</option>
                        <option value="hard">Hard</option>
                    </select>
                </div>
                <?php
                for ($i = 1; $i <= $numQuestions; $i++) {
                    echo '<b style="color: black;">Question number&nbsp;' . $i . '&nbsp;:</b><br /><!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                                    <div class="col-md-12">
                                        <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" style="color: black;" placeholder="Write question number ' . $i . ' here..."></textarea>  
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                                <div class="col-md-12">
                                    <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                                <div class="col-md-12">
                                    <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                                <div class="col-md-12">
                                    <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                                <div class="col-md-12">
                                    <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                                </div>
                            </div>
                            <br />
                            <b>Correct answer</b>:<br />  
                            <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
                                <option value="a">Select answer for question ' . $i . '</option>
                                <option value="a"> option a</option>
                                <option value="b"> option b</option>
                                <option value="c"> option c</option>
                                <option value="d"> option d</option> 
                            </select><br /><br />';
                }
                ?>
                <!-- Add your form inputs here, if needed -->
                <button type="submit" name="create" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Add Questions
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
