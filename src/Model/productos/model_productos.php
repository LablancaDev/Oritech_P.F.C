<?php

    require '../../../config/config.php';

    class GestionProductos{

        public function insertarProducto($titulo, $descripcion, $precio, $fecha, $categoria_id, $ruta_archivo){
            global $conexion;
            
            $consulta = 'INSERT INTO productos (titulo, descripcion, foto, precio, categoria_id, fecha) VALUES (?,?,?,?,?,?)';

            $stmt = mysqli_prepare($conexion, $consulta);

            if($stmt){
                mysqli_stmt_bind_param($stmt, "sssdis", $titulo, $descripcion, $ruta_archivo, $precio, $categoria_id, $fecha );
                
                $resultado = mysqli_execute($stmt);

                if($resultado){
                    header('Location: ../administrador/vista_administrador.php');
                }else{
                    echo "Error al insertar el producto: " . mysqli_error($conexion);
                }

            }else{
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
            }   
        }

        public function mostrarProductos(){
            global $conexion;

            $productos = [];

            $consulta = 'SELECT * FROM productos';

            $stmt = mysqli_prepare($conexion, $consulta);

            if($stmt){
                mysqli_stmt_execute($stmt);

                $resultado = mysqli_stmt_get_result($stmt);

                if($resultado){
                    while($fila = mysqli_fetch_assoc($resultado)){
                        $productos[] = $fila;
                    }
                }
                mysqli_stmt_close($stmt);
            }
            return $productos;
        }

        public function mostrarProductosPorId($id){
            global $conexion;

            $productos = [];

            $consulta = 'SELECT * FROM productos WHERE id = ?';

            $stmt = mysqli_prepare($conexion, $consulta);

            if($stmt){
                mysqli_stmt_bind_param($stmt, 'i', $id);

                mysqli_stmt_execute($stmt);

                $resultado = mysqli_stmt_get_result($stmt);

                if($resultado){
                    while($fila = mysqli_fetch_assoc($resultado)){
                        $productos[] = $fila;
                    }
                }
                mysqli_stmt_close($stmt);
            }
            return $productos;
        }

        public function eliminarProductos($id){
            global $conexion;

            $consulta = 'DELETE FROM productos WHERE id = ?';

            $stmt = mysqli_prepare($conexion, $consulta);

            if($stmt){
                mysqli_stmt_bind_param($stmt, 'i', $id);

                $resultado = mysqli_execute($stmt);

                if($resultado){
                    header('Location: ../../View/vistasAdmin/vistaGestionProductos.php');
                    exit;
                }else{
                    echo "Error al eliminar el producto: " . mysqli_error($conexion);
                }
            }else{
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
            }
        }
        public function editarProducto($id, $titulo, $descripcion, $precio, $fecha, $categoria_id, $ruta_archivo){
            global $conexion;
        
            $consulta = 'UPDATE productos SET titulo=?, descripcion=?, foto=?, precio=?, categoria_id=?, fecha=? WHERE id=?';
        
            $stmt = mysqli_prepare($conexion, $consulta);
        
            if($stmt){
                mysqli_stmt_bind_param($stmt, "sssdisi", $titulo, $descripcion, $ruta_archivo, $precio, $categoria_id, $fecha, $id);
        
                $resultado = mysqli_execute($stmt);
        
                if($resultado){
                    header('Location: ../administrador/vista_administrador.php');
                }else{
                    echo "Error al editar el producto: " . mysqli_error($conexion);
                }
        
            }else{
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
            }   
        }
        
    }
    


?>