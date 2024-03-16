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
.card-heading {
	box-shadow: 0 4px 8px 2px rgba(2,90,40,0.2);
	transition: 0.3s;
	width: 100%;
	border-radius: 10px;
	font-family: 'Delicious Handrawn', cursive;
	font-family: 'Roboto Slab', serif;
	padding:10px 15px;
	font-size:20px;
	font-waight:bold!important;
}
.card-heading i{
	margin-right:10px;
}
.card-heading a{
	color:rgba(2,90,40);
}
.card-heading:hover {
  box-shadow: 0 8px 16px 0 rgba(2,90,40,0.2);
}
</style>
</head>
<body>
<?php include('nav_bar.php');?>
<?php include('menu_bar.php');?>
<div class="futt" id="futt">
	<div class="row" style="width: 100%;margin: 0px;padding: 0px;margin-top: 0px">
		<div class="col-lg-6 col-md-6 col-12 p-2">
			<div class="card-heading">
				<a href="admin_settings_change_password.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-12 p-2">
		</div>
		<?php if($u_type != 'subadmin' AND $u_type != 'support' ){ ?>
		<div class="col-lg-6 col-md-6 col-12 p-2">
			<div class="card-heading">
				<a href="admin_settings_update_tax.php"><i class="fa fa-percent" aria-hidden="true"></i> Update Tax Value</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
</body>
</html>