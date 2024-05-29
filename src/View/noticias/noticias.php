<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
    <link rel="stylesheet" href="../../../public/css/noticias.css">
    
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
                      <li><a class="dropdown-item" href="../../../public/pagina_principal.php">Volver a la Tienda</a></li>
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
                  <a href="../../View/carrito/vista_carrito.php" class="text-decoration-none text-light">Carrito <i class="bi bi-cart3"></i></a>
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

  <div class="container custom-container">
    <div class="container-title">
        <h1 class="text-center title2">Ponte al día de las últimas noticias tecnológicas con OriTech</h1>
    </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="../../View/categorias/mostrar_productos_por_categoria.php?id=1"><img class="imgs fade-in" src="../../../public/img/portatilesGaming.jpg" alt="graficas"></a>
            </div>
            <div class="col-md-6 text fade-in">
                <h2 class="purple-text">Series de portátiles Gaming MSI</h2>
                <p class="parrafo">MSI se dedica a la creación de computadoras de alto rendimiento con una precisión de color asombrosa, audio de alta fidelidad y gráficos incomparables. 
                    Su capacidad es excelente y su diseño es elegante. Indudablemente, la Computadora MSI está pensada para diseñadores gráficos, editores de vídeo, animadores 3D y amantes de los videojuegos.</p>
                <p class="parrafo fade-in">La serie MSI Gamer ocupa el primer lugar en las preferencias de quienes aman los juegos, ya que ofrece equipos de primera categoría. 
                    Tanto las computadoras de escritorio como las laptops incluyen las mejores placas y monitores específicamente diseñados para creadores de contenido digital.</p>
            </div>
        </div>
    </div>

    <div class="container custom-container">
        <div class="row align-items-center">
            <div class="col-md-6 text fade-in">
                <h2 class="purple-text"> AMD Radeon RX 7900 XTX <span class="text-danger title3"> VS </span> NVIDIA RTX 4080</h2>
                <p class="parrafo">La competencia entre la AMD Radeon™ RX 7900 XTX y la NVIDIA® GeForce RTX™ 4080 SUPER ha llegado a su punto álgido. Ambas tarjetas gráficas representan lo 
                    último en tecnología para jugadores y creadores, ofreciendo un rendimiento excepcional y características innovadoras</p>
                <p class="parrafo">La Radeon™ RX 7900 XTX se destaca por su revolucionaria arquitectura AMD RDNA™ 3 con tecnología de chiplet, brindando un rendimiento de última generación 
                    y una eficiencia sin igual en resoluciones 4K y superiores.</p>
                <p class="parrafo">La GeForce RTX™ 4080 SUPER de NVIDIA® destaca por su tecnología de trazado de rayos acelerado y gráficos impulsados por inteligencia artificial, junto con 
                    la ultraeficiente arquitectura Ada Lovelace y una memoria G6X de 16 GB. La elección entre ambas dependerá de las necesidades y preferencias específicas de cada usuario, 
                    pero una cosa es segura: con cualquiera de estas tarjetas, tus juegos y proyectos creativos cobrarán vida como nunca antes.</p>
                <p class="parrafo">Comparación de Rendimiento: AMD Radeon™ RX 7900 XTX vs NVIDIA® GeForce RTX™ 4080 SUPER. La AMD Radeon™ RX 7900 XTX y la NVIDIA® GeForce RTX™ 4080 SUPER son 
                    opciones potentes para jugadores y creadores. Ambas ofrecen rendimiento excepcional y características avanzadas:</p>
                <ul class="purple-text">
                    <li>AMD Radeon™ RX 7900 XTX: Arquitectura AMD RDNA™ 3 con tecnología de chiplet. Rendimiento y eficiencia energética en 4K y resoluciones superiores.</li>
                    <li>NVIDIA® GeForce RTX™ 4080 SUPER: Arquitectura Ada Lovelace de NVIDIA y 16 GB de memoria G6X. Trazado de rayos acelerado y gráficos con tecnología de IA.</li>
                </ul>
                <p class="parrafo">Ambas tarjetas ofrecen potencia visual, eficiencia y capacidad de renderizado rápida. La elección dependerá de tus preferencias y necesidades específicas.</p>
            </div>
            <div class="col-md-6">
                <a href="../../View/categorias/mostrar_productos_por_categoria.php?id=5"><img class="imgs fade-in" src="../../../public/img/graficas2.jpeg" alt="Imagen 2"></a>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <!-- tarjeta 1 -->
                <div class="card mt-2 border-0 bg-transparent">
                    <img src="../../../public/img/POCO-X6-Pro-fondo.webp" class="card-img-top" alt="moviles">
                    <div class="card-body mycard">
                        <h5 class="card-title">Lo último en SmartPhones</h5>
                        <p class="card-text">¿Estás buscando un ordenador portátil que se adapte a tu estilo de vida, tus gustos y tu presupuesto? En OriTech tenemos lo que necesitas. 
                            En OriTech contamos con una amplia gama de ordenadores portátiles de última generación que te ofrecen las mejores prestaciones y un precio muy competitivo. </p>
                        <a href="../../View/categorias/mostrar_productos_por_categoria.php?id=2" class="btn btn-warning btn-card">Ver Ofertas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- tarjeta 2 -->
                <div class="card mt-2 border-0 bg-transparent">
                    <img src="../../../public/img/diferencia-lg-oled-c34-c35-c36-1200x600.webp" class="card-img-top" alt="smart TV">
                    <div class="card-body mycard">
                        <h5 class="card-title">El cine en casa</h5>
                        <p class="card-text">La llamada gama accesible acoge a todos los teléfonos móviles inteligentes cuyo precio ronda los 200 euros. 
                            Se tratan de unos smartphones de nuevo diseño que cuentan con muchos de los avances tecnológicos más recientes, pero que están pensados para 
                            los usuarios menos exigentes en cuanto a aplicaciones y usos. </p>
                        <a href="../../View/categorias/mostrar_productos_por_categoria.php?id=3" class="btn btn-warning btn-card">Ver Ofertas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 bg-light bordered rounded mycard p-4">
        <h2 class="text-center mb-4 pt-4 purple-text">La Batalla de los Gigantes: Un Análisis de los Procesadores AMD e Intel</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="position-relative">
                    <a href="../../View/categorias/mostrar_productos_por_categoria.php?id=5">
                        <img src="../../../public/img/banner-landing-amd.jpg" alt="publicidad" class="img-fluid rounded border shadow-sm" style="max-width: 100%; height: auto;">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative">
                    <a href="../../View/categorias/mostrar_productos_por_categoria.php?id=5">
                        <img src="../../../public/img/banner-landing-intel.jpg" alt="publicidad" class="img-fluid rounded border shadow-sm" style="max-width: 100%; height: auto;">
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <p class="card-text"><span class="title3">Comparación de Procesadores:</span> Ryzen 7 y 9 vs. Intel i7 e i9
                En el mercado de procesadores, AMD y Intel lideran con sus líneas Ryzen y Core, respectivamente. Ryzen 7 y 9 compiten con Intel i7 e i9 en rendimiento, características y precio.</p>
                <p class="card-text"><span class="title3">Rendimiento:</span>
                Los Ryzen de AMD ofrecen potencia multitarea y rendimiento para aplicaciones exigentes. Los modelos Ryzen 9 destacan en tareas intensivas como la edición de video y el renderizado.
                Los Intel i7 e i9 también ofrecen potencia de procesamiento sólida. Los i9 son preferidos por usuarios profesionales y entusiastas debido a su alto rendimiento.</p>
                <p class="card-text"><span class="title3">Características:</span>
                Ryzen integra tecnología Zen y es compatible con PCIe 4.0 para E/S más rápida. Los Intel i7 e i9 incluyen Turbo Boost y Hyper-Threading para mejor rendimiento.</p>
                <p class="card-text"><span class="title3">Precio y Valor:</span>
                Los Ryzen de AMD tienden a ser más competitivos en precio, ofreciendo buen rendimiento por menos. Los Intel i7 e i9 suelen tener precios más altos, aunque Intel ha mejorado su relación calidad-precio.
                La elección entre Ryzen y Core depende de tus necesidades individuales como usuario y el presupuesto disponible. Sin embargo, los Ryzen ofrecen una fuerte competencia en términos de rendimiento y valor.</p>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light mt-5">
        <div class="footer text-center d-flex justify-content-center align-items-center">
            <h2 class="text-footer">Tu tienda de tecnología líder</h2>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-name">Oritech</h5>
                    <p>Nos encontramos en:</p>
                    <p>Dirección: Calle Principal, Ciudad</p>
                    <p>Teléfono: 123-456-789</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces útiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Productos</a></li>
                        <li><a href="#">Ofertas</a></li>
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
    <script src="../../../public/js/noticias.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
