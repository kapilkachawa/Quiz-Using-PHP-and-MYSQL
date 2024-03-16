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
<?php
$sql_query = "SELECT * FROM tbl_quizz";
$result = mysqli_query($con, $sql_query);
$checkid = $rows_gat_member_id['id'];
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<title>THE SYSTEM ADMINISTRATOR</title>
<style>
.title_name{
	color:rgba(76,175,80);
	padding: 10px!important;
	font-family: 'Delicious Handrawn', cursive!important;
	font-family: 'Roboto Slab', serif!important;
}
#customers {
	font-family: 'Delicious Handrawn', cursive!important;
	font-family: 'Roboto Slab', serif!important;
	border-collapse: collapse;
	width: 100%;
}
#customers tr{
	color: black;
}
#customers td, #customers th {
	border: 1px solid rgba(76,175,80);
	padding: 8px;
}
#customers tr:nth-child(even){background-color: rgba(76,175,80,0.2);}
#customers tr:hover {background-color: rgba(76,175,80);color:white}
#customers tr:hover a{color:white}
#customers th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: rgba(76,175,80);
	color: white;
}
</style>
</head>
<body>
<?php include('nav_bar.php');?>
<?php include('menu_bar.php');?>
<div class="futt" id="futt">
<div class="row" style="width: 100%;margin: 0px;padding: 0px;">
	<div class="col-lg-6 col-md-12 col-12" style="width: 100%;margin: 0px;padding: 0px;">
		<h3 class="p-4 title_name">Quiz LIST</h3>
	</div>
	
	<div class="col-lg-6 col-md-12 col-12" style="width: 100%;margin: 0px;padding: 0px;">
		<h3 class="title_name float-right"><a class="btn btn-dark" href="add_quiz.php">Create New Quiz</a></h3> 
	</div>
	
	<div class="col-lg-12 col-md-12 col-12 pl-2 pr-2" style="width: 100%;margin: 0px;padding: 0px;">
		<div style="width: 100%;overflow-x:auto;">
			<table id="customers" class="table">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Quiz Name</th>
						<th>Total Number of Questions</th>
						<th>Points ADD to Score On Right Answer</th>
						<th>Points Minus to Score On Wrong Answer</th>
						<th>Duration In Seconds</th>
						<th>Time</th>
						<th>Delete Quiz</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$x = 1;
					while($rows = mysqli_fetch_array($result)){
				?>
				<tr>
					<td>
						<?php echo $x; ?>
					</td>
					<td>
						<?php echo $rows['quiz_name']; ?>
					</td>
				
					
					<td>
						<?php echo $rows['total_question']; ?>
					</td>
					<td>
						<?php echo $rows['right_ans']; ?>
					</td>
					
					<td>
						<?php echo $rows['wrong_ans']; ?>
					</td>

					<td>
						<?php echo $rows['duration']; ?>
					</td>
					
					<td>
						<?php echo $rows['time']; ?>
					</td>
					<td>
					<a href="delete_quiz.php?id=<?php echo $rows["quiz_id"]; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php 
				$x++;
				}
				?>
				</tbody>
			</table>	
		</div>
	</div>
</div>
</div>
</body>
</html>