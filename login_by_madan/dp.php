<?php
// Database connection settings
$servername = "localhost"; // Change to your server hostname if different
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password (leave blank if no password)
$dbname = "login_system"; // Replace with the name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment for debugging (optional)
// echo "Connected successfully";
?>
