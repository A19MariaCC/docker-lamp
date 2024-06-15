<?php
require "lib/utilidades.php";

if(isset($_POST["enviar"])){
    $idioma = $_POST["idioma"];
    setcookie("idioma", $idioma, time() + 86400);

}

?>
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
<h1>Selección de idioma</h1>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous">
</script>
<div class="container-fluid">
    <form action='<?php echo test_input($_SERVER["PHP_SELF"]);?>' method="POST">
        <select name="idioma" id="idioma">
            <option value="es">Español</option>
            <option value="gal">Gallego</option>
            <option value="en">Inglés</option>
        </select>
        <input type="submit" value="enviar" name="enviar">
    </form>
</div>
<div>
    <?php 
    imprimir_idioma();
    ?>
</div>
<footer>
    <p>
        <a href='index.php'>Página de inicio</a>
    </p>
    </footer>
</body>
</html>