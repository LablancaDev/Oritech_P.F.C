<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
    <link rel="stylesheet" href="../../../public/css/mostrar_producto.css">
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
    <div class="container">
        <h1 class="text-center mt-3">Detalles del Producto</h1>
        <!-- Se muestran los detalles del producto por Id -->
        <?php require '../../Controller/productos/procesar_productos.php';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $vista_producto = new ProcesarProductos();
            $productos = $vista_producto->procesarMostrarProductosPorId($id);
            foreach ($productos as $producto) {
                ?>
                <div class="row d-flex">
                    <div class="col-md-6 mb-4">
                        <div class="product-card fs-3">
                            <div class="image-container d-flex align-items-center justify-content-center flex-column bg-light">
                                <img  class="product-image" src="../../Controller/productos/<?php echo $producto['foto']; ?>" alt="<?php echo $producto['titulo']; ?>">
                                <h2 class="product-title mt-4"><?php echo $producto['titulo']; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-5">
                            <img src="../../../public/img/vender-online.png" class="card-img-top" alt="dibujo venta online">
                            <div class="card-body bg-light">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h5 class="card-title me-2 fw-bold"><?php echo $producto['titulo']?></h5>
                                    <p class="text-danger fs-2 fw-bold" style="font-size: 1.2em;"><?php echo $producto['precio']?>€</p>
                                </div>
                                <p class="fs-5 text-center text-primary fw-bold">Descripción sobre el producto:</p>
                                <p class="card-text"><?php echo $producto['descripcion']?></p>
                                <p>Envío: <span class="fw-bold">Gratis</span> | <span class="fw-bold">Devolución: </span ><span>Gratis</span></p>
                                <p class="text-success fw-bold">Recíbelo mañana</p>
                                <button class="btn btn-primary mx-auto d-block" data-product-id="<?php echo $producto['id']; ?>" data-precio="<?php echo $producto['precio']; ?>" data-cantidad="1">Añadir al Carrito</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
        ?>
    </div>
    <!-- Menú Emergente offcanvas Carrito -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="productDetailsOffcanvas" aria-labelledby="productDetailsOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title-drch" id="productDetailsOffcanvasLabel">Detalles del Producto</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="close"></button>
        </div>
        <div class="offcanvas-body" id="productDetailsBody">
            <!-- detalles del producto -->
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
                        <li><a href="../../../public/pagina_principal.php">Inicio</a></li>
                        <li><a href="../../../public/pagina_principal.php">Productos</a></li>
                        <li><a href="../categorias/mostrar_productos_por_categoria.php?id=3">Ofertas</a></li>
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

    <script>
        document.querySelectorAll('.btn.btn-primary').forEach(button => {
            button.addEventListener('click', async () => {
                const productId = button.getAttribute('data-product-id');
                const precio = button.getAttribute('data-precio');
                const cantidad = button.getAttribute('data-cantidad');

                try {
                    // Se verifica si el producto ya está en el carrito antes de agregarlo
                    const productoEnCarrito = await verificarProductoEnCarrito(productId);
                    if (productoEnCarrito) {
                        // Si el producto ya está en el carrito, incrementar la cantidad
                        await incrementarCantidadProducto(productId);
                        // Obtener los productos del carrito después de actualizar la cantidad
                        obtenerProductosCarrito();
                        return;
                    }

                    // Agregar el producto al carrito
                    await fetch('../../Controller/carrito/procesar_carrito.php', {
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

                    // Obtener los productos del carrito después de agregar el producto
                    obtenerProductosCarrito();

                } catch (error) {
                    alert('Error al cargar los productos. Por favor, inténtalo de nuevo más tarde.');
                }
            });
        });

        async function verificarProductoEnCarrito(productId) {
            try {
                const response = await fetch('../../Controller/carrito/procesar_carrito.php', {
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
                return data.enCarrito; // true si el producto está en el carrito

            } catch (error) {
                console.error('Error al verificar el producto en el carrito:', error);
                throw new Error('Error al verificar el producto en el carrito.');
            }
        }

        async function incrementarCantidadProducto(productId) {
            try {
                await fetch('../../Controller/carrito/procesar_carrito.php', {
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
                throw new Error('Error al incrementar la cantidad del producto en el carrito.');
            }
        }

        async function obtenerProductosCarrito() {
            try {
            
                const response = await fetch('../../Controller/carrito/procesar_carrito.php', {
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
                    
                    return;
                }

                const productos = await response.json();

                // console.log(productos);

                const offcanvas = document.getElementById('productDetailsOffcanvas');
                offcanvas.classList.add('show'); 

                const containerOffCanvas = document.getElementById('productDetailsBody');
                containerOffCanvas.innerHTML = ''; 

                // objeto que almacena los productos y sus cantidades
                const productsAdded = {};

                productos.forEach(productoCarrito => {
                    const divElement = document.createElement('div');
                    divElement.classList.add('product-item', 'row', 'p-3', 'border', 'border-secondary', 'mb-3', 'bg-light', 'me-2', 'ms-2', 'rounded');

                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('col-6');
                    const imgElement = document.createElement('img');
                    imgElement.src = '../../Controller/productos/' + productoCarrito.foto;
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

                    if (productsAdded[productoCarrito.producto_id]) {
                        // Si el producto ya está en el carrito, incrementar la cantidad y el precio total
                        productsAdded[productoCarrito.producto_id].cantidad += productoCarrito.cantidad;
                        productsAdded[productoCarrito.producto_id].precio += productoCarrito.precio;
                    } else {
                        // Si es la primera vez que se agrega el producto, inicializar la cantidad y el precio
                        productsAdded[productoCarrito.producto_id] = {
                            cantidad: productoCarrito.cantidad,
                            precio: productoCarrito.precio
                        };
                    }

                    // Botón para eliminar el producto
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
                            // eliminar el producto del carrito
                            await fetch('../../Controller/carrito/procesar_carrito.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: new URLSearchParams({
                                    action: 'eliminar',
                                    productId: productoCarrito.producto_id
                                }),
                            });

                            // obtener y mostrar los productos actualizados del carrito
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
                 // Crear el botón para redireccionar al carrito de compras
                 const buttonContainer = document.createElement('div');
                    buttonContainer.classList.add('offcanvas-footer'); 

                    const buttonElement = document.createElement('button');
                    buttonElement.type = 'button';
                    buttonElement.classList.add('btn', 'btn-primary', 'btn-block'); 
                    buttonElement.textContent = 'Ir al Carrito';
                    buttonElement.addEventListener('click', function () {
                        window.location.href = '../carrito/vista_carrito.php'; 
                    });

                    buttonContainer.appendChild(buttonElement);
                    containerOffCanvas.appendChild(buttonContainer); 

                    const totalPriceElement = document.createElement('p');
                    totalPriceElement.classList.add('fw-bold', 'mt-2');

                    // Se calcula el precio total sumando los precios de todos los productos en el carrito
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

                    // Mostrar la cantidad total de productos en el carrito
                    const totalQuantityElement = document.createElement('p');
                    totalQuantityElement.classList.add('fw-bold', 'mb-2');
                    const totalQuantity = Object.values(productsAdded).reduce((total, product) => total + product.cantidad, 0);
                    totalQuantityElement.textContent = 'Cantidad Total: ' + totalQuantity;
                    containerOffCanvas.insertBefore(totalQuantityElement, totalPriceElement);

            } catch (error) {
                console.error('Error al obtener los productos del carrito:', error);
                throw new Error('Error al obtener los productos del carrito.');
            }
        }
        
        // se obtien los productos del carrito al cargar la página
        window.onload = () => {
            obtenerProductosCarrito();
        };

        // cerrar el offcanvas al hacer clic en el botón de cerrar
        document.getElementById('close').addEventListener('click', () => {
            const offcanvas = document.getElementById('productDetailsOffcanvas');
            offcanvas.classList.remove('show');
        });
         // cerrar el offcanvas al hacer clic fuera de el
         window.addEventListener('click', (event) => {
                const offcanvas = document.getElementById('productDetailsOffcanvas');
                if (!offcanvas.contains(event.target)) {
                    offcanvas.classList.remove('show');
                }
            });
    </script>
</body>
</html>
