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

// Count letters ignoring everything but letters
$lettersOnly = preg_replace("/[^a-zA-Z]/", "", $message); // Remove anything that's not a letter
$letterCount = strlen($lettersOnly); // Count only the letters

// Check if the message has at least 10 letters and ensure no non-letter characters are present
if ($letterCount < 10 || $letterCount !== strlen($message)) {
    $errors[] = "Bericht moet minimaal 10 letters bevatten en mag geen cijfers of leestekens bevatten.";
}

// Check if there are any errors
if (empty($errors)) {
    $query = "INSERT INTO contact (firstName, lastName, email, message, createdDate) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

    if ($stmt->execute()) {
        header("Location: ../pages/contact.php?message=Bedankt voor je bericht. We nemen spoedig contact met je op.");
        exit();
    } else {
        echo "Er is iets fout gegaan: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Handle errors (e.g., display them to the user)
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}

$conn->close();
?>
