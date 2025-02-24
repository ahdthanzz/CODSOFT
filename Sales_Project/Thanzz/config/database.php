<?php
$servername = "localhost"; // Hostname
$username = "root";        // MySQL username (default is "root")
$password = "";            // MySQL password (default is empty)
$dbname = "sales_performance"; // The correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
