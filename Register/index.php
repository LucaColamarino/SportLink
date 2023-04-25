<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="Stylesheet" href="./registration.css">
    <script src="./registration.js" type="application/javascript"></script>
    <title>Registrazione</title>
</head>
<body class="text-center " class="bg-image" style="background-image: url('../Media/Homepage3.jpg');  height: 100vh">
    <form name="RegistrationForm" method="POST" class="form-signup m-auto" onSubmit="registrationcheck()">
        <h1 class="mb-3  text-white "> Registrazione</h1>
        <input type="text" placeholder="Nome" name="inputName" class="form-control form-control-lg" required>
        <input type="text" placeholder="Cognome" name="inputSurname" class="form-control form-control-lg" required>
        <input type="email" id="emailid" placeholder="Email" name="inputEmail" class="form-control form-control-lg" required autofocus>
        <input type="password" placeholder="Password" name="inputPassword" class="form-control form-control-lg" required>
        <input type="password" placeholder="Ripeti Password" name="inputPasswordRep" class="form-control form-control-lg" required>
        <button type="submit" name="submit" class="btn btn-success">Registrati!</button>  <br>
        <?php include './registration.php'; ?>

    </form>
</body>
</html>