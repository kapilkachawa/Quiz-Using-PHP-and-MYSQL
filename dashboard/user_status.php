<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['user_admin'])) {
    header("location:index.php");
    die();
}
date_default_timezone_set('Asia/Kolkata');
include('includes/source.php');
include('includes/function.php');
include('user_info.php');

// Check if the form is submitted to update user status
if (isset($_POST['update_status'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $new_status = mysqli_real_escape_string($con, $_POST['new_status']);

    // Update user status in the database
    $update_query = "UPDATE tbl_user SET status = '$new_status' WHERE id = '$user_id'";
    $result = mysqli_query($con, $update_query);

    if ($result) {
        echo "<script>alert('User status updated successfully!')</script>";
    } else {
        echo "<script>alert('Error updating user status: " . mysqli_error($con) . "')</script>";
    }
}


$sql_query = "SELECT id, fname, lname, email, status FROM tbl_user";
$result = mysqli_query($con, $sql_query);




?>

<!DOCTYPE html>
<html xml:lang="en" lang="en">

<head>
    <title>THE SYSTEM ADMINISTRATOR</title>
    <style>
        .title_name {
            color: rgba(2, 90, 40);
            padding: 10px!important;
            font-family: 'Delicious Handrawn', cursive!important;
            font-family: 'Roboto Slab', serif!important;
        }

        .frm {
            font-family: 'Delicious Handrawn', cursive!important;
            font-family: 'Roboto Slab', serif!important;
        }

        .form-control {
            border: 1px solid rgba(2, 90, 40);
            color: rgba(2, 90, 40);
            border-radius: 0px;
            background-color: rgba(245, 245, 245);
        }

        #user-table {
            width: 100%;
            border-collapse: collapse;
        }

        #user-table th,
        #user-table td {
            border: 1px solid rgba(2, 90, 40);
            padding: 8px;
            text-align: left;
        }

        #user-table th {
            background-color: rgba(2, 90, 40);
            color: white;
        }

        #user-table tr:nth-child(even) {
            background-color: rgba(245, 245, 245);
        }
    </style>
</head>

<body>
    <?php include('nav_bar.php'); ?>
    <?php include('menu_bar.php'); ?>
    <div class="futt" id="futt">
        <div class="row" style="width: 100%; margin: 0px; padding: 0px;">
            <div class="col-lg-12 col-md-12 col-12" style="width: 100%; margin: 0px; padding: 0px;">
                <h3 class="p-4 title_name">Change User Status</h3>
            </div>

            <div class="col-lg-6 col-md-12 col-12 frm">
                <form method="post" action="#">
                    <div class="form-group">
                        <span class="text-danger float-right mr-2">*</span>
                        <input type="text" name="user_id" placeholder="User ID" class="form-control p-2" required />
                    </div>

                    <div class="form-group">
                        <span class="text-danger float-right mr-2">*</span>
                        <select class="form-control p-2" name="new_status" id="new_status" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <button type="submit" name="update_status" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Update Status</button>
                </form>
            </div>
        </div>
		
		
		<div class="col-lg-12 col-md-12 col-12 pl-2 pr-2" style="width: 100%; margin: 0px; padding: 0px;">
        <div style="width: 100%; overflow-x: auto;">
            <table id="customers" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 1;
                    while ($rows = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $rows['fname']; ?></td>
                            <td><?php echo $rows['lname']; ?></td>
                            <td><?php echo $rows['email']; ?></td>
                           
                            <td><?php echo $rows['status']; ?></td>
              
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
</body>

</html>
