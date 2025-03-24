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

document.addEventListener("DOMContentLoaded", function() {
    const checkInInput = document.getElementById("checkIn");
    const checkOutInput = document.getElementById("checkOut");
    const priceInput = document.getElementById("price");

    // Set a default price (assuming the price is predefined)
    const pricePerNight = 180; // Change this value based on the room type

    function calculatePrice() {
        const checkInDate = new Date(checkInInput.value);
        const checkOutDate = new Date(checkOutInput.value);

        if (!isNaN(checkInDate) && !isNaN(checkOutDate) && checkOutDate > checkInDate) {
            const nights = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
            priceInput.value = nights * pricePerNight;
        } else {
            priceInput.value = ""; // Clear if dates are invalid
        }
    }

    checkInInput.addEventListener("change", calculatePrice);
    checkOutInput.addEventListener("change", calculatePrice);
});

