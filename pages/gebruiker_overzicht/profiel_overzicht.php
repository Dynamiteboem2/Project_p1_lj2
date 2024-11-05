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

?>

<link rel="stylesheet" href="../../assets/css/inlog.css">
<title>Sneakerness - Profiel Overzicht</title>
<?php include_once "../../includes/navbar.php"; ?>
</head>

<body>
    <div class="user-box">
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
                        <h1>Profiel Overzicht</h1>
                        <h2>Inloggegevens</h2>
                        <table>
                            <tr>
                                <th>Gebruikersnaam</th>
                                <td><?php echo htmlspecialchars($user['firstName']); ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th>Geboortedatum</th>
                                <td><?php echo htmlspecialchars($user['birthdate']); ?></td>
                            </tr>
                        </table>
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