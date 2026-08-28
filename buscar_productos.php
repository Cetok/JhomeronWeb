<?php
// buscar_productos.php
// Endpoint de busqueda para el buscador del header.
//
// Busca en la base de datos, en TODAS las lineas (decorativa, automotriz, industrial,
// marina, trafico, madera, disolventes, fibra-de-vidrio). Ya no hay lineas estaticas
// que leer aparte, y ya todas usan la misma plantilla de detalle (pinturas.php).
//
// Busca por NOMBRE y tambien por palabras dentro de la DESCRIPCION (como palabras clave).
// Devuelve nombre + imagen + URL de cada producto.

require_once "back_jho/conexion.php";

header("Content-Type: application/json; charset=utf-8");

$q = trim($_GET["q"] ?? "");

if ($q === "" || mb_strlen($q) < 2) {
    echo json_encode([]);
    exit;
}

$busqueda = "%" . $q . "%";

$sql = "SELECT p.producto_slug, p.nombre_display, p.linea,
        (SELECT a.ruta_thumb FROM archivos a WHERE a.producto_slug = p.producto_slug AND a.tipo = 'imagen' ORDER BY a.orden ASC, a.id ASC LIMIT 1) AS imagen
        FROM productos p
        WHERE (p.nombre_display LIKE ? OR p.producto_slug LIKE ? OR p.descripcion LIKE ?)
        ORDER BY p.nombre_display ASC
        LIMIT 12";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $busqueda, $busqueda, $busqueda);
$stmt->execute();
$resultado = $stmt->get_result();

$resultados = [];
while ($fila = $resultado->fetch_assoc()) {
    $nombreLimpio = str_replace("|", " ", $fila["nombre_display"] ?: str_replace("-", " ", $fila["producto_slug"]));
    $resultados[] = [
        "nombre" => $nombreLimpio,
        "url" => "pinturas.php?product=" . urlencode($fila["producto_slug"]),
        "imagen" => $fila["imagen"] ?: "imgs/default-product.png",
    ];
}

echo json_encode($resultados);