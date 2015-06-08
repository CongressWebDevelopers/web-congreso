<?php

include_once 'ORM.php';

class Api_hoteles{
	public function inicializar(){
		$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			if((int)method_exists($this,$func) > 0){  
				$this->$func();          // invocamos la función de la api seleccionada
			}else{
				http_response_code(404); // error en la solicitud
				}
	}
	
	private function consulta(){
		if($_SERVER['REQUEST_METHOD']="GET"){
			$hoteles = new ORM(); // abrimos una conexión a la base de datos db_hoteles
			
			$seleccion = 'SELECT * FROM Hoteles';
			$hoteles->query($seleccion);         // obtenemos los hoteles de la base de datos
			$numFilas = $hoteles->rows();
			
			if ($numFilas> 0){
				$respuesta = $hoteles->getLastQueryResult(); // guardamos en $respuesta el resultado de la consulta
				http_response_code(200);       // solicitud procesada correctamente
				echo json_encode($respuesta);  // devolvemos la consulta
			}else{
				$respuesta = "No hay hoteles disponibles";
				http_response_code(200);       // solicitud procesada correctamente
				echo json_encode($respuesta);  // devolvemos la consulta
			}
			$hoteles->close(); //cerramos la conexión a la base de datos
		}
	}
	
	private function reserva(){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			if(!isset($_REQUEST['cliente']) || $_REQUEST['id']) || !isset($_REQUEST['fecha_inicio']) || !isset($_REQUEST['fecha_fin']) || !isset($_REQUEST['tipo']) || !isset($_REQUEST['cantidad'])){
				http_response_code(204); // ha llegado la solicitud pero no se ha ejecutado
			}else{
				$id = strtolower(trim(str_replace("/","",$_REQUEST['id'])));
				$fecha_inicio = strtolower(trim(str_replace("/","",$_REQUEST['fecha_inicio'])));
				$fecha_salida = strtolower(trim(str_replace("/","",$_REQUEST['fecha_salida'])));
				$tipo=strtolower(trim(str_replace("/","",$_REQUEST['tipo'])));
				$cantidad=strtolower(trim(str_replace("/","",$_REQUEST['cantidad'])));
				$cliente=strtolower(trim(str_replace("/","",$_REQUEST['cliente'])));
				
				$hoteles = new ORM(); // abrimos una conexión a la base de datos db_hoteles
				$seleccion = "INSERT INTO Reservas VALUES ($id, $fecha_inicio, $fecha_salida, $tipo, $cantidad, $cliente)"; // guardamos la reserva
				$hoteles->query($seleccion); // ejecuta la inserción		
				$respuesta = $hoteles->getLastQueryResult(); // pasamos a respuesta el resultado de la inserción
				
				if($respuesta==true){   // comprobamos que se ha almacenado la reserva
					$respuesta="Reserva realizada":
					http_response_code(200);
					echo json_encode($respuesta);
				}else{
					 http_response_code(204);
				}
				$hoteles->close(); //cerramos la conexión a la base de datos
			}
		}
	}
	

/*$method = $_SERVER['REQUEST_METHOD'];
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
			echo json_encode($respuesta, true); // $respuesta será un array con los datos de nuestra respuesta.
	
			// Comprobamos que funciona la consulta
			/*while($fila = $hoteles->queryArray()){
				echo "$fila[0]";
				echo "$fila[1]";
				echo "$fila[2]";
				echo "$fila[3]";
				echo "$fila[4]";
			*//*
            break;
            
        case 'POST':
			if (isset($_POST['reserva'])) {
				$cantidad_reserva=1;
				$id_reserva=$_POST['reserva'];
				$entrada=$_POST['entrada'];
				$salida=$_POST['salida'];
				if (isset($_POST['cantidad']))
					$cantidad_reserva= $_POST['cantidad']; // Si se especifíca una cantidad, reservamos ese número
				$seleccion = "INSERT INTO agenda VALUES ($id_reservada, $entrada, $salida, 1, $cantidad_reserva)"; // guardamos la reserva
				$hoteles->query($seleccion); // ejecuta la inserción		
			}
            break;   
    }
	$hoteles->close();
} catch (Exception $ex) {
    header('HTTP/1.0 400 Bad Request');
}

//echo json_encode($respuesta, true); // $respuesta será un array con los datos de nuestra respuesta.
*/
