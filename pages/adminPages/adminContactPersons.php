<?php
include_once "../../db/conn.php";
include_once "auth.php";
?>

<?php include_once "../../includes/header.php"; ?>
<link rel="stylesheet" href="../../assets/css/adminList.css">
<title>Sneakerness - Admin Contact Persons</title>
</head>

<body>
    <?php include_once "../../includes/navbar.php"; ?>
    <div class="admin-list">
        <div class="list-title">
            <h2>Admin - Contact Persons</h2>
            <div class="list-buttons">
                <a href="<?php echo URL . "/pages/adminPages/adminNewContactPerson.php"; ?>" class="list-button">Add New Contact Person</a>
                <a href="<?php echo URL . "/pages/admin.php"; ?>" class="list-button">Back</a>
            </div>
        </div>

        <?php if (isset($_GET['message'])) { ?>
            <p class="message"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php } ?>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php } ?>

        <?php
        // Fetch contact persons from the database
        $sql = "SELECT id, firstName, infixName, lastName, email, phoneNumber, DatumAangemaakt FROM contactperson";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                $contactPersons = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($contactPersons as $person) {
                    // Build full name from parts
                    $fullName = htmlspecialchars($person['firstName']);
                    if (!empty($person['infixName'])) {
                        $fullName .= " " . htmlspecialchars($person['infixName']);
                    }
                    $fullName .= " " . htmlspecialchars($person['lastName']);
                    ?>
                    <tr>
                        <td><?php echo $fullName; ?></td>
                        <td><?php echo htmlspecialchars($person['email']); ?></td>
                        <td><?php echo htmlspecialchars($person['phoneNumber']); ?></td>
                        <td><?php echo htmlspecialchars($person['DatumAangemaakt']); ?></td>
                        <td class="actions">
                            <a href="<?php echo URL . "/pages/adminPages/adminEditContactPerson.php?id=" . $person['id']; ?>"
                               onclick='ConfirmAction(event, "edit")'>Edit</a>
                            <a href="<?php echo URL . "/db/adminDelete.php?id=" . $person['id'] . "&table=contactperson&page=adminContactPersons"; ?>"
                               onclick='ConfirmAction(event, "delete")'>Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        <?php
        } else {
            // Show message if no contact persons are found or if the query failed
            echo "<p class='error'>No contact persons found or there was an issue with the query.</p>";
        }

        // Display SQL error if there is one
        if ($conn->error) {
            echo "<p class='error'>SQL Error: " . htmlspecialchars($conn->error) . "</p>";
        }
        ?>
    </div>

    <?php include_once "../../includes/footer.php"; ?>

    <script src="../../js/adminConfirm.js"></script>
    <script src="../../js/adminList.js"></script>
</body>

</html>
