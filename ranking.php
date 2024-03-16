<?php
include('public-index/user_info.php');
include('includes/config.php');
include('includes/source.php');

// Check if quiz is set in the URL parameters
if (isset($_GET['quiz'])) {
    $quizName = $_GET['quiz'];
    $userId = $_SESSION['userid'];

    // Check if difficulty is set in the URL parameters
    $difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : 'easy';

    // Fetch top 50 scores for the selected difficulty level from tbl_history
    $result = $con->query("SELECT * FROM tbl_history WHERE quiz_name = '$quizName' AND difficulty = '$difficulty' ORDER BY score DESC LIMIT 20");

} else {
    // Handle the case when no quiz is selected
    // You might redirect the user back to the home page or show an error message
    header("Location: index.php"); // Redirect to index.php
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8i6IuW6tWHvEyFDDJW/1FQxN2FqAD+2P5Cq5IHDxRFPlnG9AtREHxL4l" crossorigin="anonymous">

    <title>Trsonsoul Quiz</title>

    <style>
       body {
    font-family: 'Lemon', serif;
    background-color: #FBFBFB;
    margin: 0;
    padding: 0;
}

.container {
	    font-family: 'Lemon', serif;

    max-width: 1200px;
    margin: 20px auto; /* Adjusted margin to provide space around the container */
    padding: 20px;
    background-color: #fff; /* Added a background color to the container */
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
	    overflow-x: auto; /* Add horizontal scroll for smaller screens */

}

..button-section {
            display: flex;
            justify-content: space-between;
			            padding: 10px; /* Add some padding for spacing */
            margin-bottom: 20px; /* Adjusted margin to provide space between buttons and top of the container */

            padding: 10px; /* Add some padding for spacing */
        }

.button-53 {
    background-color: #88a4eb;
  border: 0 solid #E5E7EB;
  box-sizing: border-box;
  color: #000000;
  display: inline;
  font-size: 2	0px;
  font-weight: 700;
  justify-content: center;
  line-height: 1.75rem;
  text-align: center;
  width: 100%;
  margin-left:130px;
  max-width: 200px;
  cursor: pointer;
  transform: rotate(-2deg);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-53.active {
            background-color: #3DD1E7; /* Change background color for active state */
            color: #ffffff; /* Change text color for active state */
        }

.button-53:focus {
    outline: 0;
}

.button-53:after {
  content: '';
  position: absolute;
  border: 1px solid #000000;
  bottom: 4px;
  left: 4px;
  width: calc(100% - 1px);
  height: calc(100% - 1px);
}

.button-53:hover:after {
  bottom: 2px;
  left: 2px;
}

#rankingsTable {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Slightly darker shadow */
            border: 1px solid #ddd; /* Darker border color */
}

#rankingsTable th,
#rankingsTable td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #e1e1e1;
	            border: 1px solid #ddd; /* Darker border color */
					box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Slightly darker shadow */


	
}

#rankingsTable th {
    background-color: #88a4eb;
    color: #fff;
}

#rankingsTable tbody tr:hover {
    background-color: #f0f0f0;
}
h1{
	    font-family: 'Lemon', serif;]
		font-size:20px;
		text-align:center;

}
#rankingsTable tbody tr.top3 {
    background-color: #4caf50; /* Green color for the top 3 rankers */
    color: #fff;
}
 #rankingsTable tbody tr.current-user {
            background-color: #FF004D; /* Yellow color for the current user */
            color: white; /* Text color for the current user */
        }
		  #rankingsTable tbody tr .medal-icon {
            font-size: 20px; /* Adjust the font size as needed */
            margin-right: 5px; /* Adjust the spacing between the icon and text */
        }
		button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: ;
            border: 1px solid #3498db;
            border-radius: 5px;
            cursor: pointer;
        }
		
		  @media screen and (max-width: 768px) {
            .button-section {
                flex-direction: column;
                align-items: center;
            }

            .button-53 {
                width: 100px;
                margin: 5px 0;
            }
			 #rankingsTable th,
    #rankingsTable td {
        font-size: 12px; /* Adjust font size for smaller screens */
    }
	#rankingsTable td img.medal-icon {
        width: 20px; /* Adjust the width of the medal image for smaller screens */
        height: 20px; /* Adjust the height of the medal image for smaller screens */
    }
		  }
			
			

          
       
	
		

       


    </style>
</head>

<body>

    <div class="container">
        

        <h1>Quiz Rankings</h1>
		<div class="button-section">
            <form method="get" action="ranking.php">

                <input type="hidden" name="quiz" value="<?php echo $quizName; ?>">
                <button class="button-53 <?php echo $difficulty == 'easy' ? 'active' : ''; ?>" type="submit"
                    name="difficulty" value="easy">Easy</button>
       <button class="button-53 <?php echo $difficulty == 'normal' ? 'active' : ''; ?>" type="submit" name="difficulty" value="normal">Normal</button>
                <button class="button-53 <?php echo $difficulty == 'hard' ? 'active' : ''; ?>" type="submit"
                    name="difficulty" value="hard">Hard</button>
            </form>
        </div>
		

        <table id="rankingsTable">
            <thead>
                <tr>
                    <th> Rank </th>
                    <th> User </th>
                    <th> Quiz Name </th>
                    <th> Quiz Level </th>
                    <th> Score </th>
                </tr>
            </thead>
            <tbody>
                <?php
				 if ($result->num_rows > 0) {
                    // Loop through the results and display each row
                    $rank = 1;
                    while ($row = $result->fetch_assoc()) {
    $medalImage = ''; // Variable to store the HTML code for the medal image
                        switch ($rank) {
                            case 1:
            $medalImage = '<img src="image/gold.png" alt="Gold Medal" class="medal-icon" style="width: 40px; height: 40px;">';
                                break;
                            case 2:
            $medalImage = '<img src="image/silver.png" alt="Silver Medal" class="medal-icon" style="width: 40px; height: 40px;">';
                                break;
                            case 3:
            $medalImage = '<img src="image/bronze.png" alt="Silver Medal" class="medal-icon" style="width: 40px; height: 40px;">';
                                break;
                   
							}
                        echo "<tr>";
                        echo "<td>" . $rank .$medalImage. "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['quiz_name'] . "</td>";
                        echo "<td>" . $row['difficulty'] . "</td>";
                        echo "<td>" . $row['score'] . "</td>";
                        echo "</tr>";
                        $rank++;	
                    }
                } else {
                    echo '<tr><td colspan="5">No quiz history available.</td></tr>';
                }
				
				
                ?>
            </tbody>
        </table>
    </div>
	        <button><a href="home.php">Back to Quiz</a></button>

</body>

</html>
