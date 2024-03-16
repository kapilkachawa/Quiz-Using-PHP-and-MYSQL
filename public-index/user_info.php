<?php 
session_start();

include('includes/config.php');
if(!isset($_SESSION['user_acc']))
{
	header("location:login.php");
}

if (!isset($_SESSION['userid'])) {
    // Redirect to index.php if the user is not logged in
    header("Location: index.php");
    exit();
}

include('includes/source.php');
include('preload.php');

if(isset($_SESSION['user_acc']))
{ 
	$user_id=$_SESSION['userid'];
	$sql_query = "SELECT * FROM tbl_user WHERE id = $user_id";
	$result = mysqli_query($con, $sql_query); 
	if(mysqli_num_rows($result)==1)
	{
	$rows=mysqli_fetch_array($result);
		$rows['id'];
		$rows['fname'];
		$rows['lname'];
		$rows['email'];
		$rows['status'];
	}
}
?>