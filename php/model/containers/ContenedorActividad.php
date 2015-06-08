<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'php/model/Actividad.php';

class ContenedorActividad extends Contenedor {

    function getById($id) {
        $query = "SELECT * FROM actividad WHERE idActividad='" . $id . "'";
        $result = $this->orm->query($query);

        if ($result) {
            $actividad = new Actividad(mysql_fetch_array($result));
        }
        return $actividad;
    }

    function getAll() {
        $actividades = array();
        $query = "SELECT * FROM actividad";
        $resultRow = $this->orm->query($query);
        while ($r = mysql_fetch_array($resultRow)) {
            $actividades[] = new Actividad($r);
        }
        return $actividades;
    }

    function getAllIds() {
        $idsActividades = Array();
        $query = "SELECT idActividad FROM actividad";
        $result = $this->orm->query($query);
        if ($result) {
            while ($r = mysql_fetch_array($result)) {
                $idsActividades[] = $r[0];
            }
        }
        return $idsActividades;
    }

    function getListaActividadesId($listaId) {
        $lActividades = Array();
        foreach ($listaId as $id) {
            $lActividades[] = $this->getById($id);
        }
        return $lActividades;
    }

    function insertarActividad($actividad) {
        $nombre = mysql_escape_string($actividad->getDenominacion());
        $descripcion = mysql_escape_string($actividad->getDescripcion());
        $query = "INSERT INTO actividad VALUES('','" . $nombre . "','" . $descripcion . "','" . $actividad->getFecha() . "','" . $actividad->getHora() . "','" . $actividad->getImporte() . "','" . $actividad->getFoto() . "')";
        return $this->orm->query($query);
    }

    function modificarActividad($actividad) {
        $nombre = mysql_escape_string($actividad->getDenominacion());
        $descripcion = mysql_escape_string($actividad->getDescripcion());
        $query = "UPDATE actividad SET denominacion='" . $nombre . "',descripcion='" . $descripcion . "',fecha='" . $actividad->getFecha() . "',hora='" . $actividad->getHora() . "',importe='" . $actividad->getImporte() . "',foto='" . $actividad->getFoto() . "' WHERE idActividad='" . $actividad->getId() . "'";
        echo $query;
        $result = $this->orm->query($query);
        return $result;
    }

}
