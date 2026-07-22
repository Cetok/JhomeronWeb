<?php
// editar.php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET["id"])) {
    header("Location: listar.php");
    exit;
}

$id = (int) $_GET["id"];
$mensaje = "";

$carpeta_imgs = "../imgs/subidos/";
$carpeta_pdf  = "../pdf/subidos/";

function generarMiniatura($rutaOrigen, $rutaDestino, $ancho, $alto) {
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

$stmt = $conexion->prepare("SELECT * FROM archivos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$archivoActual = $stmt->get_result()->fetch_assoc();

if (!$archivoActual) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $linea = $_POST["linea"];
    $producto_slug = trim($_POST["producto_slug"]);
    $orden = (int) $archivoActual["orden"]; // se conserva el orden que ya tenía, no se pide en el formulario

    // Rutas guardadas en BD (relativas a la raíz del proyecto, sin ../)
    $rutaOriginal = $archivoActual["ruta_original"];
    $rutaThumb = $archivoActual["ruta_thumb"];
    $rutaDetalle = $archivoActual["ruta_detalle"];

    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] === 0) {
        $archivo = $_FILES["archivo"];
        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
        $nombreLimpio = preg_replace('/[^a-z0-9\-]/', '-', strtolower(pathinfo($archivo["name"], PATHINFO_FILENAME)));
        $nombreArchivo = $nombreLimpio . "-" . time() . "." . $extension;

        // Para borrar del disco (este script vive en back_jho/, hay que anteponer "../")
        if ($archivoActual["tipo"] !== "video" && $archivoActual["tipo"] !== "link") {
            $rOriginalDisco = "../" . $rutaOriginal;
            $rThumbDisco = $rutaThumb ? "../" . $rutaThumb : null;
            $rDetalleDisco = $rutaDetalle ? "../" . $rutaDetalle : null;

            if (file_exists($rOriginalDisco)) unlink($rOriginalDisco);
            if ($rThumbDisco && $rThumbDisco !== $rOriginalDisco && file_exists($rThumbDisco)) unlink($rThumbDisco);
            if ($rDetalleDisco && $rDetalleDisco !== $rOriginalDisco && file_exists($rDetalleDisco)) unlink($rDetalleDisco);
        }

        $carpeta_imgs_disco = "../imgs/subidos/";
        $carpeta_pdf_disco  = "../pdf/subidos/";
        $carpeta_imgs_web = "imgs/subidos/";
        $carpeta_pdf_web  = "pdf/subidos/";

        if ($archivoActual["tipo"] === "pdf") {
            move_uploaded_file($archivo["tmp_name"], $carpeta_pdf_disco . $nombreArchivo);
            $rutaOriginal = $carpeta_pdf_web . $nombreArchivo; // se guarda en BD sin ../
            $rutaThumb = null;
            $rutaDetalle = null;
        } else {
            $rutaOriginalDisco = $carpeta_imgs_disco . $nombreArchivo;
            move_uploaded_file($archivo["tmp_name"], $rutaOriginalDisco);

            $rutaThumbDisco = $carpeta_imgs_disco . "thumb-200-" . $nombreArchivo;
            $rutaDetalleDisco = $carpeta_imgs_disco . "thumb-400-" . $nombreArchivo;

            $extOk = in_array($extension, ["jpg", "jpeg", "png", "webp"]);
            if ($extOk) {
                generarMiniatura($rutaOriginalDisco, $rutaThumbDisco, 200, 200);
                generarMiniatura($rutaOriginalDisco, $rutaDetalleDisco, 400, 400);
            }

            // Lo que se guarda en BD, sin ../
            $rutaOriginal = $carpeta_imgs_web . $nombreArchivo;
            $rutaThumb = $extOk ? $carpeta_imgs_web . "thumb-200-" . $nombreArchivo : $rutaOriginal;
            $rutaDetalle = $extOk ? $carpeta_imgs_web . "thumb-400-" . $nombreArchivo : $rutaOriginal;
        }
    }

    if ($archivoActual["tipo"] === "video" || $archivoActual["tipo"] === "link") {
        if (isset($_POST["url"]) && trim($_POST["url"]) !== "") {
            $rutaOriginal = trim($_POST["url"]);
        }
    }

    $stmt2 = $conexion->prepare("UPDATE archivos SET nombre = ?, linea = ?, producto_slug = ?, orden = ?, ruta_original = ?, ruta_thumb = ?, ruta_detalle = ? WHERE id = ?");
    $stmt2->bind_param("sssisssi", $nombre, $linea, $producto_slug, $orden, $rutaOriginal, $rutaThumb, $rutaDetalle, $id);
    $stmt2->execute();

    $mensaje = "Cambios guardados correctamente.";

    $stmt = $conexion->prepare("SELECT * FROM archivos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $archivoActual = $stmt->get_result()->fetch_assoc();
}

