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
?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            background-color: #333;
            color: white;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        a:hover {
            text-decoration: underline;
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
    <h1>Manage Categories</h1>

    <br><br>
    <div class="button-container">
    <!-- Button to Admin Dashboard Page -->
    <a class="dashboard-btn" href="admin_dashboard.php">Back to Dashboard</a>
</div>
<br><br>

    <?php
    // Fetch categories from the database
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display category data in a table
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td><a href='edit_category.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_category.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No categories found.";
    }

    $conn->close();
    ?>
</body>
</html>
