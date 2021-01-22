<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="select_galeria_segun_id_inmueble"){   
        $gal_id = $_POST['gal_id'];     
        $sql="SELECT * FROM `tbl_galeria` WHERE `gal_id_inmueble`='$gal_id' AND `gal_estado` = '1'";
        $query = $mysqli->query($sql); 
        $datos = array();    
        while($resultado = $query->fetch_assoc()) {
            $datos[] = $resultado;
        }    
        echo json_encode($datos);       
    }else{
        if($accion=="insert_galeria_segun_id_inmueble"){
            $gal_imagen = $_POST['gal_imagen'];
            $gal_id_inmueble = $_POST['gal_id_inmueble'];
            $sql="INSERT INTO `tbl_galeria`( `gal_id_inmueble`, `gal_imagen`, `gal_estado`) VALUES ('$gal_id_inmueble','$gal_imagen','1')";
            $query = $mysqli->query($sql);
        }else{
            if($accion=="eliminar_foto_galeria_segun_gal_id"){
                $gal_id = $_POST['gal_id'];                
                $sql="UPDATE `tbl_galeria` SET `gal_estado`='0' WHERE `gal_id`='$gal_id'";
                $query = $mysqli->query($sql);

            }
        }
    }
?>