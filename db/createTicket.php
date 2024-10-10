<?php
include_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event = $_POST['event-select'];
    $date = $_POST['date-select'];
    $ticketQuantity = $_POST['ticket-quantity'];
    $firstName = $_POST['first-name'];
    $infixName = isset($_POST['infix-name']) ? $_POST['infix-name'] : ''; // Optional field
    $lastName = $_POST['last-name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Insert the data into the database
    $sql = "INSERT INTO ticket (event, eventDate, ticketQuantity, firstName, infixName, lastName, phoneNumber, email)
            VALUES ('$event', '$date', '$ticketQuantity', '$firstName', '$infixName', '$lastName', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/Tickets.php?message=Ticket bought successfully");
        exit();
    } else {
        header("Location: ../pages/Tickets.php?error=Error buying ticket");
        exit();
    }

    $conn->close();
}
?>
