
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./LOGIN/login.css" />
    <script src="./bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./LOGIN/login.js"></script>
    <title>Login</title>
</head>
<?php 
session_start();
if( isset($_SESSION["rememberme"])   && $_SESSION["rememberme"]=="on") header("Location: ./Welcome/index.php");
include './LOGIN/login.php';
      ?>

<body class="bg-success">
<div class="d-flex flex-column">

    <div class="p-2 text-center">
        <h1 class="text-white text-uppercase">SportLink</h1>
        <h2 class="text-white fst-italic fw-lighter ">"Chi trova un amico trova un campetto"</h2>
    </div>


    <div class="p-2 d-flex justify-content-around align-items-center">
        <img class="rounded" src="./Media/Homepage2.jpg" style="height: 40vh">
        <div class="text-center">
            <h1>CHI SIAMO</h1>
            <p class="m-auto paragraph text-center">
                SportLink è un'azienda che si occupa di fornire servizi e soluzioni legati al mondo dello sport.
                Siamo una squadra di appassionati di sport che ha deciso di mettere a disposizione delle persone
                la nostra conoscenza e la nostra esperienza per aiutare a creare un mondo sportivo migliore.
            </p>
        </div>
    </div>
    <div class="p-2 d-flex justify-content-around align-items-center">
        <div class="text-center">
            <h1>COSA FACCIAMO</h1>
            <p class="m-auto paragraph text-center">
                Offriamo una vasta gamma di servizi per gli appassionati di sport,
                tra cui la trasmissione in diretta di eventi sportivi, la fornitura di attrezzature sportive,
                l'organizzazione di eventi sportivi e la consulenza sui programmi di allenamento.
                Il nostro obiettivo è fornire ai nostri clienti i migliori prodotti e servizi nel mondo dello sport,
                allo scopo di aiutare le persone a vivere una vita sana e attiva attraverso lo sport.
            </p>
    </div>
        <img class="rounded" src="./Media/Homepage4.jpg" style="height: 40vh">
    </div>

    <div class="p-2 d-flex justify-content-center ">
        <!-- START CAROUSEL-->
                <div id="myCarousel" class="carousel carousel-fade w-85 m-auto" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
                      <button data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
                      <button data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="rounded"src="./Media/Homepage1.jpg ">
                      </div>
                      <div class="carousel-item">
                        <img class="rounded"src="./Media/Homepage4.jpg">
                      </div>
                      <div class="carousel-item">
                        <img class="rounded" src="./Media/Homepage2.jpg">
                      </div>
                    </div>
                    <button class="carousel-control-prev" data-bs-target="#myCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" data-bs-target="#myCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            <!-- END CAROUSEL -->
        
    </div>
    <div class="p-2 text-center ">
      <h2>Entra nella community!</h2>
      <!-- START FORM -->
      <form name="LoginForm" method="POST" class="form-signin m-auto">
          <input type="email" placeholder="E-mail" name="inputEmail" class="form-control" required autofocus>
      
          <input type="password" placeholder="Password" name="inputPassword" class="form-control" required>
          <div id="divRemember" class="checkbox mb-2">
              <input type="checkbox" name="rememberme" id="rmb" >
              <label for="rmb" class="text-white">Ricordami</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
    </form>
    <!-- END FORM -->
    <div>Non sei ancora registrato? Clicca <a href="./Register/index.php">QUI</a> per registrarti</div>
  </div>
    







</div>
</body>
</html>