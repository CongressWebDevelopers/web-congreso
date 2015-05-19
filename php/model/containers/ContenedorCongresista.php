<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'php/database/ORM.php';

class ContenedorCongresista {

    private $orm;

    function __construct() {
        $this->$orm = new ORM();
    }

    function getCongresistaID($id) {
        $resultRow = $orm->queryArray("SELECT * FROM congresista WHERE idCongresista = " . $id);
        $congresista = new Congresista($resultRow);
        return $congresista;
    }

    function getAll() {
        $congresistas = array();
        $resultRow = $this->$orm->queryArray("SELECT * FROM congresista");
        foreach ($resultRow as $congresista) {
            $congresistas[] = new Congresista($congresista);
        }
    }

}
