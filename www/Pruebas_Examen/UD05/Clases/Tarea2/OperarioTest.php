<?php

require_once "Operario.php";

$operarioRaquel = new Operario("Raquel", 1200, "NOCTURNO");
$operarioPepe = new Operario("Pepe", 1400, "diurno");

echo "Operario: </br>";
echo $operarioRaquel -> getNombre() . "<br>";
echo $operarioRaquel -> getSalario() . "<br>";
echo $operarioRaquel -> getTurno() . "<br>";


echo "Operario: </br>";
echo $operarioPepe -> getNombre() . "<br>";
echo $operarioPepe -> getSalario() . "<br>";
echo $operarioPepe -> getTurno() . "<br>";


// Comprobamos el número total de empleados:
echo "<h3>El número de empleados es: " . Operario::getNumEmpleados() . "</h3>";