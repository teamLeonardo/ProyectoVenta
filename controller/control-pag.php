<?php

session_start();
include_once '../model/tablapdo.php';

$obj = new phppdo('EmpresaControl');

header('Content-type: application/json; charset=utf-8');
//validar ingreso al daschboard
    //$obj->ejecutar("sp_masteEmpresa ?,?,?,?,?,?,?",$form);
    
if ($_POST['id-pag']=='registro-usuario') {

    $form =  array($_POST['nombre'],$_POST['apellido'],
    $_POST['dni'],$_POST['usuario'],
    $_POST['contra'],$_POST['nempresa'],
    $_POST['ruc']);
    $form = $obj->ejecutar("sp_masteEmpresa ?,?,?,?,?,?,?",$form);
    if ($form == 1) {
        $estado = array('estado' => true );
    }else {
        $estado = array('estado' => false );
    }
    echo json_encode($estado);
    exit;
}