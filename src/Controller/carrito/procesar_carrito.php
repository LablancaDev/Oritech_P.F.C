<?php

session_start();

require '../../Model/carrito/model_carrito.php';

class ControladorCarrito {
    private $modeloCarrito;

    public function __construct() {
        $this->modeloCarrito = new ModelCarrito();
    }

    public function insertar_producto_carrito($usuarioId, $productId, $precio, $cantidad) {
        if (isset($_SESSION['usuarioId'])) {
          
            $this->modeloCarrito->insertar_producto_carrito($usuarioId, $productId, $precio, $cantidad);
        } else {
            echo "Error: La sesión no está iniciada correctamente.";
        }
    }

    public function obtener_productos_carrito($usuarioId) {
        if (isset($_SESSION['usuarioId'])) {
            $productos = $this->modeloCarrito->obtener_productos_carrito($usuarioId);
            if ($productos !== null) {
               
                header('Content-Type: application/json');
                echo json_encode($productos);
            } else {
            
                http_response_code(204); 
            }
            exit; 
        }
    }
        public function verificar_producto_en_carrito($productId) {
        if (isset($_SESSION['usuarioId'])) {
            $enCarrito = $this->modeloCarrito->verificar_producto_en_carrito($productId);
            $response = array('enCarrito' => $enCarrito);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            echo json_encode(array('error' => 'La sesión no está iniciada correctamente.'));
        }
    }

    public function eliminar_producto_carrito($productId) {
        if (isset($_SESSION['usuarioId'])) {

            $this->modeloCarrito->eliminar_producto_carrito($productId);
        } else {
            echo "Error: La sesión no está iniciada correctamente.";
        }
    }

    public function incrementar_cantidad_producto($productId) {
        if (isset($_SESSION['usuarioId'])) {

            $this->modeloCarrito->incrementar_cantidad_producto($productId);
        } else {
            echo "Error: La sesión no está iniciada correctamente.";
        }
    }
    public function reducir_cantidad_producto($productId) {
        if (isset($_SESSION['usuarioId'])) {

            $this->modeloCarrito->reducir_cantidad_producto($productId);
        } else {
            echo "Error: La sesión no está iniciada correctamente.";
        }
    }
}

$procesarCarrito = new ControladorCarrito();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'insertar') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId']) && isset($_SESSION['usuarioId']) &&
            isset($_POST['precio']) && isset($_POST['cantidad'])) {

            $productId = $_POST['productId'];
            $usuarioId = $_SESSION['usuarioId'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];

            $procesarCarrito->insertar_producto_carrito($usuarioId, $productId, $precio, $cantidad);
        }
    }

    if ($action == 'obtener') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['usuarioId'])) {
            $usuarioId = $_SESSION['usuarioId'];

            $procesarCarrito->obtener_productos_carrito($usuarioId);
        }
    }

    if ($action == 'eliminar') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
            $productId = $_POST['productId'];
            $procesarCarrito->eliminar_producto_carrito($productId);
        }
    }

    if ($action == 'incrementar') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
            $productId = $_POST['productId'];
            $procesarCarrito->incrementar_cantidad_producto($productId);
        }
    }
    if ($action == 'verificar') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
            $productId = $_POST['productId'];
            $procesarCarrito->verificar_producto_en_carrito($productId);
        }
    }
    if ($action == 'reducir') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
            $productId = $_POST['productId'];
            $procesarCarrito->reducir_cantidad_producto($productId);
        }
    }
}
?>
