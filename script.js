// Get references to the buttons with the "openBTN" class
const openButtons = document.getElementsByClassName("openBTN");
const closeButton = document.getElementById("closeButton");
const popup = document.getElementById("popup");

// Function to open the popup for each button
for (let i = 0; i < openButtons.length; i++) {
    openButtons[i].addEventListener("click", function () {
        popup.style.display = "block";
    });
}

// Function to close the popup
closeButton.addEventListener("click", function () {
    popup.style.display = "none";
});


// Button for Read More
// Get a reference to the "Read More" button and the hidden content
const readMoreButton = document.querySelector('.read-more-button');
const hiddenContent = document.querySelector('.hid_con');

// Variable to keep track of the state
let isHidden = true;

// Add a click event listener to the button
readMoreButton.addEventListener('click', function () {
    if (isHidden) {
        // Show the hidden content
        hiddenContent.style.display = 'block';
        readMoreButton.textContent = 'Read Less';
        isHidden = false;
    } else {
        // Hide the hidden content
        hiddenContent.style.display = 'none';
        readMoreButton.textContent = 'Read More';
        isHidden = true;
    }
});
