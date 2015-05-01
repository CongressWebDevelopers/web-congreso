<?php
require_once('head.php');
require_once('header.php');

if(isset($_GET['page']))
    switch ($_GET['page']) {
        case "programa":
	    if(isset($_GET['programa'])){
	        switch ($_GET['programa']) {
		    case "agiles":
            	        require_once('./pages/programas/agiles.php');
		    break;
	            case "ifml":
            	        require_once('./pages/programas/ifml.php');					
    		    break;
		    case "prince":
            	        require_once('./pages/programas/prince.php');					
		    break;		    		
		    case "windows":
            	        require_once('./pages/programas/windows.php');					
		    break;
		    case "unix":
            	        require_once('./pages/programas/unix.php');					
		    break;
		    case "ios":
            	        require_once('./pages/programas/ios.php');					
		    break;
		    case "visualizacion":
            	        require_once('./pages/programas/visualizacion.php');
		    break;
	            case "digitalizacion":
            	        require_once('./pages/programas/digitalizacion.php');					
    		    break;
		    case "realidad_aumentada":
            	        require_once('./pages/programas/realidad_aumentada.php');					
		    break;		    		
		    case "paralela":
            	        require_once('./pages/programas/paralela.php');					
		    break;
		    case "distribuidos":
            	        require_once('./pages/programas/distribuidos.php');					
		    break;
		    case "tiempo_real":
            	        require_once('./pages/programas/tiempo_real.php');					
		    break;
		    case "db_multidimensionales":
            	        require_once('./pages/programas/db_multidimensionales.php');
		    break;
	            case "db_oo":
            	        require_once('./pages/programas/db_oo.php');					
    		    break;
		    case "db_distribuidos":
            	        require_once('./pages/programas/db_distribuidos.php');					
		    break;		    		
		    case "haptica":
            	        require_once('./pages/programas/haptica.php');					
		    break;
		    case "wearables":
            	        require_once('./pages/programas/wearables.php');					
		    break;
		    case "realidad_virtual":
            	        require_once('./pages/programas/realidad_virtual.php');					
		    break;
		    case "procesadores":
            	        require_once('./pages/programas/procesadores.php');					
		    break;
		    case "traductores":
            	        require_once('./pages/programas/traductores.php');					
		    break;
		    case "habla":
            	        require_once('./pages/programas/habla.php');					
		    break;
	            default:    //Si se escribe una página erronea nos lleva al programa general
                        require_once('./pages/programa.php');
	        }
		require_once('./modulos/contexmenu.php');
	    }else    //Si no se introduce ninguna variable por get nos lleva al programa general
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
