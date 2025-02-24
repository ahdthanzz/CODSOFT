<?php
include 'db_connection.php';

// Insert Teams
$conn->query("INSERT INTO teams (team_name) VALUES ('Team A'), ('Team B')");

// Insert Players for Team A
$teamA_id = 1;
$conn->query("INSERT INTO players (player_name, team_id) VALUES 
('Player A1', $teamA_id), ('Player A2', $teamA_id), ('Player A3', $teamA_id),
('Player A4', $teamA_id), ('Player A5', $teamA_id), ('Player A6', $teamA_id),
('Player A7', $teamA_id), ('Player A8', $teamA_id), ('Player A9', $teamA_id),
('Player A10', $teamA_id)");

// Insert Players for Team B
$teamB_id = 2;
$conn->query("INSERT INTO players (player_name, team_id) VALUES 
('Player B1', $teamB_id), ('Player B2', $teamB_id), ('Player B3', $teamB_id),
('Player B4', $teamB_id), ('Player B5', $teamB_id), ('Player B6', $teamB_id),
('Player B7', $teamB_id), ('Player B8', $teamB_id), ('Player B9', $teamB_id),
('Player B10', $teamB_id)");

// Insert Match
$conn->query("INSERT INTO matches (team_a_id, team_b_id, match_date) VALUES ($teamA_id, $teamB_id, NOW())");

echo "Data inserted successfully!";
$conn->close();
?>
