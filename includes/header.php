<?php
// Try to include config but if it fails, include the other config
if (file_exists('../config.php')) {
    include '../config.php';
} elseif (file_exists('../../config.php')) {
    include '../../config.php';
} else {
    error_log("No config file found.");
    die("Configuration files are missing.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="assets/css/main.css" /> -->
    <link rel="stylesheet" href="<?php echo URL . "/assets/css/main.css" ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>SNEAKERNESS</title>
    <!-- <title> </title> for each page -->
    <!-- </head> for each page -->