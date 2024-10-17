<?php include_once "../includes/header.php" ?>
<link rel="stylesheet" href="../assets/css/inlog.css">
<title>Sneakerness</title>
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
    <style>
        .sidebar {
            width: 200px; /* Define width of the sidebar */
            background-color: black;
            float: left; /* Sidebar positioned to the left */
            padding: 1rem; /* Add some padding for spacing */
            color: white;
        }

        .main {
            margin-left: 220px; /* Add left margin to make space for the sidebar */
            padding: 1rem; /* Add some padding for spacing */
        }

        /* Add styles for the profile form */
        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><button><a href="#"><i class="fas fa-user"></i></a></button></li>
                <li><button><a href="#"><i class="fas fa-lock"></i></a></button></li>
                <li><button><a href="#"><i class="fas fa-shopping-cart"></i></a></button></li>
                <li><button><a href="#"><i class="fas fa-trash"></i></a></button></li>
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
            </form>
        </div>
    </div>
    <?php include_once "../includes/footer.php" ?>
</body>
</html>
