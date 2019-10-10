<?php
include_once 'model/tablapdo.php';
$obj = new phppdo('master');
?>
<table>
<?php 
$obj->correrConsulta("select name from sys.databases where name in('EmpresaControl','PuntoDeVenta')")

?>
</table>