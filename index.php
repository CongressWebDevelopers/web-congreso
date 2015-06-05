<?php

if (!isset($_GET['ajax']) OR ! $_GET['ajax']) {
    include_once('head.php');
    include_once 'php/config.php';
    include_once('php/funciones.php');
    include_once('php/login.php');
    include_once('header.php');
}

//Este array servirá de directorio de páginas para la variable GET page.
//"valor variable page" => 'directorio.php'
$treePages = Array(
    "programa" => Array(
        "agiles" => 'pages/programas/agiles.php',
        "ifml" => 'pages/programas/ifml.php',
        "prince" => 'pages/programas/prince.php',
        "windows" => 'pages/programas/windows.php',
        "unix" => 'pages/programas/unix.php',
        "ios" => 'pages/programas/ios.php',
        "visualizacion" => 'pages/programas/visualizacion.php',
        "digitalizacion" => 'pages/programas/digitalizacion.php',
        "realidad_aumentada" => 'pages/programas/realidad_aumentada.php',
        "paralela" => 'pages/programas/paralela.php',
        "distribuidos" => 'pages/programas/distribuidos.php',
        "tiempo_real" => 'pages/programas/tiempo_real.php',
        "db_multidimensionales" => 'pages/programas/db_multidimensionales.php',
        "db_oo" => 'pages/programas/db_oo.php',
        "db_distribuidos" => 'pages/programas/db_distribuidos.php',
        "haptica" => 'pages/programas/haptica.php',
        "wereables" => 'pages/programas/wereables.php',
        "realidad_virual" => 'pages/programas/realidad_virtual.php',
        "procesadores" => 'pages/programas/procesadores.php',
        "traductores" => 'pages/programas/traductores.php',
        "habla" => 'pages/programas/habla.php'),
    "patrocina" => 'pages/patrocina.php',
    "inscripcion" => 'pages/inscripcion.php',
    "alhambra" => 'pages/alhambra.php',
    "sierra_nevada" => 'pages/sierra_nevada.php',
    "etsiit" => 'pages/etsiit.php',
    "granada" => 'pages/granada.php',
    "contacto" => 'pages/contacto.php',
    "registroUsuario" => 'pages/registroUsuario.php',
    "cuotas" => 'pages/cuotas.php',
    "actividades" => 'pages/actividades.php',
    "mi-inscripcion" => 'pages/mi-inscripcion.php',
    "lista-inscritos" => 'pages/lista-inscritos.php',
    "editar-cuota" => 'pages/editar-cuota.php',
    "editar-actividad" => 'pages/editar-actividad.php',
    "logout" => 'php/logout.php',
    "ajax" => Array(
        "actividades-ajax" => 'php/ajax/getActividadesCuota.php'
    )
);

if (isset($_GET['page']) && $treePages[$_GET['page']]) {
    if ($_GET['page'] != "programa") {
        include_once $treePages[$_GET['page']];
    } else {
        if (isset($_GET['programa']) && isset($treePages['programa'][$_GET['programa']])) {
            include_once $treePages['programa'][$_GET['programa']];
            include_once 'modulos/contexmenu.php';
        } else {
            include_once 'pages/programa.php';
        }
    }
} else if (isset($_GET['ajax'])) {
    include_once $treePages['ajax'][$_GET['ajax']];
} else {
    include_once 'contain.php';
}
if (!isset($_GET['ajax']) OR ! $_GET['ajax'])
    include_once('footer.php');
?>
