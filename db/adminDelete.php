<?php

include_once("conn.php");
include_once("auth.php");


if (isset($_GET['id']) && isset($_GET['table']) && isset($_GET['page'])) {
    $id = $_GET['id'];
    $table = $_GET['table'];
    $page = $_GET['page'];

    $sql = "DELETE FROM $table WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/adminPages/$page.php?message=Record deleted successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: ../pages/adminPages/$page.php?error=Error deleting record");
    }
} else {
    header("Location: ../pages/adminPages/$page.php?error=No record selected");
}