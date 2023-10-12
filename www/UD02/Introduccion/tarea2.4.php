<?php
echo "<h2>Introducción - Tarea 4 UD2</h2>";
//Haz una página que ejecute la función phpinfo() y que muestre las principales variables de servidor mencionadas en teoría.
echo "IP del servidor: ".$_SERVER["SERVER_ADDR"]."<br/>";
echo "Navegador del cliente: ".$_SERVER['HTTP_USER_AGENT']."<br/>";
echo "Software del servidor: ".$_SERVER['SERVER_SOFTWARE']."<br/>";
echo "Puerto del servidor: ".$_SERVER['SERVER_PORT']."<br/>";
echo "Método de respuesta: ".$_SERVER['REQUEST_METHOD']."<br/>";
echo "Localización del sitio web: ".$_SERVER['CONTEXT_DOCUMENT_ROOT']."<br/>";
echo "Archivo donde se localiza el script PHP: ".$_SERVER['SCRIPT_FILENAME']."</br>";
phpinfo();
?>