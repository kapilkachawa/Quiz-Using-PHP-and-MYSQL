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
		<h3 class="p-4 title_name">NEW ACCOUNT</h3>
	</div>
	
	<div class="col-lg-6 col-md-12 col-12 frm">
		<form method="post" action="#">
			<div class="form-group">
				<span class="text-danger float-right mr-2">*</span>
				<input type="text" name="name" placeholder="Name"  class="form-control p-2" required /> 
			</div>
			
			<div class="form-group">
				<span class="text-danger float-right mr-2">*</span>
				<input type="text" name="username" placeholder="Username"  class="form-control p-2" required /> 
			</div>
			
			<div class="form-group">
				<span class="text-danger float-right mr-2">*</span>
				<input type="text" name="password" placeholder="Password"  class="form-control p-2" minlength="6" required /> 
			</div>
			
			<div class="form-group">
				<span class="text-danger float-right mr-2">*</span>
				<select class="form-control p-2" name="type" id="type" required>
					<option value="admin">Admin</option>
					<option value="subadmin">Sub Admin</option>
					<option value="support">Support</option>
				</select>
			</div>
			
			<button type="submit" name="create"class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Create Account</button>
		</form>	
	</div>
</div>
</div>
</body>
</html>
<?php
$br='\n';
$error = false;	
if (isset($_POST['create'])) {	
	$name  = $_POST['name'];
	$username  = $_POST['username'];
	$password  = convert_string('encrypt', $_POST['password']);
	$type  = $_POST['type'];

	if(empty($name)){
		echo $error['name'] = "<script>alert('Note: Name can not be empty!')</script>";
    }
	if(empty($username)){
		echo $error['username'] = "<script>alert('Note: Username can not be empty!')</script>";
    }
	if(empty($password)){
		echo $error['password'] = "<script>alert('Note: Password can not be empty!')</script>";
    }
	if(empty($type)){
		echo $error['type'] = "<script>alert('Note: User type can not be empty!')</script>";
    }
	
	if (!$error) 
	{
		if(!empty($name) &&!empty($username) && !empty($password) && !empty($type))
		{
			
			$sql = "SELECT * FROM tbl_admin WHERE username = '$username'";
			$res = mysqli_query($con, $sql);
			if (mysqli_num_rows($res) > 0) { 	
				 echo $error['already'] = "<script>alert(' Sorry...! $username $br username already taken.')</script>";
				 echo "<script>window.location='admin_account_new.php'</script>";
			}
			else{
				
				$query = "insert into tbl_admin(`name`, `username`, `password`, `type`) values('".$name."','".$username."','".$password."','".$type."')";
			
				if (mysqli_query($con, $query))
				{
					echo $error['info'] = "<script>alert(' Hi $name , $br Your Account Created..')</script>";
					echo "<script>window.location='admin_account_list.php'</script>";
				}	 
				else
				{
					echo $error['info'] = "<script>alert('Your Account Created Failed..')</script>";
				}
			}
		}
	}		
}		
?>