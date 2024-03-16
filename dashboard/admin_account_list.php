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
$sql_query = "SELECT * FROM tbl_admin";
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
   @media only screen and (max-width: 768px) {
            #customers tr {
                flex-direction: row;
                flex-wrap: wrap;
                margin-bottom: 0;
            }

            #customers td,
            #customers th {
                width: 10%;
                box-sizing: border-box;
            }
        }
</style>
</head>
<body>
<?php include('nav_bar.php');?>
<?php include('menu_bar.php');?>
<div class="futt" id="futt">
<div class="row" style="width: 100%;margin: 0px;padding: 0px;">
	<div class="col-lg-6 col-md-12 col-12" style="width: 100%;margin: 0px;padding: 0px;">
		<h3 class="p-4 title_name">ADMIN ACCOUNT LIST</h3>
	</div>
	
	<div class="col-lg-6 col-md-12 col-12" style="width: 100%;margin: 0px;padding: 0px;">
		<h3 class="title_name float-right"><a class="btn btn-dark" href="admin_account_new.php">Create New account</a></h3> 
	</div>
	
	<div class="col-lg-12 col-md-12 col-12 pl-2 pr-2" style="width: 100%;margin: 0px;padding: 0px;">
		<div style="width: 100%;overflow-x:auto;">
			<table id="customers" class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Username</th>
						<th>Password</th>
						<th>Type</th>
						<th>Action</th>
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
						<?php echo $rows['name']; ?>
					</td>
					<td>
						<?php echo $rows['username']; ?>
					</td>
					<td>
						<?php 
						    if($checkid=='1'){
							    echo convert_string('decrypt', $rows['password']);
					    	}
					    	else{ 
						        if($rows['id']==$checkid){
							        echo convert_string('decrypt', $rows['password']);
						        }
						        else{ 
						         echo '*****';
						        }
						    } 
						 ?>
					</td>
					<td>
						<?php echo $rows['type']; ?>
					</td>
					
					<td>
						<?php if($rows['id']==$u_id){ ?>
							<a href="admin_delete_admin.php?id=<?php echo convert_string('encrypt', $rows['id']);?>" onclick="return confirm('Are you sure want to delete this Admin Account?')" ><i class="fa fa-trash" aria-hidden="true"></i></a>
						<?php }else{ ?>
							<?php if($u_id=='1'){ ?>
							<a href="admin_delete_admin.php?id=<?php echo convert_string('encrypt', $rows['id']);?>" onclick="return confirm('Are you sure want to delete this Admin Account?')" ><i class="fa fa-trash" aria-hidden="true"></i></a>
							<?php } else { ?>
							NOT DELETE
						<?php } }?>
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