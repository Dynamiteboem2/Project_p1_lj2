<?php include_once "../includes/header.php" ?>
<link rel="stylesheet" href="../assest/css/col.css">
<link rel="stylesheet" href="../assets/css/stand.css">
<title>Sneakerness - Stand Verkoop</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <!-- Eerste Sectie: Hoofdstands -->
    <section class="stand-verkoop col">
        <div class="section__container header__container">
            <div class="header__image">
                <img src="../img/whitesneaker.jpg" alt="header">
            </div>
            <div class="header__content">
                <h2>Huur uw stand!</h2>
                <p>Verkoop je producten en diensten tijdens het event door een stand (of <a class="scroll" href="#side-stands">side-stand</a>) te huren. Of je nu een partner,
                    shop of private seller bent, met onze verschillende standopties zorgen wij voor de perfecte plek om
                    jouw merk in de schijnwerpers te zetten. Kies uit verschillende standcategorieën en bereik honderden
                    (of duizenden) bezoekers tijdens dit unieke tweedaagse evenement!</p>
            </div>
        </div>

        <div class="stand-cards row">
            <!-- Stand Card 1 -->
            <div class="stand-card col-4">
                <img class="stand-img" src="../img/standAA+.png" alt="Stand Type 1">
                <h3 class="cardH3">L-Stand(deluxe)</h3>
                <p class="cardP"><span>AA+</span><br> Locatie: Deze stand is in de ingang van het event. Het is de eerste stand die bezoekers tegenkomen, waardoor je aandacht krijgt.</p>
                <span class="price">€300</span>
                <button class="btn" onclick="openPopup('L-Stand(deluxe)', '€300')">Boek Nu</button>
            </div>

            <!-- Stand Card 2 -->
            <div class="stand-card col-4">
                <img class="stand-img" src="../img/standAA.png" alt="Stand Type 1">
                <h3 class="cardH3">L-Stand</h3>
                <p class="cardP"><span>AA</span><br> Locatie: Deze stand is centraal geplaatst, in het midden van het event, waardoor er altijd veel voetverkeer is van alle richtingen.</p>
                <span class="price">€200</span>
                <button class="btn" onclick="openPopup('L-Stand', '€200')">Boek Nu</button>
            </div>

            <!-- Stand Card 3 -->
            <div class="stand-card col">
                <img class="stand-img" src="../img/standA.png" alt="Stand Type 1">
                <h3 class="cardH3">I-Stand</h3>
                <p class="cardP"><span>A</span><br> Locatie: Deze stand bevindt zich aan de rand van het evenement, maar nog steeds op een plek met gematigd voetverkeer.</p>
                <span class="price">€150</span>
                <button class="btn" onclick="openPopup('I-Stand', '€150')">Boek Nu</button>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <?php echo '<div style="border-top: 2px solid black; width: 100%; margin: 20px 0;"></div>'; ?>

    <!-- Tweede Sectie: Side-Stands -->
    <section class="stand-verkoop col" id="side-stands">
        <div class="section__container header__container">
            <div class="header__image">
                <img src="../img/kroket.jpg" alt="header">
            </div>
            <div class="header__content">
                <h2>Huur uw side-stand stand!</h2>
                <p>Ben je klaar om je merk écht in de schijnwerpers te zetten? Naast de populairste sneakerverkopers
                    vind je op ons event ook een scala aan unieke side-stands. Denk aan smakelijke foodtrucks, een te
                    gekke kids corner, de beste customizers, tattoo- en barbershops, én live DJ-sets die de sfeer naar
                    een hoger niveau tillen. Dit is dé kans om jouw producten of diensten direct onder de aandacht te
                    brengen van duizenden enthousiaste bezoekers. Huur nu je eigen stand en maak deel uit van dit
                    onvergetelijke tweedaagse evenement – waar jouw merk de show steelt!</p>
            </div>
        </div>

        <div class="stand-cards2 row">
            <!-- Side-Stand 1 -->
            <div class="stand-card2 col-4">
                <img class="stand-img" src="../img/food_and_drink1.jpg" alt="Eten en Drinken">
                <h3 class="cardH3">Eten en drinken</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich centraal geplaatst in het midden van het event, waardoor er veel mensen zijn.</p>
                <span class="price">€150</span>
                <button class="btn" onclick="openPopup('eten en drinken', '€150')">Boek Nu</button>
            </div>

            <!-- Side-Stand 2 -->
            <div class="stand-card2 col-4">
                <img class="stand-img" src="../img/kids-corner1.jpg" alt="Kids Corner">
                <h3 class="cardH3">Kids corner</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich aan de rechterkant van het event, op een plek waar veel mensen komen.</p>
                <span class="price">€90</span>
                <button class="btn" onclick="openPopup('kids corner', '€90')">Boek Nu</button>
            </div>

            <!-- Side-Stand 3 -->
            <div class="stand-card2 col">
                <img class="stand-img" src="../img/custemise1.jpg" alt="Customizers-area">
                <h3 class="cardH3">Customizers-area</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich links in het midden, een prima plek waar genoeg mensen langslopen.</p>
                <span class="price">€100</span>
                <button class="btn" onclick="openPopup('Customizers-area', '€100')">Boek Nu</button>
            </div>
        </div>

        <!-- Side-Stand Rij 2 -->
        <div class="stand-cards2 row">
            <!-- Side-Stand 4 -->
            <div class="stand-card2 col-4">
                <img class="stand-img" src="../img/tatoo1.jpg" alt="Tattoo- en Barbershop">
                <h3 class="cardH3">Tattoo- en barbershop</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich in de linkerhoek van het event, waar nog steeds veel mensen komen kijken.</p>
                <span class="price">€90</span>
                <button class="btn" onclick="openPopup('tattoo- en barbershop', '€90')">Boek Nu</button>
            </div>

            <!-- Side-Stand 5 -->
            <div class="stand-card2 col-4">
                <img class="stand-img" src="../img/DJ-Set1.jpg" alt="DJ-sets">
                <h3 class="cardH3">DJ-sets</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich rechtsboven op het event, waar het vaak druk is vanwege andere activiteiten.</p>
                <span class="price">€110</span>
                <button class="btn" onclick="openPopup('DJ-sets', '€110')">Boek Nu</button>
            </div>

            <!-- Side-Stand 6 -->
            <div class="stand-card2 col">
                <img class="stand-img" src="../img/gamehoek4.jpg" alt="Gamehoek">
                <h3 class="cardH3">Gamehoek</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich aan de rand van het evenement, maar nog steeds op een plek met gematigd voetverkeer.</p>
                <span class="price">€120</span>
                <button class="btn" onclick="openPopup('Gamehoek', '€120')">Boek Nu</button>
            </div>
        </div>
    </section>

    <!-- Popup Overlay -->
    <div id="overlay" style="display: none;"></div>
