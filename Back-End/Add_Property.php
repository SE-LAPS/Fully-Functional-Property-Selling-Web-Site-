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
    // Get property details from the form
    $title = $_POST["title"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    // Get the category_id from the categories table based on the category name
    $categoryQuery = "SELECT id FROM categories WHERE name = '$category'";
    $categoryResult = $conn->query($categoryQuery);

    if ($categoryResult->num_rows > 0) {
        $row = $categoryResult->fetch_assoc();
        $category_id = $row["id"];

        // Prepare and execute the SQL query to insert data
        $sql = "INSERT INTO properties (title, category_id, price) VALUES ('$title', '$category_id', '$price')";
        if ($conn->query($sql) === TRUE) {
         echo "Property added successfully.";
         header("Location: admin_properties.php");
         exit();
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
     
    } else {
        echo "Invalid category name.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Property</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            background-color: #333;
            color: white;
            padding: 10px;
            margin: 0;
        }
        form {
            margin: 20px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select, input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .dashboard-btn-container {
            text-align: left;
            margin-top: 20px;
            margin-left: 10px;
        }
        .dashboard-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #136700;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .dashboard-btn:hover {
            background-color: #003A0D;
        }

    </style>
</head>
<body>
    <h1>Add Property</h1>
<br><br>
    <div class="button-container">
    <!-- Button to Admin Dashboard Page -->
    <a class="dashboard-btn" href="admin_dashboard.php">Back to Dashboard</a>
</div>
<br><br>
    <form method="post">
        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Category:</label>
        <select name="category" required>
            <option value="Houses">Houses</option>
            <option value="Buildings">Buildings</option>
            <option value="Lands">Lands</option>
        </select><br>

        <label>Price:</label>
        <input type="number" name="price" required><br>

        <input type="submit" value="Add Property">
    </form>
</body>
</html>

