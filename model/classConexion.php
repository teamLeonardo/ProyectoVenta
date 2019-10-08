<?php
class conexion  
{
    public function  conectar($nombreBD)
    {
        @$SERVERNAME = gethostname();
        //
        //$conn = new PDO("mysql:host=localhost;dbname=$nombreBD", "root", "");
       $conn = new PDO("sqlsrv:server=$SERVERNAME ; Database=$nombreBD", "XOSCAR", "QUIPU2846+*");
        //PARAMETROS de conexion base de datos , uid ,pwd
        
        //abrimos una condicional para saber si se esta conctando a modelo
        if (!$conn) {
            //no retorna nada
        } else {
            //retorna la conexion
            return $conn;
        }
    }
}


?>