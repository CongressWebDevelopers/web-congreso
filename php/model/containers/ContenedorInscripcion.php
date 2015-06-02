<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Contenedor.php';
include_once 'php/model/Inscripcion.php';

class ContenedorInscripcion extends Contenedor {

    function getInscripcionID($id) {
        $resultRow = $this->orm->queryArray("SELECT * FROM inscripcion WHERE idInscripcion = " . $id);
        $congresista = new Inscripcion($resultRow);
        return $congresista;
    }

    function getAll() {
        $congresistas = array();
        $resultRow = $this->$orm->queryArray("SELECT * FROM inscripcion");
        foreach ($resultRow as $congresista) {
            $congresistas[] = new Inscripcion($congresista);
        }
    }

    function insertarInscripcion($inscripcion, $idUsuario) {
        $nombre = mysql_escape_string($inscripcion->getNombre());
        $centro = mysql_escape_string($inscripcion->getCentro());
        $telefono = mysql_escape_string($inscripcion->getTelefono());
        $query = "INSERT INTO inscripcion VALUES('','" . $nombre . "','" . $centro . "','" . $telefono . "','". $inscripcion->getCuota() . "','" . $inscripcion->getHotel() . "','" . $inscripcion->getFechaSalida() . "','" . $inscripcion->getFechaEntrada() . "','" . $idUsuario . "' )";
        echo $query;
        $result = $this->orm->query($query);
        if($result)
            return true;
        else
            echo mysql_error();
    }

    function estaInscrito($idUsuario) {
        $idUsuario = mysql_escape_string($idUsuario);
        $query = "SELECT idInscripcion from inscripcion WHERE idUsuario =" . $idUsuario;
        $result = $this->orm->query($query);
        $result = ($result) ? true : false;
        return $result;
    }

}
