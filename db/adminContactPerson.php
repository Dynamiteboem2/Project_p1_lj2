<?php

include_once("conn.php");

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../pages/admin.php");
}

if (isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['phoneNumber'])) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNumber'];

        $sql = "UPDATE contactPerson SET fullName = '$fullName', email = '$email', phoneNumber = '$phone' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../../pages/adminPages/adminContactPersons.php?message=Record updated successfully");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location: ../../pages/adminPages/adminContactPersons.php?error=Error updating record");
        }
    } else {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNumber'];

        $sql = "INSERT INTO contactPerson (fullName, email, phoneNumber) VALUES ('$fullName', '$email', '$phone')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: ../../pages/adminPages/adminContactPersons.php?message=Record created successfully");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location: ../../pages/adminPages/adminContactPersons.php?error=Error creating record");
        }
    }
} else {
    echo "Error: Missing fields";
    header("Location: ../../pages/adminPages/adminContactPersons.php?error=Missing fields");
}
