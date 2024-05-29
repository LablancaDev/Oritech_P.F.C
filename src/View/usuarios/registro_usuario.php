<?php

if (isset($_GET['registro_exitoso']) && $_GET['registro_exitoso'] == 1) {
    // Se muestra el pop-up de Bootstrap con Javascript si la variable registro_exitoso existe
    echo '<script>
           document.addEventListener("DOMContentLoaded", function(){
                let myModal = new bootstrap.Modal(document.getElementById("myModal"));
                myModal.show();
           });
          </script>';
}
if (isset($_GET['usuario_existente']) && $_GET['usuario_existente'] == 1) {
    // Se muestra el pop-up si la variable usuario_existente existe
    echo '<script>
           document.addEventListener("DOMContentLoaded", function(){
                let myModalError = new bootstrap.Modal(document.getElementById("myModalError"));
                myModalError.show();
           });
          </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuarios | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/registro_usuario.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <img src="../../../public/img/logo.png" class="ms-3" style="max-width: 50px;" alt="">
            <a class="navbar-brand title" href="#">OriTech</a>
                <button class="navbar-toggler text-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item hover-bg">
                    <a class="nav-link text-light" aria-current="page" href="../../../public/pagina_principal.php">Tienda</a>
                    </li>
                    <li class="nav-item hover-bg">
                    <a class="nav-link text-light" href="../noticias/noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item dropdown hover-bg">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menú
                    </a>
                    <ul class="dropdown-menu">
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../../../public/pagina_principal.php">Volver a la Tienda</a></li>
                    </ul>
                    </li>
                </ul>
                <div class="text-light d-flex align-items-center me-3">
                    <div class="me-3 hover-bg p-2 position-relative">
                        <a href="#" class="text-decoration-none text-light" id="miCuentaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mi Cuenta <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../View/usuarios/iniciar_sesion.php">Iniciar Sesión</a></li>
                            <li><a class="dropdown-item" href="../../Controller/usuarios/procesar_cierre_sesion.php">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    <div class="me-3 hover-bg p-2">
                    <a href="../../View/carrito/vista_carrito.php" class="text-decoration-none text-light">Carrito <i class="bi bi-cart3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid fondo">
        <div class="row justify-content-center ps-5 pe-5 align-items-center min-vh-100">
            <div class="col-12 col-md-8 col-lg-5 p-3 mb-5 login mt-4">
                <h2 class="text-center text-white mb-4">Registro de Usuario</h2>

                <form action="../../../src/controller/usuarios/procesar_registro.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre_usuario" class="form-label text-white">Nombre de Usuario</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-white">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label text-white">Apellidos</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label text-white">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-telephone-fill"></i>
                            </span>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comentario" class="form-label text-white">Comentario</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-chat-dots-fill"></i>
                            </span>
                            <input type="text" class="form-control" id="comentario" name="comentario" required>
                        </div>
                    </div>
                    <input type="hidden" name="rol_id" value="1">
                    <input type="submit" class="btn btn-primary w-50 mt-4 mx-auto d-block" value="Registrarse">
                </form>
            </div>
        </div>
    </div>
    <!--POP-UP LOGIN CORRECTO -->
    <!-- pop-up de Bootstrap registro con éxito, salta con la lógica de el código php del inicio de ésta página-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Registro Exitoso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bienvenido a OriTech</p>
                    <p>¡Gracias por registrarte!</p>
                </div>
                <div class="modal-footer">
                    <a href="iniciar_sesion.php"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button></a>
                </div>
            </div>
        </div>
    </div>
    <!--POP-UP USUARIO EXISTENTE -->
    <div class="modal fade" id="myModalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-black">
                    <h5 class="modal-title" id="exampleModalLabel">Error Usuario Existente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¡Ya hay un usuario registrado con la misma dirección de correo!</p>
                </div>
                <div class="modal-footer">
                    <a href="iniciar_sesion.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
                </div>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
