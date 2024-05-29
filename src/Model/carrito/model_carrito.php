<?php

require '../../../config/config.php';

class ModelCarrito{

    public function insertar_producto_carrito($usuarioId, $productId, $precio, $cantidad){

        global $conexion;
    
        try {

            $consulta = 'INSERT INTO carrito_compras (usuario_id, producto_id, precio, cantidad) 
                         VALUES (?, ?, ?, ?)';
            
            $stmt = mysqli_prepare($conexion, $consulta);
    
            if($stmt){
                
                mysqli_stmt_bind_param($stmt, 'iiid', $usuarioId, $productId, $precio, $cantidad);
                
                $resultado = mysqli_execute($stmt);
    
                if($resultado){
                  
                }else{
                    throw new Exception("Error al insertar el producto: " . mysqli_error($conexion));
                }
                
                mysqli_stmt_close($stmt);
                mysqli_close($conexion);
    
            }else{
                throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
            }   
        } catch (Exception $e) {

            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function obtener_productos_carrito($usuarioId){
        global $conexion;
    
        $productos = [];
    
        // consulta para obtener los productos del carrito con sus detalles
        $consulta = 'SELECT producto_id, p.titulo, p.descripcion, p.foto, p.precio, c.cantidad
                     FROM carrito_compras c
                     INNER JOIN productos p ON c.producto_id = p.id
                     WHERE c.usuario_id = ?'; 
    
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if($stmt){
            mysqli_stmt_bind_param($stmt, 'i', $usuarioId);
    
            mysqli_stmt_execute($stmt);
    
            $resultado = mysqli_stmt_get_result($stmt);
    
            if($resultado){
                while($fila = mysqli_fetch_assoc($resultado)){
                    $productos[] = $fila;
                }
                mysqli_free_result($resultado); 
            } else {
         
                echo "No se encontraron productos en el carrito para el usuario con ID: " . $usuarioId;
            }
            mysqli_stmt_close($stmt);
        } else {
    
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
        }
       
        return $productos;
    }

    public function verificar_producto_en_carrito($productId) {
        global $conexion;
    
        try {
            // consulta preparada para verificar si el producto está en el carrito
            $consulta = 'SELECT COUNT(*) AS cantidad FROM carrito_compras WHERE producto_id = ?';
            $stmt = mysqli_prepare($conexion, $consulta);
    
            if ($stmt) {
              
                mysqli_stmt_bind_param($stmt, 'i', $productId);
        
                mysqli_stmt_execute($stmt);
      
                mysqli_stmt_bind_result($stmt, $cantidad);
      
                mysqli_stmt_fetch($stmt);
    
                mysqli_stmt_close($stmt);
    
                return $cantidad > 0;
            } else {
                throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
            }
        } catch (Exception $e) {
 
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    

    public function incrementar_cantidad_producto($productId) {
        global $conexion;

        try {
            // Preparar la consulta para incrementar la cantidad del producto en el carrito
            $consulta = 'UPDATE carrito_compras SET cantidad = cantidad + 1 WHERE producto_id = ?';

            $stmt = mysqli_prepare($conexion, $consulta);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'i', $productId);

                $resultado = mysqli_execute($stmt);

                if (!$resultado) {
                    throw new Exception("Error al incrementar la cantidad del producto en el carrito: " . mysqli_error($conexion));
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conexion);
            } else {
                throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
            }
        } catch (Exception $e) {
   
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public function reducir_cantidad_producto($productId) {
        global $conexion;

        try {
            // Preparar la consulta para reducir la cantidad del producto en el carrito
            $consulta = 'UPDATE carrito_compras SET cantidad = cantidad - 1 WHERE producto_id = ?';

            $stmt = mysqli_prepare($conexion, $consulta);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'i', $productId);

                $resultado = mysqli_execute($stmt);

                if (!$resultado) {
                    throw new Exception("Error al incrementar la cantidad del producto en el carrito: " . mysqli_error($conexion));
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conexion);
            } else {
                throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
            }
        } catch (Exception $e) {
   
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function eliminar_producto_carrito($productId){
      
        global $conexion;
    
        try {
            // Consulta SQL para eliminar el producto del carrito
            $consulta = 'DELETE FROM carrito_compras WHERE producto_id = ?';
    
            $stmt = mysqli_prepare($conexion, $consulta);
    
            if ($stmt) {
      
                mysqli_stmt_bind_param($stmt, 'i', $productId);
    
                $resultado = mysqli_execute($stmt);
    
                if (!$resultado) {
                    throw new Exception("Error al eliminar el producto del carrito: " . mysqli_error($conexion));
                }
    
                mysqli_stmt_close($stmt);
     
                mysqli_close($conexion);
    
                exit(); 
            } else {
                throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
            }
    
        } catch (Exception $e) {
           
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    
    
}

?>
