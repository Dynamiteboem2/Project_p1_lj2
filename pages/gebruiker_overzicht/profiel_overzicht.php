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
                
                <li><a href="profiel_overzicht"  class="fas fa-user"></a></li>
                <li><a href="security_overzicht.php"  class="fas fa-lock"></a></li>
                <li><a href="cart_overzicht.php"  class="fas fa-shopping-cart"></a></li>
                <li><a href=""  class="fas fa-trash"></a></span></li>
            </ul>
        </div>
    
    <div class="container_main">
        <div class="main">
            <!-- Profile Section -->
            <div id="swup" class="transition-fade">
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
        </div>
    </div>
</div>

    <script defer src="https://unpkg.com/swup@4"></script>
<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        const swupElement = document.getElementById('swup');
        if (swupElement) {
            swupElement.classList.add('is-visible');
        }
    });
</script>

<style>
    .transition-fade {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .transition-fade.is-visible {
        opacity: 1;
    }
</style>
    <?php include_once "../../includes/footer.php" ?>
</body>
</html>