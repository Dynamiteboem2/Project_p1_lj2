<?php

include_once("conn.php");

session_start();
session_unset();
session_destroy();
header("Location: ../pages/adminLogin.php");
