<?php
if (isset($_GET['quiz'])) {
    $quizName = $_GET['quiz'];
    // Use $quizName to fetch questions for the selected quiz from the database
    // You need to implement your own logic here or call a function that does this
} else {
    // Handle the case when no quiz is selected
    // You might redirect the user back to the home page or show an error message
}
$qUrl = "q.php?quiz=" . urlencode($quizName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tronsoul Quiz</title>
    <style>
	
	body {
  margin: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
  


}
* {
	font-family: 'Lemon', serif;

	
}

.product__resources {
  /*margin: 60px 0 30px;*/
  background: #fafafa;
  width: 100vw;
  padding: 0 0 60px;
}
.product__resources .product__cont {
  width: 100%;
  max-width: 1200px;
  margin: auto;
  padding: 30px 0;
}
.product__cont h2 {
  text-align: center;
  margin: 0 0 40px;
  color: #003A79;
}
.product__resources__item {
  float: left;
  box-sizing: border-box;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.15);
  margin: 15px;
  width:100%;
  -webkit-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.15);
  background: #fff;
}
.product__resources__item__img {
  height: 200px;
  width: calc(100% - 60px	);
  position: relative;
  left: 30px;
  top: -30px;
  background-size: cover !important;
  background-position: center !important;
}
.product__resources__item h3 {
  padding: 0 30px;
  color: #003A79;
}
.product__resources__item p {
  padding: 0 30px;
  line-height: 1.45;
}
a.article-Button {
  padding: 15px 78px 15px 30px;
  margin: 15px 30px -25px 0px;
  border-radius: 30px;
  text-align: center;
  vertical-align: middle;
  text-transform: uppercase;
  font-size: 20px;
  font-style: italic;
  color: #ffffff;
  transition: all 0.3s linear;
  text-decoration: none;
  width: auto;
  background-color: #003A79;
  
  float: right;
}
	
.product__resources__item:hover {
  -webkit-transform: scale(1.02);
  -ms-transform: scale(1.02);
  transform: scale(1.02);
  -webkit-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.15);
  box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.15);
}
	


@media screen and (max-width: 768px) {
  body {
    height: 100%;
  }
  .product__resources__item {
    width:80%;
    margin: 10px 0 50px;
	margin-left:40px;
    display: block;
  }
  a.article-Button {
  padding: 10px 60px;
                border-radius: 50px;
                width: auto;
                float: none;
                margin: 5px 5px;
				
}

}


/*END : RECOMMENDED ARTICLES*/
	
	</style>
</head>
<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
				<?php include('preload.php');?>   

    <div class="product__resources ">
  <div class="product__cont">
    <h2>Choose The Difficulty For Quiz </h2>
    <!--- START ITEM ---->
    <div class="product__resources__item">
      
      <h3>Level 1 : Easy</h3>
      <p>"Begin your quest for knowledge – even the mightiest minds once started with the basics. Ready for the challenge?"</p>
	  <a href="info.php?quiz=<?php echo $quizName; ?>&difficulty=easy" class="article-Button">Take The Quiz</a>

    </div>
    <!--- EMD ITEM ---->
    <!--- START ITEM ---->
    <div class="product__resources__item">
      
      <h3>Level 2 : Medium</h3>
      <p>"Join the ranks of those who seek more than the ordinary. Normal is just the beginning of extraordinary. Are you up for it?"</p>
	   <a href="info.php?quiz=<?php echo $quizName; ?>&difficulty=normal" class="article-Button"> TAKE THE QUIZ</a>

    </div>
    <!--- EMD ITEM ---->
    <!--- START ITEM ---->
    <div class="product__resources__item">
     
      <h3>Level 3 : Hard</h3>
      <p>"Prepare to ascend to the summit of knowledge. The hard level beckons the fearless. Are you ready to conquer the peak?"</p>
	  <a href="info.php?quiz=<?php echo $quizName; ?>&difficulty=hard" class="article-Button">Take The Quiz</a>

    </div>
    <!--- EMD ITEM ---->

  </div>
  <div class="clear"></div>
</div>



	
</body>
</html>