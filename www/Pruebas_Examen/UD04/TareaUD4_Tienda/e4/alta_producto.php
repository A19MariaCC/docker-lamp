<?php
require "lib/base_datos.php";
require "lib/utilidades.php";
$conexion = get_conexion();
seleccionar_bd_tienda($conexion);
?>
<html>
    <body>
        <h1>Alta productos</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <div class="form-group">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                <p><label for="productName">Nombre del producto:</label>
                <input type="text" name="productName"><?php if(isset($nombreProductoErr)) echo $nombreProductoErr;?>
                </p>
                <p><label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion"><?php if(isset($descripcionErr)) echo $descripcionErr;?>
                </p>
                <p><label for="precio">Precio:</label>
                <input type="text" name="precio"><? if(isset($precioErr)) echo $precioErr;?>
                </p>
                <p><label for="unidades">Unidades:</label>
                <input type="text" name="unidades"><?php if(isset($unidadesErr)) echo $unidadesErr;?>
                </p>
                <p><label for="imagen">Subir imagen:</label>
                <input type="file" name="archivo" id="archivo"><?php if(isset($nombreArchivoErr)) echo $nombreArchivoErr; ?>
                </p>
                <input type="submit" name="submit" value="Enviar"> 
            </form>
            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(!empty($_POST["productName"]) && is_string($_POST["productName"])){
                        $nombreProducto = test_input($_POST["productName"]);
                    }else{
                        $nombreProductoErr = "Introduce un nombre válido";
                    }
                }
                if(!empty($_POST["descripcion"]) && is_string($_POST["descripcion"])){
                    $descripcion = test_input($_POST["descripcion"]);
                }else{
                    $descripcionErr = "Introduce una descripción válida.";
                }
                if(!empty($_POST["precio"]) && is_numeric($_POST["precio"])){
                    $precio = test_input($_POST["precio"]);
                }else{
                    $precioErr = "Introduce un precio. Solo se permiten valores numéricos.";
                }
                if(!empty($_POST["unidades"]) && is_numeric($_POST["unidades"])){
                    $unidades = test_input($_POST["unidades"]);
                }else{
                    $unidadesErr = "Introduce unidades. Solo se permiten valores numéricos.";
                }
                if(!empty($_FILES["archivo"]["name"])){
                    $archivo = test_input($_FILES["archivo"]["name"]);
                }else{
                    $nombreArchivoErr = "Adjunta un archivo";
                }

                //Subida de archivos
                $target_dir= "archivos/";
                if(isset($archivo) && isset($_POST["submit"])){
                    $target_file = $target_dir.basename($archivo);
                    $tipoFichero = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if(!empty($_FILES["archivo"]["name"]) && !file_exists($target_file)){
                        if(compruebaTamanho($_FILES["archivo"]["size"])){
                            if(compruebaExtension($tipoFichero)){
                                if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)){
                                    echo "El fichero ".htmlspecialchars(basename($_FILES["archivo"]["name"])). "se ha subido al servidor";
                                    //Lo subimos a la base de datos
                                    if(!is_null($nombreProducto) && !is_null($descripcion) && !is_null($unidades) && !is_null($precio)){
                                        $imgContenido = addslashes(file_get_contents($target_file));
                                            altaProducto($conexion, $nombreProducto, $descripcion, $precio, $unidades, $imgContenido);
                                    }
                                }else{
                                echo "Error. No se ha podido subir el archivo";
                                }
                            }else{
                            echo "Introduce un archivo en formato jpg, png o gif";
                        }
                    }else{
                        echo "El fichero es demasiado grande";
                    }
                }else{
                    echo "El fichero ya existe";
                }
            }
            $conexion->close();
            ?>
        </div>
    </body>
</html>