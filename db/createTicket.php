<?php
include_once("conn.php");
session_start(); // Start sessie om de user ID op te halen

// Initialiseer variabelen
$event = $date = $ticketQuantity = $firstName = $lastName = $phone = $email = ""; 

// Haal user ID op uit sessie
if (!isset($_SESSION['id'])) {
    die("User not logged in.");
}
$userId = $_SESSION['id'];

$debugMode = true; // Set to false in production

if ($debugMode) {
    echo "<script>
        const userId = " . json_encode($userId) . ";
        console.log('User logged in with ID: ', userId);
    </script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valideer en haal gegevens uit het formulier
    $event = isset($_POST['event']) ? $_POST['event'] : ''; // Geen (int) conversie, omdat het een string is
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $ticketQuantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    $firstName = isset($_POST['first_name']) ? htmlspecialchars(trim($_POST['first_name'])) : '';
    $lastName = isset($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';

    // Validaties
    $errors = [];

    if (empty($event)) {
        $errors['event'] = "Het evenement is verplicht.";
    }
    if (empty($date)) {
        $errors['date'] = "De datum is verplicht.";
    }
    if (empty($ticketQuantity) || $ticketQuantity <= 0) {
        $errors['quantity'] = "Het aantal tickets moet groter zijn dan 0.";
    }
    if (empty($firstName)) {
        $errors['first_name'] = "De voornaam is verplicht.";
    }
    if (empty($lastName)) {
        $errors['last_name'] = "De achternaam is verplicht.";
    }
    if (empty($phone)) {
        $errors['phone'] = "Het telefoonnummer is verplicht.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Een geldig e-mailadres is verplicht.";
    }

    // Als er geen fouten zijn, sla de gegevens op in de database
    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO ticket (id, event_id, event_date, ticket_quantity, first_name, last_name, phone_number, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ississss", $userId, $event, $date, $ticketQuantity, $firstName, $lastName, $phone, $email);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to tickets.php with success message
            header("Location: ../pages/tickets.php?message=success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Toon fouten
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>