<?php

require '../../../config/config.php';

class ModeloPedidos {

    public function insertarPedido($usuarioId, $totalPedido, $fecha, $estado) {
        global $conexion;
        
        $fecha = date('Y-m-d');
    
        $consulta = "INSERT INTO pedidos (usuario_id, total, fecha, estado) VALUES (?, ?, ?, ?)";
    
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if($stmt){
            mysqli_stmt_bind_param($stmt, 'idsd', $usuarioId, $totalPedido, $fecha, $estado);
            $resultado = mysqli_stmt_execute($stmt);
    
            if($resultado){

                $pedidoId = mysqli_insert_id($conexion);
                mysqli_stmt_close($stmt);
                return $pedidoId;
            }else{
                mysqli_stmt_close($stmt);
                throw new Exception("Error al insertar el pedido: " . mysqli_error($conexion));
            }
        }else{
            throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
        }   
    }
    
    
    public function insertarDetallePedido($pedidoId, $productId, $precio, $cantidad) {
        global $conexion;
        
        $consulta = "INSERT INTO detalle_pedidos (pedido_id, producto_id, precio, cantidad) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if($stmt){
            mysqli_stmt_bind_param($stmt, 'iiid', $pedidoId, $productId, $precio, $cantidad);
            $resultado = mysqli_stmt_execute($stmt);
    
            if(!$resultado){
                throw new Exception("Error al insertar el detalle del pedido: " . mysqli_error($conexion));
            }
            
            mysqli_stmt_close($stmt);
        }else{
            throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
        }   
    }

    public function obtenerComprasUsuario($userId) {
        global $conexion;
        
        $consulta = "SELECT * FROM pedidos WHERE usuario_id = ?";
        
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "i", $userId);
            
            mysqli_stmt_execute($stmt);
    
            $resultado = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($resultado) > 0) {

                $compras = array();

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $compras[] = $fila;
                }
    
                return $compras;
            } else {

                return array();
            }
    
        } else {

            throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
        }
    }

    public function obtenerDetallesPedido($pedidoId) {
        global $conexion;
        
        $consulta = "SELECT dp.*, p.titulo, p.foto AS imagen_url FROM detalle_pedidos dp
                     INNER JOIN productos p ON dp.producto_id = p.id
                     WHERE dp.pedido_id = ?";
        
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "i", $pedidoId);
    
            mysqli_stmt_execute($stmt);
    
            $resultado = mysqli_stmt_get_result($stmt);
    
            $detallesPedido = array();
    
            if (mysqli_num_rows($resultado) > 0) {

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $detallesPedido[] = $fila;
                }
            }
    
            mysqli_stmt_close($stmt);
    
            return $detallesPedido;
        } else {

            throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conexion));
        }
    }
    
    
}

?>

