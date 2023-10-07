<?php
    /*Busca en la documentación de PHP las funciones de manejo de variables
    Comprueba el resultado devuelto por los siguientes fragmentos de código:*/
     $a = "true"; // imprime el valor devuelto por is_bool($a)...
    echo is_bool($a); //No imprime nada porque la variable $a no es un booleano sino una variable de tipo String
     $b = 0; // imprime el valor devuelto por is_bool($b)...; e se entra dentro do if($b) {...}
    // Ya que $a es un booleano, devolverá true
    if (is_bool($b) === true) {
    echo "Sí, este es un booleano<br />";
    }else{
        // Ya que $b no es un booleano, devolverá false. En este caso entrará en el else, puesto que $b no es un booleano
        echo "No, este no es un booleano<br />";
    }
     $c = "false"; // imprime el valor devuelto por gettype($c);
        echo gettype($c), "<br />"; //Nos imprime que la variable $c es de tipo String
     $d = ""; // el valor devuelto por empty($d);
     echo empty($d); //Devuelve 1 (true) porque la variable está vacía, se trata de un String vacío en este caso
     $e = 0.0; // el valor devuelto por empty($e);
     echo empty($e); //Nuevamente nos imprime un 1, ya que 0.0 para el caso de float se considera variable vacía
     $f = 0; // el valor devuelto por empty($f);
     echo empty($f); //En este caso también nos devuelve un 1 (true) porque 0 para Integer también se considera variable vacía
     $g = false; // el valor devuelto por empty($g);
     echo empty($g); //En este caso también nos devuelve un 1 (true) porque false para variables de tipo boolean se considera variable vacía
     $h; // el valor devuelto por empty($h);
     echo empty($h); //En este caso también nos devuelve 1 (true) ya que la variable está vacía, ya que empty no genera warning aunque la variable no esté definida
     $i = "0"; // el valor devuelto por empty($i);
     echo empty($h); // También nos devuelve 1 (true) ya que considera 0 como un String
     $j = "0.0"; // el valor devuelto por empty($j);
     echo empty($h); //Mismo caso que el anterior, considera 0.0 como String 
     $k = true; // el valor devuelto por isset($k);
     var_dump(isset($k)); //Utilizamos var_dump para imprimir el valor devuelto por isset
     // y nos devuelve true ya que la variable $k está definida, se trata de un booleano y no es null
     $l = false; // el valor devuelto por isset($l);
     var_dump(isset($l)); //Mismo caso que el anterior, la variable está definida, se trata de un booleano definido a false, por tanto nos devuelve true
     $m = true; // el valor devuelto por is_numeric($m);
     echo is_numeric($m); //En este caso no se imprime nada que lo equivalente a false ya que $m no es un valor numérico, sino boolean
     $n = ""; // el valor devuelto por is_numeric($n);
     echo is_numeric($n); //Mismo caso que el anterior, pues se trata de una variable de tipo String cadena vacía 
?>