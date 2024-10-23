<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Check first name (only letters allowed)
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = "Vul uw voornaam in.";
    } elseif (!preg_match('/^[a-zA-Z]+$/', $_POST['first_name'])) {
        $errors['first_name'] = "Voornaam mag alleen letters bevatten.";
    }

    // Check last name (only letters allowed)
    if (empty($_POST['last_name'])) {
        $errors['last_name'] = "Vul uw achternaam in.";
    } elseif (!preg_match('/^[a-zA-Z]+$/', $_POST['last_name'])) {
        $errors['last_name'] = "Achternaam mag alleen letters bevatten.";
    }

    // Validate email
if (empty($_POST['email'])) {
    $errors['email'] = "Vul een e-mailadres in.";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Vul een geldig e-mailadres in.";
} elseif (preg_match('/[^a-zA-Z0-9@._%+-]/', $_POST['email'])) {
    // Check for any invalid characters
    $errors['email'] = "E-mailadres mag alleen letters, cijfers, en de symbolen @, ., _, +, % en - bevatten.";
}

    // Validate message
    if (empty($_POST['message'])) {
        $errors['message'] = "Vul uw bericht in.";
    } elseif (strlen(trim($_POST['message'])) < 10) {
        $errors['message'] = "Uw bericht moet minimaal 10 tekens bevatten.";
    }

    // Check if there are any errors
    if (empty($errors)) {
        // Sanitize user input
        $firstName = htmlspecialchars(trim($_POST['first_name']));
        $lastName = htmlspecialchars(trim($_POST['last_name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        // SQL statement to insert data into the database
        $sql = "INSERT INTO contacts (firstName, lastName, email, message, createdDate)
                VALUES (:firstName, :lastName, :email, :message, NOW())";
        $stmt = $pdo->prepare($sql);

        // Try executing the statement
        try {
            $stmt->execute([
                ':firstName' => $firstName,
                ':lastName' => $lastName,
                ':email' => $email,
                ':message' => $message
            ]);

            // Redirect or display success message
            header("Location: contact.php?message=success");
            exit();
        } catch (Exception $e) {
            // Log error details
            error_log("SQL Error: " . $e->getMessage());
            $errors['database'] = "Er is een probleem met het verzenden van uw bericht. Probeer het later opnieuw.";
        }
    }

    // Return to the form with error messages
    header("Location: contact.php?message=" . urlencode(json_encode($errors)));
    exit();
}

?>