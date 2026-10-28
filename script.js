const seatsGrid = [
    [false, false, false, false, false],  // Row 1
    [false, false, false, false, false],  // Row 2
    [false, false, false, false, false],  // Row 3
    [false, false, false, false, false],  // Row 4
    [false, false, false, false, false],  // Row 5
]; // Example grid: false means available, true means booked

let selectedSeats = [];

function showSeats() {
    // Hide form and show seat selection
    document.getElementById("bookingForm").style.display = "none";
    document.getElementById("seatSelection").style.display = "block";

    // Generate the seat grid dynamically
    const seatsContainer = document.querySelector(".seats");
    seatsContainer.innerHTML = ''; // Clear previous grid

    for (let row = 0; row < seatsGrid.length; row++) {
        for (let col = 0; col < seatsGrid[row].length; col++) {
            const seat = document.createElement("div");
            seat.classList.add("seat");
            if (seatsGrid[row][col]) {
                seat.classList.add("booked");
                seat.innerText = "B"; // Booked
            } else {
                seat.addEventListener("click", () => toggleSeat(row, col, seat));
            }
            seatsContainer.appendChild(seat);
        }
    }
}

function toggleSeat(row, col, seatElement) {
    // If the seat is booked, do nothing
    if (seatElement.classList.contains("booked")) {
        return;
    }

    // Toggle selected state
    if (seatElement.classList.contains("selected")) {
        seatElement.classList.remove("selected");
        selectedSeats = selectedSeats.filter(seat => seat.row !== row || seat.col !== col);
    } else {
        seatElement.classList.add("selected");
        selectedSeats.push({ row, col });
    }
}

function bookSeats() {
    // If the number of selected seats doesn't match the user's input, show an alert
    const tickets = document.getElementById("tickets").value;
    if (selectedSeats.length !== parseInt(tickets)) {
        alert(`Please select ${tickets} seat(s)`);
        return;
    }

    // Book selected seats and show confirmation
    selectedSeats.forEach(seat => {
        seatsGrid[seat.row][seat.col] = true;
    });

    const movie = document.getElementById("movie").value;
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;

    // Show confirmation message
    const confirmationMessage = `Booking confirmed for ${name} (${email})! You have booked ${selectedSeats.length} ticket(s) for ${movie}.`;

    document.getElementById("seatSelection").style.display = "none";
    const confirmationDiv = document.getElementById("confirmation");
    confirmationDiv.style.display = "block";
    document.getElementById("confirmationMessage").textContent = confirmationMessage;
}
