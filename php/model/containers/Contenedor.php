<?php
include_once 'php/database/ORM.php';;
class Contenedor {

    protected $orm;

    public function __construct() {
        $this->orm = new ORM();
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

