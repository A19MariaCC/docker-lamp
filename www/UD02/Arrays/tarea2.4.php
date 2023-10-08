<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2.4 UD2</title>
</head>
<body>
    <h2>Tabla países</h2>
<?php
/*En un string, tenemos almacenados varios datos agrupados en ciudad, país y continente. 
El formato es ciudad,pais,continente y cada grupo ciudad-pais-continente se separa co un ;.
$informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";*/

//Crea una aplicación PHP que imprima toda la información almacenada en el string en una tabla con 3 columnas:
    $informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";
    $ciudades = explode(";", $informacion);

    echo "<table>";
    echo "<thead>
        <tr>
            <th scope='col'>Ciudad</th>
            <th scope='col'>Pais</th>
            <th scope='col'>Continente</th>
  
        </tr>
    </thead>";
    foreach($ciudades as $ciudad){
        $ciudad_detalle = explode(",", $ciudad);
        echo "<tbody>";
        echo "<tr><td>$ciudad_detalle[0]</td><td>$ciudad_detalle[1]</td><td>$ciudad_detalle[2]</td></tr>";
        echo "</tbody>";
    }  
    echo "</table>";

?>
</body>
</html>
