var fname = "";
var eAdd = "";
var dAdd = "";

function getInfo() {
    fname = document.getElementById("fname").value;
    eAdd = document.getElementById("eAdd").value;
    dAdd = document.getElementById("dAdd").value;

    if (fname !== "" && dAdd !== "") {
        alert("Form Submitted Successfully");
    }  
}

// Order Form Display
var idClicked = "";
function idCheck(clicked_id) {
    idClicked = clicked_id;
}

function displayDetails() {
    var checkbox = document.getElementById(idClicked);
    var menu = document.getElementById('order-form-fields-burg');
    
    if (checkbox.checked == true) {
        menu.style.display = "block";
    } else {
        menu.style.display = "none";
    }
}



// For auto-typing text animation
var typed = new Typed(".auto-type", {
    strings: ["Fresh Food", "Organic Food"],
    typeSpeed: 100,
    backSpeed: 60,
    loop: true
})

var typed = new Typed(".auto-type2", {
    strings: ["Meal Deals!"],
    typeSpeed: 100,
    backSpeed: 60,
    loop: true
})

var typed = new Typed(".auto-type3", {
    strings: ["Specials"],
    typeSpeed: 100,
    backSpeed: 60,
    loop: true
})