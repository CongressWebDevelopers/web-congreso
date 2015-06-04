<?php

include_once 'php/model/containers/Contenedor.php';
include_once 'php/model/Cuota.php';
include_once 'php/model/Actividad.php';
include_once 'php/model/containers/ContenedorActividad.php';

class ContenedorCuota extends Contenedor {

    function getAll() {
        $cuotas = array();
        $resultRow = $this->orm->query("SELECT * FROM cuota");
        while ($r = mysql_fetch_array($resultRow)) {
            $lActividades = $this->getIdActividadesAsociadas($r[0]);
            $cuotas[] = new Cuota($r[0], $r[1], $r[2], $r[3], $lActividades);
        }
        return $cuotas;
    }

    function addActividadCuota($idCuota, $idActividad) {
        $query = "INSERT INTO actividadcuota VALUES(" . $idActividad . "," . $idCuota . ")";
        $result = $this->orm->query($query);
        return $result;
    }

    function getActividadesCuota($idActividades) {
        $cActividad = new ContenedorActividad();
        return $cActividad->getListaActividadesId($idActividades);
    }

    function getIdActividadesAsociadas($idCuota) {
        $idsActividades = Array();
        $query = "SELECT idActividad FROM actividadcuota WHERE idCuota='" . $idCuota . "'";
        $result = $this->orm->query($query);
        if ($result) {
            while ($r = mysql_fetch_array($result)) {
                $idsActividades[] = $r[0];
            }
        }
        return $idsActividades;
    }
    function getIdActividadesNoAsociadas($idCuota) {
        $cActividad = new ContenedorActividad();
        $idsActividades = Array();
        $idsActividades = array_diff($cActividad->getAllIds(), $this->getIdActividadesAsociadas($idCuota));
        return $idsActividades;
    }

    function insertarCuota(Cuota $cuota) {
        $nombre = mysql_escape_string($cuota->getDenominacion());
        $descripcion = mysql_escape_string($cuota->getDescripcion());
        $query = "INSERT INTO cuota VALUES('','" . $nombre . "','" . $descripcion . "','" . $cuota->getImporte() . "')";
        $this->orm->query($query);
        $cuota->setId(mysql_insert_id());
        $idCuota = $cuota->getId();
        $actividadesAsociadas = $cuota->getActividades();
        foreach ($actividadesAsociadas as $idAct) {
            $this->addActividadCuota($idCuota, $idAct);
        }
        return $cuota;
    }

}
