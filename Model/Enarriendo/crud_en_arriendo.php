<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="ingresar_en_arriendo"){
        $ea_id_persona_solicitante = $_POST['ea_id_persona_solicitante'];
        $ea_id_persona_arrendatario = $_POST['ea_id_persona_arrendatario'];
        $ea_id_inmueble = $_POST['ea_id_inmueble'];
        $sql="INSERT INTO `tbl_en_arriendo`(`ea_id_persona_solicitante`, `ea_id_persona_arrendatario`, `ea_id_inmueble`,`ea_estado`) VALUES ('$ea_id_persona_solicitante','$ea_id_persona_arrendatario','$ea_id_inmueble',1)";
        $query = $mysqli->query($sql);        
    }else{
        if($accion=="visulizar_en_arreindo"){
            $ea_id_persona_arrendatario = $_POST['ea_id_persona_arrendatario'];
            $sql="SELECT * FROM `tbl_en_arriendo` 
            JOIN `tbl_persona`  ON tbl_en_arriendo.ea_id_persona_solicitante = tbl_persona.per_id 
            JOIN `tbl_inmueble` ON tbl_en_arriendo.ea_id_inmueble = tbl_inmueble.in_id
            WHERE `ea_id_persona_arrendatario`='$ea_id_persona_arrendatario' AND `ea_estado`=1";
            $query = $mysqli->query($sql);
            $datos = array();
            while($resultado = $query->fetch_assoc()) {
                $datos[] = $resultado;
            }
            echo json_encode($datos);

        }else{
            if($accion=="eliminar_en_arreindo"){
                $ea_id = $_POST['ea_id'];
                $sql="UPDATE `tbl_en_arriendo` SET `ea_estado`=0 WHERE `ea_id`='$ea_id'";
                $query = $mysqli->query($sql);
            }
        }
    }
?>