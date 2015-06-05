<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

class Usuario {

    public $idUsuario;
    private $nombreUsuario;
    private $password;
    private $rol; //

    public function __construct($row) {
        $this->idUsuario = $row['idUsuario'];
        $this->nombreUsuario = $row['nombreUsuario'];
        $this->password = $row['password'];
        $this->rol = $row['rol'];
    }

    function getId() {
        return $this->idUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getPassword() {
        $this->password;
    }

    function getRol() {
        return $this->rol;
    }

}
