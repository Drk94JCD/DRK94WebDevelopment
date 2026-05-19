const canvas = document.getElementById('kaleidoscope');
const ctx = canvas.getContext('2d');

// UI Elements
const colorPicker = document.getElementById('colorPicker');
const brushSize = document.getElementById('brushSize');
const sizeValue = document.getElementById('sizeValue');
const sliceInput = document.getElementById('sliceCount');
const sliceValue = document.getElementById('sliceValue');
const rainbowBtn = document.getElementById('rainbowToggle');

// State Variables
let isDrawing = false;
let rainbowMode = false;
let hue = 0;
let lastX = 0;
let lastY = 0;

// 1. Setup Canvas Size
function resizeCanvas() {
    canvas.width = window.innerWidth * 0.9; // Adjusted for mobile padding
    canvas.height = window.innerHeight * 0.6;
    prepareCanvas();
}

function prepareCanvas() {
    ctx.fillStyle = "#000000";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}

window.addEventListener('resize', resizeCanvas);
resizeCanvas();

// 2. Mobile & Mouse Coordinate Helper
function getCoords(e) {
    const rect = canvas.getBoundingClientRect();
    if (e.touches && e.touches.length > 0) {
        return {
            x: e.touches[0].clientX - rect.left,
            y: e.touches[0].clientY - rect.top
        };
    }
    return {
        x: e.clientX - rect.left,
        y: e.clientY - rect.top
    };
}

// 3. Event Listeners (Mouse + Touch)
canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('touchstart', (e) => { startDrawing(e); e.preventDefault(); }, { passive: false });

window.addEventListener('mousemove', draw);
window.addEventListener('touchmove', (e) => { draw(e); e.preventDefault(); }, { passive: false });

window.addEventListener('mouseup', () => isDrawing = false);
window.addEventListener('touchend', () => isDrawing = false);

function startDrawing(e) {
    isDrawing = true;
    const coords = getCoords(e);
    lastX = coords.x;
    lastY = coords.y;
}

// 4. The Unified Draw Function
function draw(e) {
    if (!isDrawing) return;

    const coords = getCoords(e);
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;

    // Current and Previous positions relative to center
    const x = coords.x - centerX;
    const y = coords.y - centerY;
    const prevX = lastX - centerX;
    const prevY = lastY - centerY;

    const currentSlices = sliceInput.value;

    for (let i = 0; i < currentSlices; i++) {
        ctx.save();
        ctx.translate(centerX, centerY);
        ctx.rotate((i * 2 * Math.PI) / currentSlices);

        if (i % 2 === 0) ctx.scale(1, -1);

        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(x, y);

        // Styling Logic
        if (rainbowMode) {
            ctx.strokeStyle = `hsl(${hue}, 100%, 60%)`;
            ctx.shadowColor = `hsl(${hue}, 100%, 60%)`;
            hue++;
        } else {
            ctx.strokeStyle = colorPicker.value;
            ctx.shadowColor = colorPicker.value;
        }

        ctx.shadowBlur = 10; 
        ctx.lineWidth = brushSize.value;
        ctx.lineCap = 'round';
        ctx.stroke();
        ctx.restore();
    }

    lastX = coords.x;
    lastY = coords.y;
}

// 5. Utility Functions
function toggleRainbow() {
    rainbowMode = !rainbowMode;
    rainbowBtn.innerText = rainbowMode ? "Rainbow: ON" : "Rainbow: OFF";
    rainbowBtn.classList.toggle('active');
}

brushSize.oninput = () => sizeValue.innerText = brushSize.value + "px";
sliceInput.oninput = () => sliceValue.innerText = sliceInput.value;

function clearCanvas() {
    ctx.fillStyle = "#000000";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}

function savePattern() {
    const imageData = canvas.toDataURL('image/png');
    fetch('save.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'image=' + encodeURIComponent(imageData)
    })
    .then(response => response.text())
    .then(data => alert("Pattern saved to gallery!"));
}

function downloadPattern() {
    const link = document.createElement('a');
    link.download = `k-scope-${Date.now()}.png`;
    link.href = canvas.toDataURL('image/png');
    link.click();
}