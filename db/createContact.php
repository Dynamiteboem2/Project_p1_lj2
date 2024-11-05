<?php
include_once "conn.php";

// Verzamelt formuliergegevens en trimt witruimtes
$firstName = trim($_POST['first_name'] ?? '');
$lastName = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

// Voornaam validatie
if (empty($firstName)) {
    $errors[] = "Voornaam is verplicht.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ ]+$/", $firstName)) {  // Gebruik een Unicode-reeks zonder \u
    $errors[] = "Voornaam mag alleen letters bevatten.";
}

// Achternaam validatie
if (empty($lastName)) {
    $errors[] = "Achternaam is verplicht.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ ]+$/", $lastName)) {  // Gebruik een Unicode-reeks zonder \u
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
    // Alleen letters tellen voor de lengte
    $lettersOnly = preg_replace("/[^a-zA-Z]/", '', $message); // Alleen letters behouden

    // Check of er voldoende letters zijn
    if (strlen($lettersOnly) < 10) {
        $errors[] = "Bericht moet minimaal 10 letters bevatten.";
    }

    // Controleer op cijfers
    if (preg_match("/\d/", $message)) {
        $errors[] = "Bericht mag geen cijfers bevatten.";
    }

    // Controleer op ongewenste leestekens
    if (preg_match("/[^a-zA-Z.!?,;: ]/", $message)) {
        $errors[] = "Bericht mag alleen letters en de volgende leestekens bevatten: .!?;:";
    }
}

// Verwerk het formulier alleen als er geen fouten zijn
if (empty($errors)) {
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
} else {
    // Toon foutmeldingen als er fouten zijn
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
