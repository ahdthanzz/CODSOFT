<?php
include 'db_connect.php';

$response = [
    "teamA" => "",
    "teamB" => "",
    "extras" => 0,
    "total" => 0
];

$queryA = "SELECT player_name, runs, balls, wickets FROM scorecard WHERE team_id = 1";
$resultA = mysqli_query($conn, $queryA);

while ($row = mysqli_fetch_assoc($resultA)) {
    $response['teamA'] .= "<tr>
        <td>{$row['player_name']}</td>
        <td>{$row['runs']}</td>
        <td>{$row['balls']}</td>
        <td>{$row['wickets']}</td>
    </tr>";
}

$queryB = "SELECT player_name, overs, runs, wickets FROM scorecard WHERE team_id = 2";
$resultB = mysqli_query($conn, $queryB);

while ($row = mysqli_fetch_assoc($resultB)) {
    $response['teamB'] .= "<tr>
        <td>{$row['player_name']}</td>
        <td>{$row['overs']}</td>
        <td>{$row['runs']}</td>
        <td>{$row['wickets']}</td>
    </tr>";
}

$queryExtras = "SELECT SUM(extras) as total_extras, SUM(runs) as total_runs FROM scorecard";
$resultExtras = mysqli_query($conn, $queryExtras);
$rowExtras = mysqli_fetch_assoc($resultExtras);

$response['extras'] = $rowExtras['total_extras'];
$response['total'] = $rowExtras['total_runs'];

echo json_encode($response);
?>
