<?php
include_once "conn.php";

$errors = [];

// First Name Validation
$firstName = trim($_POST['first_name']);
if (!preg_match("/^[a-zA-Z]+$/", $firstName)) {
    $errors[] = "Voornaam mag alleen letters bevatten.";
}

// Last Name Validation
$lastName = trim($_POST['last_name']);
if (!preg_match("/^[a-zA-Z]+$/", $lastName)) {
    $errors[] = "Achternaam mag alleen letters bevatten.";
}

// Email Validation
$email = trim($_POST['email']);
if (!preg_match("/^[^\d][a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
    $errors[] = "Geef een geldig e-mailadres op.";
}

// Message Validation
$message = trim($_POST['message']);
// Verwijder niet-lettertekens behalve spaties
$lettersOnly = preg_replace("/[^a-zA-Z ]/", '', $message);
if (strlen($lettersOnly) < 10) {
    $errors[] = "Bericht moet minimaal 10 letters bevatten.";
} else if (strlen($lettersOnly) !== strlen($message)) {
    $errors[] = "Bericht mag geen cijfers of andere leestekens bevatten.";
}

if (empty($errors)) {
    $query = "INSERT INTO contact (firstName, lastName, email, message, createdDate) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    
    if ($stmt) { // Controleer of de query succesvol is voorbereid
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

        if ($stmt->execute()) {
            header("Location: ../pages/contact.php?message=Bedankt voor je bericht. We nemen spoedig contact met je op.");
            exit();
        } else {
            echo "Er is iets fout gegaan bij het uitvoeren van de query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Er is iets fout gegaan bij het voorbereiden van de query: " . $conn->error;
    }
} else {
    // Fouten weergeven
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}

// Sluit de databaseverbinding
$conn->close();
?>
