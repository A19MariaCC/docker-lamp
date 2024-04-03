<?php

// require 'flight/Flight.php';
require 'flight/autoload.php';

Flight::register('db','PDO', array('mysql:host=db;dbname=gestion_hoteles', 'root', 'test'));

//Al acceder a esta ruta se debe mostar todos los datos de los clientes. 
Flight::route('GET /clientes', function () {
    $sentencia = Flight::db()->prepare("SELECT * from clientes");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

//Debes mostrar la información de un único cliente a través del id.
Flight::route('GET /clientes/@id', function ($id) {
    //Debemos pasar el id en la ruta y a la función para poder obtener los datos a través del id

    $sql = "SELECT * FROM clientes WHERE id=?";
    $consulta = Flight::db()->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_ASSOC);
    if($consulta->rowCount() == 0){
        Flight::jsonp("El cliente con id: " .$id. " no se encuentra en la base de datos");
    }else{
        Flight::json($result);
    }
    

});

//POST: Se debe poder insertar un cliente en la base de datos.

Flight::route('POST /clientes', function () {
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "INSERT INTO clientes (nombre, apellidos, edad, email, telefono) VALUES(:nombre, :apellidos, :edad, :email, :telefono)";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();

    Flight::jsonp("El cliente con nombre" .$nombre." y apellidos ".$apellidos." se ha insertado correctamente");
});

//DELETE: Dado un id se debe poder eliminar un cliente.
Flight::route('DELETE /clientes/@id', function ($id) {
    //Debemos pasar el id en la ruta y a la función para poder obtener los datos a través del id

    $sql = "DELETE FROM clientes WHERE id=$id";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    
    Flight::jsonp("El registro con id:". $id. " ha sido eliminado de la base de datos correctamente");

});

//Tabla hoteles
// Al acceder a esta ruta se debe mostar todos los datos de los hoteles. 
Flight::route('GET /hoteles', function () {
    $sentencia = Flight::db()->prepare("SELECT * from hoteles");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

//Debes mostrar la información de un único hotel a través del id.
Flight::route('GET /hoteles/@id', function ($id) {
    //Debemos pasar el id en la ruta y a la función para poder obtener los datos a través del id

    $sql = "SELECT * FROM hoteles WHERE id=?";
    $consulta = Flight::db()->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $result = $consulta->fetch();
    if($consulta->rowCount() == 0){
        Flight::jsonp("El hotel con id: " .$id. " no se encuentra en la base de datos");
    }else{
        Flight::json($result);
    }
});

//Tabla reservas
//Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.
Flight::route('GET /reservas', function () {
    $sentencia = Flight::db()->prepare("SELECT * from reservas");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});


//Debes mostrar la información de un única reserva a través del id
Flight::route('GET /reservas/clientes/@id', function ($id) {
    
    $sql = "SELECT * FROM clientes,reservas WHERE reservas.id_cliente=?";
    $consulta = Flight::db()->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_ASSOC);
    if($consulta->rowCount() == 0){
        Flight::jsonp("El cliente con id: " .$id. " no tiene registrada ninguna reserva en la base de datos");
    }else{
        Flight::json($result);
    }
});
Flight::start();
