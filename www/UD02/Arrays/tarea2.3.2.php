<?php
/*Cree una matriz con los siguientes datos: Batman, Superman, Krusty, Bob, Mel y Barney.

    Elimine la última posición de la matriz.
    Imprima la posición donde se encuentra la cadena ‘Superman’.
    Agregue los siguientes elementos al final de la matriz: Carl, Lenny, Burns y Lisa.
    Ordene los elementos de la matriz e imprima la matriz ordenada.
    Agregue los siguientes elementos al comienzo de la matriz: Apple, Melon, Watermelon.*/

    //Creamos el array original utilizando la función array
    $personajes = array("Batman", "Superman", "Krusty", "Bob", "Mel", "Barney");

    //Elimine la última posición de la matriz.
    $ultimaPosicion = array_pop($personajes); //Almacenamos el último elemento en una variable
    //echo $ultimaPosicion;
    unset($ultimaPosicion); //Eliminamos el último elemento con la función unset
    print_r($personajes); //Mostramos el array
    echo "<br />";

    //Imprima la posición donde se encuentra la cadena ‘Superman’.
    $posicion = array_search("Superman", $personajes); //Almacenamos la posición del elemento buscado
    echo "Posición el elemento buscado: ".$posicion."<br />"; //Imprimimos la posición

    //Agregue los siguientes elementos al final de la matriz: Carl, Lenny, Burns y Lisa.
    array_push($personajes, "Carl", "Lenny", "Burns", "Lisa"); //Añadimos los elementos al final del array
    print_r($personajes); //Mostramos el array

    //Ordene los elementos de la matriz e imprima la matriz ordenada.
    asort($personajes); //Aunque nuestro array no es asociativo, lo ordenamos manteniendo la correlación con los índices
    echo "<p> Array ordenado: </p>";
    foreach ($personajes as $key => $val) {
        echo "$key = $val";
        echo "<br />";
    }

    //Agregue los siguientes elementos al comienzo de la matriz: Apple, Melon, Watermelon.
    array_unshift($personajes, "Apple", "Melon", "Watermelon"); //Añadimos los elementos al inicio del array
    print_r($personajes); //Mostramos el array
?>