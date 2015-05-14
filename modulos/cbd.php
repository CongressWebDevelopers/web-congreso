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
class ORM {

    private $conexion;
    private $abreBD;
    private $servidor;
    private $usuario;
    private $contrasena;
    private $lastQuery = null;

    function ORM($servidor, $usuario, $contrasena, $BDconectar) {
        $this->$conexion = mysql_connect($this->servidor, $this->usuario, $this->contrasena)
                or exit('No se pudo conectar con el servidor MySQL');
        $this->abreBD = mysql_select_db('SIBW_bd', $conexion);
        if (!$this->abreBD) {
            die('No se pudo abrir la base de datos.Error: ' .
                    mysql_error());
        }
    }

    function query($query) {
        $query = mysql_escape_string($this->conexion, $query);
        return $this->lastQuery = mysql_query($query, $this->conexion);
    }

    function getLastQueryResult() {
        return $this->lastQueryResult;
    }

    function queryArray($query) {
        return mysql_fetch_array(query($query));
    }
    
    

}

// Ejecutamos una consulta
$seleccion = 'SELECT * FROM Productos';
$resultado = mysql_query($seleccion, $conexion);
// Averiguamos cuántas filas ha devuelto la consulta
$numFilas = mysql_num_rows($resultado);
