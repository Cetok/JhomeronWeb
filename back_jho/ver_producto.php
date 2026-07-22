<?php
// ver_producto.php
// PÁGINA DE PRUEBA: simula el carrusel de producto de pinturas.html,
// pero jalando las imágenes desde la base de datos (tabla "archivos")
// en vez de tenerlas escritas a mano.
//
// Uso: ver_producto.php?slug=duracolor-latex

require_once "conexion.php";

$slug = $_GET["slug"] ?? "";

if ($slug === "") {
    die("Usa la URL así: ver_producto.php?slug=nombre-del-producto");
}

// Traemos TODAS las imágenes de ese producto, ya ordenadas
$stmt = $conexion->prepare("SELECT * FROM archivos WHERE producto_slug = ? AND tipo = 'imagen' ORDER BY orden ASC, id ASC");
$stmt->bind_param("s", $slug);
$stmt->execute();
$imagenes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// También traemos el PDF y el video si existen para ese producto
$stmt2 = $conexion->prepare("SELECT * FROM archivos WHERE producto_slug = ? AND tipo = 'pdf' ORDER BY orden ASC");
$stmt2->bind_param("s", $slug);
$stmt2->execute();
$pdfs = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

$stmt3 = $conexion->prepare("SELECT * FROM archivos WHERE producto_slug = ? AND tipo = 'video' ORDER BY orden ASC");
$stmt3->bind_param("s", $slug);
$stmt3->execute();
$videos = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

// Las rutas en la BD son relativas a la RAÍZ del proyecto (sin ../).
// Como este archivo vive dentro de back_jho/, le agregamos "../" para que
// el navegador encuentre las imágenes/PDFs correctamente desde aquí.
foreach ($imagenes as &$img) {
    $img['ruta_original'] = '../' . $img['ruta_original'];
    if ($img['ruta_thumb']) $img['ruta_thumb'] = '../' . $img['ruta_thumb'];
    if ($img['ruta_detalle']) $img['ruta_detalle'] = '../' . $img['ruta_detalle'];
}
unset($img);
foreach ($pdfs as &$pdf) {
    $pdf['ruta_original'] = '../' . $pdf['ruta_original'];
}
unset($pdf);
// Los videos guardan una URL externa (YouTube, etc.), esos NO llevan "../"
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba de conexión - <?php echo htmlspecialchars($slug); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300..800&display=swap" rel="stylesheet" />
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Outfit', sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 40px 20px;
        }
        .aviso {
            max-width: 600px;
            margin: 0 auto 24px;
            background: #fff3cd;
            border-left: 4px solid #e0a800;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            color: #6b5300;
        }
        .contenedor {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 24px rgba(20,20,50,0.08);
        }
        h2 { color: #0d3393; margin-top: 0; }

        .carrusel {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin: 20px 0;
        }
        .carrusel img {
            width: 260px;
            height: 260px;
            object-fit: contain;
            border: 1px solid #e4e6ef;
            border-radius: 12px;
            background: #fafbff;
        }
        .flecha {
            background: #0d3393;
            color: white;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            flex-shrink: 0;
        }
        .flecha:hover { background: #071b4a; }
        .contador { text-align: center; font-size: 13px; color: #9298a8; }

        .sin-imagenes {
            text-align: center;
            color: #9298a8;
            padding: 40px 0;
        }

        .extra { margin-top: 20px; padding-top: 20px; border-top: 1px solid #e4e6ef; }
        .extra a {
            display: inline-block;
            margin: 4px 6px 4px 0;
            padding: 8px 14px;
            background: #eaf0fc;
            color: #0d3393;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="aviso">
        🧪 Esta es una página de <strong>prueba</strong> para confirmar que la base de datos funciona.
        Busca el producto: <code><?php echo htmlspecialchars($slug); ?></code>
    </div>

    <div class="contenedor">
        <h2><?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $slug))); ?></h2>

        <?php if (count($imagenes) === 0): ?>
            <div class="sin-imagenes">No hay imágenes subidas todavía con el producto_slug "<?php echo htmlspecialchars($slug); ?>".</div>
        <?php else: ?>
            <div class="carrusel">
                <button class="flecha" onclick="moverCarrusel(-1)">←</button>
                <img id="imagen-carrusel" src="<?php echo htmlspecialchars($imagenes[0]['ruta_detalle'] ?: $imagenes[0]['ruta_original']); ?>" alt="">
                <button class="flecha" onclick="moverCarrusel(1)">→</button>
            </div>
            <p class="contador" id="contador-carrusel">1 / <?php echo count($imagenes); ?></p>
        <?php endif; ?>

        <?php if (count($pdfs) > 0 || count($videos) > 0): ?>
        <div class="extra">
            <?php foreach ($pdfs as $pdf): ?>
                <a href="<?php echo htmlspecialchars($pdf['ruta_original']); ?>" target="_blank">📄 <?php echo htmlspecialchars($pdf['nombre']); ?></a>
            <?php endforeach; ?>
            <?php foreach ($videos as $video): ?>
                <a href="<?php echo htmlspecialchars($video['ruta_original']); ?>" target="_blank">🎬 <?php echo htmlspecialchars($video['nombre']); ?></a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <script>
        const imagenes = <?php echo json_encode(array_map(fn($i) => $i['ruta_detalle'] ?: $i['ruta_original'], $imagenes)); ?>;
        let indice = 0;

        function moverCarrusel(direccion) {
            if (imagenes.length === 0) return;
            indice = (indice + direccion + imagenes.length) % imagenes.length;
            document.getElementById("imagen-carrusel").src = imagenes[indice];
            document.getElementById("contador-carrusel").textContent = (indice + 1) + " / " + imagenes.length;
        }
    </script>
</body>
</html>