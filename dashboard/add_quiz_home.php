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

// Check if the form is submitted
if (isset($_POST['add_card'])) {
    $languageName = mysqli_real_escape_string($con, $_POST['language_name']);
    $imageUrl = mysqli_real_escape_string($con, $_POST['image_url']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $quizName = mysqli_real_escape_string($con, $_POST['quiz_name']);

    $sql = "SELECT * FROM programming_languages WHERE language_name = '$languageName'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo $error['already'] = "<script>alert(' Sorry...! $languageName $br language_name already taken.')</script>";
        echo "<script>window.location='add_card.php'</script>";
    } else {
        $query = "INSERT INTO programming_languages (language_name, image_url, description, quiz_name) VALUES ('$languageName', '$imageUrl', '$description', '$quizName')";
		

        if (mysqli_query($con, $query)) {
            echo $error['info'] = "<script>alert(' Hi $languageName , $br Your Card Added..')</script>";
        } else {
            echo $error['info'] = "<script>alert('Failed to add the card.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
    <title>THE SYSTEM ADMINISTRATOR</title>
    <style>
        /* Your existing styles */
    </style>
</head>
<body>
<?php include('nav_bar.php'); ?>
<?php include('menu_bar.php'); ?>
<div class="futt" id="futt">
    <div class="row" style="width: 100%; margin: 0px; padding: 0px;">
        <div class="col-lg-12 col-md-12 col-12" style="width: 100%; margin: 0px; padding: 0px;">
            <h3 class="p-4 title_name">ADD CARD</h3>
        </div>

        <div class="col-lg-6 col-md-12 col-12 frm">
            <form method="post" action="#">
                <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <input type="text" name="language_name" placeholder="Enter Language Name" class="form-control p-2" required/>
                </div>

                <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <input type="text" name="image_url" placeholder="Enter Image URL" class="form-control p-2" required/>
                </div>

                <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <textarea name="description" placeholder="Enter Description" class="form-control p-2" required></textarea>
                </div>

                <div class="form-group">
                    <span class="text-danger float-right mr-2">*</span>
                    <input type="text" name="quiz_name" placeholder="Enter Quiz Name" class="form-control p-2" required/>
                </div>

                <button type="submit" name="add_card" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Add Card</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
