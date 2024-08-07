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
    <link rel="stylesheet" href="css/about.css">
    
    <!-- FAVICON -->
    <link rel="icon" href="multimedia/img/favicon.ico">

    <!-- TITLE -->
    <title>About</title>
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
                <a href="about.php" class="active">About</a>
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
        <main>
            <!-- TOP PART -->
            <section id="sectionTop">
                <div id="div1">
                    <h1>Mi vagyunk az E-Tetris</h1>
                    <p>"Unus pro omnibus, omnes pro uno"</p>
                </div>
                <div id="div2">
                    <p><em>Tetris</em> bölcsesség, melyre csapatunk épül: <br>
                    <h2>Meghátrálni? Soha.</h2></p>
                </div>
                <div id="div3">
                    <h2>A CSAPAT MENTALITÁS</h2>
                    <p>
                        Nagy része életünknek a hovatartozás, ez az aspektus elhagyhatatlan számunkra,<br>
                        akármit is csinálunk az annak érdekében van, hogy egymást fejlesszük.<br>
                    </p>
                    <h2>A PRIORITÁSOK</h2>
                    <h3>Érdekeink a testvériség és a siker:</h3>
                    <p>
                        testvériség nélkül nincs egy életen át tartó kapocs, amely összetarthat embereket,<br>
                        siker nélkül pedig nem fogják a nevünket történelem könyvekbe írni.
                    </p>
                </div>
            </section>

            <!-- LOWER PART -->
            <section id="sectionLower" class="centerText">
                <h2>A TAGOK:</h2>
                <table>
                    <tr>
                        <th id="nev">Név</th>
                        <th id="age">Életkor</th>
                        <th id="ign">IGN</th>
                        <th id="games">Játékok, amelyekben profi</th>
                    </tr>
                    <tr>
                        <td headers="nev">Bartók Tibor</td>
                        <td headers="age">19</td>
                        <td headers="ign">shrekpot</td>
                        <td headers="games">CS:GO, League of Legends, Minecraft, F1 2021, Unturned</td>
                    </tr>
                    <tr>
                        <td headers="nev">Bukosza Márk</td>
                        <td headers="age">19</td>
                        <td headers="ign">h0hf3l</td>
                        <td headers="games">CS:GO, Fortnite, Europa Universalis IV</td>
                    </tr>
                    <tr>
                        <td headers="nev">Ivánkovits Marcell</td>
                        <td headers="age">19</td>
                        <td headers="ign">shinto</td>
                        <td headers="games">CS:GO, Team Fortress 2, Europa Universalis IV</td>
                    </tr>
                    <tr>
                        <td headers="nev">Lukács Áron</td>
                        <td headers="age">19</td>
                        <td headers="ign">boysi</td>
                        <td headers="games">CS:GO, Fortnite, Tom Clancy's Rainbow Six Siege</td>
                    </tr>
                    <tr>
                        <td headers="nev">Tóth-Kása Bence</td>
                        <td headers="age">18</td>
                        <td headers="ign">Kelekócsag</td>
                        <td headers="games">CS:GO, Fortnite, F1 2021, Unturned</td>
                    </tr>
                </table>
            </section>

        </main>
    </div>
</body>
</html>