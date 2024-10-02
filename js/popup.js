const overlay = document.getElementById('overlay');
const popup = document.getElementById('popup');
const popupText = document.getElementById('popup-text');
const closePopupButton = document.getElementById('closePopup');

function openPopup(standType, price) {
    popupText.textContent = `Je hebt gekozen voor de ${standType} voor ${price}.`;
    popup.style.display = 'block';
    overlay.style.display = 'block';
}

closePopupButton.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
});

overlay.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
});
