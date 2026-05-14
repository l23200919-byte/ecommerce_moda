<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Configuración de caracteres -->
    <meta charset="UTF-8">

    <!-- Título de la página -->
    <title>Catálogo | Macario Jiménez</title>

    <!-- Adaptación responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap para diseño responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>

    <!-- Menú principal -->
    <nav class="navbar navbar-dark menu">

        <div class="container">

            <!-- Nombre de la marca -->
            <a class="navbar-brand marca" href="index.php">
                Macario Jiménez
            </a>

        </div>

    </nav>

    <!-- Hero principal -->
    <header class="hero-catalogo">

        <div class="hero-texto">

            <p class="subtitulo">
                Mini Ecommerce
            </p>

            <h1>
                Catálogo de Moda
            </h1>

            <p>
                Playeras y vestidos inspirados en la colección Magnolias.
            </p>

        </div>

    </header>

    <main class="container">

        <!-- Sección de productos -->
        <section>

            <h2>Productos disponibles</h2>

            <!-- Fila Bootstrap -->
            <div class="row g-4">

                <!-- Recorre todos los productos -->
                <?php foreach ($productos as $producto): ?>

                    <!-- Columna del producto -->
                    <div class="col-md-4 col-lg-3">

                        <!-- Tarjeta del producto -->
                        <div class="card producto-card">

                            <!-- Imagen -->
                            <img 
                                src="<?php echo $producto['imagen']; ?>" 
                                class="card-img-top"
                                alt="<?php echo $producto['nombre']; ?>">

                            <div class="card-body">

                                <!-- Nombre -->
                                <h5>
                                    <?php echo $producto['nombre']; ?>
                                </h5>

                                <!-- Descripción -->
                                <p class="descripcion">
                                    <?php echo $producto['descripcion']; ?>
                                </p>

                                <!-- Categoría -->
                                <p>
                                    <strong>Categoría:</strong>
                                    <?php echo $producto['categoria']; ?>
                                </p>

                                <!-- Stock -->
                                <p>
                                    <strong>Stock:</strong>
                                    <?php echo $producto['stock']; ?>
                                </p>

                                <!-- Precio -->
                                <p class="precio">
                                    $<?php echo number_format($producto['precio'], 2); ?>
                                </p>

                                <!-- Botón agregar carrito -->
                                <button 
                                    class="btn btn-dorado w-100"

                                    onclick="agregarCarrito(
                                        '<?php echo $producto['nombre']; ?>',
                                        <?php echo $producto['precio']; ?>
                                    )">

                                    Agregar al carrito

                                </button>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

        <!-- Carrito -->
        <section class="carrito-seccion">

            <h2>Carrito de compras</h2>

            <div class="carrito-box">

                <!-- Lista del carrito -->
                <ul id="carrito" class="list-group mb-3"></ul>

                <!-- Total -->
                <h4>
                    Total: $
                    <span id="total">0.00</span>
                </h4>

                <!-- Botón pagar -->
                <button class="btn btn-pagar" onclick="pagar()">
                    Pagar
                </button>

            </div>

        </section>

    </main>

    <!-- Footer -->
    <footer>

        <p>
            © TecNM Campus Pachuca – Programación Web 2026
        </p>

    </footer>

    <!-- JavaScript -->
    <script>

        // Arreglo del carrito
        let carrito = [];

        // Total acumulado
        let total = 0;

        // Agrega producto al carrito
        function agregarCarrito(nombre, precio) {

            carrito.push({ nombre, precio });

            total += precio;

            actualizarCarrito();
        }

        // Elimina producto del carrito
        function eliminarProducto(index) {

            total -= carrito[index].precio;

            carrito.splice(index, 1);

            actualizarCarrito();
        }

        // Actualiza lista del carrito
        function actualizarCarrito() {

            const lista = document.getElementById("carrito");

            const totalTexto = document.getElementById("total");

            lista.innerHTML = "";

            carrito.forEach((producto, index) => {

                lista.innerHTML += `
                    <li class="list-group-item d-flex justify-content-between align-items-center">

                        ${producto.nombre} - $${producto.precio.toFixed(2)}

                        <button 
                            class="btn btn-danger btn-sm"
                            onclick="eliminarProducto(${index})">

                            X

                        </button>

                    </li>
                `;
            });

            totalTexto.innerText = total.toFixed(2);
        }

        // Simula pago
        function pagar() {

            if (carrito.length === 0) {

                alert("El carrito está vacío");

            } else {

                alert(
                    "Pago realizado correctamente. Total: $" +
                    total.toFixed(2)
                );

                carrito = [];

                total = 0;

                actualizarCarrito();
            }
        }

    </script>

</body>
</html>