<?php
// pinturas_dinamico.php
// PRUEBA PILOTO: página de detalle de producto completamente conectada a la BD
// (imágenes, descripción, características, tamaños, PDF y video).
//
// Uso: pinturas_dinamico.php?product=duracolor-latex

require_once "back_jho/conexion.php";

$slug = $_GET["product"] ?? "";

$imagenes = [];
$producto = null;
$pdfs = [];
$videos = [];

if ($slug !== "") {
    // Imágenes del carrusel
    $stmt = $conexion->prepare("SELECT ruta_original, ruta_detalle FROM archivos WHERE producto_slug = ? AND tipo = 'imagen' ORDER BY orden ASC, id ASC");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $filas = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    foreach ($filas as $fila) {
        $imagenes[] = $fila["ruta_detalle"] ?: $fila["ruta_original"];
    }

    // Texto del producto (tabla productos)
    $stmt2 = $conexion->prepare("SELECT * FROM productos WHERE producto_slug = ?");
    $stmt2->bind_param("s", $slug);
    $stmt2->execute();
    $producto = $stmt2->get_result()->fetch_assoc();

    // PDFs asociados
    $stmt3 = $conexion->prepare("SELECT nombre, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'pdf'");
    $stmt3->bind_param("s", $slug);
    $stmt3->execute();
    $pdfs = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

    // Videos asociados
    $stmt4 = $conexion->prepare("SELECT nombre, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'video'");
    $stmt4->bind_param("s", $slug);
    $stmt4->execute();
    $videos = $stmt4->get_result()->fetch_all(MYSQLI_ASSOC);

    // Colores/variantes asociados (tipo = 'color', separado de las fotos normales)
    $stmt5 = $conexion->prepare("SELECT nombre, ruta_thumb, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'color' ORDER BY orden ASC, id ASC");
    $stmt5->bind_param("s", $slug);
    $stmt5->execute();
    $colores = $stmt5->get_result()->fetch_all(MYSQLI_ASSOC);
} else {
    $colores = [];
}

if (count($imagenes) === 0) {
    $imagenes[] = "imgs/default-product.png";
}

$titulo = ($producto && !empty($producto["nombre_display"])) ? $producto["nombre_display"] : str_replace("-", " ", $slug);
$tituloHtml = str_replace("|", "<br>", htmlspecialchars(mb_strtoupper($titulo)));

$descripcion = $producto["descripcion"] ?? "Esta descripción todavía es de ejemplo — súbela desde el panel en 'Productos'.";

$caracteristicas = [];
if ($producto && !empty($producto["caracteristicas"])) {
    $caracteristicas = array_filter(array_map('trim', explode("|", $producto["caracteristicas"])));
}

$tamanos = [];
if ($producto && !empty($producto["tamanos"])) {
    $tamanos = array_filter(array_map('trim', explode(",", $producto["tamanos"])));
}

