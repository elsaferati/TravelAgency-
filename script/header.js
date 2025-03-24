function openMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "flex";
}

function closeMenu() {
    const navigationElement = document.getElementById("navigation");
    navigationElement.style.display = "none";
}
// Function to show the modal with smooth transition
function openModal() {
    const modal = document.getElementById("bookingModal");
    modal.style.display = "flex";
    modal.classList.add("open");
}

// Function to close the modal with smooth transition
function closeModal() {
    const modal = document.getElementById("bookingModal");
    modal.classList.remove("open");
    setTimeout(() => {
        modal.style.display = "none";
    }, 300); // Match the duration of the fade-out animation
}

// Calculate price based on dates
function updatePrice() {
    const checkInDate = document.getElementById("checkIn").value;
    const checkOutDate = document.getElementById("checkOut").value;
    const priceField = document.getElementById("price");
    const submitButton = document.getElementById("submitButton");

    // Default price per night (adjust as needed)
    const pricePerNight = 180;

    // Check if dates are valid and calculate the price
    if (checkInDate && checkOutDate && new Date(checkInDate) < new Date(checkOutDate)) {
        const nights = Math.ceil((new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24));
        priceField.value = `$${pricePerNight * nights}`;

        // Enable the submit button when dates are valid
        submitButton.disabled = false;
    } else {
        priceField.value = ""; // Clear price if dates are invalid
        submitButton.disabled = true; // Disable submit button when dates are invalid
    }
}

// Handle form submission
document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Booking confirmed! We will contact you soon.");
    closeModal();
});

// Add event listeners for date inputs to update the price dynamically
document.addEventListener("DOMContentLoaded", function() {
    const checkInInput = document.getElementById("checkIn");
    const checkOutInput = document.getElementById("checkOut");

    // Add event listeners to update price on change of dates
    checkInInput.addEventListener("change", updatePrice);
    checkOutInput.addEventListener("change", updatePrice);
});



