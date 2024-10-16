<?php include_once "../includes/header.php" ?>
inlog
<title>Sneakerness - </title>
</head>

<body>
    <?php include_once "../includes/navbar.php" ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="#"><i class="fas fa-user"></i></a></li>
                <li><a href="#"><i class="fas fa-lock"></i></a></li>
                <li><a href="#"><i class="fas fa-bell"></i></a></li>
                <li><a href="#"><i class="fas fa-sync-alt"></i></a></li>
            </ul>
        </div>
        <div class="main">
            <h1>Profile</h1>
            <form id="profileForm">
                <div class="form-group">
                    <label for="userName">User Name:</label>
                    <input type="text" id="userName" name="userName">
                </div>
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone">
                </div>

    <?php include_once "../includes/footer.php" ?>

    <!-- All extra scripts -->
</body>

</html>