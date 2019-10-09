<?php
include_once 'config.php';
class CONEXION
{
    
    public function connect(){

        $connect = new PDO("sqlsrv:Server=".HOST.";Database=".BASE."","".USER."" , "".PASS."");
        
        if (!$connect) {
            echo "\nPDO::errorInfo():\n";
            print_r('DBTOTAL'->errorInfo());
        }else{
            return $connect;
        }
    }   
}
?>