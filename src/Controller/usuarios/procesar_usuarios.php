<?php

require '../../Model/usuarios/model_usuarios.php';

class procesarUsuarios {
    
    public function procesarMostrarUsuarios(){
        $mostrarUsuarios = new Usuarios();
        $usuarios = $mostrarUsuarios->mostrarUsuarios();
        return $usuarios;
    }

    // Eliminar usuario desde cuenta de usuario, destruyendo la sesión
    public function procesarEliminarUsuarios($id){
       
        $eliminarUsuarios = new Usuarios();
        $eliminarUsuarios->eliminarUsuarios($id);

        session_start();
       
        if(isset($_SESSION['nombre_usuario'])){
            session_destroy(); 
        }
        
        header("Location: ../../usuarios/iniciar_sesion.php");
        exit();
    }
    // Eliminar usuario desde cuenta de Interfaz de Admin, sin destruir la sesión
    public function procesarEliminarUsuariosDesdeAdmin($id){

        $eliminarUsuarios = new Usuarios();
        $eliminarUsuarios->eliminarUsuarios($id);

        header("Location: ../../view/vistasAdmin/vistaGestionUsuarios.php");
        exit();
    }

    public function procesarMostrarUsuariosPorId($id){
        $mostrarUsuarios = new Usuarios();
        $usuarios = $mostrarUsuarios->mostrarUsuariosPorId($id);
        return $usuarios;
    }
}

if(isset($_GET['eliminar_usuario'])){
    $id = $_GET['eliminar_usuario'];
    $controller = new procesarUsuarios();
    $controller->procesarEliminarUsuarios($id);
}
if(isset($_GET['eliminar_usuario_admin'])){
    $id = $_GET['eliminar_usuario_admin'];
    $controller = new procesarUsuarios();
    $controller->procesarEliminarUsuariosDesdeAdmin($id);
}

?>
