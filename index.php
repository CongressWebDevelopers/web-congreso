<?php
require_once('head.php');
require_once('header.php');

if(isset($_GET['page']))
    switch ($_GET['page']) {
        case "programa":
            require_once('./pages/programa.php');
            break;
	case "patrocina":
            require_once('./pages/patrocina.php');
            break;
	case "inscripcion":
            require_once('./pages/inscripcion.php');
            break;
	case "alhambra":
            require_once('./pages/alhambra.php');
            break;
	case "sierra_nevada":
            require_once('./pages/sierra_nevada.php');
            break;
	case "etsiit":
            require_once('./pages/etsiit.php');
            break;
	case "granada":
            require_once('./pages/granada.php');
            break;
	case "contacto":
            require_once('./pages/contacto.php');
            break;
        default:    //Si se escribe una página erronea nos lleva al inicio
            require_once('contain.php');
    }
else    //Si no se introduce ninguna variable por get se llama al index
    require_once('contain.php');

require_once('footer.php');
?>
