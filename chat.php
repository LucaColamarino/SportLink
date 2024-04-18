<script src="./Functions/chat.js"></script>

<?php
include "./Functions/chat_functions.php";
include "./connections.php";
session_start();
$match_id=$_GET["match_id"];
$_SESSION["match_id"]=$match_id;
[$n_players,$date,$sport,$max_players]=get_match_data($match_id);
$sport_icon=$sport;
if($sport=="calcio_a_8") {$sport_icon="calcio"; $sport="Calcio a 8";}
if($sport=="calcio_a_5") {$sport_icon="calcio"; $sport="Calcio a 5";}
if($sport=="beach_volley") {$sport_icon="Pallavolo"; $sport="Beach Volley";}
$sport= str_replace("_"," ",$sport);
?>
<body>
  <div class="flex-column d-flex justify-content-between " style=" height: 83vh;">
<div class="chat-header d-flex justify-content-between bg_lrose mb-2" style="border-radius: 0.5rem; border-bottom-left-radius: 0rem; border-bottom-right-radius: 0rem;">  <!-- inizio header del gruppo-->
 <!-- prima colonna-->
  <div class="d-flex align-items-center">
    <?php echo "<button id=\"back_btn\"class=\"btn btn-lg chatbtn\"><image class=\" icon\"src=\"./Media/previous.png\" ></button>";?>
    <?php echo "<h1 class=\" m-2 text_lgrey chat_match\"id=\"match_id\">$match_id</h1>"; ?>
    <?php echo "<h1 class=\"m-2 chat_date\">$date</h1>"; ?>
  </div>
 <!-- seconda colonna-->
<div class="d-flex align-items-center">
      <?php echo"<h1 class=\"m-2\">$sport</h1>"; ?>
      <?php echo "<img class=\"m-2 icon\"src=\"./Media/$sport_icon.png\"> ";?>
</div>
 <!-- terza colonna-->
 <div class="m-2 align-items-center d-flex">
      <?php echo "<img class=\"m-2 icon\"src=\"./Media/Players.png\">"; ?>
      <?php echo "<h2>$n_players/$max_players</h2>"; ?>
</div>

</div>  <!-- fine header del gruppo-->



<div id="msgs" class="msgs overflow-auto"></div>



<div class="input-msg px-3 mt-2">
  <form id="chat_form" method="POST" class="d-flex" action="./Functions/chat_functions.php">
    <input type="text" id="inputmsg" name="inputmsg"placeholder="scrivi un messaggio..." class="form-control mx-1" required autofocus>
    <button type="submit" id="msg_submit" name="msg_submit" class="btn lblue_btn btn-lg mx-2">Invia</button>
  </form>
</div>




</div>
<body>
</html>


