<?php
// Include your database configuration and connection setup here
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];

    // Fetch user data from the database based on the ID
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Now you can use $user array to pre-fill form fields or display user details
    } else {
        echo "User not found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Handle form submission to update user information
    $userId = $_POST["user_id"];
    $newFirstName = $_POST["new_first_name"];
    $newLastName = $_POST["new_last_name"];
    $newEmail = $_POST["new_email"];

    // Perform update query
    $updateSql = "UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sssi", $newFirstName, $newLastName, $newEmail, $userId);

    if ($stmt->execute()) {
        // Update successful, redirect back to admin_users.php or display a success message
        header("Location: admin_users.php");
        exit();
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        First Name: <input type="text" name="new_first_name" value="<?php echo $user['first_name']; ?>"><br>
        Last Name: <input type="text" name="new_last_name" value="<?php echo $user['last_name']; ?>"><br>
        Email: <input type="text" name="new_email" value="<?php echo $user['email']; ?>"><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
