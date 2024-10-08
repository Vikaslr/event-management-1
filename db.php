<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "";     // Default password for XAMPP is empty
$dbname = "event_management"; // Ensure this matches the created database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Could not connect to the database: " . $conn->connect_error);
}
?>
