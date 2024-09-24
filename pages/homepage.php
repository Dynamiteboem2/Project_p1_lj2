<?php include_once "../includes/header.php" ?>
<title>Sneakerness- Homepage</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <section class="hero">
        <div class="image-container">
            <img class="sneakerIMG" src="../Img/Sneakerness.webp" alt="Sneakerness Image 1">
            <img class="sneakerIMG" src="../Img/Sneakerness2.jpg" alt="Sneakerness Image 2">
        </div>
        <div class="overlay">Sneakerness</div>
    </section>

    <div class="eventBorder">
        <h1>OPKOMENDE EVENEMENTEN</h1>
        <div class="events">
            <div class="event" style="background-image: url(../Img/milan4.jpg); background-position: center;">
                <div class="event-box">
                    <div class="date">20-21 OKTOBER, 2024</div>
                    <h2 class="milaan">Milaan 2024</h2>
                </div>
            </div>
            <div class="event" style="background-image: url(../Img/Budapest2jpg.jpg); background-position: center;">
                <div class="event-box">
                    <div class="date">23-24 OKTOBER, 2024</div>
                    <h2 class="budapest">Budapest 2024</h2>
                </div>
            </div>
            <div class="event" style="background-image: url(../Img/rotjpg.jpg); background-position: center;">
                <div class="event-box">
                    <div class="date">26-27 OKTOBER, 2024</div>
                    <h2 class="rotterdam">Rotterdam 2024</h2>
                </div>
            </div>
        </div>
        <button class="view-all">Bekijk alle evenementen</button>
    </div>

    <section class="content">
        <div class="whatIsSneakerness">
            <div class="sneakerJPG">
                <img src="../img/GravityNIke.png" alt="Sneaker event" />
            </div>
            <div class="textContent">
                <h1 class="title">Wat is Sneakerness?</h1>
                <p class="description">
                    ONZE PASSIE VOOR SNEAKERS ZORGT ERVOOR DAT WE EVENEMENTEN CREËREN
                    DIE DE ESSENTIE VAN DE SNEAKERCULTUUR VASTLEGGEN. ERVAAR WAT VEEL
                    MEER IS DAN ALLEEN EEN SCHOEN.
                </p>
                <div class="showMore">
                    <a class="button" href="<?php echo URL . "/pages/muziek.php" ?>">ONTDEK MEER</a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once "../includes/footer.php" ?>
</body>

</html>