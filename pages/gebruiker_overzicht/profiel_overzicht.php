<?php
include_once "../../db/conn.php";
include_once "../../includes/header.php";

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
            <?php include_once "../../includes/profileSidebar.php"; ?>
            <div class="container_main">
                <div class="main">
                    <div id="swup" class="transition-fade">
                        <h1>Profiel Overzicht</h1>

                        <div class="info-box">
                            <h2>Inloggegevens</h2>
                            <?php if (isset($_GET['profile_message'])) : ?>
                            <div class="message">
                                <?php echo $_GET['profile_message']; ?>
                            </div>
                            <?php endif; ?>

                            <?php if (isset($_GET['profile_error'])) { ?>
                            <div class="error">
                                <?php echo $_GET['profile_error']; ?>
                            </div>
                            <?php } else { ?>
                            <div id="error-placeholder" style="width: 100%;"></div>
                            <?php } ?>

                            <form action="../../db/changeProfile.php" method="post" id="changeProfileForm">
                                <table>
                                    <tr>
                                        <th>Voornaam</th>
                                        <td><input name="firstName" id="firstName" type="text"
                                                value="<?php echo htmlspecialchars($user['firstName']); ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Tussenvoegsel</th>
                                        <td><input name="infixName" id="infixName" type="text"
                                                value="<?php echo htmlspecialchars($user['infixName']); ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Achternaam</th>
                                        <td><input name="lastName" id="lastName" type="text"
                                                value="<?php echo htmlspecialchars($user['lastName']); ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <input type="text" value="<?php echo htmlspecialchars($user['email']); ?>"
                                                disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Geboortedatum</th>
                                        <td>
                                            <input type="text"
                                                value="<?php echo htmlspecialchars($user['birthdate']); ?>" disabled>
                                        </td>
                                    </tr>
                                </table>

                                <button type="submit" class="btn" id="changeProfileButton">Opslaan</button>
                            </form>
                        </div>

                        <div class="info-box">
                            <h2>Wachtwoord wijzigen</h2>
                            <?php if (isset($_GET['password_message'])) : ?>
                            <div class="message">
                                <?php echo $_GET['password_message']; ?>
                            </div>
                            <?php endif; ?>

                            <?php if (isset($_GET['password_error'])) { ?>
                            <div class="error">
                                <?php echo $_GET['password_error']; ?>
                            </div>
                            <?php } else { ?>
                            <div id="error-placeholder-password" style="width: 100%;"></div>
                            <?php } ?>
                            <form action="../../db/changePassword.php" method="post" id="changePasswordForm">
                                <table>
                                    <tr>
                                        <th>Huidig wachtwoord</th>
                                        <td><input type="password" id="currentPassword" name="currentPassword"></td>
                                    </tr>

                                    <tr>
                                        <th>Nieuw wachtwoord</th>
                                        <td><input type="password" id="newPassword" name="newPassword"></td>
                                    </tr>

                                    <tr>
                                        <th>Herhaal nieuw wachtwoord</th>
                                        <td><input type="password" id="confirmPassword" name="confirmPassword">
                                        </td>
                                    </tr>
                                </table>

                                <button type="submit" class="btn" id="changePasswordButton">
                                    Wijzigen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../js/changeProfile.js"></script>
    <script src="../../js/changePassword.js"></script>
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