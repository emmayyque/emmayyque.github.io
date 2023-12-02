let btnSign = document.getElementById('signInBtn').addEventListener("click", show);

function show() {
  let container = document.getElementById('cont');
  container.style.opacity = '1';
  container.style.zIndex = '5';

  let header = document.querySelector('header');
  header.style.pointerEvents = 'none';

  let vrBtn = document.getElementById('vrBtn');
  vrBtn.style.pointerEvents = 'none';
}

function hide() {
  let container = document.getElementById('cont');
  container.style.opacity = '0';
  container.style.zIndex = '-5';

  let header = document.querySelector('header');
  header.style.pointerEvents = 'all';

  let vrBtn = document.getElementById('vrBtn');
  vrBtn.style.pointerEvents = 'all';


}

function shiftPanel() {  
  const card = document.getElementById('textCard');
  let closeBtn = document.getElementById('closeBtn');
  let msg = document.getElementById('textHeading').innerHTML;
  if (msg === "Welcome Back") {    
    document.getElementById('textHeading').innerHTML = "Welcome";
    document.getElementById('textPara').innerHTML = "Welcome to the VR Art Gallery! Join us and unlock a world of immersive artistic experiences. Sign up now!";
    
    closeBtn.style.textAlign = 'right';
    card.style.transform = 'translateX(430px)';
    const signInFrm = document.getElementById('signInFrmRight');
    const signUpFrm = document.getElementById('signUpFrmRight');
    signInFrm.style.opacity = '0';
    signInFrm.style.zIndex = '10';
    signUpFrm.style.opacity = '1';
    signUpFrm.style.zIndex = '20';
    signInFrm.style.transform = 'translateX(-450px)';
    signUpFrm.style.transform = 'translateX(-445px)';
  }
  else {
    document.getElementById('textHeading').innerHTML = "Welcome Back";
    document.getElementById('textPara').innerHTML = "Dive into a world of creativity with your login credentials.";
    
    card.style.transform = 'translateX(0)';
    const signInFrm = document.getElementById('signInFrmRight');
    const signUpFrm = document.getElementById('signUpFrmRight');
    signInFrm.style.opacity = '1';
    signInFrm.style.zIndex = '20';
    signUpFrm.style.opacity = '0';
    signUpFrm.style.zIndex = '10';
    signInFrm.style.transform = 'translateX(0)';
    signUpFrm.style.transform = 'translateX(0)';
    
  }
  // console.log(check);
  
}



// document.getElementById('joystick-down').addEventListener('click', () => {
//   // Move the camera or your entity backward when the "Down" button is clicked.
//   const camera = document.querySelector('a-camera');
//   const position = camera.getAttribute('position');
//   position.z += 5; // Adjust the movement step as needed.
//   camera.setAttribute('position', position);
// });

// document.getElementById('joystick-left').addEventListener('click', () => {
//   const camera = document.querySelector('a-camera');
//   const currentRotation = camera.getAttribute('rotation');
//         camera.setAttribute('rotation', {
//           x: currentRotation.x,
//           y: currentRotation.y - 10, // Adjust the rotation angle as needed
//           z: currentRotation.z,
//         });
//         console.log(currentRotation);
// });

// document.getElementById('joystick-right').addEventListener('click', () => {
//   const camera = document.querySelector('a-camera');
//   const currentRotation = camera.getAttribute('rotation');
//         camera.setAttribute('rotation', {
//           x: currentRotation.x,
//           y: currentRotation.y + 10, // Adjust the rotation angle as needed
//           z: currentRotation.z,
//         });
//         console.log(currentRotation);
// });

// For Navigation Menu
// document.getElementById('btn-lmRm').addEventListener('click', () => {
//   const camera = document.querySelector('a-camera');
//   const currentPosition = camera.getAttribute('position');
//   camera.setAttribute('position', {
//     x: 2000, 
//     y: 150,
//     z: 0,
//   });
//   console.log(currentPosition)
// }
// )

