<?php
session_start();

if (isset($_SESSION['nombre_usuario'])) {
 
    header('Location: ../../View/vistasAdmin/vistaGestionProductos.php');
    exit(); 
}else{
    header('Location: ../../View/usuarios/iniciar_sesion.php');
}
?>
