<?php
session_start(); // Start sessie om de user ID op te halen

// Haal eventuele foutmeldingen op uit de sessie
$validationErrors = isset($_SESSION['validationErrors']) ? $_SESSION['validationErrors'] : [];
unset($_SESSION['validationErrors']); // Verwijder foutmeldingen uit de sessie na ophalen

// include_once("../db/conn.php");
include_once "../includes/header.php";
?>

<title>Sneakerness - Tickets</title>
<link rel="stylesheet" href="../assets/css/tickets.css">

</head>

<body>
    <?php include_once "../includes/navbar.php"; ?>

    <section class="ticket-verkoop">
        <div class="container">
            <div class="ticket-intro">
                <h2>Koop hier uw Tickets voor het evenement!</h2>
                <p>Kom naar het grootste sneaker event!</p>
                <?php if (isset($validationErrors['general'])) { ?>
                    <p class="error" style="color: red;"><?php echo $validationErrors['general']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['message']) &&  $_GET['message'] == 'success') { ?>
                    <p class="message">Ticket succesvol gekocht! Uw ticket wordt per e-mail verzonden.</p>
                <?php } ?>

                <p><a href="Verschillende_tickets.php" class="highlight-link">Bekijk hier de verschillende tickets</a>
                </p>
            </div>

            <div class="ticket-cards">
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/milan4.jpg" alt="Milaan Ticket">
                    <h3>Milaan 2024</h3>
                    <button class="ticket-btn" data-event="Milaan 2024"
                        data-logged="<?php echo isset($_SESSION['id']); ?>">Koop Nu</button>
                </div>
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/budapest2jpg.jpg" alt="Budapest Ticket">
                    <h3>Budapest 2024</h3>
                    <button class="ticket-btn" data-event="Budapest 2024"
                        data-logged="<?php echo isset($_SESSION['id']); ?>">Koop Nu</button>
                </div>
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/rotjpg.jpg" alt="Rotterdam Ticket">
                    <h3>Rotterdam 2024</h3>
                    <button class="ticket-btn" data-event="Rotterdam 2024" data-logged="<?php echo "hello"; ?>">Koop
                        Nu</button>
                </div>

            </div>
        </div>
    </section>

    <div id="overlay"></div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <h2 class="popup-header">Selecteer welke Ticket!</h2>

            <form id="payment-form" method="post" action="../db/createTicket.php">
                <input type="hidden" name="user_id"
                    value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
                <input type="hidden" id="validation-errors" value='<?php echo json_encode($validationErrors); ?>'>

                <label for="event-select">Kies een evenement:</label>
                <select id="event-select" name="event" required>
                    <option value="" disabled selected>Kies een evenement</option>
                    <option value="Milaan 2024">Milaan 2024</option>
                    <option value="Budapest 2024">Budapest 2024</option>
                    <option value="Rotterdam 2024">Rotterdam 2024</option>
                </select>
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                    <?php echo isset($validationErrors['event']) ? $validationErrors['event'] : ''; ?>
                </div>

                <label for="date-select">Datum:</label>
                <select id="date-select" name="date" required>
                    <option value="" disabled selected>Kies een evenementdatum</option>
                </select>
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                    <?php echo isset($validationErrors['date']) ? $validationErrors['date'] : ''; ?>
                </div>

                <label for="quantity">Aantal tickets:</label>
                <button type="button" id="decrease">-</button>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="10">
                <button type="button" id="increase">+</button>
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                    <?php echo isset($validationErrors['quantity']) ? $validationErrors['quantity'] : ''; ?>
                </div>

                <p id="total-price" style="font-weight: bold; margin-top: 10px;">Totaalprijs: €0</p>

                <input type="text" name="first_name" placeholder="Voornaam" required pattern="[a-zA-ZÀ-ÿ ]+"
                    title="Gebruik alleen letters">
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                    <?php echo isset($validationErrors['first_name']) ? $validationErrors['first_name'] : ''; ?>
                </div>

                <input type="text" name="last_name" placeholder="Achternaam" required pattern="[a-zA-ZÀ-ÿ ]+"
                    title="Gebruik alleen letters">
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                    <?php echo isset($validationErrors['last_name']) ? $validationErrors['last_name'] : ''; ?>
                </div>

                <input type="text" name="phone" placeholder="Telefoonnummer" required pattern="\d{10}"
                    title="Gebruik een geldig telefoonnummer">
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                    <?php echo isset($validationErrors['phone']) ? $validationErrors['phone'] : ''; ?>
                </div>

                <input type="email" name="email" placeholder="E-mailadres" required>
                <div class="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                    <?php echo isset($validationErrors['email']) ? $validationErrors['email'] : ''; ?>
                </div>

                <button type="submit">Betalen</button>
                <button type="button" class="closePopup">Close</button>
            </form>
        </div>
    </div>

    <div id="popupLogin" class="popup">
        <div class="popup-content">
            <?php if (!isset($_SESSION['id'])) { ?>
                <h2 class="popup-header">
                    U heeft geen account!
                </h2>

                <p>Tickets zonder registratie gekocht? Geen zorgen! U ontvangt alle ticketinformatie per e-mail.
                    Als u zich registreert, kunt u echter al uw tickets eenvoudig beheren en bekijken op onze website,
                    en toegang krijgen tot extra functies!</p>

                <a href="login.php" class="login-button">Log in om uw ticket te bekijken en beheren op de
                    website!</a>
                <div class="divider">Of</div>
                <p id="toPopup">Ga verder zonder registratie.</p>
            <?php } ?>

        </div>
    </div>

    <style>
        /* Overlay background */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            /* Dark transparent background */
            display: none;
            /* Hidden by default */
            z-index: 999;
            /* On top of other elements */
        }

        /* Popup container */
        .popup {
            position: fixed;
            min-width: 40rem;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            width: 350px;
            max-height: 80vh;
            /* Set max height to 80% of the viewport height */
            overflow-y: auto;
            /* Add vertical scrollbar if content exceeds height */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            display: none;
            /* Hidden by default */
            z-index: 1000;
            /* Above overlay */
        }

        /* Popup content */
        .popup-content {
            text-align: center;
        }

        /* Form styling */
        .popup form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .popup input,
        .popup select,
        .popup button,
        .popup .login-button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .popup button,
        .popup .login-button {
            background-color: #f95a1a;
            color: white;
            border: none;
            cursor: pointer;
        }

        .popup button:hover,
        .popup .login-button:hover {
            background-color: #ff7043;
        }

        .closePopup {
            background-color: transparent;
            border: none;
            color: #f95a1a;
            cursor: pointer;
            margin-top: 10px;
        }

        .message {
            width: 100%;
            color: green;
            text-align: center;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 5px;
            border-radius: 5px;
            font-size: 0.9rem;
        }
    </style>

    <!-- All extra scripts -->
    <script src="../js/Ticket.js"></script>


    <?php include_once "../includes/footer.php"; ?>
</body>

</html>