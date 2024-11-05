<?php
include_once("../db/conn.php");
session_start(); // Start sessie om de user ID op te halen

// Initialiseer variabelen
$event = $date = $ticketQuantity = $firstName = $lastName = $phone = $email = "";
$validationErrors = [];

// Haal user ID op uit sessie
// if (!isset($_SESSION['id'])) {
//     $_SESSION['errors'] = ['general' => 'User not logged in.'];
//     header("Location: ../pages/tickets.php");
//     exit();
// }
// if (!isset($_SESSION["id"])) {
// }
$userId = 0;

if (isset($_SESSION["id"])) {
    $userId = $_SESSION['id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valideer en haal gegevens uit het formulier
    $event = isset($_POST['event']) ? $_POST['event'] : ''; // Geen (int) conversie, omdat het een string is
    $date = isset($_POST['date']) ? $_POST['date'] : ''; // Date is now a string
    $ticketQuantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Valideer de gegevens
    if (empty($event)) {
        $validationErrors['event'] = "Het evenement is verplicht.";
    }
    if (empty($date)) {
        $validationErrors['date'] = "De datum is verplicht.";
    }
    if ($ticketQuantity <= 0) {
        $validationErrors['quantity'] = "De hoeveelheid tickets moet groter zijn dan 0.";
    } elseif ($ticketQuantity > 10) {
        $validationErrors['quantity'] = "De hoeveelheid tickets mag niet groter zijn dan 10.";
    }
    if (empty($firstName)) {
        $validationErrors['first_name'] = "De voornaam is verplicht.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $firstName)) {
        $validationErrors['first_name'] = "Ongeldige voornaam. Gebruik alleen letters.";
    }
    if (empty($lastName)) {
        $validationErrors['last_name'] = "De achternaam is verplicht.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $lastName)) {
        $validationErrors['last_name'] = "Ongeldige achternaam. Gebruik alleen letters.";
    }
    if (empty($phone)) {
        $validationErrors['phone'] = "Het telefoonnummer is verplicht.";
    } elseif (!preg_match("/^\d{10}$/", $phone)) {
        $validationErrors['phone'] = "Ongeldig telefoonnummer. Vul een geldig telefoonnummer in.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validationErrors['email'] = "Een geldig e-mailadres is verplicht.";
    }

    // Check if the user has bought more than 10 tickets for the specific event
    $stmt = $conn->prepare("SELECT SUM(ticket_quantity) as total_tickets FROM ticket WHERE user_id = ? AND event_id = ?");
    $stmt->bind_param("is", $userId, $event);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $totalTickets = $row['total_tickets'] ?? 0;

    if ($totalTickets + $ticketQuantity > 10) {
        $validationErrors['ticket_limit'] = "Je hebt het maximum aantal tickets van 10 voor dit evenement overschreden.";
    }

    // Als er validatiefouten zijn, sla ze op in de sessie en stuur de gebruiker terug naar het formulier
    if (!empty($validationErrors)) {
        $_SESSION['validationErrors'] = $validationErrors;
        header("Location: ../pages/Tickets.php");
        exit();
    }

    // Als er geen fouten zijn, sla de gegevens op in de database
    if (empty($validationErrors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO ticket (user_id, event_id, event_date, ticket_quantity, first_name, last_name, phone_number, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ississss", $userId, $event, $date, $ticketQuantity, $firstName, $lastName, $phone, $email);
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to tickets.php with success message
            header("Location: ../pages/tickets.php?message=success");
            exit();
        } else {
            $validationErrors['general'] = "Error: " . $stmt->error;
        }
        // Close the statement and connection
        $stmt->close();
    }

    // Store validation errors in session and redirect back to tickets.php
    $_SESSION['errors'] = $validationErrors;
    header("Location: ../pages/tickets.php");
    exit();
}
