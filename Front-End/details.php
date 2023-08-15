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
}

// Fetch property data
$sql = "SELECT * FROM properties_form_data ORDER BY id DESC LIMIT 1"; // Retrieve the latest added property data
$result = $conn->query($sql);

$propertyData = [];
if ($result->num_rows > 0) {
    $propertyData = $result->fetch_assoc();
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Property Details</title>
  <style>
    body {
      background-color: lightblue;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Table styling */
    table {
      border-collapse: collapse;
      width: 100%;
      background-color: black;
      margin-bottom: 20px;
    }

    table, th, td {
      border: 1px solid white;
      color: white;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    /* Contact Form styling */
    .contact-form {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 10px;
      width: 120%;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .contact-form h2 {
      margin-top: 0;
      margin-bottom: 15px;
      font-size: 24px;
    }

    .contact-form label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form textarea {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      margin-bottom: 10px;
    }

    .contact-form input[type="submit"] {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .contact-form input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Side - Property Details -->
        <div style="flex: 1; padding-right: 20px;">
            <h2>Property Details</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo $propertyData['first_name']; ?></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo $propertyData['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $propertyData['address']; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $propertyData['contact_number']; ?></td>
                </tr>
                <tr>
                    <td>NIC Number</td>
                    <td><?php echo $propertyData['nic_number']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $propertyData['email']; ?></td>
                </tr>
                <tr>
                    <td>Property Category</td>
                    <td><?php echo $propertyData['property_category']; ?></td>
                </tr>
                <tr>
                    <td>Property Description</td>
                    <td><?php echo $propertyData['property_description']; ?></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td><?php echo $propertyData['time']; ?></td>
                </tr>
            </table>
        </div>

    <!-- Right Side - Contact Form -->
  <!-- Right Side - Contact Form -->
<div class="contact-form">
  <h2>Bidding Form</h2>
  <form action="buildings.html" method="post">
    <!-- Contact form fields here -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
                
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br><br>
                
    <label for="nic">NIC Number:</label>
    <input type="text" id="nic" name="nic" required><br><br>
                
    <label for="price">Bid Price:</label>
    <input type="text" id="price" name="price" required><br><br>
                
    <label for="contactNumber">Contact Number:</label>
    <input type="text" id="contactNumber" name="contactNumber" required><br><br>
                
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required><br><br>
                
    <input type="submit" value="Submit">
     <a href="buildings.html">Back to Buildings</a>
  </form>
 
</div>

    </div>
  </div>
</body>
</html>
