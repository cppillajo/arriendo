<?php    
    require "../../Conexion/conectar.php";
    

    $accion = $_POST['accion'];
    if($accion=="todo_tipo_inmueble"){
        $sql="SELECT * FROM tbl_tipo_inmueble WHERE `tin_estado`='1'";
        $query = $mysqli->query($sql);
        $datos = array();
        while($resultado = $query->fetch_assoc()) {
            $datos[] = $resultado;
        }
        echo json_encode($datos);
    }else{
        if($accion=="ingresar_tipo_inmueble"){
            $tin_nombre = $_POST['tin_nombre'];
            $tin_descripcion = $_POST['tin_descripcion'];
            $tin_imagen = $_POST['tin_imagen'];
            $sql="INSERT INTO `tbl_tipo_inmueble`(`tin_nombre`, `tin_descripcion`, `tin_imagen`, `tin_estado`) VALUES ('$tin_nombre','$tin_descripcion','$tin_imagen',1)";
            $query = $mysqli->query($sql);
        }else{
            if($accion=="editar_tipo_inmueble"){   
                $id = $_POST['id'];             
                $tin_nombre = $_POST['tin_nombre'];
                $tin_descripcion = $_POST['tin_descripcion'];
                $tin_imagen = $_POST['tin_imagen'];
                $sql="UPDATE `tbl_tipo_inmueble` SET `tin_nombre`='$tin_nombre',`tin_descripcion`='$tin_descripcion',`tin_imagen`='$tin_imagen' WHERE `tin_id`='$id'";
                $query = $mysqli->query($sql);
            }else{
                if($accion=="eliminar_tipo_inmueble"){
                    $id = $_POST['id']; 
                    $sql="UPDATE `tbl_tipo_inmueble` SET `tin_estado`='0' WHERE `tin_id`='$id'";
                    $query = $mysqli->query($sql);
                }

            }

        }
    }
?>