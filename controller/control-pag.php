<?php
session_start();
include_once '../model/tablapdo.php';

$obj = new phppdo('EmpresaControl');
//validar ingreso al daschboard
if ($_GET['validacionGeneral']=true) {
    $respuesta = $obj->correrConsulta('sp_masteEmpresa ?,?,?,?,?,?,?',
    array($_GET['nombre'],
    $_GET['apellido'],
    $_GET['dni'],
    $_GET['usuario'],
    $_GET['contra'],
    $_GET['nempresa'],
    $_GET['ruc']));
    var_dump($respuesta);
    if ($respuesta[0] == true) {
        $_SESSION['empresa'] = $respuesta[1][0];
        
        //header('../view/page/dashboard.php');
    }else {
        //header('../view/page/pag-register.php');
    }
}
?>