<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./Functions/recover_pswd.js"></script>
    <link rel="Stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="Stylesheet" href="./css/recover.css">
    <link rel="icon" type="image/x-icon" href="./Media/icon.ico">
    <title>Sportlink</title>
</head>

<body class="text-center d-flex flex-column justify-content-center"> 
    <!--Header-->
<div class=" m-4">
    <img src="../Media/logo.png" alt="SportLink">
    <a href="./index.php"><img src="../Media/home.png" style="height: 50px; width: 50px;" alt="Homepage"></a>
</div>
    
<div class="form-signup m-auto bg_lrose" style="border-radius: 0.7rem; padding: 30px;">

    <form id="form" method="POST" action="./Functions/recover_pswd_functions.php">
            <h1 class="mb-3  text-white "> Password dimenticata</h1>
            <input type="email" id="emailid" placeholder="Email" name="inputEmail" class="form-control form-control-lg" required autofocus>
            <button type="submit" id="recover_submit" class="btn lblue_btn btn-lg m-2">Continua</button>  <br>
    </form>
        <div id="msg_div"></div>
        <h1 class="mb-3  text-white " id="code_title" hidden> Codice </h1>
    <form id="code_form" class="code_form" method="POST" action="./Functions/recover_pswd_functions.php" hidden>
    <div class="d-flex justify-content-center">
            
            <input type="number" id="codeid1" name="inputCode1" class="form-control form-control-lg mx-2" style="width: 3em" maxlength="1" required >
            <input type="number" id="codeid2" name="inputCode2" class="form-control form-control-lg mx-2" style="width: 3em" maxlength="1" required >
            <input type="number" id="codeid3" name="inputCode3" class="form-control form-control-lg mx-2" style="width: 3em" maxlength="1" required >
            <input type="number" id="codeid4" name="inputCode4" class="form-control form-control-lg mx-2" style="width: 3em" maxlength="1" required >
            <input type="number" id="codeid5" name="inputCode5" class="form-control form-control-lg mx-2" style="width: 3em" maxlength="1" required >
            
    </div>
    <button type="submit" id="code_submit" class="btn lblue_btn btn-lg m-2">Continua</button>
    </form>
    <div id="code_div"></div>



    <form id="pswd_form" method="POST" action="./Functions/recover_pswd_functions.php" hidden>
            <h1 class="mb-3  text-white "> Inserisci la nuova password </h1>
            <input type="password" id="pswdid" name="inputPassword" class="form-control form-control-lg top " placeholder="Inserisci la nuova password..." required autofocus>
            <input type="password" id="pswd2id" name="inputPassword2" class="form-control form-control-lg bottom" placeholder="Ripeti la password..." required>
            <button type="submit" id="pswd_submit" class="btn lblue_btn btn-lg m-2">Imposta Password</button>  <br>
    </form>
    <div id="pswd_div"></div>


</div>
</body>
</html>