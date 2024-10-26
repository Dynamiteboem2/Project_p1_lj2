<?php

session_start();
if (isset($_SESSION["id"])) {
    // Redirect to profile page
    header("location: ../index.php");
    exit;
}

?>

<?php include_once "../includes/header.php" ?>
<!-- All extra links for styling etc.-->
<link rel="stylesheet" href="../assets/css/formLogin.css" />
<title>Sneakerness - Inloggen</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <div class="login">
        <div class="login-box">
            <h2>Log in met je account</h2>

            <form id="login_form" action="<?php echo URL ?>/db/checkLogin.php" method="post">
                <!-- Error -->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php }  ?>

                <!-- Message -->
                <?php if (isset($_GET['message'])) { ?>
                    <p class="message"><?php echo $_GET['message']; ?></p>
                <?php } ?>

                <div id="error-placeholder" style="width: 100%;"></div>

                <!-- Mail -->
                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required placeholder="name@example.com">
                </div>

                <!-- Password -->
                <div class="input-box">
                    <label for="password">Wachtwoord</label>
                    <input type="password" id="password" name="password" required placeholder="*******">
                </div>

                <button id="submitButton">Inloggen</button>

                <p class="small-text">Nog geen account? <a href="register.php">Registreer hier</a></p>
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
    <script src="../js/login.js"></script>
</body>

</html>