<?php
//include_once 'config.php';
class base{
    public  static function connect(){
        @$SERVERNAME=gethostname();
        $connect = new PDO("sqlsrv:Server=$SERVERNAME;Database=DBTOTAL", 'sa' , '2087390148');
        if (!$connect) {
            echo "\nPDO::errorInfo():\n";
            print_r('DBTOTAL'->errorInfo());
        }else{
            echo 'OK';
        }
    }   
}
?>