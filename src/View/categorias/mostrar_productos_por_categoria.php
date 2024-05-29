<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categorías | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/mostrar_productos_por_categoria.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
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
                  <a class="nav-link text-light" href="../../View/noticias/noticias.php">Noticias</a>
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
    <div class="row d-flex justify-content-between align-items-center p-3 menu">
        <div class="col">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-custom btn-outline-primary hover-bg" data-bs-toggle="offcanvas" data-bs-target="#categoriesOffcanvas" aria-controls="categoriesOffcanvas">
                    <i class="bi bi-list me-2"></i>
                    Categorías
                </button>
            </div>  
        </div>
    </div>
    <!-- Menú Emergente Offcanvas Categorías -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="categoriesOffcanvas" aria-labelledby="categoriesOffcanvasLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="categoriesOffcanvasLabel">Categorías</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <ul class="list-group list-group-flush">
            
                <?php 
                require '../../Model/categorias/model_categorias.php';
                $controller = new GestionCategorias();
                $categorias = $controller->obtenerCategorias(); ?>

                <?php foreach($categorias as $categoria): ?>

                <a href="mostrar_productos_por_categoria.php?id=<?php echo $categoria['id']; ?>" class="list-group-item list-group-item-action">
                    <?php echo $categoria['nombre']; ?> 
                </a>

                <?php endforeach; ?>
            
            </ul>
        </div>
    </div>
     <!-- Carrousel imágenes normales-->
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col">
                <div id="carousel-imgs" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../../../public/img/graficas.jpg" class="d-block w-100 img-fluid"  alt="tarjetas gráficas">
                        </div>
                        <div class="carousel-item">
                            <img src="../../../public/img/placas_base.png" class="d-block w-100 img-fluid"  alt="placas base">
                        </div>
                        <div class="carousel-item">
                            <img src="../../../public/img/monitores.jpg" class="d-block w-100 img-fluid" alt="monitores">
                            </div>
                            <div class="carousel-item">
                                <img src="../../../public/img/graficas3.jpg" class="d-block w-100 img-fluid" alt="gráficas gigabyte">
                            </div>
                            <div class="carousel-item">
                            <img src="../../../public/img/placas_base_asus.jpg" class="d-block w-100 img-fluid" alt="placas base Asus">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Se introducen dinámicamente los productos en el DOM -->
        <div class="row ps-3 pe-3" id="productContainer">
        <!-- Recuperar y mostrar el nombre de la categoría -->     
            <?php
           $categoriaId = $_GET['id']; 
           $categoria = $controller->obtenerCategoriaPorId($categoriaId);   
           echo '<h2 class="text-center mt-4 text-light text-3d">' . $categoria['nombre'] . '</h2>'; 
           ?>
        </div>            
    </div>  
    <!-- Menú Emergente offcanvas Carrito -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="productDetailsOffcanvas" aria-labelledby="productDetailsOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title-drch" id="productDetailsOffcanvasLabel">Detalles del Producto</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="close"></button>
        </div>
        <div class="offcanvas-body" id="productDetailsBody">       
            <!-- se muestran los detalles del producto -->
        </div>
    </div>
    <footer class="bg-dark text-light">
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
                        <li><a href="mostrar_productos_por_categoria.php?id=2 ?>">Ofertas</a></li>
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
  
    <script>
        document.addEventListener('DOMContentLoaded', function (){
            const productContainer = document.getElementById('productContainer');
            const urlParams = new URLSearchParams(window.location.search);
            const categoriaId = urlParams.get('id');
            
        // solicitud fetch al servidor para obtener los productos asociados por categoría.
        fetch('../../Controller/categorias/procesar_categorias.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                id: categoriaId
            }),
        })
        .then(response => response.json())
        .then(data => {
            
            data.forEach(producto => {
                const productDiv = document.createElement('div');
                productDiv.classList.add('col-md-2', 'mb-4', 'mt-4', 'd-flex', 'align-items-stretch'); 
              
                const productLink = document.createElement('a');
                productLink.setAttribute('href', '../productos/mostrar_producto.php?id=' + producto.id); 
                productLink.classList.add('text-decoration-none'); 

                const productCard = document.createElement('div');
                productCard.classList.add('card', 'zoom-effect', 'h-100'); 

                const imageLink = document.createElement('a');
                imageLink.setAttribute('href', '../productos/mostrar_producto.php?id=' + producto.id); 
                imageLink.classList.add('text-decoration-none'); 

                const imageContainer = document.createElement('div');
                imageContainer.classList.add('img-container', 'h-100', 'd-flex', 'justify-content-center', 'align-items-center');
            
                const image = document.createElement('img');
                image.setAttribute('src', '../../Controller/productos/' + producto.foto);
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
                productContainer.appendChild(productDiv);       

            })
        })
        .catch(error => {
            console.error('Error al obtener datos de productos:', error);
        });
    });
    
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const productContainer2 = document.getElementById('productContainer');

            // Evento para abrir el offcanvas y obtener los productos del carrito
            productContainer2.addEventListener('click', async function (event) {
                if (event.target.classList.contains('btn-primary')) {
                    event.preventDefault();

                    const productId = event.target.dataset.productId;
                    const precio = event.target.dataset.precio;
                    const cantidad = event.target.dataset.cantidad;

                    try {
                        // se verificar si el producto ya está en el carrito antes de agregarlo
                        const productoEnCarrito = await verificarProductoEnCarrito(productId);
                        if (productoEnCarrito) {
                            // Si el producto ya está en el carrito, incrementar la cantidad
                            await incrementarCantidadProducto(productId);
                            // se obtienen los productos del carrito después de actualizar la cantidad
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

                        // se obtienen los productos del carrito después de agregar el producto
                        obtenerProductosCarrito();

                    } catch (error) {
                        console.error('Error:', error);
                        alert('Error al cargar los productos. Por favor, inténtalo de nuevo más tarde.');
                    }
                }
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
                    return data.enCarrito;

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
                    console.error('Error al incrementar la cantidad del producto en el carrito:', error);
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
                        console.log("La respuesta está vacía. No hay productos para mostrar.");
                        return;
                    }

                    const productos = await response.json();

                    // Se muestran los productos en el offcanvas
                    const offcanvas = document.getElementById('productDetailsOffcanvas');
                    offcanvas.classList.add('show'); 

                    const containerOffCanvas = document.getElementById('productDetailsBody');
                    containerOffCanvas.innerHTML = ''; 

                    // se crea objeto para almacenar los productos y sus cantidades
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

                        // Verificar si el producto ya ha sido agregado
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
                            // Eliminar el producto del carrito
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
                        window.location.href = '../../View/carrito/vista_carrito.php'; 
                    });

                    buttonContainer.appendChild(buttonElement);
                    containerOffCanvas.appendChild(buttonContainer); 

                    // se mestra el precio total de los productos en el carrito
                    const totalPriceElement = document.createElement('p');
                    totalPriceElement.classList.add('fw-bold', 'mt-2');

                    // calcular el precio total sumando los precios de todos los productos en el carrito
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

                    // se muesta la cantidad total de productos en el carrito
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
                    alert('Error! La sesión no está iniciada correctamente.Por favor, inicie sesión primero.');
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
