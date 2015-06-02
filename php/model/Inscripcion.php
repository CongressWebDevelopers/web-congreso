<?php

/*
 * Nombre y apellidos
 * Centro de trabajo
 * Teléfono de contacto
 * Cuota de inscripción (obligatorio)
 * Actividades (puede no escogerse ninguna)
 * Hotel elegido(puede no escogerse ninguno)
 * Fecha salida
 * Tipo de habitación
 */

class Inscripcion {

    public $id;
    public $nombre;
    public $centro;
    public $telefono;
    public $cuota;
    public $actividades = Array();
    public $hotel;
    public $fechaSalida;
    public $fechaEntrada;
    public $idUsuario;

    function __construct() {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámtros tendrá un nombre de función
        //atendiendo al siguiente modelo __construct1() __construct2()...
        $funcion_constructor = '__construct' . $num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this, $funcion_constructor)) {
            //si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    //ahora declaro una serie de métodos constructores que aceptan diversos números de parámetros

    function __construct1($queryRow) {
        $this->__construct9($queryRow[0], $queryRow[1], $queryRow[2], $queryRow[3], $queryRow[4], $queryRow[5], $queryRow[6], $queryRow[7]);
    }

    function __construct10($id, $nombre, $centro, $telefono, $cuota, $actividades, $hotel, $fechaSalida, $fechaEntrada, $idUSuario) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->centro = $centro;
        $this->telefono = $telefono;
        $this->cuota = $cuota;
        $this->actividades = $actividades;
        $this->hotel = $hotel;
        $this->fechaSalida = $fechaSalida;
        $this->fechaEntrada = $fechaEntrada;
        $this->idUsuario = $idUSuario;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCentro() {
        return $this->centro;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCuota() {
        return $this->cuota;
    }

    function getActividades() {
        return $this->actividades;
    }

    function getHotel() {
        return $this->hotel;
    }

    function getFechaSalida() {
        return $this->fechaSalida;
    }

    function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCentro($centro) {
        $this->centro = $centro;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCuota($cuota) {
        $this->cuota = $cuota;
    }

    function setActividades($actividades) {
        $this->actividades = $actividades;
    }

    function setHotel($hotel) {
        $this->hotel = $hotel;
    }

    function setFechaSalida($fechaSalida) {
        $this->fechaSalida = $fechaSalida;
    }

    function setFechaEntrada($fechaEntrada) {
        $this->fechaEntrada = $fechaEntrada;
    }

}
