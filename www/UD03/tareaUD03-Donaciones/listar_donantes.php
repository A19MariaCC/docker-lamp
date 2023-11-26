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
        <h1>Listado de donantes</h1>
        <table>
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Edad</th>
            <th scope="col">Grupo Sanguineo</th>
            <th scope="col">Código Postal</th>
            <th scope="col">Teléfono móvil</th>
        </tr>

        </thead>
    <tbody>
    <?php
        include("lib/base_datos.php");
        include("lib/funcionalidades.php");
        $conPDO = conexion();
        select_db_donacion($conPDO);
        $resultados = listar_donantes($conPDO);
        $resultados->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $resultados->fetch()){
                echo " <tr> ";
                echo "<td>". $row['nombre']. "</td> "; 
                echo "<td>". $row['apellidos']. "</td> ";
                echo "<td>". $row['edad']. "</td> ";
                echo "<td>". $row['grupoSanguineo']. "</td> ";
                echo "<td>". $row['codPostal']. "</td> ";
                echo "<td>". $row['telefonoMovil']. "</td> ";
                echo "<td> <a class='btn btn-primary' href=donar.php?id=".$row['id'].">Donar</a> </td>";
                echo "<td> <a class='btn btn-primary' href=listar_donaciones.php?id=".$row['id'].">Listar donaciones</a> </td>";
                echo "<td> <a class='btn btn-primary' href=borrar_donante.php?id=".$row['id'].">Borrar</a> </td>";
                echo "</tr> ";
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