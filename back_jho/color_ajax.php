<?php
// color_ajax.php
// Endpoint dedicado para manejar los colores de un producto (agregar, borrar,
// renombrar, reordenar) SIN recargar la página — antes esto vivía mezclado dentro
// del formulario gigante de productos.php, así que subir 1 color recargaba TODO
// el formulario y perdías el lugar donde estabas. Todo aquí responde en JSON.

session_start();
require_once "conexion.php";

if (!isset($_SESSION["admin_id"])) {
    http_response_code(401);
    echo json_encode(["ok" => false, "error" => "No autorizado"]);
    exit;
}

header("Content-Type: application/json; charset=utf-8");

// --- Miniatura cuadrada para el color (igual que ya se hacía en productos.php) ---
function generarMiniaturaColor($rutaOrigen, $rutaDestino, $ancho, $alto) {
    $info = @getimagesize($rutaOrigen);
    if (!$info) return false;
    $mime = $info["mime"];
    $imagenOrigen = null;
    switch ($mime) {
        case "image/jpeg": $imagenOrigen = @imagecreatefromjpeg($rutaOrigen); break;
        case "image/png":  $imagenOrigen = @imagecreatefrompng($rutaOrigen); break;
        case "image/webp": $imagenOrigen = @imagecreatefromwebp($rutaOrigen); break;
        default: return false;
    }
    if (!$imagenOrigen) return false;

    $anchoOrigen = imagesx($imagenOrigen);
    $altoOrigen = imagesy($imagenOrigen);
    $imagenDestino = imagecreatetruecolor($ancho, $alto);
    imagesavealpha($imagenDestino, true);
    $transparente = imagecolorallocatealpha($imagenDestino, 0, 0, 0, 127);
    imagefill($imagenDestino, 0, 0, $transparente);

    $ratioOrigen = $anchoOrigen / $altoOrigen;
    $ratioDestino = $ancho / $alto;
    if ($ratioOrigen > $ratioDestino) {
        $altoRecorte = $altoOrigen;
        $anchoRecorte = (int) ($altoOrigen * $ratioDestino);
        $xRecorte = (int) (($anchoOrigen - $anchoRecorte) / 2);
        $yRecorte = 0;
    } else {
        $anchoRecorte = $anchoOrigen;
        $altoRecorte = (int) ($anchoOrigen / $ratioDestino);
        $xRecorte = 0;
        $yRecorte = (int) (($altoOrigen - $altoRecorte) / 2);
    }
    imagecopyresampled($imagenDestino, $imagenOrigen, 0, 0, $xRecorte, $yRecorte, $ancho, $alto, $anchoRecorte, $altoRecorte);
    imagepng($imagenDestino, $rutaDestino);
    imagedestroy($imagenOrigen);
    imagedestroy($imagenDestino);
    return true;
}

$accion = $_POST["accion"] ?? $_GET["accion"] ?? "";

// ---------- AGREGAR ----------
if ($accion === "agregar") {
    $slug = trim($_POST["producto_slug"] ?? "");
    $linea = trim($_POST["linea"] ?? "");
    $nombreColor = trim($_POST["nombre"] ?? "");

    if ($slug === "" || $nombreColor === "" || !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] !== 0) {
        echo json_encode(["ok" => false, "error" => "Falta el nombre o la imagen del color."]);
        exit;
    }

    $carpetaDisco = "../imgs/subidos/";
    $carpetaWeb = "imgs/subidos/";
    if (!is_dir($carpetaDisco)) mkdir($carpetaDisco, 0755, true);

    $archivo = $_FILES["imagen"];
    $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
    $nombreLimpio = preg_replace('/[^a-z0-9\-]/', '-', strtolower(pathinfo($archivo["name"], PATHINFO_FILENAME)));
    $nombreArchivo = "color-" . $nombreLimpio . "-" . time() . "." . $extension;

    $rutaOriginalDisco = $carpetaDisco . $nombreArchivo;
    move_uploaded_file($archivo["tmp_name"], $rutaOriginalDisco);

    $rutaThumbDisco = $carpetaDisco . "thumb-" . $nombreArchivo;
    $extOk = in_array($extension, ["jpg", "jpeg", "png", "webp"]);
    if ($extOk) generarMiniaturaColor($rutaOriginalDisco, $rutaThumbDisco, 100, 100);

    $rutaOriginalWeb = $carpetaWeb . $nombreArchivo;
    $rutaThumbWeb = $extOk ? $carpetaWeb . "thumb-" . $nombreArchivo : $rutaOriginalWeb;

    // El nuevo color sigue el orden: se le asigna 1 número más que el máximo "orden"
    // que ya exista para este producto (si estaba en 5, este nuevo se vuelve 6).
    $stmtMax = $conexion->prepare("SELECT COALESCE(MAX(orden), 0) AS maxOrden FROM archivos WHERE producto_slug = ? AND tipo = 'color'");
    $stmtMax->bind_param("s", $slug);
    $stmtMax->execute();
    $maxOrden = (int) $stmtMax->get_result()->fetch_assoc()["maxOrden"];
    $nuevoOrden = $maxOrden + 1;

    $stmt = $conexion->prepare("INSERT INTO archivos (nombre, ruta_original, ruta_thumb, tipo, linea, producto_slug, orden) VALUES (?, ?, ?, 'color', ?, ?, ?)");
    $stmt->bind_param("sssssi", $nombreColor, $rutaOriginalWeb, $rutaThumbWeb, $linea, $slug, $nuevoOrden);
    $stmt->execute();
    $nuevoId = $conexion->insert_id;

    echo json_encode([
        "ok" => true,
        "color" => [
            "id" => $nuevoId,
            "nombre" => $nombreColor,
            "thumb" => $rutaThumbWeb,
            "posicion" => $nuevoOrden,
        ],
    ]);
    exit;
}

