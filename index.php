<?php
session_start();
include_once 'model/tablapdo.php';

$obj1 = new phppdo('master');

//ver que base de tados tiene instalados
$arreglo = array("PuntoDeVenta", "EmpresaControl");
//
$contadorInstallModule = 0;
//
$state = $obj1->correrConsulta("select name from sys.databases where name in('PuntoDeVenta','EmpresaControl')");
//
$total = count($state);
//
if ($total > 0) 
{
    $obj2 = new phppdo('EmpresaControl');
    $stat = $obj2->correrConsulta('select id_usu_master from [UsuarioMaster] where  id_cargo = 1 and id_estado = 3');
    if (count($stat) > 0) 
    {
        header('Location: view\page\login-dashboard.php');
        exit;
    } 
    else 
    {
        header('Location: view\page\pag-register.php');
        exit;
    }
} 
else 
{
    header('Location: view\page\instalarSystem.php');
    exit;
}
//
