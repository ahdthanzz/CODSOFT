<?php
// Include database connection
include 'db_connection.php';

// Check if POST request has match data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect match details
    $team_a_id = $_POST['team_a_id'];
    $team_b_id = $_POST['team_b_id'];
    $match_date = $_POST['match_date'];
    $match_status = $_POST['match_status'];

    // Prepare the SQL query to insert the match
    $sql = "INSERT INTO matches (team_a_id, team_b_id, match_date, match_status) 
            VALUES ('$team_a_id', '$team_b_id', '$match_date', '$match_status')";

    // Execute the query and check if successful
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => "Match added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add match: " . $conn->error]);
    }
}

// Close connection
$conn->close();
?>
