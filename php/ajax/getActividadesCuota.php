<?php

include_once 'php/model/containers/ContenedorCuota.php';

$cCuota = new ContenedorCuota();

$idCuota = $_REQUEST["idCuota"];
$lActividades = $cCuota->getActividadesCuota($cCuota->getIdActividadesAsociadas($idCuota));

$response = '<div class="elemento-listado"><p class="titulo-elemento-listado"> Actividades incluidas en la cuota</p>';
foreach ($lActividades as $a) {
//    $response = '<div class="elemento-listado"><p class="titulo-elemento-listado">' . $a->getDenominacion() .  '<input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '" checked disabled="disabled"></p>';
//    $response.='<p hidden="hidden"><input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '" checked hidden="hidden">' . $a->getDenominacion() . '</p>';
//    $response.='<p><input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '" checked disabled="disabled">' . $a->getDenominacion() . '</p>';
//    $response.='</div>';
    
    $response.='<div id="actividad-'. $a->getId() . '" class="actividades elemento-listado">'
            . '<p class="titulo-elemento-listado">' . $a->getDenominacion() . '<input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '" checked disabled="disabled"></p> '
            . '<p hidden="hidden"><input type="checkbox" name="actividades[]" id="actividades" value="' . $a->getId() . '" checked hidden="hidden">' . $a->getDenominacion() . '</p>'
            . '<img src="files/actividades/' . $a->getFoto() .'" class="foto-listado" alt="Foto de la actividad'. $a->getId() . '">'
            . '<p><strong>Descripcion: </strong></p><p>' . $a->getDescripcion() .'</p> '
            . '<p><strong>Fecha: </strong>' . $a->getFechaEU() . '</p>'
            . '<p><strong>Hora: </strong>' . $a->getHora() . '</p>'
            . '<p><strong>Importe: </strong>' . $a->getImporte() .'€</p>'
            . '</div>';
}
$response.='</div>';
//Actividades no incluidas
$lActividadesNoInc = $cCuota->getActividadesCuota($cCuota->getIdActividadesNoAsociadas($idCuota));
$response .= '<div class="elemento-listado"><p class="titulo-elemento-listado"> Actividades que puedes añadir</p>';
foreach ($lActividadesNoInc as $a) {
    $response.='<div id="actividad-'. $a->getId() . '" class="actividades elemento-listado">'
            . '<p class="titulo-elemento-listado">' . $a->getDenominacion() . '<input type="checkbox" name="actividades[]" onchange="calcularTotal()" id="actividades" value="' . $a->getId() . '"></p> '
            . '<img src="files/actividades/' . $a->getFoto() .'" class="foto-listado" alt="Foto de la actividad'. $a->getId() . '">'
            . '<p><strong>Descripcion: </strong></p><p>' . $a->getDescripcion() .'</p> '
            . '<p><strong>Fecha: </strong>' . $a->getFechaEU() . '</p>'
            . '<p><strong>Hora: </strong>' . $a->getHora() . '</p>'
            . '<p><strong>Importe: </strong>' . $a->getImporte() .'€</p>'
            . '</div>';
}
$response.='</div>';
echo $response;




