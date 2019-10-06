<?php
class conexion  
{
    public function  conectar($nombreBD)
    {
        @$SERVERNAME = gethostname();
        $conn = new PDO("sqlsrv:server=$SERVERNAME ; Database=$nombreBD", "XOSCAR", "QUIPU2846+*");
        //PARAMETROS de conexion base de datos , uid ,pwd
        //sqlsrv_connect se encarga de establecer conexion y resive 2 parametros 'el nombre del server '
        //y en el arrego de parametros 
        
        //abrimos una condicional para saber si se esta conctando a modelo
        if(!$conn)
        {
            //no retorna nada
			die( print_r( sqlsrv_errors(), true));
		}
        else
        {
            //retorna la conexion
            return $conn;
		}
    }
}


?>