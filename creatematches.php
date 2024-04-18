<script src="./Functions/creatematches.js"></script>

<link rel="stylesheet" href="./css/creatematches.css" />
<?php
session_start();
$_SESSION["error"]="0";
$_SESSION["done"]="0";
?>

<h1 class="m-2">Crea la tua partita</h1>
<div class="flex-wrap d-flex flex-row justify-content-center" style="height: 100%; border-radius: 0.5rem">
<div class="d-flex align-content-center flex-wrap">

<div  class=" d-flex flex-column bg_lblue m-2" style="border-radius: 1.35rem">
<div class="p-2 w-auto"><h3>Pallavolo</h3><image src="./Media/Pallavolo.png" style=" width: 30px; height: 30px;"></div>
<div><button id="Pallavolo"class="btn lrose_btn btn-lg p-2 w-auto mx-4 mb-4">CREA UNA PARTITA</button></div>
</div>
<div  class=" d-flex flex-column bg_lblue m-2" style="border-radius: 1.35rem">
<div class="p-2 w-auto"><h3>Calcio a 5 </h3><image src="./Media/calcio.png" style=" width: 30px; height: 30px;"></div>
<div><button id="calcio_a_5"class="btn lrose_btn btn-lg p-2 w-auto mx-4 mb-4">CREA UNA PARTITA</button></div>
</div>
<div class=" d-flex flex-column bg_lblue m-2" style="border-radius: 1.35rem">
<div class="p-2 w-auto"><h3>Calcio a 8 </h3><image src="./Media/calcio.png" style=" width: 30px; height: 30px;"></div>
<div><button id="calcio_a_8"class="btn lrose_btn btn-lg p-2 w-auto mx-4 mb-4">CREA UNA PARTITA</button></div>
</div>
<div class=" d-flex flex-column bg_lblue m-2" style="border-radius: 1.35rem">
<div class="p-2 w-auto"><h3>Tennis </h3><image src="./Media/tennis.png" style=" width: 30px; height: 30px;"></div>
<div><button id="Tennis"class="btn lrose_btn btn-lg p-2 w-auto mx-4 mb-4">CREA UNA PARTITA</button></div>
</div>
<div class=" d-flex flex-column bg_lblue m-2" style="border-radius: 1.35rem">
<div class="p-2 w-auto"><h3>Baseball </h3><image src="./Media/Baseball.png" style=" width: 30px; height: 30px;"></div>
<div><button id="Baseball"class="btn lrose_btn btn-lg p-2 w-auto mx-4 mb-4">CREA UNA PARTITA</button></div>
</div>
<div class=" d-flex flex-column bg_lblue m-2" style="border-radius: 1.35rem">
<div class="p-2 w-auto"><h3>Beach Volley </h3><image src="./Media/Pallavolo.png" style=" width: 30px; height: 30px;"></div>
<div><button id="beach_volley"class="btn lrose_btn btn-lg p-2 w-auto mx-4 mb-4">CREA UNA PARTITA</button></div>
</div>
<div class=" d-flex flex-column bg_lblue m-2" style="border-radius: 1.35rem">
<div class="p-2 w-auto"><h3>Padel </h3><image src="./Media/tennis.png" style=" width: 30px; height: 30px;"></div>
<div><button id="Padel"class="btn lrose_btn btn-lg p-2 w-auto mx-4 mb-4">CREA UNA PARTITA</button></div>
</div>



</div>
</div>