$lineas = [
    "decorativa" => "Decorativa",
    "automotriz" => "Automotriz",
    "industrial" => "Industrial",
    "marina" => "Marina",
    "trafico" => "Tráfico (Señalización)",
    "madera" => "Madera",
    "disolventes" => "Disolventes",
    "resinas-pegamentos" => "Resinas y Pegamentos",
    "insumos-quimicos" => "Insumos Químicos",
];

$iconos_tipo = ["imagen" => "🖼", "pdf" => "📄", "video" => "🎬", "link" => "🔗"];

require "header.php";
?>
    <div class="encabezado-pagina">
        <h2>Editar archivo</h2>
        <p><a class="link-secundario" href="listar.php">← Volver a la lista</a></p>
    </div>

    <div class="tarjeta">
        <?php if ($mensaje): ?><div class="mensaje"><?php echo $mensaje; ?></div><?php endif; ?>

        <div class="vista-actual">
            <?php if ($archivoActual["tipo"] === "imagen" && $archivoActual["ruta_thumb"]): ?>
                <img src="<?php echo htmlspecialchars('../' . $archivoActual["ruta_thumb"]); ?>" alt="">
            <?php else: ?>
                <span style="font-size:28px;"><?php echo $iconos_tipo[$archivoActual["tipo"]] ?? "📎"; ?></span>
            <?php endif; ?>
            <div>
                <strong><?php echo htmlspecialchars($archivoActual["nombre"]); ?></strong><br>
                <span class="gota-tipo gota-<?php echo htmlspecialchars($archivoActual["tipo"]); ?>"><?php echo htmlspecialchars($archivoActual["tipo"]); ?></span>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <label>Nombre / descripción</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($archivoActual["nombre"]); ?>" required>

            <label>Línea de producto</label>
            <select name="linea" required>
                <option value="">-- Selecciona una línea --</option>
                <?php foreach ($lineas as $valor => $texto): ?>
                    <option value="<?php echo $valor; ?>" <?php echo ($archivoActual["linea"] === $valor) ? "selected" : ""; ?>>
                        <?php echo $texto; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Producto (slug)</label>
            <input type="text" name="producto_slug" value="<?php echo htmlspecialchars($archivoActual["producto_slug"]); ?>" placeholder="ej: duracolor-latex">

            <?php if ($archivoActual["tipo"] === "video" || $archivoActual["tipo"] === "link"): ?>
                <label>URL</label>
                <input type="text" name="url" value="<?php echo htmlspecialchars($archivoActual["ruta_original"]); ?>">
            <?php else: ?>
                <label>Reemplazar archivo (opcional)</label>
                <div class="zona-archivo">
                    <input type="file" name="archivo" id="input-archivo-1" onchange="mostrarNombre(this, 'nombre-archivo-1')">
                    <span class="icono-subida">📎</span>
                    <div class="texto-subida"><strong>Haz clic para reemplazar</strong> el archivo actual</div>
                    <div class="nombre-archivo-elegido" id="nombre-archivo-1"></div>
                </div>
                <p class="nota">Si lo dejas vacío, se conserva el archivo actual.</p>
            <?php endif; ?>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
<script>
        function mostrarNombre(input, idDestino) {
            const destino = document.getElementById(idDestino);
            destino.textContent = input.files.length ? input.files[0].name : "";
        }
    </script>
<?php require "footer.php"; ?>