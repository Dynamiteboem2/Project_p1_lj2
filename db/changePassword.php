<?php

include_once("conn.php");

session_start();

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];

    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword != $confirmPassword) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?password_error=Nieuw wachtwoord en bevestig wachtwoord komen niet overeen");
        exit();
    }

    $sql = "SELECT password FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!password_verify($currentPassword, $user['password'])) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?password_error=Huidig wachtwoord is onjuist");
        exit();
    }

    if (strlen($newPassword) < 5) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?password_error=Nieuw wachtwoord moet minimaal 5 tekens lang zijn");
        exit();
    }

    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newPassword, $id);

    if ($stmt->execute()) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?password_message=Wachtwoord succesvol bijgewerkt");
    } else {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?password_error=Er is iets misgegaan, probeer het opnieuw");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../pages/login.php");
    exit();
}