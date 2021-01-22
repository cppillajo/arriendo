<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="ingresar_notificacion"){
        $no_id_persona_solicitante = $_POST['no_id_persona_solicitante'];
        $no_descripcion = $_POST['no_descripcion'];
        $no_id_inmueble = $_POST['no_id_inmueble'];
        $no_id_persona_arrendatario = $_POST['no_id_persona_arrendatario'];
        $sql="INSERT INTO `tbl_notificacion`(`no_id_persona_solicitante`, `no_id_persona_arrendatario`, `no_descripcion`, `no_id_inmueble`, `no_estado`) VALUES ('$no_id_persona_solicitante','$no_id_persona_arrendatario','$no_descripcion','$no_id_inmueble',1)";
        $query = $mysqli->query($sql);        
    }else{
        if($accion=="select_notificacion_id_persona"){
            $no_id_persona_solicitante=$_POST['no_id_persona_solicitante'];
            $sql="SELECT * FROM `tbl_notificacion` JOIN tbl_inmueble ON tbl_notificacion.no_id_inmueble=tbl_inmueble.in_id WHERE `no_id_persona_solicitante`='$no_id_persona_solicitante' AND `no_estado`=1";
            $query = $mysqli->query($sql);
            $datos = array();
            while($resultado = $query->fetch_assoc()) {
                $datos[] = $resultado;
            }
            echo json_encode($datos);
            
        }else{
            if($accion=="eliminar_notificacion"){
                $no_id = $_POST['no_id'];       
                $sql="UPDATE `tbl_notificacion` SET `no_estado`=0 WHERE `no_id`='$no_id'";
                $query = $mysqli->query($sql); 
            }
        }
    }
?>