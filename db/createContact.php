<?php
include_once "../db/conn.php"; // Zorg ervoor dat je verbinding maakt met de database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Krijg de invoer
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validatie
    $errors = [];

    // Voornaam validatie
    if (!preg_match("/^[a-zA-Z]+$/", $firstName)) {
        $errors[] = "Voornaam mag alleen letters bevatten.";
    }

    // Achternaam validatie
    if (!preg_match("/^[a-zA-Z]+$/", $lastName)) {
        $errors[] = "Achternaam mag alleen letters bevatten.";
    }

    // E-mail validatie
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Voer een geldig e-mailadres in.";
    }

    // Bericht validatie
    if (strlen($message) < 10) {
        $errors[] = "Bericht moet minimaal 10 tekens bevatten.";
    }

    // Als er geen fouten zijn, sla de gegevens op
    if (empty($errors)) {
        // Voorbereid statement om SQL-injectie te voorkomen
        $stmt = $conn->prepare("INSERT INTO contacts (first_name, last_name, email, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

        if ($stmt->execute()) {
            // Succesbericht
            header("Location: ../pages/contact.php?message=Bericht succesvol verzonden.");
            exit();
        } else {
            echo "Er is een fout opgetreden bij het verzenden van uw bericht.";
        }
        $stmt->close();
    } else {
        // Fouten doorgeven aan de gebruiker
        $errorMessage = implode(", ", $errors);
        header("Location: ../pages/contact.php?message=$errorMessage");
        exit();
    }
}

$conn->close();
?>
