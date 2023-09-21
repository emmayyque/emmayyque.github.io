
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