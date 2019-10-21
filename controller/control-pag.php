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
        $_POST['estado'], $_POST['id_empresa']
    );

    $resultado2 = $obj->ejecutar("insert into MasterCliente values(?,?,?,?,?,?)", $form);
    if ($resultado2 == 1) {
        $ultimoregistro = $obj->correrConsulta('select top 1 * from MasterCliente where id_empresa = ? order by 1 desc', array($_POST['id_empresa']));
        $arrayRe  = array();
        foreach ($ultimoregistro as $key => $value) {
            $arrayRe[] = $value;
        }
        if (count($ultimoregistro) > 0 ) {

            $estado = array('estado' => true,'data' => $ultimoregistro[0]);
           // $resultado = $objPuntoVenta->ejecutar("insert into cliente values(?,?,?,?,?,?,?)", $ultimoregistro[0]); 
            /*if ($resultado ==  1) {
                $estado = array('estado' => true);
            } else {
                $estado = array('estado' => false);
            } */
        }else {
            $estado = array('estado' => false ,'data' => $ultimoregistro[0]);
        }
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

    $resultado = $objPuntoVenta->ejecutar("update cliente set nombre = ? , apellido = ? , DOCUMENTO = ? ,tipoCliente = ? ,estado = ? ,id_empresa = ? where id_cliente =?", $form);

    $resultado2 = $obj->ejecutar("update MasterCliente set nombre = ? , apellido = ? , DOCUMENTO = ? ,tipoCliente = ? ,estado = ? ,id_empresa = ? where id_cliente =?", $form);

    if ($resultado == 1 && $resultado2 == 1) {
        $estado = array('estado' => true, 'data' => $form);
    } else {
        $estado = array('estado' => false);
    }
    echo json_encode($estado);
    exit;
}
