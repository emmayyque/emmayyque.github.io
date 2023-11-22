// Testimonials Slider Display
const btnPrev = document.getElementById("btnPrev").addEventListener("click", slider);
const btnNext = document.getElementById("btnNext").addEventListener("click", slider);

let counter = 2;

function slider (e) {
    // alert(e.srcElement.id);
    // alert(this.id);
    // console.log(e.srcElement.id + "id here");

    let slide1 = document.getElementById("slide1");
    let slide2 = document.getElementById("slide2");
    let slide3 = document.getElementById("slide3");

    
   

    if (this.id== "btnNext") {
        if (counter == 1) {
            console.log('in inner if 1')
            slide1.style.opacity = "0.5";
            slide1.style.transform = "translateX(285px) scale(1.1)"
            slide1.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide1.style.zIndex = "2"
 
            slide2.style.opacity = "1";
            slide2.style.transform = "translateX(0px) scale(1.3)";
            slide2.style.boxShadow = "0px 0px 25px rgb(0, 0, 0, 0.8)";
            slide2.style.zIndex = "3"

            slide3.style.opacity = "0.5";
            slide3.style.transform = "translateX(-285px) scale(1.1)";
            slide3.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide3.style.zIndex = "2";

            counter++;
        }
        else if (counter == 2) {
            console.log('in inner if 2')
            slide1.style.opacity = "0.1";
            slide1.style.transform = "translateX(320px) scale(1)"
            slide1.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide1.style.zIndex = "1"
 
            slide2.style.opacity = "0.3";
            slide2.style.transform = "translateX(0px) scale(1.1)";
            slide2.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide2.style.zIndex = "2"

            slide3.style.opacity = "1";
            slide3.style.transform = "translateX(-300px) scale(1.3)";
            slide3.style.boxShadow = "0px 0px 25px rgb(0, 0, 0, 0.8)";
            slide3.style.zIndex = "3";
            
            counter++;
        }
        else if (counter == 3) {
            console.log('in inner if 3')
            counter = 1;

            slide1.style.opacity = "1";
            slide1.style.transform = "translateX(300px) scale(1.3)"
            slide1.style.boxShadow = "0px 0px 25px rgb(0, 0, 0, 0.8)";
            slide1.style.zIndex = "3"
 
            slide2.style.opacity = "0.3";
            slide2.style.transform = "translateX(0px) scale(1.1)";
            slide2.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide2.style.zIndex = "2"

            slide3.style.opacity = "0.1";
            slide3.style.transform = "translateX(-320px) scale(1)";
            slide3.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide3.style.zIndex = "1";
        }
    } else if (this.id == "btnPrev") {
        if (counter == 1) {
            console.log('in inner if 4')
            counter = 3;

            slide1.style.opacity = "0.1";
            slide1.style.transform = "translateX(320px) scale(1)"
            slide1.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide1.style.zIndex = "1"
 
            slide2.style.opacity = "0.5";
            slide2.style.transform = "translateX(0px) scale(1.1)";
            slide2.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide2.style.zIndex = "2"

            slide3.style.opacity = "1";
            slide3.style.transform = "translateX(-300px) scale(1.3)";
            slide3.style.boxShadow = "0px 0px 25px rgb(0, 0, 0, 0.8)";
            slide3.style.zIndex = "3";
        }
        else if (counter == 2) {
            console.log('in inner if 5')
            
            slide1.style.opacity = "1";
            slide1.style.transform = "translateX(300px) scale(1.3)"
            slide1.style.boxShadow = "0px 0px 25px rgb(0, 0, 0, 0.8)";
            slide1.style.zIndex = "3"
 
            slide2.style.opacity = "0.3";
            slide2.style.transform = "translateX(0px) scale(1.1)";
            slide2.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide2.style.zIndex = "2"

            slide3.style.opacity = "0.1";
            slide3.style.transform = "translateX(-320px) scale(1)";
            slide3.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide3.style.zIndex = "1";
            
            counter--;
        }
        else if (counter == 3) {
            console.log('in inner if 6')

            slide1.style.opacity = "0.3";
            slide1.style.transform = "translateX(300px) scale(1.1)"
            slide1.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide1.style.zIndex = "2"
 
            slide2.style.opacity = "1";
            slide2.style.transform = "translateX(0px) scale(1.3)";
            slide2.style.boxShadow = "0px 0px 25px rgb(0, 0, 0, 0.8)";
            slide2.style.zIndex = "3"

            slide3.style.opacity = "0.3";
            slide3.style.transform = "translateX(-300px) scale(1.1)";
            slide3.style.boxShadow = "0px 0px 15px rgb(0, 0, 0, 0.8)";
            slide3.style.zIndex = "2";
            
            counter--;
        }    
    }
    console.log(counter);
}
