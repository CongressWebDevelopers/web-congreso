<?php

include_once 'php/model/containers/ContenedorUsuario.php';
include_once 'php/model/containers/ContenedorInscripcion.php';

if (!isset($_SESSION['usuario'])) {
    if (session_id() == "")
        session_start();
}
if (isset($_POST['login'])) {
    $usuarioLogin = $_POST['usuario'];
    $passwordLogin = $_POST['password'];
    $cUsuario = new ContenedorUsuario();
    if ($usuarioActual = $cUsuario->comprobarLogin($usuarioLogin, $passwordLogin)) {
        if (session_id() == "")
            session_start();
        $cInscripcion = new ContenedorInscripcion();
        $_SESSION['usuario'] = $usuarioActual;
        $_SESSION['inscrito'] = $cInscripcion->estaInscrito($usuarioActual->getId());
        $_SESSION['rol'] = $usuarioActual->getRol();
    } else {
        $mensajeSesion = "El usuario o la contraseña son incorrectos";
        $claseMensajeSesion = "error";
    }
}
