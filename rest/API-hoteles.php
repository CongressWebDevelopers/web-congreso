<?php

include_once 'ORM.php';

$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];


try {
    $hoteles = new ORM(); // abrimos una conexión a la base de datos db_hoteles
    switch ($method) {
        case 'GET':
        //echo "holaaa";
			$seleccion = 'SELECT * FROM Hoteles';
			$hoteles->query($seleccion);
			$numFilas = $hoteles->rows();
           
			if ($numFilas> 0){
			$respuesta = $hoteles->getLastQueryResult(); // guardamos en $respuesta el resultado de la consulta
			//	echo json_encode($respuesta, true); // $respuesta será un array con los datos de nuestra respuesta.
	
			// Comprobamos que funciona la consulta
			/*while($fila = $hoteles->queryArray()){
				echo "$fila[0]";
				echo "$fila[1]";
				echo "$fila[2]";
				echo "$fila[3]";
				echo "$fila[4]";
			*/
            break;
            
        case 'POST':
        
			if (isset($_POST['reserva'])) {
				$cantidad_reserva=1;
				$id_reserva=$_POST['reserva'];
				if (isset($_POST['cantidad']))
					$cantidad_reserva= $_POST['cantidad']; // Si se especifíca una cantidad, reservamos ese número
					$seleccion = "INSERT INTO agenda VALUES ($id_reservada, 0, 0, 1, $cantidad_reserva)";
					$hoteles->query($seleccion); // ejecuta la inserción		
			}
            break;   
    }
	$hoteles->close();
} catch (Exception $ex) {
    header('HTTP/1.0 400 Bad Request');
}

//echo json_encode($respuesta, true); // $respuesta será un array con los datos de nuestra respuesta.
