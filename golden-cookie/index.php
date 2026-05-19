<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-SCOPE | DRK94</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="neo-brutal">
    <div class="floating-star">★</div>

    <div class="bg-animation">
        <span class="bg-shape">K-SCOPE</span>
        <span class="bg-shape">CREATIVITY</span>
        <span class="bg-shape">SYMMETRY</span>
    </div>

    <nav class="navbar">
        <div class="logo">K-SCOPE // DRK94</div>
        <ul class="nav-links">
            <li><a href="index.php" class="btn-brutal">HOME</a></li>
            <li><a href="gallery.php" class="btn-brutal">GALLERY</a></li>
            <li><a href="https://www.paypal.com/donate/?business=B2VV4UCHTKP22&no_recurring=0&item_name=Help+me+create+more+apps.&currency_code=USD" 
               target="_blank" 
               class="btn-brutal donate-btn">
               DONATE $
            </a></li>
            <li><button onclick="downloadPattern()" class="btn-brutal">DOWNLOAD</button></li>
            <li><button onclick="savePattern()" class="btn-brutal">SAVE_TO_DB</button></li>
            <li><button onclick="clearCanvas()" class="btn-brutal reset">RESET</button></li>
        </ul>
    </nav>

    <main class="brutalist-card">
        <h1>Kaleidoscope Engine</h1>
        <p style="margin-top: 20px;">        
            SYMMETRY IS POWER. This is a raw visual engine built to break the screen. 
            Drag your cursor to weaponize math and turn simple lines into complex geometric artifacts. 
            No rules, just pure radial chaos.
        </p>

        <div class="options-bar" style="border-top: 5px solid black; margin-top: 20px; padding-top: 20px; display: flex; gap: 15px; flex-wrap: wrap;">
            <div class="control-group">
                <label>BRUSH:</label>
                <input type="color" id="colorPicker" value="#a3ff00">
            </div>
            <button class="btn-brutal" id="rainbowToggle" onclick="toggleRainbow()">Rainbow: OFF</button>
            <div class="control-group">
                <label>SIZE:</label>
                <input type="range" id="brushSize" min="1" max="20" value="2">
            </div>
            <div class="control-group">
                <label>SLICES:</label>
                <input type="range" id="sliceCount" min="4" max="24" step="2" value="12">
            </div>
        </div>

        <div class="canvas-container" style="margin-top: 30px; border: 5px solid black; background: #000; overflow: hidden;">
            <canvas id="kaleidoscope"></canvas>
        </div>
    </main>

    <footer style="background: black; color: white; padding: 60px 20px; text-align: center; margin-top: 50px; border-top: 10px solid var(--neon-green);">
    <div class="tech-stack" style="margin-bottom: 40px;">
        <p style="color: var(--neon-green); letter-spacing: 3px; font-size: 0.8rem; margin-bottom: 20px;">// SYSTEM_DEPENDENCIES</p>
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px;">
            <span class="tech-tag">HTML5_CANVAS</span>
            <span class="tech-tag">MODERN_JS</span>
            <span class="tech-tag">PHP_8.x</span>
            <span class="tech-tag">MYSQL_DB</span>
            <span class="tech-tag">CSS_GRID</span>
        </div>
    </div>
  
    <p style="font-size: 1.2rem;">DEVELOPED BY: <strong>JUAN CARLOS DIEGO ANGULO</strong></p>
    <p style="font-size: 0.7rem; color: #666; margin-top: 10px;">V1.0.2 // BUILT_IN_2026</p>
</footer>

    <script src="script.js"></script>
</body>
</html>