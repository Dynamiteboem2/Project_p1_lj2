<?php
include_once "../../db/conn.php";
include_once "../../includes/header.php"; // Ensure header and navigation are loaded

// Set 20-minute expiry time in seconds
$expiryTime = 120 * 60;

?>

<link rel="stylesheet" href="../../assets/css/adminList.css">
<link rel="stylesheet" href="../../assets/css/inlog.css">
<title>Sneakerness - Cart Overzicht</title>
</head>
<style>
    .success {
    color: green;
    font-weight: bold;
}
    </style>
<body>
    <?php include_once "../../includes/navbar.php"; ?>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="profiel_overzicht.php" class="fas fa-user"></a></li>
                <li><a href="cart_overzicht.php" class="fas fa-shopping-cart"></a></li>
            </ul>
        </div>
        <div class="container_main">
            <div class="main">
                <div id="swup" class="transition-fade">
                    <h1>Uw artikelen</h1>
                   <h6> Mocht u vragen hebben over uw stand of ticket, mail dan naar <span>tychovandijk@gmail.com.</span></h6>
                    <h2>Stands</h2>

                    <!-- Display messages -->
                    <?php if (isset($_GET['message'])) { ?>
                        <p class="message"><?php echo $_GET['message']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <!-- Table of purchases -->
                    <table>
                        <tr>
                            <th>Acties</th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Telefoonnummer</th>
                            <th>Geboortedatum</th>
                            <th>Standdatum</th>
                            <th>StandNaam</th>
                            <th>Prijs</th>
                            <th>Tijd om te verwijderen</th>  
                        </tr>
                        <?php
                        // Update SQL query to select infixName separately
                        $sql = "SELECT *, TIMESTAMPDIFF(SECOND, purchaseTimestamp, NOW()) AS timeElapsed FROM stand";
                        $result = $conn->query($sql);
                        $tickets = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($tickets as $ticket) {
                            // Calculate remaining time
                            $timeLeft = max($expiryTime - $ticket['timeElapsed'], 0); // Max with 0 to prevent negatives

                            // Combine infixName and lastName for display
                            $fullLastName = trim($ticket['infixName'] . ' ' . $ticket['lastName']);
                        ?>
                        <tr>
                            <td class="actions">
                                <a href="<?php echo URL . "/pages/gebruiker_overzicht/editStands.php?id=" . $ticket['id']; ?>" onclick='ConfirmAction(event, "edit")' id="edit-button-<?php echo $ticket['id']; ?>">Wijzigen</a>
                                <a href="<?php echo URL . "/db/UserDelete.php?id=" . $ticket['id'] ?>&table=stand&page=cart_overzicht" onclick='ConfirmAction(event, "delete")' id="delete-button-<?php echo $ticket['id']; ?>">Annuleren</a>
                            </td>
                            <td><?php echo $ticket['firstName']; ?></td>
                            <td><?php echo $fullLastName; ?></td> <!-- Display infixName + lastName -->
                            <td><?php echo $ticket['email']; ?></td>
                            <td><?php echo $ticket['phoneNumber']; ?></td>
                            <td><?php echo $ticket['birthdate']; ?></td>
                            <td><?php echo $ticket['standDate']; ?></td>
                            <td><?php echo $ticket['standName']; ?></td>
                            <td>€<?php echo $ticket['price']; ?></td>
                            <td id="timer-<?php echo $ticket['id']; ?>" data-time-left="<?php echo $timeLeft; ?>"></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <h2>Tickets</h2>
                <table>
                    <tr>
                        <th>Acties</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Email</th>
                        <th>Telefoonnummer</th>
                        <th>Event</th>
                        <th>Evenement datum</th>
                        <th>Ticket Aantal</th>
                        <th>Tijd om te verwijderen</th>  
                    </tr>
                    <?php
                    // Use 'DatumAangemaakt' as the column name for the creation date
                    $sql = "SELECT id, first_name, last_name, phone_number, email, event_id, event_date, ticket_quantity, TIMESTAMPDIFF(SECOND, DatumAangemaakt, NOW()) AS timeElapsed FROM ticket";
                    $result = $conn->query($sql);
                    $tickets = $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($tickets as $ticket) {
                        // Calculate remaining time
                        $timeLeft = max($expiryTime - $ticket['timeElapsed'], 0); // Max with 0 to prevent negatives
                        // Combine first_name and last_name for display
                        $fullLastName = trim($ticket['last_name']);
                    ?>
                    <tr>
                        <td class="actions">
                            <a href="<?php echo URL . "/pages/gebruiker_overzicht/editTickets.php?id=" . $ticket['id']; ?>" onclick='ConfirmAction(event, "edit")' id="edit-button-<?php echo $ticket['id']; ?>">Wijzigen</a>
                            <a href="<?php echo URL . "/db/UserDelete.php?id=" . $ticket['id'] ?>&table=ticket&page=cart_overzicht" onclick='ConfirmAction(event, "delete")' id="delete-button-<?php echo $ticket['id']; ?>">Annuleren</a>
                        </td>
                        <td><?php echo htmlspecialchars($ticket['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($fullLastName); ?></td>
                        <td><?php echo htmlspecialchars($ticket['email']); ?></td>
                        <td><?php echo htmlspecialchars($ticket['phone_number']); ?></td>
                        <td><?php echo htmlspecialchars($ticket['event_id']); ?></td>
                        <td><?php echo htmlspecialchars($ticket['event_date']); ?></td>
                        <td><?php echo htmlspecialchars($ticket['ticket_quantity']); ?></td>
                        <td id="timer-<?php echo $ticket['id']; ?>" data-time-left="<?php echo $timeLeft; ?>"></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/swup@4"></script>
    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            const swupElement = document.getElementById('swup');
            if (swupElement) {
                swupElement.classList.add('is-visible');
            }
        });
    </script>

<style>
    .transition-fade {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .transition-fade.is-visible {
        opacity: 1;
    }
</style>
    <script src="../../js/adminConfirm.js"></script>
    <script src="../../js/timer.js"></script>
</body>
</html>