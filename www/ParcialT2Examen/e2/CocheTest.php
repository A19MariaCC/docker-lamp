<?php

// Incluir la clase Coche
require_once "Coche.php";
$coche = new Coche("Seat", "Ibiza","parado");
echo $coche->arrancar()."<br>";
echo $coche->estadoActual()."<br>";
echo $coche->detener()."<br>";
echo $coche->estadoActual()."<br>";


?>