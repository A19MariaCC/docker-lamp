<?php
include("lib/base_datos.php");
include("lib/funcionalidades.php");
$conPDO = get_conexion();
select_db_donacion($conPDO);

if(isset($_POST["enviar"])){
    if(!empty($_POST["codPostal"]) && is_numeric($_POST["codPostal"]) && strlen($_POST["codPostal"]) == 5){
        $codPostal = test_input($_POST['codPostal']);
    }else{
     echo "Debes introducir un código Postal numérico de 5 dígitos";
    }
}

$stmt = $conPDO->prepare("SELECT * FROM donantes WHERE codPostal = :codPostal");
$stmt->bindParam(':codPostal',$codPostal);
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
    <h1>Buscar donantes</h1>
    <div>
        <h2>Formulario para buscar donantes</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p><label for="codPostal">Código Postal: </label>
                <input type="text" name="codPostal">
            </p>
            <p><input type="submit" name="enviar" value="Enviar"></p>
        </form>
    </div>
    <?php
         if(isset($_POST['enviar'])){
    ?>
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
        while($row = $stmt->fetch()){
            echo "<tr> ";
            echo "<td>". $row['nombre']. "</td> "; 
            echo "<td>". $row['apellidos']. "</td> ";
            echo "<td>". $row['edad']. "</td> ";
            echo "<td>". $row['grupoSanguineo']. "</td> ";
            echo "<td>". $row['codPostal']. "</td> ";
            echo "<td>". $row['telefonoMovil']. "</td> ";
        }
    ?>
    </tbody>
    </table>
    <?php
        }
    ?>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>