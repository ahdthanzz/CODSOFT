<?php
session_start();
require '../config/database.php';

if ($_SESSION['role'] !== 'agent') {
    header("Location: ../index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agent Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Agent Dashboard</h1>
    <div id="dashboard">
        <p>Your Sales Performance: <span id="agentStats">Loading...</span></p>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>
