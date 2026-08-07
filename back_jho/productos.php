<?php
// productos.php
// Gestiona el nombre "bonito" y el orden de aparición de cada producto
// (agrupado por producto_slug) en las páginas de listado.

session_start();
require_once "conexion.php";

// Escaneamos las subcarpetas reales de íconos del proyecto
// icons/caracter/  -> íconos para "Características"
// icons/aplicacion/    -> íconos para "Aplicación"
function escanearIconos($ruta) {
    $lista = [];
    if (is_dir($ruta)) {
        foreach (scandir($ruta) as $archivo) {
            if (preg_match('/\.(svg|png)$/i', $archivo)) {
                $lista[] = pathinfo($archivo, PATHINFO_FILENAME);
            }
        }
        $lista = array_unique($lista); // evita duplicados si existe el mismo nombre en .svg y .png
        sort($lista);
    }
    return $lista;
}

$iconosCaracteristicas = escanearIconos("../icons/caracter/");
$iconosAplicacion = escanearIconos("../icons/aplicacion/");

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

// --- Reordenar tarjetas de producto (dentro de la misma línea) ---
if (isset($_GET["mover"]) && isset($_GET["slug"])) {
    $slugMover = $_GET["slug"];
    $direccion = $_GET["mover"];

    $stmt = $conexion->prepare("SELECT linea FROM productos WHERE producto_slug = ?");
    $stmt->bind_param("s", $slugMover);
    $stmt->execute();
    $filaMover = $stmt->get_result()->fetch_assoc();

    if ($filaMover) {
        $linea = $filaMover["linea"];
        $stmt2 = $conexion->prepare("SELECT producto_slug, orden_listado FROM productos WHERE linea = ? ORDER BY orden_listado ASC, producto_slug ASC");
        $stmt2->bind_param("s", $linea);
        $stmt2->execute();
        $grupo = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach ($grupo as $i => &$fila) { $fila["orden_listado"] = $i + 1; }
        unset($fila);

        $posicion = null;
        foreach ($grupo as $i => $fila) {
            if ($fila["producto_slug"] === $slugMover) { $posicion = $i; break; }
        }

        if ($posicion !== null) {
            $vecino = ($direccion === "arriba") ? $posicion - 1 : $posicion + 1;
            if ($vecino >= 0 && $vecino < count($grupo)) {
                $tmp = $grupo[$posicion]["orden_listado"];
                $grupo[$posicion]["orden_listado"] = $grupo[$vecino]["orden_listado"];
                $grupo[$vecino]["orden_listado"] = $tmp;
            }
        }

        $stmtUp = $conexion->prepare("UPDATE productos SET orden_listado = ? WHERE producto_slug = ?");
        foreach ($grupo as $fila) {
            $stmtUp->bind_param("is", $fila["orden_listado"], $fila["producto_slug"]);
            $stmtUp->execute();
        }
    }
    $volverA = isset($_GET["filtro"]) ? "productos.php?filtro=" . urlencode($_GET["filtro"]) : "productos.php";
    header("Location: " . $volverA);
    exit;
}

