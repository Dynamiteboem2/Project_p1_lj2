<?php
include_once "../../db/conn.php";
include_once "../../includes/header.php"; // Zorg ervoor dat je de header en navigatie laadt

// Start de sessie om toegang te krijgen tot de sessievariabelen
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['id'])) {
    header("Location: ../../pages/login.php");
    exit();
}

// Haal de gebruikersgegevens op uit de database
$userId = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


if ($user['type'] != 'admin') {
    header('Location: ../../pages/gebruiker_overzicht/cart_overzicht.php');
    exit();
}

?>

<link rel="stylesheet" href="../../assets/css/inlog.css">
<link rel="stylesheet" href="../../assets/css/admin.css">
<title>Sneakerness - Profiel Overzicht</title>
<?php include_once "../../includes/navbar.php"; ?>
</head>

<body>
    <div class="user-box">
        <div class="container">
            <?php include_once "../../includes/profileSidebar.php"; ?>
            <div class="container_main">
                <div class="main">
                    <div id="swup" class="transition-fade">
                        <div class="admin">
                            <h1>Admin Panel</h1>
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
                        </div>
                    </div>
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
</body>

</html>