$aplicacionIconos = [];
if ($producto && !empty($producto["aplicacion"])) {
    $aplicacionIconos = array_filter(array_map('trim', explode(",", $producto["aplicacion"])));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($titulo); ?> (prueba dinámica) - Jhomeron</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="stylesProducto.css" />
    <link rel="stylesheet" href="stylePintura.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Outfit', sans-serif; margin: 0; background: #f5f6fa; }
        .prueba-contenedor { max-width: 1200px; margin: 0 auto; padding: 40px 30px; }
        .prueba-grid { display: flex; flex-wrap: wrap; gap: 90px; }

        .prueba-imagen-col { flex: 1 1 380px; min-width: 300px; }
        .prueba-imagen-wrap { display: flex; align-items: center; justify-content: center; gap: 20px; }
        .prueba-imagen-wrap img { max-width: 340px; width: 100%; height: auto; }
        .circulo-flecha {
            width: 56px !important; height: 56px !important; min-width: 56px; min-height: 56px;
            border-radius: 50% !important; background: transparent !important; box-shadow: none !important;
            display: flex !important; align-items: center; justify-content: center;
            cursor: pointer; flex-shrink: 0; border: none; transition: background 0.15s, box-shadow 0.15s;
            padding: 0;
        }
        .circulo-flecha:hover {
            background: white !important;
            box-shadow: 0 3px 10px rgba(20,20,50,0.18) !important;
        }
        .circulo-flecha img {
            width: 26px !important; height: 26px !important; max-width: 26px !important; max-height: 26px !important;
            display: block; pointer-events: none;
        }

        .prueba-info-col { flex: 2 1 500px; min-width: 300px; }
        .prueba-imagen-col h1 { color: #0d3393; font-size: 24px; font-weight: 700; margin: 0 0 10px; }
        .prueba-descripcion { color: #333; font-size: 18px; line-height: 1.6; max-width: 560px; text-align: justify; text-align-last: left; }

        .prueba-caracteristicas-grid {
            display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; margin: 24px 0;
        }
        .caracteristica-box {
            background: white; border-radius: 12px; padding: 28px 14px; text-align: center;
            box-shadow: 0 2px 8px rgba(20,20,50,0.06);
        }
        .caracteristica-box .icono-carac { font-size: 26px; color: #0d3393; margin-bottom: 8px; }
        .caracteristica-box .icono-carac-img { width: 62px; height: 62px; margin-bottom: 10px; }
        .caracteristica-box span { font-size: 12.5px; color: #333; line-height: 1.3; display: block; }

        .aplicacion-box {
            background: white; border-radius: 12px; padding: 20px 22px; margin-bottom: 22px;
            box-shadow: 0 2px 8px rgba(20,20,50,0.06); max-width: 340px;
        }
        .aplicacion-box h4 { margin: 0 0 12px; font-size: 14px; color: #333; font-weight: 400; text-align:center; }
        .aplicacion-iconos { display: flex; justify-content: center; gap: 26px; }
        .aplicacion-iconos img { width: 58px; height: 58px; }

        .prueba-tamanos { display: flex; flex-wrap: wrap; gap: 10px; margin: 6px 0 20px; }
        .prueba-tamanos > span {
            border: none; color: white; padding: 11px 26px;
            border-radius: 5px; font-size: 14.5px; cursor: pointer;
            transition: background 0.15s;
        }
        .prueba-tamanos span .numero-tam { font-weight: 700; }
        .prueba-tamanos span .unidad-tam { font-weight: 400; margin-left: 3px; }
        .prueba-tamanos span.tamano-activo { background: #0d3393; }
        .prueba-tamanos span.tamano-inactivo { background: #c7ccd6; }

        .boton-cotizar {
            display: inline-block; background: #ef0606; color: white; font-weight: 700;
            font-size: 23px; padding: 19px 90px; border-radius: 34px; text-decoration: none;
            text-align: center; box-shadow: 0 0 0 0 rgba(239,6,6,0.55);
            animation: pulso-cotizar 1.8s infinite;
            transition: transform 0.08s;
        }
        .boton-cotizar:hover { transform: scale(1.03); }
        @keyframes pulso-cotizar {
            0%   { box-shadow: 0 0 0 0 rgba(239,6,6,0.55); }
            70%  { box-shadow: 0 0 0 16px rgba(239,6,6,0); }
            100% { box-shadow: 0 0 0 0 rgba(239,6,6,0); }
        }

        .prueba-botones-doc {
            display: flex; flex-wrap: wrap; gap: 12px; margin-top: 26px; align-items: center;
        }
        .prueba-botones-doc a {
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px;
            background: white; color: #666 !important; padding: 14px 20px; border-radius: 10px;
            text-decoration: none; font-size: 13px; font-weight: 600;
            border: 2px solid #ccc; box-shadow: none; min-width: 140px;
        }
        .prueba-botones-doc a i { color: #666; font-size: 15px; }

        .boton-video-youtube {
            display: flex !important; flex-direction: column; align-items: center; justify-content: center;
            background: #ff0000 !important; color: white !important; border: none !important;
            padding: 14px 20px !important; border-radius: 10px; min-width: 140px;
            text-decoration: none; position: relative; height: 66px;
            transition: background 0.2s;
        }
        .boton-video-youtube:hover { background: #cc0000 !important; }
        .boton-video-youtube .video-icono,
        .boton-video-youtube .video-texto {
            position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
            transition: opacity 0.25s ease;
        }
        .boton-video-youtube .video-icono { opacity: 1; font-size: 20px; color: white; }
        .boton-video-youtube .video-icono i { color: white; }
        .boton-video-youtube .video-texto { opacity: 0; font-size: 13px; font-weight: 700; white-space: nowrap; color: white; }
        .boton-video-youtube:hover .video-icono { opacity: 0; }
        .boton-video-youtube:hover .video-texto { opacity: 1; }

        .prueba-colores { display: flex; flex-wrap: wrap; gap: 14px; margin: 14px 0 22px; }
        .prueba-color-item { text-align: center; width: 60px; }
        .prueba-color-item img {
            width: 46px; height: 46px; border-radius: 50%; object-fit: cover;
            border: 2px solid white; box-shadow: 0 0 0 1.5px #e4e6ef;
        }
        .prueba-color-item span { display:block; font-size:11px; color:#666; margin-top:4px; }

        .prueba-compartir { margin-top: 20px; display: flex; flex-direction: row; align-items: center; gap: 14px; flex-wrap: wrap; }
        .texto-compartir { font-size:15px; color:#555; font-weight:600; white-space: nowrap; }
        .iconos-compartir { display: flex; gap: 12px; }
        .circulo-compartir {
            width: 36px; height: 36px; border-radius: 50%; background: #0d3393; color: white;
            display: flex; align-items: center; justify-content: center; text-decoration: none;
            flex-shrink: 0; transition: transform 0.15s;
            position: relative;
        }
        .circulo-compartir i {
            font-size: 20px; line-height: 20px; height: 20px; width: 20px;
            display: flex; align-items: center; justify-content: center;
            margin: 0; padding: 0; position: relative; top: 0;
        }
        .circulo-compartir:hover { transform: scale(1.08); }

        @media (max-width: 700px) {
            .prueba-contenedor { padding: 20px 16px; }
            .prueba-grid { gap: 26px; }
            .prueba-caracteristicas-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>
    <div style="background:#fff3cd; border-left:4px solid #e0a800; padding:12px 20px; font-family:'Outfit', sans-serif; font-size:13px;">
        🧪 Prueba piloto completa — imágenes, características, tamaños y botones desde la base de datos. Producto: <code><?php echo htmlspecialchars($slug); ?></code>
    </div>

    <div class="prueba-contenedor">
        <div class="prueba-grid">
            <!-- COLUMNA IZQUIERDA: título, descripción, imagen, tamaños -->
            <div class="prueba-imagen-col">
                <h1><?php echo $tituloHtml; ?></h1>
                <p class="prueba-descripcion"><?php echo htmlspecialchars($descripcion); ?></p>

                <div class="prueba-imagen-wrap" style="margin-top:30px;">
                    <button type="button" class="circulo-flecha" onclick="moverCarrusel(-1)">
                        <img src="icons/fle_izq.svg" alt="Anterior">
                    </button>
                    <img id="product-image" src="<?php echo htmlspecialchars($imagenes[0]); ?>" alt="<?php echo htmlspecialchars($titulo); ?>">
                    <button type="button" class="circulo-flecha" onclick="moverCarrusel(1)">
                        <img src="icons/fle_dere.svg" alt="Siguiente">
                    </button>
                </div>

                <?php if (count($tamanos) > 0): ?>
                <div class="prueba-tamanos" style="justify-content:center; margin-top:20px;">
                    <?php foreach ($tamanos as $i => $t):
                        // Separamos el número de la unidad, ej: "25 Kg" -> "25" + "Kg"
                        if (preg_match('/^([\d.,]+)\s*(.*)$/', trim($t), $m)) {
                            $numeroTam = $m[1];
                            $unidadTam = $m[2];
                        } else {
                            $numeroTam = $t;
                            $unidadTam = "";
                        }
                    ?>
                        <span class="<?php echo $i === 0 ? 'tamano-activo' : 'tamano-inactivo'; ?>" onclick="seleccionarTamano(this, <?php echo $i; ?>)">
                            <span class="numero-tam"><?php echo htmlspecialchars($numeroTam); ?></span><span class="unidad-tam"><?php echo htmlspecialchars($unidadTam); ?></span>
                        </span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if (count($colores) > 0): ?>
                <div class="prueba-colores" style="justify-content:center;">
                    <?php foreach ($colores as $color): ?>
                        <div class="prueba-color-item">
                            <img src="<?php echo htmlspecialchars($color['ruta_thumb'] ?: $color['ruta_original']); ?>" alt="<?php echo htmlspecialchars($color['nombre']); ?>">
                            <span><?php echo htmlspecialchars($color['nombre']); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="prueba-compartir" style="margin-top: 94px;">
                    <span class="texto-compartir">Compartir producto:</span>
                    <div class="iconos-compartir">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="_blank" class="circulo-compartir"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="_blank" class="circulo-compartir"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="_blank" class="circulo-compartir"><i class="fab fa-pinterest-p"></i></a>
                        <a href="https://wa.me/?text=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="_blank" class="circulo-compartir"><i class="fab fa-whatsapp"></i></a>
                        <a href="javascript:void(0)" onclick="copiarEnlace(this)" class="circulo-compartir"><i class="fas fa-link"></i></a>
                    </div>
                </div>
            </div>

            <!-- COLUMNA DERECHA: características, aplicación, botón cotizar, documentos -->
            <div class="prueba-info-col">
                <?php if (count($caracteristicas) > 0): ?>
                <div class="prueba-caracteristicas-grid">
                    <?php foreach ($caracteristicas as $c):
                        // Formato: "icono::texto" — si no trae "::" se usa un ícono genérico
                        if (strpos($c, "::") !== false) {
                            [$iconoCarac, $textoCarac] = explode("::", $c, 2);
                        } else {
                            $iconoCarac = ""; $textoCarac = $c;
                        }
                    ?>
                        <div class="caracteristica-box">
                            <?php if ($iconoCarac): ?>
                                <img src="icons/caracter/<?php echo htmlspecialchars($iconoCarac); ?>.svg" class="icono-carac-img" alt="" onerror="this.style.display='none'">
                            <?php else: ?>
                                <div class="icono-carac">●</div>
                            <?php endif; ?>
                            <span><?php echo str_replace("|", "<br>", htmlspecialchars($textoCarac)); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($aplicacionIconos)): ?>
                <div style="height: 30px;"></div>
                <div class="aplicacion-box" style="margin: 0 auto 22px;">
                    <h4>Aplicación:</h4>
                    <div class="aplicacion-iconos">
                        <?php foreach ($aplicacionIconos as $icono): ?>
                            <img src="icons/aplicacion/<?php echo htmlspecialchars($icono); ?>.svg" alt="<?php echo htmlspecialchars($icono); ?>"
                                 onerror="this.style.display='none'">
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div style="text-align:center; margin-top: 100px;">
                    <a href="https://wa.me/957720068" target="_blank" class="boton-cotizar">¡COTIZAR AQUÍ!</a>
                </div>

                <?php if (count($pdfs) > 0 || count($videos) > 0): ?>
                <div class="prueba-botones-doc" style="justify-content:center; margin-top: 90px;">
                    <?php foreach ($pdfs as $pdf): ?>
                        <a href="<?php echo htmlspecialchars($pdf['ruta_original']); ?>" target="_blank" download>
                            <span><?php echo htmlspecialchars($pdf['nombre']); ?></span>
                            <i class="fas fa-download"></i>
                        </a>
                    <?php endforeach; ?>
                    <?php foreach ($videos as $video): ?>
                        <a href="<?php echo htmlspecialchars($video['ruta_original']); ?>" target="_blank" class="boton-video-youtube" title="<?php echo htmlspecialchars($video['nombre']); ?>">
                            <span class="video-icono"><i class="fas fa-play"></i></span>
                            <span class="video-texto">VER VIDEO</span>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function copiarEnlace(elemento) {
            navigator.clipboard.writeText(window.location.href).then(() => {
                const original = elemento.innerHTML;
                elemento.innerHTML = "✓";
                setTimeout(() => { elemento.innerHTML = original; }, 1500);
            });
        }

        const imagenesProducto = <?php echo json_encode($imagenes); ?>;
        const cantidadTamanos = <?php echo count($tamanos); ?>;
        let indiceActual = 0;

        // Solo sincronizamos automáticamente si hay la misma cantidad de imágenes que de tamaños
        // (es decir, cada imagen representa una presentación/tamaño distinto)
        const sincronizado = cantidadTamanos > 0 && cantidadTamanos === imagenesProducto.length;

        function actualizarImagen() {
            document.getElementById("product-image").src = imagenesProducto[indiceActual];
        }

        function actualizarBotonesTamano() {
            const botones = document.querySelectorAll(".prueba-tamanos > span");
            botones.forEach((boton, i) => {
                if (i === indiceActual) {
                    boton.classList.add("tamano-activo");
                    boton.classList.remove("tamano-inactivo");
                } else {
                    boton.classList.remove("tamano-activo");
                    boton.classList.add("tamano-inactivo");
                }
            });
        }

        function moverCarrusel(direccion) {
            indiceActual = (indiceActual + direccion + imagenesProducto.length) % imagenesProducto.length;
            actualizarImagen();
            if (sincronizado) actualizarBotonesTamano();
        }

        function seleccionarTamano(elegido, indice) {
            document.querySelectorAll(".prueba-tamanos > span").forEach(el => {
                el.classList.remove("tamano-activo");
                el.classList.add("tamano-inactivo");
            });
            elegido.classList.remove("tamano-inactivo");
            elegido.classList.add("tamano-activo");

            if (sincronizado) {
                indiceActual = indice;
                actualizarImagen();
            }
        }
    </script>
</body>
</html>