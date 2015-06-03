<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'php/model/Actividad.php';

class ContenedorActividad extends Contenedor{
    
    function getAll() {
        $actividades = array();
        $resultRow = $this->orm->query("SELECT * FROM actividad");
        while ($r = mysql_fetch_array($resultRow)) {
            $actividades[] = new Actividad($r);
        }
        return $actividades;
    }

    function insertarActividad($actividad) {
        $nombre = mysql_escape_string($actividad->getDenominacion());
        $descripcion = mysql_escape_string($actividad->getDescripcion());
        $query = "INSERT INTO actividad VALUES('','" . $nombre . "','" . $descripcion . "','" . $actividad->getFecha() . "','" . $actividad->getHora() . "','" . $actividad->getImporte() . "','" . $actividad->getFoto() . "')";
        return $this->orm->query($query);
    }
}
