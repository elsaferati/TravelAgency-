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

// Optionally, you can add logic to calculate the price based on the check-in/check-out dates.
document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();  // Prevent form submission to process the data

    const checkInDate = new Date(document.getElementById("checkIn").value);
    const checkOutDate = new Date(document.getElementById("checkOut").value);
    
    if (checkInDate && checkOutDate && checkOutDate > checkInDate) {
        // Calculate the price based on the number of days between check-in and check-out
        const timeDiff = checkOutDate - checkInDate;
        const days = timeDiff / (1000 * 3600 * 24); // Convert milliseconds to days
        const pricePerNight = 100;  // Assume a fixed price per night (you can change this)
        const totalPrice = days * pricePerNight;

        document.getElementById("price").value = totalPrice.toFixed(2);  // Update price field
    } else {
        alert("Please select valid check-in and check-out dates.");
    }
});

