<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
     <link rel="stylesheet" href="../../../public/css/vistaGestionProductos.css">
</head>
<body class="fondo">
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
                        <li><a class="dropdown-item" href="../../../public/pagina_principal.php">Volver a la tienda</a></li>
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
                            <li><a class="dropdown-item" href="../usuarios/iniciar_sesion.php">Iniciar Sesión</a></li>
                            <li><a class="dropdown-item" href="../usuarios/registro_usuario.php">Registro</a></li>
                            <?php if(isset($_SESSION['nombre_usuario'])){?>
                            <li><a class="dropdown-item text-danger me-3" href="../../Controller/usuarios/procesar_cierre_sesion.php">Cerrar Sesión</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="me-3 hover-bg p-2">
                    <a href="../carrito/vista_carrito.php" class="text-decoration-none text-light">Carrito <i class="bi bi-cart3"></i></a>
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
        <div class="row">
            <div class="col">
                <h2 class="text-center mt-4 text-light text-3d">Interfaz Administrador</h2>
            </div>
            <div>
                <button type="button" class="btn btn-outline-warning hover-admin mb-5" data-bs-toggle="offcanvas" data-bs-target="#categoriesOffcanvas" aria-controls="categoriesOffcanvas">
                <i class="bi bi-menu-button-wide"></i>
                Menú Administrador
                </button>
            </div>
            
            <!-- Ventana Emergente ofcanvas gestión-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="categoriesOffcanvas" aria-labelledby="categoriesOffcanvasLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="categoriesOffcanvasLabel">Categorías</h2>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="list-group list-group-flush">
                        <ul class="list-group list-group-flush">
                            <a href="../vistasAdmin/vistaGestionCategorias.php" class="list-group-item list-group-item-action" id="vistaGestionCategorias">Gestión de Categorías</a>
                            <a href="../vistasAdmin/vistaGestionProductos.php" class="list-group-item list-group-item-action" id="vistaGestionProductos">Gestión de Productos</a>
                            <a href="../vistasAdmin/vistaGestionPedidos.php" class="list-group-item list-group-item-action" id="vistaGestionPedidos">Gestión de Pedidos</a>
                            <a href="../vistasAdmin/vistaGestionUsuarios.php" class="list-group-item list-group-item-action" id="vistaGestionUsuarios">Gestión de Usuarios</a>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>    
    <div class="row">
            <div class="col-md-12">
                <h2 class="text-light">Gestión de Usuarios</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-primary table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre de Usuario</th>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Comentario</th>
                                <th>Rol</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                       <tbody id="mostrar_productos">
                            <?php require '../../Controller/usuarios/procesar_usuarios.php';
                                $controller = new procesarUsuarios();
                                $usuarios = $controller->procesarMostrarUsuarios();
                            ?>
                            <?php foreach($usuarios as $usuario): ?>
                            <tr>
                                <td><?php echo $usuario['id']?></td>
                                <td><?php echo $usuario['nombre_usuario']?></td>
                                <td><?php echo substr($usuario['clave'], 0, 5) . '...'; ?></td>
                                <td><?php echo $usuario['nombre']?></td>
                                <td><?php echo $usuario['apellidos']?></td>
                                <td><?php echo $usuario['email']?></td>
                                <td><?php echo $usuario['telefono']?></td>
                                <td><?php echo $usuario['comentario']?></td>
                                <td><?php
                                  if($usuario['rol_id'] == 2){
                                        echo 'Administrador'; 
                                    }
                                    if($usuario['rol_id'] == 1){
                                       echo 'Usuario';
                                    }
                                ?></td>
                                 <td><a href="../../Controller/usuarios/procesar_usuarios.php?eliminar_usuario_admin=<?php echo $usuario['id']; ?>" class="btn btn-danger">Eliminar <i class="bi bi-trash3"></i></a></td>
                            </tr>
                                <?php endforeach; ?>    
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>    

