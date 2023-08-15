<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realbidz_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $contactNumber = $_POST["contactNumber"];
    $idNumber = $_POST["idNumber"];
    $email = $_POST["email"];
    $propertyCategory = $_POST["propertyCategory"];
    $propertyDescription = $_POST["propertyDescription"];
    $time = $_POST["time"];

    // Insert data into the database
    $sql = "INSERT INTO properties_form_data (first_name, last_name, address, contact_number, nic_number, email, property_category, property_description, time)
            VALUES ('$firstName', '$lastName', '$address', '$contactNumber', '$idNumber', '$email', '$propertyCategory', '$propertyDescription', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
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

 <!--navigation bar-->
<nav class="navbar navbar-expand-lg navbar-custom">
  <img style="height: 40px; width: 100px;" src="images/logo2.jpg">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Properties
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="buildings.html">Buildings</a></li>
          <li><a class="dropdown-item" href="houses.html">Houses</a></li>
          <li><a class="dropdown-item" href="lands.html">Lands</a></li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="sell_property.php">Sell property</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
      
    </ul>
  </div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button style="background-color:white; color: black;" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
<!--navigation bar end-->


   <!-- Slide start-->

   <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height:600px;" src="images/sell.2.jpg" class="d-block w-100" alt="Image 1">
      <div class="carousel-caption">
        <h3>Sell Property</h3>
      </div>
    </div> 
>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <nav
          aria-label="breadcrumb"
          data-aos="fade-up"
          data-aos-delay="200"
        >
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- slide end-->

<body>
    
  <div class="container">
    <br><br>
    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque eveniet nobis, dolor ipsum culpa accusamus in consectetur quibusdam natus, assumenda pariatur placeat quasi at nostrum nisi veritatis deserunt magnam dolorum.<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat non veniam adipisci quo dolorem optio iure? Dignissimos laborum perferendis ab nulla quos, blanditiis, unde iste itaque fuga facilis sunt adipisci!<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, harum odit? Deleniti, consectetur non laudantium facilis iste quibusdam culpa! Delectus maiores optio dolorem provident assumenda sapiente expedita recusandae eligendi ratione.<br><br></p>
  
    <form action="buildings.html" method="post" enctype="multipart/form-data">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required><br><br>
    
    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required><br><br>
    
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" placeholder="Enter your address" required><br><br>
    
    <label for="contactNumber">Contact Number:</label>
    <input type="text" id="contactNumber" name="contactNumber" placeholder="Enter your contact number" required><br><br>
    
    <label for="idNumber">NIC Number:</label>
    <input type="text" id="idNumber" name="idNumber" placeholder="Enter your NIC number" required><br><br>
    
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email address" required><br><br>
    
    <label for="propertyCategory">Property Category:</label>
    <select id="propertyCategory" name="propertyCategory">
      <option value="house">Apartment</option>
      <option value="apartment">House</option>
      <option value="land">Land</option>
    </select><br><br>
    
    <label for="propertyDescription">Property Description:</label>
    <textarea id="propertyDescription" name="propertyDescription" required></textarea><br><br>
    
    <label for="propertyImages">Property Images:</label>
    <input type="file" id="propertyImages" name="propertyImages[]" multiple accept="image/*"><br><br>
    
    <label for="time" class="formbold-form-label"> Time: </label>
    <input type="text" id="time" name="time" required><br><br>
    
    <input type="submit" value="Submit">
    <input type="button" value="Clear" onclick="clearTextFields()">
</form>



  <br><br>
  </div>

</body>
</html>

<style> 
form {
  max-width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea,
select {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  margin-bottom: 10px;
}

input[type="file"] {
  margin-bottom: 10px;
}

input[type="submit"] {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

input[type="button"] {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="button"]:hover {
  background-color: #45a049;
}



</style>


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


  <script>
function clearTextFields() {
    document.getElementById("firstName").value = "";
    document.getElementById("lastName").value = "";
    document.getElementById("address").value = "";
    document.getElementById("contactNumber").value = "";
    document.getElementById("idNumber").value = "";
    document.getElementById("email").value = "";
    document.getElementById("propertyCategory").selectedIndex = 0;
    document.getElementById("propertyDescription").value = "";
    document.getElementById("propertyImages").value = "";
    document.getElementById("time").value = "";
}
</script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

