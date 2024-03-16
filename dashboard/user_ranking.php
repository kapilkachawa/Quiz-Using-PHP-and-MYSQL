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
?> 	
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
    <title>THE SYSTEM ADMINISTRATOR</title>
          <style>
        .title_name {
            color: rgba(76, 175, 80);
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

        #customers tr {
            color: black;
        }

        #customers td, #customers th {
            border: 1px solid rgba(76, 175, 80);
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: rgba(76, 175, 80, 0.2);
        }

        #customers tr:hover {
            background-color: rgba(76, 175, 80);
            color: white;
        }

        #customers tr:hover a {
            color: white;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgba(76, 175, 80);
            color: white;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>

	
</head>
<body>
<?php include('nav_bar.php'); ?>
<?php include('menu_bar.php'); ?>
<div class="futt" id="futt">
    <div class="row" style="width: 100%; margin: 0px; padding: 0px;">
        <div class="col-lg-6 col-md-12 col-12" style="width: 100%; margin: 0px; padding: 0px;">
            <h3 class="p-4 title_name">User Ranking</h3>
		</div>
		


        <div class="col-lg-12 col-md-12 col-12 pl-2 pr-2" style="width: 100%; margin: 0px; padding: 0px;">
            <div style="width: 100%; overflow-x: auto;">
                <table id="customers" class="table">
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>user id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Quiz Name</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    $user_query = "SELECT u.fname, u.lname, u.email, h.user_id, h.score, q.quiz_name
                                      FROM tbl_user u
                                      JOIN tbl_history h ON u.id = h.user_id
                                      JOIN tbl_quizz q ON h.quiz_name = q.quiz_name";

                    $result = mysqli_query($con,$user_query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>' . $x . '</td>';
                        echo '<td>' . $row['user_id'] . '</td>';
                        echo '<td>' . $row['fname'] . ' ' . $row['lname'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['quiz_name'] . '</td>';
                        echo '<td>' . $row['score'] . '</td>';
                        echo '</tr>';
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