// --- Guardar nombre bonito editado ---
// --- Guardar/reemplazar un documento (ficha técnica, de seguridad o catálogo) para un producto ---
function guardarDocumentoProducto($conexion, $slug, $linea, $etiqueta, $archivo) {
    if (!isset($archivo) || $archivo["error"] !== 0) return; // no se subió nada, no tocar lo que ya había

    $carpetaDisco = "../pdf/subidos/";
    $carpetaWeb = "pdf/subidos/";
    if (!is_dir($carpetaDisco)) mkdir($carpetaDisco, 0755, true);

    $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
    $nombreLimpio = preg_replace('/[^a-z0-9\-]/', '-', strtolower(pathinfo($archivo["name"], PATHINFO_FILENAME)));
    $nombreArchivo = $nombreLimpio . "-" . time() . "." . $extension;
    $rutaDisco = $carpetaDisco . $nombreArchivo;
    move_uploaded_file($archivo["tmp_name"], $rutaDisco);
    $rutaWeb = $carpetaWeb . $nombreArchivo;

    // ¿Ya existía un documento con esta misma etiqueta para este producto? Si sí, lo reemplazamos
    $stmt = $conexion->prepare("SELECT id, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'pdf' AND nombre = ?");
    $stmt->bind_param("ss", $slug, $etiqueta);
    $stmt->execute();
    $existente = $stmt->get_result()->fetch_assoc();

    if ($existente) {
        $rutaVieja = "../" . $existente["ruta_original"];
        if (file_exists($rutaVieja)) unlink($rutaVieja);
        $stmtU = $conexion->prepare("UPDATE archivos SET ruta_original = ? WHERE id = ?");
        $stmtU->bind_param("si", $rutaWeb, $existente["id"]);
        $stmtU->execute();
    } else {
        $stmtI = $conexion->prepare("INSERT INTO archivos (nombre, ruta_original, tipo, linea, producto_slug) VALUES (?, ?, 'pdf', ?, ?)");
        $stmtI->bind_param("ssss", $etiqueta, $rutaWeb, $linea, $slug);
        $stmtI->execute();
    }
}

// --- Guardar/actualizar el video del producto (guarda solo la URL) ---
function guardarVideoProducto($conexion, $slug, $linea, $url) {
    $url = trim($url);
    $stmt = $conexion->prepare("SELECT id FROM archivos WHERE producto_slug = ? AND tipo = 'video'");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $existente = $stmt->get_result()->fetch_assoc();

    if ($url === "") {
        // Si borraron la URL y ya existía, lo eliminamos
        if ($existente) {
            $stmtD = $conexion->prepare("DELETE FROM archivos WHERE id = ?");
            $stmtD->bind_param("i", $existente["id"]);
            $stmtD->execute();
        }
        return;
    }

    if ($existente) {
        $stmtU = $conexion->prepare("UPDATE archivos SET ruta_original = ? WHERE id = ?");
        $stmtU->bind_param("si", $url, $existente["id"]);
        $stmtU->execute();
    } else {
        $stmtI = $conexion->prepare("INSERT INTO archivos (nombre, ruta_original, tipo, linea, producto_slug) VALUES ('Video del producto', ?, 'video', ?, ?)");
        $stmtI->bind_param("sss", $url, $linea, $slug);
        $stmtI->execute();
    }
}

// --- Redimensionar imagen (para los colores) ---
function generarMiniaturaColor($rutaOrigen, $rutaDestino, $ancho, $alto) {
    $info = getimagesize($rutaOrigen);
    if (!$info) return false;
    $mime = $info['mime'];
    switch ($mime) {
        case 'image/jpeg': $imagenOrigen = imagecreatefromjpeg($rutaOrigen); break;
        case 'image/png':  $imagenOrigen = imagecreatefrompng($rutaOrigen); break;
        case 'image/webp': $imagenOrigen = imagecreatefromwebp($rutaOrigen); break;
        default: return false;
    }
    $anchoOrigen = imagesx($imagenOrigen);
    $altoOrigen = imagesy($imagenOrigen);
    $imagenDestino = imagecreatetruecolor($ancho, $alto);
    imagealphablending($imagenDestino, false);
    imagesavealpha($imagenDestino, true);
    imagecopyresampled($imagenDestino, $imagenOrigen, 0, 0, 0, 0, $ancho, $alto, $anchoOrigen, $altoOrigen);
    imagepng($imagenDestino, $rutaDestino);
    imagedestroy($imagenOrigen);
    imagedestroy($imagenDestino);
    return true;
}

