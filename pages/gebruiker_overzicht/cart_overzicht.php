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
            <li><a href="profiel_overzicht.php" class="fas fa-user"></a></li>
            <li><a href="security_overzicht.php" class="fas fa-lock"></a></li>
            <li><a href="cart_overzicht.php" class="fas fa-shopping-cart"></a></li>
            <li><a href="" class="fas fa-trash"></a></li>
        </ul>
    </div>

    <div class="main">
        <!-- Profile Section -->
        <div id="swup" class="transition-fade">
            <h1>Purchases</h1>
            <p>This is your purchase history.</p>
            <ul>
                <li>Purchase 1: Sneakers</li>
                <li>Purchase 2: Jacket</li>
                <li>Purchase 3: Cap</li>
            </ul>
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