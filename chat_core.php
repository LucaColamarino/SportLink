<script src="./Functions/chat_core.js"></script>
<div id="chats_body">
<?php
session_start();
$match_id=$_GET["match_id"];
$_SESSION["match_id"]=$match_id;
include "./Functions/chat_core_functions.php";
include "./connections.php";

load_chat($match_id);
?>
<script>reload();</script>
</div>   




