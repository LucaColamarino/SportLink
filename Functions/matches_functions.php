<?php
include "./connections.php";
 //LOAD MATCHES ...


 function load_matches($selected=""){
    $email= $_SESSION["email"];  
    $my_id=$_SESSION["id"];
    if($selected=="")$query = "SELECT * FROM matches order by date";
    else if ($selected=="Calcio") $query = "SELECT * FROM matches where sport='calcio_a_5' or sport='calcio_a_8' order by date ";
    else if ($selected=="Pallavolo") $query = "SELECT * FROM matches where sport='Pallavolo' or sport='beach_volley' order by date ";
    else if ($selected=="Tennis") $query = "SELECT * FROM matches where sport='Tennis' or sport='Padel' order by date ";
    else $query = "SELECT * FROM matches where sport='$selected' order by date ";
    $result = pg_query($GLOBALS["dbconn"],$query);
    while ($line=pg_fetch_array($result))
    {
        //per ogni risultato
        $prenotato=false;
        echo "<tr>";
        foreach($line as $nome=>$valore)
        {   if($nome=="id") $id=$valore;
            if($nome=="nplayers") $nplayers=$valore;
            if($nome=="sport") $sport=$valore;
            if($nome=="giocatori" ){
                $giocatori=$valore;
                $giocatori=trim($giocatori, "{ \ }");
                $players_array = explode(",",$giocatori);
                foreach($players_array as $nome =>$valore){
                    if($valore==$my_id) {
                        $prenotato=true;
                        break; }
                }
            } 
            if($nome=="date") $date=date('d F', strtotime($valore));
            if($nome=="time") $time=date('G:i', strtotime($valore));
            if($nome=="location") $location=$valore;
        }
        if(strtotime($date)<strtotime(date('d F'))){pg_query($GLOBALS["dbconn"],"DELETE FROM MATCHES WHERE id=$id");continue;}
        if(strtotime($date)==strtotime(date('d F'))){
            if(strtotime($time)<strtotime(date('G:i'))){ pg_query($GLOBALS["dbconn"],"DELETE FROM MATCHES WHERE id=$id");continue;}}
        $icon=$sport;
        if($sport=="calcio_a_5") {$icon="calcio"; $sport="Calcio a 5";}
        if($sport=="calcio_a_8") {$icon="calcio"; $sport="Calcio a 8";}
        if($sport=="beach_volley"){$icon="Pallavolo"; $sport="Beach Volley";}
        include "./Functions/maxplayers.php";
        if(!$prenotato && $nplayers<$maxplayers){
            echo "<tr>";
        echo "<td class=\"text_lgrey\">$id</td>";
        echo "<td class=\"m-2 d-flex justify-content-center align-items-center\">$sport <image src=\"./Media/$icon".".png\" class=\"m-2\" style=\" width: 30px; height: 30px;\"></td>";
        echo "<td>$date</td>";
        echo "<td>$time</td>";
        echo "<td>$nplayers/$maxplayers</td>";
        echo "<td  class=\"m-4 d-flex justify-content-center align-items-center\">$location</td>";
        echo "<td><form name=\"MatchesForm\" method=\"post\">
        <input type=\"submit\" name=\"prenotati\" value=\"Prenotati\" class=\"btn lrose_btn btn-lg\">
        <input hidden type=\"number\" name=\"id\" value=$id>    
        </form></td>";
        echo "</tr>";}

        
    }
}

//MATCHES LOADED
 //PRENOTA MATCH
 if(isset($_POST["prenotati"])){prenota();header("Location: ../welcome.php");exit;}
 function prenota(){
 
    $my_id= $_SESSION["id"];
    $id=$_POST["id"];
    $query = "SELECT * FROM matches where id= $id";
    $result = pg_query($GLOBALS["dbconn"],$query);
    if($line=pg_fetch_array($result))
    {foreach($line as $nome => $valore){
        if($nome=="nplayers") $nplayers=$valore;
        if($nome=="giocatori"){$giocatori=$valore;}
    }


    $giocatori=trim($giocatori, "{ \ }");
    $players_array = explode(",",$giocatori);
    $nplayersupdated= $nplayers+1;
    $_SESSION["P_array"]=$players_array;
    $inserito=false;
    foreach($players_array as $index => $value)
    {
        if($value==-1) {
            if($inserito==false){
            $players_array[$index]=$my_id;
            $inserito=true;
            }else{
                $players_array[$index]=-1;
            }
    }}
    if(!$inserito){$players_array[$nplayersupdated]=$my_id;}
    

        
    $first=true;
    foreach($players_array as $index => $valore){
        if($first==true){ $str="$valore";$first=false;
        }else{
            $str.=",$valore";
        }}
    $query="UPDATE matches SET giocatori=ARRAY[$str], nplayers=$nplayersupdated WHERE id=$id";
    $result = pg_query($GLOBALS["dbconn"],$query);  
    $_SESSION["done"]="2";

    
    }
    
 

}



?>
