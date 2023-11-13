<?php

/** MYSQL Procedimental */
//1. Crear la conexión
$con = mysqli_connect('db','root','test', 'dbname');

//2. Comprobar la conexión
if(!$con){
    die("Fallo en la conexión: ".mysqli_connect_error());
}

echo "Conexión procedimental correcta";

//3. Cerrar conexión
mysqli_close($con);

?>