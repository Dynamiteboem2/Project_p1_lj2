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

    // Functie om event ID in te stellen
    function setEventId() {
        const eventIdElement = document.getElementById('event-id');
        if (eventIdElement) {
            eventIdElement.value = eventSelect.value;
        } else {
            console.error('Element with id "event-id" not found.');
        }
    }

    // Event listeners
    document.querySelectorAll('.ticket-btn').forEach(button => {
        button.addEventListener('click', function() {
            const eventName = this.getAttribute('data-event');
            if (eventSelect) {
                eventSelect.value = eventName;
                setEventId();
                updateDateOptions(eventName);
                showPopup();
            } else {
                console.error('Element eventSelect not found.');
            }
        });
    });

    eventSelect?.addEventListener('change', function() {
        setEventId();
        updateDateOptions(this.value);
    });

    dateSelect?.addEventListener('change', updateTotalPrice);
    ticketQuantity?.addEventListener('input', updateTotalPrice);

    document.getElementById('close-popup')?.addEventListener('click', hidePopup);

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

    document.addEventListener('DOMContentLoaded', function() {
        const ticketButtons = document.querySelectorAll('.ticket-btn');
        const paymentForm = document.getElementById('payment-form');
        const closeFormButton = document.getElementById('close-form-btn');

        ticketButtons.forEach(button => {
            button.addEventListener('click', function() {
                const eventIdInput = document.getElementById('event-id');
                if (eventIdInput) {
                    eventIdInput.value = this.getAttribute('data-event-id');
                }
                paymentForm.style.display = 'block';
            });
        });

        closeFormButton.addEventListener('click', function() {
            paymentForm.style.display = 'none';
        });
    });
});
