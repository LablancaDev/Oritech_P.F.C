<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal Tienda | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../public/css/pagina_principal.css">
    <link rel="stylesheet" href="../public/css/estilos_generales.css">
</head>
<body class="backImg">
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <img src="img/logo.png" class="ms-3" style="max-width: 50px;" alt="logo">
          <a class="navbar-brand title" href="pagina_principal.php">OriTech</a>
            <button class="navbar-toggler text-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item hover-bg">
                  <a class="nav-link text-light" aria-current="page" href="pagina_principal.php">Tienda</a>
                </li>
                <li class="nav-item hover-bg">
                  <a class="nav-link text-light" href="../src/View/noticias/noticias.php">Noticias</a>
                </li>
                <li class="nav-item dropdown hover-bg">
                  <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menú
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#ofertas">Ofertas</a></li>
                      <li><hr class="dropdown-divider"></li>
                    <?php if(isset($_SESSION['nombre_usuario']) && $_SESSION['nombre_usuario'] == 'admin'){ ?>
                        <li><a class="dropdown-item" href="../src/Controller/administrador/vista_administrador.php">Menú Administrador</a></li>
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
                          <li><a class="dropdown-item" href="../src/View/usuarios/cuenta_usuario.php">Cuenta</a></li>
                          <?php } ?>
                          <li><a class="dropdown-item" href="../src/View/usuarios/iniciar_sesion.php">Iniciar Sesión</a></li>
                          <li><a class="dropdown-item" href="../src/View/usuarios/registro_usuario.php">Registro</a></li>
                          <?php if(isset($_SESSION['nombre_usuario'])){?>
                          <li><a class="dropdown-item text-danger me-3" href="../src/Controller/usuarios/procesar_cierre_sesion.php">Cerrar Sesión</a></li>
                          <?php } ?>
                      </ul>
                  </div>
                  <div class="me-3 hover-bg p-2">
                    <a href="../src/View/carrito/vista_carrito.php" class="text-decoration-none text-light">
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
    <div class="row d-flex justify-content-between align-items-center p-3 menu">
            <div class="col">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-custom" data-bs-toggle="offcanvas" data-bs-target="#categoriesOffcanvas" aria-controls="categoriesOffcanvas">
                        <i class="bi bi-list me-2"></i>
                        Categorías
                    </button>
                </div>
            </div>
    </div>
    <!-- Menú emergente Offcanvas categorías -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="categoriesOffcanvas" aria-labelledby="categoriesOffcanvasLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="categoriesOffcanvasLabel">Categorías</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            
            <ul class="list-group list-group-flush">
            
                <?php 
                require '../src/Model/categorias/model_categorias.php';
                $controller = new GestionCategorias();
                $categorias = $controller->obtenerCategorias(); ?>

                <?php foreach($categorias as $categoria): ?>

                <a href="../src/View/categorias/mostrar_productos_por_categoria.php?id=<?php echo $categoria['id']; ?>" class="list-group-item list-group-item-action">
                    <?php echo $categoria['nombre']; ?>
                </a>

                <?php endforeach; ?>
            
            </ul>
        </div>
    </div>
    
  <!-- Carrousel imágenes banner -->
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col">
                <div id="carousel-imgs" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../public/img/placasBaseAorus.jpg" class="d-block w-100 img-fluid" style="" alt="placas base Aorus">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/img/monitores.jpg" class="d-block w-100 img-fluid" style="" alt="monitores">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/img/Oritech.png" class="d-block w-100 img-fluid" style="" alt="ryzen7">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/img/ventiladores.jpg" class="d-block w-100 img-fluid" style="" alt="ventiladores">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/img/GigabyteAorus.webp" class="d-block w-100 img-fluid" style="" alt="placas base gigabyte">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/img/memoriaRam.jpg" class="d-block w-100 img-fluid" style="" alt="memoria RAM">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/img/banner-portatiles-intel.jpg" class="d-block w-100 img-fluid" style="" alt="Portátiles Intel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!--1. Carousel imágenes Productos-->
    <div class="container-fluid mt-5 ">    
        <div id="carouselExampleIndicators" class="carousel slide rounded" data-bs-ride="carousel">
            <div class="carousel-inner" id="carouselInner"></div>
            <button class="carousel-control-prev position-absolute top-50 translate-middle-y" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                 <span class="carousel-control-prev-icon bg-danger" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next position-absolute top-50 translate-middle-y" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="row" id="productContainer">
            <!-- se muestran cards productos en carousel --> 
        </div>
        
        <!-- Especial Portátiles -->
        <div class="row ofertas-container bg-gray-transparent">
            <div class="col mt-3 mb-3 ofertas d-flex justify-content-center align-items-center">
                <img src="img/cartel-ofertas.jpg" class="img-fluid rounded" alt="Descripción de la imagen">
            </div>
        </div>

        <!--2. Imágenes distribuidas por todo el body -->
        <div class="row" id="productContainer2">
            <!-- se muestran cards productos body -->
        </div>
        
    </div>
    <!-- Ofertas Portátiles y Móviles -->   
    <div class="container mt-3">
        <div class="row ">
            <div class="col-md-6">
                <!-- card 1 -->
                <div class="card mt-2">
                    <img src="img/oferta8portatiles.jpg" class="card-img-top" alt="oferta portátiles">
                    <div class="card-body mycard">
                        <h5 class="card-title">Súper Promo en Portátiles Económicos </h5>
                        <p class="card-text text-light">¿Estás buscando un ordenador portátil que se adapte a tu estilo de vida, tus gustos y tu presupuesto? En OriTech tenemos lo que necesitas. 
                            En OriTech contamos con una amplia gama de ordenadores portátiles de última generación que te ofrecen las mejores prestaciones y un precio muy competitivo. </p>
                        <a href="../src/View/categorias/mostrar_productos_por_categoria.php?id=1" class="btn btn-warning btn-card">Ver Ofertas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <!-- card 2 -->
                <div class="card mt-2">
                    <img src="img/ofertas9moviles.jpg" class="card-img-top" alt="ofertas móviles">
                    <div class="card-body mycard">
                        <h5 class="card-title">Los mejores móviles por menos de 200 euros</h5>
                        <p class="card-text text-light">La llamada gama accesible acoge a todos los teléfonos móviles inteligentes cuyo precio ronda los 200 euros. 
                            Se tratan de unos smartphones de nuevo diseño que cuentan con muchos de los avances tecnológicos más recientes, pero que están pensados para 
                            los usuarios menos exigentes en cuanto a aplicaciones y usos. </p>
                        <a href="../src/View/categorias/mostrar_productos_por_categoria.php?id=2" class="btn btn-warning btn-card">Ver Ofertas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Garantía reacondicionados -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="garantia">
    
            </div>
        </div>
    </div>
    <!-- Banner publicidad Ofertas Liquidación Flash -->
    <div class="row mt-5" id="ofertas">
        <div class="col ofertasCamaras position-relative">
            <div class="d-flex flex-column justify-content-center align-items-center text-center text-decoration-none h-100">
                <img src="img/banner-camaras.png" class="img-fluid w-100" alt="Banner de cámaras">
                <a href="../src/View/categorias/mostrar_productos_por_categoria.php?id=<?php echo $categoria['id']; ?>" class="btn btn-danger btn-sm mt-3 fs-4 position-absolute" style="bottom: 20px;">Ver ofertas</a>
            </div>
        </div>
    </div>

    <!-- Menú Emergente offcanvas Carrito -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="productDetailsOffcanvas" aria-labelledby="productDetailsOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title-drch" id="productDetailsOffcanvasLabel">Detalles del Producto</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="close"></button>
        </div>
        <div class="offcanvas-body" id="productDetailsBody">       
            <!-- aquí se mostrarán los detalles del producto -->
        </div>
    </div>

    <footer class="bg-dark text-light footer-content">
        <div class="footer text-center d-flex justify-content-center align-items-center">
            <h2 class="text-footer">Tu tienda de tecnología líder</h2>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-name">OriTech</h5>
                    <p>Nos encontramos en:</p>
                    <p>Dirección: Calle Salvador Abril 5, Valencia</p>
                    <p>Teléfono: 724-456-444</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces útiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="pagina_principal.php">Inicio</a></li>
                        <li><a href="pagina_principal.php">Productos</a></li>
                        <li><a href="../src/View/categorias/mostrar_productos_por_categoria.php?id=<?php echo $categoria['id']; ?>">Ofertas</a></li>
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
                <img src="img/logo.png" alt="logo" style="max-width: 80px" class="mx-auto">
            </div>
        </div>
    </footer>

    <script>
    //  Scripts gestión dinámica de productos en la tienda

    // Controla el cambio automático de imágenes del Carousel
    document.addEventListener('DOMContentLoaded', function () {
        var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
            interval: 5000, 
            pause: 'hover', 
            wrap: true 
        });
    });
    // Imágenes distribuidas por todo el body se usa para para cargar los productos
    document.addEventListener('DOMContentLoaded', function () {
        const productContainer2 = document.getElementById('productContainer2');
        const accion = 'mostrarJson';
        // solicitud Fetch para obtener datos de productos y mostrarlos en el DOM de manera dinámica
        fetch('../src/Controller/productos/procesar_productos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                accion: accion,
            }),
        })
        .then(response => response.json())
        .then(data => {
            data.forEach(producto => {  
                const productDiv = document.createElement('div');
                productDiv.classList.add('col-md-2', 'mb-4', 'mt-4', 'd-flex', 'align-items-stretch'); 
              
                const productLink = document.createElement('a');
                productLink.setAttribute('href', '../src/View/productos/mostrar_producto.php?id=' + producto.id); 
                productLink.classList.add('text-decoration-none');

                const productCard = document.createElement('div');
                productCard.classList.add('card', 'zoom-effect', 'h-100');

                const imageLink = document.createElement('a');
                imageLink.setAttribute('href', '../src/View/productos/mostrar_producto.php?id=' + producto.id); 
                imageLink.classList.add('text-decoration-none');

                const imageContainer = document.createElement('div'); 
                imageContainer.classList.add('img-container', 'h-100', 'd-flex', 'justify-content-center', 'align-items-center');
            
                const image = document.createElement('img');
                image.setAttribute('src', '../src/Controller/productos/' + producto.foto);
                image.classList.add('card-img-top', 'p-3', 'img-fluid');
                image.style.objectFit = 'cover'; 

                const cardBody = document.createElement('div');
                cardBody.classList.add('card-body', 'd-flex', 'flex-column', 'justify-content-end');

                const title = document.createElement('h5');
                title.classList.add('card-title', 'text-center');
                title.textContent = producto.titulo;
                title.style.color = '#1750B9';

                const price = document.createElement('p');
                price.classList.add('card-text', 'text-center');

                const precioSpan = document.createElement('span');
                precioSpan.textContent = 'Precio: ';
                precioSpan.style.color = 'black';

                const numeroSpan = document.createElement('span');
                numeroSpan.textContent = producto.precio + ' €';
                numeroSpan.style.color = 'red';
                numeroSpan.style.fontWeight = 'bold';

                price.appendChild(precioSpan);
                price.appendChild(numeroSpan);

                const buyForm = document.createElement('form');
                buyForm.setAttribute('action', 'ruta_para_comprar'); 
                buyForm.setAttribute('method', 'POST');

                const buyButton = document.createElement('button');
                buyButton.classList.add('btn', 'btn-primary', 'mx-auto', 'd-block');
                buyButton.innerHTML = '<i class="bi bi-cart2"></i> Añadir al Carrito'; 
            
                buyButton.dataset.productId = producto.id; 
                buyButton.dataset.precio = producto.precio;
                buyButton.dataset.cantidad = 1; 

                buyForm.appendChild(buyButton);

                cardBody.appendChild(title);
                cardBody.appendChild(price);
                cardBody.appendChild(buyForm);

                imageContainer.appendChild(image); 

                imageLink.appendChild(imageContainer); 
                productCard.appendChild(imageLink);
                productCard.appendChild(cardBody);

                productLink.appendChild(productCard);
                productDiv.appendChild(productLink);
                productContainer2.appendChild(productDiv);
            });
        });
    });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const productContainer2 = document.getElementById('productContainer2');

            // Evento que abre el offcanvas y obtiene los productos del carrito
            productContainer2.addEventListener('click', async function (event) {
                if (event.target.classList.contains('btn-primary')) {
                    event.preventDefault();

                    const productId = event.target.dataset.productId;
                    const precio = event.target.dataset.precio;
                    const cantidad = event.target.dataset.cantidad;

                    try {
                        // verificar si el producto ya está en el carrito antes de agregarlo
                        const productoEnCarrito = await verificarProductoEnCarrito(productId);
                        if (productoEnCarrito) {
                            // si el producto ya está en el carrito, incrementar la cantidad
                            await incrementarCantidadProducto(productId);
                  
                            obtenerProductosCarrito();
                            return;
                        }

                        // petición fetch para agregar el producto al carrito
                        await fetch('../src/Controller/carrito/procesar_carrito.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                action: 'insertar',
                                userId: <?php echo isset($_SESSION['usuarioId']) ? $_SESSION['usuarioId'] : 'null'; ?>,
                                productId: productId,
                                precio: precio,
                                cantidad: cantidad
                            }),
                        });

                        obtenerProductosCarrito();

                    } catch (error) {
                        console.error('Error:', error);
                        alert('Error al cargar los productos. Por favor, inténtalo de nuevo más tarde.');
                    }
                }
            });

            async function verificarProductoEnCarrito(productId) {
                try {
                    const response = await fetch('../src/Controller/carrito/procesar_carrito.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({ 
                            action: 'verificar',
                            productId: productId
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('Error en la solicitud AJAX: ' + response.statusText);
                    }

                    const data = await response.json();
                    return data.enCarrito; 

                } catch (error) {
                    console.error('Error al verificar el producto en el carrito:', error);
                    throw new Error('Error al verificar el producto en el carrito.');
                }
            }

            async function incrementarCantidadProducto(productId) {
                try {
                    await fetch('../src/Controller/carrito/procesar_carrito.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: 'incrementar',
                            productId: productId
                        }),
                    });
                } catch (error) {
                    console.error('Error al incrementar la cantidad del producto en el carrito:', error);
                    throw new Error('Error al incrementar la cantidad del producto en el carrito.');
                }
            }

            async function obtenerProductosCarrito() {  
                try {
                    // petición fetch para obtener los productos del carrito
                    const response = await fetch('../src/Controller/carrito/procesar_carrito.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: 'obtener',
                            userId: <?php echo isset($_SESSION['usuarioId']) ? $_SESSION['usuarioId'] : 'null'; ?>,
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('Error en la solicitud AJAX: ' + response.statusText);
                    }

                    if (response.status === 204) {
                        
                        console.log("La respuesta está vacía. No hay productos para mostrar.");
                        return;
                    }

                    const productos = await response.json();

                    // mostrar los productos en el offcanvas
                    const offcanvas = document.getElementById('productDetailsOffcanvas');
                    offcanvas.classList.add('show'); 

                    const containerOffCanvas = document.getElementById('productDetailsBody');
                    containerOffCanvas.innerHTML = ''; 

                    // objeto que almacenar los productos y sus cantidades
                    const productsAdded = {};

                    productos.forEach(productoCarrito => {
                        const divElement = document.createElement('div');
                        divElement.classList.add('product-item', 'row', 'p-3', 'border', 'border-secondary', 'mb-3', 'bg-light', 'me-2', 'ms-2', 'rounded');

                        const imgWrapper = document.createElement('div');
                        imgWrapper.classList.add('col-6');
                        const imgElement = document.createElement('img');
                        imgElement.src = '../src/Controller/productos/' + productoCarrito.foto;
                        imgElement.alt = productoCarrito.titulo;
                        imgElement.classList.add('img-fluid');
                        imgWrapper.appendChild(imgElement);
                        divElement.appendChild(imgWrapper);

                        const contentWrapper = document.createElement('div');
                        contentWrapper.classList.add('col-6');
                        const titleElement = document.createElement('h4');
                        titleElement.classList.add('fw-bold', 'mb-2');
                        titleElement.textContent = productoCarrito.titulo;
                        contentWrapper.appendChild(titleElement);

                        const descriptionElement = document.createElement('p');
                        descriptionElement.classList.add('mb-2', 'overflow-hidden'); 
                        descriptionElement.textContent = productoCarrito.descripcion;
                        contentWrapper.appendChild(descriptionElement);

                        const priceElement = document.createElement('p');
                        priceElement.classList.add('fw-bold', 'mb-2', );
                        priceElement.textContent = 'Precio: ' + productoCarrito.precio + ' €';
                        priceElement.style.color = 'red';
                        contentWrapper.appendChild(priceElement);

                        const cantidadElement = document.createElement('p');
                        cantidadElement.classList.add('fw-bold', 'mb-2', 'text-primary');
                        cantidadElement.textContent = 'Cantidad: ' + productoCarrito.cantidad; 
                        contentWrapper.appendChild(cantidadElement);

                        // Verifica si el producto ya ha sido agregado
                        if (productsAdded[productoCarrito.producto_id]) {
                            // si el producto ya está en el carrito, incrementar la cantidad y el precio total
                            productsAdded[productoCarrito.producto_id].cantidad += productoCarrito.cantidad;
                            productsAdded[productoCarrito.producto_id].precio += productoCarrito.precio;
                        } else {
                            // si es la primera vez que se agrega el producto, inicializar la cantidad y el precio
                            productsAdded[productoCarrito.producto_id] = {
                                cantidad: productoCarrito.cantidad,
                                precio: productoCarrito.precio
                            };
                        }

                        // botón para eliminar el producto
                    const divDelete = document.createElement('div');
                    divDelete.classList.add('d-flex', 'justify-content-between', 'align-items-center');

                    const textDelete = document.createElement('p');
                    textDelete.textContent = 'Eliminar: ';
                    divDelete.appendChild(textDelete);

                    const deleteButton = document.createElement('button');
                    deleteButton.classList.add('btn', 'btn-danger', 'ms-2');
                    deleteButton.innerHTML = '<i class="bi bi-trash"></i>';
                    deleteButton.addEventListener('click', async () => {    
                        try {
                            // Petición fetch para eliminar el producto del carrito
                            await fetch('../src/Controller/carrito/procesar_carrito.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: new URLSearchParams({
                                    action: 'eliminar',
                                    productId: productoCarrito.producto_id 
                                }),
                            });
                            // console.log('ProductId:', productoCarrito.producto_id); 

                            // se obtienen y muestran los productos actualizados del carrito
                            obtenerProductosCarrito();  
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Error al eliminar el producto del carrito. Por favor, inténtalo de nuevo más tarde.');
                        }   
                    });
                    divDelete.appendChild(deleteButton);

                    contentWrapper.appendChild(divDelete);

                    divElement.appendChild(contentWrapper);

                    containerOffCanvas.appendChild(divElement);


                    });

                    // botón para redireccionar al carrito de compras
                    const buttonContainer = document.createElement('div');
                    buttonContainer.classList.add('offcanvas-footer'); 

                    const buttonElement = document.createElement('button');
                    buttonElement.type = 'button';
                    buttonElement.classList.add('btn', 'btn-primary', 'btn-block'); 
                    buttonElement.textContent = 'Ir al Carrito';
                    buttonElement.addEventListener('click', function () {
                        window.location.href = '../src/View/carrito/vista_carrito.php'; 
                    });

                    buttonContainer.appendChild(buttonElement);
                    containerOffCanvas.appendChild(buttonContainer); 

                    // se muestra el precio total de los productos en el carrito
                    const totalPriceElement = document.createElement('p');
                    totalPriceElement.classList.add('fw-bold', 'mt-2');

                    // calcular el precio total sumando los precios de todos los productos del carrito
                    const totalPrice = Object.values(productsAdded).reduce((total, product) => {
                        const productPrice = parseFloat(product.precio);
                        const productQuantity = parseInt(product.cantidad);

                        if (!isNaN(productPrice) && !isNaN(productQuantity)) {
                           
                            const totalPriceForProduct = productPrice * productQuantity;
                            return total + totalPriceForProduct;
                        } else {
                            console.error('Error: Precio o cantidad inválidos para el producto:', product);
                            return total;
                        }
                    }, 0);

                   
                    const totalPriceRounded = totalPrice.toFixed(2);

                    totalPriceElement.textContent = 'Precio Total: ' + totalPriceRounded + ' €';    
                    containerOffCanvas.appendChild(totalPriceElement);

                    // se muestra la cantidad total de productos en el carrito
                    const totalQuantityElement = document.createElement('p');
                    totalQuantityElement.classList.add('fw-bold', 'mb-2');
                    const totalQuantity = Object.values(productsAdded).reduce((total, product) => total + product.cantidad, 0);
                    totalQuantityElement.textContent = 'Cantidad Total: ' + totalQuantity;
                    containerOffCanvas.insertBefore(totalQuantityElement, totalPriceElement);

                    // para mostrar la cantidad de productos en el carrito junto al logo de carrito en el nav
                    const numProductosCarrito = document.getElementById('numProductosCarrito');
                    if (numProductosCarrito) {
                        // almacenar la cantidad en sessionStorage para mantenerla actualizada
                        sessionStorage.setItem('cantidadProductos', totalQuantity);
                        numProductosCarrito.textContent = totalQuantity;
                        numProductosCarrito.style.color = 'orange';
                    }
                    

                } catch (error) {
                    console.error('Error:', error);
                    alert('Error! La sesión no está iniciada correctamente. Por favor, inicie sesión primero.');
                }
            }

            // obtener la cantidad de productos del carrito almacenada en sessionStorage al cargar la página (para que al recargar la página mantenga el dato guardado en sessionStorage)
            window.addEventListener('DOMContentLoaded', function () {
                const cantidadProductos = sessionStorage.getItem('cantidadProductos');
                const numProductosCarrito = document.getElementById('numProductosCarrito');
                if (numProductosCarrito && cantidadProductos) {
                    numProductosCarrito.textContent = cantidadProductos;
                    numProductosCarrito.style.color = 'orange';
                }
            });

            // Evento para cerrar el offcanvas al hacer clic en el botón de cerrar
            const btnCerrarOffcanvas = document.querySelector('#productDetailsOffcanvas .btn-close');
            btnCerrarOffcanvas.addEventListener('click', () => {
                const offcanvas = document.getElementById('productDetailsOffcanvas');
                offcanvas.classList.remove('show');
            });

            // Evento para cerrar el offcanvas al hacer clic fuera de el
            window.addEventListener('click', (event) => {
                const offcanvas = document.getElementById('productDetailsOffcanvas');
                if (!offcanvas.contains(event.target)) {
                    offcanvas.classList.remove('show');
                }
            });
        });
    </script>

    <script>
        // Carousel: Script gestión dinámica de productos en un carrusel

        document.addEventListener('DOMContentLoaded', function () {
            const productContainer = document.getElementById('carouselInner');
            const productsPerSlide = 6; 
            const accion = 'mostrarJson';
            
            // Petición fetch que obtiene los datos de los productos y los muestra en un carrusel en el DOM,
            fetch('../src/Controller/productos/procesar_productos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    accion: accion,
                }),
            })
            .then(response => response.json())
            .then(data => {
                for (let i = 0; i < data.length; i += productsPerSlide) {
                    const productDiv = document.createElement('div');
                    productDiv.classList.add('carousel-item');
                    if (i === 0) {
                        productDiv.classList.add('active');
                    }

                    const productRow = document.createElement('div');
                    productRow.classList.add('row');

                    for (let j = i; j < i + productsPerSlide && j < data.length; j++) {
                        const producto = data[j];
                        const productCol = document.createElement('div');
                        productCol.classList.add('col');

                        const productLink = document.createElement('a');
                        productLink.setAttribute('href', '../src/View/productos/mostrar_producto.php?id=' + producto.id); 
                        productLink.classList.add('text-decoration-none');

                        const imageContainer = document.createElement('div');
                        imageContainer.classList.add('img-container','mt-5', 'h-50', 'd-flex', 'flex-column', 'justify-content-center', 'align-items-center');

                        const image = document.createElement('img');
                        image.setAttribute('src', '../src/Controller/productos/' + producto.foto);
                        image.classList.add('card-img-top', 'p-3', 'img-fluid', 'mt-5');

                        image.style.maxWidth = '220px'; 
                        image.style.maxHeight = '200px'; 

                        image.style.objectFit = 'cover';

                        image.addEventListener('mouseover', function() {
                        
                            image.style.border = '2px solid purple'; 
                            image.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
                            image.style.borderRadius = '10px';
                        });

                        image.addEventListener('mouseout', function() {
                        
                            image.style.border = 'none'; 
                            image.style.boxShadow = 'none';
                        });

                        const title = document.createElement('h5');
                        title.classList.add('card-title', 'text-center', 'mt-3');
                        title.textContent = producto.titulo;
                        title.style.color = '#1750B9';

                        const price = document.createElement('p');
                        price.classList.add('card-text', 'text-center');

                        const precioSpan = document.createElement('span');
                        precioSpan.textContent = 'Precio: ';
                        precioSpan.style.color = 'black';

                        const numeroSpan = document.createElement('span');
                        numeroSpan.textContent = producto.precio + ' €';
                        numeroSpan.style.color = '#E52B2B';
                        numeroSpan.style.fontWeight = 'bold';

                        price.appendChild(precioSpan);
                        price.appendChild(numeroSpan);
                        imageContainer.appendChild(image);
                        imageContainer.appendChild(title);
                        imageContainer.appendChild(price);
                        productLink.appendChild(imageContainer);
                        productCol.appendChild(productLink);
                        productRow.appendChild(productCol); 
                    }

                    productDiv.appendChild(productRow);
                    productContainer.appendChild(productDiv); 
                }

                let carouselIndicators = document.querySelector('.carousel-indicators');
                if (carouselIndicators !== null) {
                    carouselIndicators.parentNode.removeChild(carouselIndicators);
                }
            });
        });


    </script>
        
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
