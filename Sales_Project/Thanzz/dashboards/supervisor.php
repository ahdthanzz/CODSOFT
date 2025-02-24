<?php
session_start();
require '../config/database.php';

if ($_SESSION['role'] !== 'supervisor') {
    header("Location: ../index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Supervisor Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Supervisor Dashboard</h1>
    <div id="dashboard">
        <p>Team Performance: <span id="teamPerformance">Loading...</span></p>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>
