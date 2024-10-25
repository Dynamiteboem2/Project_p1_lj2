<?php
include_once "../../db/conn.php";
?>

<?php include_once "../../includes/header.php" ?>
<link rel="stylesheet" href="../../assets/css/adminList.css"> <!-- Zorg ervoor dat je deze stylesheet ook hier gebruikt -->
<link rel="stylesheet" href="../../assets/css/inlog.css">
<title>Sneakerness - Cart Overzicht</title>
</head>

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
<div class=container_main>
        <div class="main">
            <div id="swup" class="transition-fade">
            <h1>Purchases</h1>
            <h2>(Side-)stands</h2>
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
                    <th>Phone Number</th>
                    <th>Birthdate</th>
                    <th>Stand Id</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                $sql = "SELECT * FROM stand";
                $result = $conn->query($sql);
                $tickets = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($tickets as $ticket) {
                ?>
                <tr>
                    <td><?php echo $ticket['firstName'] ?></td>
                    <td><?php echo $ticket['lastName'] ?></td>
                    <td><?php echo $ticket['email'] ?></td>
                    <td><?php echo $ticket['phoneNumber'] ?></td>
                    <td><?php echo $ticket['birthdate'] ?></td>
                    <td><?php echo $ticket['standId'] ?></td>
                    <td><?php echo $ticket['createdDate'] ?></td>
                    <td class="actions">
                        <a href="<?php echo URL . "/pages/gebruiker_overzicht/cart_overzicht.php?id=" . $ticket['id'] ?>"
                           onclick='ConfirmAction(event, "edit")'>Edit</a>
                           <a href="<?php echo URL . "/db/UserDelete.php?id=" . $ticket['id'] ?>&table=stand&page=cart_overzicht"
                      onclick='ConfirmAction(event, "delete")'>Delete</a>
                  </td>
                </tr>
                <?php
                }
                ?>
                </table>
                <h2>Tickets</h2>
            </div>
        </div>
    </div>
</div>

    <?php include_once "../../includes/footer.php" ?>
    <script src="../../js/adminConfirm.js"></script>
</body>
</html>
