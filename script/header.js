function openMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "flex";
}

function closeMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "none";
}
// Function to open the modal
function openModal() {
    document.getElementById("bookingModal").style.display = "block";
}

// Function to close the modal
function closeModal() {
    document.getElementById("bookingModal").style.display = "none";
}

// Close the modal if the user clicks anywhere outside of the modal content
window.onclick = function(event) {
    if (event.target == document.getElementById("bookingModal")) {
        closeModal();
    }
};

  // Function to calculate the price
  function calculatePrice() {
    const checkInDate = new Date(document.getElementById("checkIn").value);
    const checkOutDate = new Date(document.getElementById("checkOut").value);
    
    console.log("Check-in:", checkInDate, "Check-out:", checkOutDate); // Debugging

    if (!isNaN(checkInDate) && !isNaN(checkOutDate) && checkOutDate > checkInDate) {
        const timeDiff = checkOutDate - checkInDate;
        const days = timeDiff / (1000 * 3600 * 24);
        const pricePerNight = 100;  // Set room rate
        const totalPrice = days * pricePerNight;

        document.getElementById("price").value = totalPrice.toFixed(2);
    } else {
        document.getElementById("price").value = ""; // Reset price field if invalid
    }
}

// Attach event listeners to update price when dates change
document.getElementById("checkIn").addEventListener("input", calculatePrice);
document.getElementById("checkOut").addEventListener("input", calculatePrice);

// Handle form submission
document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();  // Prevent page reload
    calculatePrice();  // Ensure price is calculated
});

