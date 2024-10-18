<header>
    <div class="nav">
        <nav>
            <h2 class="logo"><a href="<?php echo URL . "/pages/homepage.php"; ?>">SNEAKERNESS</a></h2>
            <ul>
                <li><a href="<?php echo URL . "/pages/stand.php" ?>">STANDS</a></li>
                <li><a href="/pages/Tickets.php">TICKETS KOPEN</a></li>
                <li><a href="<?php echo URL . "/pages/faq.php"; ?>">FAQ</a></li>
                <li><a href="<?php echo URL . "/pages/contact.php"; ?>">CONTACT</a></li>
            </ul>

            <!-- Check inlogged or not -->
            <?php
            if (strlen(session_id()) < 1) {
                session_start();
            }
            if (isset($_SESSION['id'])) { ?>
                <div class="nav-buttons">
                    <a href="<?php echo URL . "/pages/profile.php"; ?>">Profile</a>
                    <a href="<?php echo URL . "/db/logout.php"; ?>" class=" v2">Logout</a>
                </div>
            <?php } else { ?>
                <div class="nav-buttons">
                    <a href="<?php echo URL . "/pages/login.php"; ?>">
                        Aanmelden
                    </a>
                </div>
            <?php } ?>

            <div class=" progress-container">
                <div class="progress-bar" id="pbar"></div>
            </div>
        </nav>
    </div>
</header>