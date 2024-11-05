<?php
include_once "../../db/conn.php";
include_once "auth.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: " . URL . "/pages/adminPages/adminContactPersons.php?error=Invalid contact person ID");
    exit();
}

$sql = "SELECT * FROM contactperson WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$contactPerson = $stmt->get_result()->fetch_assoc();
?>

<?php include_once "../../includes/header.php"; ?>
<link rel="stylesheet" href="../../assets/css/adminForm.css">
<title>Sneakerness - Edit Contact Person</title>
</head>

<body>
    <?php include_once "../../includes/navbar.php"; ?>

    <div class="admin-form">
        <div class="admin-form-box">
            <h2>Edit Contact Person</h2>
            <form action="<?php echo URL ?>/db/adminContactPerson.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <div class="input-box">
                    <label for="firstName">First Name *</label>
                    <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($contactPerson['firstName']); ?>" required>
                </div>
                <div class="input-box">
                    <label for="infixName">Infix Name</label>
                    <input type="text" id="infixName" name="infixName" value="<?php echo htmlspecialchars($contactPerson['infixName']); ?>">
                </div>
                <div class="input-box">
                    <label for="lastName">Last Name *</label>
                    <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($contactPerson['lastName']); ?>" required>
                </div>
                <div class="input-box">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contactPerson['email']); ?>" required>
                </div>
                <div class="input-box">
                    <label for="phoneNumber">Phone Number *</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo htmlspecialchars($contactPerson['phoneNumber']); ?>" required>
                </div>
                
                <!-- Pass the id to the submission script -->
                <input type="hidden" name="id" value="<?php echo $contactPerson['id']; ?>">
                <button type="submit">Update</button>
                <a href="<?php echo URL . "/pages/adminPages/adminContactPersons.php"; ?>" class="back-button">Cancel</a>
            </form>
        </div>
    </div>

    <?php include_once "../../includes/footer.php"; ?>
</body>
</html>
