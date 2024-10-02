<?php include_once "../includes/header.php" ?>
<link rel="stylesheet" href="../assest/css/col.css">
<link rel="stylesheet" href="../assets/css/stand.css">
<title>Sneakerness - Stand Verkoop</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <section class="stand-verkoop col">
        <div class="container">
            <div class="stand-intro noto_Font">
                <h2>Huur uw sneaker stand!</h2>
                <p>Verkoop je producten en diensten tijdens het event door een stand te huren. Of je nu een partner,
                    shop of private seller bent, met onze verschillende standopties zorgen wij voor de perfecte plek om
                    jouw merk in de schijnwerpers te zetten. Kies uit verschillende standcategorieën en bereik honderden
                    (of duizenden) bezoekers tijdens dit unieke tweedaagse evenement!</p>
            </div>

            <div class="stand-cards row">
                <div class="stand-card col-4 ">
                    <img class="stand-img" src="../img/standAA+.png" alt="Stand Type 1">
                    <h3 class="cardH3">L-Stand(deluxe)</h3>
                    <p class="cardP"><span>AA+</span><br> Locatie: Deze stand is in de ingang van het event. Het is de
                        eerste stand die bezoekers tegenkomen, waardoor je aandacht krijgt.</p>
                    <span class="price">€300</span>
                    <button class="btn" onclick="openPopup('L-Stand(deluxe)', '€300')">Boek Nu</button>
                </div>

                <div class="stand-card col-4">
                    <img class="stand-img" src="../img/standAA.png" alt="Stand Type 1">
                    <h3 class="cardH3">L-Stand</h3>
                    <p class="cardP"><span>AA</span><br> Locatie: Deze stand is centraal geplaatst, in het midden van
                        het event, waardoor er altijd veel voetverkeer is van alle richtingen.</p>
                    <span class="price">€200</span>
                    <button class="btn" onclick="openPopup('L-Stand', '€200')">Boek Nu</button>
                </div>

                <div class="stand-card col">
                    <img class="stand-img" src="../img/standA.png" alt="Stand Type 1">
                    <h3 class="cardH3">I-Stand</h3>
                    <p class="cardP"><span>A</span><br> Locatie: Deze stand bevindt zich aan de rand van het evenement,
                        maar nog steeds op een plek met gematigd voetverkeer.</p>
                    <span class="price">€150</span>
                    <button class="btn" onclick="openPopup('I-Stand', '€150')">Boek Nu</button>
                </div>
            </div>
        </div>
    </section>
    <?php
    echo '<div style="border-top: 2px solid black; width: 100%; margin: 20px 0;"></div>';
    ?>

    <section class="stand-verkoop col">
        <div class="container">
            <div class="stand-intro">
                <h2>Huur uw side-stand stand!</h2>
                <p>Ben je klaar om je merk écht in de schijnwerpers te zetten? Naast de populairste sneakerverkopers
                    vind je op ons event ook een scala aan unieke side-stands. Denk aan smakelijke foodtrucks, een te
                    gekke kids corner, de beste customizers, tattoo- en barbershops, én live DJ-sets die de sfeer naar
                    een hoger niveau tillen. Dit is dé kans om jouw producten of diensten direct onder de aandacht te
                    brengen van duizenden enthousiaste bezoekers. Huur nu je eigen stand en maak deel uit van dit
                    onvergetelijke tweedaagse evenement – waar jouw merk de show steelt!</p>
            </div>

            <div class="stand-cards2 row">
                <div class="stand-card2 col-4 ">
                    <img class="stand-img" src="../img/food_and_drink1.jpg" alt="Stand Type 1">
                    <h3 class="cardH3">eten en drinken</h3>
                    <p class="cardP">Locatie: Deze stand bevindt zich centraal geplaats. In het midden van het event, waardoor er veel mensen zijn.</p>
                    <span class="price">€150</span>
                    <button class="btn" onclick="openPopup('eten en drinken', '€150')">Boek Nu</button>
                </div>

                <div class="stand-card2 col-4">
                    <img class="stand-img" src="../img/kids-corner1.jpg" alt="Stand Type 1">
                    <h3 class="cardH3">kids corner</h3>
                    <p class="cardP">Locatie: Deze stand bevindt zich aan de rechterkant van het event,alsnog een plek waar  enorm veel mensen komen.</p>
                    <span class="price">€87,50</span>
                    <button class="btn" onclick="openPopup('kids corner', '€87,50')">Boek Nu</button>
                </div>

                <div class="stand-card2 col">
                    <img class="stand-img" src="../img/custemise1.jpg" alt="Stand Type 1">
                    <h3 class="cardH3">Customizers-area</h3>
                    <p class="cardP">Locatie: Deze stand bevindt zich links in het midden, een prima plek waar genoeg mensen langlopen.</p>
                    <span class="price">€100</span>
                    <button class="btn" onclick="openPopup('Customizers-area', '€100')">Boek Nu</button>
                </div>
            </div>

            <div class="stand-cards2 row">
                <div class="stand-card2 col-4 ">
                    <img class="stand-img" src="../img/tatoo1.jpg" alt="Stand Type 1">
                    <h3 class="cardH3">tattoo- en barbershop</h3>
                    <p class="cardP">Locatie: Deze stand bevind zich in de linkerhoek van het event, er komen nogsteeds veel mensen daar kijken.</p>
                    <span class="price">€90</span>
                    <button class="btn" onclick="openPopup('tattoo- en barbershop', '€90')">Boek Nu</button>
                </div>

                <div class="stand-card2 col-4">
                    <img class="stand-img" src="../img/DJ-Set1.jpg" alt="Stand Type 1">
                    <h3 class="cardH3">DJ-sets</h3>
                    <p class="cardP">Locatie: Deze stand bevindt zich rechtsboven op het event, het is daar vaak druk daar ook andere activiteiten.</p>
                    <span class="price">€110</span>
                    <button class="btn" onclick="openPopup('DJ-sets', '€110')">Boek Nu</button>
                </div>

                <div class="stand-card2 col">
                    <img class="stand-img" src="../img/standA.png" alt="Stand Type 1">
                    <h3 class="cardH3">I-Stand</h3>
                    <p class="cardP">Locatie: Deze stand bevindt zich aan de rand van het evenement,
                        maar nog steeds op een plek met gematigd voetverkeer.</p>
                    <span class="price">€150</span>
                    <button class="btn" onclick="openPopup('I-Stand', '€150')">Boek Nu</button>
                </div>
            </div>
        </div>
    </section>

    <?php include_once "../includes/footer.php" ?>


    

<div id="overlay" style="display: none;"></div>
<div id="popup" style="display: none;">
    <h2>Boeking Bevestigen</h2>
    <p id="popup-text"></p>
    
    <form id="payment-form">
        <label for="first-name">Voornaam:</label>
        <input type="text" id="first-name" required><br>

        <label for="last-name">Achternaam:</label>
        <input type="text" id="last-name" required><br>

        <label for="phone">Telefoonnummer:</label>
        <input type="tel" id="phone" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" required><br>

        <label for="birthdate">Geboortedatum:</label>
        <input type="date" id="birthdate" required><br>

        <button type="submit">Betalen</button>
        <button type="button" id="closePopup">Sluiten</button>
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
        margin-top: 10px;
    }
</style>

<script src="../js/popup.js"></script>

</body>
</html>
