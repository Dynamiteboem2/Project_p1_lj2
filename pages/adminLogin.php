<?php
    // session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php");
}
?>

<?php include_once "../includes/header.php" ?>
<title>Sneakerness - Admin Login</title>
<link rel="stylesheet" href="../assets/css/adminLogin.css" />
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <!-- Admin Login - Text Nederlands-->
    <div class="admin-login">
        <div class="admin-login-box">
            <h2>Admin Login</h2>

            <form action="<?php echo URL ?>/db/adminCheckLogin.php" method="post">
                <!-- Error -->
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <div class="input-box">
                    <label for="username">Gebruikersnaam *</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-box">
                    <label for="password">Wachtwoord *</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit">Inloggen</button>
            </form>
        </div>
    </div>

    <?php include_once "../includes/footer.php" ?>
    <!-- All extra scripts -->
</body>

</html>