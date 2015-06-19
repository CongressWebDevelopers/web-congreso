<?php

include_once 'php/model/containers/ContenedorActividad.php';
include_once 'php/model/containers/ContenedorCuota.php';

$cActividad = new ContenedorActividad();
$cCuota = new ContenedorCuota();

if (isset($_POST['datos'])) {
    $datos = json_decode($_POST['datos'], $assoc = true);
    $response = 0;
    $response += $cActividad->getPrecioTotal($datos['idsActividades']);
    $response += $cCuota->getById($datos['idCuota'])->getImporte();
    echo $response;
}