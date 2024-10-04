// Event-datum mapping
const eventDates = {
    'Milaan 2024': ['20 oktober vanaf 12:00 OKTOBER, 2024', '20 oktober vanaf 14:00 OKTOBER, 2024', '20 oktober vanaf 14:00 OKTOBER, 2024','21 oktober vanaf 12:00 OKTOBER, 2024', '21 oktober vanaf 14:00 OKTOBER, 2024', '21 oktober vanaf 14:00 OKTOBER, 2024'],
    'Budapest 2024': ['23 oktober vanaf 12:00 OKTOBER, 2024', '23 oktober vanaf 14:00 OKTOBER, 2024', '23 oktober vanaf 14:00 OKTOBER, 2024','24 oktober vanaf 12:00 OKTOBER, 2024', '24 oktober vanaf 14:00 OKTOBER, 2024', '24 oktober vanaf 14:00 OKTOBER, 2024'],
    'Rotterdam 2024': ['26 oktober vanaf 12:00 OKTOBER, 2024', '26 oktober vanaf 14:00 OKTOBER, 2024', '26 oktober vanaf 14:00 OKTOBER, 2024','27 oktober vanaf 12:00 OKTOBER, 2024', '27 oktober vanaf 14:00 OKTOBER, 2024', '27 oktober vanaf 14:00 OKTOBER, 2024']
};

// Ticketprijzen
const ticketPrices = {
    'Normaal': 250, // Prijs voor normaal ticket
    'VIP': 500    // Prijs voor VIP ticket
};

// Show popup when any ticket button is clicked
const ticketButtons = document.querySelectorAll('.ticket-btn');
const eventSelect = document.getElementById('event-select');
const dateSelect = document.getElementById('date-select');
const ticketQuantity = document.getElementById('ticket-quantity'); // Beweeg deze hier naar boven

ticketButtons.forEach(button => {
    button.addEventListener('click', function() {
        const eventName = this.getAttribute('data-event');
        const eventDate = this.getAttribute('data-date');

        // Update de form met het geselecteerde evenement en datum
        eventSelect.value = eventName;
        updateDateOptions(eventName);

        // Show the popup
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
    });
});

// Update date options when an event is selected
eventSelect.addEventListener('change', function() {
    const selectedEvent = this.value;
    updateDateOptions(selectedEvent);
});

// Function to update the date options based on the selected event
function updateDateOptions(event) {
    const dates = eventDates[event] || [];
    dateSelect.innerHTML = '<option value="" disabled selected>Kies een evenementdatum</option>'; // Reset options

    dates.forEach(date => {
        const option = document.createElement('option');
        option.value = date;
        option.textContent = date;
        dateSelect.appendChild(option);
    });
}

// Functie om de totaalprijs te berekenen
function updateTotalPrice() {
    const ticketType = document.getElementById('ticket-type').value;
    const quantity = parseInt(ticketQuantity.value);

    const price = ticketPrices[ticketType] || 0; // Prijs ophalen
    const totalPrice = price * quantity; // Totaalprijs berekenen

    // Update de totaalprijs in de popup
    document.getElementById('total-price').textContent = `Totaalprijs: €${totalPrice}`;
}

// Event listener voor ticket type wijziging
document.getElementById('ticket-type').addEventListener('change', updateTotalPrice);

// Event listener voor ticket hoeveelheid wijziging
ticketQuantity.addEventListener('input', updateTotalPrice);

// Close popup
document.getElementById("closePopup").addEventListener("click", function() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
});

const decreaseButton = document.getElementById('decrease');
const increaseButton = document.getElementById('increase');

// Event listener for the decrease button
decreaseButton.addEventListener('click', function() {
    let currentValue = parseInt(ticketQuantity.value);
    if (currentValue > 1) {
        ticketQuantity.value = currentValue - 1;
        updateTotalPrice(); // Update total price when quantity decreases
    }
});

// Event listener for the increase button
increaseButton.addEventListener('click', function() {
    let currentValue = parseInt(ticketQuantity.value);
    if (currentValue < 10) { // Max 10 tickets
        ticketQuantity.value = currentValue + 1;
        updateTotalPrice(); // Update total price when quantity increases
    }
});
