<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compra | OriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/estilos_generales.css">
    <link rel="stylesheet" href="../../../public/css/vista_carrito.css">
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
                    <a href="vista_carrito.php" class="text-decoration-none text-light">
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
        <h1 class="text-center mt-4">Carrito<i class="bi bi-cart3"></i></h1>
        <div class="row">
            <!-- col carrito_compras -->
            <div class="col-md-8 order-1 order-md-1 mt-4 carrito" id="containerCarrito" style="overflow-y: scroll; max-height: 80vh;">
                <!-- Contenido del carrito -->
            </div>
            <!-- col Resumen Pedido -->
            <div class="col-md-4 order-2 order-md-2 border rounded p-4 mt-4 bg-light text-dark mb-3 resumen"  style="max-height: 60vh;">
                <h5 class="mb-3">Resumen del Pedido</h5>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span>Resumen de compras realizadas:</span>
                    <a href="../pedidos/compras_realizadas.php" class="btn btn-warning">Revisar mis compras</a>
                </div>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <span>Total:</span>
                        <span id="totalSinIVA">100 €</span> 
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <span>IVA (21%):</span>
                        <span></span> 
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <span>Gastos de Envío:</span>
                        <span>8 €</span>
                    </li>
                </ul>
                <h6 class="d-flex justify-content-between align-items-center">
                    <span>Total a Pagar:</span>
                    <span id="totalOrder">126 €</span> 
                </h6>
                <div class="mt-3">
                    <button class="btn btn-primary btn-block mb-2" onclick="tramitarPedido()">Tramitar Pedido<i class="bi bi-bag-check ms-2"></i></button>
                    <a href="../../../public/pagina_principal.php" class="btn btn-secondary btn-block mb-2">Seguir comprando</a>    
                </div>
            </div>
        </div>
    </div>



    <script>
        // se obtiene la cantidad de productos del carrito almacenada en sessionStorage al cargar la página
        window.addEventListener('DOMContentLoaded', function () {
            const cantidadProductos = sessionStorage.getItem('cantidadProductos');
            const numProductosCarrito = document.getElementById('numProductosCarrito');
            if (numProductosCarrito && cantidadProductos) {
                numProductosCarrito.textContent = cantidadProductos;
                numProductosCarrito.style.color = 'orange';
            }
        });

        // obtener los productos del carrito_compras de cada usuario
        document.addEventListener('DOMContentLoaded', async function () {
            const containerCarrito = document.getElementById('containerCarrito');
            const containerTotalSinIVA = document.getElementById('totalSinIVA');
            const containerTotalOrder = document.getElementById('totalOrder');
            const numProductosCarrito = document.getElementById('numProductosCarrito');

            async function obtenerProductosCarrito() { 
                const userId = <?php echo isset($_SESSION['usuarioId']) ? $_SESSION['usuarioId'] : 'null'; ?>;
                const response = await fetch('../../Controller/carrito/procesar_carrito.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'obtener',
                        userId: userId,
                    }),
                });
                if (!response.ok) {
                    throw new Error('Error en la solicitud AJAX: ' + response.statusText);
                }
                const productos = await response.json();

                // se limpia el contenedor antes de agregar nuevos productos
                containerCarrito.innerHTML = '';

                let totalPedido = 0;

                // Generación dinámica de elementos de productos en el DOM
                productos.forEach(productoCarrito => {

                    totalPedido += parseFloat(productoCarrito.precio) * parseInt(productoCarrito.cantidad);

                    const divElement = document.createElement('div');
                    divElement.classList.add('row', 'border', 'border-secondary', 'rounded', 'p-3', 'm-3', 'bg-light');
                                    
                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('col-6');

                    const imgElement = document.createElement('img');
                    imgElement.src = '../../Controller/productos/' + productoCarrito.foto;
                    imgElement.alt = productoCarrito.titulo;
                    imgElement.classList.add('img-fluid');
                    imgWrapper.appendChild(imgElement);
                    divElement.appendChild(imgWrapper);
                                    
                    const contentWrapper = document.createElement('div');
                    contentWrapper.classList.add('col-6', 'd-flex', 'flex-column');

                    const titleElement = document.createElement('h3');
                    titleElement.classList.add('text-center', 'border-bottom', 'border-2', 'pb-2');
                    titleElement.textContent = productoCarrito.titulo;
                    contentWrapper.appendChild(titleElement);

                    const descriptionElement = document.createElement('p');
                    descriptionElement.classList.add('mb-2', 'overflow-hidden');
                    descriptionElement.textContent = productoCarrito.descripcion;
                    contentWrapper.appendChild(descriptionElement);

                    const priceElement = document.createElement('p');
                    priceElement.classList.add('fw-bold', 'mb-2');
                    priceElement.textContent = 'Precio: ' + productoCarrito.precio + ' €';
                    priceElement.style.color = 'red';
                    contentWrapper.appendChild(priceElement);

                    const contentWrapperPriceAndQuantity = document.createElement('div');
                    contentWrapperPriceAndQuantity.classList.add('d-flex', 'justify-content-between', 'align-items-center');
   
                    const controlPriceAndQuantity = document.createElement('div');
                    controlPriceAndQuantity.classList.add('input-group');


                    // botón para reducir la cantidad
                    const decreaseButton = document.createElement('button');
                    decreaseButton.classList.add('btn', 'btn-outline-secondary');
                    decreaseButton.textContent = '-';
                    decreaseButton.addEventListener('click', async () => {
                        try {
                            let action = 'eliminar'; 

                            if (productoCarrito.cantidad > 1) {
                                action = 'reducir'; 
                            }

                            // Realizar solicitud fetch para reducir la cantidad o eliminar el producto del carrito
                            const response = await fetch('../../Controller/carrito/procesar_carrito.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: new URLSearchParams({
                                    action: action,
                                    productId: productoCarrito.producto_id 
                                }),
                            });
                            if (!response.ok) {
                                throw new Error('Error al realizar la acción en el carrito.');
                            }

                            // se actualiza el contador del carrito
                            const cantidadProductosActualizada = sessionStorage.getItem('cantidadProductos') - 1; 
                            sessionStorage.setItem('cantidadProductos', cantidadProductosActualizada);

                            // se actualiza el contenido del contador en el navbar
                            const cantidadProductos = sessionStorage.getItem('cantidadProductos');
                            const numProductosCarrito = document.getElementById('numProductosCarrito');
                            if (numProductosCarrito && cantidadProductos) {
                                numProductosCarrito.textContent = cantidadProductos;
                                numProductosCarrito.style.color = 'orange';
                            }

                            obtenerProductosCarrito();
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Error al realizar la acción en el carrito. Por favor, inténtalo de nuevo más tarde.');
                        }   
                    });
                    controlPriceAndQuantity.appendChild(decreaseButton);

                    // se muestra cantidad actual
                    const quantityDisplay = document.createElement('input');
                    quantityDisplay.classList.add('form-control', 'text-center');
                    quantityDisplay.value = productoCarrito.cantidad; 
                    quantityDisplay.setAttribute('type', 'number');
                    quantityDisplay.setAttribute('readonly', true);
                    controlPriceAndQuantity.appendChild(quantityDisplay);

                    // botón para incrementar la cantidad
                    const increaseButton = document.createElement('button');
                    increaseButton.classList.add('btn', 'btn-outline-secondary');
                    increaseButton.textContent = '+';
                    increaseButton.addEventListener('click', async() => {
                        try{
                            // petición fetch para incrementar la cantidad del producto
                            const response = await fetch('../../Controller/carrito/procesar_carrito.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: new URLSearchParams({
                                    action: 'incrementar',
                                    productId: productoCarrito.producto_id 
                                }),
                            });
                            if (!response.ok) {
                                throw new Error('Error al realizar la acción en el carrito.');
                            }
                            // actualizar el contador del carrito
                            let cantidadProductosActualizada = parseInt(sessionStorage.getItem('cantidadProductos')) + 1; // Sumar 1 al valor actual
                            sessionStorage.setItem('cantidadProductos', cantidadProductosActualizada);

                            // actualizar el contenido del contador en el navbar
                            const cantidadProductos = sessionStorage.getItem('cantidadProductos');
                            const numProductosCarrito = document.getElementById('numProductosCarrito');
                            if (numProductosCarrito && cantidadProductos) {
                                numProductosCarrito.textContent = cantidadProductos;
                                numProductosCarrito.style.color = 'orange';
                            }

                            obtenerProductosCarrito();
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Error al realizar la acción en el carrito. Por favor, inténtalo de nuevo más tarde.');
                        }
                    });
                    controlPriceAndQuantity.appendChild(increaseButton);

                    // agregar el control de cantidad al contenedor
                    contentWrapperPriceAndQuantity.appendChild(controlPriceAndQuantity);

                    // botón eliminar producto y evento para eliminar producto
                    const buttonDeleteProductElement = document.createElement('button');
                    buttonDeleteProductElement.classList.add('btn', 'btn-danger', 'ms-4');
                    buttonDeleteProductElement.innerHTML = '<i class="bi bi-trash3"></i>';
                    buttonDeleteProductElement.addEventListener('click', async () => {
                        try {
                            // Petición fetch para eliminar el producto del carrito
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

                            // actualizar el contador del carrito
                            const cantidadProductosActualizada = sessionStorage.getItem('cantidadProductos') - 1; 
                            sessionStorage.setItem('cantidadProductos', cantidadProductosActualizada);

                            // actualizar el contenido del contador en el navbar
                            const cantidadProductos = sessionStorage.getItem('cantidadProductos');
                            const numProductosCarrito = document.getElementById('numProductosCarrito');
                            if (numProductosCarrito && cantidadProductos) {
                                numProductosCarrito.textContent = cantidadProductos;
                                numProductosCarrito.style.color = 'orange';
                            }

                            // actualizar la lista de productos del carrito
                            obtenerProductosCarrito();
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Error al eliminar el producto del carrito. Por favor, inténtalo de nuevo más tarde.');
                        }   
                    });
                    
                    contentWrapperPriceAndQuantity.appendChild(buttonDeleteProductElement);


                    contentWrapper.appendChild(contentWrapperPriceAndQuantity);
                                        
                    containerCarrito.appendChild(divElement);
                    divElement.appendChild(contentWrapper);
                });

                const gastosEnvio = 8;

                const totalSinIVA = totalPedido + gastosEnvio;
                
                // calcular el total a pagar sumando el total sin IVA, el IVA y los gastos de envío
                const totalAPagar = totalSinIVA + (totalSinIVA * 0.21);

                // total sin IVA
                const totalSinIVAElement = document.getElementById('totalSinIVA');
                totalSinIVAElement.textContent = totalSinIVA.toFixed(2) + ' €';

                // Mostrar el total a pagar
                const totalOrderElement = document.getElementById('totalOrder');
                totalOrderElement.textContent = totalAPagar.toFixed(2) + ' €';

            } 
            obtenerProductosCarrito(); 
        });

    </script>

    <script>
        async function tramitarPedido() {
            const userId = <?php echo isset($_SESSION['usuarioId']) ? $_SESSION['usuarioId'] : 'null'; ?>;
            const containerTotalOrder = document.getElementById('totalOrder');
            const totalPedidoString = containerTotalOrder.textContent.trim();
            const totalPedido = parseInt(totalPedidoString.replace(/[^\d.-]/g, '')); 

            const fecha = new Date().toISOString().split('T')[0]; 

            console.log('userId:', userId);
            console.log('totalPedido:', totalPedido);
            console.log('fecha:', fecha);

            try {
                // Petición fetch para obtener los productos del carrito
                const response = await fetch("../../Controller/carrito/procesar_carrito.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'obtener',
                        userId: userId,
                    }),
                });

                if (!response.ok) {
                    throw new Error('Error al obtener los productos del carrito: ' + response.statusText);
                }

                const productos = await response.json();

                // array para almacenar los detalles del pedido
                const detallesPedido = [];

                // se itera sobre los productos del carrito, añadiendo los detalles del pedido
                productos.forEach(producto => {
                    const detalle = {
                        productId: producto.producto_id,
                        precio: producto.precio,
                        cantidad: producto.cantidad
                    };
                    detallesPedido.push(detalle);
                });

                // se envian los detalles del pedido al servidor
                const pedidoData = {
                    action: 'tramitar_pedido',
                    userId: userId,
                    totalPedido: totalPedido,
                    fecha: fecha, 
                    estado: 1, 
                    detalles: JSON.stringify(detallesPedido)
                };

                const pedidoResponse = await fetch("../../Controller/pedidos/procesar_pedidos.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(pedidoData),
                });

                // console.log(pedidoData.detalles);
                if (!pedidoResponse.ok) {
                    throw new Error('Error al tramitar el pedido: ' + pedidoResponse.statusText);
                }

                const data = await pedidoResponse.json();
                // console.log('PedidoId: ', data); 
                window.location.href = '../pedidos/compra_finalizada.php'
         
            } catch (error) {
                console.error('Error:', error);
                alert('Error al tramitar el pedido. Por favor, inténtalo de nuevo más tarde.');
            }
        }
    </script>   

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

