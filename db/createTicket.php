<?php

include_once("conn.php");

$event = $_POST['event-select'];
$date = $_POST['date-select'];
$ticketType = $_POST['ticket-type'];
$ticketQuantity = $_POST['ticket-quantity'];
$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO ticket (event, eventDate, ticketType, ticketQuantity, firstName, lastName, phoneNumber, email) VALUES ('$event', '$date', '$ticketType', '$ticketQuantity', '$firstName', '$lastName', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: ../pages/ticket.php?message=Ticket form submitted successfully");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
