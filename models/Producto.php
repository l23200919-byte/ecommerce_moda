<?php
// Modelo Producto.
// Aquí se hacen las consultas a la base de datos.

require_once __DIR__ . "/../config/db.php";

class Producto {

    // Obtiene todos los productos activos.
    public static function obtenerTodos() {

        // Usa la conexión global.
        global $conexion;

        // Consulta SQL.
        $sql = "SELECT * FROM productos WHERE estado = 'activo'";

        // Prepara la consulta.
        $stmt = $conexion->prepare($sql);

        // Ejecuta la consulta.
        $stmt->execute();

        // Regresa todos los productos.
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>