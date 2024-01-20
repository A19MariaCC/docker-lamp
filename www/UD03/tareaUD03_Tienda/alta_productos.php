<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php
        include("lib/base_datos.php"); 
        include("lib/funciones.php");
        //Conexión
        $conexion = get_conexion();
        //Seleccionar bd
        select_db_tienda($conexion);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <h1>Alta productos</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <p><label for="nombreProd">Nombre del producto:</label>
        <input type="text" name="nombreProd"></p>
        <p><label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion"></p>
        <p><label for="precio">Precio:</label>
        <input type="text" name="precio"></p>
        <p><label for="unidades">Unidades:</label>
        <input type="text" name="unidades"></p>
        <p><label for="imagen">Subir imagen:</label>
        <!--Modifica el ejercicio anterior para que se pueda subir más de una imagen.-->
        <!-- Añadimos la propiedad multiple para poder subir más de un archivo -->
        <input type="file" name="imagen[]" id="imagen[]" multiple=""></p>
        <p><input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST['nombreProd']) && is_string($_POST['nombreProd'])){
                $nombreProducto = filtrado($_POST['nombreProd']);
            }else{
                echo "Es necesario informar del nombre. Campo obligatorio";
            }
            if(!empty($_POST['descripcion']) && is_string($_POST['descripcion'])){
                $descripcion = filtrado($_POST['descripcion']);
            }else{
                echo "Es necesario informar la descripción del producto. Campo obligatorio";
            }
            if(!empty($_POST['precio']) && is_numeric($_POST['precio'])){
                $precio = filtrado($_POST['precio']);
            }else{
                echo "Es necesario informar del precio. Solo se permiten valores numéricos";
            }
            if(!empty($_POST['unidades']) && is_numeric($_POST['unidades'])){
                $unidades = filtrado($_POST['unidades']);
            }else{
                echo "Introduce el número de unidades. Solo se permiten valores numéricos";
            }  
        }
            
        

        //para subir las imagenes
        //Al modificar el ejercicio para poder subir más de una imagen al servidor, me salta un error que se supera el tamaño permitido para el archivo
        foreach($_FILES["imagen"]['tmp_name'] as $key => $tmp_name){
            if($_FILES["imagen"]["name"][$key]) {
                $foto = $_FILES["imagen"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["imagen"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo  
                $targetDir = "archivos/";
            if(isset($foto) && isset($_POST['enviar'])){
                $target_file = $targetDir.basename($foto);
                $tipo_fichero = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if(!empty($_FILES['imagen']['name']) && !file_exists($target_file)){
                    if(comprobaTamanho($_FILES["imagen"]["size"])){
                        if(compruebaExtension($tipo_fichero)){
                            if(move_uploaded_file($_FILES["imagen"]["tmp_name"],$target_file)){
                                echo "El fichero ".htmlspecialchars(basename( $_FILES["imagen"]["name"]))." se ha subido correctamente al servidor";
                                //para subir la imagen a la base de datos
                                $image = addslashes(file_get_contents($target_file));
                                echo "<br><br>El archivo es ".$targetDir.$target_file;
                                alta_producto($conexion, $nombreProducto, $descripcion, $precio, $unidades, $image);
                            
                            }else{
                                echo "No se ha podido subir el archivo";
                            }
                        }else{
                            echo "Introduce un archivo en formato jpg, png o gif";
                        }                
                    }else{
                        echo "El archivo supera el tamaño máximo permitido";
                    }
            }else{
                echo "El fichero ya existe";
            }
            }
            }
        }
    ?>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
    <?php
        cerrar_conexion($conexion);
    ?>
</body>
</html>