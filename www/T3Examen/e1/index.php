<?php

// require 'flight/Flight.php';
require 'flight/autoload.php';

Flight::register('db','PDO', array('mysql:host=db;dbname=classicmodels', 'root', 'test'));

//Al acceder a esta ruta se debe mostar todos los datos de la tabla
Flight::route('GET /customers', function () {
    $sentencia = Flight::db()->prepare("SELECT * from customers");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Debes mostrar la información de un único customer a través de su identificador
Flight::route('GET /customers/@customerNumber', function ($customerNumber) {
    //Debemos pasar el id en la ruta y a la función para poder obtener los datos a través del id

    $sql = "SELECT * FROM customers WHERE customerNumber=?";
    $consulta = Flight::db()->prepare($sql);
    $consulta->bindParam(1, $customerNumber);
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_ASSOC);
    if($consulta->rowCount() == 0){
        Flight::jsonp("El cliente con id: " .$customerNumber. " no se encuentra en la base de datos");
    }else{
        Flight::json($result);
    }
});


//POST: POST: Se debe poder insertar un customer en la base de datos
Flight::route('POST /customers', function () {
    $customerNumber = Flight::request()->data->customerNumber;
    $customerName = Flight::request()->data->customerName;
    $contactLastName = Flight::request()->data->contactLastName;
    $contactFirstName = Flight::request()->data->contactFirstName;
    $phone = Flight::request()->data->phone;
    $addressLine1 = Flight::request()->data->addressLine1;
    $addressLine2 = Flight::request()->data->addressLine2;
    $city = Flight::request()->data->city;
    $state = Flight::request()->data->state;
    $postalCode = Flight::request()->data->postalCode;
    $country = Flight::request()->data->country;
    $salesRepEmployeeNumber = Flight::request()->data->salesRepEmployeeNumber;
    $creditLimit = Flight::request()->data->creditLimit;

    $sql = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, 'state', postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES(:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':customerNumber', $customerNumber);
    $stmt->bindParam(':customerName', $customerName);
    $stmt->bindParam(':contactLasttName', $contactLastName);
    $stmt->bindParam(':contactFirstName', $contactFirstName);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':addressLine1', $addressLine1);
    $stmt->bindParam(':addressLine2', $addressLine2);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':postalCode', $postalCode);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':salesRepEmployeeNumber', $salesRepEmployeeNumber);
    $stmt->bindParam(':creditLimit', $creditLimit);
    $stmt->execute();

    Flight::jsonp("El cliente con nombre" .$customerName." y apellido ".$contactFirstName." se ha insertado correctamente");
});

// DELETE: Dado un id se debe poder eliminar un customer
Flight::route('DELETE /customers/@id', function ($customerNumber) {
    //Debemos pasar el id en la ruta y a la función para poder obtener los datos a través del id

    $sql = "DELETE FROM customers WHERE customerNumber=$customerNumber";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $customerNumber);
    $stmt->execute();
    
    Flight::jsonp("El registro con id:". $customerNumber. " ha sido eliminado de la base de datos correctamente");

});

//PUT: Se podrá modificar de un customer su campo phone.

Flight::route('PUT /customers/@customerNumber', function ($customerNumber) {

    //$id = Flight::request()->data->id;
    $phone = Flight::request()->data->phone;
    
    $sql ="UPDATE customers set phone=? WHERE customerNumber=?";
    //Preparamos la sentencia sql
    $sentencia = Flight::db()->prepare($sql);
    //Preparamos los datos obtenidos de la sentencia 
    $sentencia->bindParam(1, $phone);
    $sentencia->bindParam(2, $customerNumber);
    //Ejecutamos la sentencia UPDATE
    $sentencia->execute();
   
    //Devolvememos en formato JSON parado una sentencia que nos indique que todo fue correctamente. 
    Flight::jsonp("Cliente con id: ".$customerNumber. "ha sido actualizado correctamente");
   
   });


Flight::start();
