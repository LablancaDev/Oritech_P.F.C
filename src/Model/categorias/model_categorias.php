<?php

require_once(__DIR__ . '/../../../config/config.php');

class GestionCategorias {
    
    public function obtenerCategorias() {
        global $conexion;
    
        $consulta = 'SELECT * FROM categorias';
    
        $resultado = mysqli_query($conexion, $consulta);
    
        if ($resultado) {

            $categorias = array();
    
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $categorias[] = $fila;
            }

            mysqli_free_result($resultado); 
    
            return $categorias;
        } else {
      
            throw new Exception("Error en la consulta: " . mysqli_error($conexion));
        }
    } 

    public function obtenerCategoriaPorId($categoriaId){
        global $conexion;
        
        $consulta = 'SELECT nombre FROM categorias WHERE id = ?';
        $stmt = mysqli_prepare($conexion, $consulta);
        
        if($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $categoriaId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $categoria = mysqli_fetch_assoc($result);
            return $categoria;
        } else {
            throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
        }
    }
    

    public function obtenerProductosPorCategoria($id) {
        global $conexion;
        
        $consulta = 'SELECT * FROM productos WHERE categoria_id = ?';
        
        $stmt = mysqli_prepare($conexion, $consulta);

        if($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $productos = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $productos;
        } else {
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
            return null;
        }
    }
    public function eliminarProducto($id){
        global $conexion;
            
        $consulta = 'DELETE FROM productos WHERE id = ?';

        $stmt = mysqli_prepare($conexion, $consulta);

        if($stmt){
            mysqli_stmt_bind_param($stmt, 'i', $id);

            $resultado = mysqli_execute($stmt);
        }else{
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
        }
    }

    public function eliminarCategorias($id){
        global $conexion;
            
        $consulta = 'DELETE FROM categorias WHERE id = ?';
    
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if($stmt){
            mysqli_stmt_bind_param($stmt, 'i', $id);
    
            $resultado = mysqli_execute($stmt);
    
            if ($resultado) {
            
                header('Location: ../../View/vistasAdmin/vistaGestionCategorias.php');
                exit;
            } else {
  
                echo "Error al eliminar la categoría: " . mysqli_error($conexion);
            }
        }else{
  
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
        }
    }

    public function insertarCategoria($nombre){
        global $conexion;
    
        $consulta = 'INSERT INTO categorias (nombre) VALUES (?)';
    
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if($stmt){
    
            mysqli_stmt_bind_param($stmt, 's', $nombre);
    
            $resultado = mysqli_execute($stmt);
            
            if($resultado){
                header('Location: ../../View/vistasAdmin/vistaGestionCategorias.php');
                exit;
            }else{
                echo "Error al insertar la categoría: " . mysqli_error($conexion);
            }
        }else{
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
        }
    }
    
    public function actualizarCategoriaNombre($categoriaId, $nombre){
        global $conexion;
        
        $consulta = 'UPDATE categorias SET nombre = ? WHERE id = ?';
        $stmt = mysqli_prepare($conexion, $consulta);
        
        if($stmt) {
            mysqli_stmt_bind_param($stmt, 'si', $nombre, $categoriaId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: ../../View/vistasAdmin/vistaGestionCategorias.php");
            exit(); 
        } else {
            throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
        }
    }

    
}

?>
