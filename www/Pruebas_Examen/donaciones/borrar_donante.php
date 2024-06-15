<?php
include("lib/base_datos.php");
include("lib/funcionalidades.php");

//Obtener conexión
$conPDO = get_conexion();
//Seleccionar la bd
select_db_donacion($conPDO);

if(isset($_GET["id"])){
    $id = test_input($_GET["id"]);
    borrar_donante($conPDO, $id);
    echo "Donante borrado y sus donaciones en la tabla de histórico";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Borrar donante</h1>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>
    
</body>
</html>