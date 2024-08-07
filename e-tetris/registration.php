<?php
    include_once "class/User.php";
    include_once "common/functions.php";
    session_start();
    
    $accounts = loadUsers("data/users.txt");
    
    /* Error array */
    $errors=[];

    /* Error finder */
    if (isset($_POST["sendreg"])) { 
        /* Check if a section was left empty */

        if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
            $hibak[] = "A felhasználónév megadása kötelező!";
            
        if (!isset($_POST["email"]) || trim($_POST["email"]) === "")
            $hibak[] = "A felhasználónév megadása kötelező!";

        if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
            $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";
        
        /* Save form data to variables */
        $username=$_POST["username"];
        $email=$_POST["email"];
        $psw=$_POST["psw"];
        $pswrepeat=$_POST["pswrepeat"];

        foreach ($accounts as $account) {
            if ($account->getUsername()===$username){
                $errors[]="Ez a felhasználónév már foglalt!";
            }
        }

        foreach ($accounts as $account){
            if ($account->getEmail()===$email){
                $errors[]="Ez az e-mail cím már foglalt!";
            }
        }

        if (strlen($psw)<8)
        $errors[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";

        if ($psw!==$pswrepeat)
        $errors[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

        /* Add new user to array */
        if (count($errors)===0){
            $psw=password_hash($psw, PASSWORD_DEFAULT);
            $account=new User($username, $email, $psw);
            $accounts[]=$account;
            saveUsers("data/users.txt", $accounts);
            header("Location: login.php");
            $correctreg=TRUE;
        }
        else{
            $correctreg=FALSE;
        }
        
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
    <link rel="stylesheet" href="css/registration.css">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="multimedia/img/favicon.ico">

    <!-- TITLE -->
    <title>Registration</title>
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
                    <a href="login.php">Login</a>
                    <a href="registration.php" class="active">Registration</a>
                <?php } ?>
            </div>
        </nav>

        <?php
            if (count($errors) > 0) {
                echo "<div class='errors centerText'>";
                foreach ($errors as $error) {
                    echo "<p>" . $error . "</p>";
                }
                echo "</div>";
            }
        ?>
        
        <main>
            <form action="registration.php" method="POST">
                <div class="container">
                    <h1>Regisztrálás</h1>
                    <p>Kérem töltse ki az alábbi mezőket</p>
                    <hr>

                    <label for="username" class="req"><b>Felhasználónév </b></label>
                    <input type="text" placeholder="Felhasználónév" name="username" id="username" required>
                
                    <label for="email" class="req"><b>Email </b></label>
                    <input type="email" placeholder="Email" name="email" id="email" required>
                
                    <label for="psw" class="req"><b>Jelszó </b></label>
                    <input type="password" placeholder="Jelszó" name="psw" id="psw" required>
                
                    <label for="pswrepeat" class="req"><b>Jelszó újra </b></label>
                    <input type="password" placeholder="Jelszó újra" name="pswrepeat" id="pswrepeat" required>

                    <hr>

                    <button type="submit" name="sendreg" class="registerbtn">Regisztrálás</button>
                    <button type="reset" class="resetbtn">Adatok Törlése</button>
                </div>
                
                <div class="container centerText">
                    <p>Már van fiókod? <a href="login.php">Bejelentkezés</a>.</p>
                </div>
            </form>
        </main>
    </div>
</body>
</html>