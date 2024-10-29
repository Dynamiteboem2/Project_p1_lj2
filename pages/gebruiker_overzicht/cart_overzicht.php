<?php
include_once "../../db/conn.php";
include_once "../../includes/header.php"; // Zorg ervoor dat je de header en navigatie laadt

// Set 20-minute expiry time in seconds
$expiryTime = 120 * 60;

?>

<link rel="stylesheet" href="../../assets/css/adminList.css">
<link rel="stylesheet" href="../../assets/css/inlog.css">
<title>Sneakerness - Cart Overzicht</title>
</head>

<body>
    <?php include_once "../../includes/navbar.php"; ?>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="profiel_overzicht.php" class="fas fa-user"></a></li>
                <li><a href="security_overzicht.php" class="fas fa-lock"></a></li>
                <li><a href="cart_overzicht.php" class="fas fa-shopping-cart"></a></li>
                <li><a href="" class="fas fa-trash"></a></li>
            </ul>
        </div>
        <div class="container_main">
            <div class="main">
                <div id="swup" class="transition-fade">
                    <h1>Jou Items</h1>
                    <h2>stands</h2>

                    <!-- Display messages -->
                    <?php if (isset($_GET['message'])) { ?>
                        <p class="message"><?php echo $_GET['message']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <!-- Table of purchases -->
                    <table>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Birthdate</th>
                            <th>Stand Id</th>
                            <th>Created Date</th>
                            <th>Time Remaining</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        $sql = "SELECT *, TIMESTAMPDIFF(SECOND, purchaseTimestamp, NOW()) AS timeElapsed FROM stand";
                        $result = $conn->query($sql);
                        $tickets = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($tickets as $ticket) {
                            // Bereken de resterende tijd
                            $timeLeft = max($expiryTime - $ticket['timeElapsed'], 0); // Max met 0 om negatieven te voorkomen
                        ?>
                        <tr>
                            <td><?php echo $ticket['firstName']; ?></td>
                            <td><?php echo $ticket['lastName']; ?></td>
                            <td><?php echo $ticket['email']; ?></td>
                            <td><?php echo $ticket['phoneNumber']; ?></td>
                            <td><?php echo $ticket['birthdate']; ?></td>
                            <td><?php echo $ticket['standId']; ?></td>
                            <td><?php echo $ticket['createdDate']; ?></td>
                            <td id="timer-<?php echo $ticket['id']; ?>" data-time-left="<?php echo $timeLeft; ?>"></td>
                            <td class="actions">
                                <a href="<?php echo URL . "/pages/gebruiker_overzicht/editStands.php?id=" . $ticket['id']; ?>" onclick='ConfirmAction(event, "edit")'>Edit</a>
                                <a href="<?php echo URL . "/db/UserDelete.php?id=" . $ticket['id'] ?>&table=stand&page=cart_overzicht" onclick='ConfirmAction(event, "delete")' id="delete-button-<?php echo $ticket['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
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

    <?php include_once "../../includes/footer.php"; ?>
    <script src="../../js/adminConfirm.js"></script>
    <script src="../../js/timer.js"></script>
</body>
</html>
