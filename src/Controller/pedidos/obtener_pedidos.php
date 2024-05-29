<?php
session_start();

require_once "../../Model/pedidos/model_pedidos.php";

// La clase ControladorPedidos se encarga de manejar las solicitudes relacionadas con los pedidos en la tienda
class ControladorPedidos {
    private $modeloPedidos;

    public function __construct() {
        $this->modeloPedidos = new ModeloPedidos();
    }

    public function mostrarCompras() {

        $userId = $_POST['userId'];


        $compras = $this->modeloPedidos->obtenerComprasUsuario($userId);

        // se itera sobre las compras para obtener los detalles de cada pedido
        foreach ($compras as &$compra) {
            $pedidoId = $compra['id'];
            $detallesPedido = $this->modeloPedidos->obtenerDetallesPedido($pedidoId);
            $compra['detalles'] = $detallesPedido;
        }

        // devolver las compras con los detalles de cada pedido como JSON
        header('Content-Type: application/json');
        echo json_encode($compras);
    }
}


$controladorPedidos = new ControladorPedidos();

// se maneja la solicitud según el método HTTP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    if ($action === 'mostrar_compras') {

        $controladorPedidos->mostrarCompras();
    }
}
?>


