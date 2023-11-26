<?php
    include("lib/base_datos.php");
    include("lib/funcionalidades.php");

    $conPDO = conexion();
    select_db_donacion($conPDO);
    $id = test_input($_GET['id']);

    //Me funciona la sentencia DELETE y elimina el donante y su histórico de donaciones, pero solo si el donante tiene donaciones
    //Si quisiésemos eliminar un potencial donante tendríamos que crear otro botón para eliminarlo entiendo
    borrar_donante($conPDO, $id);
    echo "Donante borrado y sus donaciones en la tabla de histórico";

    cerrar_conexion($conPDO);

?>