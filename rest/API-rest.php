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

function rest_post($request) {
    echo $request;
    print_r($request);
}

function rest_get($request) {
    $orm = new ORM();
    $query = "SELECT * FROM Hoteles";
    $result = $orm->query($query);
    $hoteles = Array();
    while ($r = mysql_fetch_assoc($result)) {
        $hoteles[] = $r;
    }
    echo json_encode($hoteles);
}
?>

