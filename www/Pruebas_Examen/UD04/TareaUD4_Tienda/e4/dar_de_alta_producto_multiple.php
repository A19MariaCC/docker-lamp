<?php
require "lib/base_datos.php";
require "lib/utilidades.php";
$conexion = get_conexion();
seleccionar_bd_tienda($conexion);
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
    <h1>Alta de producto</h1>

    <?php
        $mensajes = array();
        $nombreProducto = "";
        $descripcion = "";
        $precio = "";
        $unidades = "";
        $archivo = "";
        $archivo_tmp = "";

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])){
            if(!empty($_POST["productName"]) && is_string($_POST["productName"])){
                $nombreProducto = test_input($_POST["productName"]);
            }else{
                $mensajes[] = array("error", "Introduce un nombre válido.");
            }
            if (!empty($_POST['descripcion']) && is_string($_POST['descripcion'])) {
                $descripcion = test_input($_POST['descripcion']);
            } else {
                $mensajes[] = array("error", "Introduce una descripción válida.");
            }
        
            if (!empty($_POST['precio']) && is_numeric($_POST['precio'])) {
                $precio = test_input($_POST['precio']);
            } else {
                $mensajes[] = array("error", "Introduce un precio. Solo se permiten valores numéricos.");
            }
            if (!empty($_POST['unidades']) && is_numeric($_POST['unidades'])) {
                $unidades = test_input($_POST['unidades']);
            } else {
                $mensajes[] = array("error", "Introduce unidades. Solo se permiten valores numéricos.");
            }

            if(!empty($mensajes)){
                for($i=0; $i<count($archivos["name"]); $i++){
                    $validar_fichero = esValidoFicheroMultiple($archivos, $i);
                    if($validar_fichero === true){
                        if(subirFicheroMultiple($archivos, $i)){
                            if($i==0){
                                $mensajes[] = subir_fichero_producto_bbdd($nombreProducto, $descripcion, $unidades, $precio, $archivos['name'][0], "archivos/");     
                            }
                        }else{
                            $mensajes[] = array("error", "Error al guardar el archivo $i");
                        }
                    }else{
                        $mensajes = array_merge($mensajes, $validar_fichero);
                    }
                }
            }
        }
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?= get_mensajes_html_format($mensajes);?>

    <form method="post" action="<?= test_input($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <label for="productName">Nombre del producto:  </label>
        <input type="text" name="productName" value="<?= $nombreProducto;?>">
        <br><br>
        <label for="descripcion">Descripción: </label>
        <input type="text" name="descripcion" value="<?= $descripcion;?>">
        <br><br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" value="<?= $precio;?>">
        <br><br>
        <label for="unidades">Unidades: </label>
        <input type="text" name="unidades" value="<?= $unidades;?>">
        <br><br>
        <label for="archivo">Subir foto: </label>
        <input type="file" name="archivos[]" id="archivo" multiple>
        <br><br>
        <input type="submit" name="enviar" value="Enviar"> 
      </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>