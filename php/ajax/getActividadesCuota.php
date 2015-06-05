<?php

include_once 'php/model/containers/ContenedorCuota.php';

$cCuota = new ContenedorCuota();

$idCuota = $_REQUEST["idCuota"];
$lActividades = $cCuota->getActividadesCuota($cCuota->getIdActividadesAsociadas($idCuota));

$response = '<div class="elemento-listado"><p class="titulo-elemento-listado"> Actividades incluidas en la cuota</p>';
foreach ($lActividades as $a) {
    $response.='<p hidden="hidden"><input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '" checked hidden="hidden">' . $a->getDenominacion() . '</p>';
    $response.='<p><input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '" checked disabled="disabled">' . $a->getDenominacion() . '</p>';
}
$response.='</div>';
//Actividades no incluidas
$lActividadesNoInc = $cCuota->getActividadesCuota($cCuota->getIdActividadesNoAsociadas($idCuota));
$response .= '<div class="elemento-listado"><p class="titulo-elemento-listado"> Actividades que puedes añadir</p>';
foreach ($lActividadesNoInc as $a) {
    $response.='<p><input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '">' . $a->getDenominacion() . '</p>';
}
$response.='</div>';
echo $response;




