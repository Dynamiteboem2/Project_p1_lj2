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
                
                <li><a href=""  class="fas fa-user"></a></li>
                <li><a href=""  class="fas fa-lock"></a></li>
                <li><a href=""  class="fas fa-shopping-cart"></a></li>
                <li><a href=""  class="fas fa-trash"></a></span></li>
            </ul>
        </div>
        
        <div id="swup" class="transtion-fade">
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


    <script defer src="https://unpkg.com/swup@4"></script>
    <script defer>
     const swup = new Swup();
    </script>
    <?php include_once "../../includes/footer.php" ?>
</body>
</html>