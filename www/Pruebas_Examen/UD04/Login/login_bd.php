<?php
//Se non está autenticado pedimos credenciais
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "db";
    $username = "root";
    $password = "test";

    try{
        $conPDO = new PDO("mysql:host=$servername;dbname=miBDPDO", $username, $password);
        //Forzar excepciones
        $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "La conexión es correcta";
    }catch(PDOException $ex){
        die("Error en la conexión con la base de datos:". $ex->getMessage());
    }
     // COMPROBAMOS SE EXISTE O USUARIO, E RECOLLEMOS O PASSWORD GARDADO NA BD
    //Para instertar la contraseña usaríamos esta función
    /*$hasheado = password_hash("abc123.", PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nombre, pass) VALUES ('Sabela','".$hasheado."')";
    echo $sql;
    $conPDO->exec($sql);*/

    $consulta = "select pass from usuario where nombre=:nomeTecleado";
    $stmt = $conPDO->prepare($consulta);
    try {
        $stmt->execute(array('nomeTecleado' => $_POST['usuario']));
    } catch (PDOException $ex) {
        $conPDO = null;
        die("Erro recuperando os datos da BD: " . $ex->getMessage());
    }
    $fila=$stmt->fetch();
    if($stmt->rowCount() == 1 ) //HAI UN USUARIO
        $contrasinalBD=$fila[0];
        $passTecleado=$_POST['pass'];
        //COMPROBAMOS QUE O HASH GARDADO É COMPATIBLE CO TECLEADO.
        //TEMOS QUE COMPROBAR ANTES QUE HAI ALGÚN USUARIO:
        if ($stmt->rowCount() == 0 || !password_verify($passTecleado,$contrasinalBD)) {
            $stmt = null;
            $conProyecto = null;
            echo "Error de usuario";
        }else{
            $_SESSION["usuario"] = $_POST['usuario'];
        }
    $stmt = null;
    $conPDO = null;
}



?>


<!DOCTYPE html>
    <head>
        <title>Autenticación BD</title>
    </head>
    <body>
        <p>
        <body>
            <!-- Se va a procesar en login.php y se enviará por POST, no por GET-->
            <form action="login_bd.php" method="post">
                <!--
                    Nota: el atributo name es importante, pues lo vamos a recibir de esa manera
                    en PHP
                -->
                <input name="usuario" type="text" placeholder="Escribe tu nombre de usuario">
                <br><br>
                <input name="pass" type="password" placeholder="Contraseña">
                <br><br>
                <!--Lo siguiente envía el formulario-->
                <input type="submit" value="Iniciar sesión">
            </form>
            <?php
        if(isset($_SESSION["usuario"])){ 
            echo "Benvido, está vostede na área restrinxida";
           }
            ?>
        </p>
    </body>
</html>