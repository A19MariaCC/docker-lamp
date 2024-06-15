<?php

// Destruir la sesión correctamente
session_start();  
// Destruir todas las variables de sesión
session_unset();  
//$_SESSION = array();
// Destruir la sesión
session_destroy();	
//setcookie('usuario', 123, time() - 1000); 

// Redirigir al formulario de inicio de sesión
header('Location: index.php');
exit();