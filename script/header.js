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
// Function to calculate the price and submit the form via AJAX
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

        // Prepare the data to send via AJAX
        const bookingData = {
            fullName: document.getElementById("fullName").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            checkIn: document.getElementById("checkIn").value,
            checkOut: document.getElementById("checkOut").value,
            totalPrice: totalPrice.toFixed(2)
        };

        // Send the data to the PHP script via AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "book-room.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        let formData = "";
        for (let key in bookingData) {
            formData += `${key}=${encodeURIComponent(bookingData[key])}&`;
        }

        // Remove the trailing '&'
        formData = formData.slice(0, -1);

        // Handle the AJAX response
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Check if the response contains 'Booking confirmed!'
                if (xhr.responseText === "Booking confirmed!") {
                    alert("Booking confirmed!");
                    closeModal();  // Close the modal on success
                } else {
                    alert("Error: " + xhr.responseText);
                }
            }
        };

        // Send the form data
        xhr.send(formData);
    } else {
        alert("Please select valid check-in and check-out dates.");
    }
});


