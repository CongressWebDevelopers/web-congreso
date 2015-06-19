<?php
include_once 'php/database/ORM.php';

class Contenedor {

    protected $orm;

    public function __construct() {
        $this->orm = new ORM();
    }

}