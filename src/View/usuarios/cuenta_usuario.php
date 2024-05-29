<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta Usuarios | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/cuenta_usuario.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
</head>
<body class="fondo">
  <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <img src="../../../public/img/logo.png" class="ms-3" style="max-width: 50px;" alt="logo">
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
                  <a class="nav-link text-light" href="../../View/noticias/noticias.php">Noticias</a>
                </li>
                <li class="nav-item dropdown hover-bg">
                  <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menú
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../../public/pagina_principal.php">Volver a la tienda</a></li>
                      <li><hr class="dropdown-divider"></li>
                    <?php if(isset($_SESSION['nombre_usuario']) && $_SESSION['nombre_usuario'] == 'admin'){ ?>
                        <li><a class="dropdown-item" href="../../Controller/administrador/vista_administrador.php">Menú Administrador</a></li>
                    <?php } ?>
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
                          <li><a class="dropdown-item" href="../../View/usuarios/cuenta_usuario.php">Cuenta</a></li>
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
 
    <?php
      // Se verifica si el usuario ha iniciado sesión
        if(isset($_SESSION['usuarioId'])) {
            // obtener el ID 
            $usuarioId = $_SESSION['usuarioId'];

            require '../../Controller/usuarios/procesar_usuarios.php';

            $controller = new procesarUsuarios();

            // Se obtienen los datos del usuario por su id
            $usuario = $controller->procesarMostrarUsuariosPorId($usuarioId);
    ?>
    <div class="container datos">
        <h2 class="text-center mt-5 mb-5 text-light">Mi cuenta <i class="bi bi-person-circle"></i></h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" onclick="eliminar_usuario(<?php echo $usuarioId?>)" class="btn btn-outline-danger btn-sm hover-admin">
                    <i class="bi bi-trash3"></i> Eliminar cuenta
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark table-hover text-light">
                        <tbody>
                            <tr>
                                <th class="">Id:</th>
                                <td class="text-success"><?php echo $usuario['id']?></td>
                            </tr>
                            <tr>
                                <th class="">Nombre de Usuario:</th>
                                <td class="text-success"><?php echo $usuario['nombre_usuario']?></td>
                            </tr>
                            <tr>
                                <th class="">Clave:</th>
                                <td class="text-success"><?php echo substr($usuario['clave'], 0, 5) . '...'; ?></td>
                            </tr>
                            <tr>
                                <th class="">Nombre:</th>
                                <td class="text-success"><?php echo $usuario['nombre']?></td>
                            </tr>
                            <tr>
                                <th class="">Apellidos:</th>
                                <td class="text-success"><?php echo $usuario['apellidos']?></td>
                            </tr>
                            <tr>
                                <th class="">Email:</th>
                                <td class="text-success"><?php echo $usuario['email']?></td>
                            </tr>
                            <tr>
                                <th class="">Teléfono:</th>
                                <td class="text-success"><?php echo $usuario['telefono']?></td>
                            </tr>
                            <tr>
                                <th class="">Comentario:</th>
                                <td class="text-success"><?php echo $usuario['comentario']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
      function eliminar_usuario(usuarioId) {
          if (confirm('¿Estás seguro de que deseas eliminar tu cuenta?')) {
              fetch('../../Controller/usuarios/procesar_usuarios.php?eliminar_usuario=' + usuarioId)
                  .then(response => response.text())
                  .then(data => {
                      alert('Cuenta eliminada exitosamente');
                      window.location.href = 'iniciar_sesion.php';
                  })
                  .catch(error => console.error('Error:', error));
          }
      }
    </script>

        <?php
        } else {
            header("Location: ../../View/usuarios/iniciar_sesion.php");
            exit();
        }
    ?>
 
    <footer class="bg-dark text-light footer-content">
        <div class="footer text-center d-flex justify-content-center align-items-center">
            <h2 class="text-footer">Tu tienda de tecnología líder</h2>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-name">Oritech</h5>
                    <p>Nos encontramos en:</p>
                    <p>Dirección: Calle Salvador Abril 5, Valencia</p>
                    <p>Teléfono: 724-456-444</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces útiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="../../../public/pagina_principal.php">Inicio</a></li>
                        <li><a href="../../../public/pagina_principal.php">Productos</a></li>
                        <li><a href="../../View/categorias/mostrar_productos_por_categoria.php?id=7">Ofertas</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Redes sociales</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="text-warning">&copy; 2024 Oritech. <span class="text-light"> Todos los derechos reservados. </span></p>
                </div>
                <img src="../../../public/img/logo.png" alt="logo" style="max-width: 80px" class="mx-auto">
            </div>
        </div>
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

