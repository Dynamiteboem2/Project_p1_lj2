<?php

include_once("conn.php");

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    header("Location: ../pages/login.php?error=Vul alle verplichte velden in");
    exit();
}

if (strlen($password) < 5) {
    header("Location: ../pages/login.php?error=Wachtwoord moet minimaal 5 tekens lang zijn");
    exit();
}

$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['infixName'] = $row['infixName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['email'] = $row['email'];
        header("Location: ../index.php?message=Inloggen gelukt");
    } else {
        header("Location: ../pages/login.php?error=Wachtwoord is onjuist");
    }
} else {
    header("Location: ../pages/login.php?error=Emailadres is niet bekend");
}
