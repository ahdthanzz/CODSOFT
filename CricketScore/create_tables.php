<?php
// Include database connection
include 'db_connection.php';

// Create the teams table
$sql_teams = "CREATE TABLE IF NOT EXISTS teams (
    team_id INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(100) NOT NULL
)";

// Create the players table
$sql_players = "CREATE TABLE IF NOT EXISTS players (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    player_name VARCHAR(100) NOT NULL,
    team_name VARCHAR(50) NOT NULL
)";

// Create the scorecard table
$sql_scorecard = "CREATE TABLE IF NOT EXISTS scorecard (
    scorecard_id INT AUTO_INCREMENT PRIMARY KEY,
    player_id INT,
    runs INT DEFAULT 0,
    wickets INT DEFAULT 0,
    FOREIGN KEY (player_id) REFERENCES players(player_id)
)";

// Create the matches table
$sql_matches = "CREATE TABLE IF NOT EXISTS matches (
    match_id INT AUTO_INCREMENT PRIMARY KEY,
    team_a_id INT,
    team_b_id INT,
    match_date DATETIME,
    match_status VARCHAR(50) DEFAULT 'Scheduled',
    FOREIGN KEY (team_a_id) REFERENCES teams(team_id),
    FOREIGN KEY (team_b_id) REFERENCES teams(team_id)
)";

// Execute the queries
if ($conn->query($sql_teams) === TRUE && $conn->query($sql_players) === TRUE && $conn->query($sql_scorecard) === TRUE && $conn->query($sql_matches) === TRUE) {
    echo "Tables created successfully!";
} else {
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();
?>
