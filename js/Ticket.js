document.addEventListener("DOMContentLoaded", function () {

    // Map met evenementnamen en bijbehorende IDs
    const eventIDs = {
        'Milaan 2024': '1',
        'Budapest 2024': '2',
        'Rotterdam 2024': '3'
    };
    

    // Map met evenementnamen en datums
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

    // Map met evenementnamen en bijbehorende ticketprijzen
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

    // Popup elements
    const ticketButtons = document.querySelectorAll('.ticket-btn');
    const eventSelect = document.getElementById('event-select');
    const dateSelect = document.getElementById('date-select');
    const ticketQuantity = document.getElementById('ticket-quantity');
    const eventIDInput = document.getElementById("event-id");

    // Show popup when clicking on a ticket button
    ticketButtons.forEach(button => {
        button.addEventListener('click', function() {
            const eventName = this.getAttribute('data-event');
            console.log("Button clicked:", eventName); // Debugging

            // Update form with selected event
            eventSelect.value = eventName;
            setEventId();
            updateDateOptions(eventName);

            // Show the popup
            document.getElementById("overlay").style.display = "block";
            document.getElementById("popup").style.display = "block";
        });
    });

    // Update date options when an event is chosen
    if (eventSelect) {
        eventSelect.addEventListener('change', function() {
            const selectedEvent = this.value;
            setEventId();
            updateDateOptions(selectedEvent);
        });
    }

    function setEventId() {
        const selectedEvent = eventSelect?.value;
        if (eventIDInput && selectedEvent) {
            eventIDInput.value = selectedEvent; // Directly use the selected event value
            console.log("Event ID set to:", eventIDInput.value);
        }
    }
    
    

    function updateDateOptions(event) {
        const dates = eventDates[event] || [];
        if (!dateSelect) {
            console.error("dateSelect element not found");
            return;
        }
        dateSelect.innerHTML = '<option value="" disabled selected>Kies een evenementdatum</option>';

        dates.forEach(date => {
            const option = document.createElement('option');
            option.value = date;
            option.textContent = date;
            dateSelect.appendChild(option);
        });

        // Reset the total price
        updateTotalPrice();
    }

    function updateTotalPrice() {
        const selectedEvent = eventSelect?.value;
        const selectedDate = dateSelect?.value;
        const quantity = parseInt(ticketQuantity?.value) || 0;
        
        const price = ticketPrices[selectedEvent]?.[selectedDate] || 0;
        const totalPrice = price * quantity;

        document.getElementById('total-price').textContent = `Totaalprijs: €${totalPrice}`;
    }

    if (dateSelect) dateSelect.addEventListener('change', updateTotalPrice);
    if (ticketQuantity) ticketQuantity.addEventListener('input', updateTotalPrice);

    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');

    if (decreaseButton) {
        decreaseButton.addEventListener('click', function() {
            let currentValue = parseInt(ticketQuantity.value);
            if (currentValue > 1) {
                ticketQuantity.value = currentValue - 1;
                updateTotalPrice();
            }
        });
    }

    if (increaseButton) {
        increaseButton.addEventListener('click', function() {
            let currentValue = parseInt(ticketQuantity.value);
            if (currentValue < 10) {
                ticketQuantity.value = currentValue + 1;
                updateTotalPrice();
            }
        });
    }

   

    document.getElementById('email')?.addEventListener('input', function() {
        this.setCustomValidity('');
    });

    const closePopup = document.getElementById("closePopup");
    closePopup?.addEventListener("click", function() {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("popup").style.display = "none";
    });
});
