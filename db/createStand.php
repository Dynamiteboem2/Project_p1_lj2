<?php
include_once("conn.php");

// Retrieve and sanitize input data
$first_name = isset($_POST['first-name']) ? trim($_POST['first-name']) : '';
$infix_name = isset($_POST['infix-name']) ? trim($_POST['infix-name']) : '';
$last_name = isset($_POST['last-name']) ? trim($_POST['last-name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']) : '';
$standDate = isset($_POST['stand-date']) ? trim($_POST['stand-date']) : '';

$errors = [];

// Validations
if (empty($first_name)) {
    $errors['first-name'] = "Vul een voornaam in.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ ]+$/", $first_name)) {
    $errors['first-name'] = "Ongeldige voornaam. Gebruik alleen letters.";
}

if (!empty($infix_name) && !preg_match("/^[a-zA-ZÀ-ÿ]*$/", $infix_name)) {
    $errors['infix-name'] = "Ongeldig tussenvoegsel. Gebruik alleen letters.";
}

if (empty($last_name)) {
    $errors['last-name'] = "Vul een achternaam in.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ ]+$/", $last_name)) {
    $errors['last-name'] = "Ongeldige achternaam. Gebruik alleen letters.";
}

if (empty($email)) {
    $errors['email'] = "Vul een e-mailadres in."; 
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Ongeldig e-mailadres. Voer een geldig e-mailadres in."; 
}

if (empty($phone)) {
    $errors['phone'] = "Vul een telefoonnummer in."; 
} elseif (!preg_match("/^\d{10}$/", $phone)) {
    $errors['phone'] = "Ongeldig telefoonnummer. Vul een geldig telefoonnummer in."; 
}

if (empty($birthdate)) {
    $errors['birthdate'] = "Voer een geboortedatum in."; 
} elseif (strtotime($birthdate) < strtotime('1900-01-01')) {
    $errors['birthdate'] = "Vul een geboortedatum in vanaf 1 januari 1900."; 
} elseif (date('Y') - date('Y', strtotime($birthdate)) < 18) {
    $errors['birthdate'] = "U moet minimaal 18 jaar zijn.";
}

if (empty($standDate)) {
    $errors['stand-date'] = "Standdatum is verplicht. Vul een geldige standdatum in."; 
}

// If there are errors, respond with error messages
if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Combine name parts if infix name exists
if (!empty($infix_name)) {
    $last_name = $infix_name . " " . $last_name;
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO stand (firstName, lastName, email, phoneNumber, birthdate, standDate) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $birthdate, $standDate);

if ($stmt->execute()) {
    // Respond with success message
    echo json_encode(['success' => true, 'message' => 'Stand succesvol gehuurd!']);
} else {
    // Respond with error message
    echo json_encode(['success' => false, 'error' => 'Er is een fout opgetreden tijdens het proberen te huren van een stand.']);
}

$stmt->close();
$conn->close();
?>
