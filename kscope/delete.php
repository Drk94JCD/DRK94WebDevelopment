<?php
$conn = new mysqli('localhost', 'root', '', 'kaleidoscope_db');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Security: ensure ID is a number
    
    $stmt = $conn->prepare("DELETE FROM saved_patterns WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Redirect back to the gallery after deleting
        header("Location: gallery.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>