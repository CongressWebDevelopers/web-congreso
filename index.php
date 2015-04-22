<?php
require_once('head.php');
require_once('header.php');

if(isset($_GET['page']))
    switch ($_GET['page']) {
        case "programa":
            require_once('./pages/programa.php');
            break;
        //Añadir el resto de opciones del menu
        default:    //Si se escribe una página erronea nos lleva al inicio
            require_once('contain.php');
    }
else    //Si no se introduce ninguna variable por get se llama al index
    require_once('contain.php');

require_once('footer.php');
?>
