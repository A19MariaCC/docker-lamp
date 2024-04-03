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

//Se podrá modificar de un cliente sus apellidos, edad, email y teléfono.
Flight::route('PUT /clientes/@id', function ($id) {

    //$id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;
    
    $sql ="UPDATE clientes set apellidos=?, edad=?, telefono=?, email=? WHERE id=?";
    //Preparamos la sentencia sql
    $sentencia = Flight::db()->prepare($sql);
    //Preparamos los datos obtenidos de la sentencia 
    $sentencia->bindParam(1, $apellidos);
    $sentencia->bindParam(2, $edad);
    $sentencia->bindParam(3, $telefono);
    $sentencia->bindParam(4, $email);
    $sentencia->bindParam(5, $id);
    //Ejecutamos la sentencia UPDATE
    $sentencia->execute();
   
    //Devolvememos en formato JSON parado una sentencia que nos indique que todo fue correctamente. 
    Flight::jsonp("Cliente con id: ".$id. "ha sido actualizado correctamente");
   
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

//Se debe poder insertar un hotel en la base de datos.
Flight::route('POST /hoteles', function () {
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;
    

    $sql = "INSERT INTO hoteles (hotel, direccion, telefono, email) VALUES(:hotel, :direccion, :telefono, :email)";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':hotel', $hotel);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    Flight::jsonp("El hotel con nombre " .$hotel." se ha insertado correctamente en la base de datos");
});

//Dado un id se debe poder eliminar un hotel.
Flight::route('DELETE /hoteles/@id', function ($id) {
    $sql = "DELETE FROM hoteles WHERE id=$id";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    
    Flight::jsonp("El hotel con id:". $id. " ha sido eliminado de la base de datos correctamente");

});

//Se podrá modificar de un hotel sus direccion, email y teléfono.
Flight::route('PUT /hoteles/@id', function ($id) {
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $sql ="UPDATE hoteles set direccion=?,telefono=?, email=? WHERE id=?";
    //Preparamos la sentencia sql
    $sentencia = Flight::db()->prepare($sql);
    //Preparamos los datos obtenidos de la sentencia 
    $sentencia->bindParam(1, $direccion);
    $sentencia->bindParam(2, $telefono);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $id);
    //Ejecutamos la sentencia UPDATE
    $sentencia->execute();
   
    //Devolvememos en formato JSON parado una sentencia que nos indique que todo fue correctamente. 
    Flight::jsonp("Hotel con id: ".$id. " ha sido actualizado correctamente");
   
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

//Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.
Flight::route('POST /reservas/clientes/@id_cliente', function($id_cliente){
    $id_hotel = Flight::request()->data->id_hotel;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida =Flight::request()->data->fecha_salida;

    $fecha_reserva = date("Y-n-d");

    $sql = "INSERT INTO reservas (id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida) VALUES (?,?,?,?,?)";
    $consulta = Flight::db()->prepare($sql);
    $consulta->bindParam(1,$id_cliente);
    $consulta->bindParam(2,$id_hotel);
    $consulta->bindParam(3,$fecha_reserva);
    $consulta->bindParam(4,$fecha_entrada);
    $consulta->bindParam(5,$fecha_salida);
    $consulta->execute();

    Flight::jsonp("La reserva para el cliente con id_cliente ".$id_cliente. " en el hotel con id: ".$id_hotel." ha sido realizada con éxito");

});

//Dado un id se debe poder eliminar una reserva.
Flight::route('DELETE /reservas/@id', function ($id_reserva) {
    $sql = "DELETE FROM reservas WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id_reserva);
    $stmt->execute();
    
    Flight::jsonp("La reserva con id de reserva:". $id_reserva. " ha sido eliminada de la base de datos correctamente");

});

//Se podrá modificar de una reserva la fecha de entrada y la fecha de salida
Flight::route('PUT /reservas/@id', function($id){
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    $sql = "UPDATE reservas SET fecha_entrada=?, fecha_salida=? WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1,$fecha_entrada);
    $stmt->bindParam(2,$fecha_salida);
    $stmt->bindParam(3,$id);
    $stmt->execute();

    Flight::jsonp("La reserva con id: ".$id." ha sido modificada correctamente en la base de datos");
});

Flight::start();