// --- Agregar un nuevo color al producto ---
function agregarColorProducto($conexion, $slug, $linea, $nombreColor, $archivo) {
    if (empty($nombreColor) || !isset($archivo) || $archivo["error"] !== 0) return;

    $carpetaDisco = "../imgs/subidos/";
    $carpetaWeb = "imgs/subidos/";
    if (!is_dir($carpetaDisco)) mkdir($carpetaDisco, 0755, true);

    $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
    $nombreLimpio = preg_replace('/[^a-z0-9\-]/', '-', strtolower(pathinfo($archivo["name"], PATHINFO_FILENAME)));
    $nombreArchivo = "color-" . $nombreLimpio . "-" . time() . "." . $extension;

    $rutaOriginalDisco = $carpetaDisco . $nombreArchivo;
    move_uploaded_file($archivo["tmp_name"], $rutaOriginalDisco);

    $rutaThumbDisco = $carpetaDisco . "thumb-" . $nombreArchivo;
    $extOk = in_array($extension, ["jpg", "jpeg", "png", "webp"]);
    if ($extOk) {
        generarMiniaturaColor($rutaOriginalDisco, $rutaThumbDisco, 100, 100);
    }

    $rutaOriginalWeb = $carpetaWeb . $nombreArchivo;
    $rutaThumbWeb = $extOk ? $carpetaWeb . "thumb-" . $nombreArchivo : $rutaOriginalWeb;

    $stmt = $conexion->prepare("INSERT INTO archivos (nombre, ruta_original, ruta_thumb, tipo, linea, producto_slug) VALUES (?, ?, ?, 'color', ?, ?)");
    $stmt->bind_param("sssss", $nombreColor, $rutaOriginalWeb, $rutaThumbWeb, $linea, $slug);
    $stmt->execute();
}

// --- Eliminar un color existente ---
// --- Reordenar un color (dentro del mismo producto) ---
if (isset($_GET["mover_color"]) && isset($_GET["color_id"])) {
    $idMover = (int) $_GET["color_id"];
    $direccion = $_GET["mover_color"];

    $stmt = $conexion->prepare("SELECT producto_slug FROM archivos WHERE id = ? AND tipo = 'color'");
    $stmt->bind_param("i", $idMover);
    $stmt->execute();
    $filaMover = $stmt->get_result()->fetch_assoc();

    if ($filaMover) {
        $slugGrupo = $filaMover["producto_slug"];
        $stmt2 = $conexion->prepare("SELECT id, orden FROM archivos WHERE producto_slug = ? AND tipo = 'color' ORDER BY orden ASC, id ASC");
        $stmt2->bind_param("s", $slugGrupo);
        $stmt2->execute();
        $grupo = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach ($grupo as $i => &$fila) { $fila["orden"] = $i + 1; }
        unset($fila);

        $posicion = null;
        foreach ($grupo as $i => $fila) {
            if ($fila["id"] == $idMover) { $posicion = $i; break; }
        }
        if ($posicion !== null) {
            $vecino = ($direccion === "arriba") ? $posicion - 1 : $posicion + 1;
            if ($vecino >= 0 && $vecino < count($grupo)) {
                $tmp = $grupo[$posicion]["orden"];
                $grupo[$posicion]["orden"] = $grupo[$vecino]["orden"];
                $grupo[$vecino]["orden"] = $tmp;
            }
        }
        $stmtUp = $conexion->prepare("UPDATE archivos SET orden = ? WHERE id = ?");
        foreach ($grupo as $fila) {
            $stmtUp->bind_param("ii", $fila["orden"], $fila["id"]);
            $stmtUp->execute();
        }
    }
    $volverA = isset($_GET["filtro"]) ? "productos.php?filtro=" . urlencode($_GET["filtro"]) : "productos.php";
    header("Location: " . $volverA);
    exit;
}

// --- Renombrar un color (vía enlace + prompt de JS, para evitar formularios anidados) ---
if (isset($_GET["renombrar_color"]) && isset($_GET["nuevo_nombre"])) {
    $idColor = (int) $_GET["renombrar_color"];
    $nuevoNombre = trim($_GET["nuevo_nombre"]);
    if ($nuevoNombre !== "") {
        $stmt = $conexion->prepare("UPDATE archivos SET nombre = ? WHERE id = ? AND tipo = 'color'");
        $stmt->bind_param("si", $nuevoNombre, $idColor);
        $stmt->execute();
    }
    $volverA = isset($_GET["filtro"]) ? "productos.php?filtro=" . urlencode($_GET["filtro"]) : "productos.php";
    header("Location: " . $volverA);
    exit;
}

