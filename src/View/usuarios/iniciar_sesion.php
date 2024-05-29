<?php 
    if(isset($_GET['inicio_sesion_fallido']) && $_GET['inicio_sesion_fallido'] == 1){
        // Se muestra el pop-up si la variable inicio_sesion_fallido existe
        echo '<script>
                document.addEventListener("DOMContentLoaded", function(){
                    let myModalError = new bootstrap.Modal(document.getElementById("myModalError"));
                    myModalError.show();
                });    
            </script>';
    }
    if(isset($_GET['sesion_ya_iniciada']) && $_GET['sesion_ya_iniciada'] == 1){
        // Se muestra el pop-up si la variable sesion_ya_iniciada existe
        echo '<script>
                document.addEventListener("DOMContentLoaded", function(){
                    let myModalError = new bootstrap.Modal(document.getElementById("myModalSesionIniciada"));
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
    <title>Inicio de Sesión | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/registro_usuario.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <img src="../../../public/img/logo.png" class="ms-3" style="max-width: 50px;" alt="">
            <a class="navbar-brand title" href="../../../public/pagina_principal.php">OriTech</a>
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
                    <h2 class="text-center text-white mb-4">Iniciar Sesión</h2>
                    <div class="text-center">
                        <img src="../../../public/img/user.png" class="img-fluid" style="max-width:50px" alt="img-login">
                    </div>
                    <form action="../../Controller/usuarios/procesar_inicio_sesion.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre_usuario" class="form-label text-white">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <a href="#" class="text-white">¿Olvidaste tu contraseña?</a>
                        </div>

                        <input type="submit" value="Iniciar Sesión" class="btn btn-primary w-100 mt-4 mx-auto d-block">
                            <a href="registro_usuario.php" class="text-decoration-none">
                        <button type="button" class="btn btn-warning w-50 mt-4 mx-auto d-block">Registrarse</button>
                            </a>
                    </form>
            </div>
        </div>
    </div>
    <!--POP-UP INICIO DE SESION ERRONEO-->
    <div class="modal fade" id="myModalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-black">
                    <h5 class="modal-title" id="exampleModalLabel">Usuario o Contraseña Incorrectos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Los Datos de Usuario o contraseña no coindicen, Por favor Inténtelo de nuevo!</p>
                </div>
                <div class="modal-footer">
                    <a href="iniciar_sesion.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- POP-UP SESION YA INICIADA -->
    <div class="modal fade" id="myModalSesionIniciada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-black">
                    <h5 class="modal-title" id="exampleModalLabel">Sesión ya iniciada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ya hay una sesión iniciada. Por favor, cierra la sesión actual antes de iniciar sesión nuevamente.</p>
                </div>
                <div class="modal-footer">
                    <a href="../../Controller/usuarios/procesar_cierre_sesion.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar Sesión</button></a>
                </div>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
