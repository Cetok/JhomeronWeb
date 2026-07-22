<?php
// subir.php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

$mensaje = "";
$error = "";

// Carpetas reales en disco (relativas a back_jho/, donde vive este archivo)
$carpeta_imgs_disco = "../imgs/subidos/";
$carpeta_pdf_disco  = "../pdf/subidos/";

// Rutas que se GUARDAN en la base de datos: relativas a la RAÍZ del proyecto (sin ../)
// para que cualquier página (dentro o fuera de back_jho) sepa desde dónde partir.
$carpeta_imgs_web = "imgs/subidos/";
$carpeta_pdf_web  = "pdf/subidos/";

if (!is_dir($carpeta_imgs_disco)) mkdir($carpeta_imgs_disco, 0755, true);
if (!is_dir($carpeta_pdf_disco))  mkdir($carpeta_pdf_disco, 0755, true);

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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipo = $_POST["tipo"];
    $linea = $_POST["linea"];
    $producto_slug = trim($_POST["producto_slug"]);
    $orden = 0; // El orden ya no se pide en el formulario; se usa el orden de subida (id) automáticamente
    $nombre = $_POST["nombre"];

    if ($tipo === "video" || $tipo === "link") {
        $url = trim($_POST["url"]);
        if ($url === "") {
            $error = "Debes ingresar una URL.";
        } else {
            $stmt = $conexion->prepare("INSERT INTO archivos (nombre, ruta_original, tipo, linea, producto_slug, orden) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $nombre, $url, $tipo, $linea, $producto_slug, $orden);
            $stmt->execute();
            $mensaje = "Guardado correctamente.";
        }
    } else {
        if (!isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] !== 0) {
            $error = "No se recibió ningún archivo.";
        } else {
            $archivo = $_FILES["archivo"];
            $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
            $nombreLimpio = preg_replace('/[^a-z0-9\-]/', '-', strtolower(pathinfo($archivo["name"], PATHINFO_FILENAME)));
            $nombreArchivo = $nombreLimpio . "-" . time() . "." . $extension;

            if ($tipo === "pdf") {
                $rutaFinalDisco = $carpeta_pdf_disco . $nombreArchivo;
                move_uploaded_file($archivo["tmp_name"], $rutaFinalDisco);

                $rutaFinalWeb = $carpeta_pdf_web . $nombreArchivo; // esto se guarda en la BD
                $stmt = $conexion->prepare("INSERT INTO archivos (nombre, ruta_original, tipo, linea, producto_slug, orden) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssi", $nombre, $rutaFinalWeb, $tipo, $linea, $producto_slug, $orden);
                $stmt->execute();
                $mensaje = "PDF subido correctamente.";
            } else {
                $rutaOriginalDisco = $carpeta_imgs_disco . $nombreArchivo;
                move_uploaded_file($archivo["tmp_name"], $rutaOriginalDisco);

                $rutaThumbDisco = $carpeta_imgs_disco . "thumb-200-" . $nombreArchivo;
                $rutaDetalleDisco = $carpeta_imgs_disco . "thumb-400-" . $nombreArchivo;

                $extOk = in_array($extension, ["jpg", "jpeg", "png", "webp"]);
                if ($extOk) {
                    generarMiniatura($rutaOriginalDisco, $rutaThumbDisco, 200, 200);
                    generarMiniatura($rutaOriginalDisco, $rutaDetalleDisco, 400, 400);
                } else {
                    $rutaThumbDisco = $rutaOriginalDisco;
                    $rutaDetalleDisco = $rutaOriginalDisco;
                }

                // Rutas que se guardan en la BD, relativas a la raíz del proyecto (sin ../)
                $rutaOriginalWeb = $carpeta_imgs_web . $nombreArchivo;
                $rutaThumbWeb = $extOk ? $carpeta_imgs_web . "thumb-200-" . $nombreArchivo : $rutaOriginalWeb;
                $rutaDetalleWeb = $extOk ? $carpeta_imgs_web . "thumb-400-" . $nombreArchivo : $rutaOriginalWeb;

                $stmt = $conexion->prepare("INSERT INTO archivos (nombre, ruta_original, ruta_thumb, ruta_detalle, tipo, linea, producto_slug, orden) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssi", $nombre, $rutaOriginalWeb, $rutaThumbWeb, $rutaDetalleWeb, $tipo, $linea, $producto_slug, $orden);
                $stmt->execute();
                $mensaje = "Imagen subida y optimizada correctamente.";
            }
        }
    }
}

require "header.php";
?>
    <div class="encabezado-pagina">
        <h2>Subir archivo</h2>
        <p>Imágenes, PDFs, videos o links para tu catálogo de productos.</p>
    </div>

    <div class="tarjeta">
        <?php if ($mensaje): ?><div class="mensaje"><?php echo $mensaje; ?></div><?php endif; ?>
        <?php if ($error): ?><div class="error"><?php echo $error; ?></div><?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <label>Nombre / descripción</label>
            <input type="text" name="nombre" placeholder="ej: Duracolor 4 Galones" required>

            <label>Tipo</label>
            <select name="tipo" id="tipo" onchange="mostrarCampo()">
                <option value="imagen">Imagen (foto del producto)</option>
                <option value="color">Color (variante/swatch)</option>
                <option value="pdf">PDF</option>
                <option value="video">Video (URL)</option>
                <option value="link">Link</option>
            </select>

            <label>Línea de producto</label>
            <select name="linea" required>
                <option value="">-- Selecciona una línea --</option>
                <option value="decorativa">Decorativa</option>
                <option value="automotriz">Automotriz</option>
                <option value="industrial">Industrial</option>
                <option value="marina">Marina</option>
                <option value="trafico">Tráfico (Señalización)</option>
                <option value="madera">Madera</option>
                <option value="disolventes">Disolventes</option>
                <option value="resinas-pegamentos">Resinas y Pegamentos</option>
                <option value="insumos-quimicos">Insumos Químicos</option>
            </select>

            <label>Producto (slug)</label>
            <input type="text" name="producto_slug" placeholder="ej: duracolor-latex">

            <div id="campo-archivo">
                <label>Archivo</label>
                <div class="zona-archivo" id="zona-archivo-1">
                    <input type="file" name="archivo" id="input-archivo-1" onchange="mostrarNombre(this, 'nombre-archivo-1')">
                    <span class="icono-subida">📎</span>
                    <div class="texto-subida"><strong>Haz clic para elegir</strong> o arrastra un archivo aquí</div>
                    <div class="nombre-archivo-elegido" id="nombre-archivo-1"></div>
                </div>
            </div>

            <div id="campo-url" style="display:none;">
                <label>URL (YouTube, link externo, etc.)</label>
                <input type="text" name="url" placeholder="https://...">
            </div>

            <button type="submit">Subir archivo</button>
        </form>
    </div>

    <script>
        function mostrarNombre(input, idDestino) {
            const destino = document.getElementById(idDestino);
            destino.textContent = input.files.length ? input.files[0].name : "";
        }
        function mostrarCampo() {
            const tipo = document.getElementById("tipo").value;
            document.getElementById("campo-archivo").style.display = (tipo === "video" || tipo === "link") ? "none" : "block";
            document.getElementById("campo-url").style.display = (tipo === "video" || tipo === "link") ? "block" : "none";
        }
    </script>
<?php require "footer.php"; ?>