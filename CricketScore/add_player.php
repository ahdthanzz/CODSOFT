<?php
// Include database connection
include 'db_connection.php';

// Check if POST request has player data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect the player name and team name
    $player_name = $_POST['player_name'];
    $team_name = $_POST['team_name'];

    // Prepare the SQL query to insert the player
    $sql = "INSERT INTO players (player_name, team_name) VALUES ('$player_name', '$team_name')";

    // Execute the query and check if successful
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => "Player added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add player: " . $conn->error]);
    }
}

// Close connection
$conn->close();
?>
