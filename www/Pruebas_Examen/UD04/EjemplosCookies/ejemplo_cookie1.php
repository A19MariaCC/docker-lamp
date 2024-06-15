<?php
$cookie_name = "usuario";
$cookie_value = "Sabela";
setcookie("usuario", $cookie_value, time() + (86400 * 30), "/");

?>
<html>
    <body>
        <?php
            if(!isset($_COOKIE[$cookie_name])){
                echo "La cookie con nombre". $cookie_name. " no está definida";
            }else{
                echo "La cookie ".$cookie_name." está definida!<br/>";
                echo "Su valor es: ".$_COOKIE[$cookie_name];
                //echo "El valor de la cookie con nombre usuario es: ".$_COOKIE["usuario"];
            }

            if(count($_COOKIE)>0){
                echo "Las cookies están habilitadas";
            }else{
                echo "Las cookies no están habilitadas";
            }

        ?>
    </body>
</html>