<?php

session_start();

require "../../Model/pedidos/model_pedidos.php";

class ControladorPedidos{
    private $modeloPedidos;

    public function __construct(){
        $this->modeloPedidos = new ModeloPedidos();
    }

    public function insertarPedido($userId, $totalPedido, $fecha, $estado, $detalles){
        // Insertar el pedido en la base de datos y obtener el ID del pedido insertado
        $pedidoId = $this->modeloPedidos->insertarPedido($userId, $totalPedido, $fecha, $estado);
        
        if($pedidoId !== null){
      
            $detallesPedido = json_decode($detalles, true);

            foreach($detallesPedido as $detalle){
                $productId = $detalle['productId'];
                $precio = $detalle['precio'];
                $cantidad = $detalle['cantidad'];

                $this->modeloPedidos->insertarDetallePedido($pedidoId, $productId, $precio, $cantidad);
            }

            header('Content-Type: application/json');

            echo json_encode($pedidoId);
            
        } else {
        
            echo "Error al insertar el pedido";
        }
    }
}

$controladorPedidos = new ControladorPedidos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {        
    $data = json_decode(file_get_contents('php://input'), true); 

    if (isset($data['action']) && $data['action'] == 'tramitar_pedido') {
        if (isset($data['userId']) && isset($data['totalPedido']) && 
            isset($data['fecha']) && isset($data['estado']) && isset($data['detalles'])) {

                
            $userId = $data['userId'];
            $totalPedido = $data['totalPedido']; 
            $fecha = $data['fecha'];
            $estado = $data['estado'];
            $detalles = $data['detalles'];

            $controladorPedidos->insertarPedido($userId, $totalPedido, $fecha, $estado, $detalles);
        }
    }
}

?>
