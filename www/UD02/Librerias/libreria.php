<?php
//Crea un fichero PHP a modo de librería con todas las funciones creadas.

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

//2. Crea una función que reciba un string e devolva a súa lonxitude.
function longitudCadena($cadena){
    if(is_string($cadena)){
        return "La cadena introducida tiene una longitud de ".mb_strlen($cadena)." caracteres";
    }else{
        return "El argumento introducido no es un String";
    }
}

//3. Crea una función que reciba dous número a e b e devolva o número a elevado a b.
function potencia($a, $b){
    if(is_numeric($a) && (is_numeric($b))){
        return "El resultado de $a elvado a $b es:".pow($a,$b);
    }else{
        return "Los parámetros introducidos no son válidos pues no son valores numéricos";
    }  
}

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
//5. Crea una función que reciba un número e devolva se o número é par ou impar.
function esPar($num){
    if(is_numeric($num) && $num%2 == 0){
            return "<p>El número $num es par</p>"; 
    }else{
        return "<p>El número $num es impar</p>"; 
    }
}
//6. Crea una función que reciba un string e devolva o string en maiúsculas.
function cadenaMayusculas($cadena){
    if(is_string($cadena)){
        return "<p>La cadena $cadena convertida a mayúsculas es ".strtoupper($cadena)."</p>";
    }
    
}
//7. Crea una función que imprima a zona horaria (timezone) por defecto utilizada en PHP.
function imprimirZonaHoraria() {
    echo "Zona Horaria por defecto: ".date_default_timezone_get()."<br/>";
 }

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






?>