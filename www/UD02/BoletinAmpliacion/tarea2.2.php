<?php
/*Escribir un programa que lea la entrada de la hora de un día en notación 14 horas y muestre la respuesta en notación de 12 horas. 
Por ejemplo, si introducimos 18:05 debe proporcionar como salida 06:05 PM.
*/

function notacionHora($hora){ 
   $h2;
   $m2;
   $mensaje;
    if(strlen($hora) == 5){
        $h = substr($hora,0,2);
        //echo $h;
        $h1 = intval($h);
        $m2 = substr($hora,3,5);
        if($h1 > 23){
            echo "La hora introducida es incorrecta<br />";
        }else{
            if($h1 > 11){
                $mensaje = "PM";
            }else{
                $mensaje = "AM";
            }
        }
        if($h1 > 12){
            $h1 = $h1 -12;
            
        }
        $h2 = strval($h1);
    }
    

	
	return $h2.":".$m2." ".$mensaje;
} 
   
//Llamamos a la función
echo notacionHora("13:05");


?>