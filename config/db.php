<?php
// Archivo de conexión a MySQL usando PDO.

$host = "127.0.0.1";
$port = "3306";
$dbname = "ecommerce_moda";
$user = "root";
$password = "";

try {

    // Se crea la conexión.
    $conexion = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
        $user,
        $password
    );

    // Activa errores PDO.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    // Muestra error si falla conexión.
    die("Error de conexión: " . $e->getMessage());
}
?>