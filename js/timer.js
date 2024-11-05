document.addEventListener('DOMContentLoaded', () => {
    const timers = document.querySelectorAll('[id^="timer-"]');
    timers.forEach(timer => {
        const timeLeft = parseInt(timer.getAttribute('data-time-left'), 10); 
        const standId = timer.id.split('-')[1];
        const type = timer.getAttribute('data-type'); // New attribute to determine type
        startCountdown(timer.id, timeLeft, `delete-button-${standId}`, `edit-button-${standId}`, type);
    });
});

function startCountdown(timerId, timeLeft, deleteButtonId, editButtonId, type) {
    const timerDisplay = document.getElementById(timerId);
    const deleteButton = document.getElementById(deleteButtonId);
    const editButton = document.getElementById(editButtonId);

    const countdownInterval = setInterval(() => {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        // Display formatted time
        timerDisplay.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        // Check if time is up
        if (timeLeft <= 0) {
            clearInterval(countdownInterval);
            if (type === 'ticket') {
                timerDisplay.innerText = "Ticket kan niet meer geannuleerd worden.";
            } else {
                timerDisplay.innerText = "Stand kan niet meer geannuleerd worden.";
            }
            timerDisplay.style.fontSize = '10px'; // Adjust font size here
            timerDisplay.style.fontWeight = 'bold'; // Make text bold
            
            // Disable both delete and edit buttons
            [deleteButton, editButton].forEach(button => {
                if (button) {
                    button.style.pointerEvents = 'none';
                    button.style.color = 'gray';
                    button.style.cursor = 'not-allowed';
                }
            });
        }

        timeLeft--; // Decrement time left
    }, 1000);
}
