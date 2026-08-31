<?php
// conexion.php (VERSIÓN PRODUCCIÓN - cPanel)
// Conecta a la base de datos real del hosting.

$host = "localhost";
$usuario = "jhomer_admin_local";
$password = "Jhomeron2026";
$basededatos = "jhomer_admin_local";

$conexion = new mysqli($host, $usuario, $password, $basededatos);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>