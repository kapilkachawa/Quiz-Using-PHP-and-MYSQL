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

if (isset($_POST['create'])) {
    $quiz_name = mysqli_real_escape_string($con, $_POST['qname']);
    $questions = mysqli_real_escape_string($con, $_POST['qquestion']);
    $right = mysqli_real_escape_string($con, $_POST['qrnum']);
    $wrong = mysqli_real_escape_string($con, $_POST['qwnum']);
	$duration = mysqli_real_escape_string($con, $_POST['duration']); // Added this line


    $sql = "SELECT * FROM tbl_quizz WHERE quiz_name = '$quiz_name'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo $error['already'] = "<script>alert(' Sorry...! $quiz_name $br quiz_name already taken.')</script>";
        echo "<script>window.location='add_quiz.php'</script>";
    } else {
		        $query = "INSERT INTO tbl_quizz(`quiz_name`, `total_question`, `right_ans`, `wrong_ans`, `duration`) VALUES('$quiz_name', '$questions', '$right', '$wrong', '$duration')";

 

        if (mysqli_query($con, $query)) {
            // Get the last inserted quiz ID (the 'id' column)
            $quiz_id = mysqli_insert_id($con);

            // Store the quiz ID in a session variable
            $_SESSION['quiz_id'] = $quiz_id;

            echo $error['info'] = "<script>alert(' Hi $quiz_name , $br Your Quiz Created..')</script>";
            echo "<script>window.location='add_question.php'</script>";
        } else {
            echo $error['info'] = "<script>alert('Your QUIZ Created Failed..')</script>";
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
    </style>
</head>
<body>
<?php include('nav_bar.php'); ?>
<?php include('menu_bar.php'); ?>
<div class="futt" id="futt">
    <div class="row" style="width: 100%; margin: 0px; padding: 0px;">
        <div class="col-lg-12 col-md-12 col-12" style="width: 100%; margin: 0px; padding: 0px;">
            <h3 class="p-4 title_name">ADD QUIZ</h3>
        </div>

        <div class="col-lg-6 col-md-12 col-12 frm">
            <form method="post" action="#">
               
			   <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <input type="text" name="qname" placeholder="Enter Quiz Name" class="form-control p-2" required/>
                </div>
				
				

                <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <input type="number" name="qquestion" placeholder="Enter No. of Questions"
                           class="form-control p-2" required/>
                </div>

                <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <input type="number" name="qrnum" placeholder="Each Correct Answer Point"
                           class="form-control p-2" minlength="6" required/>
                </div>

                <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <input type="number" name="qwnum" placeholder="Each Wrong Answer Point"
                           class="form-control p-2" minlength="6" required/>
                </div>
				
				<div class="form-group">
    <span class="text-danger float-right mr-2">*</span>
    <input type="number" name="duration" placeholder="Duration (in seconds)" class="form-control p-2" required />
</div>
				
                <button type="submit" name="create" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Create Quiz</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
