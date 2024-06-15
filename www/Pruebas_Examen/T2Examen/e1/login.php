<?php
session_start();
// Datos de usuario para validar (en un caso real, estos datos se obtendrían de una base de datos)
$usuarios = array(
    'usuario1' => 'contraseña1',
    'usuario2' => 'contraseña2',
    // Puedes agregar más usuarios si lo deseas
);


// Obtener los datos del formulario
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["iniciar"])){
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
    }
    
}

// Validar las credenciales
if (isset($usuarios[$username]) && $usuarios[$username] === $password) {
    // Iniciar sesión
   $_SESSION["username"] = $username;
    header('Location: welcome.php');
    exit();
} else {
    // Credenciales inválidas, redirigir al formulario de inicio de sesión
    $_SESSION['error'] = 'Nombre de usuario o contraseña incorrectos';
    header('Location: index.php');
    exit();
}
