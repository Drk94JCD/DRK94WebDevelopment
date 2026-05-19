<?php
$host = 'localhost';
$user = 'root'; // DB username
$pass = '';     // DB password
$db   = 'kaleidoscope_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($_POST['image']) {
    $img = $_POST['image'];
    
    // Use a prepared statement to securely insert the data
    $stmt = $conn->prepare("INSERT INTO saved_patterns (image_data) VALUES (?)");
    $stmt->bind_param("s", $img);
    
    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>