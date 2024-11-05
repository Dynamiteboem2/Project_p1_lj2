<?php include_once "../includes/header.php" ?>
<link rel="stylesheet" href="../assest/css/col.css">
<link rel="stylesheet" href="../assets/css/stand.css">
<script src="https://unpkg.com/scrollreveal"></script>
<title>Sneakerness - Stand Verkoop</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <!-- Eerste Sectie: Hoofdstands -->
    <section class="stand-verkoop col">
        <!-- Redirect to user dashboard -->
        <?php if (isset($_GET['message'])) { ?>
            <p class="message"><?php echo $_GET['message']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <div class="section__container header__container">
            <div class="header__image">
                <img src="../img/whitesneaker.jpg" alt="header">
            </div>
            <div class="header__content">
                <h2>Huur uw stand!</h2>
                <p>Verkoop je producten en diensten tijdens het event door een stand (of <a class="scroll"
                        href="#side-stands">side-stand</a>) te huren. Of je nu een partner,
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
                <p class="cardP"><span>AA+</span><br> Locatie: Deze stand is in de ingang van het event. Het is de
                    eerste stand die bezoekers tegenkomen, waardoor je aandacht krijgt.</p>
                <span class="price">€300</span>
                <button class="btn" onclick="openPopup('L-Stand(deluxe)', '300', '1')">Boek Nu</button>
            </div>

            <!-- Stand Card 2 -->
            <div class="stand-card col-4">
                <img class="stand-img" src="../img/standAA.png" alt="Stand Type 1">
                <h3 class="cardH3">L-Stand</h3>
                <p class="cardP"><span>AA</span><br> Locatie: Deze stand is centraal geplaatst, in het midden van het
                    event, waardoor er altijd veel voetverkeer is van alle richtingen.</p>
                <span class="price">€200</span>
                <button class="btn" onclick="openPopup('L-Stand', '200', '2')">Boek Nu</button>
            </div>

            <!-- Stand Card 3 -->
            <div class="stand-card col">
                <img class="stand-img" src="../img/standA.png" alt="Stand Type 1">
                <h3 class="cardH3">I-Stand</h3>
                <p class="cardP"><span>A</span><br> Locatie: Deze stand bevindt zich aan de rand van het evenement, maar
                    nog steeds op een plek met gematigd voetverkeer.</p>
                <span class="price">€150</span>
                <button class="btn" onclick="openPopup('I-Stand', '150', '3')">Boek Nu</button>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <?php echo '<div style="border-top: 3px solid black; width: 100%; margin: 1px 0;"></div>'; ?>

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
                <p class="cardP">Locatie: Deze stand bevindt zich centraal geplaatst in het midden van het event,
                    waardoor er veel mensen zijn.</p>
                <span class="price">€150</span>
                <button class="btn" onclick="openPopup('eten en drinken', '150', '4')">Boek Nu</button>
            </div>

            <!-- Side-Stand 2 -->
            <div class="stand-card2 col-4">
                <img class="stand-img" src="../img/kids-corner1.jpg" alt="Kids Corner">
                <h3 class="cardH3">Kids corner</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich aan de rechterkant van het event, op een plek waar
                    veel mensen komen.</p>
                <span class="price">€90</span>
                <button class="btn" onclick="openPopup('kids corner', '90', '5')">Boek Nu</button>
            </div>

            <!-- Side-Stand 3 -->
            <div class="stand-card2 col">
                <img class="stand-img" src="../img/custemise1.jpg" alt="Customizers-area">
                <h3 class="cardH3">Customizers-area</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich links in het midden, een prima plek waar genoeg mensen
                    langslopen.</p>
                <span class="price">€100</span>
                <button class="btn" onclick="openPopup('Customizers-area', '100', '6')">Boek Nu</button>
            </div>
        </div>

        <!-- Side-Stand Rij 2 -->
        <div class="stand-cards2 row">
            <!-- Side-Stand 4 -->
            <div class="stand-card2 col-4">
                <img class="stand-img" src="../img/tatoo1.jpg" alt="Tattoo- en Barbershop">
                <h3 class="cardH3">Tattoo- en barbershop</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich in de linkerhoek van het event, waar nog steeds veel
                    mensen komen kijken.</p>
                <span class="price">€90</span>
                <button class="btn" onclick="openPopup('tattoo- en barbershop', '90', '7')">Boek Nu</button>
            </div>

            <!-- Side-Stand 5 -->
            <div class="stand-card2 col-4">
                <img class="stand-img" src="../img/DJ-Set1.jpg" alt="DJ-sets">
                <h3 class="cardH3">DJ-sets</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich rechtsboven op het event, waar het vaak druk is
                    vanwege andere activiteiten.</p>
                <span class="price">€110</span>
                <button class="btn" onclick="openPopup('DJ-sets', '110', '8')">Boek Nu</button>
            </div>

            <!-- Side-Stand 6 -->
            <div class="stand-card2 col">
                <img class="stand-img" src="../img/gamehoek4.jpg" alt="Gamehoek">
                <h3 class="cardH3">Gamehoek</h3>
                <p class="cardP">Locatie: Deze stand bevindt zich aan de rand van het evenement, maar nog steeds op een
                    plek met gematigd voetverkeer.</p>
                <span class="price">€120</span>
                <button class="btn" onclick="openPopup('Gamehoek', '120','9')">Boek Nu</button>
            </div>
        </div>
    </section>

    <!-- Popup Overlay -->
    <div id="overlay" style="display: none;"></div>
    <div id="popup" style="display: none;">
        <button id="closePopup"
            style="float: right; border: none; background: none; font-size: 24px; cursor: pointer;">&times;</button>
        <h2>Boeking Bevestigen</h2>
        <p id="popup-text"></p>

        <form id="payment-form" method="post" action="<?php echo URL ?>/db/createStand.php">
            <input type="text" id="standName" name="standName" hidden />
            <input type="text" id="standPrice" name="standPrice" hidden />
            <input type="text" id="standId" name="standId" hidden />

            <div class="error-message" id="error-first-name" style="color: red; font-size: 14px; margin-top: 5px;">
            </div>
            <input type="text" name="first-name" id="first-name" placeholder="Voornaam:" required
                pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters">

            <div class="error-message" id="error-infix-name" style="color: red; font-size: 14px; margin-top: 5px;">
            </div>
            <input type="text" name="infix-name" id="infix-name" placeholder="Tussenvoegsel:"
                pattern="[a-zA-Z\u00C0-\u017F ]*" title="Gebruik alleen letters">

            <div class="error-message" id="error-last-name" style="color: red; font-size: 14px; margin-top: 5px;"></div>
            <input type="text" name="last-name" id="last-name" placeholder="Achternaam:" required
                pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters">

            <div id="error-duplicate-stand" class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
            </div>
            <div class="error-message" id="error-email" style="color: red; font-size: 14px; margin-top: 5px;"></div>
            <input type="email" id="email" name="email" placeholder="E-mailadres:" required
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                title="Voer een geldig e-mailadres in (bijv. naam@example.com)">

            <div class="error-message" id="error-phone" style="color: red; font-size: 14px;"></div>
            <input type="tel" id="phone" name="phone" placeholder="Telefoonnummer:" pattern="^\d{10}$"
                title="Vul een geldig telefoonnummer in (10 cijfers, zonder spaties of speciale tekens)" required>

            <div class="error-message" id="error-birthdate" style="color: red; font-size: 14px; margin-top: 5px;"></div>
            <label for="birthdate">Geboortedatum:</label>
            <input type="date" id="birthdate" name="birthdate" min="1900-01-01"
                title="Vul een geboortedatum in vanaf 1 januari 1900." max="2006-01-01
            " title="Vul een geboortedatum in voor 2006." required>

            <div class="error-message" id="error-stand-date" style="color: red; font-size: 14px; margin-top: 5px;">
            </div>
            <label for="selectdate">Eventdatum:</label>
            <select id="selectdate" name="stand-date" required>
                <option value="" disabled selected>Kies een datum</option>
                <option value="2024-10-27">27 oktober 2024</option>
                <option value="2024-10-28">28 oktober 2024</option>
            </select>


            <!-- Checkbox  -->

            <button type="submit" class="submitData">Betalen</button>
        </form>
    </div>

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
            max-height: 95vh;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1001;
            display: none;
            border-radius: 8px;
            overflow-y: auto;
        }

        /* Stijl voor het formulier */
        #payment-form {
            display: flex;
            flex-direction: column;
            font-size: 0.8rem;
        }

        #payment-form label {
            margin: 7px 0 5px;
        }

        #payment-form input,
        #payment-form select {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: transparent;
        }

        #closePopup {
            margin-top: -20px;
            margin-right: -20px;
            color: #333;
            position: absolute;
            top: 30px;
            right: 30px;
        }


        .message {
            text-align: center;
            margin-bottom: 2rem;
            padding: 10px;
            border-radius: 5px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .error {
            text-align: center;
            margin-bottom: 2rem;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
    </style>
    </div>

    <script src="../js/validation.js"></script>
    <script src="../js/scrollreveal"></script>
    <script src="../js/popup.js"></script>
    <?php include_once "../includes/footer.php" ?>
</body>

</html>