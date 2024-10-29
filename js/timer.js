document.addEventListener('DOMContentLoaded', () => {
    const timers = document.querySelectorAll('[id^="timer-"]');
    timers.forEach(timer => {
        const timeLeft = parseInt(timer.getAttribute('data-time-left'), 10); 
        const standId = timer.id.split('-')[1];
        startCountdown(timer.id, timeLeft, `delete-button-${standId}`);
    });
});

function startCountdown(timerId, timeLeft, deleteButtonId) {
    const timerDisplay = document.getElementById(timerId);
    const deleteButton = document.getElementById(deleteButtonId);

    const countdownInterval = setInterval(() => {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        // Display formatted time
        timerDisplay.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        // Check if time is up
        if (timeLeft <= 0) {
            clearInterval(countdownInterval);
            timerDisplay.innerText = "Stand kan niet meer geannuleerd worden.";
            timerDisplay.style.fontSize = '10px'; // Adjust font size here
            timerDisplay.style.fontWeight = 'bold'; // Make text bold
            deleteButton.style.pointerEvents = 'none';
            deleteButton.style.color = 'gray';
            deleteButton.style.cursor = 'not-allowed';
            
        }

        timeLeft--; // Decrement time left
    }, 1000);
}



