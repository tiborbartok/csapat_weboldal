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
    <link rel="stylesheet" href="css/wins.css">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="multimedia/img/favicon.ico">

    <!-- TITLE -->
    <title>Wins</title>
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
                <a href="wins.php" class="active">Wins</a>
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
        
        <main class="centerText">
            <h2>ÉRDEMEINK, GYŐZELMEINK</h2>
            <table>
                <tr>
                    <th>Esemény</th>
                    <th>Résztvevők</th>
                    <th>Helyezés</th>
                    <th>Nyeremény</th>
                </tr>
                <tr>
                    <td>CS:GO Major Tournament</td>
                    <td>shrekpot, h0hf3l, shinto, boysi, Kelekócsag</td>
                    <td class="winner">1. hely</td>
                    <td>$2.000.000 + jegyek Rick Astley koncertre</td>
                </tr>
                <tr>
                    <td>CS:GO Magyar rendezésű bajnokság</td>
                    <td>shrekpot, h0hf3l, shinto, boysi, Kelekócsag</td>
                    <td class="winner">1. hely</td>
                    <td>1 zsák krumpli fejenként</td>
                </tr>
                <tr>
                    <td>Fortnite Battle Royal kupa by kriszhadvice</td>
                    <td>h0hf3l, boysi, Kelekócsag</td>
                    <td class="winner">1. hely</td>
                    <td>$1.000.000</td>
                </tr>
                <tr>
                    <td>F1 2021 E-Sports World Cup</td> 
                    <td>shrekpot, Kelekócsag</td>
                    <td class="winner">1. hely (konsktruktőri + egyéni bajnokság)</td>
                    <td>20 db 2021-es F1 autó</td>
                </tr>
            </table>
        </main>
    </div>
</body>
</html>