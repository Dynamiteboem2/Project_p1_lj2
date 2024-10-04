<?php include_once "../includes/header.php" ?>
<link rel="stylesheet" href="../assets/css/contact.css" />
<title>Sneakerness -Contact</title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <div class="contact-container">
    <h2>Contact</h2>
    <p>Vragen, opmerkingen, zorgen? Bekijk ons FAQ-centrum.</p>
    <p>Wilt u uw bedrijf promoten op Sneakerness? Bezoek onze pagina voor <a href="/exhibitors">exposanten</a>.</p>
    <p>Voor persberichten, bezoek ons <a href="/press-center">perscentrum</a>.</p>
    <p>Kunt u nog steeds niet vinden wat u zoekt? We staan klaar om uw vragen te beantwoorden.</p>

    <form action="../pages/contact_form/contact_form.php" method="post">
    <!-- rest van je formulier -->
    <label for="first_name">Voornaam *</label>
    <input type="text" id="first_name" name="first_name" required>
    
    <label for="last_name">Achternaam *</label>
    <input type="text" id="last_name" name="last_name" required>
    
    <label for="email">E-mail *</label>
    <input type="email" id="email" name="email" required>
    
    <label for="message">Uw bericht</label>
    <textarea id="message" name="message"></textarea>

    <button type="submit">Verstuur uw bericht</button>
</form>





<form id="sellerForm" action="../pages/contact_form/seller_form.php" method="post" onsubmit="return validateForm()">
        <h3>Verkoper informatie</h3>
        
        <label for="company_name">Bedrijfsnaam *</label>
        <input type="text" id="company_name" name="company_name" required>
        
        <label for="contact_name">Naam contactpersoon *</label>
        <input type="text" id="contact_name" name="contact_name" required>
        
        <label for="phone">Telefoonnummer *</label>
        <input type="tel" id="phone" name="phone" required>
        
        <label for="email">E-Mail *</label>
        <input type="email" id="email" name="email" required>
        
        <label for="stand_type">Soort stand *</label>
        <select id="stand_type" name="stand_type" required>
            <option value="">Selecteer...</option>
            <option value="AA+">AA+ Stand</option>
            <option value="AA">AA Stand</option>
            <option value="A">A Stand</option>
            <option value="side-stand">Side-stand (e.g., eten/drinken, tattoo)</option>
        </select>
        
        <label for="num_stands">Aantal gehuurde stands *</label>
        <input type="number" id="num_stands" name="num_stands" min="1" required>
        
        <label for="event_days">Voor welke dagen? *</label>
        <select id="event_days" name="event_days" required>
            <option value="">Selecteer...</option>
            <option value="both">Beide dagen</option>
            <option value="day1">Alleen dag 1</option>
            <option value="day2">Alleen dag 2</option>
        </select>

        <button type="submit">Verstuur</button>
    </form>

<script>
function validateForm() {
    var valid = true;
    var companyName = document.getElementById("company_name").value;
    var contactName = document.getElementById("contact_name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var standType = document.getElementById("stand_type").value;
    var numStands = document.getElementById("num_stands").value;
    var eventDays = document.getElementById("event_days").value;
    
    // Reset error messages
    document.getElementById("company_name_error").innerHTML = "";
    document.getElementById("contact_name_error").innerHTML = "";
    document.getElementById("phone_error").innerHTML = "";
    document.getElementById("email_error").innerHTML = "";
    document.getElementById("stand_type_error").innerHTML = "";
    document.getElementById("num_stands_error").innerHTML = "";
    document.getElementById("event_days_error").innerHTML = "";

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
    if (email == "" || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("email_error").innerHTML = "Vul een geldig e-mailadres in.";
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

    return valid;
}
</script>





    <?php include_once "../includes/footer.php" ?>
</body>
<style>
/* General container styling for a clean look */
.contact-container, 
#sellerForm {
    max-width: 900px; /* More width for a larger, balanced layout */
    margin: 50px auto; /* Center the form and add vertical margin */
    padding: 40px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
    color: #333;
}

/* Contact section heading styling */
.contact-container h2, 
#sellerForm h3 {
    font-size: 2.5rem; /* Larger, bolder headings */
    margin-bottom: 20px;
    color: #111;
    text-align: center;
    font-weight: bold;
}

/* Paragraph styling for a clean, professional look */
.contact-container p {
    font-size: 1.2rem; /* Slightly larger text for readability */
    margin-bottom: 30px;
    text-align: center;
    color: #444;
    line-height: 1.5;
}

/* Styling for the form fields */
form {
    display: flex;
    flex-direction: column;
    gap: 25px; /* More spacing between fields */
    width: 100%;
}

label {
    font-weight: 600; /* Bold labels for a professional look */
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 8px;
}

input[type="text"], 
input[type="email"], 
textarea, 
select {
    width: 100%;
    padding: 15px; /* More padding for a premium feel */
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #f9f9f9;
    color: #333;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus, 
input[type="email"]:focus, 
textarea:focus, 
select:focus {
    border-color: #0073e6; /* Modern blue highlight for focused fields */
    outline: none;
    background-color: #fff;
}

/* Button styling for a modern look */
button[type="submit"] {
    padding: 15px 30px;
    font-size: 1.2rem;
    color: #fff;
    background-color: #0073e6; /* Professional blue color */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    align-self: flex-start;
}

button[type="submit"]:hover {
    background-color: #005bb5; /* Darker blue on hover */
    transform: translateY(-3px); /* Slight hover effect */
}

/* Styling for social icons (like the ones on the right of the screen) */
.social-icons {
    display: flex;
    flex-direction: column;
    position: fixed;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
}

.social-icons a {
    margin: 10px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    background-color: #f1f1f1;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

.social-icons a:hover {
    background-color: #0073e6;
    color: white;
}

/* Error message styling for consistency */
.error-message {
    color: #d9534f;
    font-size: 0.9rem;
    margin-top: -10px;
    margin-bottom: 10px;
}

/* Responsive design for smaller screens */
@media (max-width: 768px) {
    .contact-container, 
    #sellerForm {
        padding: 20px;
        margin: 20px auto;
    }

    .contact-container h2, 
    #sellerForm h3 {
        font-size: 2rem;
    }

    input[type="text"], 
    input[type="email"], 
    textarea {
        font-size: 1rem;
        padding: 12px;
    }

    button[type="submit"] {
        font-size: 1.1rem;
        padding: 12px 25px;
    }
}



</style>
</html>
