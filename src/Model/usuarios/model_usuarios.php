<?php

    require '../../../config/config.php';

    class Usuarios{

        public function mostrarUsuarios(){

            global $conexion;
            
            $consulta = 'SELECT id, nombre_usuario, clave, nombre, apellidos, email, telefono, comentario, rol_id FROM usuarios';

            $resultado = mysqli_query($conexion, $consulta);

            if($resultado){

                $usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

                return $usuarios;
            }else{
                echo "Error en la consulta: " . mysqli_error($conexion);
                return null; 
            }
        }

        public function eliminarUsuarios($id){
            global $conexion;
            
            $consulta = 'DELETE FROM usuarios WHERE id = ?';

            $stmt = mysqli_prepare($conexion, $consulta);

            if($stmt){
                mysqli_stmt_bind_param($stmt, 'i', $id);

                $resultado = mysqli_execute($stmt);

                if($resultado){
                  
                }else{
                    echo "Error al eliminar el producto: " . mysqli_error($conexion);
                }
            }else{
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
            }
        }
        public function mostrarUsuariosPorId($id){
            global $conexion;
            
            $consulta = 'SELECT id, nombre_usuario, clave, nombre, apellidos, email, telefono, comentario, rol_id FROM usuarios WHERE id = ?';
    
            $stmt = mysqli_prepare($conexion, $consulta);
    
            if($stmt){
                mysqli_stmt_bind_param($stmt, 'i', $id);
    
                $resultado = mysqli_execute($stmt);
    
                if($resultado){
                    $usuario = mysqli_stmt_get_result($stmt);
                    return mysqli_fetch_assoc($usuario);
                }else{
                    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
                    return null;
                }
            }else{
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
                return null;
            }
        }
    }


?>