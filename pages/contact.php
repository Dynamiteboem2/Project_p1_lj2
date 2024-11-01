<?php
include_once "../includes/header.php";
include_once "../db/conn.php";
?>
<link rel="stylesheet" href="../assets/css/contact.css" />
<title>Sneakerness-Contact</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <div class="contact-container">
        <h2>Contact Formulier</h2>
        <p>Vragen, opmerkingen, zorgen? Bekijk ons FAQ-centrum.</p>
        <p>Wilt u uw bedrijf promoten op Sneakerness? Stuur ons een bericht via de contact formulier</a>.</p>
        <p>Kunt u nog steeds niet vinden wat u zoekt? We staan klaar om uw vragen te beantwoorden.</p>

        <!-- Message -->
        <?php if (isset($_GET['message'])) { ?>
        <p class="message"><?php echo $_GET['message']; ?></p>
        <?php } ?>

        <form action="<?php echo URL ?>/db/createContact.php" method="post" onsubmit="return validateContactForm()" novalidate>
    <label for="first_name">Voornaam *</label>
    <input type="text" id="first_name" name="first_name" required>
    <span id="first_name_error" class="error-message" style="color:red;"></span>

    <label for="last_name">Achternaam *</label>
    <input type="text" id="last_name" name="last_name" required>
    <span id="last_name_error" class="error-message" style="color:red;"></span>

    <label for="email">E-mail *</label>
    <input type="email" id="email" name="email" required>
    <span id="email_error" class="error-message" style="color:red;"></span>

    <label for="message">Uw bericht *</label>
    <textarea id="message" name="message" required></textarea>
    <span id="message_error" class="error-message" style="color:red;"></span>

    <button type="submit">Verstuur uw bericht</button>
</form>



          <!-- Contact informatie -->
    <div class="contact-info">
        <h3>Ons postadres:</h3>
        <p>Sneakerness International</p>
        <p>Sneakerness GmbH / LLC</p>
        <p>Australielaan 4</p>
        <p>3521 Utrecht</p>
        <p>Nederland</p>
        <p>Email: <a href="mailto:info@sneakerness.com">info@sneakerness.com</a></p>
    </div>
    </div>

  



    <script>
function validateContactForm() {
    let valid = true;

    // Reset error messages
    document.getElementById('first_name_error').innerText = '';
    document.getElementById('last_name_error').innerText = '';
    document.getElementById('email_error').innerText = '';
    document.getElementById('message_error').innerText = '';

    // First Name Validation
    const firstName = document.getElementById('first_name').value.trim();
    if (!/^[a-zA-Z]+$/.test(firstName)) {
        document.getElementById('first_name_error').innerText = "Alleen letters zijn toegestaan.";
        valid = false;
    }

    // Last Name Validation
    const lastName = document.getElementById('last_name').value.trim();
    if (!/^[a-zA-Z]+$/.test(lastName)) {
        document.getElementById('last_name_error').innerText = "Alleen letters zijn toegestaan.";
        valid = false;
    }

    // Email Validation
    const email = document.getElementById('email').value.trim();
    if (!/^[^\d][a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
        document.getElementById('email_error').innerText = "Geef een geldig e-mailadres op.";
        valid = false;
    }

    // Message Validation
    const message = document.getElementById('message').value.trim();
    const lettersOnly = message.replace(/[^a-zA-Z ]/g, ''); // Verwijder niet-lettertekens en -spaties
    if (lettersOnly.length < 10) {
        document.getElementById('message_error').innerText = "Bericht moet minimaal 10 letters bevatten.";
        valid = false;
    } else if (lettersOnly.length !== message.length) {
        document.getElementById('message_error').innerText = "Bericht mag geen cijfers of andere leestekens bevatten.";
        valid = false;
    }

    return valid;
}
</script>









    <style>
    /* Basic styling for the contact container */
    .contact-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 85px;
        font-family: Arial, sans-serif;
        color: #333;
        background-color: #fff;
        border-radius: 10px;
    }

    .contact-container h2 {
        font-size: 2.5em;
        margin-bottom: 20px;
        color: #111;
        text-align: left;
        text-transform: uppercase;
    }

    .contact-container p {
        font-size: 1.1em;
        margin-bottom: 20px;
        text-align: left;
        color: black;
        text-transform: uppercase;
        border-bottom: 1px solid black;
    }

    /* Styling for the form */
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 5px;
        color: #111;
        text-transform: uppercase;
        
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 12px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    textarea:focus {
        border-color: #0073e6;
        outline: none;
    }

    textarea {
        height: 150px;
        resize: vertical;
    }

    button[type="submit"] {
        background-color: black;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
  font-size: 1rem;
  transition: all 0.3s ease;
    }



    button[type="submit"]:hover {
        background-color: #cc3700;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Contact info styling */
    .contact-info {
        margin-top: 40px;
        padding: 20px;
        border-radius: 8px;
        text-align: left;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .contact-info h3 {
        font-size: 1.8em;
        margin-bottom: 10px;
        color: #111;
        text-transform: uppercase;
    }

    .contact-info p {
        font-size: 1.1em;
        margin: 5px 0;
    }

    .contact-info a {
        color: #0073e6;
        text-decoration: none;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }


    .message {
        margin-bottom: 2rem;
        padding: 10px;
        border-radius: 5px;
        background-color: #d5edda;
        border: 1px solid #c3e6cb
        color: #155724;
        text-align: center;
    }

    /* Responsive design */
    @media (max-width: 600px) {
        .contact-container {
            padding: 20px;
        }

        .contact-container h2 {
            font-size: 2em;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            font-size: 0.9em;
            padding: 8px;
        }

        button[type="submit"] {
            font-size: 1em;
            padding: 10px 16px;
        }
    }
    </style>




 <!--
        <form action="<?php echo URL ?>/db/createContact.php" method="post">
            <label for="first_name">First Name *</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name *</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">E-Mail *</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your message</label>
            <textarea id="message" name="message"></textarea> -->


    <?php include_once "../includes/footer.php" ?>
</body>
<style>
</style>

</html>