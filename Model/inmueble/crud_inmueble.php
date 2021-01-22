<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="select_inmueble_segun_tipo_inmueble"){
        $id=$_POST['id'];
        $sql="SELECT * FROM `tbl_inmueble`  JOIN `tbl_tipo_inmueble` ON `tbl_inmueble`.`in_id_tipo_inmueble`=`tbl_tipo_inmueble`.`tin_id`  WHERE in_id_tipo_inmueble='$id' and `in_estado`=1";
        $query = $mysqli->query($sql);
        $datos = array();
        while($resultado = $query->fetch_assoc()) {
            $datos[] = $resultado;
        }
        echo json_encode($datos);
    }else{
        if($accion=="select_inmueble_segun_id"){
            $id=$_POST['id'];
            $sql="SELECT * FROM tbl_inmueble JOIN tbl_persona ON tbl_inmueble.in_id_persona = tbl_persona.per_id WHERE in_id='$id' and `in_estado` =1";
            $query = $mysqli->query($sql);
            $datos = array();
            while($resultado = $query->fetch_assoc()) {
                $datos[] = $resultado;
            }
            echo json_encode($datos);
        }else{
            if($accion=="select_inmueble_segun_id_persona"){
                $id = $_POST['id'];
                $sql="SELECT * FROM `tbl_inmueble` WHERE `in_id_persona`='$id' and `in_estado` =1";
                $query = $mysqli->query($sql);
                $datos = array();
                while($resultado = $query->fetch_assoc()) {
                    $datos[] = $resultado;
                }
                echo json_encode($datos);
            }else{
                if($accion=="ingresar_inmueble"){
                    $in_id_tipo_inmueble = $_POST['in_id_tipo_inmueble'];
                    $in_id_persona = $_POST['in_id_persona'];
                    $in_descripcion = $_POST['in_descripcion'];
                    $in_direccion = $_POST['in_direccion'];
                    $in_num_cuarto = $_POST['in_num_cuarto'];
                    $in_num_baño = $_POST['in_num_baño'];
                    $in_num_sala = $_POST['in_num_sala'];
                    $in_num_cocina = $_POST['in_num_cocina'];
                    $in_num_parqueadero = $_POST['in_num_parqueadero'];
                    $in_inmueble_amoblado = $_POST['in_inmueble_amoblado'];
                    $in_tamaño = $_POST['in_tamaño'];
                    $in_contrato = $_POST['in_contrato'];
                    $in_precio_inmueble = $_POST['in_precio_inmueble'];
                    $in_imagen = $_POST['in_imagen'];
                    $in_latitud = $_POST['in_latitud'];
                    $in_longitud = $_POST['in_longitud'];
                    $sql="INSERT INTO `tbl_inmueble`(`in_id_tipo_inmueble`, `in_id_persona`, `in_descripcion`, `in_direccion`, `in_num_cuarto`, `in_num_baño`, `in_num_sala`, `in_num_cocina`, `in_num_parqueadero`, `in_inmueble_amoblado`, `in_tamaño`, `in_contrato`, `in_precio_inmueble`, `in_imagen`, `in_latitud`, `in_longitud`, `in_estado`) VALUES ('$in_id_tipo_inmueble','$in_id_persona','$in_descripcion','$in_direccion','$in_num_cuarto','$in_num_baño','$in_num_sala','$in_num_cocina','$in_num_parqueadero','$in_inmueble_amoblado','$in_tamaño','$in_contrato','$in_precio_inmueble','$in_imagen','$in_latitud','$in_longitud',1)";
                    $query = $mysqli->query($sql);
                }else{
                    if($accion=="actualizar_inmueble"){
                        $in_id = $_POST['in_id'];
                        $in_id_tipo_inmueble = $_POST['in_id_tipo_inmueble'];
                        $in_id_persona = $_POST['in_id_persona'];
                        $in_descripcion = $_POST['in_descripcion'];
                        $in_direccion = $_POST['in_direccion'];                        
                        $in_num_cuarto = $_POST['in_num_cuarto'];
                        $in_num_baño = $_POST['in_num_baño'];
                        $in_num_sala = $_POST['in_num_sala'];
                        $in_num_cocina = $_POST['in_num_cocina'];
                        $in_num_parqueadero = $_POST['in_num_parqueadero'];
                        $in_inmueble_amoblado = $_POST['in_inmueble_amoblado'];
                        $in_tamaño = $_POST['in_tamaño'];
                        $in_contrato = $_POST['in_contrato'];
                        $in_precio_inmueble = $_POST['in_precio_inmueble'];
                        $in_imagen = $_POST['in_imagen'];
                        $in_latitud = $_POST['in_latitud'];
                        $in_longitud = $_POST['in_longitud'];
                        $sql="UPDATE `tbl_inmueble` SET `in_id_tipo_inmueble`='$in_id_tipo_inmueble',`in_id_persona`='$in_id_persona',`in_descripcion`='$in_descripcion',`in_direccion`='$in_direccion',`in_num_cuarto`='$in_num_cuarto',`in_num_baño`='$in_num_baño',`in_num_sala`='$in_num_sala',`in_num_cocina`='$in_num_cocina',`in_num_parqueadero`='$in_num_parqueadero',`in_inmueble_amoblado`='$in_inmueble_amoblado',`in_tamaño`='$in_tamaño',`in_contrato`='$in_contrato',`in_precio_inmueble`='$in_precio_inmueble',`in_imagen`='$in_imagen',`in_latitud`='$in_latitud',`in_longitud`='$in_longitud',`in_estado`=1 WHERE `in_id`='$in_id'";
                        $query = $mysqli->query($sql);
                    }else{
                        if($accion=="eliminar_inmueble"){                            
                            $in_id = $_POST['in_id'];
                            $sql="UPDATE `tbl_inmueble` SET `in_estado`='0' WHERE `in_id`='$in_id'";
                            $query = $mysqli->query($sql);
                        }
                    }
                }
            }
        }
    }
?>