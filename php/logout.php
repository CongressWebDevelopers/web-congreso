<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_COOKIE['User'])){
	setcookie("User", "", -1);
	setcookie("Pass", "", -1); 
}

if (isset($_SESSION['usuario'])) {
    session_unset();
    session_destroy();
}
header("location:index.php");



