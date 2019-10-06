<?php
include_once 'classConexion.php';
//herencia de  conexion las funciones 
class classDatos extends conexion
{
    function jsonTabla($bd = '', $consulta = '' , $parametros = array())
    {
        try {
            $conn = $this->conectar($bd);
            $query = $conn->prepare($consulta);

            if (isset($parametros)) {
                $query->execute($parametros);
            }

            $stm = $query->fetchAll(PDO::FETCH_ASSOC);

            //inicialisar 
            
            if (count($stm) > 0) {

                return ($stm);
                $conn = null;
                $stm = null;

            } else {

                return ($stm);
                $conn = null;
                $stm = null;

            }
        } catch (Exception $e) {
            die(print_r($e->getMessage()));
        }
    }
    function correrConsulta($bd = '', $consulta = '', $parametros = array())
    {
        try {
            $conn = $this->conectar($bd);
            $query = $conn->prepare($consulta);
            $valor =  $query->execute($parametros);
            return $valor;
            $conn = null;
            $valor = null;
        } catch (Exception $e) {
            die(print_r($e->getMessage()));
        }
    }
    
}