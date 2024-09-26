<?php include_once "../includes/header.php" ?>
<!-- All extra links for styling etc.-->
<title>Sneakerness - </title>
</head>
<link rel="stylesheet" href="../assets/css/NormaleTickets.css">
<body>
    <?php include_once "../includes/navbar.php" ?>
    <div class="title">
          <div class="jc-center ai-center"><h1>Koop hier je standaard ticket!</h1></div>
       </div>
    <div class="form-container">
    <div class="Ticket-form"> <!-- Klasse aangepast naar Ticket-form -->
        <form id="Tickets-form" action="" method="post">
            <label for="AantalTickets">AantalTickets</label>
            <input type="number" name="AantalTickets" placeholder="AantalTickets" id="AantalTickets" min="1" max="10" required>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" id="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|nl|org|net|edu|gov|uk|us)$" title="Moet eindigen op een geldig domein zoals .com, .nl, .org, .net, .edu, .gov, .uk, of .us" maxlength="30" required>

            <button type="submit">Aanmelden</button>
        </form>
    </div>
</div>

    

    <?php include_once "../includes/footer.php" ?>

    <!-- All extra scripts -->
    <script>
  document.getElementById('meldaan-form').addEventListener('submit', function(event) {
    var emailInput = document.getElementById('email');
    var email = emailInput.value;
    var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|nl|org|net|edu|gov|uk|us|be)$/;

    if (!pattern.test(email)) {
        emailInput.setCustomValidity('The email must end with a valid domain such as .com, .nl, .org, .net, .edu, .gov, .uk, .be, or .us');
        event.preventDefault(); // Prevent form submission
    } else {
        emailInput.setCustomValidity(''); // Clear any previous custom validation message
    }
});

// Clear the custom validity message when the user starts typing
document.getElementById('email').addEventListener('input', function() {
    this.setCustomValidity('');
});


      </script>
</body>

</html>