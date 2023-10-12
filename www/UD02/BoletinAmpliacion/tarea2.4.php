<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Select UD2</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php
   // Creamos el array multidimensional
   $productos = array(
    'cocacola' => array(
        'nombre' => "Coca Cola",
        'precio' => 2.1,
    ),
    'pepsicola' => array(
        'nombre' => "Pepsi Cola",
        'precio' => 2,
    ),
    'fantanaranja' => array(
        'nombre' => "Fanta Naranja",
        'precio'=>2.5,
    ),
    'trinamanzana' => array(
        'nombre' => "Trina Manzana",
        'precio' => 2.3,
    )
);

echo "<main class='central'>";
echo "<h2>Selecciona un producto de la lista:</h2>";
//No sé cómo hacer para que en la salida me imprima el precio entre paréntesis, tal y como está en el enunciado del ejercicio
echo "<select name=\"opcion\">";
foreach($productos as $producto => $datos) {
    echo "<option value=$producto>";
    foreach($datos as $clave => $valor) {
        echo $valor." ";
        }
       echo " €</option>";
}
echo "</select>";
echo "</main>";
?>

</body>
</html>

