<?php

include_once("conn.php");

session_start();

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $first_name = $_POST['firstName'];
    $infixName = $_POST['infixName'];
    $last_name = $_POST['lastName'];

    if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name) || !preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?profile_error=Voornaam en achternaam mogen alleen letters en spaties bevatten");
        exit();
    }

    if (empty($first_name) || empty($last_name)) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?profile_error=Voornaam en achternaam zijn verplicht");
        exit();
    }

    if (strlen($first_name) > 100 || strlen($last_name) > 100 || strlen($infixName) > 100) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?profile_error=Voornaam, tussenvoegsel en achternaam mogen niet langer zijn dan 255 tekens");
        exit();
    }

    $sql = "UPDATE user SET firstName = ?, infixName = ?, lastName = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $first_name, $infixName, $last_name, $id);

    if ($stmt->execute()) {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?profile_message=Profiel succesvol bijgewerkt");
    } else {
        header("Location: ../pages/gebruiker_overzicht/profiel_overzicht.php?profile_error=Er is iets misgegaan, probeer het opnieuw");
    }
    $stmt->close();
    $conn->close();
} else {
    header("Location: ../pages/login.php");
    exit();
}