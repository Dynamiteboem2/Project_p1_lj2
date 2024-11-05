document.addEventListener("DOMContentLoaded", function () {
    
    // Event gegevens
    const eventIDs = {
        'Milaan 2024': '1',
        'Budapest 2024': '2',
        'Rotterdam 2024': '3'
    };

    const eventDates = {
        'Milaan 2024': [
            '20 oktober ,vanaf 11:00',
            '20 oktober ,vanaf 12:00',
            '20 oktober ,vanaf 14:00',
            '20 oktober ,vanaf 16:00',
            '21 oktober ,vanaf 11:00',
            '21 oktober ,vanaf 12:00',
            '21 oktober ,vanaf 14:00',
            '21 oktober ,vanaf 16:00'
        ],
        'Budapest 2024': [
            '23 oktober ,vanaf 11:00',
            '23 oktober ,vanaf 12:00',
            '23 oktober ,vanaf 14:00',
            '23 oktober ,vanaf 16:00',
            '24 oktober ,vanaf 11:00',
            '24 oktober ,vanaf 12:00',
            '24 oktober ,vanaf 14:00',
            '24 oktober ,vanaf 16:00'
        ],
        'Rotterdam 2024': [
            '26 oktober ,vanaf 11:00',
            '26 oktober ,vanaf 12:00',
            '26 oktober ,vanaf 14:00',
            '26 oktober ,vanaf 16:00',
            '27 oktober ,vanaf 11:00',
            '27 oktober ,vanaf 12:00',
            '27 oktober ,vanaf 14:00',
            '27 oktober ,vanaf 16:00'
        ]
    };

    const ticketPrices = {
        'Milaan 2024': {
            '20 oktober ,vanaf 11:00': 50,
            '20 oktober ,vanaf 12:00': 15,
            '20 oktober ,vanaf 14:00': 12,
            '20 oktober ,vanaf 16:00': 11,
            '21 oktober ,vanaf 11:00': 50,
            '21 oktober ,vanaf 12:00': 15,
            '21 oktober ,vanaf 14:00': 12,
            '21 oktober ,vanaf 16:00': 11
        },
        'Budapest 2024': {
            '23 oktober ,vanaf 11:00': 50,
            '23 oktober ,vanaf 12:00': 15,
            '23 oktober ,vanaf 14:00': 12,
            '23 oktober ,vanaf 16:00': 11,
            '24 oktober ,vanaf 11:00': 50,
            '24 oktober ,vanaf 12:00': 15,
            '24 oktober ,vanaf 14:00': 12,
            '24 oktober ,vanaf 16:00': 11
        },
        'Rotterdam 2024': {
            '26 oktober ,vanaf 11:00': 50,
            '26 oktober ,vanaf 12:00': 15,
            '26 oktober ,vanaf 14:00': 12,
            '26 oktober ,vanaf 16:00': 11,
            '27 oktober ,vanaf 11:00': 50,
            '27 oktober ,vanaf 12:00': 15,
            '27 oktober ,vanaf 14:00': 12,
            '27 oktober ,vanaf 16:00': 11
        }
    };

    // Ensure the elements are selected correctly
    const eventSelect = document.getElementById('event-select');
    const dateSelect = document.getElementById('date-select');
    const ticketQuantity = document.querySelector('input[name="quantity"]');
    const totalPriceElement = document.getElementById('total-price');
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('popup');
    const form = document.getElementById('payment-form');
    const closePopupButton = document.getElementById('closePopup');
    const quantityErrorMessage = document.getElementById('quantity-error-message');

    // Function to update the total price
    function updateTotalPrice() {
        const selectedEvent = eventSelect.value;
        const selectedDate = dateSelect.value;
        const quantity = parseInt(ticketQuantity.value, 10);

        if (ticketPrices[selectedEvent] && ticketPrices[selectedEvent][selectedDate]) {
            const pricePerTicket = ticketPrices[selectedEvent][selectedDate];
            const totalPrice = pricePerTicket * quantity;
            totalPriceElement.textContent = `Totale Prijs: €${totalPrice}`;
        } else {
            totalPriceElement.textContent = 'Totale Prijs: €0';
        }
    }

    // Function to check for validation errors and display them
    function hasValidationErrors() {
        const selectedEvent = eventSelect.value;
        const selectedDate = dateSelect.value;
        const quantity = parseInt(ticketQuantity.value, 10);
        let hasErrors = false;

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        if (!selectedEvent) {
            document.querySelector('.error-message.event').textContent = 'Selecteer een evenement.';
            hasErrors = true;
        }
        if (!selectedDate) {
            document.querySelector('.error-message.date').textContent = 'Selecteer een datum.';
            hasErrors = true;
        }
        if (isNaN(quantity) || quantity <= 0) {
            document.querySelector('.error-message.quantity').textContent = 'Voer een geldig aantal in.';
            hasErrors = true;
        }

        return hasErrors;
    }

    // Add event listeners to update the total price when the quantity or date changes
    ticketQuantity.addEventListener('input', updateTotalPrice);
    dateSelect.addEventListener('change', updateTotalPrice);

    // Initial call to set the total price on page load
    updateTotalPrice();

    // Event listener for form submission
    form.addEventListener('submit', function(event) {
        if (hasValidationErrors()) {
            event.preventDefault(); // Prevent form submission
        } else {
            // Close the popup if there are no validation errors
            overlay.style.display = 'none';
            popup.style.display = 'none';
        }
    });

    // Event listener for closing the popup
    closePopupButton.addEventListener('click', function() {
        overlay.style.display = 'none';
        popup.style.display = 'none';
    });

    // Event listeners for quantity adjustment buttons
    document.getElementById('decrease')?.addEventListener('click', function() {
        let currentValue = parseInt(ticketQuantity.value);
        if (currentValue > 1) {
            ticketQuantity.value = currentValue - 1;
            updateTotalPrice();
            quantityErrorMessage.textContent = ''; // Clear error message
        } else {
            quantityErrorMessage.textContent = 'Het aantal tickets kan niet minder dan 1 zijn.';
        }
    });

    document.getElementById('increase')?.addEventListener('click', function() {
        let currentValue = parseInt(ticketQuantity.value);
        if (currentValue < 10) {
            ticketQuantity.value = currentValue + 1;
            updateTotalPrice();
            quantityErrorMessage.textContent = ''; // Clear error message
        } else {
            quantityErrorMessage.textContent = 'Het aantal tickets kan niet meer dan 10 zijn.';
        }
    });

    // Functie om event ID in te stellen
    function setEventId() {
        const eventIdElement = document.getElementById('event-id');
        if (eventIdElement && eventSelect) {
            eventIdElement.value = eventSelect.value;
        } else {
            console.error('Event ID element or event select element not found.');
        }
    }

    // Functie om de popup te tonen
    function showPopup() {
        overlay.style.display = 'block';
        popup.style.display = 'block';
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
                console.error('Event select element not found.');
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
        // Clear previous options
        dateSelect.innerHTML = '<option value="" disabled selected>Kies een evenementdatum</option>';

        // Add new options based on the selected event
        if (eventDates[event]) {
            eventDates[event].forEach(date => {
                const option = document.createElement('option');
                option.value = date;
                option.textContent = date;
                dateSelect.appendChild(option);
            });
        }
    }
});
