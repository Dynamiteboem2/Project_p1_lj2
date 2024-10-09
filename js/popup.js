const overlay = document.getElementById("overlay");
const popup = document.getElementById("popup");
const popupText = document.getElementById("popup-text");
const closePopupButton = document.getElementById("closePopup");
const paymentForm = document.getElementById("payment-form");

function openPopup(standType, price) {
	popupText.textContent = `Je hebt gekozen voor de ${standType} voor ${price}. Vul je gegevens in om te betalen.`;
	popup.style.display = "block";
	overlay.style.display = "block";
}

closePopupButton.addEventListener("click", closePopup);
overlay.addEventListener("click", closePopup);

function closePopup() {
	popup.style.display = "none";
	overlay.style.display = "none";
	paymentForm.reset();
}

// paymentForm.addEventListener('submit', function(event) {
//     event.preventDefault();
//     alert('Betaling verwerkt! Bedankt voor je boeking.');
//     closePopup();
// });

document.getElementById("closePopup").onclick = function () {
	document.getElementById("overlay").style.display = "none";
	document.getElementById("popup").style.display = "none";
};

var today = new Date().toISOString().split("T")[0];

// Bereken de datum 18 jaar geleden
var maxDate = new Date();
maxDate.setFullYear(maxDate.getFullYear() - 18);
var maxDateString = maxDate.toISOString().split("T")[0];

// Stel de maximale datum in voor het geboorteveld (18 jaar geleden)
document.getElementById("birthdate").setAttribute("max", maxDateString);
