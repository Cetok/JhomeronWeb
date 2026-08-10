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
    <link rel="stylesheet" href="stylesFooter.css" />
    <link rel="stylesheet" href="stylesProducto.css" />
    <link rel="stylesheet" href="stylePintura.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Outfit', sans-serif; margin: 0; background: #f3f3f3; }
        .prueba-contenedor { max-width: 1400px; margin: 0 auto; padding: 20px 6px 40px; }
        .prueba-grid { display: flex; flex-wrap: wrap; gap: 90px; }

        .prueba-imagen-col { flex: 0 0 480px; min-width: 300px; padding-left: 10px; box-sizing: border-box; }
        .prueba-imagen-wrap { display: flex; align-items: center; justify-content: flex-start; gap: 20px; }
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

        .prueba-info-col { flex: 1 1 auto; min-width: 300px; }
        .prueba-imagen-col h1 { color: #0d3393; font-size: 24px; font-weight: 700; margin: 0 0 10px; }
        .prueba-descripcion { color: #444; font-size: 18px; font-weight: 300; line-height: 1.6; max-width: 560px; text-align: justify; text-align-last: left; }

        .prueba-caracteristicas-grid {
            display: grid; grid-template-columns: repeat(4, 140px); gap: 16px; margin: 24px 0 24px auto;
        }
        .caracteristica-box {
            background: white; border-radius: 12px; padding: 12px; text-align: center;
            box-shadow: 0 2px 8px rgba(20,20,50,0.06);
            aspect-ratio: 1 / 1;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
        }
        .caracteristica-box .icono-carac { font-size: 26px; color: #0d3393; margin-bottom: 8px; }
        .caracteristica-box .icono-carac-img { width: 56px; height: 56px; margin-bottom: 8px; }
        .caracteristica-box span { font-size: 11.5px; color: #333; line-height: 1.25; display: block; }

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
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 6px;
            background: white; color: #666 !important; padding: 8px 20px; border-radius: 10px;
            text-decoration: none; font-size: 13px; font-weight: 400; font-family: 'Outfit', sans-serif;
            border: 1px solid #888; box-shadow: none; min-width: 140px;
        }
        .prueba-botones-doc a i { color: #666; font-size: 15px; }

        .boton-video-youtube {
            display: flex !important; flex-direction: column; align-items: center; justify-content: center;
            background: #ff0000 !important; color: white !important; border: none !important;
            padding: 8px 20px !important; border-radius: 10px; min-width: 140px;
            text-decoration: none; position: relative; height: 52px;
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

        .boton-ver-colores {
            display: block; width: 100%; max-width: 220px; margin: 16px auto 0; background: white; color: #0d3393;
            border: none; padding: 8px 26px; border-radius: 6px; box-shadow: 0 2px 8px rgba(20,20,50,0.1);
            font-size: 19px; font-weight: 700; cursor: pointer; font-family: 'Outfit', sans-serif;
            transition: background 0.15s, color 0.15s, box-shadow 0.15s;
        }
        .boton-ver-colores:hover,
        .boton-ver-colores.activo { background: #0d3393; color: white; box-shadow: 0 4px 12px rgba(13,51,147,0.3); }

        /* Panel de colores: sin fondo oscuro, flota sobre el contenido (incluye fichas/catálogo) */
        .modal-colores-overlay {
            display: none; position: absolute; z-index: 500;
        }
        .modal-colores-overlay.abierto { display: block; }
        .modal-colores-contenido {
            background: white; border-radius: 14px; padding: 40px 26px 22px; max-width: 620px; width: 92vw;
            box-shadow: 0 10px 32px rgba(20,20,50,0.22); position: relative;
        }
        .cerrar-modal-colores {
            position: absolute; top: 10px; right: 10px; width: 26px; height: 26px;
            border-radius: 50%; border: 1.5px solid #ef0606; background: white; color: #ef0606;
            font-size: 15px; line-height: 1; cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: background 0.15s, color 0.15s;
        }
        .cerrar-modal-colores:hover { background: #ef0606; color: white; }
        .modal-colores-grid { display: flex; flex-wrap: wrap; gap: 10px; }
        .modal-color-swatch {
            width: 32px; height: 32px; border-radius: 4px; cursor: default; position: relative; flex-shrink: 0;
            border: none; background-repeat: no-repeat; background-size: cover; background-position: center;
            background-color: white;
        }
        .modal-color-swatch .tooltip-color {
            position: absolute; top: calc(100% + 10px); left: 50%; transform: translateX(-50%);
            background: #0d3393; color: white; font-size: 12px; font-weight: 600; white-space: nowrap;
            padding: 5px 10px; border-radius: 6px; opacity: 0; pointer-events: none;
            transition: opacity 0.15s; font-family: 'Outfit', sans-serif; z-index: 10;
        }
        .modal-color-swatch .tooltip-color::after {
            content: ""; position: absolute; bottom: 100%; left: 50%; transform: translateX(-50%);
            border: 5px solid transparent; border-bottom-color: #0d3393;
        }
        .modal-color-swatch:hover .tooltip-color { opacity: 1; }

        @media (max-width: 700px) {
            .modal-colores-overlay { position: static; margin-top: 12px; }
            .modal-colores-contenido { width: 100%; max-width: 100%; }
        }

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

        /* ---------- BREADCRUMB: truncar nombres de producto muy largos ---------- */
        /* El nombre del producto (#product-name) no tenía límite de ancho: si el
           nombre era muy largo, empujaba y descuadraba el breadcrumb en móvil.
           Se corta con "..." según el ancho disponible en cada tamaño de pantalla. */
        .breadcrumb p span#product-name {
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            vertical-align: bottom;
            max-width: 100%;
        }
        @media (max-width: 750px) {
            .breadcrumb p span#product-name {
                max-width: 160px;
            }
        }
        @media (max-width: 480px) {
            .breadcrumb p span#product-name {
                max-width: 110px;
            }
        }


        /* Reset defensivo: neutraliza cualquier estilo genérico heredado (p, ul, li, a, h3, h4, img)
           que venga de las hojas de estilo reales de la web, para que este bloque sea 100% independiente */
        .jf-footer, .jf-footer * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
        }
        .jf-footer { background: white; width: 100%; font-family: 'Outfit', sans-serif; }

        .jf-top {
            background: #0d3393; padding: 11px 24px; display: flex; align-items: center;
            justify-content: center; gap: 22px; flex-wrap: wrap;
        }
        .jf-logo { height: 54px; width: auto; margin-top: -7px; }
        .jf-redes { display: flex; gap: 16px;}
        .jf-redes a {
            width: 34px; height: 34px; border-radius: 50%; background: white;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; transition: background 0.15s, transform 0.15s;
        }
        .jf-redes a i { color: #0d3393; font-size: 22px; transition: color 0.15s; }
        .jf-redes a:hover { background: #ef0606; transform: scale(1.08); }

        .jf-columnas {
            display: flex; flex-wrap: wrap; gap: 40px; padding: 32px 24px 32px 16px;
        }

        /* ===== BLOQUE 1: NUESTROS PRODUCTOS (100% independiente) ===== */
        .jf-col-productos { flex: 1 1 220px; min-width: 200px; margin-left: 120px; }
        .jf-col-productos h3 { font-size: 16px; font-weight: 700; color: #1b1d29; margin: 0 0 16px; letter-spacing: 0.3px; }
        .jf-col-productos ul { list-style: none; margin: 0; padding: 0; }
        .jf-col-productos ul li { font-size: 16px; font-weight: 300; color: #444; margin-bottom: 15px; padding-left: 14px; position: relative; }
        .jf-col-productos ul li::before { content: "·"; position: absolute; left: 0; color: #888; font-weight: 700; }
        .jf-col-productos ul li a { color: #444; text-decoration: none; }
        .jf-col-productos ul li a:hover { text-decoration: underline; text-decoration-color: #000; }

        /* ===== BLOQUE 2: ATENCIÓN AL CLIENTE (100% independiente) ===== */
        .jf-col-atencion { flex: 1 1 220px; min-width: 200px; margin-left: 12px; }
        .jf-col-atencion h3 { font-size: 16px; font-weight: 700; color: #1b1d29; margin: 0 0 20px; letter-spacing: 0.3px; }
        .jf-col-atencion h4 { font-size: 15px; font-weight: 700; color: #1b1d29; margin: 18px 0 18px; }
        .jf-col-atencion ul { list-style: none; margin: 0; padding: 0; }
        .jf-col-atencion ul li { font-size: 16px; font-weight: 300; color: #444; margin-bottom: 20px; padding-left: 14px; position: relative; }
        .jf-col-atencion ul li::before { content: "·"; position: absolute; left: 0; color: #888; font-weight: 700; }

        /* ===== BLOQUE 3: DIRECCIÓN + INFORMACIÓN LEGAL (100% independiente) ===== */
        .jf-col-direccion { flex: 1 1 220px; min-width: 200px; margin-left: 0; }
        .jf-col-direccion h3 { font-size: 16px; font-weight: 700; color: #1b1d29; margin: 0 0 16px; letter-spacing: 0.3px; }
        .jf-col-direccion ul { list-style: none; margin: 0; padding: 0; }
        .jf-col-direccion ul li { font-size: 16px; font-weight: 300; color: #444; margin-bottom: 18px; padding-left: 14px; position: relative; }
        .jf-col-direccion ul li::before { content: "·"; position: absolute; left: 0; color: #888; font-weight: 700; }
        .jf-col-direccion ul li a { color: #444; text-decoration: none; }
        .jf-col-direccion ul li a:hover { text-decoration: underline; text-decoration-color: #000; }

        .jf-linea-contacto {
            font-size: 16px; font-weight: 300; color: #444; margin: 0 0 15px; display: flex; align-items: center; gap: 8px;
        }
        .jf-linea-contacto i { color: #1b1d29; width: 16px; text-align: center; }
        .jf-linea-contacto a { color: #444; text-decoration: none; }
        .jf-linea-contacto a:hover { text-decoration: underline; text-decoration-color: #000; }

        .jf-direccion {
            display: flex; gap: 8px; text-decoration: none; color: #444; font-size: 16px; font-weight: 300; line-height: 1.5;
        }
        .jf-direccion i { color: #1b1d29; margin-top: 3px; }
        .jf-direccion:hover span { text-decoration: underline; text-decoration-color: #000; }

        .jf-bottom {
            background: #f5f5f5; padding: 12px 20px; text-align: center;
        }
        .jf-bottom p { margin: 0; font-size: 14px; color: #666; font-weight: 250; }

        @media (max-width: 700px) {
            .jf-columnas { padding: 24px 20px; gap: 28px; flex-direction: column; }
            .jf-top { padding: 16px 20px; }
            .jf-col-productos { margin-left: 0 !important; width: 100% !important; flex-basis: 100% !important; }
            .jf-col-atencion { margin-left: 0 !important; width: 100% !important; flex-basis: 100% !important; }
            .jf-col-direccion { margin-left: 0 !important; width: 100% !important; flex-basis: 100% !important; }
        }
    </style>
</head>
<body>
    <!-- Header real de Jhomeron -->
    <header>
        <div class="navbar">
            <a href="index.html">
                <img src="imgs/logo.png" alt="Jhomeron Logo" class="logo" />
            </a>
            <div class="wasap">
                <a href="https://wa.me/957720068" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
            <button class="menu-hamburguesa">
                <i class="fas fa-bars"></i>
            </button>
            <div class="menu-movil-contenedor">
                <ul class="menu-movil-items">
                    <li>
                        <a href="#" class="trigger-submenu">Líneas <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu-movil">
                            <li><a href="lineasDecorativa.php">Decorativa</a></li>
                            <li><a href="lineasAuto.html">Automotriz</a></li>
                            <li><a href="lineaIndus.html">Industrial</a></li>
                            <li><a href="lineaMarina.html">Marina</a></li>
                            <li><a href="lineaTrafico.html">Señalización</a></li>
                            <li><a href="lineaMadera.html">Madera</a></li>
                            <li><a href="lineaDisolvente.html">Disolventes</a></li>
                            <li><a href="resinasPegame.html">Resinas y Pegamentos</a></li>
                            <li><a href="insuQuimi.html">Insumos Químicos</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="asesoria-movil">Asesoría</a></li>
                    <li><a href="puntoVenta.html">Puntos de venta</a></li>
                </ul>
            </div>
            <nav>
                <ul class="menu">
                    <li class="enca">
                        <a>Líneas <img src="icons/flechita.png" alt="" /></a>
                        <ul class="submenu">
                            <li><a href="lineasDecorativa.php">Decorativa</a></li>
                            <li><a href="lineasAuto.html">Automotriz</a></li>
                            <li><a href="lineaIndus.html">Industrial</a></li>
                            <li><a href="lineaMarina.html">Marina</a></li>
                            <li><a href="lineaTrafico.html">Señalización</a></li>
                            <li><a href="lineaMadera.html">Madera</a></li>
                            <li><a href="lineaDisolvente.html">Disolventes</a></li>
                            <li><a href="resinasPegame.html">Resinas y Pegamentos</a></li>
                            <li><a href="insuQuimi.html">Insumos Químicos</a></li>
                        </ul>
                    </li>
                    <li class="enca"><a id="asesoria-link">Asesoría</a></li>
                    <li class="enca"><a href="puntoVenta.html">Puntos de venta</a></li>
                    <li class="enca"><a id="cotiza-aqui" href="https://wa.me/957720068" target="_blank">¡Cotiza aquí!</a></li>
                    <li class="wasap">
                        <a href="https://wa.me/957720068" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </li>
                    <li>
                        <div class="busca">
                            <input type="text" placeholder="¿Qué producto estás buscando?" required />
                            <div class="bst">
                                <img src="imgs/buscar.svg" alt="Buscar" />
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    $mapaLineas = [
        "decorativa" => ["nombre" => "Línea decorativa", "url" => "lineasDecorativa.php"],
        "automotriz" => ["nombre" => "Línea automotriz", "url" => "lineasAuto.html"],
        "industrial" => ["nombre" => "Línea industrial", "url" => "lineaIndus.html"],
        "marina" => ["nombre" => "Línea marina", "url" => "lineaMarina.html"],
        "trafico" => ["nombre" => "Línea señalización", "url" => "lineaTrafico.html"],
        "madera" => ["nombre" => "Línea madera", "url" => "lineaMadera.html"],
        "disolventes" => ["nombre" => "Línea disolventes", "url" => "lineaDisolvente.html"],
        "resinas-pegamentos" => ["nombre" => "Resinas y pegamentos", "url" => "resinasPegame.html"],
        "insumos-quimicos" => ["nombre" => "Insumos químicos", "url" => "insuQuimi.html"],
    ];
    $lineaActual = $producto["linea"] ?? "";
    $lineaInfo = $mapaLineas[$lineaActual] ?? ["nombre" => "Línea de productos", "url" => "lineasProducto.html"];
    ?>
    <div class="breadcrumb">
        <a href="index.html"><img src="icons/home.svg" alt="inicio" /></a>
        <a href="lineasProducto.html">> Productos</a>
        <a href="<?php echo htmlspecialchars($lineaInfo['url']); ?>">> <?php echo htmlspecialchars($lineaInfo['nombre']); ?></a>
        <p>> <span id="product-name"><?php echo htmlspecialchars($titulo); ?></span></p>
    </div>
    <div class="prueba-contenedor">
        <div class="prueba-grid">
            <!-- COLUMNA IZQUIERDA: título, descripción, imagen, tamaños -->
            <div class="prueba-imagen-col">
                <h1><?php echo $tituloHtml; ?></h1>
                <p class="prueba-descripcion"><?php echo htmlspecialchars($descripcion); ?></p>

                <div style="display:flex; align-items:center; gap:20px; margin-top:30px;">
                    <button type="button" class="circulo-flecha" onclick="moverCarrusel(-1)">
                        <img src="icons/fle_izq.svg" alt="Anterior">
                    </button>

                    <div style="display:flex; flex-direction:column; align-items:center; width:fit-content;">
                        <img id="product-image" src="<?php echo htmlspecialchars($imagenes[0]); ?>" alt="<?php echo htmlspecialchars($titulo); ?>" style="max-width:340px; width:100%; height:auto;">

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
                        <button type="button" id="ver-colores" class="boton-ver-colores">VER COLORES</button>
                        <?php endif; ?>
                    </div>

                    <button type="button" class="circulo-flecha" onclick="moverCarrusel(1)">
                        <img src="icons/fle_dere.svg" alt="Siguiente">
                    </button>
                </div>

                <div class="prueba-compartir" style="margin-top: 40px;">
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
                            <span><?php echo str_replace("~~", "<br>", htmlspecialchars($textoCarac)); ?></span>
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

                <div style="text-align:center; margin-top: 100px;" id="contenedor-cotizar">
                    <a href="https://wa.me/957720068" target="_blank" class="boton-cotizar">¡COTIZAR AQUÍ!</a>
                </div>

                <?php if (count($pdfs) > 0 || count($videos) > 0): ?>
                <div class="prueba-botones-doc" style="justify-content:center; margin-top: 90px;">
                    <?php foreach ($pdfs as $pdf):
                        // "Catálogo" se abre para VER (sin descargar); el resto se descarga directo
                        $esCatalogo = (stripos($pdf['nombre'], 'cat') !== false);
                    ?>
                        <a href="<?php echo htmlspecialchars($pdf['ruta_original']); ?>" target="_blank" <?php echo $esCatalogo ? '' : 'download'; ?>>
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

    <?php if (count($colores) > 0): ?>
    <div class="modal-colores-overlay" id="modal-colores">
        <div class="modal-colores-contenido">
            <button type="button" class="cerrar-modal-colores" id="cerrar-modal-colores">&times;</button>
            <div class="modal-colores-grid">
                <?php foreach ($colores as $color): ?>
                    <div class="modal-color-swatch" style="background-image:url('<?php echo htmlspecialchars($color['ruta_thumb'] ?: $color['ruta_original']); ?>');">
                        <span class="tooltip-color"><?php echo htmlspecialchars($color['nombre']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script>
        function copiarEnlace(elemento) {
            navigator.clipboard.writeText(window.location.href).then(() => {
                const original = elemento.innerHTML;
                elemento.innerHTML = "✓";
                setTimeout(() => { elemento.innerHTML = original; }, 1500);
            });
        }
	// Buscador del header: busca en productos ya dinamicos (decorativa, industrial, automotriz)
        (function () {
            const inputBusqueda = document.querySelector(".busca input");
            if (!inputBusqueda) return;

            const contenedorBusca = document.querySelector(".busca");
            contenedorBusca.style.position = "relative";

            const listaResultados = document.createElement("div");
            listaResultados.style.cssText = "display:none; position:absolute; top:100%; left:0; right:0; background:white; border-radius:8px; box-shadow:0 8px 24px rgba(0,0,0,0.15); z-index:1000; max-height:300px; overflow-y:auto; margin-top:6px;";
            contenedorBusca.appendChild(listaResultados);

            let temporizador = null;

            inputBusqueda.addEventListener("input", function () {
                const texto = this.value.trim();
                clearTimeout(temporizador);

                if (texto.length < 2) {
                    listaResultados.style.display = "none";
                    return;
                }

                temporizador = setTimeout(() => {
                    fetch("buscar_productos.php?q=" + encodeURIComponent(texto))
                        .then(r => r.json())
                        .then(productos => {
                            if (productos.length === 0) {
                                listaResultados.innerHTML = '<div style="padding:14px; color:#999; font-size:13px; font-family:Outfit,sans-serif;">Sin resultados</div>';
                            } else {
                                listaResultados.innerHTML = productos.map(p => `
                                    <a href="${p.url}" style="display:flex; align-items:center; gap:12px; padding:10px 16px; text-decoration:none; color:#333; font-size:14px; font-family:Outfit,sans-serif; border-bottom:1px solid #eee;">
                                        <img src="${p.imagen}" alt="" style="width:38px; height:38px; object-fit:contain; flex-shrink:0;" onerror="this.style.display='none'">
                                        <span>${p.nombre}</span>
                                    </a>
                                `).join("");
                            }
                            listaResultados.style.display = "block";
                        })
                        .catch(() => { listaResultados.style.display = "none"; });
                }, 250);
            });

            document.addEventListener("click", function (e) {
                if (!contenedorBusca.contains(e.target)) {
                    listaResultados.style.display = "none";
                }
            });
        })();

        // Abrir/cerrar el modal de colores
        const botonVerColores = document.getElementById("ver-colores");
        const modalColores = document.getElementById("modal-colores");
        const cerrarModalColores = document.getElementById("cerrar-modal-colores");
        const contenedorCotizar = document.getElementById("contenedor-cotizar");

        function posicionarModalColores() {
            if (!modalColores || !contenedorCotizar) return;
            const rect = contenedorCotizar.getBoundingClientRect();
            modalColores.style.top = (rect.bottom + window.scrollY + 14) + "px";
            modalColores.style.left = (rect.left + window.scrollX) + "px";
        }

        if (botonVerColores && modalColores) {
            botonVerColores.addEventListener("click", (e) => {
                e.stopPropagation();
                const abrir = !modalColores.classList.contains("abierto");
                if (abrir) {
                    posicionarModalColores();
                    modalColores.classList.add("abierto");
                    botonVerColores.classList.add("activo");
                } else {
                    modalColores.classList.remove("abierto");
                    botonVerColores.classList.remove("activo");
                }
            });
            cerrarModalColores.addEventListener("click", () => {
                modalColores.classList.remove("abierto");
                botonVerColores.classList.remove("activo");
            });
            document.addEventListener("click", (e) => {
                if (modalColores.classList.contains("abierto") &&
                    !modalColores.contains(e.target) && e.target !== botonVerColores) {
                    modalColores.classList.remove("abierto");
                    botonVerColores.classList.remove("activo");
                }
            });
            window.addEventListener("resize", posicionarModalColores);
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

    <!-- Footer reconstruido con clases propias (jf-*) para no depender de stylesFooter.css -->
    <div class="jf-footer">
        <div class="jf-top">
            <img src="icons/logo_jhomeron_footer.svg" alt="Logo" class="jf-logo" />
            <div class="jf-redes">
                <a href="https://www.facebook.com/SomosIndustriasJhomeronSA" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/pinturas_jhomeron/?hl=es-la" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@pinturas_jhomeron" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.linkedin.com/in/pinturas-jhomeron-6b869a368" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <div class="jf-columnas">
            <div class="jf-col-productos">
                <h3>NUESTROS PRODUCTOS</h3>
                <ul>
                    <li><a href="lineasDecorativa.php">Línea Decorativa</a></li>
                    <li><a href="lineasAuto.html">Línea Automotriz</a></li>
                    <li><a href="lineaIndus.html">Línea Industrial</a></li>
                    <li><a href="lineaMarina.html">Línea Marina</a></li>
                    <li><a href="lineaTrafico.html">Línea Señalización</a></li>
                    <li><a href="lineaMadera.html">Línea Madera</a></li>
                    <li><a href="lineaDisolvente.html">Línea Disolventes</a></li>
                    <li><a href="resinasPegame.html">Resinas y Pegamentos</a></li>
                    <li><a href="insuQuimi.html">Insumos Químicos</a></li>
                </ul>
            </div>

            <div class="jf-col-atencion">
                <h3>ATENCIÓN AL CLIENTE</h3>
                <p class="jf-linea-contacto"><i class="fa-solid fa-phone-volume"></i> 536-4214 | 500-8202 | 500-8203</p>
                <p class="jf-linea-contacto"><i class="fa-solid fa-phone-volume"></i> 500-8205 | 500-8206 | 500-8207</p>
                <p class="jf-linea-contacto"><i class="fas fa-envelope"></i> <a href="mailto:ventas@jhomeron.com">ventas@jhomeron.com</a></p>
                <h4>HORARIO DE ATENCIÓN</h4>
                <ul>
                    <li>Lu - Vi | 8:00 am - 5:20 pm</li>
                    <li>Sáb | 8:00 am - 1:00 pm</li>
                </ul>
            </div>

            <div class="jf-col-direccion">
                <h3>DIRECCIÓN</h3>
                <a href="https://www.google.com/maps/place/Industrias+jhomeron+SA/@-11.9209387,-77.0650729,15z/data=!4m6!3m5!1s0x9105d1a725719827:0xa2237e095853e1fc!8m2!3d-11.919655!4d-77.065665!16s%2Fg%2F11fs_k_f_f?entry=ttu&g_ep=EgoyMDI2MDgwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="jf-direccion">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Calle Santa Ana Mz. "F" Lote 44, Fnd.<br>Chacra Cerro - Chillón<br>Comas - Lima - Perú</span>
                </a>
                <h3 style="margin-top:20px;">INFORMACIÓN LEGAL</h3>
                <ul>
                    <li><a href="politicaPriva.html">Políticas de privacidad</a></li>
                    <li><a href="terminosCondi.html">Términos y condiciones</a></li>
                    <li><a href="libroReclama.html">Libro de Reclamaciones</a></li>
                </ul>
            </div>
        </div>

        <div class="jf-bottom">
            <p>©2025, Industrias Jhomeron S.A. - RUC: 20601777844</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.querySelector(".menu-hamburguesa");
            const menuMovil = document.querySelector(".menu-movil-contenedor");
            const submenuTriggers = document.querySelectorAll(".trigger-submenu");

            if (menuBtn && menuMovil) {
                menuBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    menuMovil.classList.toggle("activo");
                });
            }

            submenuTriggers.forEach((trigger) => {
                trigger.addEventListener("click", function (e) {
                    e.preventDefault();
                    const submenu = this.nextElementSibling;
                    submenu.classList.toggle("activo");
                    this.classList.toggle("active");
                });
            });

            document.addEventListener("click", function (e) {
                if (menuMovil && !menuMovil.contains(e.target) && !menuBtn.contains(e.target)) {
                    menuMovil.classList.remove("activo");
                }
            });
        });
    </script>
</body>
</html>