	<?php include_once "../includes/header.php" ?>
	<link rel="stylesheet" href="../assets/css/muziek.css" />
	<title>Sneakerness- Muziek</title>
	</head>

	<body>
	    <?php include_once "../includes/navbar.php" ?>

	    <div class="musics">
	        <div class="container">
	            <div class="text-section">
	                <h1>Music We Play</h1>
	                <p>
	                    Are you a music fan? We are too these will be the playlist we are
	                    playing at the events. If you want some other songs or playlists
	                    please contact us!
	                </p>
	                <a href="https://open.spotify.com/track/0YV7dnl24bPzvieY4M0J4b" class="learn-more-btn">Playlist
	                    Here!</a>
	            </div>

	            <div class="image-container">
	                <img src="../img/Albumcover.png" alt="Playlist 1" class="image image-1" />
	                <img src="../img/TerrorcoreCover.png" alt="Playlist 2" class="image image-2" />
	                <img src="../img/jezusCover.png" alt="Playlist 3" class="image image-3" />
	            </div>
	        </div>

	        <div class="container">
	            <div class="text-section">
	                <h1>Fashion</h1>
	                <p>
	                    Do you want new clothes for your new sneakers? Well here you can get
	                    it! Visit the stands on the event to get you new outfit!
	                </p>
	                <a href="#" class="learn-more-btn">See Here</a>
	            </div>
	            <div class="image-container">
	                <img src="../img/Roodpak.png" alt="Playlist 1" class="image image-1" />
	                <img src="../img/Witpak.png" alt="Playlist 2" class="image image-2" />
	                <img src="../img/Nikepak.png" alt="Playlist 3" class="image image-3" />
	            </div>
	        </div>

	        <div class="container">
	            <div class="text-section">
	                <h1>Art</h1>
	                <p>
	                    You want some new art from sneakers? Well you can buy them at the
	                    stands on the event come by them and get your new art piece!
	                </p>
	                <a href="#" class="learn-more-btn">See Here</a>
	            </div>
	            <div class="image-container">
	                <img src="../img/RedNike.png" alt="Playlist 1" class="image image-1" />
	                <img src="../img/BlueNIke.png" alt="Playlist 2" class="image image-2" />
	                <img src="../img/GravityNIke.png" alt="Playlist 3" class="image image-3" />
	            </div>
	        </div>

	        <div class="container">
	            <div class="text-section">
	                <h1>Sport</h1>
	                <p>
	                    You need some new sport shoes or clothing? We got that here for you to
	                    try and play a game. Come get your new sportwear here!
	                </p>
	                <a href="#" class="learn-more-btn">See Here</a>
	            </div>
	            <div class="image-container">
	                <img src="../img/Footballplaying.png" alt="Playlist 1" class="image image-1" />
	                <img src="../img/GreenFootball.png" alt="Playlist 2" class="image image-2" />
	                <img src="../img/Sportwear.png" alt="Playlist 3" class="image image-3" />
	            </div>
	        </div>
	    </div>

	    <?php include_once "../includes/footer.php" ?>

	    <script>
	    function checkContainers() {
	        var containers = document.querySelectorAll(".container");

	        containers.forEach(function(container) {
	            var containerPosition = container.getBoundingClientRect().top;
	            var screenBottom = window.innerHeight / 1.2;
	            var screenTop = 0; // Bovenkant van de viewport
	            var offset = 50;

	            if (containerPosition < screenBottom - offset) {
	                container.style.opacity = "1";
	                container.style.transform = "translateY(0)";
	            } else {
	                container.style.opacity = "0";
	                container.style.transform = "translateY(50px)";
	            }

	            // Check of het container-element zichtbaar is in het scrollgebied
	        });
	    }

	    // Controleer containers bij scrollen
	    window.addEventListener("scroll", checkContainers);

	    // Controleer containers direct bij het laden van de pagina
	    window.addEventListener("load", checkContainers);
	    </script>
	</body>

	</html>