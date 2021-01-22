<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="seleccionar_roles"){
        $sql="SELECT * FROM `tbl_rol` WHERE `rol_estado`='1'";
        $query = $mysqli->query($sql);
        $datos = array();
        while($resultado = $query->fetch_assoc()) {
            $datos[] = $resultado;
        }
        echo json_encode($datos);
    }
    
?>