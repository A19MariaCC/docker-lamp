<?php
    /*El domingo de pascua es el primer domingo después de la primera luna llena posterior al equinoccio de primavera 
    y se determina mediante el siguiente cálculo sencillo:

    A = anho mod 19 B = anho mod 4 C = anho mod 7 D = (19 * A + 24) mod 30 
    E = (2 * B + 4 * C + 6 * D + 5) mod 7 N = (22 + D + E)
        
    Donde N indica el número de día del mes de marzo (si N es igual o menor que 31) o abril (si es mayor que 31). 
    Contruir un programa que determina las fechas de domingos de pascua dado el año. 
    Nota: Emplea únicamente las variables anho, d y n
    */

    /*Sé que en el enunciado se solicita utilizar únicamente tres variables, 
    pero no consigo concatener correctamente las operaciones 
    con los echo por lo que me he visto en la necesidd de utilizar más variables*/
    function pascua($anho){
        $A = $anho%19;
        $B = $anho%4;
        $C = $anho%7;
        $D = (19 * $A + 24) %30;
        $E = (2 * $B + 4 * $C + 6 * $D + 5) %7;
        $N = (22 + $D + $E);
        $N2 = $N-31;
        if($N <= 31){
            return "El domingo de pascua es el $N de marzo del $anho";
        }else{
            return "El domingo de pascua es el $N2 de abril del $anho";
        }

    }

    echo pascua(2022);
    


?>