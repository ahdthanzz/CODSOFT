<?php
session_start();
require '../config/database.php';

if ($_SESSION['role'] !== 'cashier') {
    header("Location: ../index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Entry</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Invoice Data Entry</h1>
    <form id="invoiceForm">
        <input type="text" name="branch_code" placeholder="Branch Code" required>
        <input type="text" name="supervisor_code" placeholder="Supervisor Code" required>
        <input type="text" name="team_leader_code" placeholder="Team Leader Code" required>
        <input type="text" name="sales_agent_code" placeholder="Sales Agent Code" required>
        <input type="date" name="invoice_date" required>
        <input type="text" name="policy_number" placeholder="Policy Number" required>
        <input type="number" name="premium_amount" placeholder="Premium Amount" required>
        <select name="payment_frequency">
            <option value="Monthly">Monthly</option>
            <option value="Quarterly">Quarterly</option>
            <option value="Biannual">Biannual</option>
            <option value="Annual">Annual</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <script src="../assets/js/main.js"></script>
</body>
</html>
