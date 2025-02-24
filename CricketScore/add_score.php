<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player_id = $_POST['player_id'];
    $runs = $_POST['runs'];
    $wickets = $_POST['wickets'];

    $sql = "UPDATE scorecard SET runs = runs + ?, wickets = wickets + ? WHERE player_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $runs, $wickets, $player_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Score Updated"]);
    } else {
        echo json_encode(["error" => "Failed to update"]);
    }
}
$conn->close();
?>
