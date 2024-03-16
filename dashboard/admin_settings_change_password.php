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
include('includes/img_funcyion.php');
include('user_info.php');
?>

<?php
$sql_query = "SELECT * FROM tbl_admin WHERE id = $u_id";
$result = mysqli_query($con, $sql_query); 
	if(mysqli_num_rows($result)==1)
	{
		 $rows=mysqli_fetch_array($result);
			$change_name=$rows['name'];
			$change_password=convert_string('decrypt', $rows['password']);
	}
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<title>THE SYSTEM ADMINISTRATOR</title>
<style>
.title_name{
	color:rgba(2,90,40);
	padding: 10px!important;
	font-family: 'Delicious Handrawn', cursive!important;
	font-family: 'Roboto Slab', serif!important;
}
.frm{
	font-family: 'Delicious Handrawn', cursive!important;
	font-family: 'Roboto Slab', serif!important;
}
.form-control{
	border:1px solid rgba(2,90,40);
	color:rgba(2,90,40);
	border-radius:0px;
	background-color: rgba(245,245,245);
}
</style>
</head>
<body>
<?php include('nav_bar.php');?>
<?php include('menu_bar.php');?>
<div class="futt" id="futt">
<div class="row" style="width: 100%;margin: 0px;padding: 0px;">
	<div class="col-lg-12 col-md-12 col-12" style="width: 100%;margin: 0px;padding: 0px;">
		<h3 class="p-4 title_name">CHANGE PASSWORD FOR <span class="text-dark" style="font-size:22px;"><?php echo $change_name; ?></span></h3>
	</div>
	
	<div class="col-lg-6 col-md-12 col-12 frm">
		<form method="post" action="#" enctype="multipart/form-data">
			<div class="form-group">
				<span class="text-danger float-right mr-2">*</span>
				<input type="text" name="password" placeholder="Password"  class="form-control p-2" value="<?php echo $change_password; ?>" required /> 
			</div>
		
			<button type="submit" name="update" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Update Password</button>
		</form>	
	</div>
</div>
</div>
<?php
$br='\n';
$error = false;	
if (isset($_POST['update'])) {

	$password  = convert_string('encrypt', $_POST['password']);

	if(empty($password)){
		echo $error['password'] = "<script>alert('Note: Password can not be empty!')</script>";
	}
	
	if (!$error) 
	{
		if(!empty($password))
		{
			$query = "UPDATE tbl_admin SET password = '".$password."' WHERE id = $u_id";
			
			if (mysqli_query($con, $query))
			{
				echo $error['info'] = "<script>alert('Your password updated Successfully..')</script>";
				echo "<script>window.location='admin_settings_list.php'</script>";
			}	 
			else
			{
				echo $error['info'] = "<script>alert('Your password updated Failed..')</script>";
			}
		
		}
	}	
}		
?>
</body>
</html>