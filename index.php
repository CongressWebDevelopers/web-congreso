<?php
require_once('head.php');
require_once('header.php');

if(isset($_GET['page']))
    switch ($_GET['page']) {
        case "programa":
            require_once('./pages/programa.php');
            break;
        //Añadir el resto de opciones del menu
        default:
            require_once('contain.php');
    }
else
    require_once('contain.php');

require_once('footer.php');
?>
