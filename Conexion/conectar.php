<?php
/*
class MySQL{
    public $conexion;
    
    public function MySQL(){
        if(!isset($this->conexion)){
            $this->conexion=(mysqli_connect("localhost","root",""))
                    or die(mysqli_error());
            
            mysqli_select_db($this->conexion,"arriendo_inmobiliaria") or die (mysqli_error());
        }
    }
    
    public function consulta($consulta){
        $resultado= mysqli_query($this->conexion,$consulta);
        return $resultado;
    }
    public function real_escape_string($consulta){
        $resultado= mysqli_real_escape_string($this->conexion,$consulta);
        return $resultado;
    }
    
    public function fetch_array($consulta){
        return mysqli_fetch_array($consulta);
    }
    
    public function num_row($consulta){
        return mysqli_num_rows($consulta);
    }
    
}
*/

    
    // Variables de la conexion a la DB
    $mysqli = new mysqli("localhost","root","","arriendo_inmobiliaria");
    
    // Comprobamos la conexion
    if($mysqli->connect_errno) {
        die("Fallo la conexion");
    } else {
        //echo "Conexion exitosa";
    }
    


?>