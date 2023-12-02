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

// AFRAME.registerComponent('handlemodelclick', {
//     init: function () {
//       var el = this.el;
  
//       el.addEventListener('click', function () {
//         // Your interaction logic here
//         console.log('Model Clicked!');
//       });
//     }
// });

// document.getElementById("sydney_opera_house").addEventListener("click", info);

// function info(e) {
//     console.log(this.id + "Model ")
// }

// AFRAME.registerComponent('hover-events', {
//     init: function () {
//       // Reference to the component instance
//       var el = this.el;
//     //   console.log(id)
//     //   console.log(e.srcElement.id)

//       // Set up the event listeners for mouseenter and mouseleave
//       el.addEventListener('click', function (e) {

//         let reviewTab = document.getElementById("review-tab")
//         let itemName = document.getElementById("item-name")

//         reviewTab.style.display = "block";
//         itemName.innerHTML = "Item Name: " + e.srcElement.id
//         console.log('Mouse entered the box');
//         // Perform actions when the cursor enters the box
//       });

//     //   el.addEventListener('mouseleave', function () {
//     //     reviewTab.style.display = "none";
//     //     console.log('Mouse left the box');
//     //     // Perform actions when the cursor leaves the box
//     //   });
      
//       document.getElementById("close-btn").addEventListener('click', function () {
//         let reviewTab = document.getElementById("review-tab")
//         reviewTab.style.display = "none";

//       });
//     },
//   });