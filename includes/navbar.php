<?php
include_once("../config.php");
?>

<header>
    <div class="nav">
        <nav>
            <h2 class="logo"><a href="<?php echo URL . "/pages/homepage.php"; ?>">SNEAKERNESS</a></h2>
            <ul>
                <li><a href="#">EVENEMENTEN</a></li>
                <li><a href="<?php echo URL ."/pages/stand.php"?>">STANDS</a></li>
                <li><a href="/pages/Tickets.php">TICKETS KOPEN</a></li>
                <li><a href="#">VIP STATUS</a></li>
                <li><a href="<?php echo URL . "/pages/faq.php"; ?>">FAQ</a></li>
                <li><a href="<?php echo URL . "/pages/contact.php"; ?>">CONTACT</a></li>
            </ul>
            <div class="progress-container">
                <div class="progress-bar" id="pbar"></div>
            </div>
        </nav>
    </div>
</header>