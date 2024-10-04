<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Hier kun je de verwerking doen, zoals het opslaan in een database of het verzenden van een e-mail

    // Bevestigingsbericht weergeven
    echo "<h2>Bedankt, " . htmlspecialchars($firstName) . "! Uw bericht is verstuurd.</h2>";
    echo "<p>Je wordt binnen 3 seconden teruggestuurd naar de contactpagina.</p>";
    
    // JavaScript om de gebruiker na 3 seconden door te sturen
    echo "<script>
            setTimeout(function(){
                window.location.href = 'http://www.sneakersscontact.com/pages/contact.php';
            }, 3000);
          </script>";
} else {
    echo "Er is een fout opgetreden. Probeer het opnieuw.";
}
?>
