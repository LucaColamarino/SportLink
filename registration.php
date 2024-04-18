<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="Stylesheet" href="./css/registration.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="./Functions/registration.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./Media/icon.ico">

    <title>Registrazione</title>
</head>



<body class="text-center d-flex flex-column"> 

<div class=" m-4">
    <img src="../Media/logo.png" alt="SportLink">
    <a href="./index.php"><img src="../Media/home.png" style="height: 50px; width: 50px;" alt="Homepage"></a>
</div>
    
<div class="form-signup m-auto bg_lrose mb-auto mt-4" style="border-radius: 0.7rem; padding: 30px;">
    <form name="RegistrationForm" method="POST" class="" >
        <h1 class="mb-3  text-white "> Registrazione</h1>
        <p class=" text-white "> Scegli il tuo Avatar:</p>
        <div class="d-flex justify-content-center align-items-center">
            <a class="btn bt-success"id="Avatar_left"><</a>
            <!--input hidden to save avatar value-->
            <input type="text" class="avatar "name="avatar" value="./" hidden>
            <img class="mb-3 Avatar_img">
            <a class="btn bt-success"id="Avatar_right">></a>
        </div>
        <input type="text" placeholder="Nome" name="inputName" class="form-control form-control-lg" required autofocus>
        <input type="text" placeholder="Cognome" name="inputSurname" class="form-control form-control-lg" required>
        <input type="email" id="emailid" placeholder="Email" name="inputEmail" class="form-control form-control-lg" required>
        <input type="password" placeholder="Password" name="inputPassword" class="form-control form-control-lg" required>
        <input type="password" placeholder="Ripeti Password" name="inputPasswordRep" class="form-control form-control-lg" required>
        <button type="submit" name="registration_submit" class="btn lblue_btn btn-lg">Registrati!</button>  <br>
    </form>
</div>
<?php include './Functions/registration_functions.php';?>
</body>
</html>