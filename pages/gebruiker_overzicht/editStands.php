<?php
include_once "../../db/conn.php";
?>

<?php include_once "../../includes/header.php" ?>
<link rel="stylesheet" href="../../assets/css/adminForm.css">
<title>Sneakerness - Edit User</title>
</head>

<body>
    <?php include_once "../../includes/navbar.php" ?>

    <div class="admin-form">
        <div class="admin-form-box">
            <h2>Gegevens aanpassen</h2>

            <form action="<?php echo URL ?>/pages/gebruiker_overzicht/cart_overzicht.php?id=<?php echo $_GET['id'] ?>" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php

               $id = $_GET['id'];
               $sql = "SELECT * FROM stand WHERE id = $id";

                  $result = $conn->query($sql);
               $stand = $result->fetch_assoc();
                ?>

                <div class="input-box">
                    <label for="firstName">Voornaam</label>
                    <input type="text" id="firstName" name="firstName" value="<?php echo $stand['firstName'] ?>" required>
                </div>

                <div class="input-box">
                    <label for="lastName">Achternaam</label>
                    <input type="text" id="lastName" name="lastName" value="<?php echo $stand['lastName'] ?>" required>
                </div>

                <div class="input-box">
                    <label for="email">E-mail adres</label>
                    <input type="email" id="email" name="email" value="<?php echo $stand['email'] ?>" required>
                </div>

                <div class="input-box">
                    <label for="phoneNumber">Telefoonnummer</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $stand['phoneNumber'] ?>" required>
                </div>

                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="table" value="users">

                <button type="submit">Sla wijzigingen op</button>
                <a href="<?php echo URL . "/pages/gebruiker_overzicht/cart_overzicht.php" ?>" class="back-button">Annuleren</a>
            </form>
        </div>
    </div>

    <?php include_once "../../includes/footer.php" ?>
    <!-- All extra scripts -->
</body>

</html>