if (isset($_GET["eliminar_color"])) {
    $idColor = (int) $_GET["eliminar_color"];
    $stmt = $conexion->prepare("SELECT ruta_original, ruta_thumb FROM archivos WHERE id = ? AND tipo = 'color'");
    $stmt->bind_param("i", $idColor);
    $stmt->execute();
    $colorAEliminar = $stmt->get_result()->fetch_assoc();
    if ($colorAEliminar) {
        $rOriginal = "../" . $colorAEliminar["ruta_original"];
        $rThumb = $colorAEliminar["ruta_thumb"] ? "../" . $colorAEliminar["ruta_thumb"] : null;
        if (file_exists($rOriginal)) unlink($rOriginal);
        if ($rThumb && $rThumb !== $rOriginal && file_exists($rThumb)) unlink($rThumb);
        $stmtD = $conexion->prepare("DELETE FROM archivos WHERE id = ?");
        $stmtD->bind_param("i", $idColor);
        $stmtD->execute();
    }
    $volverA = isset($_GET["filtro"]) ? "productos.php?filtro=" . urlencode($_GET["filtro"]) : "productos.php";
    header("Location: " . $volverA);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["producto_slug"])) {
    $slug = $_POST["producto_slug"];
    $nombreDisplay = trim($_POST["nombre_display"]);
    $descripcion = trim($_POST["descripcion"] ?? "");
    $caracteristicas = trim($_POST["caracteristicas"] ?? "");
    $tamanos = trim($_POST["tamanos"] ?? "");
    $aplicacion = trim($_POST["aplicacion"] ?? "");
    $stmt = $conexion->prepare("UPDATE productos SET nombre_display = ?, descripcion = ?, caracteristicas = ?, tamanos = ?, aplicacion = ? WHERE producto_slug = ?");
    $stmt->bind_param("ssssss", $nombreDisplay, $descripcion, $caracteristicas, $tamanos, $aplicacion, $slug);
    $stmt->execute();

    // Documentos y video (solo se tocan si el admin subió/escribió algo nuevo)
    $linea = $_POST["linea_actual"] ?? "";
    guardarDocumentoProducto($conexion, $slug, $linea, "Ficha técnica", $_FILES["ficha_tecnica"] ?? null);
    guardarDocumentoProducto($conexion, $slug, $linea, "Ficha de seguridad", $_FILES["ficha_seguridad"] ?? null);
    guardarDocumentoProducto($conexion, $slug, $linea, "Catálogo", $_FILES["catalogo"] ?? null);
    guardarVideoProducto($conexion, $slug, $linea, $_POST["video_url"] ?? "");

    // Si se escribió un nombre de color nuevo y se subió su imagen, lo agregamos
    agregarColorProducto($conexion, $slug, $linea, trim($_POST["color_nombre_nuevo"] ?? ""), $_FILES["color_imagen_nueva"] ?? null);

    header("Location: productos.php");
    exit;
}

// --- Detectar automáticamente productos nuevos que no estén aún en la tabla "productos" ---
$sqlNuevos = "SELECT DISTINCT producto_slug, linea FROM archivos
              WHERE producto_slug IS NOT NULL AND producto_slug != ''
              AND producto_slug NOT IN (SELECT producto_slug FROM productos)";
$nuevos = $conexion->query($sqlNuevos)->fetch_all(MYSQLI_ASSOC);
foreach ($nuevos as $nuevo) {
    $stmt = $conexion->prepare("INSERT INTO productos (producto_slug, linea, orden_listado) VALUES (?, ?, 999)");
    $stmt->bind_param("ss", $nuevo["producto_slug"], $nuevo["linea"]);
    $stmt->execute();
}

$filtroLinea = $_GET["filtro"] ?? "";

$lineasDisponibles = $conexion->query("SELECT DISTINCT linea FROM productos WHERE linea IS NOT NULL AND linea != '' ORDER BY linea ASC")->fetch_all(MYSQLI_ASSOC);

