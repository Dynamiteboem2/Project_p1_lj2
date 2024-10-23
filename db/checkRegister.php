<?php

include_once("conn.php");

$first_name = $_POST['first_name'];
$infix_name = $_POST['infix_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
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

$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../pages/register.php?error=Emailadres is al in gebruik");
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (firstName, infixName, lastName, email, password) VALUES ('$first_name', '$infix_name', '$last_name', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../pages/login.php?message=Account succesvol aangemaakt, log nu in");
} else {
    header("Location: ../pages/register.php?error=Er is iets misgegaan, probeer het opnieuw");
}
