<?php
// Include your database connection configuration here (e.g., includes/config.php)
session_start();
include('includes/config.php');

if (!isset($_SESSION['user_admin'])) {
    header("location:index.php");
    die();
}

// Check if the quiz parameter is set in the POST request
if (isset($_POST['quiz'])) {
    $selectedQuiz = $_POST['quiz'];

    // SQL query to fetch questions for the selected quiz
    if ($selectedQuiz === 'all') {
        $sql_query = "SELECT * FROM tbl_question";
    } else {
        // Modify the query to filter by the selected quiz
        $sql_query = "SELECT * FROM tbl_question WHERE quiz_name = '$selectedQuiz'";
    }

    $result = mysqli_query($con, $sql_query);

    // Generate HTML table rows for the questions
    $output = "";
    $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $output .= "<tr>";
        $output .= "<td>$x</td>";
        $output .= "<td>{$rows['quiz_id']}</td>";
        $output .= "<td>{$rows['quiz_name']}</td>";
        $output .= "<td>{$rows['question']}</td>";
        $output .= "<td>{$rows['option_a']}</td>";
        $output .= "<td>{$rows['option_b']}</td>";
        $output .= "<td>{$rows['option_c']}</td>";
        $output .= "<td>{$rows['option_d']}</td>";
        $output .= "<td>{$rows['correct_ans']}</td>";
        $output .= "</tr>";
        $x++;
    }

    echo $output;
} else {
    echo "Invalid request"; // Handle invalid requests
}
?>
