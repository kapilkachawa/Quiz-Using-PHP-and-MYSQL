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
?>

<?php
if (isset($_GET['q_id'])) {
    $q_id = $_GET['q_id'];

    // Retrieve the count of questions
    $countSql = "SELECT COUNT(*) AS questionCount FROM tbl_question";
    $countResult = $con->query($countSql);
    $questionCount = 0;
    
    if ($countResult) {
        $row = $countResult->fetch_assoc();
        $questionCount = $row['questionCount'];
    }

    // Check if there are more than one question
    if ($questionCount > 1) {	
        // Delete the question from tbl_question
        $sql = "DELETE FROM tbl_question WHERE qid = $q_id";
        if ($con->query($sql) === TRUE) {
            // Question deleted successfully, you can redirect to the question list page
            header("Location: question_list.php");
            exit;
        } else {
            echo "Error deleting question: " . $con->error;
        }
    } else {
		echo '<script>
                alert("You can\'t delete the only question in this quiz.");
                window.location.href = "question_list.php?quiz_id='.$quiz_id.'";
              </script>';
    }
} else {
    echo "Invalid request";
}
?>
