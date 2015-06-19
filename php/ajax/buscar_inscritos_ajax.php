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
	$response .= '<table id="lista-inscritos">';
	$response .= '<tr><th>ID</th><th>Nombre</th><th>Centro</th><th>Teléfono</th><th>idCuota</th><th>idHotel</th><th>Salida</th><th>Entrada</th><th>idUsuario</th></tr>';
		
    while ($fila = mysql_fetch_array($resultado)){
		$response .= '<tr><td>'.$fila[0].'</td><td>'.$fila[1].'</td><td>'.$fila[2].'</td><td>'.$fila[3].'</td><td>'.$fila[4].'</td><td>'.$fila[5].'</td><td>'.$fila[6].'</td><td>'.$fila[7].'</td><td>'.$fila[8].'</td></tr>';
	}
	$response .= '</table>';
}
else{
	$response .= '<p>Ninguna Coincidencia</p>';
}

//$conexion->close();

mysql_close($conexion);

echo $response;
