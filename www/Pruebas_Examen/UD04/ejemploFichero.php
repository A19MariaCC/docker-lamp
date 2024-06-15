<html>
    <body>
        <form action="ejemploFichero.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="fichero" id="fichero">
            <input type="submit" name="enviar" id="enviar">
        </form>
    </body>
</html>

<?php

$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fichero"]["name"]);

//Tipo de fichero
$tipo_fichero = pathinfo($target_file, PATHINFO_EXTENSION);

if(!file_exists($target_file)){
    if($_FILES["fichero"]["size"]>50000){
        if($tipo_fichero=="png" || $tipo_fichero=="jpg"){
            if(move_uploaded_file($_FILES["fichero"]["tmp_name"],$target_file )){
                echo "Fichero subido correctamente";
            }else{
                "Error al subir el fichero";
            }

        }else{
            echo "El fichero no es png o jpg";
        }

    }else{
        echo "El fichero es demasiado grande";
    }
}else{
    echo "El fichero ya existe";
}



?>