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

// Handle date change and recalculate the price
document.getElementById("checkIn").addEventListener("change", function() {
    updatePrice();
});

document.getElementById("checkOut").addEventListener("change", function() {
    updatePrice();
});

// Calculate price based on dates
function updatePrice() {
    const checkInDate = document.getElementById("checkIn").value;
    const checkOutDate = document.getElementById("checkOut").value;
    const priceField = document.getElementById("price");

    // Default price per night (You can adjust this value as needed)
    const pricePerNight = 180;

    // Check if dates are valid and calculate the price
    if (checkInDate && checkOutDate && new Date(checkInDate) < new Date(checkOutDate)) {
        const nights = Math.ceil((new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24));
        priceField.value = `$${pricePerNight * nights}`;
    } else {
        priceField.value = ""; // Clear price if dates are invalid
    }
}

// Handle form submission
document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Booking confirmed! We will contact you soon.");
    closeModal();
});


