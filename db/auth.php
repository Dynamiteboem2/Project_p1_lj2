<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../pages/login.php");
    exit();
}

$userId = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user['type'] != 'admin') {
    header('Location: ../../pages/gebruiker_overzicht/cart_overzicht.php');
    exit();
}
