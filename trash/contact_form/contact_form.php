<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Hier kun je de verwerking doen, zoals het opslaan in een database of het verzenden van een e-mail

    // Bevestigingsbericht weergeven
    echo "<h2>Bedankt, " . htmlspecialchars($firstName) . "! Uw bericht is verstuurd.</h2>";
    echo "<p>Je wordt binnen 5 seconden teruggestuurd naar de contactpagina.</p>";
    
    // JavaScript om de gebruiker na 3 seconden door te sturen
    echo "<script>
            setTimeout(function(){
                window.location.href = 'http://www.sneakersscontact.com/pages/contact.php';
            }, 3000);
          </script>";
} else {
    echo "Er is een fout opgetreden. Probeer het opnieuw.";
}

// Verbinding met de database
$servername = "localhost";
$username = "root";  // Pas aan indien nodig
$password = "";  // Pas aan indien nodig
$dbname = "sneakerness";

$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gegevens uit het formulier halen
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$message = $_POST['message'];

// SQL query om de gegevens in de database in te voegen
$sql = "INSERT INTO contact_messages (first_name, last_name, email, message) 
        VALUES ('$first_name', '$last_name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Bericht succesvol verstuurd!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Verbinding sluiten
$conn->close();
?>