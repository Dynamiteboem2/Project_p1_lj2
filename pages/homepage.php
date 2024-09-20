<?php include_once "../includes/header.php" ?>
<title>Sneakerness- Homepage</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <section class="hero">
        <img class="sneakerIMG" src="../img/Sneakerness.jpg" alt="Sneakerness Image" />
        <div class="overlay">Welcome to Sneakerness</div>
    </section>

    <div class="eventBorder">
        <h1>OPKOMENDE EVENEMENTEN</h1>
        <div class="events">
            <div class="event" style="background-color: #800080">
                <div class="date">27-28 OKTOBER, 2021</div>
                <h2>Milan 2024</h2>
                <div class="image"><img src="milan.jpg" alt="Milan 2024" /></div>
            </div>
            <div class="event" style="background-color: #d87093">
                <div class="date">11-13 OKTOBER, 2024</div>
                <h2>Budapest 2024</h2>
                <div class="image">
                    <img src="budapest.jpg" alt="budapest 2024" />
                </div>
            </div>
            <div class="event" style="background-color: #00ff00">
                <div class="date">26-27 OKTOBER, 2024</div>
                <h2>Rotterdam 2024</h2>
                <div class="image">
                    <img src="rotterdam.jpg" alt="Rotterdam 2024" />
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