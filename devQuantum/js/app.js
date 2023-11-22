
// For Testimonials Sliders

const slides = document.querySelectorAll(".slide")
var counter = 0;
// console.log(slides)
slides.forEach(
  (slide, index) => {
    slide.style.left = `${index * 100}%`

  }
)

const slideImage = () => {
    slides.forEach(
        (slide) => {
            slide.style.transform = `translateX(-${counter * 100.3}%)`
        }
    )
}

const goNext = () => {
    if (counter == 2){
        counter = 0    
    } else {
        counter++
    }
    
    slideImage()
}

const goPrev = () => {
    if (counter == 0){
        counter = 2    
    } else {
        counter--
    }
    slideImage()
}


// Order Form Display
// display: none;

const card1 = document.getElementById("card1").addEventListener("click", formDisplay);
const closeBtn = document.getElementById("closeBtn").addEventListener("click", formDisplay)


function formDisplay (e) {
    let orderForm = document.getElementById("orderForm");
    let headerSec = document.getElementById("headerSec");
    let mainSec = document.getElementById("mainSec");
    let footerSec = document.getElementById("footerSec");
    // let header = document.getElementsByTagName("header");
    // let footer = document.getElementsByTagName("footer");
    if (e.srcElement.id == "card1") {
        orderForm.style.display = "flex";
        headerSec.style.pointerEvents = "none";
        mainSec.style.pointerEvents = "none";
        footerSec.style.pointerEvents = "none";
        orderForm.style.pointerEvents = "all";
        // header.style.pointerEvents = "none;"
        // footer.style.pointerEvents = "none;"
    } else if (e.srcElement.id == "closeBtn") {
        orderForm.style.display = "none";
        headerSec.style.pointerEvents = "all";
        mainSec.style.pointerEvents = "all";
        footerSec.style.pointerEvents = "all";
    }   
}
