<?php
    include("lib/base_datos.php");
    include("lib/funcionalidades.php");

    $conPDO = conexion();
    select_db_donacion($conPDO);
    $stmt = listar_admin($conPDO);
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Gestión donacion de Sangre</h1>
    <div>
        <h2>Listado de administradores</h2>
        <table>
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Contraseña</th>  
        </tr>

        </thead>
    <tbody>
    <?php
    //Muestro los nombres de los administradores y sus contraseñas para ver si funciona, aunque las contraseñas en un caso real no deberían mostrarse
        while($row = $stmt->fetch()){
            
            echo "<tr> ";
            echo "<td>". $row['nombre']. "</td> "; 
            echo "<td>". $row['contrasena']. "</td> ";
            echo "</tr>";
        }
    ?>
    
    </tbody>
    </table>
    </div>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>