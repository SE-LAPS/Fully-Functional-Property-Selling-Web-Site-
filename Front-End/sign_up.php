<?php
// Connect to the database
$host = 'localhost';
$db   = 'realbidz_db';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $userType = $_POST['userType'];

  $sql = "INSERT INTO users (first_name, last_name, email, password, user_type) 
          VALUES ('$firstName', '$lastName', '$email', '$password', '$userType')";

  if ($conn->query($sql) === TRUE) {
      // Redirect to login.php
      header("Location: login.php");
      exit(); // Make sure to exit after the redirect
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
  <title>RealBidz</title>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />


  <style>

  /*navigation bar start css*/
    .navbar-custom {
      background-color: #00008B; /* Dark Blue */
      color: #ffffff; /* Text color */
    }
    .navbar-custom .navbar-nav .nav-link {
      color: #ffffff; /* Link text color */
    }

    /*navigation bar end css*/

    /*footer css code start*/

    .footer {
      background-color: #00008B; /* Dark Blue */
      color: #ffffff; /* Text color */
    }

    .footer a{
      text-decoration: none;
      color: white;
      font-size: 18px;
    }

    /*footer css code end*/

    /*slide show image code start*/

    .carousel-item img {
  filter: none;
}

.carousel-caption h3 {
    font-size: 58px;
  }

  /*slide show image code end*/

  /*auction part start css*/

   .auction-list {
      margin-top: 20px;
    }

    /*auction part end css*/

  </style>

</head>
<body>

  <!--
  <nav class="navbar navbar-expand-lg navbar-custom">
    <img style="height: 40px; width: 100px;" src="images/logo2.jpg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home_page.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Services</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Properties
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="buildings.html">Buildings</a>
            <a class="dropdown-item" href="houses.html">Houses</a>
          
            <a class="dropdown-item" href="lands.html">Lands</a>
          </div>
        <li class="nav-item">
          <a class="nav-link" href="sell_property.html">Sell Property</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="contatus.html">Contact Us</a>
        </li>
        
      </ul>
    </div>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button style="background-color:white; color: black;" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>
-->


<!--sign up form start-->


<!--sign up form start-->
<div style="width:1500px;" class="row justify-content-center">
  <div class="col-4">
      <img style="margin-top:70px; height: 650px; margin-bottom:60px;" src="images/Signup.1.jpg" class="img-fluid" alt="...">
  </div>
  <div style="margin-top:70px; margin-bottom:60px; background-color:#E9EAED ;" class="col-4">
      <div style="margin-bottom: 50px;" class="container">
          <h2 style="padding:30px;" class="text-center mb-4">Sign Up</h2>
          <form action="sign_up.php" method="post">

              <div class="form-group">
                  <label for="fname">First Name:</label>
                  <input type="text" class="form-control" id="fname" name="first_name" placeholder="First Name">
              </div>

              <div class="form-group">
                  <label for="lname">Last Name:</label>
                  <input type="text" class="form-control" id="lname" name="last_name" placeholder="Last Name">
              </div>

              <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              </div>

              <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>

              <div class="form-group">
                  <label for="repassword">Re-enter password :</label>
                  <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-enter Password">
              </div>

              <div class="form-group">
                  <label for="userType">User Type:</label>
                  <select class="form-control" id="userType" name="userType">
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                  </select>
              </div>

              <button style="background-color:#200D58;" type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </form>
      </div>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </div>
</div>

<!--sign up form end-->

<!-- Footer -->
<footer class="footer">
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
         
          <ul class="list-unstyled">
            <li>
              <h4>Join with us</h4>
            </li>
            <li>
             <h6>Real Bidz auctions<br>colombo 07 <br> Sri Lanka</h6>
            
            </li>


            <li>

              <h6>www.RealBidz@gmail.com</h6>
            </li>
            <li>
              <h6>011-3456223<br>012-3456765</h6>
            </li>
            
            
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          
          <ul class="list-unstyled">
            <li>
              <a  href="#!">Home</a>
            </li>
            <li>
              <a href="#!">About Us</a>
            </li>
            <li>
              <a href="#!">Contact Us</a>
            </li>
            <li>
              <a href="#!">Register</a>
            </li>
            <li>
              <a href="#!">Services</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
         
          <ul class="list-unstyled">
            <li>
              <a href="#!">apartment</a>
            </li>
            <li>
              <a href="#!">Houses</a>
            </li>
            <li>
              <a href="#!">Lands</a>
            </li>
            <li>
              <a href="#!">property</a>
            </li>
            <li>
              <a href="#!">sell property</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          
          <ul class="list-unstyled">
            <li>
              

            </li>
             <a href="https://example.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
            <li>
              <a href="https://example.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
            </li>
            <li>
              <a href="https://example.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
            </li>
            <li>
              <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
            </li>
            <li>
              <a href="https://api.whatsapp.com/send?phone=1234567890" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center py-3" style="background-color: #00005A;"> <!-- Dark Blue -->
      &copy; Copyright RealBidz All Right Reserved.
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

