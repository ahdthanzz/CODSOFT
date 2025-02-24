<?php
$servername = "localhost"; // or your server IP
$username = "root"; // your DB username
$password = ""; // your DB password
$dbname = "cricket_db"; // your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
