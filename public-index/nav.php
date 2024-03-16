		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- Add Font Awesome library -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
			<style>
				* {
					padding: 0;
					margin: 0;
					text-decoration: none;
					list-style: none;
					box-sizing: border-box;
				}

				nav {
					background: #FBFBFB;
					height: 80px;
					width: 100%;
					overflow: hidden;
					position: fixed;
					top: 0;
					z-index: 9999999;
					border-bottom: 1px solid rgba(200, 200, 200);
					display: flex;
					justify-content: space-between;
					align-items: center;
				}

				.navbar-brand img {
					width: 250px;
					margin-right: 10px;
				}

				nav ul {
					font-family: 'Lemon', serif;
					display: flex;
					margin-top: 20px; /* Adjusted margin top */
					margin-right: 400px;
				}

				nav ul li {
					margin: 0 5px;
				}

				nav ul li a {
					color: black;
					font-size: 22px;
					padding: 7px 13px;
					border-radius: 3px;
					font-family: 'EB Garamond', serif;
				}

				.profile {
		margin-left: 20px;
					margin-right: 20px;
				  
					
					border-radius: 50%;
					font-size: 25px; /* Adjusted font size */
					font-weight: bold;
					background-color: #fff;
					color: rgba(0, 0, 0);
					text-align: center;
					line-height: 30px; /* Adjusted line height */
					cursor: pointer;
				}

				.checkbtn {
					font-size: 30px;
					color: black;
					float: right;
					cursor: pointer;
					display: none;
				}

				#check {
					display: none;
				}

				.form-popup {
					font-family: 'Delicious Handrawn', cursive!important;
					font-family: 'Roboto Slab', serif!important;
					display: none;
					
					position: fixed;
					top: 70px;
					right: 10px;
					z-index: 9;
					-moz-box-shadow: 3px 3px 3px;
					-webkit-box-shadow: 3px 3px 3px;
					box-shadow: 3px 3px 5px;
				}

				.form-container {
					max-width: 300px;
					padding: 10px;
					background-color: white;
				}

				.form-container table {
					color: rgba(0,0,0);
				}
				.form-container table tr td span {
				display: inline-block;
				min-width: 20px; /* Adjusted minimum width */
			}


				.form-container .table_title {
					color: blue;
					font-family:bold;
				}

				.form-container table tr td {
					padding: 10px 5px;
								vertical-align: top; /* Adjusted vertical alignment */

				}
				 .form-container table tr td .logbtn a button {
				width: 150px; /* Adjusted width */
				padding: 10px; /* Adjusted padding */
				font-size: 10px; /* Adjusted font size */
				background-color: blue; /* Green background color */
				color: white;
				margin-left:5px;
				border: none;
				border-radius: 5px;
				cursor: pointer;
			}
			
			@media (max-width: 952px) {
		label.logo {
		  font-size: 30px;
		  padding-left: 50px;
		}

		nav ul li a {
		  font-size: 16px;
		}
		 body.no-scroll {
		overflow: hidden;
	  }

	  #check:checked ~ body {
		overflow: hidden;
	  }
	   .body {
	position:fixed;
	  }

	  }

	  @media (max-width: 858px) {
		  
		.checkbtn {
		   display: block;
			font-size: 40px;
			color: black;
			float: right;
			margin-top: 10px; /* Add margin to the top */
			margin-left: 10px; /* Add margin to the left */
			cursor: pointer;
		}
		
		.navbar-brand img {
					width: 220px;
					margin-left: 20px;
					
				}

		

		ul {
		  position: fixed;
		  z-index: 1;
		  width: 100%;
		  height: 100vh;
		  background: white;
		  top: 80px;
		  left: -100%;
		  text-align: center;
		  transition: all .5s;
				  display: flex;

		  flex-direction: column; /* Change the direction to column */
			align-items: center; /* Center items horizontally */
			margin-top: 80px; /* Adjusted margin top */
		}
		
		

		nav ul li {
		  display: block;
		  margin: 50px 0;
		  line-height: 30px;
			  font-family: 'Lemon', serif;
			  text-align:center;

				  margin: 30px 0; /* Adjusted margin */

		  
		}

		nav ul li a {
		  font-size: 30px;
		text-align:center
		}

		a:hover,
		a.active {
		  background: none;
		  color: #0082e6;
		}

		#check:checked~ul {
		  left: 0;
		}

		body.no-scroll {
		overflow: hidden;
	  }

	  #check:checked ~ body {
		overflow: hidden;
	  }

	  section {
		background: white;
		background-size: cover;
		height: calc(100vh - 80px);
		display:overflow;


	  }
				

			   

			   

			</style>
			<title>Your Page Title</title>
		</head>
		<body>

		<nav>
			<input type="checkbox" id="check">
			<label for="check" class="checkbtn">
				<i class="fas fa-bars"></i>
			</label>
			<a class="navbar-brand" href="#"><img src="image/codelers-logo/logo-6.png" alt="Logo"></a>
			<ul>
				<li><a class="active" href="home.php">Home</a></li>
				<li><a href="history_quiz.php">History</a></li>
				<li><a href="ranking_info.php">Rankings</a></li>
				<li><a href="feedback.php">Feedback</a></li>
				<!--li><a href="logout.php">Logout</a></li-->
			</ul>
			<div class="profile" onclick="profile()">
				<i class="fas fa-user"></i>
			</div>
		</nav>
		<?php
