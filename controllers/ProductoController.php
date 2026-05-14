<?php
// Controlador Producto.
// Se encarga de pedir los productos al modelo
// y enviarlos a la vista.

require_once __DIR__ . "/../models/Producto.php";

class ProductoController {

    // Función para mostrar el catálogo.
    public function mostrarCatalogo() {

        // Obtiene todos los productos activos.
        $productos = Producto::obtenerTodos();

        // Envía los productos a la vista.
        require __DIR__ . "/../views/catalogo.php";
    }
}
?>