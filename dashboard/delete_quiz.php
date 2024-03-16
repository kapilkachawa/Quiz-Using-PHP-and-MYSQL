<?php 
session_start();
include('includes/config.php');
if(!isset($_SESSION['user_admin']))
{
	header("location:index.php");
	die();
}
date_default_timezone_set('Asia/Kolkata');
include('includes/source.php');
include('includes/function.php');
include('user_info.php');
?>
<?php
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$quizId = $_SESSION['quiz_id'];

	// Delete the quiz from tbl_quizz
	$sql = "DELETE FROM tbl_quizz WHERE quiz_id = $id";
	if ($con->query($sql) === TRUE) {
		// If the quiz is deleted successfully, also delete related questions
		$sqlDeleteQuestions = "DELETE FROM tbl_question WHERE quiz_id = $id";
		$con->query($sqlDeleteQuestions);

		// Redirect to quiz_list.php
		header("Location: quiz_list.php");
		exit;
	} else {
		echo "Error deleting quiz: " . $con->error;
	}
} else {
	echo "Invalid request";
}
?>
