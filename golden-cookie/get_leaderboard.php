<?php
include 'db.php';

// Query to get top 5 scores in descending order
$sql = "SELECT username, high_score FROM scores ORDER BY high_score DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rank = 1;
    // The Loop: For every row in the database, create a table row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rank++ . "</td>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . $row['high_score'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No scores yet. Be the first!</td></tr>";
}
?>