<?php

class Actividad {

    public $idActividad;
    public $denominacion;
    public $descripcion;
    public $fecha;
    public $hora;
    public $importe;
    public $foto;

    function __construct() {
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct' . $num_params;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    function __construct1($queryRow) {
        $this->__construct7($queryRow[0], $queryRow[1], $queryRow[2], $queryRow[3], $queryRow[4], $queryRow[5], $queryRow[6]);
    }

    function __construct7($id, $denominacion, $descripcion, $fecha, $hora, $importe, $foto) {
        $this->idActividad = $id;
        $this->denominacion = $denominacion;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->importe = $importe;
        $this->foto = $foto;
    }

    function getId() {
        return $this->idActividad;
    }

    function getDenominacion() {
        return $this->denominacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }
    function getFechaEU() {
        return date("d-M-Y", strtotime($this->fecha));
    }

    function getHora() {
        return date("H:i", strtotime($this->hora));
    }

    function getImporte() {
        return $this->importe;
    }

    function getFoto() {
        return $this->foto;
    }

    function setId($id) {
        $this->idActividad = $id;
    }

    function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setImporte($importe) {
        $this->importe = $importe;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

}
