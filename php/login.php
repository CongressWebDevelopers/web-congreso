<?php
include_once 'php/model/containers/ContenedorUsuario.php';
session_start();
if (isset($_POST['login'])) {
    $usuarioLogin = $_POST['usuario'];
    $passwordLogin = $_POST['password'];
    $cUsuario = new ContenedorUsuario();
    if ($usuarioActual = $cUsuario->comprobarLogin($usuarioLogin, $passwordLogin)) {
        session_start();
        $_SESSION['usuario'] = $usuarioActual;
        $usuario = $_SESSION['usuario'];
    } else{
        $mensajeSesion ="El usuario o la contraseña son incorrectos";
        $claseMensaje = "error";
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

