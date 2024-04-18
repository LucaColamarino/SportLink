<?php
session_start();
$_SESSION["error"]="0";
$_SESSION["done"]="0";
include "./Functions/mymatches_functions.php";
$sport="";
if(isset($_GET["sport"])) $sport=$_GET["sport"];
switch($sport){
  case "Calcio": $selected_filter="soccer_filter.png"; break;
  case "Pallavolo": $selected_filter="volley_filter.png"; break;
  case "Tennis": $selected_filter="tennis_filter.png"; break;
  case "Baseball": $selected_filter="baseball_filter.png";break;
  default: $selected_filter="filter.png";break;
}
?>
<div class="bg-green" style="border-radius: 0.5rem" >
<div class="d-flex align-items-center justify-content-center">
  <h1 class="m-2">Le mie Partite</h1>
  <!-- Filter dropdown-->
  <div class="dropdown ">
      <button class="dropbtn p-1" style="border-radius: 10rem "><img src=<?php echo "./Media/".$selected_filter; ?> class="m-2" style="height: 30px; width: 30px;"></button>
      <div class="dropdown-content ">
      <button class="btn" id="no_myfilter_btn"><img src="./Media/filter.png" style="height: 30px; width: 30px;" /></button>
    <button class="btn" id="soccer_myfilter_btn"><img src="./Media/soccer_filter.png" style="height: 30px; width: 30px;" /></button>
    <button class="btn" id="volley_myfilter_btn"><img src="./Media/volley_filter.png" style="height: 30px; width: 30px;" /></button>
    <button class="btn" id="tennis_myfilter_btn"><img src="./Media/tennis_filter.png" style="height: 30px; width: 30px;" /></button>
    <button class="btn" id="baseball_myfilter_btn"><img src="./Media/baseball_filter.png" style="height: 30px; width: 30px;" /></button></div>
    </div>
</div>
<script src="./Functions/filter.js"></script>
<!--Matches Table-->
<table class="mx-1"style="width:99%">
      <tr class="bg_lblue">
      <th >ID</th>
      <th><image src="./Media/sports.png" style="height: 50px; width: 50px;"></th>
      <th> <image src="./Media/calendar1.png" style="height: 50px; width: 50px;"> </th>
      <th><image src="./Media/time.png" style="height: 50px; width: 50px;"></th>
      <th><image src="./Media/players.png" style="height: 50px; width: 50px;"></th>
      <th><image src="./Media/location.png" style="height: 50px; width: 50px;"></th>
      <th></th>
      <?php 
      if($sport!="") load_mymatches($sport);
      else load_mymatches();
      ?>
      </tr>
</table>
</div>