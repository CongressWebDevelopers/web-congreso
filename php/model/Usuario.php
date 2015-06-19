<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

class Usuario {

    public $idUsuario;
    public $nombreUsuario;
    public $password;
    public $rol; 

    function __construct() {
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct' . $num_params;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    function __construct1($queryRow) {
        $this->__construct4($queryRow[0], $queryRow[1], $queryRow[2], $queryRow[3]);
    }

    function __construct4($id, $nUsuario, $pass, $rol) {
        $this->idUsuario = $id;
        $this->nombreUsuario = $nUsuario;
        $this->password = $pass;
        $this->rol = $rol;
    }

    function getId() {
        return $this->idUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getRol() {
        return $this->rol;
    }

}
