<?php

include_once("conn.php");

$first_name = $_POST['first-name'];
$last_name = $_POST['infix-name'] . $_POST['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthdate = $_POST['birthdate'];

$sql = "INSERT INTO stand (firstName, lastName, email, phoneNumber, birthdate) VALUES ('$first_name', '$last_name', '$email', '$phone', '$birthdate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: ../pages/stand.php?message=Stand form submitted successfully");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
