<?php
/*
    Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
    Crea una función que reciba un string e devolva a súa lonxitude.
    Crea una función que reciba dous número a e b e devolva o número a elevado a b.
    Crea una función que reciba un carácter e devolva true se o carácter é unha vogal.
    Crea una función que reciba un número e devolva se o número é par ou impar.
    Crea una función que reciba un string e devolva o string en maiúsculas.
    Crea una función que imprima a zona horaria (timezone) por defecto utilizada en PHP.
    Crea una función que imprima a hora á que sae e se pon o sol para a localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude) predeterminadas do teu servidor.
*/
//1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
//Definimos la función
function esDigito($car){
    if(is_integer($car)){
        if($car>=0 && $car<=9){
            echo "El caracter $car introducido es un dígito comprendido entre 0 y 9 <br />";
        }else{
            echo "El caracter $car introducido no es un dígito comprendido entre 0 y 9 <br />";
        }
    }else{
        echo "El caracter $car introducido no es un dígito <br />";
    }
}
//Invocamos la función: primer caso pasando un dígito como argumento y en el segundo caso una letra
esDigito(5);
esDigito("P");
//2. Crea una función que reciba un string e devolva a súa lonxitude.
function longitudCadena($cadena){
    if(is_string($cadena)){
        return "La cadena introducida tiene una longitud de ".mb_strlen($cadena)." caracteres";
    }else{
        return "El argumento introducido no es un String";
    }
}
echo longitudCadena("calendario"); //Invocamos a la función
//3. Crea una función que reciba dous número a e b e devolva o número a elevado a b.
function potencia($a, $b){
    if(is_numeric($a) && (is_numeric($b))){
        return "El resultado de $a elvado a $b es:".pow($a,$b);
    }else{
        return "Los parámetros introducidos no son válidos pues no son valores numéricos";
    }  
}
echo potencia(4,3); //Invocamos a la función

//4. Crea una función que reciba un carácter e devolva true se o carácter é unha vogal.
function esVocal($car){
    $vocal = ["A", "E", "I", "O", "U"];
    
    if(!empty($car)){ //Validamos que la variable no esté vacía
        $car = strtoupper($car); //Convertimos a mayúsculas el caracter introducido
        for($i=0; $i<5; $i++){
            if($vocal[$i] == $car){
                return "<p>El caracter $car es una vocal ->"."True"."</p>";
            }else{
                return "<p>El caracter $car no es una vocal ->"."False"."</p>";
            }
        }
    }else{
        echo "<p>El caracter $car no es válido</p>";
    }
}
echo esVocal("a"); //Pasamos como argumento una vocal
echo esVocal("b"); //Pasamos como argumento una letra
echo esVocal(""); //En este caso entra en el else, pues la variable es una cadena vacía

//5. Crea una función que reciba un número e devolva se o número é par ou impar.
function esPar($num){
    if(is_numeric($num) && $num%2 == 0){
            return "<p>El número $num es par</p>"; 
    }else{
        return "<p>El número $num es impar</p>"; 
    }
}
echo esPar(25);
echo esPar(14);

//6. Crea una función que reciba un string e devolva o string en maiúsculas.
function cadenaMayusculas($cadena){
    if(is_string($cadena)){
        return "<p>La cadena $cadena convertida a mayúsculas es ".strtoupper($cadena)."</p>";
    }
    
}
echo cadenaMayusculas("película"); //Invocamos a la función
//7. Crea una función que imprima a zona horaria (timezone) por defecto utilizada en PHP.
function imprimirZonaHoraria() {
    echo "Zona Horaria por defecto: ".date_default_timezone_get()."<br/>";
 }
 
 imprimirZonaHoraria(); //Invocamos a la función

  //8. Crea una función que imprima a hora á que sae e se pon o sol para a localización por defecto. 
  //Debes comprobar como axustar as coordenadas (latitude e lonxitude) predeterminadas do teu servidor.
  function saleSol(){
  $zonaHoraria = date_default_timezone_get();
  $gmt = 2;
  $latitud = ini_get("date.default_latitude");
  $longitud = ini_get("date.default_longitude");
  $cenit = ini_get("date.sunrise_zenith");
  
  echo date("D M d Y"). ', hora de la salida del sol: '.date_sunrise(time(),SUNFUNCS_RET_STRING,$latitud,$longitud,$cenit,$gmt);
  echo ', la hora de puesta del sol: '.date_sunset(time(),SUNFUNCS_RET_STRING,$latitud,$longitud,$cenit,$gmt);
  }
  saleSol();
?>