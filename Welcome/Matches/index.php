<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Matches/matches.css" />
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" />
    <title>Document</title>
</head>
<body>
<h1>Prenotazioni:</h1>
<table style="width:100%">
        <tr>
          <th >ID Partita</th>
          <th>Numero Giocatori</th>
          <th>Info</th>

        <?php 
include "./matches.php";
loadmatches();?>
      </table>

</body>
</html>