// Define an array of image sources
const imageSources = [
    '/images/Alferdo Pasta',
    '/images/flaming wings',
    '/images/Oven baked wings.webp',
];

let currentIndex = 0;

// Function to update the modal image
function updateModalImage() {
    const modalImage = document.getElementById('modalImage');
    modalImage.src = imageSources[currentIndex];

    // Increment the index or reset to 0 if it reaches the end
    currentIndex = (currentIndex + 1) % imageSources.length;
}


// Set interval to change the image every 3 seconds
const intervalId = setInterval(updateModalImage, 3000);

// Function to stop the interval when the modal is closed
function closeModal() {
    clearInterval(intervalId);
    // Add the rest of your closeModal logic here
}

// Call updateModalImage initially to set the first image
updateModalImage();

// Function to open the modal and display details
function addToCart() {
    // Get references to modal elements
    var modal = document.getElementById("cartModal");
    var modalImage = document.getElementById("modalImage");
    var modalTitle = document.getElementById("modalTitle");
    var modalDescription = document.getElementById("modalDescription");
    var modalPrice = document.getElementById("modalPrice");

    // Set modal content based on the clicked card
    modalImage.src = "/images/pexels-foodie-factor-551991.jpg"; // Replace with the actual image source
    modalTitle.textContent = "Classic Burger"; // Replace with the actual title
    modalDescription.textContent =
        "Juicy beef patty topped with fresh lettuce, tomatoes, and cheese."; // Replace with the actual description
    modalPrice.textContent = "$9.99"; // Replace with the actual price

    // Display the modal
    modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
    var modal = document.getElementById("cartModal");
    modal.style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
    var modal = document.getElementById("cartModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

