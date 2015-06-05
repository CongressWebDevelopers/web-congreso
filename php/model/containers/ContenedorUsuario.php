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
        $password = $usuario->getPassword();
        $rol = mysql_escape_string($usuario->GetRol());
        $query = "INSERT INTO usuario VALUES ('','" . $nUsuario . "','" . $password . "'," . $rol . ")";
        echo $query;
        return $this->orm->query($query);
    }

    function getUsuarioById($id) {
        $id = mysql_escape_string($id);
        $query = "SELECT * FROM usuario WHERE idUsuario='" . $id . "'";
        $resultado = mysql_fetch_array($this->orm->query($query));
        ($resultado) ? $usuario = new Usuario($resultado) : $usuario = false;
        return $usuario;
    }

    function getUsuarioNombre($nombreUsuario) {
        $nombreUsuario = mysql_escape_string($nombreUsuario);
        $query = "SELECT * FROM usuario WHERE nombreUsuario=" . $nombreUsuario;
        $resultado = $this->orm->queryArray($query);
        ($resultado) ? $usuario = new Usuario($resultado) : $usuario = false;
        return $usuario;
    }

    function comprobarLogin($nombreUsuario, $password) {
        $nombreUsuario = mysql_escape_string($nombreUsuario);
        $password = mysql_escape_string($password);
        $query = "SELECT * FROM usuario WHERE nombreUsuario='" . $nombreUsuario . "' AND password= '" . md5($password) . "'";
        $resultado = $this->orm->queryArray($query);
        ($resultado) ? $usuario = new Usuario($resultado) : $usuario = false;
        return $usuario;
    }

}
