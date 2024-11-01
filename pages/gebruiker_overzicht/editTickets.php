<?php
include '../../db/conn.php'; // Adjust the path as needed

// Initialize the $ticket variable
$ticket = null;

// Fetch the ticket details if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM ticket WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();
}

// Handle form submission
$validationErrors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $ticketQuantity = isset($_POST['ticket_quantity']) ? (int)$_POST['ticket_quantity'] : 0;

    // Validate the input
    if (empty($firstName)) {
        $validationErrors['first_name'] = "De voornaam is verplicht.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+$/", $firstName)) {
        $validationErrors['first_name'] = "Ongeldige voornaam. Gebruik alleen letters.";
    }
    if (empty($lastName)) {
        $validationErrors['last_name'] = "De achternaam is verplicht.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ]+$/", $lastName)) {
        $validationErrors['last_name'] = "Ongeldige achternaam. Gebruik alleen letters.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validationErrors['email'] = "Een geldig e-mailadres is verplicht.";
    }
    if (empty($phoneNumber) || !preg_match("/^\d{10}$/", $phoneNumber)) {
        $validationErrors['phone_number'] = "Ongeldig telefoonnummer. Vul een geldig telefoonnummer in.";
    }
    if ($ticketQuantity <= 0 || $ticketQuantity > 10) {
        $validationErrors['ticket_quantity'] = "De hoeveelheid tickets moet tussen 1 en 10 zijn.";
    }

    if (empty($validationErrors)) {
        // Update the ticket in the database
        $sql = "UPDATE ticket SET first_name=?, last_name=?, email=?, phone_number=?, ticket_quantity=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssii", $firstName, $lastName, $email, $phoneNumber, $ticketQuantity, $id);
        if ($stmt->execute()) {
            // Redirect back to the cart overview page with a success message
            header("Location: cart_overzicht.php?success=Ticket succesvol bijgewerkt.");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Ticket</title>
    <link rel="stylesheet" href="../../assets/css/adminForm.css">
</head>
<body>
    <div class="admin-form">
        <div class="admin-form-box">
            <h2>Edit Ticket</h2>
            <?php
            if (!empty($validationErrors)) {
                foreach ($validationErrors as $error) {
                    echo "<p>$error</p>";
                }
            }
            ?>
            <?php if ($ticket): ?>
                <form action="editTickets.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($ticket['id']); ?>">
                    <div class="input-box">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="<?php echo htmlspecialchars($ticket['first_name']); ?>">
                    </div>
                    <div class="input-box">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="<?php echo htmlspecialchars($ticket['last_name']); ?>">
                    </div>
                    <div class="input-box">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($ticket['email']); ?>">
                    </div>
                    <div class="input-box">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" name="phone_number" value="<?php echo htmlspecialchars($ticket['phone_number']); ?>">
                    </div>
                    <div class="input-box">
                        <label for="ticket_quantity">Ticket Quantity:</label>
                        <input type="number" name="ticket_quantity" value="<?php echo htmlspecialchars($ticket['ticket_quantity']); ?>" min="1" max="10">
                    </div>
                    <button type="submit">Update</button>
                </form>
            <?php else: ?>
                <p>Ticket not found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>