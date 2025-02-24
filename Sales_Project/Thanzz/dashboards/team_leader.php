<?php
session_start();
require '../config/database.php';

if ($_SESSION['role'] !== 'team_leader') {
    header("Location: ../index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Team Leader Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Team Leader Dashboard</h1>
    <div id="dashboard">
        <p>Your Team's Performance: <span id="teamStats">Loading...</span></p>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>
