<?php



if(isset($_POST["inputmsg"])){
    include "../connections.php";
    session_start();
    $my_id=$_SESSION["id"];
    write_msg($my_id,$_POST["inputmsg"],$_SESSION["match_id"]);
    load_chat($_SESSION["match_id"]);
}




function write_msg($mittente,$msg,$match_id)
{
    $query = "INSERT INTO msg (id_partita,mittente,text,data) VALUES ($1,$2,$3,$4) returning id ";
    $data=date('Y-m-d H:i:s');
    $result = pg_query_params($GLOBALS["dbconn"],$query,array($match_id,$mittente,$msg,$data));
}

function get_match_data($match_id){
    $query ="SELECT * from matches where id=$match_id";
    $result= pg_query($GLOBALS["dbconn"],$query);
    if ($line=pg_fetch_array($result))
    {
        foreach($line as $nome=>$valore){
            if($nome=="nplayers") $n_players=$valore;
            if($nome=="date") $date=$valore;
            if($nome=="sport") $sport=$valore;
            if($nome=="max_players") $max_players=$valore;
        }
    }
    return [$n_players,$date,$sport,$max_players];

}

?>