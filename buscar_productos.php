<?php
// buscar_productos.php
// Endpoint de busqueda para el buscador del header.
//
// Busca en la base de datos, en TODAS las lineas ya migradas (las 9: decorativa,
// automotriz, industrial, marina, trafico, madera, disolventes, resinas-pegamentos,
// insumos-quimicos). Ya no hay lineas estaticas que leer aparte.
//
// Busca por NOMBRE y tambien por palabras dentro de la DESCRIPCION (como palabras clave).
// Devuelve nombre + imagen + URL correcta de cada producto (algunas lineas usan
// pinturas.php, otras -Resinas y Pegamentos / Insumos Quimicos- usan pinturaSimple.php).

require_once "back_jho/conexion.php";

header("Content-Type: application/json; charset=utf-8");

$q = trim($_GET["q"] ?? "");

if ($q === "" || mb_strlen($q) < 2) {
    echo json_encode([]);
    exit;
}

// Lineas que usan la plantilla de detalle "simple" (sin caracteristicas/aplicacion)
$lineasPlantillaSimple = ["resinas-pegamentos", "insumos-quimicos"];

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
    $plantilla = in_array($fila["linea"], $lineasPlantillaSimple, true) ? "pinturaSimple.php" : "pinturas.php";
    $resultados[] = [
        "nombre" => $nombreLimpio,
        "url" => $plantilla . "?product=" . urlencode($fila["producto_slug"]),
        "imagen" => $fila["imagen"] ?: "imgs/default-product.png",
    ];
}

echo json_encode($resultados);