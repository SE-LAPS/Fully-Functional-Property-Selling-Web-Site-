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
    <title>Admin Contacts</title>
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
            padding: 20px;
            margin: 0;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
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
        .delete-btn {
            display: inline-block;
            padding: 6px 10px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            margin-left: 5px;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Feedbacks</h1>

    <br><br>
    <div class="button-container">
        <!-- Button to Admin Dashboard Page -->
        <a class="dashboard-btn" href="admin_dashboard.php">Back to Dashboard</a>
    </div>
    <br><br>

    <?php
    // Fetch contact form submissions from the database
    $sql = "SELECT * FROM contact_form";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display contact form data in a table
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Submission Date</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>" . $row['submission_date'] . "</td>";
            echo "<td><a class='delete-btn' href='delete_contact.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No contact form submissions found.";
    }

    $conn->close();
    ?>
</body>
</html>
