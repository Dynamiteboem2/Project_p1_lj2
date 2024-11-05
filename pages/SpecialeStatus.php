<?php include_once "../includes/header.php" ?>
<!-- All extra links for styling etc.-->
<link rel="stylesheet" href="../assets/css/SpecialeStatus.css" />
<title>Sneakerness - </title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <form action="">
        <h2>Speciale Status Formulier</h2>

        <div class="input-box">
            <div class="full-box">
                <label for="">Naam <div class="help-button">?</div></label>
                <input type="text" placeholder="Michael Jackson" required>
                <div class="help-text">Dit kan de bedrijfsnaam of persoonlijke naam zijn.</div>
            </div>
            <div class="error-text">
                Deze veld is verplicht
            </div>
        </div>

        <div class="input-box">
            <div class="full-box">

                <label for="">E-mailadres</label>
                <input type="email" placeholder="michael@example.com" required>
            </div>
            <div class="error-text">
                Deze veld is verplicht
            </div>
        </div>

        <div class="input-box">
            <div class="full-box">

                <label for="">Telefoonnummer</label>
                <input type="tel" placeholder="+31 6 12345678" required>
            </div>
            <div class="error-text">
                Deze veld is verplicht
            </div>
        </div>

        <div class="input-box">
            <div class="full-box">
                <label for="">Website of Social Media</label>
                <button class="addInput">+</button>

                <div class="inputs">
                    <input type="text" placeholder="" required>
                </div>
            </div>
            <div class="error-text">
                Deze veld is verplicht
            </div>
        </div>

        <div class="input-box">
            <div class="full-box">
                <label for="experience">Ervaring met Sneakerness <div class="help-button">?</div></label>
                <textarea name="experience" id="experience" required></textarea>
                <div class="help-text">Change the text: Of ze eerder hebben deelgenomen aan het evenement, en zo ja, op
                    welke manier.</div>
            </div>
            <div class="error-text">
                Deze veld is verplicht
            </div>
        </div>

        <div class="input-box">
            <div class="full-box">

                <label for="">Type Speciale Status</label>

                <select name="" id="" required>
                    <option value="1" disabled selected>Selecteer een optie</option>
                    <option value="1">Sponsor</option>
                    <option value="1">Vip</option>
                    <option value="1">Partner</option>
                    <option value="1">Community Ambassador</option>
                    <option value="1">Limited Edition Ambassador</option>
                    <option value="1">Influencer</option>
                    <option value="1">Sponsor Goede Doelen</option>
                </select>
            </div>
            <div class="error-text">
                Deze veld is verplicht
            </div>
        </div>



        <button type="submit">Indienen</button>
    </form>

    <?php include_once "../includes/footer.php" ?>

    <script src="../js/SpecialeStatus.js"></script>
    <!-- All extra scripts -->
</body>

</html>