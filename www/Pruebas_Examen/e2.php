
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
/*En el div de la clase container debe aparecer un triángulo de letras a.

Crea una lista desordenada de html en la que los elementos deben aparecer de la siguiente forma:

a
aa
aaa
aaaa
...
El número de elementos de la lista debe ser aleatorio entre 1 y 30. Puedes utilizar la función random_int para ello.

Cada vez que recargues la página, el número de elementos generado tiene que ser diferente.
*/

    $num = random_int(1,30);
    $letra = "a";
    echo "<ul>";
    for($i=1; $i<=$num; $i++){
        echo "<li>.$letra.</li>";
        $letra.="a";
    }
    echo "</ul>";

?>
    </div>
    
</body>
</html>



