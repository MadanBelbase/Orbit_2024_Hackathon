<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost"; // Since it's running on your local machine
$username = "root";        // Default username for XAMPP MySQL
$password = "";            // Default password for root in XAMPP is blank
$dbname = "mydb";          // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>
