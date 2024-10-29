document.addEventListener("DOMContentLoaded", function () {
    
    // Event gegevens
    const eventIDs = {
        'Milaan 2024': '1',
        'Budapest 2024': '2',
        'Rotterdam 2024': '3'
    };

    const eventDates = {
        'Milaan 2024': [
            '20 oktober vanaf 11:00 OKTOBER, 2024',
            '20 oktober vanaf 12:00 OKTOBER, 2024',
            '20 oktober vanaf 14:00 OKTOBER, 2024',
            '20 oktober vanaf 16:00 OKTOBER, 2024',
            '21 oktober vanaf 11:00 OKTOBER, 2024',
            '21 oktober vanaf 12:00 OKTOBER, 2024',
            '21 oktober vanaf 14:00 OKTOBER, 2024',
            '21 oktober vanaf 16:00 OKTOBER, 2024'
        ],
        'Budapest 2024': [
            '23 oktober vanaf 11:00 OKTOBER, 2024',
            '23 oktober vanaf 12:00 OKTOBER, 2024',
            '23 oktober vanaf 14:00 OKTOBER, 2024',
            '23 oktober vanaf 16:00 OKTOBER, 2024',
            '24 oktober vanaf 11:00 OKTOBER, 2024',
            '24 oktober vanaf 12:00 OKTOBER, 2024',
            '24 oktober vanaf 14:00 OKTOBER, 2024',
            '24 oktober vanaf 16:00 OKTOBER, 2024'
        ],
        'Rotterdam 2024': [
            '26 oktober vanaf 11:00 OKTOBER, 2024',
            '26 oktober vanaf 12:00 OKTOBER, 2024',
            '26 oktober vanaf 14:00 OKTOBER, 2024',
            '26 oktober vanaf 16:00 OKTOBER, 2024',
            '27 oktober vanaf 11:00 OKTOBER, 2024',
            '27 oktober vanaf 12:00 OKTOBER, 2024',
            '27 oktober vanaf 14:00 OKTOBER, 2024',
            '27 oktober vanaf 16:00 OKTOBER, 2024'
        ]
    };

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

    // Elementen
    const eventSelect = document.getElementById('event-select');
    const dateSelect = document.getElementById('date-select');
    const ticketQuantity = document.getElementById('ticket-quantity');
    const eventIDInput = document.getElementById("event-id");
    const totalPriceElement = document.getElementById('total-price');
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('popup');

    // Functie om popup te tonen/verbergen
    function showPopup() {
        overlay.style.display = 'block';
        popup.style.display = 'block';
    }

    function hidePopup() {
        overlay.style.display = 'none';
        popup.style.display = 'none';
    }

    // Event listeners
    document.querySelectorAll('.ticket-btn').forEach(button => {
        button.addEventListener('click', function() {
            const eventName = this.getAttribute('data-event');
            eventSelect.value = eventName;
            setEventId();
            updateDateOptions(eventName);
            showPopup();
        });
    });

    eventSelect?.addEventListener('change', function() {
        setEventId();
        updateDateOptions(this.value);
    });

    dateSelect?.addEventListener('change', updateTotalPrice);
    ticketQuantity?.addEventListener('input', updateTotalPrice);

    document.getElementById('close-popup')?.addEventListener('click', hidePopup);

    // Functie om het Event ID te zetten
    function setEventId() {
        const selectedEvent = eventSelect.value;
        eventIDInput.value = eventIDs[selectedEvent] || '';
    }

    // Functie om datums bij te werken
    function updateDateOptions(event) {
        const dates = eventDates[event] || [];
        dateSelect.innerHTML = '<option value="" disabled selected>Kies een evenementdatum</option>';
        dates.forEach(date => {
            const option = document.createElement('option');
            option.value = date;
            option.textContent = date;
            dateSelect.appendChild(option);
        });
        updateTotalPrice();
    }

    // Functie om totale prijs bij te werken
    function updateTotalPrice() {
        const selectedEvent = eventSelect.value;
        const selectedDate = dateSelect.value;
        const quantity = parseInt(ticketQuantity.value) || 0;
        const price = ticketPrices[selectedEvent]?.[selectedDate] || 0;
        const totalPrice = price * quantity;
        totalPriceElement.textContent = `Totaalprijs: €${totalPrice}`;
    }

    // Knoppen voor het aanpassen van de hoeveelheid
    document.getElementById('decrease')?.addEventListener('click', function() {
        let currentValue = parseInt(ticketQuantity.value);
        if (currentValue > 1) {
            ticketQuantity.value = currentValue - 1;
            updateTotalPrice();
        }
    });

    document.getElementById('increase')?.addEventListener('click', function() {
        let currentValue = parseInt(ticketQuantity.value);
        if (currentValue < 10) {
            ticketQuantity.value = currentValue + 1;
            updateTotalPrice();
        }
    });
    
    // Sluitknop voor het form (extra sluitknop)
    document.getElementById('close-form-btn')?.addEventListener('click', hidePopup);

    document.addEventListener("DOMContentLoaded", function () {
        // Bestaande code...
    
        // Function to hide the popup
        function hidePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }
    
        // Add event listener to the close button
        const closePopupButton = document.getElementById('close-popup');
        if (closePopupButton) {
            closePopupButton.addEventListener('click', hidePopup);
        }
    
        // Bestaande code...
    });
    
});
