<?php
    require "../../../config/config.php";

    class Usuarios {
        
        public function insertarUsuarios($nombre_usuario, $password, $nombre, $apellidos, $email, $telefono, $comentario, $rol_id){
            global $conexion;

            $consulta = 'INSERT INTO usuarios (nombre_usuario, clave , nombre, apellidos, email, telefono, comentario, rol_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
   
            $stmt = mysqli_prepare($conexion, $consulta);
            
            if ($stmt) {
                // función password_hash() para hashear la contraseña antes de almacenarla
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                echo "Contraseña original: " . $password . ", Contraseña hasheada: " . $password_hash;

                mysqli_stmt_bind_param($stmt, "sssssssi", $nombre_usuario, $password_hash, $nombre, $apellidos, $email, $telefono, $comentario, $rol_id);

                $resultado = mysqli_execute($stmt);

                if ($resultado) {  
                        header('Location: ../../View/usuarios/registro_usuario.php?registro_exitoso=1'); 
                        exit;
                } else {
                    echo "Error al crear el nuevo usuario: " . mysqli_error($conexion);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
            }
        }

        public function usuarioExiste($email){
            // lógica para verificar si el usuario ya existe por email

            global $conexion;

            $consulta = 'SELECT id FROM usuarios WHERE email = ?';
            $stmt = mysqli_prepare($conexion, $consulta);
        
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
        
                $num_filas = mysqli_stmt_num_rows($stmt);
        
                mysqli_stmt_close($stmt);
        
                return $num_filas > 0;
            } else {
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
                return false; 
            }

        }

       public function verificarUsuario($nombre_usuario, $password) {
            global $conexion;

            $consulta = 'SELECT id, nombre_usuario, clave, rol_id FROM usuarios WHERE nombre_usuario = ?';
            $stmt = mysqli_prepare($conexion, $consulta);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "s", $nombre_usuario);    
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) > 0) {
                   
                        mysqli_stmt_bind_result($stmt, $id, $nombre_usuario, $clave, $rol_id);
                        mysqli_stmt_fetch($stmt);

                        // var_dump($nombre_usuario, $password, $clave, $rol_id);

                        if (password_verify($password, $clave)) {
                         
                            return [
                                'id' => $id,
                                'nombre_usuario' => $nombre_usuario,
                                'rol_id' => $rol_id
                            ];
                        } else {

                            echo "Contraseña incorrecta";
                            return false;
                        }
                    } else {

                        echo "Usuario no encontrado";
                        return false;
                    }
                     mysqli_stmt_close($stmt);

                } else {
                    echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
                    return false;
            }
        }
    }

?>
