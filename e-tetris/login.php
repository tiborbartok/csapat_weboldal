<?php
    include_once "common/functions.php";
    include_once "class/User.php";
    session_start();

    $accounts=loadUsers("data/users.txt");

    $logintf=true;

    /* If username and password match */
    if(isset($_POST["sendlogin"])){
        $username=$_POST["username"];
        $psw=$_POST["psw"];

        foreach ($accounts as $account){
            if ($account->getUsername()===$username && password_verify($psw, $account->getPwd())){
                $_SESSION["user"]=$account;
                header("Location: index.php");
            }
        }
        $logintf=false;
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
    <link rel="stylesheet" href="css/login.css">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="multimedia/img/favicon.ico">

    <!-- TITLE -->
    <title>Login</title>
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
                    <a href="shop.php">Shop</a>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php" id="out">Logout</a>
                <?php } else { ?>
                    <a href="login.php" class="active">Login</a>
                    <a href="registration.php">Registration</a>
                <?php } ?>
            </div>
        </nav>
        

        <?php
            if (!$logintf) {
                echo "<div class='errors centerText'><p>A belépési adatok nem megfelelők!</p></div>";
            }
        ?>


        <main>
            <form action="login.php" method="POST">
                <div class="container">
                    <h1>Bejelentkezés</h1>
                    <p>Kérem töltse ki az alábbi mezőket</p>
                    <hr>
                
                    <label for="username"><b>Felhasználónév</b></label>
                    <input type="text" placeholder="Felhasználónév" name="username" id="username" required>
                
                    <label for="psw"><b>Jelszó</b></label>
                    <input type="password" placeholder="Jelszó" name="psw" id="psw" required>
                    <hr>

                    <button type="submit" name="sendlogin" class="loginbtn">Bejelentkezés</button>
                </div>
                <div class="container centerText">
                    <p>Még nincs fiókod? <a href="registration.php">Regisztráció</a>.</p>
                </div>
            </form>
        </main>
    </div>
</body>
</html>