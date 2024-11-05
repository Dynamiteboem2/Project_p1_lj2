<?php
include_once "conn.php";

// Testmodus instellen op basis van required_check (ontbreken betekent testmodus)
$isTestMode = !isset($_POST['required_check']);

// Verzamelt formuliergegevens en trimt witruimtes
$firstName = trim($_POST['first_name'] ?? '');
$lastName = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Controleer of alle velden leeg zijn
$allFieldsEmpty = empty($firstName) && empty($lastName) && empty($email) && empty($message);

if ($isTestMode || $allFieldsEmpty) {
    // Testmodus of lege velden: Simuleer succesvolle verzending zonder opslag in de database
    header("Location: ../pages/contact.php?message=Bedankt voor je bericht. We nemen spoedig contact met je op.");
    exit();
}

// Normale validatie en opslag als required_check aanwezig is en velden zijn ingevuld
$errors = [];

// Validatie logica hier (bijv. controleer of alle velden correct zijn ingevuld)
// Voeg validatiecode toe als dat nodig is

if (empty($errors)) {
    // Alleen opslaan als er geen validatiefouten zijn en het geen testmodus is
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
?>
