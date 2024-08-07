<?php
    include_once "common/functions.php";
    include_once "class/User.php";
    session_start();

    if (!isset($_SESSION["user"])){
        header("Location: login.php");
    }

    define("DEFAULT_PIC", "multimedia/img/profile_pictures/default.jpg");
    $profilepic=DEFAULT_PIC;

    $utvonal="multimedia/img/profile_pictures/" . $_SESSION["user"]->getUsername();
    $joKiterjesztes=["png", "jpg"];

    foreach ($joKiterjesztes as $jo) {
        if (file_exists("$utvonal.$jo")) {
            $profilepic="$utvonal.$jo";
        }
    }

    $picerrors=[];

    if (isset($_POST["modbtn"]) && is_uploaded_file($_FILES["profile-picture"]["tmp_name"])) {
        imageUpload($picerrors, $_SESSION["user"]->getUsername());

        if (count($picerrors)===0) {

            $kit=strtolower(pathinfo($_FILES["profile-picture"]["name"], PATHINFO_EXTENSION));
            $utvonal="multimedia/img/profile_pictures/" . $_SESSION["user"]->getUsername() . "." . $kit;

            if ($utvonal !== $profilepic && $profilepic !== DEFAULT_PIC) {
                unlink($profilepic);
            }

            header("Location: profile.php");
        }
    }

    $user=$_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- METADATA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/profile.css">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="multimedia/img/favicon.ico">

    <!-- TITLE -->
    <title>Profile</title>
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
                    <a href="profile.php" class="active">Profile</a>
                    <a href="logout.php" id="out">Logout</a>
                <?php } else { ?>
                    <a href="login.php">Login</a>
                    <a href="registration.php">Registration</a>
                <?php } ?>
            </div>
        </nav>
        <?php
        if (count($picerrors) > 0) {
                echo "<div class='errors'>";
                foreach ($picerrors as $picerror) {
                    echo "<p>" . $picerror . "</p>";
                }
                echo "</div>";
            }
        ?>
        <main>
            <table class="centerText">
                <tr>
                    <th colspan="2">FELHASZNÁLÓI ADATOK</th>
                </tr>
                <tr>
                <td colspan="2">
                        <img src="<?php echo $profilepic; ?>" alt="Profilkép" height="400">

                        <form action="profile.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="profile-picture">
                            <input type="submit" name="modbtn" class="picbtn" value="Profilkép módosítása">
                        </form>
                    </td>
                </tr>
                <tr>
                    <th>Felhasználónév: </th>
                    <td><?php echo $user->getUsername(); ?></td>
                </tr>
                <tr>
                    <th>E-mail cím:</th>
                    <td><?php echo $user->getEmail(); ?></td>
                </tr>
            </table>
        </main>
    </div>
</body>
</html>