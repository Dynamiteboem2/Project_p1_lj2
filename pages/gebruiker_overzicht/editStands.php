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
            // Initialiseren van foutmeldingen
            $errors = [];

            // Check if form was submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $firstName = $_POST['firstName'];
                $infixName = $_POST['infixName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $phoneNumber = $_POST['phoneNumber'];

                // Server-side validatie
                if (empty($firstName)) {
                    $errors['first-name'] = "Vul een voornaam in.";
                } elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $firstName)) {
                    $errors['first-name'] = "Ongeldige voornaam. Gebruik alleen letters.";
                }

                if (!empty($infixName) && !preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $infixName)) {
                    $errors['infix-name'] = "Ongeldig tussenvoegsel. Gebruik alleen letters.";
                }

                if (empty($lastName)) {
                    $errors['last-name'] = "Vul een achternaam in.";
                } elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $lastName)) {
                    $errors['last-name'] = "Ongeldige achternaam. Gebruik alleen letters.";
                }

                if (empty($email)) {
                    $errors['email'] = "Vul een e-mailadres in.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Ongeldig e-mailadres. Voer een geldig e-mailadres in.";
                }

                if (empty($phoneNumber)) {
                    $errors['phone'] = "Vul een telefoonnummer in.";
                } elseif (!preg_match("/^\d{10}$/", $phoneNumber)) {
                    $errors['phone'] = "Ongeldig telefoonnummer. Vul een geldig telefoonnummer in.";
                }

                // Als er geen fouten zijn, voer de update uit
                if (empty($errors)) {
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
                        $errors[] = "Fout bij het opslaan van gegevens.";
                    }
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

                <!-- Voornaam -->
                <div class="input-box">
                    <?php if (isset($errors['first-name'])) { ?>
                        <div class="error" style="color: red;"><?php echo htmlspecialchars($errors['first-name']); ?></div>
                    <?php } ?>
                    <label for="firstName">Voornaam:</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Voornaam:" required
                        pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters"
                        value="<?php echo htmlspecialchars($firstName ?? $stand['firstName'] ?? ''); ?>">
                </div>

                <!-- Tussenvoegsel -->
                <div class="input-box">
                    <?php if (isset($errors['infix-name'])) { ?>
                        <div class="error" style="color: red;"><?php echo htmlspecialchars($errors['infix-name']); ?></div>
                    <?php } ?>
                    <label for="infixName">Tussenvoegsel:</label>
                    <input type="text" id="infixName" name="infixName" placeholder="Tussenvoegsel:"
                        pattern="[a-zA-Z\u00C0-\u017F ]*" title="Gebruik alleen letters"
                        value="<?php echo htmlspecialchars($infixName ?? $stand['infixName'] ?? ''); ?>">
                </div>

                <!-- Achternaam -->
                <div class="input-box">
                    <?php if (isset($errors['last-name'])) { ?>
                        <div class="error" style="color: red;"><?php echo htmlspecialchars($errors['last-name']); ?></div>
                    <?php } ?>
                    <label for="lastName">Achternaam:</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Achternaam:" required
                        pattern="[a-zA-Z\u00C0-\u017F ]+" title="Gebruik alleen letters"
                        value="<?php echo htmlspecialchars($lastName ?? $stand['lastName'] ?? ''); ?>">
                </div>

                <!-- E-mail -->
                <div class="input-box">
                    <?php if (isset($errors['email'])) { ?>
                        <div class="error" style="color: red;"><?php echo htmlspecialchars($errors['email']); ?></div>
                    <?php } ?>
                    <label for="email">E-mail adres:</label>
                    <input type="email" id="email" name="email" placeholder="E-mailadres:" required
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Voer een geldig e-mailadres in (bijv. naam@example.com)"
                        value="<?php echo htmlspecialchars($email ?? $stand['email'] ?? ''); ?>">
                </div>

                <!-- Telefoonnummer -->
                <div class="input-box">
                    <?php if (isset($errors['phone'])) { ?>
                        <div class="error" style="color: red;"><?php echo htmlspecialchars($errors['phone']); ?></div>
                    <?php } ?>
                    <label for="phoneNumber">Telefoonnummer:</label>
                    <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Telefoonnummer:" pattern="^\d{10}$"
                        title="Vul een geldig telefoonnummer in (10 cijfers, zonder spaties of speciale tekens)" required
                        value="<?php echo htmlspecialchars($phoneNumber ?? $stand['phoneNumber'] ?? ''); ?>">
                </div>

                <button type="submit">Sla wijzigingen op</button>
                <a href="cart_overzicht.php" class="back-button">Annuleren</a>
            </form>

        </div>
    </div>

    <script src="../js/validation.js"></script>
</body>
</html>
