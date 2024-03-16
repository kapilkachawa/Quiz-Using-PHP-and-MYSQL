<style>
@import url('https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto+Slab&display=swap');
.futt{
	 color: white;
	 padding-left: 21%;
	 padding-top: 70px;
	 padding-bottom: 50px;
	 width: 100%;
	 height: 100vh;
	 overflow: auto;
	 background: rgba(141,194,111,0.2);
}
.futt::-webkit-scrollbar {
     display: none;
}
.futt {
     -ms-overflow-style: none;
}
/*------------------------------*/
/*sid bar*/
.right-menu{
	margin: 0;
	padding: 0;
	width: 20%;
	background: rgba(141,194,111,0.2);
	position: fixed;
	top:0;
	left:0;
	height: 100%;
	overflow: auto;
	display:block;
	z-index:99999999;
}
.sid-image-logo{
	padding:10px;
	height:auto;
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);

	
}
.right-menu ul{
	list-style-type: none;
	margin: 0;
	padding: 0;
	height:85vh;
	padding-top:10px;
	overflow-y:scroll;
}
.right-menu ul::-webkit-scrollbar {
  width: 5px;
}
.right-menu ul::-webkit-scrollbar-track {
  background: rgba(240,240,240); 
}
.right-menu ul::-webkit-scrollbar-thumb {
  background: rgba(200,200,200); 
}
.right-menu ul::-webkit-scrollbar-thumb:hover {
  background: rgba(2,90,40); 
}

.right-menu ul li{
	padding: 4px 8px;
}
.right-menu ul li a {
	 display: block;
	 color: rgba(0,0,0);
	 padding: 8px 12px;
	 text-decoration: none;
	 background: rgba(76,175,80,0.5);
	 border-radius:10px;
	 font-size:17px;
	 font-family: 'Delicious Handrawn', cursive!important;
	 font-family: 'Roboto Slab', serif!important;
}
.right-menu ul li a i{
	 color: rgba(0,0,0);
	 margin-right:10px;
	 border:0px solid red;
	 padding:5px;
	 width:30px;
}
.right-menu ul li a:hover i{
	 color: #fff;
}
.right-menu ul li:last-child {
	 border-bottom: none;
}
.right-menu ul li a.active {
	 background-color: rgba(76,175,80);
	 color: white;
	 text-decoration: none;
}
.right-menu ul li a:hover:not(.active) {
     background-color: rgba(76,175,80);
     color: white;
	 text-decoration: none;
}
/*---------------------------------*/
/* mobile view */
@media only screen and (max-width:600px) {
	.right-menu{
		position:relative;
		width: 80%;
	}
	body {
		overflow-y: auto;
	}
	.right-menu{
		display:none;
		position:fixed;
		top:0;
		left:0;
		z-index:99999999;
	}
	.futt{
		 padding-left: 5px;
	}
}
</style>
<div id="rightmenu" class="right-menu">	
	<div class="sid-image-logo">
		<a href="admin.php">
		<img src="images/codelers-logo/logo-8.png" style="display: block;margin-left: auto;margin-right: auto;width:72%;" />
		</a>
	</div>
<ul>
	
	<li>
		<a class="active" id="menu" href="admin.php">
			 <i class="fa fa-dashboard" style="color: white!important;"></i>
			 <span>Dashboard</span>
		</a>
	</li>
	<li>
		<a href="admin_account_list.php">
			 <i class="fa fa-users"></i>
			 <span>Manage Account</span>
		</a> 
	</li>
	
	<li>
		<a href="home_quiz.php">
			<i class="fa fa-book"></i>
			<span>Total Quizs</span>
		</a>
	</li>
	
	
	
	<li>
		<a href="active_user.php">
			<i class="fa fa-user"></i>
			<span>Users</span>
		</a>
	</li>
	
	<li>
		<a href="quiz_list.php">
			<i class="fa fa-book"></i>
			<span>Quizes</span>
		</a>
	</li>
	
	<li>
		<a href="question_list.php">
			<i class="fa fa-book"></i>
			<span>Questions</span>
		</a>
	</li>
	
	<li>
		<a href="user_ranking.php">
			<i class="fa fa-medal"></i>
			<span>History</span>
		</a>
	</li>
	
	
	<li>
		<a href="admin_settings_list.php">
			<i class="fa fa-gear"></i>
			<span>Settings</span>
		</a>
	</li>
	<li>
		<a href="admin_logout.php">
			<i class="fa fa-sign-out"></i>
			<span>Logout</span>
		</a>
	</li>
	
	
</ul>
</div>
<script>
function rmd() {
  var x = document.getElementById("rightmenu");
  var y = document.getElementById("topnave");
  var z = document.getElementById("futt");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.style.width = "100%";
    z.style.paddingLeft = "5px";
  } else {
    x.style.display = "block";
	y.style.width = "80%";
	z.style.paddingLeft = "21%";
  }
}
</script>