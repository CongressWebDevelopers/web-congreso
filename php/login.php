<?php

include_once 'php/model/containers/ContenedorUsuario.php';
include_once 'php/model/containers/ContenedorInscripcion.php';

if (!isset($_SESSION['usuario'])) {
    session_start();
}
if (isset($_POST['login'])) {
    $usuarioLogin = $_POST['usuario'];
    $passwordLogin = $_POST['password'];
    $cUsuario = new ContenedorUsuario();
    if ($usuarioActual = $cUsuario->comprobarLogin($usuarioLogin, $passwordLogin)) {
        session_start();
        $cInscripcion = new ContenedorInscripcion();
        $_SESSION['usuario'] = $usuarioActual;
        $_SESSION['inscrito'] = $cInscripcion->estaInscrito($usuarioActual->getId());
    } else {
        $mensajeSesion = "El usuario o la contraseña son incorrectos";
        $claseMensaje = "error";
    }
}
