<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminLogin.php");
}
?>

<?php include_once "../includes/header.php" ?>
<!-- All extra links for styling etc.-->
<link rel="stylesheet" href="../assets/css/admin.css">
<title>Sneakerness - </title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <div class="admin">
        <h2>Admin</h2>
        <div class="admin-box">
            <div class="admin-box-item">
                <h3>Tickets</h3>
                <a href="<?php echo URL . "/pages/adminPages/adminTickets.php"; ?>">View</a>
            </div>
            <div class="admin-box-item">
                <h3>Stands</h3>
                <a href="<?php echo URL . "/pages/adminPages/adminStands.php"; ?>">View</a>
            </div>
            <div class="admin-box-item">
                <h3>Contacts</h3>
                <a href="<?php echo URL . "/pages/adminPages/adminContacts.php"; ?>">View</a>
            </div>
            <div class="admin-box-item">
                <h3>Contact Persons</h3>
                <a href="<?php echo URL . "/pages/adminPages/adminContactPersons.php"; ?>">View</a>
            </div>
        </div>

        <a href="<?php echo URL . "/db/adminLogout.php"; ?>" class="logout">Logout</a>
    </div>

    <?php include_once "../includes/footer.php" ?>

    <!-- All extra scripts -->
</body>

</html>