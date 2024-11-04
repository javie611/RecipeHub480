<?php
// Database connection details
$servername = "localhost";
$username = "remote";
$password = "password";
$dbname = "recipe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form
$user = $_POST['username'];
$pass = $_POST['password'];

// Directly build and execute the SQL query (not safe!)
$sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();
?>
