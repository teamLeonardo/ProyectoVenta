<?php
include_once 'Conexion/config.php';
class phppdo 
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
        }else{
            return $connect;
        }
    }  
    public function listarTb( $consulta, $parametros = array(), $estilos = array())
    {
        try {
            $conn = $this->connect($this->base);
            $query = $conn->prepare($consulta);

            $query->execute($parametros);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo 'vacio';
            } else {


                echo "<thead>";
                echo "<tr>";
                echo "<td class = 'hide'>invisivle</td>";
                foreach ($result[0] as $key => $value) {
                    $var = '';
                    foreach ($estilos as $com => $val) {
                        if ($key == $com) {
                            $var = $val;
                        }
                    }
                    echo "<th class = '{$key} {$var}'>{$key}</th>";
                }
                echo "</tr>";
                echo "</thead>";
                $total = count($result);
                echo "<tbody>";
                for ($i = 0; $i < $total; $i++) {
                    echo "<tr id='{$i}'>";
                    echo "<td class = 'hide'><input type=\"checkbox\"  ></td>";
                    foreach ($result[$i] as $key => $value) {
                        $var = '';
                        foreach ($estilos as $com => $val) {
                            if ($key == $com) {
                                $var = $val;
                            }
                        }
                        if ($var === 'editable') {
                            echo "<td class= '{$key} {$var}' id='{$i}'><input type=\"text\" name=\"\" class=\"{$key} {$var}\" value=\"{$value}\" readonly></td>";
                        } else {
                            echo "<td class= '{$key} {$var}' id='{$i}'>{$value}</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "<tfoot>";
                echo "<tr>";
                echo "<th class = 'hide'>invisivle</th>";
                foreach ($result[0] as $key => $value) {
                    $var = '';
                    foreach ($estilos as $com => $val) {
                        if ($key == $com) {
                            $var = $val;
                        }
                    }

                    echo "<th class = '{$key} {$var}'>{$key}</th>";
                }
                echo "</tr>";
                echo "</tfoot>";
                echo "</table>";
                $conn = null;
                $result = null;
            }
        } catch (Exception $e) {
            die(print_r($e->getMessage()));
        }
    }
    public function listarCB($bd = '', $string = '')
    {
        try {
            $conn = $this->conexionpdo($bd);
            $query = $conn->prepare($string);

            //var_dump($query);
            $query->execute();
            if ($query) {
                while ($result = $query->fetchAll(PDO::FETCH_NUM)) {
                    echo "<option value='" . $result[0] . "'>" . $result[1] . "</option>";
                }
            } else {
                echo "<option value='error'>no , salio error</option>";

                echo "<option value='false'>$string</option>";
            }


            $conn = null;
            $result = null;
        } catch (Exception $e) {
            die(print_r($e->getMessage()));
        }
    }
    function correrConsulta( $consulta = '', $parametros = array())
    {
        try {
            $arrayName = array();
            $conn = $this->connect($this->base);
            $query = $conn->prepare($consulta);
            $query->execute($parametros);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            if (is_bool($query)) {
                
            $arrayName['respuesta'] = $query;
            $arrayName['resultado'] = $result;
            }
            return $arrayName;
            $conn = null;
            $result = null;
        } catch (Exception $e) {
            die(print_r($e->getMessage()));
        }
    }
 
}
