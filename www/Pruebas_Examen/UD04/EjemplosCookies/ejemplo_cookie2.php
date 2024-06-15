<?php
$cookie_value = "Julia";
setcookie("usuario", $cookie_value, time() + (86400 * 30), "/");

?>
<html>
    <body>
        <?php
            if(!isset($_COOKIE["usuario"])){
                echo "La cookie con nombre usuario no está definida";
            }else{
                echo "El valor de la cookie con nombre usuario es: ".$_COOKIE["usuario"];
            }

        ?>
    </body>
</html>