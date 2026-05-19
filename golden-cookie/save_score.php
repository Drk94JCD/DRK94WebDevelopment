<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$score = (int)$data['score'];
$username = mysqli_real_escape_string($conn, $data['username']);

// This query says: Insert a new player, but if the name already exists, 
// only update their score IF the new score is higher.
$sql = "INSERT INTO scores (username, high_score) 
        VALUES ('$username', $score) 
        ON DUPLICATE KEY UPDATE high_score = IF($score > high_score, $score, high_score)";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>