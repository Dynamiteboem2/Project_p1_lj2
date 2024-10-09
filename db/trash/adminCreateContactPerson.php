<?php

include_once("../conn.php");

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
