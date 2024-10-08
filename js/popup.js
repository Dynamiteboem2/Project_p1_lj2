const overlay = document.getElementById('overlay');
const popup = document.getElementById('popup');
const popupText = document.getElementById('popup-text');
const closePopupButton = document.getElementById('closePopup');
const paymentForm = document.getElementById('payment-form');

function openPopup(standType, price) {
    popupText.textContent = `Je hebt gekozen voor de ${standType} voor ${price}. Vul je gegevens in om te betalen.`;
    popup.style.display = 'block';
    overlay.style.display = 'block';
}

closePopupButton.addEventListener('click', closePopup);
overlay.addEventListener('click', closePopup);

function closePopup() {
    popup.style.display = 'none';
    overlay.style.display = 'none';
    paymentForm.reset(); // Reset het formulier bij sluiten
}

paymentForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Voorkom standaard formulierverzending

    // Hier zou je je betalingsverwerking kunnen integreren
    alert('Betaling verwerkt! Bedankt voor je boeking.');
    
    closePopup(); // Sluit de pop-up na verwerking
});