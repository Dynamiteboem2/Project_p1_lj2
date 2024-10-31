<?php
include_once "../../db/conn.php";
include_once "../../includes/header.php";
?>

<link rel="stylesheet" href="../../assets/css/adminForm.css">
<title>Sneakerness - Edit User</title>
</head>

<body>
    <?php include_once "../../includes/navbar.php" ?>

    <div class="admin-form">
        <div class="admin-form-box">
            <h2>Gegevens aanpassen</h2>

            <?php
            // Check if form was submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $firstName = $_POST['firstName'];
                $infixName = $_POST['infixName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $phoneNumber = $_POST['phoneNumber'];

                // Update query to save changes in the database
                $sql = "UPDATE stand SET firstName = ?, infixName = ?, lastName = ?, email = ?, phoneNumber = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $firstName, $infixName, $lastName, $email, $phoneNumber, $id);

                if ($stmt->execute()) {
                    // Redirect with a success message
                    header("Location: cart_overzicht.php?message=Gegevens%20succesvol%20aangepast");
                    exit();
                } else {
                    // Redirect with an error message
                    header("Location: editStands.php?id=$id&error=Fout%20bij%20het%20opslaan%20van%20gegevens");
                    exit();
                }
            }

            // Fetch stand details for the form
            $id = $_GET['id'];
            $sql = "SELECT * FROM stand WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stand = $result->fetch_assoc();
            ?>

            <form action="editStands.php?id=<?php echo $stand['id']; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $stand['id']; ?>">

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
                <?php } ?>

                <form action="editStands.php?id=<?php echo $stand['id']; ?>" method="post" onsubmit="return validateForm()">
    <input type="hidden" name="id" value="<?php echo $stand['id']; ?>">

    <!-- Voornaam -->
    <div class="input-box">
        <label for="firstName">Voornaam</label>
        <input type="text" id="firstName" name="firstName" placeholder="Voornaam:" required
            pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters"
            value="<?php echo htmlspecialchars($stand['firstName']); ?>">
        <div class="error-message" id="error-firstName" style="color: red; font-size: 14px; margin-top: 5px;"></div>
    </div>

    <!-- Tussenvoegsel -->
    <div class="input-box">
    <div class="error-message" id="error-infixName" style="color: red; font-size: 14px; margin-top: 5px;"></div>
        <label for="infixName">Tussenvoegsel</label>
        <input type="text" id="infixName" name="infixName" placeholder="Tussenvoegsel:"
            pattern="[a-zA-Z\u00C0-\u017F ]*" title="Gebruik alleen letters"
            value="<?php echo htmlspecialchars($stand['infixName']); ?>">
    </div>

    <!-- Achternaam -->
    <div class="input-box">
    <div class="error-message" id="error-lastName" style="color: red; font-size: 14px; margin-top: 5px;"></div>
        <label for="lastName">Achternaam</label>
        <input type="text" id="lastName" name="lastName" placeholder="Achternaam:" required
            pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters"
            value="<?php echo htmlspecialchars($stand['lastName']); ?>">
    </div>

    <!-- E-mail -->
    <div class="input-box">
    <div class="error-message" id="error-email" style="color: red; font-size: 14px; margin-top: 5px;"></div>
        <label for="email">E-mail adres</label>
        <input type="email" id="email" name="email" placeholder="E-mailadres:" required
            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Voer een geldig e-mailadres in (bijv. naam@example.com)"
            value="<?php echo htmlspecialchars($stand['email']); ?>">
    </div>

    <!-- Telefoonnummer -->
    <div class="input-box">
    <div class="error-message" id="error-phoneNumber" style="color: red; font-size: 14px; margin-top: 5px;"></div>
        <label for="phoneNumber">Telefoonnummer</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Telefoonnummer:" pattern="^\d{10}$"
            title="Vul een geldig telefoonnummer in (10 cijfers, zonder spaties of speciale tekens)" required
            value="<?php echo htmlspecialchars($stand['phoneNumber']); ?>">
    </div>

    <button type="submit">Sla wijzigingen op</button>
    <a href="cart_overzicht.php" class="back-button">Annuleren</a>
</form>
        </div>
    </div>

    <script src="../js/validation.js"></script>
    <?php include_once "../../includes/footer.php" ?>
</body>
</html>