if ($filtroLinea !== "") {
    $stmtF = $conexion->prepare("SELECT * FROM productos WHERE linea = ? ORDER BY orden_listado ASC");
    $stmtF->bind_param("s", $filtroLinea);
    $stmtF->execute();
    $productos = $stmtF->get_result()->fetch_all(MYSQLI_ASSOC);
} else {
    $productos = $conexion->query("SELECT * FROM productos ORDER BY linea ASC, orden_listado ASC")->fetch_all(MYSQLI_ASSOC);
}

require "header.php";
?>
    <div class="encabezado-pagina">
        <h2>Productos</h2>
        <p>Ponle un nombre claro a cada producto y ordena cómo aparecen sus tarjetas en el listado. Usa <code>|</code> donde quieras un salto de línea, ej: <code>IMPRIMANTE ACRÍLICO|JHOMERON</code></p>
    </div>

    <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:18px;">
        <a href="productos.php" class="filtro-linea <?php echo $filtroLinea === '' ? 'filtro-activo' : ''; ?>">Todas</a>
        <?php foreach ($lineasDisponibles as $l): ?>
            <a href="productos.php?filtro=<?php echo urlencode($l['linea']); ?>"
               class="filtro-linea <?php echo $filtroLinea === $l['linea'] ? 'filtro-activo' : ''; ?>">
                <?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $l['linea']))); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <?php if (count($productos) === 0): ?>
    <div class="tarjeta">
        <p class="vacio">No hay productos en esta línea todavía.</p>
    </div>
    <?php else: foreach ($productos as $p):
        // Traemos la primera imagen de este producto para mostrarla de referencia
        $stmtImg = $conexion->prepare("SELECT ruta_thumb, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'imagen' ORDER BY orden ASC, id ASC LIMIT 1");
        $stmtImg->bind_param("s", $p["producto_slug"]);
        $stmtImg->execute();
        $imagenRef = $stmtImg->get_result()->fetch_assoc();
    ?>
    <div class="tarjeta" style="margin-bottom: 14px; padding: 0; overflow: hidden;">
        <details>
            <summary style="list-style:none; cursor:pointer; padding: 18px 30px; display:flex; justify-content:space-between; align-items:center;">
                <div style="display:flex; align-items:center; gap:14px;">
                    <?php if ($imagenRef): ?>
                        <img src="../<?php echo htmlspecialchars($imagenRef['ruta_thumb'] ?: $imagenRef['ruta_original']); ?>"
                             style="width:44px; height:44px; object-fit:cover; border-radius:8px; border:1px solid var(--gris-borde); flex-shrink:0;">
                    <?php else: ?>
                        <div style="width:44px; height:44px; border-radius:8px; background:var(--gris-fondo); display:flex; align-items:center; justify-content:center; font-size:18px; color:#c7ccd6; flex-shrink:0;">🖼</div>
                    <?php endif; ?>
                    <div>
                        <strong style="font-family:'Outfit', sans-serif; font-size:14.5px;">
                            <?php echo htmlspecialchars($p["nombre_display"] ?: str_replace('|', ' ', $p["producto_slug"])); ?>
                        </strong>
                        <br>
                        <code style="background:var(--gris-fondo); padding:2px 7px; border-radius:6px; font-size:11px;"><?php echo htmlspecialchars($p["producto_slug"]); ?></code>
                        <span style="color:#9298a8; font-size:12px; margin-left:6px;">Línea: <?php echo htmlspecialchars($p["linea"] ?: "—"); ?></span>
                    </div>
                </div>
                <span style="font-size:12px; color:#9298a8;">Clic para editar ▾</span>
            </summary>
            <div style="padding: 0 30px 26px;">
                <div style="text-align:right; margin-bottom:10px;">
                    <a href="productos.php?mover=arriba&slug=<?php echo urlencode($p['producto_slug']); ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>" class="accion-orden" title="Subir">▲</a>
                    <a href="productos.php?mover=abajo&slug=<?php echo urlencode($p['producto_slug']); ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>" class="accion-orden" title="Bajar">▼</a>
                </div>
                <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="producto_slug" value="<?php echo htmlspecialchars($p["producto_slug"]); ?>">
            <input type="hidden" name="linea_actual" value="<?php echo htmlspecialchars($p["linea"] ?? ''); ?>">

            <label>Nombre a mostrar (usa | para salto de línea)</label>
            <input type="text" name="nombre_display" value="<?php echo htmlspecialchars($p["nombre_display"] ?? ''); ?>" placeholder="ej: Latex Duracolor|Jhomeron">

            <label>Descripción</label>
            <input type="text" name="descripcion" value="<?php echo htmlspecialchars($p["descripcion"] ?? ''); ?>" placeholder="Breve descripción del producto">

            <label>Características (elige ícono + escribe el texto, hasta 6). Usa <code>~~</code> donde quieras un salto de línea dentro del texto, ej: <code>Rendimiento:~~54 m² a una mano</code></label>
            <div class="filas-caracteristicas" data-slug="<?php echo htmlspecialchars($p['producto_slug']); ?>">
                <?php
                $filasExistentes = [];
                if (!empty($p["caracteristicas"])) {
                    foreach (explode("|", $p["caracteristicas"]) as $item) {
                        if (strpos($item, "::") !== false) {
                            [$ic, $tx] = explode("::", $item, 2);
                        } else { $ic = ""; $tx = $item; }
                        $filasExistentes[] = [$ic, $tx];
                    }
                }
                while (count($filasExistentes) < 6) { $filasExistentes[] = ["", ""]; }
                foreach ($filasExistentes as $fila):
                ?>
                <div style="display:flex; gap:8px; margin-bottom:8px; align-items:center;">
                    <select class="select-icono-carac" style="width:170px; flex-shrink:0;">
                        <option value="">-- ícono --</option>
                        <?php foreach ($iconosCaracteristicas as $ic): ?>
                            <option value="<?php echo htmlspecialchars($ic); ?>" <?php echo $fila[0] === $ic ? "selected" : ""; ?>><?php echo htmlspecialchars($ic); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <img class="preview-icono" src="../icons/caracter/<?php echo htmlspecialchars($fila[0]); ?>.svg"
                         style="width:24px; height:24px; <?php echo $fila[0] ? '' : 'visibility:hidden;'; ?>" onerror="this.style.visibility='hidden'">
                    <input type="text" class="texto-carac" value="<?php echo htmlspecialchars($fila[1]); ?>" placeholder="Texto de la característica" style="margin:0;">
                </div>
                <?php endforeach; ?>
            </div>
            <input type="hidden" name="caracteristicas" class="input-caracteristicas-final">

            <label>Tamaños disponibles (separados por coma)</label>
            <input type="text" name="tamanos" value="<?php echo htmlspecialchars($p["tamanos"] ?? ''); ?>" placeholder="1 Gal, 4 Gal, 20 Gal">

            <label>Aplicación (marca los íconos que apliquen)</label>
            <div style="display:flex; flex-wrap:wrap; gap:14px; background:var(--gris-fondo); padding:12px; border-radius:8px;">
                <?php
                $aplicacionSeleccionada = !empty($p["aplicacion"]) ? array_map('trim', explode(",", $p["aplicacion"])) : [];
                foreach ($iconosAplicacion as $ic):
                ?>
                <label style="display:flex; align-items:center; gap:6px; font-size:12.5px; font-weight:500; text-transform:none; margin:0; cursor:pointer;">
                    <input type="checkbox" class="check-aplicacion" value="<?php echo htmlspecialchars($ic); ?>"
                           <?php echo in_array($ic, $aplicacionSeleccionada) ? "checked" : ""; ?> style="width:auto;">
                    <img src="../icons/aplicacion/<?php echo htmlspecialchars($ic); ?>.svg" style="width:20px; height:20px;" onerror="this.style.display='none'">
                    <?php echo htmlspecialchars($ic); ?>
                </label>
                <?php endforeach; ?>
            </div>
            <input type="hidden" name="aplicacion" class="input-aplicacion-final">

            <?php
            // Buscamos qué documentos/video ya tiene este producto, para mostrar su estado
            $stmtDocs = $conexion->prepare("SELECT nombre, ruta_original FROM archivos WHERE producto_slug = ? AND (tipo = 'pdf' OR tipo = 'video')");
            $stmtDocs->bind_param("s", $p["producto_slug"]);
            $stmtDocs->execute();
            $docsExistentes = [];
            foreach ($stmtDocs->get_result()->fetch_all(MYSQLI_ASSOC) as $d) {
                $docsExistentes[$d["nombre"]] = $d["ruta_original"];
            }
            $videoActual = $docsExistentes["Video del producto"] ?? "";

            // Colores ya existentes para este producto
            $stmtColores = $conexion->prepare("SELECT id, nombre, ruta_thumb, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'color' ORDER BY orden ASC, id ASC");
            $stmtColores->bind_param("s", $p["producto_slug"]);
            $stmtColores->execute();
            $coloresExistentes = $stmtColores->get_result()->fetch_all(MYSQLI_ASSOC);
            ?>

            <label style="margin-top:20px;">Ficha técnica (PDF) <?php echo isset($docsExistentes["Ficha técnica"]) ? '<span style="color:#1ea672;">✓ ya subida</span>' : ''; ?></label>
            <div class="zona-archivo">
                <input type="file" name="ficha_tecnica" accept="application/pdf" onchange="mostrarNombreArchivo(this)">
                <span class="icono-subida">📎</span>
                <div class="texto-subida"><strong>Haz clic para subir</strong> o reemplazar el PDF</div>
                <div class="nombre-archivo-elegido"></div>
            </div>

            <label>Ficha de seguridad (PDF) <?php echo isset($docsExistentes["Ficha de seguridad"]) ? '<span style="color:#1ea672;">✓ ya subida</span>' : ''; ?></label>
            <div class="zona-archivo">
                <input type="file" name="ficha_seguridad" accept="application/pdf" onchange="mostrarNombreArchivo(this)">
                <span class="icono-subida">📎</span>
                <div class="texto-subida"><strong>Haz clic para subir</strong> o reemplazar el PDF</div>
                <div class="nombre-archivo-elegido"></div>
            </div>

            <label>Catálogo (PDF) <?php echo isset($docsExistentes["Catálogo"]) ? '<span style="color:#1ea672;">✓ ya subido</span>' : ''; ?></label>
            <div class="zona-archivo">
                <input type="file" name="catalogo" accept="application/pdf" onchange="mostrarNombreArchivo(this)">
                <span class="icono-subida">📎</span>
                <div class="texto-subida"><strong>Haz clic para subir</strong> o reemplazar el PDF</div>
                <div class="nombre-archivo-elegido"></div>
            </div>

            <label>Video (pega la URL de YouTube; déjalo vacío para quitar el video)</label>
            <input type="text" name="video_url" value="<?php echo htmlspecialchars($videoActual); ?>" placeholder="https://youtube.com/watch?v=...">

            <label style="margin-top:24px;">Colores del producto</label>
            <?php if (count($coloresExistentes) > 0): ?>
                <div style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:14px;">
                    <?php foreach ($coloresExistentes as $color): ?>
                        <div style="text-align:center; width:80px;">
                            <img src="../<?php echo htmlspecialchars($color['ruta_thumb'] ?: $color['ruta_original']); ?>"
                                 style="width:56px; height:56px; border-radius:6px; object-fit:cover; border:1px solid var(--gris-borde); background:white;">
                            <div style="font-size:10.5px; color:#333; margin-top:4px; line-height:1.2;"><?php echo htmlspecialchars($color['nombre']); ?></div>
                            <a href="javascript:void(0)" onclick="renombrarColor(<?php echo $color['id']; ?>, '<?php echo htmlspecialchars(addslashes($color['nombre']), ENT_QUOTES); ?>', '<?php echo htmlspecialchars($filtroLinea); ?>')"
                               style="font-size:10px; color:var(--azul); text-decoration:none;">Editar nombre</a>
                            <div style="margin-top:4px; display:flex; justify-content:center; gap:4px;">
                                <a href="productos.php?mover_color=arriba&color_id=<?php echo $color['id']; ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>" class="accion-orden" title="Subir" style="font-size:9px; padding:2px 5px;">▲</a>
                                <a href="productos.php?mover_color=abajo&color_id=<?php echo $color['id']; ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>" class="accion-orden" title="Bajar" style="font-size:9px; padding:2px 5px;">▼</a>
                            </div>
                            <a href="productos.php?eliminar_color=<?php echo $color['id']; ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>"
                               onclick="return confirm('¿Borrar este color?');"
                               style="font-size:10px; color:var(--rojo); text-decoration:none; display:block; margin-top:4px;">Borrar</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="nota" style="margin-top:0;">Este producto todavía no tiene colores agregados.</p>
            <?php endif; ?>

            <label>Agregar nuevo color</label>
            <input type="text" name="color_nombre_nuevo" placeholder="Nombre del color, ej: Rojo Bandera">
            <div class="zona-archivo">
                <input type="file" name="color_imagen_nueva" accept="image/*" onchange="mostrarNombreArchivo(this)">
                <span class="icono-subida">🎨</span>
                <div class="texto-subida"><strong>Haz clic para elegir</strong> la imagen del color</div>
                <div class="nombre-archivo-elegido"></div>
            </div>

            <button type="submit" style="max-width:200px;">Guardar</button>
                </form>
            </div>
        </details>
    </div>
    <?php endforeach; endif; ?>
