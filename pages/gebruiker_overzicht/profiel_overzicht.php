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
        
        <div class="main">
            <!-- Profile Section -->
            <div id="profile" class="content-section active">
                <h1>Profile</h1>
                <p>This is the profile section content.</p>
                <form id="profileForm">
                    <div class="form-group">
                        <label for="userName">User Name:</label>
                        <input type="text" id="userName" name="userName">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail:</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" id="location" name="location">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                </form>
            </div>

            <!-- Purchases Section -->
            <div id="purchases" class="content-section">
                <h1>Purchases</h1>
                <p>This is your purchase history.</p>
                <ul>
                    <li>Purchase 1: Sneakers</li>
                    <li>Purchase 2: Jacket</li>
                    <li>Purchase 3: Cap</li>
                </ul>
            </div>

            <!-- Settings Section -->
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