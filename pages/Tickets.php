<?php include_once "../includes/header.php"; 
session_start();
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
                <p><a href="Verschillende_tickets.php" class="highlight-link">Bekijk hier de verschillende tickets</a></p>
            </div>
            
            <!-- Redirect to user dashboard -->
            <?php if (isset($_GET['message'])) { ?>
                <p class="message"><?php echo $_GET['message']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <div class="ticket-cards">
                <!-- Ticket Cards -->
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/milan4.jpg" alt="Milaan Ticket">
                    <h3>Milaan 2024</h3>
                    <h3>20-21 OKTOBER, 2024</h3>
                    <button class="ticket-btn" data-event="Milaan 2024" data-date="20-21 OKTOBER, 2024">Koop Nu</button>
                </div>

                <div class="ticket-card">
                    <img class="ticket-img" src="../img/budapest2jpg.jpg" alt="Budapest Ticket">
                    <h3>Budapest 2024</h3> 
                    <h3>23-24 OKTOBER, 2024</h3>
                    <button class="ticket-btn" data-event="Budapest 2024" data-date="23-24 OKTOBER, 2024">Boek Nu</button>
                </div>

                <div class="ticket-card">
                    <img class="ticket-img" src="../img/rotjpg.jpg" alt="Rotterdam Ticket">
                    <h3>Rotterdam 2024</h3>
                    <h3>26-27 OKTOBER, 2024</h3>
                    <button class="ticket-btn" data-event="Rotterdam 2024" data-date="26-27 OKTOBER, 2024">Boek Nu</button>
                </div>

                <!-- Popup and Form -->
                <div id="overlay"></div>
                <div id="popup">
                    <div id="popup-content">
                        <h2 id="popup-header">Selecteer welke Ticket!</h2>    

                        <form id="payment-form" method="post" action="../db/createTicket.php">
                            <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">

                            <label for="event-select">Kies een evenement:</label>
                            <select id="event-select" name="event-select" required>
                                <option value="" disabled selected>Kies een evenement</option>
                                <option value="Milaan 2024">Milaan 2024</option>
                                <option value="Budapest 2024">Budapest 2024</option>
                                <option value="Rotterdam 2024">Rotterdam 2024</option>
                            </select>

                            <label for="date-select">Kies een evenementdatum:</label>
                            <select id="date-select" name="date-select" required>
                                <option value="" disabled selected>Kies eerst een evenement</option>
                            </select>

                            <label for="ticket-quantity">Aantal tickets:</label>
                            <div id="ticket-quantity-wrapper">
                                <button type="button" id="decrease">-</button>
                                <input type="number" id="ticket-quantity" name="ticket-quantity" min="1" max="10" value="1" required>
                                <button type="button" id="increase">+</button>
                            </div>

                            <p id="total-price" style="font-weight: bold; margin-top: 10px;">Totaalprijs: €0</p>

                            <input type="text" id="first-name" name="first-name" placeholder="Voornaam" required>
                            <input type="text" id="last-name" name="last-name" placeholder="Achternaam" required>
                            <input type="tel" id="phone" name="phone" placeholder="Telefoonnummer" required>
                            <input type="email" name="email" placeholder="Email" id="email" required>

                            <button type="submit">Betaal Nu</button>
                        </form>

                        <button id="closePopup">Sluit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Overlay background */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7); /* Dark transparent background */
            display: none; /* Hidden by default */
            z-index: 999; /* On top of other elements */
        }

        /* Popup container */
        #popup {
            position: fixed;
            min-width: 40rem;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            width: 350px;
            max-height: 80vh; /* Set max height to 80% of the viewport height */
            overflow-y: auto; /* Add vertical scrollbar if content exceeds height */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            display: none; /* Hidden by default */
            z-index: 1000; /* Above overlay */
        }

        /* Popup content */
        #popup-content {
            text-align: center;
        }

        /* Form styling */
        #popup form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #popup input,
        #popup select,
        #popup button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #popup button {
            background-color: #f95a1a;
            color: white;
            border: none;
            cursor: pointer;
        }

        #popup button:hover {
            background-color: #ff7043;
        }

        #closePopup {
            background-color: transparent;
            border: none;
            color: #f95a1a;
            cursor: pointer;
            text-decoration: underline;
            margin-top: 10px;
        }
    </style>

    <!-- All extra scripts -->
    <script src="../js/Ticket.js"></script>
    <?php include_once "../includes/footer.php"; ?>
</body>
</html>
