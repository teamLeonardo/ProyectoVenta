<?php
include_once 'model/tablapdo.php';
$obj1 = new phppdo('master');
$obj2 = new phppdo('master');

//ver que base de tados tiene instalados
$arreglo = array("PuntoDeVenta","controlInventario");
//
foreach ($arreglo as $key => $value) {
    $obj->correrConsulta("select name from sys.databases where name in('$value')");
}
