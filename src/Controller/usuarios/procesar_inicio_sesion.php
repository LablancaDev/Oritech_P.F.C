<?php
    session_start();

    session_start();

    // se verifica si la sesión ya está iniciada
    if(isset($_SESSION['usuarioId'])){
        
        header('Location: ../../View/usuarios/iniciar_sesion.php?sesion_ya_iniciada=1');
        exit;
    }

    require '../../Model/usuarios/insertar_usuarios.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['nombre_usuario']) && isset($_POST['password'])){
            $nombre_usuario = $_POST['nombre_usuario'];
            $password = $_POST['password'];

        $iniciar_sesion = new Usuarios();

        $resultado = $iniciar_sesion->verificarUsuario($nombre_usuario, $password);

        // Este código maneja el resultado según el rol del usuario para redirigirlo a la vista que le corresponde
        if ($resultado) {
    
            $_SESSION['usuarioId'] = $resultado['id'];

            $_SESSION['nombre_usuario'] = $resultado['nombre_usuario'];
            $rol_id = $resultado['rol_id'];

            // Redirigir según el rol
            if ($rol_id == 2) {
                // administrador
                header('Location: ../administrador/vista_administrador.php');
                exit;
            } else {
                // usuario normal
                header('Location: ../../../public/pagina_principal.php');
                exit;
            }
            } else {
                // Error en el inicio de sesión, envío la variable en la url por el método GET para tratar el error con un popup
                header('Location: ../../View/usuarios/iniciar_sesion.php?inicio_sesion_fallido=1');
                exit;
            }

        }
    }




?>