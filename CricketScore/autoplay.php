<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cricket_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simulating auto play by updating runs, wickets, and extras randomly
$teamA_player = rand(1, 11);  // Random player ID
$runs_scored = rand(0, 6);    // Random runs (0 to 6)
$is_wicket = (rand(0, 10) > 8) ? 1 : 0; // 10% chance of a wicket
$extra_runs = (rand(0, 10) > 8) ? 1 : 0; // 10% chance of an extra run

// Update player's score
$conn->query("UPDATE team_a_batting SET runs = runs + $runs_scored, balls = balls + 1 WHERE id = $teamA_player");

// Update total extras
if ($extra_runs) {
    $conn->query("UPDATE match_summary SET extras = extras + 1");
}

// If a wicket falls, update wickets
if ($is_wicket) {
    $conn->query("UPDATE match_summary SET wickets = wickets + 1");
}

// Update total score
$conn->query("UPDATE match_summary SET total_score = total_score + $runs_scored + $extra_runs");

// Close connection
$conn->close();

// Return success response
echo json_encode(["status" => "success"]);
?>