// Include your database connection file here
include('includes/config.php'); 

// Initialize variables
$userData = [];
$totalQuizzes = 0;

// Check if user ID is provided
if(isset($userId)) {
    // Retrieve current user's information from tbl_user
    $sql_user = "SELECT fname, lname, email FROM tbl_user WHERE id = ?";
    $stmt_user = mysqli_prepare($con, $sql_user);
    mysqli_stmt_bind_param($stmt_user, "i", $userId);
    mysqli_stmt_execute($stmt_user);
    $result_user = mysqli_stmt_get_result($stmt_user);

    // Check if query was successful
    if ($result_user && mysqli_num_rows($result_user) > 0) {
        // Fetch user data
        $userData = mysqli_fetch_assoc($result_user);
    } else {
        // User not found or error executing query
        echo "User data not available.";
    }

    // Retrieve total quizzes played by the current user from tbl_history
    $sql_quiz_count = "SELECT COUNT(*) AS total_quizzes FROM tbl_history WHERE user_id = ?";
    $stmt_quiz_count = mysqli_prepare($con, $sql_quiz_count);
    mysqli_stmt_bind_param($stmt_quiz_count, "i", $userId);
    mysqli_stmt_execute($stmt_quiz_count);
    $result_quiz_count = mysqli_stmt_get_result($stmt_quiz_count);

    // Check if query was successful
    if ($result_quiz_count) {
        // Fetch total quizzes played
        $row_quiz_count = mysqli_fetch_assoc($result_quiz_count);
        $totalQuizzes = $row_quiz_count['total_quizzes'];
    } else {
        // Error executing query
        echo "Error fetching quiz count: " . mysqli_error($con);
    }
}
?>



		

		<div class="form-popup" id="profile_div">
			<div class="form-container">
				<table>
					<tr style="font-size:20px; text-align:center;">
						<td colspan="2">
						   
							&nbsp;User Profile
							
						</td>
					</tr>
					
					
					<tr>
						<td colspan="2">
							<span class="table_title">
								Name&nbsp;:
							</span>
							<?php 
                        if (isset($userData['fname']) && isset($userData['lname'])) {
                            echo $userData['fname'] . ' ' . $userData['lname']; 
                        } else {
                            echo "Name not available";
                        }
                    ?>
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<span class="table_title">
								Email&nbsp;:
							</span>
  <?php 
                        if (isset($userData['email'])) {
                            echo $userData['email']; 
                        } else {
                            echo "Email not available";
                        }
                    ?>						</td>
					</tr>
					
					
					
					<tr>
						<td colspan="2">
							<span class="table_title">
								Total Quizzes Played&nbsp;:
							</span>
<?php 
                        if (isset($totalQuizzes)) {
                            echo $totalQuizzes; 
                        } else {
                            echo "Quiz count not available";
                        }
                    ?>						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<span class="table_title">
							<div class="logbtn">
							<a href="logout.php"><button>logout</button></a>
							</div>
							</span>

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

		</body>
		</html>