// ---------- ELIMINAR ----------
if ($accion === "eliminar") {
    $idColor = (int) ($_POST["color_id"] ?? 0);
    $stmt = $conexion->prepare("SELECT ruta_original, ruta_thumb FROM archivos WHERE id = ? AND tipo = 'color'");
    $stmt->bind_param("i", $idColor);
    $stmt->execute();
    $color = $stmt->get_result()->fetch_assoc();

    if (!$color) {
        echo json_encode(["ok" => false, "error" => "No se encontró ese color."]);
        exit;
    }

    $rOriginal = "../" . $color["ruta_original"];
    $rThumb = $color["ruta_thumb"] ? "../" . $color["ruta_thumb"] : null;
    if (file_exists($rOriginal)) unlink($rOriginal);
    if ($rThumb && $rThumb !== $rOriginal && file_exists($rThumb)) unlink($rThumb);

    $stmtD = $conexion->prepare("DELETE FROM archivos WHERE id = ?");
    $stmtD->bind_param("i", $idColor);
    $stmtD->execute();

    echo json_encode(["ok" => true]);
    exit;
}

// ---------- RENOMBRAR ----------
if ($accion === "renombrar") {
    $idColor = (int) ($_POST["color_id"] ?? 0);
    $nuevoNombre = trim($_POST["nuevo_nombre"] ?? "");
    if ($nuevoNombre === "") {
        echo json_encode(["ok" => false, "error" => "El nombre no puede quedar vacío."]);
        exit;
    }
    $stmt = $conexion->prepare("UPDATE archivos SET nombre = ? WHERE id = ? AND tipo = 'color'");
    $stmt->bind_param("si", $nuevoNombre, $idColor);
    $stmt->execute();
    echo json_encode(["ok" => true, "nombre" => $nuevoNombre]);
    exit;
}

// ---------- MOVER (reordenar arriba/abajo) ----------
if ($accion === "mover") {
    $idMover = (int) ($_POST["color_id"] ?? 0);
    $direccion = $_POST["direccion"] ?? "";

    $stmt = $conexion->prepare("SELECT producto_slug FROM archivos WHERE id = ? AND tipo = 'color'");
    $stmt->bind_param("i", $idMover);
    $stmt->execute();
    $filaMover = $stmt->get_result()->fetch_assoc();

    if (!$filaMover) {
        echo json_encode(["ok" => false, "error" => "No se encontró ese color."]);
        exit;
    }

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

    // Devolvemos el nuevo orden completo (id + posición), para que el panel
    // reordene los colores en pantalla sin tener que recargar nada.
    $stmt3 = $conexion->prepare("SELECT id, orden FROM archivos WHERE producto_slug = ? AND tipo = 'color' ORDER BY orden ASC, id ASC");
    $stmt3->bind_param("s", $slugGrupo);
    $stmt3->execute();
    $ordenFinal = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

    echo json_encode(["ok" => true, "orden" => $ordenFinal]);
    exit;
}

echo json_encode(["ok" => false, "error" => "Acción no reconocida."]);