<?php
include("lib/funcionalidades.php");
include("lib/base_datos.php");

//Obtener conexión
$conPDO = get_conexion();
//Seleccionar bd
select_db_donacion($conPDO);

if(isset($_POST["enviar"])){
    $id = test_input($_POST["id_donante"]);
    $fechaDonacion = test_input($_POST["fecha"]);
    donar($conPDO, $id, $fechaDonacion);
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
    <h1>Alta de donación</h1>
    <?php
        if(isset($_GET["id"])){
            $id_donante = $_GET["id"];
    ?>
     <div>
        <h1>Formulario para dar de alta una donación</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p><label for="fecha">Fecha: </label>
                <input type="date" name="fecha">
                <input type="hidden" name="id_donante" value="<?php echo $id_donante ?>"/>
            </p>
            <p>
                <input type="submit" name="enviar" value="Enviar">
            </p>
        </form>

    </div>
    <?php
        }
    ?>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>
</body>
</html>