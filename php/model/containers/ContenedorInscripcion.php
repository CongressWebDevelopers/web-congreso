<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Contenedor.php';
include_once 'php/model/Inscripcion.php';
include_once 'php/model/containers/ContenedorActividad.php';

class ContenedorInscripcion extends Contenedor {

    function getById($idInscripcion) {
        $query = "SELECT * FROM inscripcion WHERE idInscripcion='" . $idInscripcion . "'";
        $result = $this->orm->query($query);
        $inscripcion = new Inscripcion(mysql_fetch_array($result));
        $actividadesAsociadas = $this->getActividadesAsociadas($inscripcion->getId());
        $inscripcion->setActividades($actividadesAsociadas);
        return $inscripcion;
    }

    function getAll() {
        $query = "SELECT * FROM inscripcion";
        $resultRow = $this->orm->query($query);
        while ($r = mysql_fetch_array($resultRow)) {
            $inscripciones[] = new Inscripcion($r);
        }
        return $inscripciones;
    }

    function getInscripcionUsuario($idUsuario) {
        $query = "SELECT * FROM inscripcion WHERE idUsuario='" . $idUsuario . "'";
        $result = $this->orm->query($query);
        $inscripcion = new Inscripcion(mysql_fetch_array($result));
        $actividadesAsociadas = $this->getActividadesAsociadas($inscripcion->getId());
        $inscripcion->setActividades($actividadesAsociadas);
        return $inscripcion;
    }

    function getActividadesAsociadas($idInscripcion) {
        $query = "SELECT idActividad FROM inscripcionactividad WHERE idInscripcion='" . $idInscripcion . "'";
        $result = $this->orm->query($query);
        $idsActividades = Array();
        while ($r = mysql_fetch_array($result)) {
            $idsActividades[] = $r[0];
        }
        return $idsActividades;
    }

    function insertarInscripcion($inscripcion, $idUsuario, $actividadesAsociadas = null) {
        $nombre = mysql_escape_string($inscripcion->getNombre());
        $centro = mysql_escape_string($inscripcion->getCentro());
        $telefono = mysql_escape_string($inscripcion->getTelefono());
        $query = "INSERT INTO inscripcion VALUES('','" . $nombre . "','" . $centro . "','" . $telefono . "','" . $inscripcion->getCuota() . "','" . $inscripcion->getHotel() . "','" . $inscripcion->getFechaSalida() . "','" . $inscripcion->getFechaEntrada() . "','" . $idUsuario . "' )";
        $result = $this->orm->query($query);
        $inscripcion->setId(mysql_insert_id());
        $idInscripcion = $inscripcion->getId();
        $inscripcion->setActividades($actividadesAsociadas);
        foreach ($actividadesAsociadas as $idAct) {
            $this->addActividadInscripcion($idInscripcion, $idAct);
        }
        if ($result)
            return true;
        else
            echo mysql_error();
    }

    function estaInscrito($idUsuario) {
        $idUsuario = mysql_escape_string($idUsuario);
        $query = "SELECT idInscripcion from inscripcion WHERE idUsuario =" . $idUsuario;
        $result = $this->orm->queryArray($query);
        $result = ($result) ? true : false;
        return $result;
    }

    function addActividadInscripcion($idInscripcion, $idActividad) {
        $query = "INSERT INTO inscripcionactividad VALUES(" . $idInscripcion . "," . $idActividad . ")";
        $result = $this->orm->query($query);
        return $result;
    }

    function reservarHotel($idInscripcion, $idHotel, $fechaEntrada, $fechaSalida) {
        $url = "rest/API-rest.php";
        $data = json_encode(Array("idInscripcion" => $idInscripcion, "idHotel" => $idHotel, "fechaEntrada" => $fechaEntrada, "fechaSalida" => $fechaSalida));
        if (http_post_data($url, $data)) {
            $query = "UPDATE inscripcion SET(hotel='" . $idHotel . "',fechaSalida='" . $fechaSalida . "',fechaEntrada='" . $fechaEntrada . "') WHERE idInscripcion =" . $idInscripcion . "'";
            $this->orm->query($query);
            echo mysql_error();
            return true;
        } else {
            return false;
        }
    }

}
