// Setting Up Event Listeners on buttons
document.getElementById('btn-lmRm').addEventListener('click', changePosition)
document.getElementById('btn-mnHl').addEventListener('click', changePosition)
document.getElementById('btn-arRm').addEventListener('click', changePosition)

function changePosition (e) {
    const sourceID = e.srcElement.id;

    const camera = document.querySelector('a-camera');
    const currentPosition = camera.getAttribute('position');

    if (sourceID === "btn-lmRm") {
        camera.setAttribute('position', {
            x: 2000, 
            y: currentPosition.y,
            z: currentPosition.z,
        });
        console.log(camera.getAttribute('rotation'))
        camera.setAttribute('rotation', { x: 0, y: 0, z: 0 });
        console.log(camera.getAttribute('rotation'))
        console.log(currentPosition)
    } 
    else if (sourceID === "btn-mnHl") {
        camera.setAttribute('position', {
            x: 0, 
            y: currentPosition.y,
            z: 0,
        });
        camera.setAttribute('rotation', {
            x: 0,
            y: 0,
            z: 0,
        })
        console.log(currentPosition)
    }
    else if (sourceID === "btn-arRm") {
        camera.setAttribute('position', {
            x: -2000, 
            y: currentPosition.y,
            z: currentPosition.z,
        });
        camera.setAttribute('rotation', {
            x: 0,
            y: 0,
            z: 0,
        })
        console.log(currentPosition)
    }
    
}

function getPosition () {
    console.log("hello")
    const camera = document.querySelector('a-camera');
    const currentPosition = camera.getAttribute('position');
    console.log(currentPosition)
}

let counter = 0;
let counterDown = 0;
let intervalId;

const joystickUp = document.getElementById('joystick-up');
const joystickDown = document.getElementById('joystick-down');
const joystickLeft = document.getElementById('joystick-left');
const joystickRight = document.getElementById('joystick-right');
const counterElement = document.getElementById('counter');


// Moving Forward
joystickUp.addEventListener('mousedown', () => {
    counter = 0;
    const camera = document.querySelector('a-camera');
    const currentPosition = camera.getAttribute('position');

    intervalId = setInterval(() => {
        counter++;
        camera.setAttribute('position', {
            x: currentPosition.x, 
            y: currentPosition.y,
            z: currentPosition.z - counter,
        });
    }, 100);
});

joystickUp.addEventListener('mouseup', () => {
    clearInterval(intervalId);
});

joystickUp.addEventListener('mouseout', () => {
    clearInterval(intervalId);
});

joystickDown.addEventListener('mousedown', () => {
    counter = 0;
    const camera = document.querySelector('a-camera');
    const currentPosition = camera.getAttribute('position');
    intervalId = setInterval(() => {
        counter++;
        camera.setAttribute('position', {
            x: currentPosition.x, 
            y: currentPosition.y,
            z: currentPosition.z + counter,
        });
    }, 100);
});

joystickDown.addEventListener('mouseup', () => {
    clearInterval(intervalId);
});

joystickDown.addEventListener('mouseout', () => {
    clearInterval(intervalId);
});

joystickLeft.addEventListener('mousedown', () => {
    counter = 0;
    const camera = document.querySelector('a-camera');
    const currentRotation = camera.getAttribute('rotation');
    intervalId = setInterval(() => {
        counter++;
        camera.setAttribute('rotation', {
            x: currentRotation.x,
            y: currentRotation.y - counter, // Adjust the rotation angle as needed
            z: currentRotation.z,
        });
    }, 100);
});


//         

joystickLeft.addEventListener('mouseup', () => {
    clearInterval(intervalId);
});

joystickLeft.addEventListener('mouseout', () => {
    clearInterval(intervalId);
});

