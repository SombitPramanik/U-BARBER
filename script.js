const openButtons = document.getElementsByClassName("openBTN");
const closeButton = document.getElementById("closeButton");
const popup = document.getElementById("popup");
for (let i = 0; i < openButtons.length; i++) {
    openButtons[i].addEventListener("click", function () {
        const orderId = this.getAttribute("data-order-id");
        const price = this.getAttribute("price")
        
        // Store the orderId in local storage
        localStorage.setItem("orderId", orderId);
        localStorage.setItem("price",price);
        
        // Display the popup
        popup.style.display = "block";
    });
}

// Function to close the popup
closeButton.addEventListener("click", function () {
    // localStorage.removeItem("orderId");
    popup.style.display = "none";
});
