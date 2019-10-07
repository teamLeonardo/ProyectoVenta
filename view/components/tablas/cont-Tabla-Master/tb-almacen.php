<?php 
include_once '../../../../model/tablapdo.php';
$obj = new phppdo;
?>
<script>
    
    $("#tbl-almacen").DataTable();

</script>
<style>
.hide{
    display: none;
}
</style>

<table id="tbl-almacen" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
    <?php $obj->listarTb('DISTRIBUIDORAGOLIMUNDOSAC','SELECT * FROM tbitems');?>

</table>