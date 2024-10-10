<?php

include_once("conn.php");

$first_name = $_POST['first-name'];
$last_name = $_POST['infix-name'] . " " . $_POST['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthdate = $_POST['birthdate'];
$standDate = $_POST['standDate'];

$sql = "INSERT INTO stand (firstName, lastName, email, phoneNumber, birthdate, standDate) VALUES ('$first_name', '$last_name', '$email', '$phone', '$birthdate', '$standDate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    // Succesfuly buy a stand
    header("Location: ../pages/stand.php?message=Stand succesvol gehuurt!");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: ../pages/stand.php?error=Er is een fout opgetreden tijdens het proberen te huren van een stand.");
}

$conn->close();
