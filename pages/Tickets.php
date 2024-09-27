<?php include_once "../includes/header.php" ?>
<!-- All extra links for styling etc.-->
<title>Sneakerness - </title>
<link rel="stylesheet" href="../assets/css/tickets.css">
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <section class="stand-verkoop col">
        <div class="container">
            <div class="stand-intro">
                <h2>Koop hier uw Tickets!</h2>
                <p>Kom naar het grootste sneaker event!</p>
            </div>

            <div class="stand-cards row">
                <div class="stand-card col-4 ">

                    <img class="stand-img  " src="../img/NormaleTicket.png" alt="Stand Type 1">

                    <h3>ticket</h3>
                    <p>Standaart ticket</p>
                    <ul>
                        <li>Toegang tot evenement</li>
                    </ul>
                    <span class="price">€250</span>
                    <a href="NormaleTickets.php">
                        <button>Koop Nu</button>
                    </a>
                </div>

                <div class="stand-card col-4">
                    <img class="stand-img  " src="../img/VIPticket.png" alt="Stand Type 1">
                    <h3>ticket</h3>
                    <p>VIP ticket</p>
                    <li>Toegang tot evenement</li>
                    <li>VIP lounge</li>
                    <li>10% korting op eten/drinken</li>
                    </ul>
                    <span class="price">€500</span>
                    <button class="btn">Boek Nu</button>
                </div>


    </section>

    <?php include_once "../includes/footer.php" ?>

    <!-- All extra scripts -->
</body>

</html>