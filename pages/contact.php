<?php
include_once "../includes/header.php";
include_once "../db/conn.php";
?>
<link rel="stylesheet" href="../assets/css/contact.css" />
<title>Sneakerness -Contact</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <div class="contact-container">
        <h2>Contact</h2>
        <p>Vragen, opmerkingen, zorgen? Bekijk ons FAQ-centrum.</p>
        <p>Wilt u uw bedrijf promoten op Sneakerness? Stuur ons een bericht via de contact formulier</a>.</p>
        <p>Kunt u nog steeds niet vinden wat u zoekt? We staan klaar om uw vragen te beantwoorden.</p>

        <!-- Message -->
        <?php if (isset($_GET['message'])) { ?>
        <p class="message"><?php echo $_GET['message']; ?></p>
        <?php } ?>

        <form action="<?php echo URL ?>/db/createContact.php" method="post" onsubmit="return validateContactForm()"
            novalidate>
            <label for="first_name">Voornaam *</label>
            <input type="text" id="first_name" name="first_name" required>
            <span id="first_name_error" class="error-message" style="color:red;"></span>

            <label for="last_name">Achternaam *</label>
            <input type="text" id="last_name" name="last_name" required>
            <span id="last_name_error" class="error-message" style="color:red;"></span>

            <label for="email">E-mail *</label>
            <input type="text" id="email" name="email" required>
            <span id="email_error" class="error-message" style="color:red;"></span>

            <label for="message">Uw bericht *</label>
            <textarea id="message" name="message" required></textarea>
            <span id="message_error" class="error-message" style="color:red;"></span>

            <button type="submit">Verstuur uw bericht</button>
        </form>
    </div>

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

    <style>
    /* Basic styling for the contact container */
    .contact-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 85px;
        font-family: Arial, sans-serif;
        color: #333;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .contact-container h2 {
        font-size: 2.5em;
        margin-bottom: 20px;
        color: #111;
        text-align: center;
    }

    .contact-container p {
        font-size: 1.1em;
        margin-bottom: 20px;
        text-align: center;
        color: #555;
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
        padding: 12px 24px;
        font-size: 1.2em;
        color: white;
        background-color: #0073e6;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        align-self: flex-start;
    }

    button[type="submit"]:hover {
        background-color: #cc3700;
    }

    /* Contact info styling */
    .contact-info {
        margin-top: 40px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        text-align: left;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .contact-info h3 {
        font-size: 1.8em;
        margin-bottom: 10px;
        color: #111;
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


    <script>
    let failedAttempts = localStorage.getItem('failedAttempts') || 0;

    function validateContactForm() {
        var valid = true;

        // Reset error messages
        document.getElementById("first_name_error").innerHTML = "";
        document.getElementById("last_name_error").innerHTML = "";
        document.getElementById("email_error").innerHTML = "";
        document.getElementById("message_error").innerHTML = "";

        var firstName = document.getElementById("first_name").value.trim();
        var lastName = document.getElementById("last_name").value.trim();
        var email = document.getElementById("email").value.trim();
        var message = document.getElementById("message").value.trim();

        // Validate first name
        if (firstName === "") {
            document.getElementById("first_name_error").innerHTML = "Vul uw voornaam in.";
            valid = false;
        }

        // Validate last name
        if (lastName === "") {
            document.getElementById("last_name_error").innerHTML = "Vul uw achternaam in.";
            valid = false;
        }

        // Validate email
        if (email === "") {
            document.getElementById("email_error").innerHTML = "Vul een e-mailadres in.";
            valid = false;
        } else if (!isValidEmail(email)) {
            document.getElementById("email_error").innerHTML = "Vul een geldig e-mailadres in.";
            valid = false;
        }

        // Validate message
        if (message === "") {
            document.getElementById("message_error").innerHTML = "Vul uw bericht in.";
            valid = false;
        }

        if (!valid) {
            failedAttempts++;
            localStorage.setItem('failedAttempts', failedAttempts);

            // Als er 3 mislukte pogingen zijn geweest
            if (failedAttempts >= 3) {
                alert(
                    "Er is een probleem opgetreden bij het verzenden van uw bericht. Probeer het later opnieuw of neem contact op via e-mail: info@sneakerness.com"
                );
            }
        }

        return valid; // Return the validity of the form
    }


    // Function to validate email format
    function isValidEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple regex for email validation
        return regex.test(email);
    }
    </script>



    <!-- Message
        <?php if (isset($_GET['message'])) { ?>
        <p class="message"><?php echo $_GET['message']; ?></p>
        <?php } ?>

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
/* Basic styling for the contact container */
.contact-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 85px;
    font-family: Arial, sans-serif;
    color: #333;
}

.contact-container h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #111;
    text-align: center;
}

.contact-container p {
    font-size: 1.1em;
    margin-bottom: 20px;
    text-align: center;
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
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

textarea {
    height: 150px;
    resize: vertical;
}

button[type="submit"] {
    padding: 10px 20px;
    font-size: 1.2em;
    color: white;
    background-color: #0073e6;
    /* Standaard blauwe kleur */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    align-self: flex-start;
}

button[type="submit"]:hover {
    background-color: #cc3700;
    /* Oranje kleur bij hover */
}

.message {
    margin-bottom: 2rem;
    padding: 10px;
    border-radius: 5px;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

/* Responsive design */
@media (max-width: 600px) {
    .contact-container {
        padding: 10px;
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
        padding: 8px 16px;
    }
}
</style>

</html>