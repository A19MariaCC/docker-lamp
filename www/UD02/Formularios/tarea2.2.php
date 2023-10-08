<?php
/*
Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */
   
if(isset($_POST['opcion']) && (isset($_POST['cantidad']))){
    $opcion = $_POST['opcion'];
    $cantidad = $_POST['cantidad'];
}

if(isset($_POST['enviar'])){
    switch($opcion){
        case "cocacola":
            $precio = $cantidad * 1;
            echo "Pediste $cantidad botellas de Coca Cola. Precio total a pagar: $precio Euros";
            break;
        case "pepsi":
            $precio = $cantidad * 0.80;
            echo "Pediste $cantidad botellas de Pepsi Cola. Precio total a pagar: $precio Euros";
            break;
        case "fanta":
            $precio = $cantidad * 0.90;
            echo "Pediste $cantidad botellas de Fanta Naranja. Precio total a pagar: $precio Euros";
            break;
        case "trina":
            $precio = $cantidad * 1.10;
            echo "Pediste $cantidad botellas de Trina de Manzana. Precio total a pagar: $precio Euros";
            break;
    }
}


?>