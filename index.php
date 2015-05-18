<?php

/*
 * ORM
 * Controla las conexiónes a BD y las distintas consultas mediante funciones.
 * Conectar con el servidor y seleccionar la base de datos
 * Ejecutar una instrucción de SQL
 * Procesar la información
 * Cerrar la conexión con el servidor
 */

/**
 * 
 * @param type $servidor String con el nombre del servidor a conectar
 * @param type $usuario String con el usuario del servidor a conectar
 * @param type $contrasena String con la contrasena del servidor a conectar
 * @return type id de conexión si ha sido satisfactorio y false si ha dado error.
 */
include_once './php/database/configDB.php';

class ORM {

    private $conexion;
    private $abreBD;
    private $lastQuery = 'null';

    function ORM() {
	    $this->conexion = mysql_connect(DB_HOST, DB_USER, DB_PASS) or exit('No se pudo conectar con el servidor MySQL');
        $this->abreBD = mysql_select_db(DB_NAME, $this->conexion);
        if (!$this->abreBD) {
            die('No se pudo abrir la base de datos.Error: '.mysql_error());
        }
    }

    function query($query) {
        $query = mysql_real_escape_string($query ,$this->conexion); 
        $this->lastQuery = mysql_query($query, $this->conexion);
    }

    function getLastQueryResult() {
        return $this->lastQuery;
    }

    function queryArray() {
        return mysql_fetch_array($this->lastQuery);
    }

    function queryAssoc($query) {
        return mysql_fetch_assoc(query($query));
    }
    
    function rows() {
        return mysql_num_rows($this->getLastQueryResult());
    }

    function close() {
        mysql_close($this->conexion);
    }

}


//include './php/database/ORM.php';

require_once('head.php');
require_once('header.php');

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case "programa":
            if (isset($_GET['programa'])) {
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
            } else    //Si no se introduce ninguna variable por get nos lleva al programa general
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
} else {    //Si no se introduce ninguna variable por get se llama al index
    require_once('contain.php');
}

require_once('footer.php');
?>
