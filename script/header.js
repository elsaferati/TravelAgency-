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
    document.getElementById("bookingModal").style.display = "flex"; // Open the modal
}

// Function to close the modal
function closeModal() {
    document.getElementById("bookingModal").style.display = "none"; // Close the modal
}

// Optional: Close the modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == document.getElementById("bookingModal")) {
        closeModal();
    }
};

// Automatically calculate price based on room type
document.getElementById("roomType").addEventListener("change", function() {
    let priceField = document.getElementById("price");
    let roomType = this.value;
    let price = roomType === "single" ? 100 : roomType === "double" ? 180 : 300;
    priceField.value = `$${price}`;
});

// Handle form submission
document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Booking confirmed! We will contact you soon.");
    closeModal(); // Close the modal after booking confirmation
});

// Hide the modal by default when the page loads
document.addEventListener("DOMContentLoaded", function() {
    closeModal(); // Ensure the modal is hidden on page load
});

// Add event listener for the "book" button to open the modal
document.getElementById("bookButton").addEventListener("click", function() {
    openModal(); // Open the modal when the book button is clicked
});



