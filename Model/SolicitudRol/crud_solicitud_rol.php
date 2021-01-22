<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="ingresar_solicitud_rol"){
        $sr_id_persona = $_POST['sr_id_persona'];
        $sr_descripcion = $_POST['sr_descripcion'];        
        $sql="INSERT INTO `tbl_solicitud_rol`(`sr_id_persona`, `sr_descripcion`, `sr_estado`) VALUES ('$sr_id_persona','$sr_descripcion',1)";
        $query = $mysqli->query($sql);        
    }else{
        if($accion=="comprobar_solicitud_enviada_id_persona"){
            $sr_id_persona = $_POST['sr_id_persona'];        
            $sql="SELECT * FROM `tbl_solicitud_rol` WHERE `sr_id_persona`='$sr_id_persona' ";
            $query = $mysqli->query($sql);
            $datos = array();    
            while($resultado = $query->fetch_assoc()) {
                $datos[] = $resultado;
            }    
            echo json_encode($datos);
        }else{
            if($accion=="select_solicitud_rol"){        
                $sql="SELECT * FROM `tbl_solicitud_rol` JOIN tbl_persona ON tbl_persona.per_id = tbl_solicitud_rol.sr_id_persona WHERE `sr_estado`=1";
                $query = $mysqli->query($sql);
                $datos = array();    
                while($resultado = $query->fetch_assoc()) {
                    $datos[] = $resultado;
                }    
                echo json_encode($datos);
            }else{
                if($accion=="eliminar_solicitud_rol"){
                    $sr_id = $_POST['sr_id'];        
                    $sql="UPDATE `tbl_solicitud_rol` SET `sr_estado`=0 WHERE `sr_id`='$sr_id'";
                    $query = $mysqli->query($sql);
                }
            }
        }
    }
?>