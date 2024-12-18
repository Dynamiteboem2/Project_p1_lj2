<?php
include_once "../../db/conn.php";
include_once "auth.php";
?>

<?php include_once "../../includes/header.php" ?>
<link rel="stylesheet" href="../../assets/css/adminList.css">
<title>Sneakerness - Admin Tickets</title>
</head>


<body>
    <?php include_once "../../includes/navbar.php" ?>

    <div class="admin-list">
        <div class="list-title">
            <h2>Admin - Tickets</h2>
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
                <th>Event</th>
                <th>Event Date</th>
                <th>Ticket Quantity</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM ticket";
            $result = $conn->query($sql);
            $tickets = $result->fetch_all(MYSQLI_ASSOC);

            foreach ($tickets as $ticket) {
            ?>
                <tr>
                    <td><?php echo $ticket['event_id'] ?></td>
                    <td><?php echo $ticket['event_date'] ?></td>
                    <td><?php echo $ticket['ticket_quantity'] ?></td>
                    <td><?php echo $ticket['first_name'] ?></td>
                    <td><?php echo $ticket['last_name'] ?></td>
                    <td><?php echo $ticket['phone_number'] ?></td>
                    <td><?php echo $ticket['email'] ?></td>
                    <td><?php echo $ticket['DatumAangemaakt'] ?></td>
                    <td class="actions">
                        <a href="<?php echo URL . "/db/adminDelete.php?id=" . $ticket['id'] ?>&table=ticket&page=adminTickets"
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