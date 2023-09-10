
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