<?php
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
?>

<div class="sidebar">
    <ul>
        <li><a href="profiel_overzicht.php" class="fas fa-user"></a></li>
        <li><a href="cart_overzicht.php" class="fas fa-shopping-cart"></a></li>
        <?php if ($user['type'] == 'admin') { ?>
            <li><a href="admin.php" class="fas fa-user-shield"></a></li>
        <?php } ?>
    </ul>
</div>