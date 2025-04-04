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
// Function to calculate the price before form submission
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

        // Set the price in the input field
        document.getElementById("price").value = totalPrice.toFixed(2);

        // Now the form will be submitted automatically with the correct data
        this.submit();  // Submit the form after calculation
    } else {
        alert("Please select valid check-in and check-out dates.");
    }
});



