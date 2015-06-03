<?php

class Cuota {

    public $idCuota;
    public $denominacion;
    public $descripcion;
    public $importe;
    public $actividadesIncluidas = Array();

    function __construct() {
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct' . $num_params;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    //ahora declaro una serie de métodos constructores que aceptan diversos números de parámetros

    function __construct1($queryRow) {
        $this->__construct5($queryRow[0], $queryRow[1], $queryRow[2], $queryRow[3], $queryRow[4]);
    }

    function __construct5($id, $denominacion, $descripcion, $importe, $actividades) {
        $this->idCuota = $id;
        $this->denominacion = $denominacion;
        $this->descripcion = $descripcion;
        $this->importe = $importe;
        $this->actividadesIncluidas = $actividades;
    }

    function getId() {
        return $this->idCuota;
    }

    function getDenominacion() {
        return $this->denominacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImporte() {
        return $this->importe;
    }

    function getActividades() {
        return $this->actividadesIncluidas;
    }

    function setId($id) {
        $this->idCuota = $id;
    }

    function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setImporte($importe) {
        $this->importe = $importe;
    }

    function addActividad($actividad) {
        $this->actividadesIncluidas[] = $actividad;
    }

    function setActividades($actividades) {
        $this->actividadesIncluidas = $actividades;
    }

}
