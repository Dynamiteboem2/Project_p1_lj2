<?php 
include_once "../includes/header.php"; 
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
                <?php if (isset($_GET['error'])) { ?>
    <p class="error" style="color: red;"><?php echo $_GET['error']; ?></p>
<?php } ?>

<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo "<div class='alert alert-success' style='color: green;'>Ticket succesvol gekocht!</div>";
}
?>
                <p><a href="Verschillende_tickets.php" class="highlight-link">Bekijk hier de verschillende tickets</a></p>
            </div>
            
           

            <div class="ticket-cards">
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/milan4.jpg" alt="Milaan Ticket">
                    <h3>Milaan 2024</h3>
                    <button class="ticket-btn" data-event="Milaan 2024">Koop Nu</button>
                </div>
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/budapest2jpg.jpg" alt="Budapest Ticket">
                    <h3>Budapest 2024</h3>
                    <button class="ticket-btn" data-event="Budapest 2024">Koop Nu</button>
                </div>
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/rotjpg.jpg" alt="Rotterdam Ticket">
                    <h3>Rotterdam 2024</h3>
                    <button class="ticket-btn" data-event="Rotterdam 2024">Koop Nu</button>
                </div>
            </div>
        </div>
    </section>

    <div id="overlay"></div>
    <div id="popup">
        <div id="popup-content">
            <h2 id="popup-header">Selecteer welke Ticket!</h2>    

            <form id="payment-form" method="post" action="../db/createTicket.php">
                <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">

                <label for="event-select">Kies een evenement:</label>
                <select id="event-select" name="event" required>
                    <option value="" disabled selected>Kies een evenement</option>
                    <option value="Milaan 2024">Milaan 2024</option>  
                    <option value="Budapest 2024">Budapest 2024</option>
                    <option value="Rotterdam 2024">Rotterdam 2024</option>
                </select>

                <div class="error-message" id="error-ticket-date" style="color: red; font-size: 14px; margin-top: 5px;"></div>
                <label for="date-select">Datum:</label>
                <select id="date-select" name="date" required>
                    <option value="" disabled selected>Kies een evenementdatum</option>
                </select>

                <label for="ticket-quantity">Aantal tickets:</label>
                <button type="button" id="decrease">-</button>
                <input type="number" id="ticket-quantity" name="quantity" value="1" min="1" max="10">
                <button type="button" id="increase">+</button>

                <p id="total-price" style="font-weight: bold; margin-top: 10px;">Totaalprijs: €0</p>

                <input type="text" name="first_name" id="first-name" placeholder="Voornaam:" required pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters">
                <div class="error-message" id="error-first-name" style="color: red; font-size: 14px; margin-top: 5px;"></div>

                <input type="text" name="last_name" id="last-name" placeholder="Achternaam:" required pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters">
                <div class="error-message" id="error-last-name" style="color: red; font-size: 14px; margin-top: 5px;"></div>

                <input type="tel" name="phone" id="phone" placeholder="Telefoonnummer:" required pattern="[0-9]+" title="Gebruik alleen cijfers">
                <div class="error-message" id="error-phone" style="color: red; font-size: 14px; margin-top: 5px;"></div>

                <input type="email" name="email" id="email" placeholder="E-mailadres:" required>
                <div class="error-message" id="error-email" style="color: red; font-size: 14px; margin-top: 5px;"></div>

                <button type="submit">Submit</button>
            </form>
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