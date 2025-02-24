<?php
include 'db_connect.php';

$query = "SELECT player_name, team_name FROM players"; 
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error in SQL Query: " . mysqli_error($conn)); // Debug SQL errors
}

$response = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response .= "<tr><td>{$row['player_name']}</td><td>{$row['team_name']}</td></tr>";
    }
} else {
    $response = "<tr><td colspan='2'>No players found</td></tr>";
}

echo $response;
?>
