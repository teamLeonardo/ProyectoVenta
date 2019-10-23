<?php

session_start();
include_once '../model/tablapdo.php';

$obj = new phppdo('EmpresaControl');
$objPuntoVenta = new phppdo('PuntoDeVenta');

header('Content-type: application/json; charset=utf-8');
//validar ingreso al daschboard
//$obj->ejecutar("sp_masteEmpresa ?,?,?,?,?,?,?",$form);

if ($_POST['id-pag'] == 'registro-usuario') {

    $form =  array(
        $_POST['nombre'], $_POST['apellido'],
        $_POST['dni'], $_POST['usuario'],
        $_POST['contra'], $_POST['nempresa'],
        $_POST['ruc']
    );
    $resultado = $obj->ejecutar("sp_masteEmpresa ?,?,?,?,?,?,?", $form);
    if ($resultado == 1) {
        $estado = array('estado' => true);
    } else {
        $estado = array('estado' => false);
    }
    echo json_encode($estado);
    exit;
} else if ($_POST['id-pag'] == 'login') {

    $form =  array($_POST['usuario'], $_POST['pass']);
    $resultado = $obj->correrConsulta("sp_validarUsuarioPermisos ?,? ", $form);
    if (count($resultado) > 0) {
        $estado = array('estado' => false, 'mensaje' => $resultado[0]['estado']);
        if ($resultado[0]['estado'] != 0) {
            $_SESSION['id_usuario'] = $resultado[0]['idUsuario'];
            $_SESSION['cargo'] = $resultado[0]['id_cargo'];
            $estado = array('estado' => true);
        } else {
            $estado = array('estado' => false);
        }
    } else {
        $estado = array('estado' => false);
    }

    echo json_encode($estado);
    exit;
} else if ($_POST['id-pag'] == 'registro-cliente-crear') {
    $form =  array(
        $_POST['nombre'], $_POST['apellido'],
        $_POST['DOCUMENTO'], $_POST['tipoCliente'],
         $_POST['id_empresa']
    );

    $resultado2 = $obj->ejecutar("sp_crearCliente ?,?,?,?,? ", $form);

    if ($resultado2 == 1) {
       
            $estado = array('estado' => true);
        
    } else {
        $estado = array('estado' => false);
    }
    echo json_encode($estado);
    exit;
} else if ($_POST['id-pag'] == 'registro-cliente-update') {
    $form =  array(
        $_POST['nombre'], $_POST['apellido'],
        $_POST['DOCUMENTO'], $_POST['tipoCliente'],
        $_POST['estado'], $_POST['id_empresa'], $_POST['id_cliente']
    );
    $form2 =  array(
        $_POST['nombre'], $_POST['apellido'],
        $_POST['DOCUMENTO'], $_POST['tipoCliente'],
         $_POST['id_empresa'], $_POST['id_cliente']
    );
    
    
    $resultado2 = $obj->ejecutar("sp_upCliente ?,?,?,?,?,?", $form2);

    if ($resultado2 == 1) {
        $estado = array('estado' => true, 'data' => $form);
    } else {
        $estado = array('estado' => false);
    }
    echo json_encode($estado);
    exit;
}
else if ($_POST['id-pag'] == 'eiminacion-cliente') {
    $form =  array($_POST['idcliente']);
    
    $resultado2 = $obj->ejecutar("sp_eiminarCliente ?", $form);

    if ($resultado2 == 1) {
        $estado = array('estado' => 1);
    } else {
        $estado = array('estado' => 0);
    }
    echo json_encode($estado);
    exit;
}