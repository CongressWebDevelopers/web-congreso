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

class Congresista {

    private $nombre;
    private $centro;
    private $telefono;
    private $cuota;
    private $actividades;
    private $hotel;
    private $fechaSalida;
    private $fechaEntrada;

    function Congresista($nombre, $centro, $telefono, $cuota, $actividades, $hotel, $fechaSalida, $fechaEntrada) {
        $this->nombre = $nombre;
        $this->centro = $centro;
        $this->telefono = $telefono;
        $this->cuota = $cuota;
        $this->actividades = $actividades;
        $this->hotel = $hotel;
        $this->fechaSalida = $fechaSalida;
        $this->fechaEntrada = $fechaEntrada;
    }

}
