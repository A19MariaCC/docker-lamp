<?php
/*(Optativo) Cree una copia de la matriz con el nombre copia con elementos del 3 al 5.
Agregue el elemento ‘Pera’ al final de la matriz.*/

//Este es el array original tras los cambios realizados en el ejercicio 2.3.2
$personajes = array("Apple", "Melon", "Watermelon", "Batman", "Bob", "Burns", "Carl", "Krusty", "Lenny", "Lisa", "Mel", "Superman");
$copia = array_slice($personajes,3,3); //Utilizamos la función array_slice para extraer la parte del array
echo "Copia del array original con los valores de las posiciones 3 a 5:<br />";
foreach($copia as $val){
    echo $val."<br />";
}

?>