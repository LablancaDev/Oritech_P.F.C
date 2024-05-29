<?php

    require '../../Model/categorias/model_categorias.php';
    // Clase que se encarga de gestionar las operaciones relacionadas con las categorías en la tienda
    class ControladorCategorias {
        private $modeloCategorias;
      
        public function __construct() {
        
            $this->modeloCategorias = new GestionCategorias();
        }   

        // Función para obtener y mostrar todas las categorías
        public function mostrarCategorias() {   
   
            $categorias = $this->modeloCategorias->obtenerCategorias();

            return $categorias;
        }

         // Función para mostrar productos por categoría mediante el id
        public function mostrarProductosPorCategoria($id) {   
   
            $productos = $this->modeloCategorias->obtenerProductosPorCategoria($id);

            header('Content-Type: application/json');
            echo json_encode($productos);
            exit; 
        }   

        // Función para eliminar una categoría y sus productos asociados
        public function eliminarCategorias($id){
             // verificar si hay productos asociados a la categoría
            $productos = $this->modeloCategorias->obtenerProductosPorCategoria($id);

             // si hay productos asociados, eliminarlos primero
            if ($productos) {
                foreach ($productos as $producto) { 
                    $this->modeloCategorias->eliminarProducto($producto['id']);
                }
            }
            // luego elimina la categoría
           $this->modeloCategorias->eliminarCategorias($id);
        }
        
        public function insertarCategoria($nombre){

            $this->modeloCategorias->insertarCategoria($nombre);
        }
        public function mostrarCategoriaPorId($categoriaId) {   
    
            $categorias = $this->modeloCategorias->obtenerCategoriaPorId($categoriaId);
    
            return $categorias;
        }
        public function actualizarCategoria($id, $nombre){
            $this->modeloCategorias->actualizarCategoriaNombre($id, $nombre);
        }
        
    }

    if(isset($_GET['eliminar_categoria'])){

        $id = $_GET['eliminar_categoria'];

        $controller = new ControladorCategorias();

        $controller->eliminarCategorias($id);  
    }
    
    if(isset($_POST['nombre']) && isset($_POST['categoria_id'])){
        $nombre = $_POST['nombre'];
        $id = $_POST['categoria_id'];
       
        $controller = new ControladorCategorias();
        $controller->actualizarCategoria($id, $nombre);
    }
    
    if(isset($_POST['nombre'])){
        
        $nombre = $_POST['nombre'];

        $controller = new ControladorCategorias();
        $controller->insertarCategoria($nombre);
    }

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        $controller = new ControladorCategorias();
        $controller->mostrarProductosPorCategoria($id);

    }
   
    
?>


