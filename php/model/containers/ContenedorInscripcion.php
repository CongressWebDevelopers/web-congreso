<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Contenedor.php';
include_once 'php/model/Inscripcion.php';

class ContenedorInscripcion extends Contenedor {

    function getInscripcionUsuario($idUsuario) {
        $query = "SELECT * FROM inscripcion WHERE idUsuario='" . $idUsuario . "'";
        $result = $this->orm->query($query);
        $inscripcion = new Inscripcion(mysql_fetch_array($result));
        $actividadesAsociadas = $inscripcion->getActividades();
        print_r($inscripcion);
        return $inscripcion;
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
        echo $query;
        return $result;
    }

}
