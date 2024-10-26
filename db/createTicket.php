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
    $event = isset($_POST['event-select']) ? (int)$_POST['event-select'] : 0; // Dit geeft nu het ID
    $date = isset($_POST['date-select']) ? $_POST['date-select'] : '';
    $ticketQuantity = isset($_POST['ticket-quantity']) ? (int)$_POST['ticket-quantity'] : 0;
    $firstName = isset($_POST['first-name']) ? htmlspecialchars(trim($_POST['first-name'])) : '';
    $lastName = isset($_POST['last-name']) ? htmlspecialchars(trim($_POST['last-name'])) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';

    // Validaties
    if ($event <= 0) {
        die('Invalid event selected.'); // Deze foutmelding zal nu niet meer verschijnen bij correcte input
    }

    if (empty($date)) {
        die('Please select a valid date.');
    }

    if ($ticketQuantity <= 0) {
        die('Invalid ticket quantity.');
    }

    if (empty($firstName) || empty($lastName)) {
        die('Please fill in your first and last name.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email address.');
    }

    // Valideer het telefoonnummer (optioneel)
    $phonePattern = '/^(\+31\s6\d{8}|(\+\d{1,3}\s?\d{1,14}))$/';
    if (!preg_match($phonePattern, $phone)) {
        die('Invalid phone number format.');
    }

    // Bereid de SQL-query voor
    $stmt = $conn->prepare("INSERT INTO ticket (user_id, event_id, event_date, ticket_quantity, first_name, last_name, phone_number, email) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Controleer of de prepared statement correct is aangemaakt
    if ($stmt === false) {
        die('Error preparing the SQL statement: ' . $conn->error);
    }

    // Bind de parameters en voer uit
    $stmt->bind_param("iisiisss", $userId, $event, $date, $ticketQuantity, $firstName, $lastName, $phone, $email);

    if ($stmt->execute()) {
        // Redirect na succesvol aanmaken van ticket
        header("Location: ../pages/tickets.php?message=Ticket successfully created!");
        exit();
    } else {
        // Redirect bij een fout
        header("Location: ../pages/tickets.php?error=Error creating ticket: " . $stmt->error);
        exit();
    }

    // Sluit de statement
    $stmt->close();
}

// Sluit de databaseverbinding
$conn->close();
