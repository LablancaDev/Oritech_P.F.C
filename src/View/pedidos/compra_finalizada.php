<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras Finalizadas | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
    <link rel="stylesheet" href="../../../public/css/compra_finalizada.css">
</head>
<body class="fondo">
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
                        <li><a class="dropdown-item" href="../../../public/pagina_principal.php">Volver</a></li>
                    </ul>
                    </li>
                </ul>
                <div class="text-light d-flex align-items-center me-3">
                    <div class="me-3 hover-bg p-2 position-relative">
                        <a href="#" class="text-decoration-none text-light" id="miCuentaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mi Cuenta <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if(isset($_SESSION['nombre_usuario'])){?>
                            <li><a class="dropdown-item" href="../usuarios/cuenta_usuario.php">Cuenta</a></li>
                            <?php } ?>
                            <li><a class="dropdown-item" href="../../View/usuarios/iniciar_sesion.php">Iniciar Sesión</a></li>
                            <li><a class="dropdown-item" href="../../View/usuarios/registro_usuario.php">Registro</a></li>
                            <?php if(isset($_SESSION['nombre_usuario'])){?>
                            <li><a class="dropdown-item text-danger me-3" href="../../Controller/usuarios/procesar_cierre_sesion.php">Cerrar Sesión</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="me-3 hover-bg p-2">
                    <a href="../../View/carrito/vista_carrito.php" class="text-decoration-none text-light">
                        Carrito <i class="bi bi-cart3"></i> <span id="numProductosCarrito"></span>
                    </a>
                  </div>
                </div>
                <?php if(isset($_SESSION['nombre_usuario'])){ ?>
                    <div class="nav-item d-flex align-items-center me-3">
                            <span class="navbar-text bg-success text-light rounded px-2">
                                <?php echo $_SESSION['nombre_usuario'];?>
                            </span>                                          
                    <?php } ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="checkmark"></div>
        <h1 class="mt-3 text-light">¡Compra Finalizada con Éxito!</h1>
        <p class="lead text-light">Gracias por tu compra en OriTech.</p>
        <a href="../../../public/pagina_principal.php" class="btn btn-primary">Volver a la Tienda</a>
    </div>


    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

