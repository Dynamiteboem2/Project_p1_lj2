<?php

include_once("conn.php");

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../pages/admin.php");
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['admin_logged_in'] = true;

        header("Location: ../pages/admin.php");
    } else {
        header("Location: ../pages/adminLogin.php?error=Incorrect username or password");
    }
}
