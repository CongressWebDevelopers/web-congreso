<?php

include_once 'ORM.php';

$orm = new ORM();

$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

switch ($method) {
    case 'PUT': rest_put($request);
        break;
    case 'POST': rest_post($request);
        break;
    case 'GET': rest_get($request);
        break;
    case 'HEAD': rest_head($request);
        break;
    case 'DELETE': rest_delete($request);
        break;
    case 'OPTIONS': rest_options($request);
        break;
    default: rest_error($request);
        break;
}

function rest_put($request) {
    echo $request;
    print_r($request);
}

function rest_get($request) {
    $orm = new ORM();
    $query = "SELECT * FROM Hoteles";
    $result = $orm->query($query);
    $hoteles = Array();
    while ($r = mysql_fetch_assoc($result)) {
        $reservadas = $orm->query("SELECT count(*) FROM reservas WHERE idHotel = '" . $r['idHotel'] . "'");
        $nDisponibles = $r['capacidad'] - $reservadas;
        $r['disponibles'] = $nDisponibles;
        $hoteles[] = $r;
    }
    echo json_encode($hoteles);
}

function rest_post($request) {
    $orm = new ORM();
    $idHotel = $_POST['idHotel'];
    $fechaEntrada = mysql_escape_string($_POST['fechaEntrada']);
    $fechaSalida = mysql_escape_string($_POST['fechaSalida']);

    $query = "INSERT INTO reservas VALUES (''," . $idHotel . ","
            . "'" . $fechaEntrada . "',"
            . "'" . $fechaSalida . "'"
            . ")";
    echo $query;
    $result = $orm->query($query);
    echo mysql_error();
    print_r($result);
    $idReserva = mysql_insert_id();
    $respuesta = "Id de la reserva realizada: " . $idReserva;
    http_response_code(200);
    echo json_encode($respuesta);
}
?>

