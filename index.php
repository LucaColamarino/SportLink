<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./bootstrap/js/bootstrap.bundle.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="./Functions/login.js"></script>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="icon" type="image/x-icon" href="./Media/icon.ico">
  <title>SportLink</title>
</head>

<?php 
session_start();
session_destroy();
if( isset($_COOKIE["rememberme"]) && $_COOKIE["rememberme"] == "on" ) {
  header("Location: ./welcome.php");
  exit;
}
?>

<body>
  <?php include './Functions/login_functions.php'; ?>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light header">
    <a class="navbar-brand" href="#"><img src="../Media/logo.png" alt="SportLink"></a>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#chi-siamo">Chi Siamo</a>
        </li>
      </ul>
      <div class="login">
        <form method="post" class="d-flex ">
          <div class="form-floating mx-1 d-inline-flex">
          <input type="email" placeholder="Email" name="inputEmail"  id="floatingInputValue" class="form-control " required autofocus>
          <label for="floatingInputValue">Email</label>
        </div>
        <div class="form-floating d-inline-flex mr-1 align-items-center">
          <input type="password" placeholder="Password" id="id_pass" name="inputPassword"  id="floatingInputPassword"class="form-control form-control-pswd" required>
          <label for="floatingInputPassword">Password</label>
          <a href="./recover_pswd.php" id="forgot"class="forgot-password  form-control-lost py-3 px-1 ">Dimenticata?</a>
        </div>
          <input type="submit" name="submit" class="btn  btn-lg mx-2" value="Login">
          <div class="d-flex align-items-center ">
            <input type="checkbox" name="rememberme" id="rmb" class="form-check-input mx-1">
          </div>
          <div class="d-flex align-items-center ">
            <label for="rmb mx-1">Ricordami</label>
          </div>
          <a href="./registration.php" class="mx-2 d-flex align-items-center">
            <div>Registrati</div>
          </a>
        </form>
      </div>
    </div>
  </nav>
<!--Responsiveness-->
  <header class="headerR">
      <a href="/" class="logo"><img src="../Media/logo.png" alt="SportLink"></a>
        <input class="menu-btn" id="menu-btn" type="checkbox">
        <label for="menu-btn" class="menu-icon">
            <span class="nav-icon"></span>
        </label>
        <ul class="menu">
            <li><a class="nav-link" href="#home">Home</a></li>
            <li><a class="nav-link" href="#chi-siamo">Chi Siamo</a></li>
            <form method="POST">
            <div class="form-floating m-2 d-inline-flex">
          <input type="email" placeholder="Email" name="inputEmail"  id="floatingInputValueR" class="form-control " required autofocus>
          <label for="floatingInputValueR">Email</label>
        </div> </br>
        <div class="form-floating d-inline-flex m-2 align-items-center">
          <input type="password" placeholder="Password" id="id_passR" name="inputPassword"  id="floatingInputPasswordR"class="form-control form-control-pswd" required>
          <label for="floatingInputPasswordR">Password</label>
          <a href="./recover_pswd.php" id="forgot"class="forgot-password  form-control-lost py-3 px-1 ">Dimenticata?</a>
        </div> </br>
            
            <div class="m-2">
            <input type="checkbox" name="rememberme" id="rmbR" class="form-check-input">
            <label for="rmbR" class="">Ricordami</label></br>
</div>
<input type="submit" name="submit" class="btn btn-lg m-2" value="Login" style="">
            <a href="./registration.php" class="">Registrati</a>
            </form>
        </ul>
    </header>
<!--Home-->
  <div id="home" class="content section justify-content-start mt-15">
    <h1 class="title" style="text-align: center;">CERCA PERSONE CON CUI GIOCARE A:</h1>
        <h2 id="word"></h2>
    </div>
 <!--Chi siamo-->
  <div id="chi-siamo" class="section container">
    <div class="sfocato round px-5 mb-1">
      <h2 id="word">CHI SIAMO</h2>
    </div>
    <div class="sfocato round px-5">
      <h1 class="description mx-auto">SportLink è una piattaforma online che connette appassionati di calcio, pallavolo, tennis, paddle e molto altro, offrendo loro la possibilità di trovare facilmente compagni di gioco.
        Siamo un punto di incontro virtuale per coloro che desiderano organizzare partite e sfide sportive con altre persone appassionate di sport.
        Che tu sia un giocatore esperto o un principiante entusiasta, SportLink ti offre l'opportunità di trovare partner di gioco adatti al tuo livello di competenza e
        ai tuoi interessi sportivi.
        Basta registrarsi gratuitamente, creare un profilo e iniziare a cercare e invitare altri membri per una partita.
        Sia che tu voglia unirti a una squadra o semplicemente organizzare una partita amichevole,
        SportLink è qui per facilitare la tua connessione con altri sportivi e garantire che tu possa goderti il tuo sport preferito
        in modo sociale e divertente.
        Unisciti a noi su SportLink e scopri un nuovo modo di giocare insieme!</h1>
    </div>
</div>
</body>
</html>
