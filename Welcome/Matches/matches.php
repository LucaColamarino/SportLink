<?php
session_start();
function loadmatches(){
    //print_r($_SESSION);
    $dbconn= pg_connect("host=localhost password=password user=postgres port=5432
    dbname=AccountsDB") or die("Errore di connessione: " . preg_last_error());
    $email= $_SESSION["email"];  
    $query = "SELECT * FROM soccer where giocatore1=$1";
    $result = pg_query_params($dbconn,$query,array($email));
    while ($line=pg_fetch_array($result))
    {
        //per ogni risultato

        echo "<tr>";
        foreach($line as $nome=>$valore)
        {   if($nome=="id") echo "<td>".$valore."</td>";
            if($nome=="giocatore1") echo "<td>".$valore."</td>";
            
        }
        echo "<td><button class=\" btn btn-warning btn-lg\">INFO</button></td>";
    }







}


?>
