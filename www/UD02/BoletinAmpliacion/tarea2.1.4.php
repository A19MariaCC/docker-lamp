<?php
// Escribe un programa que calcule el factorial de un número.
function calculaFactorial($numero){ 
    $total=1;
	for ($i = $numero ; $i >= 1 ; $i--) 
	{
		$total=$total*$i;
	}
	return $total;
} 
   
//Llamamos a la función
$numero = 5;
$resultado = calculaFactorial($numero); 
echo "Factorial de $numero  = $resultado";

?>