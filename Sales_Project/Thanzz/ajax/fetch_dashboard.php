<?php
require '../config/database.php';
session_start();

$response = [];

if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

    // Fetch dashboard stats based on role
    switch ($role) {
        case 'manager':
            $query = "SELECT COUNT(*) AS total_policies, SUM(premium_amount) AS total_premium FROM invoices";
            break;
        case 'supervisor':
        case 'team_leader':
            $query = "SELECT COUNT(*) AS team_policies, SUM(premium_amount) AS team_premium FROM invoices WHERE supervisor_id = $user_id";
            break;
        case 'agent':
            $query = "SELECT COUNT(*) AS agent_policies, SUM(premium_amount) AS agent_premium FROM invoices WHERE agent_id = $user_id";
            break;
        default:
            $query = "";
    }

    if (!empty($query)) {
        $result = $conn->query($query);
        if ($result) {
            $response = $result->fetch_assoc();
        }
    }
}

echo json_encode($response);
?>
