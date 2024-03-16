<style>
body {
    padding-top: 60px; /* Adjust this value based on the height of your navbar */
    margin: 0;
}

#topnave {
    font-family: 'Delicious Handrawn', cursive!important;
    font-family: 'Roboto Slab', serifāā!important;
    margin: 0;                  
    padding: 10px;
    width: 80%;
	background-color:rgba(76,175,80,0.5);
    position: fixed;
    right: 0;
    top: 0;                                 
    height: auto;
    overflow: auto;
    z-index: 99999;
    transition: background-color 0.3s ease;
    box-sizing: border-box;
}
a.threeline{
	color:rgba(76,175,80);
	font-size:22px;
	display:inline-block;
	margin-left:5px;
}
a.view-website{
	color:rgba(0,0,0);
	font-size:19px;
	border:1px solid rgba(76,175,80);
	padding:0px 15px;
	margin-left:10px;
	display:inline-block;
}

/*---------------------*/
.main-profile{
	float:right;
	padding:0px!important;
	margin:0px!important;
	color:rgba(76,175,80);
}
.main-profile .one{
	padding: 0px 10px;
}
.main-profile .two{
	padding: 0px 10px;
}
.profile{
	float:right;
	border:2px solid rgba(76,175,80);
	width:40px;
	height:40px;
	border-radius:50%;
	font-size:26px;
	padding-left:10px;
	font-waight:bold;
	background-color:rgba(76,175,80,0.5);
	color:rgba(0,0,0);
	text-transform:capitalize;
	cursor:pointer;
}
/*---------------------------*/
.form-popup {
	font-family: 'Delicious Handrawn', cursive!important;
	font-family: 'Roboto Slab', serif!important;
	display: none;
	position: fixed;
	top: 70px;
	right: 10px;
	z-index: 9;
	-moz-box-shadow: 3px 3px 3px rgba(76,175,80,0.5);
    -webkit-box-shadow: 3px 3px 3px rgba(76,175,80,0.5);
    box-shadow: 3px 3px 5px rgba(76,175,80,0.5);
}
.form-container {
	max-width: 300px;
	padding: 10px;
	background-color:rgba(76,175,80);
}
.form-container table{
	color:rgba(0,0,0);
}
.form-container .table_title{
	color:rgba(2,90,40);
}
.form-container table tr td{
	padding: 10px 5px;
}
.probut{
	background:rgba(76,175,80);
	color:rgba(2,90,40);
	border: 1px solid rgba(2,90,40);
	font-size:17px;
	padding:5px;
	width:100%;
	display:block;
	text-align:center;
	outline: none;
	cursor: pointer;
	transition: .3s linear;
}
.probut:hover{
	color:rgba(255,255,255);
	background-color:rgba(2,90,40);
}
/* mobile view */
@media only screen and (max-width:600px) {
	a.view-website{
		font-size:15px;
		padding:0px 15px;
		margin-left:10px;
		margin-top:8px;
	}
	.mview{
		display:none!important;
	}
	.threeline{
		float:right;
	}
	.main-profile{
		float:left;
	}
	#topnave{
		width:100%;
	}
}
</style>
<div id="topnave">
	<a class="threeline" onclick="javascript:rmd()" style="cursor:pointer;"><i class="fa fa-bars" aria-hidden="true"></i></a>
	<a class="view-website" href="../index.php" target="_blank" >View Website</a>
	<div class="main-profile">
		<div class="mview" style="display:inline-block;font-size:13px;text-transform:capitalize;text-align:right">
		<div class="one"><?php echo $u_name; ?></div>
		<div class="two"><span style="font-waight:bold;color:rgba(0,0,0)">Type:</span> <?php echo $u_type; ?></div>
		</div>
		<div class="profile" onclick="profile()"><?php echo substr($u_name, 0, 1); ?></div>
	</div>
</div>




<div class="form-popup" id="profile_div">
  <div class="form-container">
    <table>
	     <tr style="background-color:rgba(76,175,80);color:rgba(255,255,255);text-align:center;">
			 <td colspan="2"> 
				 <i class="fa fa-user"></i>
				 &nbsp;User Profile
			 </td>
		 </tr>
		 <tr>
			 <td rowspan="2" height="50px" width="50px">
				 <img src="images/codelers-logo/logo-3.png" width="100%">
			 </td>
			 <td style="text-transform:capitalize;"> 
				 <span class="table_title">
				 Name&nbsp;:
				 </span>
				 <?php echo $u_name; ?>
			 </td>
		 </tr>
		 <tr>
			 <td style="text-transform:capitalize;"> 
				 <span class="table_title">
				 User type&nbsp;:
				 </span>
				 <?php echo $u_type; ?>
			 </td>
		 </tr>
		 <tr >
			 <td colspan="2">
				 <span class="table_title">
				 User name&nbsp;:
				 </span>
				 <?php echo $u_username; ?>
			 </td>
		 </tr>
		 <tr >
			 <td colspan="2">
				 <span class="table_title">
				 Password&nbsp;:
				 </span>
				 <?php echo $u_password; ?>
			 </td>
		 </tr>
		 <tr>
			 <td colspan="2">
				 <span class="table_title">
				 Login time&nbsp;:
				 </span>
				 <?php echo $login_time; ?>
			 </td>
		 </tr>
		 <tr>
			 <td width="50%">
				<a href="admin_settings_change_password.php" class="probut">Edit-Profile</a>
			 </td>
			 <td>
				<a href="admin_logout.php" class="probut">Logout</a>
			 </td>
		 </tr>
	 </table>
  </div>
</div>
<script>
function profile() {
  var x = document.getElementById("profile_div");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>