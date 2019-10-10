<?php
include_once 'config.php';
class CONEXION
{
    var $base;
    public function __construct($basedatos)
    {
        $this->base = $basedatos;
    }
    public function connect(){

        $connect = new PDO("sqlsrv:Server=".HOST.";Database={$this->base}","".USER."" , "".PASS."");
        
        if (!$connect) {
            echo "\nPDO::errorInfo():\n";
            print_r('DBTOTAL'->errorInfo());
        }else{
            return $connect;
        }
    }   
}
?>