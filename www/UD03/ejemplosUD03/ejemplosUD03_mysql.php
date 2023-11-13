<?php
/** MYSQL Orientado a objetos */
//1. Crear la conexión
$conexion = new mysqli('db','root','test', 'dbname');
//2. Comprobar la conexión

if($conexion->connect_error){
    die("Fallo en la conexión: ".$conexion->connect_error);

}
echo "Conexión correcta";

//3. Cierre de la conexión
$conexion->close();






?>