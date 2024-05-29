<?php
session_start();

require_once "../../Model/pedidos/model_pedidos.php";

class ControladorPedidos {
    private $modeloPedidos;

    public function __construct() {
        $this->modeloPedidos = new ModeloPedidos();
    }

    public function obtenerDetallesPedido() {
      
        $pedidoId = $_POST['pedidoId'];

        $detallesPedido = $this->modeloPedidos->obtenerDetallesPedido($pedidoId);

        header('Content-Type: application/json');
        echo json_encode($detallesPedido);
    }
}

$controladorPedidos = new ControladorPedidos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controladorPedidos->obtenerDetallesPedido();
}
?>
