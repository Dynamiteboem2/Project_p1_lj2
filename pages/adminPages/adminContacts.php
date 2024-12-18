<?php
include_once "../../db/conn.php";
include_once "auth.php";
?>

<?php include_once "../../includes/header.php" ?>
<link rel="stylesheet" href="../../assets/css/adminList.css">
<title>Sneakerness - Admin Contacts</title>
</head>


<body>
    <?php include_once "../../includes/navbar.php" ?>
    <div class="admin-list">
        <div class="list-title">
            <h2>Admin - Contacts</h2>
            <div class="list-buttons">
                <a href="<?php echo URL . "/pages/gebruiker_overzicht/admin.php"; ?>" class="list-button">Back</a>
            </div>
        </div>

        <?php if (isset($_GET['message'])) { ?>
            <p class="message"><?php echo $_GET['message']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM contact";
            $result = $conn->query($sql);
            $tickets = $result->fetch_all(MYSQLI_ASSOC);

            foreach ($tickets as $ticket) {
            ?>
                <tr>
                    <td><?php echo $ticket['firstName'] ?></td>
                    <td><?php echo $ticket['lastName'] ?></td>
                    <td><?php echo $ticket['email'] ?></td>
                    <td><?php echo $ticket['message'] ?></td>
                    <td><?php echo $ticket['createdDate'] ?></td>
                    <td class="actions">
                        <a href="mailto:<?php echo $ticket['email'] ?>">Contact</a>
                        <a href="<?php echo URL . "/db/adminDelete.php?id=" . $ticket['id'] ?>&table=contact&page=adminContacts"
                            onclick='ConfirmAction(event, "delete")'>Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <?php include_once "../../includes/footer.php" ?>

    <script src="../../js/adminConfirm.js"></script>
    <script src="../../js/adminList.js"></script>
    <!-- All extra scripts -->
</body>

</html>