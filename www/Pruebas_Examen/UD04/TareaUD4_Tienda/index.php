<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php
    include("lib/funciones.php");
    include("lib/base_datos.php");

    //Obtener conexión
    $conexion = get_conection();
    //Crear la base de datos tienda
    crear_bd_tienda($conexion);
    //Seleccionar la base de datos tienda
    select_db_tienda($conexion);
    //Crear la tabla usuarios
    crear_tabla_usuarios($conexion);
    ?>
    <h1>Tienda IES San Clemente</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <p>
    <a class="btn btn-primary" href="alta_usuarios.php" role="button"> Alta usuarios</a>
    <a class="btn btn-primary" href="listar_usuarios.php" role="button"> Listar usuarios</a>
    </p>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>
</html>
