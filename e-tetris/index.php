<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- METADATA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/index.css">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="multimedia/img/favicon.ico">

    <!-- TITLE -->
    <title>E-Tetris</title>
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
            <a href="index.php" class="active">Home</a>
                <a href="about.php">About</a>
                <a href="wins.php">Wins</a>
                <?php if (isset($_SESSION["user"])) { ?>
                    <a href="shop.php">Shop</a>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php" id="out">Logout</a>
                <?php } else { ?>
                    <a href="login.php">Login</a>
                    <a href="registration.php">Registration</a>
                <?php } ?>
            </div>
        </nav>

        <!-- MAIN -->
        <main class="center centerText">
            <div id="main_content">
                <pre>
    ╔╦╦╦═╦╗╔═╦═╦══╦═╗
    ║║║║╩╣╚╣═╣║║║║║╩╣
    ╚══╩═╩═╩═╩═╩╩╩╩═╝
                </pre>
                <h1>Üdvözlünk az <strong>E-Tetris</strong> hivatalos oldalán!</h1>
                <p>&#10024; A csillagokig és vissza! &#10024;</p>
            </div>
        </main>
    </div>
</body>
</html>