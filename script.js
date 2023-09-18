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

// FOR OPENBTN2
const openButtons2 = document.getElementsByClassName("openBTN2");
const closeButton2 = document.getElementById("closeButton2");
const popup2 = document.getElementById("popup2");
for (let i = 0; i < openButtons2.length; i++) {
    openButtons2[i].addEventListener("click", function () {
        const orderId2 = this.getAttribute("data-order-id");
        // Store the orderId in local storage
        localStorage.setItem("orderId", orderId2);
        // Display the popup
        popup2.style.display = "block";
    });
}

// Function to close the popup
closeButton2.addEventListener("click", function () {
    // localStorage.removeItem("orderId");
    popup2.style.display = "none";
});
