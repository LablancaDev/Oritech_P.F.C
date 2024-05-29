<?php

require_once __DIR__ . '/../../Model/usuarios/insertar_usuarios.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre_usuario']) && isset($_POST['password']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['comentario'])) {
        $nombre_usuario = $_POST['nombre_usuario'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $comentario = $_POST['comentario'];

        $es_administrador = false;

        // verificar si el nombre de usuario es "admin" y la contraseña es "Admin1234"
        if ($nombre_usuario === 'admin' && $password === 'Admin1234') {
            $es_administrador = true;
        }

        if ($es_administrador) {
            $rol_id = 2;  // 2 es el id para el rol de administrador
        } else {
            $rol_id = 1;  // 1 es el id para el rol de usuario normal
        }

        // verificación de existencia de usuario por email
        $insertarUsuarios = new Usuarios();
        if ($insertarUsuarios->usuarioExiste($email)) {
            // error: el usuario ya está registrado
            header('Location: ../../View/usuarios/registro_usuario.php?usuario_existente=1');
            exit;
        }

        $insertarUsuarios->insertarUsuarios($nombre_usuario, $password, $nombre, $apellidos, $email, $telefono, $comentario, $rol_id);
    } else {
        // error: algún campo obligatorio está vacío
        header('Location: registro_usuario.php?error=campos_vacios');
        exit;
    }
}

?>

