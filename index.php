<?php
// Start session
session_start();

// Check if the session variable is set
if (isset($_SESSION['visited'])) {
    // Redirect the user to another page (e.g., home.php)
    header("Location: home.php");
    exit();
}

// Set the session variable to mark the user as visited
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tronsoul Quiz</title>
  <!-- Favicons -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
				<?php include('preload.php');?>   

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Tronsoul Quiz</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav>
      <div class="container main-nav flex">
       
        <div class="nav-links" id="nav-links">
          <ul class="flex">
            <li>
              <a href="#" class="hover-link">Products</a>
            </li>
            <li>
              <a href="#" class="hover-link">Customer</a>
            </li>
            <li>
              <a href="#" class="hover-link">Pricing</a>
            </li>
            <li>
              <a href="#" class="hover-link">Resources</a>
            </li>
            <li>
              <a href="login.php" class="hover-link secondary-button">Sign in</a>
            </li>
           
          </ul>
        </div>
        <a href="#" class="nav-toggle hover-link" id="nav-toggle"
          ><i class="fa-solid fa-bars"></i
        ></a>
      </div>
    </nav>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/quiz.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Tronsoul Quiz</span></h2>
              <p class="animate__animated animate__fadeInUp"> Here You Can Find The Quizes For Multiple Programming Languages</p>
              <a href="login.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/quiz.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Tronsoul Quiz</h2>
              <p class="animate__animated animate__fadeInUp">We Come With Very Challenging Questions and Quizes For Our Contestant With Certain Amount Of Time</p>
              <a href="login.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/quiz.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Tronsoul Quiz</h2>
              <p class="animate__animated animate__fadeInUp">Are You Ready To Face The Challenges Click Get Started to Start a Amazing Journey with us,Thank You</p>
              <a href="login.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get started</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
  <div class="container">

    <div class="row content">
      <div class="col-lg-6">
        <h2>Welcome to Tronsoul Quiz</h2>
        <h3>Embark on a Journey of Learning and Challenge</h3>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          At Tronsoul Quiz, we strive to provide a unique and engaging learning experience through our quiz platform. Our mission is to offer a wide range of quizzes covering multiple programming languages, challenging participants to enhance their skills and knowledge.
        </p>
        <ul>
          <li><i class="ri-check-double-line" style="color:#1d69a3;"></i> Explore diverse quizzes to test your expertise.</li>
          <li><i class="ri-check-double-line" style="color:#1d69a3;"></i> Experience timed challenges for added excitement.</li>
          <li><i class="ri-check-double-line" style="color:#1d69a3;"></i> Engage with a community of learners and share knowledge.</li>
        </ul>
        <p class="fst-italic">
          Join us in the pursuit of knowledge, where learning meets fun. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
    </div>

  </div>
</section>


    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/c.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/cpp.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/java.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/python.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/php.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/csharp.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="icon-box">
                <i class="bi bi-check2" style="color:#1d69a3;"></i>
                <h4><a href="#">Multiple Quizzes</a></h4>
                <p>Offer a variety of quizzes covering different programming languages and difficulty levels.</p>
            </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
                <i class="bi bi-stopwatch" style="color:#1d69a3;"></i>
                <h4><a href="#">Timed Challenges</a></h4>
                <p>Challenge users with timed quizzes to test their knowledge and problem-solving skills.</p>
            </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
                <i class="bi bi-trophy" style="color:#1d69a3;"></i>
                <h4><a href="#">Leaderboards</a></h4>
                <p>Implement leaderboards to showcase top scorers and encourage healthy competition.</p>
            </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
                <i class="bi bi-chat-dots" style="color:#1d69a3;"></i>
                <h4><a href="#">Community Discussions</a></h4>
                <p>Create a space for users to discuss quiz questions, solutions, and share knowledge.</p>
            </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
                <i class="bi bi-shield-check" style="color:#1d69a3;"></i>
                <h4><a href="#">Secure Platform</a></h4>
                <p>Ensure a secure quiz-taking environment with measures to prevent cheating.</p>
            </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
                <i class="bi bi-globe" style="color:#1d69a3;"></i>
                <h4><a href="#">Accessible Anywhere</a></h4>
                <p>Allow users to access quizzes from anywhere, promoting flexibility and convenience.</p>
            </div>
        </div>
    </div>

</div>

      
    </section><!-- End Services Section -->

        </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
          <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-info">
                                <h3>Tronsoul Quiz</h3>
                                <p>
                                    Sanjay Colony <br>
                                    Bhilwara, Rajasthan<br><br>
                                    <strong>Phone:</strong> 9145808988<br>
                                    <strong>Email:</strong> info@example.com<br>
                                </p>
                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Our Services</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Tronsoul Quiz</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="#">Kapil Kachawa</a>
                </div>
            </div>
        </footer>

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 <script>
        // Your existing script content here
        function redirectToLogin() {
            window.location.href = "index.php";
        }
    </script>
	
	<script>
    // Disable the back button
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>



</body>

</html> 