<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Contenedor.php';
include_once 'php/model/Usuario.php';

class ContenedorUsuario extends Contenedor {

    function insertarUsuario($usuario) {
        $nUsuario = mysql_escape_string($usuario->getNombreUsuario());
        $password = mysql_escape_string(md5($usuario->getPassword()));
        $rol = mysql_escape_string($usuario->GetRol());
        $query = "INSERT INTO usuario VALUES ('','" . $nUsuario . "','" . $password . "'," . $rol . ")";
        echo $query;
        return $this->orm->query($query);
    }
    

}
