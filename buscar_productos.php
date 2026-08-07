<?php
// buscar_productos.php
// Endpoint de busqueda para el buscador del header (paginas _dinamico en la raiz).
//
// Busca en 2 lugares a la vez:
// 1. La base de datos (productos ya migrados: decorativa, industrial, automotriz)
// 2. Los archivos HTML estaticos que aun no se migran (Marina, Trafico, Madera, etc.)
//    -- leyendo directo su bloque de JavaScript "products", sin mantener listas a mano.
//
// Busca por NOMBRE y tambien por palabras dentro de la DESCRIPCION (como palabras clave).
// Devuelve nombre + imagen de cada producto, igual que el buscador anterior.

require_once "back_jho/conexion.php";

header("Content-Type: application/json; charset=utf-8");

$q = trim($_GET["q"] ?? "");

if ($q === "" || mb_strlen($q) < 2) {
    echo json_encode([]);
    exit;
}

$resultados = [];

// ---------- 1. Buscar en la base de datos (lineas ya dinamicas) ----------
$lineasDinamicas = ["decorativa", "industrial", "automotriz"];
$placeholders = implode(",", array_fill(0, count($lineasDinamicas), "?"));
$busqueda = "%" . $q . "%";
$tipos = str_repeat("s", count($lineasDinamicas)) . "sss";

$sql = "SELECT p.producto_slug, p.nombre_display,
        (SELECT a.ruta_thumb FROM archivos a WHERE a.producto_slug = p.producto_slug AND a.tipo = 'imagen' ORDER BY a.orden ASC, a.id ASC LIMIT 1) AS imagen
        FROM productos p
        WHERE p.linea IN ($placeholders)
        AND (p.nombre_display LIKE ? OR p.producto_slug LIKE ? OR p.descripcion LIKE ?)
        ORDER BY p.nombre_display ASC
        LIMIT 8";

$stmt = $conexion->prepare($sql);
$parametros = array_merge($lineasDinamicas, [$busqueda, $busqueda, $busqueda]);
$stmt->bind_param($tipos, ...$parametros);
$stmt->execute();
$resultado = $stmt->get_result();

while ($fila = $resultado->fetch_assoc()) {
    $nombreLimpio = str_replace("|", " ", $fila["nombre_display"] ?: str_replace("-", " ", $fila["producto_slug"]));
    $resultados[] = [
        "nombre" => $nombreLimpio,
        "url" => "pinturas_dinamico.php?product=" . urlencode($fila["producto_slug"]),
        "imagen" => $fila["imagen"] ?: "imgs/default-product.png",
    ];
}

// ---------- 2. Buscar en los archivos HTML estaticos (lineas aun no migradas) ----------
$lineasEstaticas = [
    "pinturasMarina.html",
    "pinturasTrafico.html",
    "pinturasMadera.html",
    "pinturasDisol.html",
    "pinturaRePega.html",
    "pintuInsuQui.html",
];

foreach ($lineasEstaticas as $archivo) {
    $rutaArchivo = __DIR__ . "/" . $archivo;
    if (!file_exists($rutaArchivo)) continue;

    $contenido = file_get_contents($rutaArchivo);

    // Capturamos cada bloque completo de producto: "slug": { ... }
    // para poder sacar de ahi el name, la description y la primera imagen
    preg_match_all('/"([a-zA-Z0-9_\-]+)":\s*\{(.*?)\n\s{4}\},/s', $contenido, $bloques, PREG_SET_ORDER);

    foreach ($bloques as $bloque) {
        $slug = $bloque[1];
        $cuerpo = $bloque[2];

        if (!preg_match('/name:\s*"([^"]+)"/', $cuerpo, $mNombre)) continue;
        $nombreProducto = $mNombre[1];

        $descripcion = "";
        if (preg_match('/description:\s*"([^"]+)"/', $cuerpo, $mDesc)) {
            $descripcion = $mDesc[1];
        }

        $imagenProducto = "imgs/default-product.png";
        if (preg_match('/images:\s*\[\s*"([^"]+)"/', $cuerpo, $mImg)) {
            $imagenProducto = $mImg[1];
        }

        // Coincide si el texto buscado aparece en el nombre O en la descripcion (palabras clave)
        if (mb_stripos($nombreProducto, $q) !== false || mb_stripos($descripcion, $q) !== false) {
            $resultados[] = [
                "nombre" => $nombreProducto,
                "url" => $archivo . "?product=" . urlencode($slug),
                "imagen" => $imagenProducto,
            ];
        }
    }
}

// Limitamos el total a 12 resultados combinados
$resultados = array_slice($resultados, 0, 12);

echo json_encode($resultados);