<?php
$universidad = array(
    "Facultad de Ciencias" => array(
    "Departamento de Física" => array(
    "Profesores" => array(
    "Juan Pérez",
    "Ana García"
    ),
    "Cursos" => array(
    "Mecánica",
    "Electromagnetismo"
    )
    ),
    "Departamento de Matemáticas" => array(
    "Profesores" => array(
    "Carlos Sánchez",
    "María López"
    ),
    "Cursos" => array(
    "Álgebra",
    "Cálculo"
    )
    )
    ),
    "Facultad de Letras" => array(
    "Departamento de Historia" => array(
    "Profesores" => array(
    "José Ruiz",
    "Elena Fernández"
    ),
    "Cursos" => array(
    "Historia Antigua",
    "Historia Moderna",
    )
    ),
    "Departamento de Literatura" => array(
    "Profesores" => array(
    "Miguel Hernández",
    "Laura Martínez"
    ),
    "Cursos" => array(
    "Literatura Española",
    "Literatura Universal"
    )
    )
    )
    );

    echo "<ul>";
    foreach($universidad as $clave=>$valor){
        echo "<h4>".$clave."</h4>";
       }
    

    /*imprimirProfesores($universidades){
        
        
    }*/


?>



