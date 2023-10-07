<?php
// Necesitamos almacenar la siguiente información en un array multidimensional:
    /*
    John
        email: john@demo.com
        website: www.john.com
        age: 22
        password: pass
    Anna
        email: anna@demo.com
        website: www.anna.com
        age: 24
        password: pass
    Peter
        email: peter@mail.com
        website: www.peter.com
        age: 42
        password: pass
    Max
        email: max@mail.com
        website: www.max.com
        age: 33
        password: pass
    */

    // Creamos el array multidimensional
    $usuarios = array(
        'John' => array(
            'email' => "john@demo.com",
            'website' => "www.john.com",
            'age' => 22,
            'password' => "pass"
        ),
        'Anna' => array(
            'email' => "anna@demo.com",
            'website' => "www.anna.com",
            'age' => 24,
            'password' => "pass"
        ),
        'Peter' => array(
            'email' => "peter@mail.com",
            'website' => "www.peter.com",
            'age'=>42,
            'password'=>"pass"
        ),
        'Max' => array(
            'email' => "max@mail.com",
            'website' => "www.max.com",
            'age' => 33,
            'password' => "pass"
        )
    );
 
 /* Procedemos a recorrer el array. al ser un array multidimensional debemos
 utilizar dos foreach, en el primero nos posicionamos
 en el elemento inicial, que en este caso establecemos los nombres de los usuarios.
 En el segundo array es donde vamos a establecer los valores, pero de esta vez
 obtenemos los valores a partir de las claves.
 */
 foreach($usuarios as $usuario => $datos) {
     echo "<h4>$usuario</h4>";
     foreach($datos as $clave => $valor) {
         echo "<p>$clave: $valor</p>";
     }
 }



?>