<?php

include_once 'php/model/containers/ContenedorInscripcion.php';
$patron = $_REQUEST['patron'];

$cInscripcion = new ContenedorInscripcion();
$response = '';
$lInscripcion = $cInscripcion->buscarInscripciones($patron);

if ($lInscripcion){
	$response .= '<center>';
	$response .= '<table id="lista-inscritos" align="center">';
	$response .= '<thead><tr><th>ID</th><th>Nombre</th><th>Teléfono</th></tr><thead>';
        foreach ($lInscripcion as $i){
		$response .= '<tr>'
                        . '<td align="center">'.$i->getId().'</td>'
                        . '<td align="center"><a href="index.php?page=mi-inscripcion&idInscripcion='.$i->getId().'">'.$i->getNombre().'</a> </td>'
                        . '<td align="center">'.$i->getTelefono().'</td>'
                        . '</tr>';
	}
	$response .= '</table>';
	$response .= '</center>';
}
else{
	$response .= '<p>Ninguna Coincidencia</p>';
}
echo $response;
