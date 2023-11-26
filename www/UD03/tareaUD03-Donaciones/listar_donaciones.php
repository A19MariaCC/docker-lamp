<?php
    include("lib/base_datos.php");
    include("lib/funcionalidades.php");

    $conPDO = conexion();
    select_db_donacion($conPDO);
    if(isset($_GET['id'])){
        //$idDonante = test_input([$_GET['id']]);
        $idDonante = $_GET['id'];
    
    $stmt = $conPDO->prepare("SELECT donantes.nombre, donantes.apellidos, donantes.edad, donantes.grupoSanguineo, historico.fechaDonacion, historico.proximaDonacion FROM donantes, historico WHERE donantes.id = historico.idDonante AND donantes.id = :id ORDER BY historico.fechaDonacion DESC");
    $stmt->bindParam(':id',$idDonante);
    $stmt->execute();
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
        <p>Listado de donaciones</p>
        <table>
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Edad</th>
            <th scope="col">Grupo Sanguineo</th>
            <th scope="col">Fecha Donación</th>
            <th scope="col">Fecha próxima donación</th>
        </tr>

        </thead>
    <tbody>
    <?php
        while($row = $stmt->fetch()){
            
            echo "<tr> ";
            echo "<td>". $row['nombre']. "</td> "; 
            echo "<td>". $row['apellidos']. "</td> ";
            echo "<td>". $row['edad']. "</td> ";
            echo "<td>". $row['grupoSanguineo']. "</td> ";
            echo "<td>". $row['fechaDonacion']. "</td> ";
            echo "<td>". $row['proximaDonacion']. "</td> ";
            echo "</tr>";
        }
    ?>
    
    </tbody>
    </table>
    </div>
    <?php
        }
    ?>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>