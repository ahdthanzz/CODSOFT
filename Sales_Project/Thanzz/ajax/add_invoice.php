<?php
require '../config/database.php';
session_start();

$response = ['success' => false, 'error' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $branch_code = $_POST['branch_code'];
    $supervisor_code = $_POST['supervisor_code'];
    $team_leader_code = $_POST['team_leader_code'];
    $sales_agent_code = $_POST['sales_agent_code'];
    $invoice_date = $_POST['invoice_date'];
    $policy_number = $_POST['policy_number'];
    $premium_amount = $_POST['premium_amount'];
    $payment_frequency = $_POST['payment_frequency'];

    $stmt = $conn->prepare("INSERT INTO invoices (branch_code, supervisor_id, team_leader_id, agent_id, invoice_date, policy_number, premium_amount, payment_frequency) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssds", $branch_code, $supervisor_code, $team_leader_code, $sales_agent_code, $invoice_date, $policy_number, $premium_amount, $payment_frequency);

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['error'] = "Failed to save invoice.";
    }
}

echo json_encode($response);
?>
