<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: login.php");
}

echo "Página principal";
?>

<html>
    <body>
        <a href="logout.php">Salir</a>
    </body>
</html>