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
    $resultado = $obj->ejecutar("sp_masteEmpresa ?,?,?,?,?,?,?",$form);
    if ($resultado == 1) {
        $estado = array('estado' => true );
    }else {
        $estado = array('estado' => false );
    }
    echo json_encode($estado);
    exit;
}
if ($_POST['id-pag']=='login') {
    $form =  array($_POST['usuario'],$_POST['pass']);
   $resultado = $obj->correrConsulta("sp_validarUsuarioPermisos ?,? ",$form);
    if (count($resultado)>0) {
        $estado = array('estado' => false ,'mensaje'=>$resultado[0]['estado']);
        if ($resultado[0]['estado'] != 0) {
            $_SESSION['id_usuario'] = $resultado[0]['idUsuario'];
            $_SESSION['cargo'] = $resultado[0]['id_cargo'];
            $estado = array('estado' => true );
        }else {
            $estado = array('estado' => false );
        }
    }else {
        $estado = array('estado' => false );
    }
    
    echo json_encode($estado);
    exit;
}