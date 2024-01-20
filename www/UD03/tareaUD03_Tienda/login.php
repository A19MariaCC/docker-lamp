<?php
    session_start();
    include("lib/base_datos.php");
    include("lib/funciones.php");
    $conexion = get_conexion();
    select_db_tienda($conexion);

    
    /*Aunque consigo dar de alta usuarios con la contreña cifrada en la base de datos, cuando desde el index.php
    redirige a esta página de login.php no me reconoce la contraseña del usuario registrado y me indica que no está registrado
    y no soy capaz de solucionar este error a la hora de loguear usuarios*/
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
        $nombre = $_POST["usuario"];
        $pass = $_POST["pass"];
        $user = comprobar_usuario($conexion, $nombre, $pass);

        if(!$user){
            $error = true;
            echo "<h3>No está registrado como usuario</h3";
        }else{
            $_SESSION['usuario'] = $user;
            //Redirigimos a index.php
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <h1>Login usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <p><label for="usuario">Nombre:</label>
        <input type="text" name="usuario" placeholder="Nombre de usuario"></p>
        <p><label for="pass">Contraseña:</label>
        <input type="password" name="pass"></p>
        <input type="submit" name="login" value="Login">

    </form>
</body>
</html>
<?php
    cerrar_conexion($conexion);
?>