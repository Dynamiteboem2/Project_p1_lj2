<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
    $contact_name = $_POST['contact_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $stand_type = $_POST['stand_type'];
    $num_stands = $_POST['num_stands'];
    $event_days = $_POST['event_days'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ongeldig e-mailadres. Probeer het opnieuw.";
        exit;
    }

    // Hier kun je verder gaan met het verwerken van de gegevens, zoals opslaan in een database of verzenden via e-mail.

    // Bevestigingsbericht weergeven
    echo "<h1>Bedankt voor uw aanvraag!</h1>";
    echo "<p>U ontvangt binnen enkele minuten een bevestiging. U wordt over 3 seconden teruggestuurd naar de contactpagina.</p>";
    header("refresh:3;url=/pages/contact.php");
    exit;
} else {
    echo "Er is een fout opgetreden. Probeer het opnieuw.";
}
?>
