<?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- METADATA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/shop.css">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="multimedia/img/favicon.ico">

    <!-- TITLE -->
    <title>Shop</title>
</head>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAV -->
        <nav>
            <div id="logo">
                <img src="multimedia/img/nav_logo.png" alt="Szívecske szimbólum"> E-Tetris
            </div>
            <div id="menu">
            <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="wins.php">Wins</a>
                <?php if (isset($_SESSION["user"])) { ?>
                    <a href="shop.php" class="active">Shop</a>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php" id="out">Logout</a>
                <?php } else { ?>
                    <a href="login.php">Login</a>
                    <a href="registration.php">Registration</a>
                <?php } ?>
            </div>
        </nav>

        <!-- CÍM -->
        <article>
            <div>
                <h1>Eladó itemek</h1>
                <p></p>
            </div>
        </article>

        <!-- ITEMEK -->
        <section>
            <div>
                <img src="multimedia/img/negev.png" alt="Negev">
                <p>Negev $500</p>
            </div>
            <div>
                <img src="multimedia/img/awp.png" alt="AWP">
                <p>AWP $1000</p>
            </div>
        </section>
    </div>
</body>
</html>