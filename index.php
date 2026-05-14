<?php
// Archivo principal del ecommerce.
// Desde aquí se ejecuta el controlador principal.

require_once "controllers/ProductoController.php";

// Se crea el controlador.
$controller = new ProductoController();

// Se manda llamar la función para mostrar el catálogo.
$controller->mostrarCatalogo();
?>