<?php
function get_conection(){
    //1. Crear la conexión
    $conexion = new mysqli('db', 'root', 'test');
    //2. Comprobar la conexión
    if($conexion->connect_error){
        die("Fallo en la conexión: ".$conexion->connect_error);
    }

    return $conexion;
}

//Crear la base de datos
function crear_bd_tienda($conexion){
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if($conexion->query($sql)){
        echo "La base de datos ha sido creada correctamente";
    }else{
        echo "Error al crear la base de datos".$conexion->error;
    }
}

//Seleccionar la base de datos
function select_db_tienda($conexion){
    return $conexion->select_db("tienda");
}

//Crear tabla usuarios
function crear_tabla_usuarios($conexion){
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        provincia VARCHAR(50)
        )";
    
    if($conexion->query($sql)){
        echo "La tabla usuarios ha sido creada correctamente";
    }else{
        echo "Error al crear la tabla".$conexion->error;
    }
}

function insertar_usuarios($conexion, $nombre, $apellidos,$edad, $provincia){
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia)
    VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nombre, $apellidos, $edad, $provincia);
    $stmt->execute() or die($conexion->error);
    $conexion->close();
}

function listar_usuarios($conexion){
    $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios";
    return  $conexion->query($sql);
}

//Obtener datos de un usuario
function get_usuario($conexion, $id){
    $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios WHERE id=$id";
    return $conexion->query($sql);
}

 //Editar usuario
 function editar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia){
    $sql = "UPDATE usuarios SET nombre='$nombre' ,apellidos='$apellidos', edad='$edad',provincia='$provincia' WHERE id=$id;";
    return $conexion->query($sql) or die($conexion->error); 
 }

 //Eliminar usuario
 function eliminar_usuario($conexion, $id){
    $sql = "DELETE FROM usuarios WHERE id=$id";
    return $conexion->query($sql) or die($conexion->error);
 }



?>