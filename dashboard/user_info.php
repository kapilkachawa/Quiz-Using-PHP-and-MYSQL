<?php
$temp_id=$_SESSION['adminid'];
$login_time=$_SESSION['lt'];
$sql_gat_member = "SELECT * FROM tbl_admin WHERE id = '$temp_id'";
$result_sql_gat_member = mysqli_query($con, $sql_gat_member);
if(mysqli_num_rows($result_sql_gat_member)==1)
	{
		$rows_gat_member_id=mysqli_fetch_array($result_sql_gat_member);
			$u_id=$rows_gat_member_id['id'];
			$u_name= $rows_gat_member_id['name'];
			$u_username=$rows_gat_member_id['username'];
			$u_password=convert_string('decrypt', $rows_gat_member_id['password']);
			$u_type=$rows_gat_member_id['type'];
	}
?>