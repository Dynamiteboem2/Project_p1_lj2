// Event-datum mapping
const eventDates = {
    'Milaan 2024': ['20 oktober vanaf 11:00 OKTOBER, 2024', '20 oktober vanaf 12:00 OKTOBER, 2024', '20 oktober vanaf 14:00 OKTOBER, 2024', '20 oktober vanaf 16:00 OKTOBER, 2024', 
                    '21 oktober vanaf 11:00 OKTOBER, 2024', '21 oktober vanaf 12:00 OKTOBER, 2024', '21 oktober vanaf 14:00 OKTOBER, 2024', '21 oktober vanaf 16:00 OKTOBER, 2024'],
   
    'Budapest 2024': ['23 oktober vanaf 11:00 OKTOBER, 2024', '23 oktober vanaf 12:00 OKTOBER, 2024', '23 oktober vanaf 14:00 OKTOBER, 2024', '23 oktober vanaf 16:00 OKTOBER, 2024',
                      '24 oktober vanaf 11:00 OKTOBER, 2024', '24 oktober vanaf 12:00 OKTOBER, 2024', '24 oktober vanaf 14:00 OKTOBER, 2024', '24 oktober vanaf 16:00 OKTOBER, 2024'],
    
    'Rotterdam 2024': ['26 oktober vanaf 11:00 OKTOBER, 2024', '26 oktober vanaf 12:00 OKTOBER, 2024', '26 oktober vanaf 14:00 OKTOBER, 2024', '26 oktober vanaf 16:00 OKTOBER, 2024',
                       '27 oktober vanaf 11:00 OKTOBER, 2024', '27 oktober vanaf 12:00 OKTOBER, 2024', '27 oktober vanaf 14:00 OKTOBER, 2024', '27 oktober vanaf 16:00 OKTOBER, 2024']
};

// Ticketprijzen per evenement en datum
const ticketPrices = {
    'Milaan 2024': {
        '20 oktober vanaf 11:00 OKTOBER, 2024': 50,
        '20 oktober vanaf 12:00 OKTOBER, 2024': 15,
        '20 oktober vanaf 14:00 OKTOBER, 2024': 12,
        '20 oktober vanaf 16:00 OKTOBER, 2024': 11,
        '21 oktober vanaf 11:00 OKTOBER, 2024': 50,
        '21 oktober vanaf 12:00 OKTOBER, 2024': 15,
        '21 oktober vanaf 14:00 OKTOBER, 2024': 12,
        '21 oktober vanaf 16:00 OKTOBER, 2024': 11
    },
    'Budapest 2024': {
        '23 oktober vanaf 11:00 OKTOBER, 2024': 50,
        '23 oktober vanaf 12:00 OKTOBER, 2024': 15,
        '23 oktober vanaf 14:00 OKTOBER, 2024': 12,
        '23 oktober vanaf 16:00 OKTOBER, 2024': 11,
        '24 oktober vanaf 11:00 OKTOBER, 2024': 50,
        '24 oktober vanaf 12:00 OKTOBER, 2024': 15,
        '24 oktober vanaf 14:00 OKTOBER, 2024': 12,
        '24 oktober vanaf 16:00 OKTOBER, 2024': 11
    },
    'Rotterdam 2024': {
        '26 oktober vanaf 11:00 OKTOBER, 2024': 50,
        '26 oktober vanaf 12:00 OKTOBER, 2024': 15,
        '26 oktober vanaf 14:00 OKTOBER, 2024': 12,
        '26 oktober vanaf 16:00 OKTOBER, 2024': 11,
        '27 oktober vanaf 11:00 OKTOBER, 2024': 50,
        '27 oktober vanaf 12:00 OKTOBER, 2024': 15,
        '27 oktober vanaf 14:00 OKTOBER, 2024': 12,
        '27 oktober vanaf 16:00 OKTOBER, 2024': 11
    }
};

// Popup elementen
const ticketButtons = document.querySelectorAll('.ticket-btn');
const eventSelect = document.getElementById('event-select');
const dateSelect = document.getElementById('date-select');
const ticketQuantity = document.getElementById('ticket-quantity');

// Toon popup bij het klikken op een ticket button
ticketButtons.forEach(button => {
    button.addEventListener('click', function() {
        const eventName = this.getAttribute('data-event');
        // Update de form met het geselecteerde evenement
        eventSelect.value = eventName;
        updateDateOptions(eventName);

        // Toon de popup
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
    });
});

// Update datumopties wanneer een evenement wordt gekozen
eventSelect.addEventListener('change', function() {
    const selectedEvent = this.value;
    updateDateOptions(selectedEvent);
});

// Functie om de datumopties bij te werken op basis van het gekozen evenement
function updateDateOptions(event) {
    const dates = eventDates[event] || [];
    dateSelect.innerHTML = '<option value="" disabled selected>Kies een evenementdatum</option>'; // Reset opties

    dates.forEach(date => {
        const option = document.createElement('option');
        option.value = date;
        option.textContent = date;
        dateSelect.appendChild(option);
    });
}

// Functie om de totaalprijs te berekenen
function updateTotalPrice() {
    const selectedEvent = eventSelect.value;
    const selectedDate = dateSelect.value;
    const quantity = parseInt(ticketQuantity.value);
    
    const price = ticketPrices[selectedEvent]?.[selectedDate] || 0; // Prijs ophalen
    const totalPrice = price * quantity; // Totaalprijs berekenen

    // Update de totaalprijs in de popup
    document.getElementById('total-price').textContent = `Totaalprijs: €${totalPrice}`;
}

// Event listener voor datum wijziging
dateSelect.addEventListener('change', updateTotalPrice);

// Event listener voor ticket hoeveelheid wijziging
ticketQuantity.addEventListener('input', updateTotalPrice);

// Sluit popup
document.getElementById("closePopup").addEventListener("click", function() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
});

// Knoppen voor het aanpassen van de tickethoeveelheid
const decreaseButton = document.getElementById('decrease');
const increaseButton = document.getElementById('increase');

// Event listener voor de verlaag-knop
decreaseButton.addEventListener('click', function() {
    let currentValue = parseInt(ticketQuantity.value);
    if (currentValue > 1) {
        ticketQuantity.value = currentValue - 1;
        updateTotalPrice(); // Update totaalprijs bij verlagen van de hoeveelheid
    }
});

// Event listener voor de verhoog-knop
increaseButton.addEventListener('click', function() {
    let currentValue = parseInt(ticketQuantity.value);
    if (currentValue < 10) { // Max 10 tickets
        ticketQuantity.value = currentValue + 1;
        updateTotalPrice(); // Update totaalprijs bij verhogen van de hoeveelheid
    }
});

// Validatie voor telefoonnummer
document.getElementById('phone').addEventListener('input', function() {
    const phoneInput = this.value;
    const phonePattern = /^(\+31\s6\d{8}|(\+\d{1,3}\s?\d{1,14}))$/;  // Accepteert NL en buitenlandse nummers

    if (!phonePattern.test(phoneInput)) {
        this.setCustomValidity('Voer een geldig telefoonnummer in, zoals: +31 612345678 of +44 7911 123456');
    } else {
        this.setCustomValidity('');  // Reset de foutmelding als het nummer geldig is
    }
});

