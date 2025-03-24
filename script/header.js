function openMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "flex";
}

function closeMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "none";
}
// Function to open the modal
// Open the modal
function openModal() {
    document.getElementById("bookingModal").style.display = "flex";
}

// Function to close the modal
function closeModal() {
    document.getElementById("bookingModal").style.display = "none";
}

// Optional: Close the modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target === document.getElementById("bookingModal")) {
        closeModal();
    }
};

// Event listener to calculate the price based on check-in and check-out dates
document.getElementById("checkIn").addEventListener("change", calculatePrice);
document.getElementById("checkOut").addEventListener("change", calculatePrice);

function calculatePrice() {
    const checkInDate = new Date(document.getElementById("checkIn").value);
    const checkOutDate = new Date(document.getElementById("checkOut").value);

    if (checkInDate && checkOutDate && checkInDate < checkOutDate) {
        const timeDifference = checkOutDate - checkInDate;
        const days = timeDifference / (1000 * 3600 * 24); // Convert time difference to days
        const pricePerNight = 100; // Example price per night, can be modified

        const totalPrice = days * pricePerNight;
        document.getElementById("price").value = `$${totalPrice}`;
    } else {
        document.getElementById("price").value = ""; // Reset the price if dates are invalid
    }
}

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
