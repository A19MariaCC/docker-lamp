<?php

require_once "Alien.php";

$alien1 = new Alien("Alien1");

echo "Alien: <br>";
echo $alien1 -> getNombre() . "<br>";

// Comprobamos el número total de aliens:
echo "<h3>El número de aliens es: " . Alien::getNumberOfAliens() . "</h3>";

$alien2 = new Alien("Alien2");

echo "Alien: <br>";
echo $alien2 -> getNombre() . "<br>";

// Comprobamos el número total de aliens:
echo "<h3>El número de aliens es: " . Alien::getNumberOfAliens() . "</h3>";

?>