<script>
        function renombrarColor(id, nombreActual, filtro) {
            const nuevoNombre = prompt("Nuevo nombre para este color:", nombreActual);
            if (nuevoNombre !== null && nuevoNombre.trim() !== "") {
                let url = "productos.php?renombrar_color=" + id + "&nuevo_nombre=" + encodeURIComponent(nuevoNombre.trim());
                if (filtro) url += "&filtro=" + encodeURIComponent(filtro);
                window.location.href = url;
            }
        }

        function mostrarNombreArchivo(input) {
            const destino = input.parentElement.querySelector(".nombre-archivo-elegido");
            if (destino) destino.textContent = input.files.length ? input.files[0].name : "";
        }

        // Antes de enviar cada formulario de producto, armamos los campos ocultos
        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", function () {
                const filasDiv = form.querySelector(".filas-caracteristicas");
                if (filasDiv) {
                    const filas = filasDiv.querySelectorAll("div");
                    const partes = [];
                    filas.forEach(fila => {
                        const icono = fila.querySelector(".select-icono-carac")?.value || "";
                        const texto = fila.querySelector(".texto-carac")?.value.trim() || "";
                        if (texto !== "") {
                            partes.push(icono ? (icono + "::" + texto) : texto);
                        }
                    });
                    const inputFinal = form.querySelector(".input-caracteristicas-final");
                    if (inputFinal) inputFinal.value = partes.join("|");
                }

                const checks = form.querySelectorAll(".check-aplicacion:checked");
                if (checks.length > 0 || form.querySelector(".input-aplicacion-final")) {
                    const seleccionados = Array.from(checks).map(c => c.value);
                    const inputAplic = form.querySelector(".input-aplicacion-final");
                    if (inputAplic) inputAplic.value = seleccionados.join(",");
                }
            });
        });

        // Vista previa del ícono al cambiar el select de cada característica
        document.querySelectorAll(".select-icono-carac").forEach(select => {
            select.addEventListener("change", function () {
                const preview = this.parentElement.querySelector(".preview-icono");
                if (this.value) {
                    preview.src = "../icons/caracter/" + this.value + ".svg";
                    preview.style.visibility = "visible";
                } else {
                    preview.style.visibility = "hidden";
                }
            });
        });
    </script>
<?php require "footer.php"; ?>