<?php
include_once "conn.php";

// Get stand ID and validate it
$standId = isset($_POST['standId']) ? intval($_POST['standId']) : 0;

if ($standId <= 0) {
    header("Location: ../standVerkoop.php?error=Ongeldige stand ID.");
    exit();
}

// Sanitize and retrieve other inputs
$first_name = isset($_POST['first-name']) ? trim($_POST['first-name']) : '';
$infix_name = isset($_POST['infix-name']) ? trim($_POST['infix-name']) : '';
$last_name = isset($_POST['last-name']) ? trim($_POST['last-name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']) : '';
$standDate = isset($_POST['stand-date']) ? trim($_POST['stand-date']) : '';

// Input Validations
$errors = [];
if (empty($first_name)) {
    $errors['first-name'] = "Vul een voornaam in.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $first_name)) {
    $errors['first-name'] = "Ongeldige voornaam. Gebruik alleen letters.";
}

if (!empty($infix_name) && !preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $infix_name)) {
    $errors['infix-name'] = "Ongeldig tussenvoegsel. Gebruik alleen letters.";
}

if (empty($last_name)) {
    $errors['last-name'] = "Vul een achternaam in.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+(?: [a-zA-ZÀ-ÿ]+)*$/", $last_name)) {
    $errors['last-name'] = "Ongeldige achternaam. Gebruik alleen letters.";
}

if (empty($email)) {
    $errors['email'] = "Vul een e-mailadres in.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Ongeldig e-mailadres. Voer een geldig e-mailadres in.";
}

// Controleer of het e-mailadres al gebruikt is voor een andere stand
$checkEmailSql = "SELECT COUNT(*) as email_count FROM stand WHERE email = ?";
$stmt = $conn->prepare($checkEmailSql);
$stmt->bind_param("s", $email);
$stmt->execute();
$emailResult = $stmt->get_result();
$emailRow = $emailResult->fetch_assoc();

if ($emailRow['email_count'] > 1) {
    $errors['email'] = "U kunt dit e-mail adres niet gebruiken. U heeft al 2 stands gekocht met dit e-mail adres.";
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

// Nieuwe check voor dubbele boeking met hetzelfde e-mailadres en standId
$checkStandBookingSql = "SELECT COUNT(*) as stand_count FROM stand WHERE email = ? AND standId = ?";
$stmt = $conn->prepare($checkStandBookingSql);
$stmt->bind_param("si", $email, $standId);
$stmt->execute();
$result = $stmt->get_result();
$standRow = $result->fetch_assoc();

// Als de stand al is geboekt met dit e-mailadres, voeg dan een foutmelding toe
if ($standRow['stand_count'] > 0) {
    $errors['duplicate-stand'] = "U kunt deze stand niet nogmaals boeken met dit e-mailadres.";
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit();
}

// Set the purchase timestamp
$purchaseTimestamp = date('Y-m-d H:i:s');

// Prepare and execute the SQL statement to insert the booking with purchase timestamp
$stmt = $conn->prepare("INSERT INTO stand (firstName, infixName, lastName, email, phoneNumber, birthdate, standId, standDate, purchaseTimestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssiss", $first_name, $infix_name, $last_name, $email, $phone, $birthdate, $standId, $standDate, $purchaseTimestamp);

if ($stmt->execute()) {
    // Combine infix and last name for display
    $displayName = trim($infix_name . ' ' . $last_name);

    echo json_encode([
        'success' => true, 
        'message' => 'Stand succesvol gehuurd!',
        'displayName' => $displayName
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Er is een fout opgetreden tijdens het proberen te huren van een stand.']);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
