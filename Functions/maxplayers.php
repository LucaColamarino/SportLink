<?php

switch($sport)
{
    case "Calcio a 5": $maxplayers=10;break;
    case "Calcio a 8": $maxplayers=16;break;
    case "calcio_a_5": $maxplayers=10;break;
    case "calcio_a_8": $maxplayers=16;break;
    case "Pallavolo": $maxplayers=12;break;
    case "Tennis": $maxplayers=2;break;
    case "Padel": $maxplayers=4;break;
    case "beach_volley": $maxplayers=4; break;
    case "Beach Volley": $maxplayers=4; break;
    case "Baseball": $maxplayers=18; break;
    default: print_r($sport);$maxplayers=0;break;

}
?>