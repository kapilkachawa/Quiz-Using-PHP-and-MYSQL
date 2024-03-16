<?php 
session_start();
include('includes/config.php');
if(isset($_SESSION['user_admin']))
{
	header("location:admin.php");
	die();
}
date_default_timezone_set('Asia/Kolkata');
include('includes/function.php');
include('includes/source.php');
?>
<html>
<head>
<title>THE SYSTEM ADMINISTRATOR Quiz</title>
<style>
.by{
	/*background: #76b852;*/
	background: rgba(141,194,111);
	/*font-family: "Roboto", sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale; */   
}
.login-page {
	width: 360px;
	padding: 8% 0 0;
	top:50%;
	left:50%;
	position:absolute;
	transform:translate(-50%,-50%);
}
.form {
	  position: relative;
	  z-index: 1;
	  background: #FFFFFF;
	  max-width: 360px;
	  margin: 0 auto 100px;
	  padding: 45px;
	  text-align: center;
	  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
	  font-family: "Roboto", sans-serif;
	  outline: 0;
	  background: #f2f2f2;
	  width: 100%;
	  border: 0;
	  margin: 0 0 15px;
	  padding: 15px;
	  box-sizing: border-box;
	  font-size: 14px;
}
.form button {
	  font-family: "Roboto", sans-serif;
	  text-transform: uppercase;
	  outline: 0;
	  background: #4CAF50;
	  width: 100%;
	  border: 0;
	  padding: 15px;
	  color: #FFFFFF;
	  font-size: 14px;
	  -webkit-transition: all 0.3 ease;
	  transition: all 0.3 ease;
	  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
	background: #43A047;
}
.form .message {
	margin: 15px 0 0;
	color: #b3b3b3;
	font-size: 12px;
}
.form .message a {
	color: #4CAF50;
	text-decoration: none;
}
.form .register-form {
	display: none;
}
</style>
</head>
<body class="by">
<div class="login-page">
	<div class="form">
		<form class="login-form" action="#" method="post" autocomplete="off">
			<input type="text" class="" name="username" id="user" placeholder="USERNAME" required />
		    <input type="password" class="" name="password" id="psw1" placeholder="PASSWORD" required />
		    <small><input type="checkbox" onclick="loginPassword()" class="" style="width: 20px; margin-right: 5px;">
		    <span class="top_link">Show Password</span></small>
		    <button type="submit" class="btn" name="btn_login" style="display:block;margin-top:10px;" >Login</button>
			<p class="message">Lost Password? <a href="#">Forgot password</a></p>
		</form>
	</div>
</div>
<?php
$error = false;	
if(isset($_POST['btn_login']))
{
	// get username and password
    $username = $_POST['username'];
    $password = convert_string('encrypt', $_POST['password']);
    $error = array();
    // check whether $username is empty or not
    if (empty($username)) {
		echo $error['username'] = "<script>alert('Note: Username can not be empty!')</script>";
	}
	if (empty($password)) {
		echo $error['password'] = "<script>alert('Note: Password can not be empty!')</script>";
	}
	if (!$error) 
	{
		if(!empty($username) && !empty($password) )
		{
           // get data from user table
			$sql_query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
			
			$result = mysqli_query($con, $sql_query);
	
			if(mysqli_num_rows($result)==1)
			{
				$rows=mysqli_fetch_array($result);

				$_SESSION['user_admin']=1;
				$_SESSION['adminid']=$rows['id'];
				date_default_timezone_set('Asia/Kolkata');
				$_SESSION['lt'] = date( 'h:i:s A', time () );
				//echo "<script>alert('yes')</script>";
				echo "<script>window.location='admin.php'</script>";
			}else 
			{
				echo "<script>alert('Invalid Username or Password!')</script>";
				echo "<script>window.location='index.php'</script>";
			}
		}               
	} 
}
?>	
<!--div class="about"><a href="https://tronsoultechnologies.com/" target="_blank" class="text-secondary">Design and developed by TronSoul Technologies</a></div-->
<script>
function loginPassword() {
  var x = document.getElementById("psw1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
<!--div class="desh">Powered by dBb Info tech<br>+91 9414458791</div-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>