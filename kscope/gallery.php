<?php
$conn = new mysqli('localhost', 'root', '', 'kaleidoscope_db');
$result = $conn->query("SELECT id, image_data, created_at FROM saved_patterns ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>K-SCOPE | COMMUNITY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="neo-brutal">
    <div class="floating-star">★</div>

    <nav class="navbar">
        <div class="logo">K-SCOPE // GALLERY</div>
        <ul class="nav-links">
            <li><a href="index.php" class="btn-brutal">BACK TO STUDIO</a></li>
        </ul>
    </nav>

    <div class="gallery-container">
        <h1 class="gallery-title">COMMUNITY_CREATIONS</h1>
        
        <div class="grid">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="gallery-item brutalist-card">
                    <div class="image-preview">
                        <img src="<?php echo $row['image_data']; ?>" alt="Kaleidoscope Pattern">
                    </div>
                    
                    <div class="item-details">
                        <p>ID: #<?php echo $row['id']; ?> | <?php echo date('M d', strtotime($row['created_at'])); ?></p>
                        
                        <div class="action-buttons">
                            <a href="<?php echo $row['image_data']; ?>" 
                               download="k-scope-<?php echo $row['id']; ?>.png" 
                               class="btn-brutal small">SAVE ↓</a>

                            <a href="delete.php?id=<?php echo $row['id']; ?>" 
                               class="btn-brutal delete small"
                               onclick="return confirm('ERASE THIS DATA?')">DEL 🗑️</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer style="background: black; color: white; padding: 20px; text-align: center; margin-top: 50px;">
        <p>JUAN CARLOS DIEGO ANGULO &copy; 2026</p>
    </footer>
</body>
</html>