<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAnlcUwH5VOrr_REzNalW64iOxQyyaK0M0&callback=Function.prototype"></script>
    <script src="./Functions/swal_handler.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./Functions/welcome.js"></script>
    <link rel="Stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./css/welcome.css" />
    <link rel="icon" type="image/x-icon" href="./Media/icon.ico">
    <title>SportLink</title>
</head>




<body class=" bg-light-green" style="height: 100vh; width: 100vw">
<?php
session_start();
include "./Functions/errors_handler.php";
include "./Functions/creatematches_functions.php";
include "./Functions/matches_functions.php";
include "./Functions/mymatches_functions.php";
// if not logged back to index.php
if(!isset($_COOKIE["email"]) or !isset($_COOKIE["name"]) or !isset($_COOKIE["surname"])) {header("Location: ./index.php");exit;}
//load user data in session
$_SESSION["id"]=$_COOKIE["id"];
$_SESSION["email"]=$_COOKIE["email"];
$_SESSION["name"]=$_COOKIE["name"];
$_SESSION["surname"]=$_COOKIE["surname"];
$_SESSION["avatar"]=$_COOKIE["avatar"];
?>

    <div class="box-container text-center text-white " style="height: 100vh">
        <!--Print User data-->
        <div class="header-left pt-2 " style= "height: 100%">
            <?php echo "<img class=\"avatar_ico\" src=".$_SESSION["avatar"].">"; ?> </br>
            <h2 class="text-center align-items-center user_button"><?php echo $_SESSION["name"] . " " . $_SESSION["surname"];?></h2>
        </div>
        <!--Print header-->
        <div class="header m-auto"><img class="site_ico"src="./Media/logo.png"></div>
        <div class="header-right m-auto"><button id="logoutbtn"class="btn lblue_btn btn-lg user_button">Logout</button></div>
        <!-- Print side-menu-->
        <div class="side-menu height-100 pt-4" >
        <h2><button class="btn lblue_btn btn-lg user_button" id="Mymatchesbtn">Le mie partite</button></h2>
        <h2><button class="btn lblue_btn btn-lg user_button" id="Matchesbtn">Cerca</button></h2>
        <h2><button class="btn lblue_btn btn-lg user_button" id="Creatematchesbtn">Crea una partita</button></h2>
        </div>

        <!--Container Core -->
        <div class="core bg-green mx-4 overflow-auto" id="core" style="border-radius: 0.7rem"></div>

        <!--Responsiveness-->
        <header class="headerR">
        <input class="menu-btn" id="menu-btn" type="checkbox">
        <label for="menu-btn" class="menu-icon icon_menu">
        <?php echo "<img class=\"avatar_ico icon_menu_lab\" style=\"max-width: 70px\" src=".$_SESSION["avatar"].">"; ?>
        </label>
        <ul class="menu">
            <li><h1><?php echo $_SESSION["name"] . " " . $_SESSION["surname"];?></h1></li>
            <li class="my-2"><button class="btn lblue_btn btn-lg " id="MymatchesbtnR">Le mie partite</button></li>
            <li class="my-2"><button class="btn lblue_btn btn-lg " id="MatchesbtnR">Cerca</button></li>
            <li class="my-2"><button class="btn lblue_btn btn-lg" id="CreatematchesbtnR">Crea una partita</button></li>
            <li class="my-2"><button id="logoutbtnR"class="btn lblue_btn btn-lg">Logout</button></li>
            
        </ul>
    </header>      
</div> 
</body>
</html>