let reviewTab = document.getElementById("review-tab")
document.getElementById("close-btn").addEventListener('click', hideReviewTab)

document.getElementById('Art-1').addEventListener('click', showReviewTab)
document.getElementById('Art-2').addEventListener('click', showReviewTab)
document.getElementById('Art-3').addEventListener('click', showReviewTab)
document.getElementById('Art-4').addEventListener('click', showReviewTab)
// document.getElementById('Art-5').addEventListener('click', showReviewTab)
document.getElementById('Art-6').addEventListener('click', showReviewTab)
document.getElementById('Art-7').addEventListener('click', showReviewTab)
// document.getElementById('Art-8').addEventListener('click', showReviewTab)
// document.getElementById('Art-9').addEventListener('click', showReviewTab)
document.getElementById('Art-10').addEventListener('click', showReviewTab)
document.getElementById('Art-11').addEventListener('click', showReviewTab)
// document.getElementById('Art-12').addEventListener('click', showReviewTab)
document.getElementById('Art-13').addEventListener('click', showReviewTab)
// document.getElementById('Art-14').addEventListener('click', showReviewTab)
document.getElementById('Art-15').addEventListener('click', showReviewTab)

// document.getElementById('Art-16').addEventListener('click', showReviewTab)
// let art13 = document.getElementById("Art-13")

// console.log(art13)


console.log(reviewTab)
function showReviewTab(e) {
    let itemName = document.getElementById("item-name")
    
    reviewTab.style.display = "block";
    itemName.innerHTML = e.srcElement.id
    // console.log('Mouse entered the box');
}

function hideReviewTab() {
    reviewTab.style.display = "none";
}