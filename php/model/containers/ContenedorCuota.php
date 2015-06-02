<?php

include_once 'php/model/containers/Contenedor.php';
include_once 'php/model/Cuota.php';

class ContenedorCuota extends Contenedor {

    function getAll() {
        $cuotas = array();
        $resultRow = $this->orm->query("SELECT * FROM cuota");
        while ($r = mysql_fetch_array($resultRow)) {
            $cuotas[] = new Cuota($r[0], $r[1], $r[2], $r[3], null);
        }
        return $cuotas;
    }

    function insertarCuota($cuota) {
        $nombre = mysql_escape_string($cuota->getDenominacion());
        $descripcion = mysql_escape_string($cuota->getDescripcion());
        $query = "INSERT INTO cuota VALUES('','" . $nombre . "','" . $descripcion . "','" . $cuota->getImporte() . "')";
        return $this->orm->query($query);
    }

}
