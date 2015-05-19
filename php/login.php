<?php

include_once 'php/model/containers/ContenedorUsuario.php';

if (!isset($_SESSION['usuario'])) {
    session_start();
}
if (isset($_POST['login'])) {
    $usuarioLogin = $_POST['usuario'];
    $passwordLogin = $_POST['password'];
    $cUsuario = new ContenedorUsuario();
    if ($usuarioActual = $cUsuario->comprobarLogin($usuarioLogin, $passwordLogin)) {
        session_start();
        $_SESSION['usuario'] = $usuarioActual;
        $usuario = $_SESSION['usuario'];
    } else {
        $mensajeSesion = "El usuario o la contraseña son incorrectos";
        $claseMensaje = "error";
    }
}
