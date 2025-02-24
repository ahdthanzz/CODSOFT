<?php
session_start();
require '../config/database.php';

if ($_SESSION['role'] !== 'manager') {
    header("Location: ../index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Manager Dashboard</h1>
    <div id="dashboard">
        <p>Total Policies: <span id="totalPolicies">Loading...</span></p>
        <p>Total Premium Collected: <span id="totalPremium">Loading...</span></p>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>
