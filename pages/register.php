<?php
if (isset($_SESSION["id"])) {
    // Redirect to profile page
    header("location: ../index.php");
    exit;
}
?>

<?php include_once "../includes/header.php" ?>
<!-- All extra links for styling etc.-->
<link rel="stylesheet" href="../assets/css/formLogin.css" />
<title>Sneakerness - Registeer</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <div class="login">
        <div class="login-box">
            <h2>Maak een account aan</h2>

            <form id="register_form" action="<?php echo URL ?>/db/checkRegister.php" method="post">
                <!-- Error -->
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } else { ?>
                <div id="error-placeholder" style="width: 100%;"></div>
                <?php } ?>

                <div class="input-box">
                    <label for="first_name">Voornaam</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Lotte">
                </div>

                <div class="input-box">
                    <label for="infix_name">Tussenvoegsel</label>
                    <input type="text" id="infix_name" name="infix_name" placeholder="van">
                </div>

                <div class="input-box">
                    <label for="last_name">Achternaam</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Dijk">
                </div>

                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required placeholder="name@example.com">
                </div>

                <div class="input-box">
                    <label for="password">Wachtwoord</label>
                    <input type="password" id="password" name="password" required placeholder="*******">
                </div>

                <div class="input-box">
                    <label for="confirm_password">Bevestig wachtwoord</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="*******">
                </div>

                <button id="submitButton">Registreren</button>

                <p class="small-text">Heb je al een account? <a href="login.php">Log hier in</a></p>
            </form>
        </div>
    </div>

    <?php include_once "../includes/footer.php" ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const requiredInputs = document.querySelectorAll('input[required]');

        requiredInputs.forEach(input => {
            const label = document.querySelector(`label[for="${input.id}"]`);
            if (label) {
                label.innerHTML += ' <span style="color: red;">*</span>';
            }
        });
    });
    </script>
    <!-- All extra scripts -->
    <script src="../js/register.js"></script>
</body>

</html>