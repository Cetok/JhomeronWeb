<?php
// conexion.php (VERSIÓN LOCAL - solo para pruebas con XAMPP)
// Cuando subas todo a cPanel, este archivo se reemplaza por la versión
// con los datos reales de jhomer_admin (host localhost, usuario jhomer_admin, etc.)

$host = "localhost";
$usuario = "root";           // Usuario por defecto de XAMPP
$password = "";               // XAMPP no pone contraseña por defecto
$basededatos = "jhomer_admin_local"; // La base de datos local que acabas de crear

$conexion = new mysqli($host, $usuario, $password, $basededatos);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>