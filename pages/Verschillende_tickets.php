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
                <h2>Dit zijn de verschillende tickets!</h2>
            </div>

            <div class="ticket-cards">
                <!-- Normaal Ticket -->
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/NormaleTicket.png" alt="Normale Ticket">
                    <h3>Standaard ticket</h3>
                   
                    <ul>
                        <li>Toegang tot evenement</li>
                    </ul>
                    <span class="price">€250</span>
                   
                </div>

                <!-- VIP Ticket -->
                <div class="ticket-card">
                    <img class="ticket-img" src="../img/VIPticket.png" alt="VIP Ticket">
                    <h3>VIP ticket</h3>
                   
                    <ul>
                        <li>Toegang tot evenement</li>
                        <li>VIP lounge</li>
                        <li>10% korting op eten/drinken</li>
                    </ul>
                    <span class="price">€500</span>
                   
                </div>
            </div>
        </div>
    </section>

    <?php include_once "../includes/footer.php" ?>

    <!-- All extra scripts -->
</body>

</html>
