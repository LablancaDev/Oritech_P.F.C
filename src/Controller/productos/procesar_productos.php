<?php

require '../../Model/productos/model_productos.php';

class ProcesarProductos {
    // Función para procesar la inserción de un producto en la base de datos
    public function procesarInsertarProducto() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['titulo']) && $_POST['descripcion'] && $_POST['precio'] && $_POST['fecha'] && $_POST['categoria_id'] && $_FILES['ruta_archivo']){
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $fecha = $_POST['fecha'];
                $categoria_id = $_POST['categoria_id'];
            
                // carpeta de destino para las imagenes
                $carpetaDestino = 'imgServer/';
    
                $nombreArchivo = uniqid() . '_' . $_FILES['ruta_archivo']['name'];
                
                $ruta_archivo = $carpetaDestino . $nombreArchivo;
    
                move_uploaded_file($_FILES['ruta_archivo']['tmp_name'], $ruta_archivo);
                    
                $insertar_productos = new GestionProductos();
                
                $insertar_productos->insertarProducto($titulo, $descripcion, $precio, $fecha, $categoria_id, $ruta_archivo);
            }  
        } 
    }
    // Función para procesar la obtención de todos los productos desde la base de datos
    public function procesarMostrarProductos() {
        $mostrarProductos = new GestionProductos();

        $productos = $mostrarProductos->mostrarProductos();

        return $productos;
    }
    // Función para procesar la obtención de un producto por el ID desde la base de datos
    public function procesarMostrarProductosPorId($id){
        $mostrarProductos = new GestionProductos();

        $productos = $mostrarProductos->mostrarProductosPorId($id);

        return $productos;
    }
    // Función para procesar la obtención de todos los productos en formato JSON
    public function procesarMostrarProductosJson(){

        $mostrarProductos = new GestionProductos();

        $productos = $mostrarProductos->mostrarProductos();

        echo json_encode($productos);
    }
    // Función para procesar la edición de un producto 
    public function procesarEditarProductos() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            if (
                isset($_POST['id']) && isset($_POST['titulo']) &&
                isset($_POST['descripcion']) &&
                isset($_POST['precio']) &&
                isset($_POST['fecha']) &&
                isset($_POST['categoria_id']) &&
                isset($_FILES['ruta_archivo'])
            ) {
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $fecha = $_POST['fecha'];
                $categoria_id = $_POST['categoria_id'];
    
                $carpetaDestino = 'imgServer/';
    
                $nombreArchivo = uniqid() . '_' . $_FILES['ruta_archivo']['name'];
                
                $ruta_archivo = $carpetaDestino . $nombreArchivo;
    
                move_uploaded_file($_FILES['ruta_archivo']['tmp_name'], $ruta_archivo);
                    
                $editar_productos = new GestionProductos();
                
                $editar_productos->editarProducto($id, $titulo, $descripcion, $precio, $fecha, $categoria_id, $ruta_archivo);
            }  
        } 
    }
    
    // Función para procesar la eliminación de un producto por id
    public function procesarEliminarProductos($id) {
        if(isset($_GET['accion'])){
            $id = $_GET['id'];

            $eliminarProducto = new GestionProductos();
    
            $eliminarProducto->eliminarProductos($id);
        }   
    }
}

    $procesarProductos = new ProcesarProductos();

    // Determinar qué acción se realiza 
    if (isset($_REQUEST['accion'])) {
        $accion = $_REQUEST['accion'];

        if ($accion == 'insertar') {
            $procesarProductos->procesarInsertarProducto();
        } elseif ($accion == 'mostrar') {
            $procesarProductos->procesarMostrarProductos(); 
        } elseif ($accion == 'editar') {
            $procesarProductos->procesarEditarProductos();
        } elseif ($accion == 'eliminar') {
            $procesarProductos->procesarEliminarProductos($id);
        } elseif($accion == 'mostrarJson'){
            $procesarProductos->procesarMostrarProductosJson();
        }else{

        }
    }

 
?>
