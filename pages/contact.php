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
        <p>Questions, comments, concerns? Check out our FAQ center.</p>
        <p>Looking to market your business at Sneakerness? Visit our page for <a href="/exhibitors">exhibitors</a>.</p>
        <p>For press releases, please visit our <a href="/press-center">press center</a>.</p>
        <p>Still can’t find what you’re looking for? We are here to help answer your questions.</p>

        <!-- Message -->
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