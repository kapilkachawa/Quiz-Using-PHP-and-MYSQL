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
	if (isset($_GET['id'])) {
		$id = convert_string('decrypt', $_GET['id']);
	} else {
		$id = "";
	}
	
	$tb_delete = "DELETE FROM tbl_admin WHERE id = $id";
	
	// if delete data success back to reservation page		
	if (mysqli_query($con, $tb_delete)) {
		 echo "<script>window.location='admin_account_list.php'</script>";
	} 
?>