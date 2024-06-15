<?php
session_start();

function comprobarUsuario($usuario, $pass){
    if($usuario == "usuario" && $pass == "abc123."){
        $user["nombre"] = $usuario;
        $user["rol"] = 0;
        return $user;
    }elseif($usuario == "admin" && $pass == "abc1234"){
        $user["nombre"] = $usuario;
        $user["rol"] = 1;
        return $user;
    }else{
        return false;
    }
}

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $user = comprobarUsuario($usuario, $pass);
    if(!$user){
        $error = true;
    }else{
        $_SESSION["usuario"] = $user;
        header("Location: index.php");
    }
}


?>
<html>
    <body>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?> method="POST">
            Usuario: <input type="text" name="usuario">
            Contaseña: <input type="password" name="pass">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>