<div id="popup" style="display: none;">
    <button id="closePopup" style="float: right; border: none; background: none; font-size: 24px; cursor: pointer;">&times;</button>
    <h2>Boeking Bevestigen</h2>
    <p id="popup-text"></p>

    <form id="payment-form">
            <label for="voornaam"></label>
                <input type="text" name="voornaam" id="voornaam" placeholder="Uw voornaam*" required
                  pattern="[a-zA-Z\u00C0-\u017F ]+">
            <label for="tussenvoegsel"></label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel"
                    placeholder="Uw tussenvoegsel: (Optioneel)" pattern="[a-zA-Z\u00C0-\u017F ]+">
            <label for="achternaam"></label>
                <input type="text" name="achternaam" id="achternaam" placeholder="achternaam*" required
                    pattern="[a-zA-Z\u00C0-\u017F ]+">
            <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="email adres*"
                    required>
            <label for="phone"></label>
                <input type="tel" id="phone" name="phone" placeholder="tel. nummer"
                    pattern="[0-9]{10}" title="Vul een geldig telefoonnummer in" 
                        required>
                        <input type="date" id="birthdate" name="birthdate" placeholder="*Geboortedatum" required>
        <button type="verzenden">Betalen</button>
    </form>
</div>

<style>
    /* Stijl voor de overlay */
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: none;
        z-index: 1000;
    }

    /* Stijl voor de pop-up */
    #popup {
        position: fixed;
        min-width: 40rem;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 1001;
        display: none;
        width: 300px; /* breedte van de pop-up */
        border-radius: 8px; /* Hoekafgeronde pop-up */
    }

    /* Stijl voor het formulier */
    #payment-form {
        display: flex;
        flex-direction: column;
    }

    #payment-form label {
        margin: 10px 0 5px;
    }

    #payment-form input {
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #closePopup {
        margin-top: -20px; /* Zet de knop boven de titel */
        margin-right: -20px; /* Zet de knop aan de rechterkant */
        color: #333; /* Kleur van de sluitknop */
        position: absolute; /* Absolute positie om het precies te plaatsen */
        top: 30px; /* Afstand van de bovenkant */
        right: 30px; /* Afstand van de rechterkant */
    }
</style>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        const scrollRevealOption = {
            distance: "50px",
            origin: "bottom",
            duration: 1000,
        };

        ScrollReveal().reveal(".header__image img", {
            distance: "50px",
            origin: "right",
            duration: 1000,
        });
        ScrollReveal().reveal(".header__content h2", {
            distance: "50px",
            origin: "bottom",
            duration: 1000,
            delay: 500,
        });
        ScrollReveal().reveal(".header__content p", {
            distance: "50px",
            origin: "bottom",
            duration: 1000,
            delay: 1000,
        });

        // JavaScript for Popup
        const overlay = document.getElementById('overlay');
        const popup = document.getElementById('popup');
        const closePopupButton = document.getElementById('closePopup');
        const popupText = document.getElementById('popup-text');

        function openPopup(standName, price) {
            popupText.textContent = `Je staat op het punt om de ${standName} te boeken voor ${price}. Vul hieronder je gegevens in.`;
            overlay.style.display = 'block';
            popup.style.display = 'block';
        }

        closePopupButton.addEventListener('click', function () {
            overlay.style.display = 'none';
            popup.style.display = 'none';
        });

        overlay.addEventListener('click', function () {
            overlay.style.display = 'none';
            popup.style.display = 'none';
        });
    </script>

<?php include_once "../includes/footer.php" ?>  
</body>

</html>