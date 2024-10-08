<?php include_once "../includes/header.php" ?>
<link rel="stylesheet" href="../assets/css/contact.css" />
<title>Sneakerness -Contact</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <div class="contact-container">
<<<<<<< HEAD
    <h2>Contact</h2>
    <p>Vragen, opmerkingen, zorgen? Bekijk ons FAQ-centrum.</p>
    <p>Wilt u uw bedrijf promoten op Sneakerness? Bezoek onze pagina voor <a href="/exhibitors">exposanten</a>.</p>
    <p>Voor persberichten, bezoek ons <a href="/press-center">perscentrum</a>.</p>
    <p>Kunt u nog steeds niet vinden wat u zoekt? We staan klaar om uw vragen te beantwoorden.</p>


    <form action="../pages/contact_form/contact_form.php" method="post" onsubmit="return validateContactForm()" novalidate>
        <label for="first_name">Voornaam *</label>
        <input type="text" id="first_name" name="first_name" required>
        <span id="first_name_error" class="error-message" style="color:red;"></span>
        
        <label for="last_name">Achternaam *</label>
        <input type="text" id="last_name" name="last_name" required>
        <span id="last_name_error" class="error-message" style="color:red;"></span>
        
        <label for="email">E-mail *</label>
        <input type="text" id="email" name="email" required>
        <span id="email_error" class="error-message" style="color:red;"></span>
        
        <label for="message">Uw bericht</label>
        <textarea id="message" name="message"></textarea>

        <button type="submit">Verstuur uw bericht</button>
    </form>
</div>

<script>
function validateContactForm() {
    var valid = true;

    // Reset error messages
    document.getElementById("first_name_error").innerHTML = "";
    document.getElementById("last_name_error").innerHTML = "";
    document.getElementById("email_error").innerHTML = "";

    var firstName = document.getElementById("first_name").value.trim();
    var lastName = document.getElementById("last_name").value.trim();
    var email = document.getElementById("email").value.trim();

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

    return valid; // Return the validity of the form
}

// Function to validate email format
function isValidEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple regex for email validation
    return regex.test(email);
}
</script>





<form id="sellerForm" action="../pages/contact_form/seller_form.php" method="post" onsubmit="return validateForm()" novalidate>
    <h3>Verkoper informatie</h3>

    <label for="company_name">Bedrijfsnaam *</label>
    <input type="text" id="company_name" name="company_name" required>
    <span id="company_name_error" class="error-message" style="color:red;"></span>

    <label for="contact_name">Naam contactpersoon *</label>
    <input type="text" id="contact_name" name="contact_name" required>
    <span id="contact_name_error" class="error-message" style="color:red;"></span>

    <label for="phone">Telefoonnummer *</label>
    <input type="tel" id="phone" name="phone" required>
    <span id="phone_error" class="error-message" style="color:red;"></span>

    <label for="email">E-Mail *</label>
    <input type="text" id="email" name="email" required>
    <span id="email_error" class="error-message" style="color:red;"></span>

    <label for="stand_type">Soort stand *</label>
    <select id="stand_type" name="stand_type" required>
        <option value="">Selecteer...</option>
        <option value="AA+">AA+ Stand</option>
        <option value="AA">AA Stand</option>
        <option value="A">A Stand</option>
        <option value="side-stand">Side-stand (e.g., eten/drinken, tattoo)</option>
    </select>
    <span id="stand_type_error" class="error-message" style="color:red;"></span>

    <label for="num_stands">Aantal gehuurde stands *</label>
    <input type="number" id="num_stands" name="num_stands" min="1" required>
    <span id="num_stands_error" class="error-message" style="color:red;"></span>

    <label for="event_days">Voor welke dagen? *</label>
    <select id="event_days" name="event_days" required>
        <option value="">Selecteer...</option>
        <option value="both">Beide dagen</option>
        <option value="day1">Alleen dag 1</option>
        <option value="day2">Alleen dag 2</option>
    </select>
    <span id="event_days_error" class="error-message" style="color:red;"></span>

    <button type="submit">Verstuur</button>
</form>



<script>
function validateForm() {
    var valid = true;

    // Reset error messages
    document.getElementById("company_name_error").innerHTML = "";
    document.getElementById("contact_name_error").innerHTML = "";
    document.getElementById("phone_error").innerHTML = "";
    document.getElementById("email_error").innerHTML = "";
    document.getElementById("stand_type_error").innerHTML = "";
    document.getElementById("num_stands_error").innerHTML = "";
    document.getElementById("event_days_error").innerHTML = "";

    var companyName = document.getElementById("company_name").value;
    var contactName = document.getElementById("contact_name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var standType = document.getElementById("stand_type").value;
    var numStands = document.getElementById("num_stands").value;
    var eventDays = document.getElementById("event_days").value;

    if (companyName == "") {
        document.getElementById("company_name_error").innerHTML = "Vul de bedrijfsnaam in.";
        valid = false;
    }
    if (contactName == "") {
        document.getElementById("contact_name_error").innerHTML = "Vul de naam van de contactpersoon in.";
        valid = false;
    }
    if (phone == "" || !/^\d{10}$/.test(phone)) {
        document.getElementById("phone_error").innerHTML = "Vul een geldig telefoonnummer van 10 cijfers in.";
        valid = false;
    }
    if (email == "") {
        document.getElementById("email_error").innerHTML = "Vul een e-mailadres in.";
        valid = false;
    } else if (!validateEmail(email)) {
        document.getElementById("email_error").innerHTML = "Ongeldig e-mailadres. Probeer het opnieuw.";
        valid = false;
    }
    if (standType == "") {
        document.getElementById("stand_type_error").innerHTML = "Selecteer een stand type.";
        valid = false;
    }
    if (numStands == "" || numStands < 1) {
        document.getElementById("num_stands_error").innerHTML = "Vul een geldig aantal stands in.";
        valid = false;
    }
    if (eventDays == "") {
        document.getElementById("event_days_error").innerHTML = "Selecteer voor welke dagen de stand gehuurd is.";
        valid = false;
    }

    return valid; // Alleen verzenden als valid = true
}

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
</script>


=======
        <h2>Contact</h2>
        <p>Questions, comments, concerns? Check out our FAQ center.</p>
        <p>Looking to market your business at Sneakerness? Visit our page for <a href="/exhibitors">exhibitors</a>.</p>
        <p>For press releases, please visit our <a href="/press-center">press center</a>.</p>
        <p>Still can’t find what you’re looking for? We are here to help answer your questions.</p>
>>>>>>> 38b00683a5f1a11ffe21b2d8d7b4f4e45bda94c2

        <form action="contact_form.php" method="post">
            <label for="first_name">First Name *</label>
            <input type="text" id="first_name" name="first_name" required>
            
            <label for="last_name">Last Name *</label>
            <input type="text" id="last_name" name="last_name" required>
            
            <label for="email">E-Mail *</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Your message</label>
            <textarea id="message" name="message"></textarea>

            <button type="submit">Send us your message</button>
        </form>
    </div>







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

/* Button styling */
button[type="submit"] {
    padding: 10px 20px;
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
    background-color: #005bb5;
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
