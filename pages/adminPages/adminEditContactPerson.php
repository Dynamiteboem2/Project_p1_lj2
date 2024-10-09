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
            <h2>Edit Contact Person</h2>

            <form action="<?php echo URL ?>/db/adminContactPerson.php?id=<?php echo $_GET['id'] ?>" method="post">
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php

                $id = $_GET['id'];
                $sql = "SELECT * FROM contactperson WHERE id = $id";

                $result = $conn->query($sql);
                $contactPerson = $result->fetch_assoc();

                ?>

                <div class="input-box">
                    <label for="fullName">Full Name *</label>
                    <input type="text" id="fullName" name="fullName" value="<?php echo $contactPerson['fullName'] ?>"
                        required>
                </div>

                <div class="input-box">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="<?php echo $contactPerson['email'] ?>" required>
                </div>

                <div class="input-box">
                    <label for="phoneNumber">Phone Number *</label>
                    <input type="text" id="phoneNumber" name="phoneNumber"
                        value="<?php echo $contactPerson['phoneNumber'] ?>" required>
                </div>

                <input type="hidden" name="id" value="<?php echo $contactPerson['id'] ?>">
                <input type="hidden" name="table" value="contactperson">

                <button type="submit">Create</button>
                <a href="<?php echo URL . "/pages/adminPages/adminContactPersons.php" ?>" class="back-button">Cancel</a>
            </form>
        </div>
    </div>

    <?php include_once "../../includes/footer.php" ?>
    <!-- All extra scripts -->
</body>

</html>