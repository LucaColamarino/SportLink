<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./welcome.css" />
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <title>SportLink</title>
</head>
<?php
include "./welcome.php";
include "./StartResearch/startresearch.php";
//include "./Matches/matches.php";

if(isset($_POST['logout'])) {
    session_unset();
    header("Location: ../index.php");
}

?>

<body class="bg-success">
    <div class="box-container text-center text-white align-items-center">
        <div class="header-left bg-light-green "> <h2 class="text-center"> <?php echo $_SESSION["name"] . " " . $_SESSION["surname"] ?></h2></div>
        <div class="header"><h1>SportLink</h1></div>
        <div class="header-right">  <form method="post">      <input type="submit" name="logout" value="logout" class="btn btn-primary btn-lg"/> </form></div>

        <div class="side-menu bg-light-green" >

        <h2><button class="btn btn-primary btn-lg" id="Matchesbtn">Prenotazioni</button></h2>
        <h2><button class="btn btn-primary btn-lg" id="Researchbtn">Cerca Giocatori</button></h2>
        </div>

        <div class="core bg-primary" id="core">
            <img src="../Media/Homepage2.jpg"width="1000hv">
        </div>
        

        <div class="footer">Footer</div>











    </div>

    <script src="./welcome.js"></script>
</body>
</html>