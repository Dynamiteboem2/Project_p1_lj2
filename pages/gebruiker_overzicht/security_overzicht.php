<?php include_once "../../includes/header.php" ?>
<link rel="stylesheet" href="../../assets/css/inlog.css">
<title>Sneakerness</title>
</head>
<body>
<body>
<?php include_once "../../includes/navbar.php" ?>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><span class="fas fa-user"></span></li>
                <li><span onclick="transitionToPage('security_overzicht.php')" class="fas fa-lock" ></span></li>
                <li><span onclick="transitionToPage('cart_overzicht.php')" class="fas fa-shopping-cart"></span></li>
                <li><span onclick="transitionToPage('_overzicht.php')" class="fas fa-trash"></span></li>
            </ul>
        </div>

        
        <div id="settings" class="content-section">
                <h1>Settings</h1>
                <p>Here you can change your settings.</p>
                <form id="settingsForm">
                    <div class="form-group">
                        <label for="notifications">Notifications:</label>
                        <input type="checkbox" id="notifications" name="notifications">
                    </div>
                    <div class="form-group">
                        <label for="privacy">Privacy Settings:</label>
                        <input type="checkbox" id="privacy" name="privacy">
                    </div>
                    <div class="form-group">
                        <label for="darkMode">Dark Mode:</label>
                        <input type="checkbox" id="darkMode" name="darkMode">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../../js/gebruiker_overzicht.js"></script>
    <?php include_once "../../includes/footer.php" ?>
</body>
</html>