<?php
/*Crear un programa para mostrar los siguientes resultados en PHP:

Números recibidos por método POST: num1, num2, num3, num4,
Suma total de los números: xxx
Multiplicación de lo números: xxx
Division entre el primer y tercer número: xxx
Resto entre num1 y num2: xxx
¿El primer número es mayor que el tercero? Si o No.

Validación obligatoria para cada campo $_POST recibido:

    isset
    not empty
    is_numeric
*/

$num1;
$num2;
$num3; 
$num4;

if(isset($_POST['campo1']) && (isset($_POST['campo2'])) && (isset($_POST['campo3'])) && (isset($_POST['campo4']))){
    $num1 = $_POST['campo1'];
    $num2 = $_POST['campo2'];
    $num3 = $_POST['campo3'];
    $num4 = $_POST['campo4'];
   

}
if(isset($_POST['enviar'])){
    if(!empty($num1) && (!empty($num2)) && (!empty($num3)) && !empty($num4)){
        if(is_numeric($num1) && (is_numeric($num2)) && (is_numeric($num3)) && is_numeric($num4)){
            echo "Los números recibidos por método POST son: $num1, $num2, $num3, $num4.<br />";
            //Suma total de los números: xxx
            $suma = $num1+$num2+$num3+$num4;
            echo "La suma total de $num1, $num2, $num3 y $num4 es: $suma.<br />";
            //Multiplicación de lo números: xxx
            $multiplicacion = $num1*$num2*$num3*$num4;
            echo "La multiplicación total de $num1, $num2, $num3 y $num4 es: $multiplicacion.<br />";
            //Division entre el primer y tercer número: xxx
            $division = $num1/$num3;
            echo "La división del primer número: $num1 y el tercer número: $num3 es: $division<br />";
            //Resto entre num1 y num2: xxx
            $resto = $num1%$num2;
            echo "El resto del primer número: $num1 y el segundo número: $num2 es: $resto<br />";
            //¿El primer número es mayor que el tercero? Si o No.
            if($num1 > $num3){
                echo "SI<br />";
            }else{
                echo "NO<br />";
            }
        }else{
            echo "Los valores introducidos no son correctos, deben ser valores numéricos";
        }
    }
   
} 



?>