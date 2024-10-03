<?php include_once "../includes/header.php" ?>
<!-- All extra links for styling etc. -->
<title>Sneakerness - Tickets</title>
<link rel="stylesheet" href="../assets/css/tickets.css">
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <section class="ticket-verkoop">
        <div class="container">
            <div class="ticket-intro">
                <h2>Koop hier uw Tickets voor het evenement!</h2>
                <p>Kom naar het grootste sneaker event!</p>
                <p><a href="Verschillende_tickets.php" class="highlight-link">Bekijk hier de verschillende tickets</a></p>

            </div>

            <div class="ticket-cards">
                <!-- Normaal Ticket -->
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/milan4.jpg" alt="Normale Ticket">
                    <h3>Milaan 2024</h3>
                    <h3>20-21 OKTOBER, 2024</h3>
                    
              
                    <a href="NormaleTickets.php">
                        <button>Koop Nu</button>
                    </a>
                </div>

                <!-- VIP Ticket -->
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/budapest2jpg.jpg" alt="VIP Ticket">
                    <h3>Budapest 2024</h3>
                    <h3>23-24 OKTOBER, 2024</h3>
                   
                    
                    <a href="VIPTickets.php">
                        <button>Boek Nu</button>
                    </a>
                </div>

                <!-- Nieuwe VIP Ticket met rotjpg.jpg -->
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/rotjpg.jpg" alt="VIP Ticket">
                    <h3>Rotterdam 2024</h3>
                    <h3>26-27 OKTOBER, 2024</h3>
                  
                    <a href="VIPTickets.php">
                        <button>Boek Nu</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once "../includes/footer.php" ?>

    <!-- All extra scripts -->
</body>

</html>
