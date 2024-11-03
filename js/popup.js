const overlay = document.getElementById("overlay");
const popup = document.getElementById("popup");
const popupText = document.getElementById("popup-text");
const closePopupButton = document.getElementById("closePopup");
const paymentForm = document.getElementById("payment-form");
const standName = document.getElementById("standName");
const standPrice = document.getElementById("standPrice");
const standId = document.getElementById("standId");

// Functie om de pop-up te openen
function openPopup(standType, price, id) {
    popupText.textContent = `Je hebt gekozen voor de ${standType} voor €${price}. Vul je gegevens in om te betalen.`;
    resetErrorMessages(); // Reset foutmeldingen bij openen van de pop-up
    popup.style.display = "block";
    overlay.style.display = "block";
    standName.value = standType;
    standPrice.value = price; 
    standId.value = id;
    console.log("StandId:" + id);
    console.log("Price:" + price); 
}


// Functie om de pop-up te sluiten
function closePopup() {
    popup.style.display = "none";
    overlay.style.display = "none";
    paymentForm.reset(); // Reset het formulier
    resetErrorMessages(); // Reset foutmeldingen bij sluiten van de pop-up
}

// Reset alle foutmeldingen
function resetErrorMessages() {
    document.querySelectorAll('.error-message').forEach(div => div.innerHTML = '');
}

// Event listeners voor het sluiten van de pop-up
closePopupButton.addEventListener("click", closePopup);
overlay.addEventListener("click", closePopup);


