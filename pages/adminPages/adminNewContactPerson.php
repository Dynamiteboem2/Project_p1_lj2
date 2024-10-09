<?php
include_once "../../db/conn.php";
include_once "auth.php";
?>

<?php include_once "../../includes/header.php" ?>
<link rel="stylesheet" href="../../assets/css/adminForm.css">
<title>Sneakerness - Admin Contact Persons</title>
</head>


<body>
    <?php include_once "../../includes/navbar.php" ?>

    <div class="admin-form">
        <div class="admin-form-box">
            <h2>New Contact Person</h2>

            <form action="<?php echo URL ?>/db/adminContactPerson.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <div class="input-box">
                    <label for="fullName">Full Name *</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>

                <div class="input-box">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-box">
                    <label for="phoneNumber">Phone Number *</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" required>
                </div>

                <button type="submit">Create</button>
                <a href="<?php echo URL . "/pages/adminPages/adminContactPersons.php" ?>" class="back-button">Cancel</a>
            </form>
        </div>
    </div>

    <?php include_once "../../includes/footer.php" ?>
    <!-- All extra scripts -->
</body>

</html>