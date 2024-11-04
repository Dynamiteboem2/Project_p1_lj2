<?php
include_once "../../db/conn.php";
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['id'])) {
    header("Location: ../../pages/login.php");
    exit();
}


$userId = $_SESSION['id'];
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthdate = $_POST['birthdate'];

$birthdateTimestamp = strtotime($birthdate);
$age = (time() - $birthdateTimestamp) / (60 * 60 * 24 * 365.25);
if ($age < 18) {
    header("Location: profiel_overzicht.php?error=Je moet ouder dan 18 jaar zijn");
    exit();
}

$sql = "UPDATE user SET firstName = ?, email = ?, phone = ?, birthdate = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $firstName, $email, $phone, $birthdate, $userId);

if ($stmt->execute()) {
    header("Location: profiel_overzicht.php?message=Profiel succesvol bijgewerkt");
} else {
    header("Location: profiel_overzicht.php?error=Er is iets misgegaan, probeer het opnieuw");
}
$stmt->close();
$conn->close();
?>