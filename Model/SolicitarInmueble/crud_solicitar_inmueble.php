<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="solicitar_inmueble"){
        $sa_id_inmueble = $_POST['sa_id_inmueble'];
        $id_persona_solicitante = $_POST['id_persona_solicitante'];
        $id_persona_arrendador = $_POST['id_persona_arrendador'];
        $sql="INSERT INTO `tbl_solicitud_arriendo`(`sa_id_inmueble`, `sa_id_persona_solicitante`, `sa_id_persona_arrendatario`,`sa_estado`) VALUES ('$sa_id_inmueble','$id_persona_solicitante','$id_persona_arrendador',1)";
        $query = $mysqli->query($sql);        
    }else{
        if($accion=="interesados_inmueble"){            
            $id = $_POST['id'];
            $sql="SELECT * FROM `tbl_persona` JOIN  `tbl_solicitud_arriendo` ON tbl_persona.per_id=tbl_solicitud_arriendo.sa_id_persona_solicitante WHERE tbl_solicitud_arriendo.sa_id_inmueble='$id'";
            $query = $mysqli->query($sql);    
            $datos = array();    
            while($resultado = $query->fetch_assoc()) {
                $datos[] = $resultado;
            }    
            echo json_encode($datos);
        }else{
            if($accion=="comprobar_solicitud_repetida"){
                $sa_id_persona_solicitante = $_POST['sa_id_persona_solicitante'];
                $sa_id_inmueble = $_POST['sa_id_inmueble'];
                $sql="SELECT * FROM `tbl_solicitud_arriendo` WHERE `sa_id_persona_solicitante`='$sa_id_persona_solicitante' AND `sa_id_inmueble`='$sa_id_inmueble'  AND`sa_estado`=1";
                $query = $mysqli->query($sql);    
                $datos = array();    
                while($resultado = $query->fetch_assoc()) {
                    $datos[] = $resultado;
                }    
            echo json_encode($datos);
                
            }
        }
    }
?>