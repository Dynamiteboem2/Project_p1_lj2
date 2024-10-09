<?php

define("DB", __DIR__ . "/");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sneakerness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
