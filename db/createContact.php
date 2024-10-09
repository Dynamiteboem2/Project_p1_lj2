<?php

include_once("conn.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact (firstName, lastName, email, message) VALUES ('$first_name', '$last_name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: ../pages/contact.php?message=Contact form submitted successfully");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
