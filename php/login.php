<?php

include_once 'php/model/containers/ContenedorUsuario.php';
include_once 'php/model/containers/ContenedorInscripcion.php';

if (!isset($_SESSION['usuario'])) {
    if (session_id() == "")
        session_start();
}

if (isset($_COOKIE['User'])) {
    $usuarioLogin = $_COOKIE['User'];
    $passwordLogin = $_COOKIE['Pass'];
    $cUsuario = new ContenedorUsuario();
    if ($usuarioActual = $cUsuario->comprobarLogin($usuarioLogin, $passwordLogin)) {
        if (session_id() == "")
            session_start();
        $cInscripcion = new ContenedorInscripcion();
        $_SESSION['usuario'] = $usuarioActual;
        $_SESSION['inscrito'] = $cInscripcion->estaInscrito($usuarioActual->getId());
        $_SESSION['rol'] = $usuarioActual->getRol();
    }
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
        if ($cInscripcion->estaInscrito($usuarioActual->getId())) {
            $_SESSION['inscrito'] = true;
        }
        $_SESSION['rol'] = $usuarioActual->getRol();
        if (isset($_POST['recordar']) && !empty($_POST['recordar'])) { // Si hemos seleccionado recordar, recordaremos la sesión por 100 horas
            setcookie("User", "$usuarioLogin", time() + 360000, "/", "");
            setcookie("Pass", "$passwordLogin", time() + 360000, "/", "");
        }
    } else {
        $mensajeSesion = "El usuario o la contraseña son incorrectos";
        $claseMensajeSesion = "error";
    }
}
