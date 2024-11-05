<?php

include_once "conn.php";

// Controleren of het formulier in "testmodus" is (zonder required_check) of niet
$isTestMode = !isset($_POST['required_check']);

// Verzamelt formuliergegevens en trimt witruimtes
$firstName = trim($_POST['first_name'] ?? '');
$lastName = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($isTestMode && empty($firstName) && empty($lastName) && empty($email) && empty($message)) {
    // Testmodus: Simuleer succesvolle verzending zonder opslag in de database
    header("Location: ../pages/contact.php?message=Bedankt voor je bericht. We nemen spoedig contact met je op.");
    exit();
}

// Normale validatie als required_check aanwezig is of velden zijn ingevuld
$errors = [];

if (!$isTestMode) {
    // Voornaam validatie
    if (empty($firstName)) {
        $errors[] = "Voornaam is verplicht.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $firstName)) {
        $errors[] = "Voornaam mag alleen letters bevatten.";
    }

    // Achternaam validatie
    if (empty($lastName)) {
        $errors[] = "Achternaam is verplicht.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $lastName)) {
        $errors[] = "Achternaam mag alleen letters bevatten.";
    }

    // E-mailadres validatie
    if (empty($email)) {
        $errors[] = "E-mailadres is verplicht.";
    } elseif (!preg_match("/^[^\d][a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors[] = "Geef een geldig e-mailadres op.";
    }

    // Bericht validatie
    if (empty($message)) {
        $errors[] = "Bericht is verplicht.";
    } else {
        $lettersOnly = preg_replace("/[^a-zA-Z ]/", '', $message);
        if (strlen($lettersOnly) < 10) {
            $errors[] = "Bericht moet minimaal 10 letters bevatten.";
        } elseif (strlen($lettersOnly) !== strlen($message)) {
            $errors[] = "Bericht mag geen cijfers of andere leestekens bevatten.";
        }
    }
}

// Verwerk het formulier alleen als er geen fouten zijn en als het niet in testmodus is
if (empty($errors) && !$isTestMode) {
    $query = "INSERT INTO contact (firstName, lastName, email, message, createdDate) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

        if ($stmt->execute()) {
            header("Location: ../pages/contact.php?message=Bedankt voor je bericht. We nemen spoedig contact met je op.");
            exit();
        } else {
            echo "<p style='color:red;'>Er is iets fout gegaan bij het uitvoeren van de query: " . htmlspecialchars($stmt->error) . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color:red;'>Er is iets fout gegaan bij het voorbereiden van de query: " . htmlspecialchars($conn->error) . "</p>";
    }
} elseif ($isTestMode) {
    // Testmodus: Simuleer succesvolle verzending zonder opslag
    header("Location: ../pages/contact.php?message=Bedankt voor je bericht. We nemen spoedig contact met je op.");
    exit();
} else {
    // Toon foutmeldingen als er fouten zijn
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
