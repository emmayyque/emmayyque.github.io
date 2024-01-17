let artId;

let reviewTab = document.getElementById("review-tab")
document.getElementById("close-btn").addEventListener('click', hideReviewTab)
document.getElementById("close-btn1").addEventListener('click', hideChangeArtTab)
// Artwork Options Calling // To Show Menu
document.getElementById('Art-1').addEventListener('click', showMenu)
document.getElementById('Art-2').addEventListener('click', showMenu)
document.getElementById('Art-3').addEventListener('click', showMenu)
document.getElementById('Art-4').addEventListener('click', showMenu)
document.getElementById('Art-6').addEventListener('click', showMenu)
document.getElementById('Art-7').addEventListener('click', showMenu)
document.getElementById('Art-10').addEventListener('click', showMenu)
document.getElementById('Art-11').addEventListener('click', showMenu)
document.getElementById('Art-13').addEventListener('click', showMenu)
document.getElementById('Art-15').addEventListener('click', showMenu)
// Main Hall Art Works
document.getElementById('Art-18').addEventListener('click', showMenu)
document.getElementById('Art-19').addEventListener('click', showMenu)
document.getElementById('Art-20').addEventListener('click', showMenu)
document.getElementById('Art-21').addEventListener('click', showMenu)
document.getElementById('Art-22').addEventListener('click', showMenu)
document.getElementById('Art-23').addEventListener('click', showMenu)
// LandMarks
document.getElementById('LandMark-1').addEventListener('click', showMenu)
document.getElementById('LandMark-2').addEventListener('click', showMenu)

// To Hide Menu Tab
document.getElementById("menu").addEventListener('mouseleave', hideMenu)

// Buttons 
document.getElementById("changeBtn").addEventListener('click', showChangeArtTab)
document.getElementById("reviewBtn").addEventListener('click', showReviewTab)

console.log(reviewTab)
var i = 0;
function showMenu(e) {
    
    artId = e.srcElement.id
    let somePHP = "<?php $artID = Art-21?>";    
    console.log("Value of i: "+i);
    document.cookie = "artId"+i+"="+artId
    i++;
    console.log("artId"+i+"="+artId);
    console.log("Value of i: "+i);
    console.log(artId)
    console.log(document.cookie)
    // console.log(somePHP)
    // let artID = document.getElementById("artID")
    // artID.innerHTML = somePHP;
    // console.log(artId)
    document.getElementById("menu").style.display = "block"
    // console.log('Mouse entered the box');
}

function hideMenu(e) {
    document.getElementById("menu").style.display = "none"
    // console.log('Mouse entered the box');
}

function showReviewTab() {
    document.getElementById("menu").style.display = "none"
    let itemName = document.getElementById("item-name")
    
    // Step 1: Get the form element
    let form = document.getElementById('reviewForm');

    // Step 2: Get the input element
    let artNumField = form.querySelector('#artNumField');

    console.log("Field: "+artNumField);
    
    console.log(artId);
    reviewTab.style.display = "block";
    itemName.innerHTML = artId
    artNumField.value = artId
    // console.log('Mouse entered the box');
}

function hideReviewTab() {
    reviewTab.style.display = "none";
}

function showChangeArtTab() {
    document.getElementById("menu").style.display = "none"
    document.getElementById("changeArtTab").style.display = "block"
    // let itemName1 = document.getElementById("item-name1")
    let artNumField1 = document.getElementById('artNumField1')

    // itemName1.innerHTML = artId
    artNumField1.value = artId
    // console.log('Mouse entered the box');
}

function hideChangeArtTab() {
    document.getElementById("changeArtTab").style.display = "none"
    // console.log('Mouse entered the box');
}

document.getElementById('Art-1').addEventListener('mouseenter', showID)
document.getElementById('Art-2').addEventListener('mouseenter', showID)
document.getElementById('Art-3').addEventListener('mouseenter', showID)
document.getElementById('Art-4').addEventListener('mouseenter', showID)
document.getElementById('Art-6').addEventListener('mouseenter', showID)
document.getElementById('Art-7').addEventListener('mouseenter', showID)
document.getElementById('Art-10').addEventListener('mouseenter', showID)
document.getElementById('Art-11').addEventListener('mouseenter', showID)
document.getElementById('Art-13').addEventListener('mouseenter', showID)
document.getElementById('Art-15').addEventListener('mouseenter', showID)
// Main Hall Art Works
document.getElementById('Art-18').addEventListener('mouseenter', showID)
document.getElementById('Art-19').addEventListener('mouseenter', showID)
document.getElementById('Art-20').addEventListener('mouseenter', showID)
document.getElementById('Art-21').addEventListener('mouseenter', showID)
document.getElementById('Art-22').addEventListener('mouseenter', showID)
document.getElementById('Art-23').addEventListener('mouseenter', showID)
// LandMarks
document.getElementById('LandMark-1').addEventListener('mouseenter', showID)
document.getElementById('LandMark-2').addEventListener('mouseenter', showID)

document.getElementById('Art-1').addEventListener('mouseleave', hideID)
document.getElementById('Art-2').addEventListener('mouseleave', hideID)
document.getElementById('Art-3').addEventListener('mouseleave', hideID)
document.getElementById('Art-4').addEventListener('mouseleave', hideID)
document.getElementById('Art-6').addEventListener('mouseleave', hideID)
document.getElementById('Art-7').addEventListener('mouseleave', hideID)
document.getElementById('Art-10').addEventListener('mouseleave', hideID)
document.getElementById('Art-11').addEventListener('mouseleave', hideID)
document.getElementById('Art-13').addEventListener('mouseleave', hideID)
document.getElementById('Art-15').addEventListener('mouseleave', hideID)
// Main Hall Art Works
document.getElementById('Art-18').addEventListener('mouseleave', hideID)
document.getElementById('Art-19').addEventListener('mouseleave', hideID)
document.getElementById('Art-20').addEventListener('mouseleave', hideID)
document.getElementById('Art-21').addEventListener('mouseleave', hideID)
document.getElementById('Art-22').addEventListener('mouseleave', hideID)
document.getElementById('Art-23').addEventListener('mouseleave', hideID)
// LandMarks
document.getElementById('LandMark-1').addEventListener('mouseleave', hideID)
document.getElementById('LandMark-2').addEventListener('mouseleave', hideID)

function showID(e) {
    let artIDShow = document.getElementById("artIDShow");
    artIDShow.innerHTML = e.srcElement.id;
    reviewTab.style.display = "none";
}

function hideID(e) {
    let artIDShow = document.getElementById("artIDShow");
    artIDShow.innerHTML = ""
}
