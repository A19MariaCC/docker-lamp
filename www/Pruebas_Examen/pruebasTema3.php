<?php
/* MYSQL Orientado a obtejos */
//Creo la conexión

//$conexion = new mysqli('db', 'root', 'test','dbname');

//1. Comprobar la conexión
//if($conexion -> connect_error){
    //die("Fallo en la conexión: ".$conexion->connect_error);
//}

//echo "Conexión correcta";

//3. Crear base de datos
/*$sql = "CREATE DATABASE miBDOO";
if($conexion->query($sql)){
    echo "La base de datos ha sido creada correctamente";
}else{
    echo "Error al crear la base de datos".$conexion->error;
}*/
//4. Cambiar de base de datos
//$conexion->select_db("miBDOO");
//echo "Cambio de base de datos";


//5. Crear tabla
/*$sql = "CREATE TABLE clientes(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )";
if($conexion->query($sql)){
    echo "La tabla clientes ha sido creada correctamente";
}else{
    echo "Error al crear la tabla".$conexion->error;
}
    */
//6. Insertar datos
/*$sql = "INSERT INTO clientes (nombre, apellido, email) VALUES ('Sabela', 'Sobrino', 'sabela@iessanclemente.net')";
if($conexion->query($sql )){
    echo "Se ha creado un nuevo registro";
}else{
    echo "No se ha podido crear el nuevo registro ".$conexion->error;
}*/

//7. Consultas preparadas
//7.1 Preparar la consulta
/*$stmt = $conexion->prepare($sql = "INSERT INTO clientes (nombre, apellido, email) 
VALUES (?, ?, ?)");
$stmt->bind_param('sss', $nombre, $apellido, $email);
$nombre = 'Alejandro';
$apellido = 'García';
$email = 'alejandro@edu.es';
$stmt->execute();
$stmt->close();
*/

//8. Seleccionar registros
/*$sql = "SELECT id, nombre, apellido FROM clientes";
$resultados = $conexion->query($sql);

if($resultados->num_rows>0){
    while($row = $resultados->fetch_assoc()){
        echo $row["id"]." - ".$row["nombre"]." - ".$row["apellido"]."<br>";
    };
}else{
    echo "No se encuentran registros en la tabla clientes";
}
//9. Cerrar conexión
$conexion->close();
*/





/* MYSQL Procedimental */
//1. Crear conexión
//$con = mysqli_connect('db', 'root', 'test','dbname');

//2 Comprobar conexión
//if(!$con){
    //die("Fallo en la conexión: ".mysqli_connect_error());
//}
 //echo "La conexión procedimental es correcta";

 //3. Crear la base de datos
 /*$sql = "CREATE DATABASE miBDProcedimental";

 if(mysqli_query($con, $sql)){
    echo "Base de datos creada correctamente";
 }else{
    echo "Error creando la base de datos ".mysqli_error($con);
 }*/

 //4. Cambiar de base de datos
   // mysqli_select_db($con, "miBDProcedimental");

 //5. Crear tabla
    /*$sql = "CREATE TABLE clientes(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )";
    if(mysqli_query($con, $sql)){
        echo "Se ha creado la tabla correctamente";
    }else{
        echo "Error creando la tabla ".mysqli_error($con);
    }*/
 //6. Insertar datos
 /*$sql = "INSERT INTO clientes (nombre, apellido, email) 
 VALUES ('Sabela', 'Sobrino', 'sabela@iessanclemente.net')";
 if(mysqli_query($con, $sql)){
    echo "Se insertó un registro";
 }else{
    echo "No se ha podido insertar el registro ".mysqli_error($con);
 }
    
    $sql = "SELECT id, nombre, apelllido FROM clientes";
    $resultados = mysqli_query($con, $sql);
    if(mysqli_num_rows($resultados) > 0){
        while($row = mysqli_fetch_assoc($resultados)){
            echo $row['id']." - ".$row['nombre']." - ".$row['apellido']."<br>";
        }

    }else{
        echo "No hay resultados";
    }

 
 //7. Cierre de la conexión
 mysqli_close($con);
 
*/
 

 /* Con PDO */
$servername = "db";
$username = "root";
$password = "test";

try{
    //1. Conexión a la base de datos
    $conPDO = new PDO("mysql:host=$servername;dbname=miBDPDO",$username,$password);

    //2. Forzar las excepciones 
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La conexión fue correcta";
    //3. Crear la base de datos
    //$sql = "CREATE DATABASE miBDPDO";
    //5. Creamos la tabla
    /*$sql = "CREATE TABLE clientes(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellido VARCHAR(30) NOT NULL,
        email VARCHAR(50)
        )";
        echo "Tabla creada correctamente";
        */
    //$sql = "INSERT INTO clientes (nombre, apellido, email) 
        //VALUES ('Sabela', 'Sobrino', 'sabela@iessanclemente.net')";
    //$conPDO->exec($sql);
    //echo "Se insertó un registro correctamente";
   /* $stmt = $conPDO->prepare("INSERT INTO clientes (nombre, apellido, email) 
    VALUES (:nombre, :apellido, :email)");
    $stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":apellido", $apellido);
    $stmt->bindParam(":email", $email);

    $nombre = "Juan";
    $apellido = "Otero";
    $email = "juan@gmail.com";
    $stmt->execute();

    echo "Los datos han sido insertados correctamente";
    */

    $stmt = $conPDO->prepare("SELECT id, nombre, apellido FROM clientes");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$valor){
        echo $valor["id"]." - ".$valor["nombre"]." - ".$valor["apellido"]."<br>";
    }
}catch(PDOException $e){
    echo "Fallo en la conexión ".$e->getMessage();

}

//6. Cierre de la conexión
$conPDO = null;






?>