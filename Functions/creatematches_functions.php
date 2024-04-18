







<?php 
            if(isset($_POST["ressubmit"])){
            session_start();
            $nplayers=$_POST["inputNumber"];
            $date= $_POST["inputDate"];
            $sport = $_POST["inputSport"];
            $time= $_POST["inputTime"];
            $location= $_POST["inputLocation"];
            $autocompleted=$_POST["autocompleted"];
            $maxplayers=-1;
            if(strlen($location)==0){ $location=$autocompleted;}
            include "./Functions/maxplayers.php";
            include "./connections.php";
            if($nplayers> $maxplayers) {$_SESSION["error"]="1";}
            elseif($nplayers<1){$_SESSION["error"]="2";}
            elseif($nplayers== $maxplayers) {$_SESSION["error"]="3";}
            elseif(strtotime($date)<=strtotime(date('Y-m-d'))){$_SESSION["error"]="4";}
            else{
            $email= $_SESSION["email"];  
            $p_id=$_SESSION["id"];



            $id_players="{".$p_id;
            for($i=1;$i<$maxplayers;$i++){
                if($i<$nplayers)$id_players.=",".$p_id;
                else $id_players.=",-1";
            
            }
            $id_players.="}";
            
            

            $query = "INSERT INTO matches (giocatori,nplayers,date,sport,time,location,max_players) VALUES ($1,$2,$3,$4,$5,$6,$7) returning id;";
            $result = pg_query_params($GLOBALS["dbconn"],$query,array($id_players,$nplayers,$date,$sport,$time,$location,$maxplayers));
            $line=pg_fetch_array($result);
            $match_id=$line[0];
            
            $query = "INSERT INTO chat (id_partita,giocatori) VALUES ($1,$2)";
            $result = pg_query_params($GLOBALS["dbconn"],$query,array($match_id,$id_players));
            $_SESSION["done"]="1";
            }
            header("Location: ../welcome.php");exit;}
        ?>