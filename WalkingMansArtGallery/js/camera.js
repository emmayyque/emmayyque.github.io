const camera = document.getElementById('camera');
let isRotating = false;

function updateCameraPosition() {
    if (isRotating) {
    const radius = 5;
    const speed = 0.01;

    const x = radius * Math.sin(speed * Date.now() / 1000);
    const z = radius * Math.cos(speed * Date.now() / 1000);

    camera.setAttribute('position', `${x} 1 ${z}`);
    requestAnimationFrame(updateCameraPosition);
    console.log("camera")
    }
}

// Listen for the 'C' key press
window.addEventListener('keydown', function (event) {
    if (event.key === 'c' || event.key === 'C') {
    isRotating = !isRotating; // Toggle rotation on 'C' key press
    if (isRotating) {
        updateCameraPosition();
    }
    }
});