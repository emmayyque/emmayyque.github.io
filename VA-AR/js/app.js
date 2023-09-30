<script>
  const customCamera = document.querySelector('#custom-camera');

  // Initialize camera position
  let cameraPosition = {};
  cameraPosition['x'] = 0;
  cameraPosition['y'] = 0;
  cameraPosition['z'] = 0;

  // Set camera initial position
  customCamera.setAttribute('position', `${cameraPosition.x} ${cameraPosition.y} ${cameraPosition.z}`);

  // Add an event listener for device orientation changes
  window.addEventListener('deviceorientation', function name(event) {
    // Adjust camera position based on device orientation
    // You may need to fine-tune these values to match your desired movement
    const sensitivity = 0.01;
    cameraPosition.z += event.beta * sensitivity; // Adjust forward/backward movement
    cameraPosition.x += event.gamma * sensitivity; // Adjust left/right movement

    // Update camera position
    customCamera.setAttribute('position', `${cameraPosition.x} ${cameraPosition.y} ${cameraPosition.z}`);
  });
</script>
