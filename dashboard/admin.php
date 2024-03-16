	<?php 
//$added_on=date('Y-m-d h:i:s');
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
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<title>THE SYSTEM ADMINISTRATOR</title>
<link rel="stylesheet" href="assets/css/dashboard_back.css">
<head>
<style>
/*----------------------------------------*/
.card {
	box-shadow: 0 4px 8px 0 rgba(76,175,80,0.2);
	transition: 0.3s;
	width: 100%;
	height: 150px;
	border-radius: 10px;
	font-family: 'Delicious Handrawn', cursive;
	font-family: 'Roboto Slab', serif;
	overflow:hidden;
	/*padding:15px 10px;*/
}
.card .card-info, h4{
	color:rgba(255,255,255);
	padding: 10px 20px;
	margin:0px;
	font-size:22px!important;
	font-family: 'Delicious Handrawn', cursive!important;
	font-family: 'Roboto Slab', serif!important;
}
.card .card-info, h1{
	text-align: center;
	color:rgba(255,255,255);
	font-size:26px!important;
	font-family: 'Delicious Handrawn', cursive;
	font-family: 'Roboto Slab', serif;
}
.card:hover {
	box-shadow: 0 8px 16px 0 rgba(76,175,80,0.2);
}
.card-heading {
	box-shadow: 0 4px 8px 2px rgba(76,175,80,0.2);
	transition: 0.3s;
	width: 100%;
	border-radius: 10px;
	font-family: 'Delicious Handrawn', cursive;
	font-family: 'Roboto Slab', serif;
	padding:10px 15px;
	font-size:26px;
	font-waight:bold!important;
	color:rgba(76,175,80);
}
.card-heading i{
	margin-right:10px;
}
.card-heading:hover {
  box-shadow: 0 8px 16px 0 rgba(76,175,80,0.2);
}
.card-info {
	box-shadow: 0 4px 8px 0 rgba(76,175,80,0.2);
	transition: 0.3s;
	width: 100%;
	overflow:hidden;
	height: 350px;
	border-radius: 10px;
	font-family: 'Delicious Handrawn', cursive;
	font-family: 'Roboto Slab', serif;
}
.card-info:hover {
  box-shadow: 0 8px 16px 0 rgba(76,175,80,0.2);
}
.card-salse {
	box-shadow: 0 4px 8px 0 rgba(76,175,80,0.2);
	transition: 0.3s;
	width: 100%;
	overflow:hidden;
	height: 250px;
	border-radius: 10px;
	font-family: 'Delicious Handrawn', cursive;
	font-family: 'Roboto Slab', serif;
}
.card-salse:hover {
  box-shadow: 0 8px 16px 0 rgba(76,175,80,0.2);
}
/*-----------------------------*/
.profile-short{
	border:2px solid rgba(222,143,146);
	width:40px;
	height:40px;
	border-radius:50%;
	font-size:24px;
	padding-left:10px;
	font-waight:bold;
	color:rgba(255,255,255);
	text-transform:capitalize;
	cursor:pointer;
}
.tbl_rb{
	font-family: 'Delicious Handrawn', cursive;
	font-family: 'Roboto Slab', serif;
}
/*---------------------------------*/
.od-list{
    overflow-y: scroll;
    height:250px;
    width:100%;
}
.od-list::-webkit-scrollbar {
     display: none;
}
.od-list {
     -ms-overflow-style: none;
}
</style>

</head>
<body>
<?php include('nav_bar.php');?>
<?php include('menu_bar.php');?>
<div class="futt" id="futt">
	<div class="row" style="width: 100%;margin: 0px;padding: 0px;margin-top: 0px">
		<div class="col-lg-12 col-md-6 col-12 p-2">
			<div class="card-heading">
				<i class="fa fa-calculator" aria-hidden="true"></i> Quick Total Info
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-12 p-2">
			<a href="admin_account_list.php">
			<div class="card card-1">
				<div class="card-color-1">
				<?php $count_total_category = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tbl_admin")); ?>
				<h4>Total Admins</h4>
				<h1><?php echo $count_total_category[0] ;?></h1>
				</div>
			</div>
			</a>
		</div>
		
		<div class="col-lg-3 col-md-6 col-12 p-2">
			<a href="active_user.php">
			<div class="card card-2">
				<div class="card-color-2">
				<?php $count_total_sub_category = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tbl_user	")); ?>
				<h4>Total Active Users</h4>
				<h1><?php echo $count_total_sub_category[0] ;?></h1>
				</div>
			</div>
			</a>
		</div>
		
		<div class="col-lg-3 col-md-6 col-12 p-2">
			<a href="quiz_list.php">
			<div class="card card-1">
				<div class="card-color-6">
				<?php $count_total_category = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM programming_languages")); ?>
				<h4>Available Quizes</h4>
				<h1><?php echo $count_total_category[0] ;?></h1>
				</div>
			</div>
			</a>
		</div>
		
		
		
		
		<div class="col-lg-3 col-md-6 col-12 p-2">
			<a href="quiz_list.php">
			<div class="card card-1">
				<div class="card-color-3">
				<?php $count_total_category = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tbl_quizz")); ?>
				<h4>Total Quizes</h4>
				<h1><?php echo $count_total_category[0] ;?></h1>
				</div>
			</div>
			</a>
		</div>
		
		<div class="col-lg-3 col-md-6 col-12 p-2">
			<a href="question_list.php">
			<div class="card card-2">
				<div class="card-color-4">
				<?php $count_total_sub_category = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tbl_question")); ?>
				<h4>Total Questions</h4>
				<h1><?php echo $count_total_sub_category[0] ;?></h1>
				</div>
			</div>
			</a>
		</div>
		
		<div class="col-lg-3 col-md-6 col-12 p-2">
			<a href="user_ranking.php">
			<div class="card card-2">
				<div class="card-color-5">
				<?php $count_total_sub_category = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tbl_history")); ?>
				<h4>Rankings</h4>
				<h1><?php echo $count_total_sub_category[0] ;?></h1>
				</div>
			</div>
			</a>
		</div
		
		
	</div>

</div>
</body>
</html>