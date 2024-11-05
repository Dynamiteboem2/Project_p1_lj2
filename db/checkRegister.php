<?php

include_once("conn.php");

$first_name = $_POST['first_name'];
$infix_name = $_POST['infix_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$birth_date = $_POST['birthdate'];

if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) || empty($birth_date)) {
    header("Location: ../pages/register.php?error=Vul alle verplichte velden in");
    exit();
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../pages/register.php?error=Ongeldig emailadres");
    exit();
}

if (strlen($password) < 5) {
    header("Location: ../pages/register.php?error=Wachtwoord moet minimaal 5 tekens lang zijn");
    exit();
}

if ($password !== $confirm_password) {
    header("Location: ../pages/register.php?error=Wachtwoorden komen niet overeen");
    exit();
}

$birthdateDateTime = new DateTime($birth_date);
$today = new DateTime();

$age = $today->diff($birthdateDateTime)->y;

if ($age < 13) {
    header("Location: ../pages/register.php?error=Je moet minimaal 13 jaar oud zijn om een account aan te maken");
    exit();
}

if ($age > 100) {
    header("Location: ../pages/register.php?error=Vul alstublieft een geldige geboortedatum in.");
}

$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../pages/register.php?error=Emailadres is al in gebruik");
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (firstName, infixName, lastName, email, password, birthdate) VALUES ('$first_name', '$infix_name', '$last_name', '$email', '$hashed_password', '$birth_date')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../pages/login.php?message=Account succesvol aangemaakt, log nu in");
} else {
    header("Location: ../pages/register.php?error=Er is iets misgegaan, probeer het opnieuw");
}
