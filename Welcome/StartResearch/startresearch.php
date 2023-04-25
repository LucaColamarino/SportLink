<?php 
        if(isset($_POST["ressubmit"]))
        {

            $dbconn= pg_connect("host=localhost password=password user=postgres port=5432
                        dbname=AccountsDB") or die("Errore di connessione: " . preg_last_error());
            $email= $_SESSION["email"];  
            $query = "INSERT INTO soccer (giocatore1) values ($1)";
            $result = pg_query_params($dbconn,$query,array($email));
        }?>