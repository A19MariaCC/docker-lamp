<?php
    include("lib/base_datos.php");
    include("lib/funcionalidades.php");

    $conPDO = get_conexion();
    select_db_donacion($conPDO);

    if(isset($_POST['enviar'])){
            $contra =test_input($_POST['contra']);
            $nombre = test_input($_POST["nombre"]);
            alta_admin($conPDO,$nombre,$contra);
        }
    
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
    <h1>Alta de administrador</h1>
    <div>
        <h2>Formulario para dar de alta un administrador</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p><label for="nombre">Nombre:</label> 
            <input type="text" name="nombre">
            </p>
            <p><label for="contra">Contraseña: </label>
            <input type="password" name="contra">
            </p>
      <input type="submit" name="enviar" value="Enviar"> 
    </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>