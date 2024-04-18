<?php
include "./connections.php";



function load_mymatches($selected=""){
    $my_id=$_SESSION["id"]; 
    #print("il mio id è");
    #print($my_id);
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
        foreach($line as $nome=>$valore)
        {   if($nome=="id") $id=$valore;
            if($nome=="sport") $sport=$valore;
            if($nome=="nplayers") $nplayers=$valore;

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
            

        if($prenotato){
            $icon=$sport;
            if($sport=="calcio_a_5") {$icon="calcio"; $sport="Calcio a 5";}
            if($sport=="calcio_a_8") {$icon="calcio"; $sport="Calcio a 8";}
            if($sport=="beach_volley"){$icon="Pallavolo"; $sport="Beach Volley";}
            include "./Functions/maxplayers.php";
            echo "<tr>";
            echo "<td class=\"text_lgrey\">$id</td>";
            echo "<td><div class=\" mx-2 d-flex align-items-center justify-content-center\">$sport <image src=\"./Media/$icon".".png\" class=\"m-2\" style=\" width: 30px; height: 30px;\"></div></td>";
            echo "<td>$date</td>";
            echo "<td>$time</td>";
            echo "<td>$nplayers/$maxplayers</td>";
            echo "<td  class=\"m-4 d-flex justify-content-center align-items-center\">$location</td>";
            echo "<td><div class=\"d-flex align-items-center\">";
            echo "<form method=\"post\">
            <input type=\"submit\" name=\"remPrenotation\" value=\"Annulla la prenotazione\" class=\" btn lrose_btn btn-lg\"> 
            <input hidden type=\"number\" name=\"id\" value=$id>  
            </form>";
            echo "<h2><button class=\"btn btn-lg chatbtn\" id=\"$id\"><img src=\"./Media/chat.png\" style=\"height: 30px; width: 30px;\"></button></h2>";


            echo "</div></td>";
            echo "</tr>";}
        
    }
}
if(isset($_POST["remPrenotation"])){annulla_prenotazione();header("Location: ../welcome.php");exit;}

function annulla_prenotazione(){
    $my_id= $_SESSION["id"]; 
    $id=$_POST["id"];
    $query = "SELECT * FROM matches where id= $id";
    $result = pg_query($GLOBALS["dbconn"],$query);
    if($line=pg_fetch_array($result))
    {foreach($line as $nome => $valore){

        if($nome=="nplayers") $nplayers=$valore;
        if($nome=="giocatori")$giocatori=$valore;
    }

    $giocatori=trim($giocatori, "{ \ }");
    $players_array = explode(",",$giocatori);
    foreach($players_array as $nome =>$valore){
        if($valore==$my_id) {
            $index=$nome;
            $players_array[$index]=-1;
            $nplayers= $nplayers-1;
        }
    }
    
   
    $first=true;
    foreach($players_array as $index => $valore){
        if($first==true){ $str="$valore";$first=false;}else{

            $str.=",$valore";

        }}
        $_SESSION["update"]=$players_array;
    $query="UPDATE matches SET giocatori=ARRAY[$str], nplayers=$nplayers WHERE id=$id";
    $result = pg_query($GLOBALS["dbconn"],$query);  
    $_SESSION["done"]="3";

    
    }
    
 

}

?>