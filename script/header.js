function openMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "flex";
}

function closeMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "none";
}
// Function to show the modal
function openModal() {
    document.getElementById("bookingModal").style.display = "flex";
}

// Function to close the modal
function closeModal() {
    document.getElementById("bookingModal").style.display = "none";
}

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
    closeModal();
});

// Hide the modal by default when the page loads
document.addEventListener("DOMContentLoaded", function() {
    closeModal(); // Ensure the modal is hidden on page load
});

// Add event listener for the "book" button to open the modal
document.getElementById("bookButton").addEventListener("click", function() {
    openModal(); // Open the modal when the book button is clicked
});


