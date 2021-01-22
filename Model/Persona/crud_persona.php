<?php
   
    require "../../Conexion/conectar.php";

    
    $accion = $_POST['accion'];

    if($accion=="login"){  
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $sql="SELECT * FROM tbl_persona WHERE (per_correo = '$usuario' and per_password = '$password')  or (per_usuario='$usuario'  and per_password = '$password') and `per_estado` = 1";
        $query = $mysqli->query($sql);    
        $datos = array();    
        while($resultado = $query->fetch_assoc()) {
            $datos[] = $resultado;
        }    
        echo json_encode($datos);
    }else{
        if($accion=="selectpersonas"){
            $sql="SELECT * FROM `tbl_persona` JOIN tbl_rol ON tbl_persona.per_rol=tbl_rol.rol_id where per_estado='1'";
            $query = $mysqli->query($sql);    
            $datos = array();    
            while($resultado = $query->fetch_assoc()) {
                $datos[] = $resultado;
            }    
            echo json_encode($datos);
        }else{
            if($accion=="registro_usuario"){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $direccion = $_POST['direccion'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $imagen = $_POST['imagen'];                
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                $sql="INSERT INTO `tbl_persona`(`per_nombre`, `per_apellido`, `per_direccion`, `per_telefono`, `per_correo`, `per_imagen`, `per_usuario`, `per_password`, `per_estado`,`per_rol`) VALUES ('$nombre','$apellido','$direccion','$telefono','$correo','$imagen','$usuario','$password',1,3)";
                $query = $mysqli->query($sql); 
            }else{
                if($accion=="editar_usuario"){
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $direccion = $_POST['direccion'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $imagen = $_POST['imagen'];                
                    $usuario = $_POST['usuario'];
                    $password = $_POST['password'];
                    $sql="UPDATE `tbl_persona` SET `per_nombre`='$nombre',`per_apellido`='$apellido',`per_direccion`='$direccion',`per_telefono`='$telefono',`per_correo`='$correo',`per_imagen`='$imagen',`per_usuario`='$usuario',`per_password`='$password' WHERE `per_id`='$id'";
                    $query = $mysqli->query($sql);
                }else{
                    if($accion=="eliminar_persona"){
                        $id = $_POST['id'];
                        $sql="UPDATE `tbl_persona` SET `per_estado`='0' WHERE `per_id`='$id'";
                        $query = $mysqli->query($sql);

                    }else{
                        if($accion=="select_una_persona_por_id"){
                            $per_id = $_POST['per_id'];
                            $sql="SELECT * FROM `tbl_persona` WHERE `per_id`='$per_id'  and `per_estado`=1";
                            $query = $mysqli->query($sql);    
                            $datos = array();    
                            while($resultado = $query->fetch_assoc()) {
                                $datos[] = $resultado;
                            }    
                            echo json_encode($datos);

                        }else{
                            if($accion=="asignar_rol_persona_segun_id"){
                                $per_rol = $_POST['per_rol'];
                                $per_id = $_POST['per_id'];
                                $sql="UPDATE `tbl_persona` SET `per_rol`='$per_rol' WHERE `per_id`='$per_id'";
                                $query = $mysqli->query($sql);  
                            }else{
                                if($accion=="comprobar_usuario_existente"){                                        
                                    $per_correo = $_POST['per_correo'];
                                    $per_usuario = $_POST['per_usuario'];
                                    $sql="SELECT  `per_correo`, `per_usuario` FROM `tbl_persona` WHERE `per_correo`='$per_correo' OR `per_usuario`='$per_usuario' AND `per_estado`=1";
                                    $query = $mysqli->query($sql);    
                                    $datos = array();    
                                    while($resultado = $query->fetch_assoc()) {
                                        $datos[] = $resultado;
                                    }    
                                    echo json_encode($datos);
                                }
                                    
                                    
                                
                            }
                        }
                    }
                }
            }

        }
    }
    



?>