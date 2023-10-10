<?php
/* Crea unha función chamada comprobar_nif() que reciba un NIF e devolva:

    true se o NIF é correcto.
    false se o NIF non é correcto.

A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. Para obter a letra do DNI débense levar a cabo os seguintes pasos:

    Dividimos o número entre 23.
    Co resto da división anterior, obtemos a letra corresponde na seguinte táboa:
*/
function validaDNI($dni){
    $letra = substr($dni, 8, 1);
    $digitos = substr($dni, 0, 8);
    if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $digitos%23, 1) == $letra && strlen($letra) == 1 && strlen($digitos) == 8 ){
		return "<p>Este DNI $dni es válido -> "."True"."</p>"."</br>";
   } else {
		return "<p>Este DNI $dni NO es válido -> "."False"."</p>"."</br>";
	}
}

echo validaDNI('44820431D'); // DNI correcto
echo validaDNI('44820431Z'); // DNI incorrecto ya que no se cumple la condición de la letra
echo validaDNI('44820431-'); // DNI incorrecto ya que no tiene letra




?>