<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Inicio</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Inscripción</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h1>¡¡¡Inscribete!!!</h1>
        <p>A continuación detallamos los precios de inscripción al congreso, para los distintos tipos de usuarios, así como para los que deseen hacer una preinscripción, o apuntarse directamente en la sede, al comienzo del congreso. Todas las inscripciones traen las mismas garantías y ventajas: Asistencias a las distintas conferencias, documentación, alojamiento y comida, actividades, cóctel de bienvenida, y cena de clausura.</p>



<?php

$cuota=new ORM();
$seleccion = 'SELECT * FROM Cuotas';
$cuota->query($seleccion);
$numFilas = $cuota->rows();

if ($numFilas> 0){
	echo '<center>';
	echo '<table border=1>';
	echo '<tr><th>Interesado</th><th>Descripción</th><th>Importe</th></tr>';
	
	// Añadimos a la tabla las filas de datos que haya devuelto la consulta
	while($fila = $cuota->queryArray()){
		echo "<tr><td>$fila[0] </td><td>$fila[1] </td><td>$fila[2] </td></tr>";
	}
	// Cerramos la tabla y quitamos el centrado de la misma
	echo '</table>';
	echo '</center>';
}
$cuota->close();
  
?>
        <p>A continuación detallamos los precios de las actividades opcionales, así si hay inscripción previa, o se abona en la sede en el momento de la actividad.</p>
 
<?php

$actividades=new ORM();
$seleccion = 'SELECT * FROM Actividades';
$actividades->query($seleccion);
$numFilas2 = $actividades->rows();

if($numFilas2> 0){
	echo '<center>';
	echo '<table border=1>';
	echo '<tr><th>Actividad</th><th>Fecha</th><th>Descripción</th><th>Foto</th><th>Importe</th></tr>';
	
	// Añadimos a la tabla las filas de datos que haya devuelto la consulta
	while($fila = $actividades->queryArray()){
		echo "<tr><td>$fila[0] </td><td>$fila[1] </td><td>$fila[2] </td><td>$fila[3] </td><td>$fila[4] </td></tr>";
	}
	// Cerramos la tabla y quitamos el centrado de la misma
	echo '</table>';
	echo '</center>';
}
$actividades->close();
  
?>      
        
    </div>
