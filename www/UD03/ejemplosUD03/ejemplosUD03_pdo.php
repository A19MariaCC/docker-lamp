<?php
/** PDO */
$servername = "db";
$username = "root";
$password = "test";

try{
    //1. Conexión a la base de datos
    $conPDO = new PDO("mysql:host=$servername;dbname=dbname",$username, $password);

    //2. Forzar las excepciones
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La conexión es correcta";
}catch(PDOException $e){
    echo "Fallo en conexión:".$e->getMessage();
}

$conPDO = null;
?>