<?php

  require "lib/base_datos.php";
  require "lib/utilidades.php";
  require "class/usuario.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de usuario </h1>

<?php

$mensajes = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $usuario = new Usuario(
        0,
        $_POST["name"],
        $_POST["apellidos"],
        $_POST["edad"],
        $_POST["provincia"],
        $_POST["password"]
    );

    if($usuario->isEmpty()){
        $mensajes[] =  array("error", "Falta algún dato obligatorio del formulario.");
    }else{
        $usuario->limpiarAtributos();
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);
        dar_alta_usuario($conexion, $usuario);
        $mensajes[] = array("success","Usuario dado de alta correctamente");
        cerrar_conexion($conexion);
    }
    
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?= get_mensajes_html_format($mensajes);?>

    <p>Formulario de alta</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      Nombre: <input type="text" name="name">
      <br><br>
      Contraseña: <input type="password" name="password">
      <br><br>
      Apellidos: <input type="text" name="apellidos">
      <br><br>
      Edad: <input type="text" name="edad">
      <br><br>
      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Provincia: </label>
      <select name="provincia" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
        <option value="corunha">A Coruña</option>
        <option value="lugo">Lugo</option>
        <option value="ourense">Ourense</option>
        <option value="pontevedra">Pontevedra</option>
      </select>
      <input type="submit" name="submit" value="Submit">
    </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>