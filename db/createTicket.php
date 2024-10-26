<?php
include_once("conn.php");
session_start(); // Ensure the session is started

// Initialize variables
$event = $date = $ticketQuantity = $firstName = $lastName = $phone = $email = "";

// Check if user_id is set
if (!isset($_SESSION['id'])) {
    // Optionally, handle anonymous ticket purchases
    // If anonymous purchases are not allowed, redirect with an error
    die('User ID not found in session. Please log in to purchase tickets.');
}

$userId = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $event = $_POST['event-select'];
    $date = $_POST['date-select'];
    $ticketQuantity = $_POST['ticket-quantity'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO ticket (user_id, event_id, event_date, ticket_quantity, first_name, last_name, phone_number, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the prepared statement was created correctly
    if ($stmt === false) {
        die('Error preparing the SQL statement: ' . $conn->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("ississss", $userId, $event, $date, $ticketQuantity, $firstName, $lastName, $phone, $email);

    if ($stmt->execute()) {
        // Redirect after successful ticket creation
        header("Location: ../pages/tickets.php?message=Ticket successfully created!");
        exit();
    } else {
        // Redirect if there was an error
        header("Location: ../pages/tickets.php?error=Error creating ticket: " . $stmt->error);
        exit();
    }

    $stmt->close();
}

$conn->close();
