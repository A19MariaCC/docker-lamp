<?php
/*¿Cuál es el resultado de las siguientes expresiones?. Comprueba el resultado.

70 * 10 – 5 % 3 * 4 + “9”
(( 5 + 3) / 2 * 3) / 2 - (int) 28.75 / 4 + 29 % 3 * 4
$r =’C’ – (double) 5 / 2 + 3.5 + 0.4 (Nota ‘C’ é o ascii: 67)
*/

$resultado = 70 * 10 - 5 % 3 * 4 + "9";
echo $resultado."<br />"; //El resultado es 701 ya que PHP hace la conversión automática del literal "9"
echo gettype($resultado)."<br />";;

$res = (( 5 + 3) / 2 * 3) / 2 - (int) 28.75 / 4 + 29 % 3 * 4;
echo $res; //El resultado es 7, ya que hacemos una conversión de tipo double a Integer y por tanto el resultado es un entero

//$r = 'C' - (double) 5 / 2 + 3.5 + 0.4;
//echo $r; // En este caso nos da error porque queremos sumar un String, 'C' con un double
//tendríamos que forzar la conversión
$r = (int)'C' - (double) 5 / 2 + 3.5 + 0.4;
echo $r;
?>