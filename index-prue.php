<?php
session_start();
include_once 'model/tablapdo.php';

$obj1 = new phppdo('master');
$obj2 = new phppdo('EmpresaControl');

//ver que base de tados tiene instalados
$arreglo = array("PuntoDeVenta","controlInventario");
//
$contadorInstallModule = 0;
//
$installModulos = array();
foreach ($arreglo as $key => $value) {
    $state = $obj1->correrConsulta("select name from sys.databases where name in('$value')");
    if (!$state) {
        $contadorInstallModule +=0;
    }else{
        $installModulos[] = $value;
        $contadorInstallModule +=1;
    }
}

$modulosAccesos = $obj2->correrConsulta();
foreach ($variable as $key => $value) {
    # code...
}



