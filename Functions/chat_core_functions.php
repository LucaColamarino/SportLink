
<?php
function load_chat($id)
{   
    $query="SELECT msg.text,users.name,users.surname,users.avatar
            From msg join users on msg.mittente=users.id
            where id_partita=$id
            order by msg.id";
    $result = pg_query($GLOBALS["dbconn"],$query);
    while($line=pg_fetch_array($result)){
        $color="bg_lrose";
    foreach($line as $nome=>$valore){
        
        if($nome=="text") $text=$valore;
        if($nome=="name") $mittente_n=$valore;
        if($nome=="surname") $mittente_s=$valore;
        if($nome=="avatar") $avatar=$valore;

    }
    $mine=false;
    if($mittente_n==$_SESSION["name"] && $mittente_s==$_SESSION["surname"]){ $mine=true; $color="bg_lblue";}
    $temp="start";
    if($mine) $temp="end";
    echo "<div class=\"d-flex px-auto px-1 justify-content-$temp\">

    <div class=\"d-inline-flex  $color m-1 round\">

        <div class=\"p-2\">
            <img src=\"$avatar\" style=\"height: 50px; width: 50px;\">
        </div>

        <div class=\"p-2\">
            <div class=\"d-flex flex-column\">
                <div class=\"p-2\"><h2>$mittente_n $mittente_s</h2></div>
                <div class=\"p-2\">$text</div> 
            </div>
        </div>

   </div> 
   </div> ";
   
    

}
}
?>