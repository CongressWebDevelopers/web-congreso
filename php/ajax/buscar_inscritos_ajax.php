<?php

include_once '../database/ORM.php';

$patron = $_REQUEST['patron'];
$response = '';

$consulta = "SELECT * FROM Inscripcion WHERE nombre LIKE '".$patron."%'";

//$conexion = new ORM();
//$resultado = $conexion->query($consulta);

$conexion = mysql_connect('localhost', 'admin-congreso', 'congreso');
$abreBD = mysql_select_db('db_CEIIE', $conexion);       
$resultado = mysql_query($consulta, $conexion);
$num_filas = mysql_num_rows($resultado);

if ($num_filas>0){
	$response .= '<center>';
	$response .= '<table id="lista-inscritos" ALIGN="CENTER">';
	$response .= '<thead><tr><th>ID</th><th>Nombre</th><th>Teléfono</th></tr><thead>';
		
    while ($fila = mysql_fetch_array($resultado)){
		$response .= '<tr><td align="center">'.$fila[0].'</td><td align="center"><a href="index.php?page=mi-inscripcion&idInscripcion='.$fila[0].'">'.$fila[1].'</a> </td><td align="center">'.$fila[3].'</td></tr>';
	}
	$response .= '</table>';
	$response .= '</center>';
}
else{
	$response .= '<p>Ninguna Coincidencia</p>';
}

//$conexion->close();

mysql_close($conexion);

echo $response;
