<?php

session_start();
	include('smtp/PHPMailerAutoload.php');


include('includes/config.php');
if(isset($_SESSION['user_acc']))
{
	header("location:index.php");
}
include('includes/source.php');
?>
<?php
$br='\n';
$error = false;	
if (isset($_POST['signup'])) {	
	$fname = mysqli_real_escape_string($con,$_POST['fname']);
	$lname = mysqli_real_escape_string($con,strtolower($_POST['lname']));
	$email = mysqli_real_escape_string($con,strtolower($_POST['email']));
	$password = mysqli_real_escape_string($con,strtolower($_POST['password']));
	
	$institute_name = mysqli_real_escape_string($con,strtolower($_POST['institute_name']));
	$current_edu = mysqli_real_escape_string($con,strtolower($_POST['current_edu']));
	$mobile_no = mysqli_real_escape_string($con,strtolower($_POST['mobile_no']));

	$status = 1;
	date_default_timezone_set('Asia/Kolkata');
	$create_date = date("d/m/Y");
	$create_time = date( 'h:i:s A', time () );
	
	$error = array();
	
	if(empty($fname)){
		echo $error['fname'] = "<script>alert('Note: first name can not be empty!')</script>";
    }
	if(empty($lname)){
		echo $error['lname'] = "<script>alert('Note: last name can not be empty!')</script>";
    }
	if(empty($email)){
		echo $error['email'] = "<script>alert('Note: Email can not be empty!')</script>";
    }
	if(empty($password)){
		echo $error['password'] = "<script>alert('Note: Password can not be empty!')</script>";
    }
	if(empty($institute_name)){
		echo $error['institute_name'] = "<script>alert('Note: institute name can not be empty!')</script>";
    }
	if(empty($current_edu)){
	echo $error['current_edu'] = "<script>alert('Note: current_edu can not be empty!')</script>";
    }
	if(empty($mobile_no)){
		echo $error['mobile_no'] = "<script>alert('Note: mobile_no can not be empty!')</script>";
    }
	
		
	if (!$error) 
	{
		if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($institute_name) && !empty($current_edu) &&  !empty($mobile_no) && !empty($status) && !empty($create_date) && !empty($create_time))
		{
			//fatch data check username already taken
			$sql_u = "SELECT * FROM tbl_user WHERE email = '$email'";
			$res_u = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($res_u) > 0) { 	
				 echo $error['already'] = "<script>alert(' Sorry...! $email$br This email are already account taken.')</script>";
				 echo "<script>window.location='register.php'</script>";
			}	
			else{
				//insert record in total room table
				
				$query = "INSERT INTO tbl_user(`fname`, `lname`, `email`, `password`, `institute_name`, `current_edu`, `past_edu`,gender, `mob`, `status`, `create_date`, `create_time`) VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$institute_name."','".$current_edu."','".$mobile_no."','".$status."','".$create_date."','".$create_time."') ";
				if (mysqli_query($con, $query))
				{
					echo $error['info'] = "<script>alert(' Hi $fname , $br Your Tronsoul Quiz Account Created Successfully..')</script>";
					echo "<script>window.location='login.php'</script>";

				}
				else{
					echo $error['info'] = "<script>alert('Account Created Failed..')</script>";
					echo "<script>window.location='register.php'</script>";
				}
			}
		}
	}		
}		
?>	
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <style>
	 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  justify-content: center;
  align-items: center;
  padding: 10px;
background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
}
.container{
  max-width: 700px;
  width: 100%;
  
	
  
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 150px;
  border-radius: 10px;
   background: linear-gradient(109.6deg, rgba(0, 0, 0, 0.93) 11.2%, rgb(63, 61, 61) 78.9%);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(109.6deg, rgba(0, 0, 0, 0.93) 11.2%, rgb(63, 61, 61) 78.9%);
   
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  }
 @media(max-width: 584px){
 .container{
  max-width: 95%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;

  }
}

	 
	 </style>
   </head>
<body>
<?php include('public-index/front-nav.php');?>   
				<?php include('preload.php');?>   
 



  <div class="container">
  
    <div class="title">Registration</div>
    <div class="content">
<form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First name</span>
<input type="text" id="fname" name="fname" placeholder="First Name" required /><br/>          
</div>
          <div class="input-box">
            <span class="details">Last name</span>
				<input type="text" id="lname" name="lname" placeholder="Last Name" required /><br/>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
<input type="email" id="email" name="email" placeholder="Email - support@tronsoul.com" required /><br/>          </div>
          <div class="input-box">
            <span class="details">Mobile Number</span>
				<input type="text"  id="mobile_no" name="mobile_no" onkeypress="return isNumber(event)" maxlength="10" placeholder="Mobile Number" required /><br/>
          </div>
          
		  <div class="input-box">
            <span class="details">Password</span>
<input type="password"  id="password" name="password" placeholder="Password" required />          
</div>
 
 
 




          <div class="input-box">
            <span class="details">Institute Name</span>
<input type="text" id="institute_name" name="institute_name" placeholder="Institute Name" required /><br/>          </div>
		  <div class="input-box">
            <span class="details">Current Education</span>
<input type="text"  id="current_edu" name="current_edu" placeholder="Current Education" required /><br/>          </div>
		  
        </div>
        
        <div class="button">
          <input type="submit" name="signup" value="Register">
        </div>
		<div class="signup-link">
                    Already have account please login? <a href="login.php">Login now</a>
                </div>
      </form>
    </div>
  </div>

</body>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

</script>

</html>
