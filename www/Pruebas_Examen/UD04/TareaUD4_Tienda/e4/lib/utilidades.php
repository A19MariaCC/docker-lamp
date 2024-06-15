<?php

function test_input($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function get_visitas()
{
    if (!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    } else {
        $_SESSION['count']++;
    }
      
    return "Visita número:" .  $_SESSION['count'];
}
function get_mensajes_html_format($mensajes)
{
    $resultado = "";

    if (count($mensajes) > 0) {
        foreach ($mensajes as $mensaje) {
            if ($mensaje[0] == "error") {
                $resultado .= '<div class="alert alert-danger" role="alert">' . $mensaje[1] . '</div>';
            } elseif ($mensaje[0] == "success") {
                $resultado .= '<div class="alert alert-success" role="alert">' . $mensaje[1] . '</div>';
            }
        }
    }

    return $resultado;
}

function imprimir_idioma()
{
    if (!isset($_COOKIE['idioma'])) {
        echo "Selecciona un idioma";
    } else {
        switch ($_COOKIE['idioma']) {
            case "es":
                echo "<p>Bienvenido/a a mi página.</p>";
                break;
            case "gal":
                echo "<p>Benvido/a a miña páxina.</p>";
                break;
            case "en":
                echo "<p>Wellcome to my page.</p>";
                break;
        }
    }
}
function compruebaExtension($archivo){
    if($archivo != "jpg" && $archivo != "png" && $archivo != "jpeg" && $archivo != "gif"){
        return false;
    }else{
        return true;
    }
}

function compruebaTamanho($archivo){
    if($archivo<500000){
        return true;
    }else{
        return false;
    }
}

function esValidoFicheroMultiple($archivos, $index, $targetDir = "archivos/"){
    $mensajes = array();
    $targetFile = $targetDir.basename($archivos["name"]["index"]);
    $extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $nombre = $archivos["name"][$index];
    $tamanho = $archivos["size"][$index];
    $archivo_temporal = $archivos["tmp_name"][$index];

    if(!file_exists($targetFile)){
        if(compruebaTamanho($tamanho)){
            if(compruebaExtension($extension)){
                return true;
            }else{
                $mensajes[] = array("error", "Introduce un archivo en formato jpg, png o gif");
            }
        }else{
            $mensajes[] = array("error", "El fichero es demasiado grande");
        }
    }else{
        $mensajes[] = array("error", "El fichero ya existe");
    }

    return $mensajes;
}

function subirFicheroMultiple($archivos, $index, $targetDir = "archivos/"){
    $targetFile= $targetDir.basename($archivos["name"][$index]);
    return $resultado = move_uploaded_file($archivos["tmp_name"][$index], $targetFile);
}

function is_logged()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nombre'])) {
        return true;
    } else {
        return false;
    }
}

function get_logged_name()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nombre'])) {
        return $_SESSION['nombre'];
    } else {
        return "Anónimo";
    }
}
