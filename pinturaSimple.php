<?php
// pinturaSimple.php
// Plantilla de detalle de producto COMPARTIDA para las líneas que usan el diseño
// "simple" (sin características ni aplicación): Resinas y Pegamentos, Insumos Químicos.
// Reutiliza el CSS real del sitio (stylePintuRePega.css) en vez de estilos propios,
// porque a diferencia de pinturas.php, aquí no hay conflictos de diseño que resolver.
//
// Uso: pinturaSimple.php?product=resina-tamsamaelic-t300

require_once "back_jho/conexion.php";

$slug = $_GET["product"] ?? "";

$imagenes = [];
$producto = null;
$pdfs = [];
$videos = [];
$colores = [];

if ($slug !== "") {
    $stmt = $conexion->prepare("SELECT ruta_original, ruta_detalle FROM archivos WHERE producto_slug = ? AND tipo = 'imagen' ORDER BY orden ASC, id ASC");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    foreach ($stmt->get_result()->fetch_all(MYSQLI_ASSOC) as $fila) {
        $imagenes[] = $fila["ruta_detalle"] ?: $fila["ruta_original"];
    }

    $stmt2 = $conexion->prepare("SELECT * FROM productos WHERE producto_slug = ?");
    $stmt2->bind_param("s", $slug);
    $stmt2->execute();
    $producto = $stmt2->get_result()->fetch_assoc();

    $stmt3 = $conexion->prepare("SELECT nombre, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'pdf'");
    $stmt3->bind_param("s", $slug);
    $stmt3->execute();
    $pdfs = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

    $stmt4 = $conexion->prepare("SELECT nombre, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'video'");
    $stmt4->bind_param("s", $slug);
    $stmt4->execute();
    $videos = $stmt4->get_result()->fetch_all(MYSQLI_ASSOC);

    $stmt5 = $conexion->prepare("SELECT nombre, ruta_thumb, ruta_original FROM archivos WHERE producto_slug = ? AND tipo = 'color' ORDER BY orden ASC, id ASC");
    $stmt5->bind_param("s", $slug);
    $stmt5->execute();
    $colores = $stmt5->get_result()->fetch_all(MYSQLI_ASSOC);
}

if (count($imagenes) === 0) {
    $imagenes[] = "imgs/default-product.png";
}

$titulo = ($producto && !empty($producto["nombre_display"])) ? $producto["nombre_display"] : str_replace("-", " ", $slug);
$tituloHtml = htmlspecialchars(mb_strtoupper(preg_replace('/\s+/', ' ', str_replace("|", " ", $titulo))));
$tituloBreadcrumb = htmlspecialchars(preg_replace('/\s+/', ' ', str_replace("|", " ", $titulo)));

$descripcion = $producto["descripcion"] ?? "Esta descripción todavía es de ejemplo — súbela desde el panel en 'Productos'.";

$tamanos = [];
if ($producto && !empty($producto["tamanos"])) {
    $tamanos = array_values(array_filter(array_map('trim', explode(",", $producto["tamanos"]))));
}

// Mapa de líneas -> nombre visible y URL de su listado (para el breadcrumb)
$mapaLineas = [
    "decorativa" => ["nombre" => "Línea decorativa", "url" => "lineasDecorativa.php"],
    "automotriz" => ["nombre" => "Línea automotriz", "url" => "lineasAuto.php"],
    "industrial" => ["nombre" => "Línea industrial", "url" => "lineaIndus.php"],
    "marina" => ["nombre" => "Línea marina", "url" => "lineaMarina.php"],
    "trafico" => ["nombre" => "Línea señalización", "url" => "lineaTrafico.php"],
    "madera" => ["nombre" => "Línea madera", "url" => "lineaMadera.php"],
    "disolventes" => ["nombre" => "Línea disolventes", "url" => "lineaDisolvente.php"],
    "resinas-pegamentos" => ["nombre" => "Resinas y Pegamentos", "url" => "resinasPegame.php"],
    "insumos-quimicos" => ["nombre" => "Insumos Químicos", "url" => "insuQuimi.php"],
];
$lineaActual = $producto["linea"] ?? "";
$lineaInfo = $mapaLineas[$lineaActual] ?? ["nombre" => "Línea de productos", "url" => "lineasProducto.html"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($titulo); ?> - Jhomeron</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="styleslinea.css" />
    <link rel="stylesheet" href="stylePintuRePega.css" />
    <link rel="stylesheet" href="stylesFooter.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* En tablet/móvil (cuando .product-details pasa a 1 sola columna, desde
           1175px hacia abajo) se quiere este orden específico:
           1) Título y descripción
           2) Imagen + tamaños (+ ver colores, si aplica)
           3) Botón "Cotizar" + fichas técnicas (justo debajo de los tamaños)
           4) Compartir producto
           Como título/descripción y cotizar/fichas viven en el MISMO div
           (.product-info-right), no basta con mover todo ese bloque de una vez
           (eso metía "Cotizar" arriba de la imagen). Se usa display:contents para
           que cada elemento se pueda ordenar de forma individual, sin importar
           en qué div del HTML esté metido. */
        @media (max-width: 1175px) {
            .product-details { display: flex; flex-direction: column; }
            .product-info-left, .product-info-right { display: contents; }

            h1#product-title { order: 1; }
            p#product-description { order: 2; }
            .product-showcase { order: 3; }
            .sizes { order: 4; }
            #ver-colores { order: 5; }
            .cta-button { order: 6; }
            .product-documents { order: 7; }
            .share-section { order: 8; }

            /* ---------- CENTRADO CONSISTENTE: imagen y botón de tamaño ---------- */
            /* El CSS real trae varios "transform: translateX(...)" con números puestos
               a mano (25px para .sizes, 20px para la imagen) calculados para el diseño
               estático original — como nuestro layout no es idéntico pixel por pixel,
               esos números quedaban desalineados entre sí. Se anulan todos y se centra
               la imagen y el botón de tamaño con el MISMO método (margin:auto + mismo
               max-width), para que siempre compartan el mismo centro, en cualquier ancho. */
            .product-info-left { align-items: center; width: 100%; }
            .product-showcase {
                margin: 0 auto !important;
                transform: none !important;
                max-width: 340px !important;
            }
            .product-showcase img#product-image {
                transform: none !important;
                margin: 0 auto;
            }
            .sizes {
                margin: 20px auto 0 !important;
                justify-content: center !important;
                transform: none !important;
                max-width: 340px !important;
                width: 100% !important;
            }
        }
        /* ---------- BREADCRUMB: truncar nombres de producto muy largos ---------- */
        /* El nombre del producto (#product-name) no tenía límite de ancho: si el
           nombre era muy largo, empujaba y descuadraba el breadcrumb en tablet/móvil.
           Se corta con "..." según el ancho disponible en cada tamaño de pantalla. */
        .breadcrumb p span#product-name {
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            vertical-align: bottom;
            max-width: 100%;
        }
        .breadcrumb a span#linea-name {
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
            .breadcrumb a span#linea-name {
                max-width: 120px;
            }
        }
        @media (max-width: 480px) {
            .breadcrumb p span#product-name {
                max-width: 110px;
            }
            .breadcrumb a span#linea-name {
                max-width: 80px;
            }
        }
    </style>
</head>
<body>
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
                            <li><a href="lineasAuto.php">Automotriz</a></li>
                            <li><a href="lineaIndus.php">Industrial</a></li>
                            <li><a href="lineaMarina.php">Marina</a></li>
                            <li><a href="lineaTrafico.php">Señalización</a></li>
                            <li><a href="lineaMadera.php">Madera</a></li>
                            <li><a href="lineaDisolvente.php">Disolventes</a></li>
                            <li><a href="resinasPegame.php">Resinas y Pegamentos</a></li>
                            <li><a href="insuQuimi.php">Insumos Químicos</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="asesoria-movil">Asesoría</a></li>
                    <li><a href="puntoVenta.html">Puntos de venta</a></li>

                    <li>
                        <a href="#" class="trigger-submenu-cotiza">
                            ¡Cotiza aquí! <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="submenu-movil-cotiza">
                            <li>
                                <a href="https://wa.me/957720068" target="_blank" rel="noopener noreferrer" class="whatsapp2-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>¡Chatear con un asesor!</span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:945057702" class="call-btn">
                                    <i class="fas fa-phone"></i>
                                    <span>¡Llamar a un asesor!</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="email-btn cotiza-email-movil">
                                    <i class="fas fa-envelope"></i>
                                    <span>¡Enviar un correo!</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <nav>
                <ul class="menu">
                    <li class="enca">
                        <a>Líneas <img src="icons/flechita.png" alt="" /></a>
                        <ul class="submenu">
                            <li><a href="lineasDecorativa.php">Decorativa</a></li>
                            <li><a href="lineasAuto.php">Automotriz</a></li>
                            <li><a href="lineaIndus.php">Industrial</a></li>
                            <li><a href="lineaMarina.php">Marina</a></li>
                            <li><a href="lineaTrafico.php">Señalización</a></li>
                            <li><a href="lineaMadera.php">Madera</a></li>
                            <li><a href="lineaDisolvente.php">Disolventes</a></li>
                            <li><a href="resinasPegame.php">Resinas y Pegamentos</a></li>
                            <li><a href="insuQuimi.php">Insumos Químicos</a></li>
                        </ul>
                    </li>
                    <li class="enca"><a id="asesoria-link">Asesoría</a></li>
                    <li class="enca"><a href="puntoVenta.html">Puntos de venta</a></li>
                    <li class="enca"><a id="cotiza-aqui" href="#">¡Cotiza aquí!</a></li>
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

    <!-- Overlay de Asesoría -->
    <div id="asesoria-overlay" class="asesoria-overlay hidden">
        <div class="asesoria-content">
            <button id="close-asesoria" class="close-button">&times;</button>
            <div class="contact-card">
                <div class="contact-header">
                    <h3>Asesor comercial Lima</h3>
                </div>
                <div class="contact-info">
                    <p class="junta1"><i class="fas fa-phone"></i>977 898 394</p>
                    <p class="junta2">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:ventas@jhomeron.com">ventas@jhomeron.com</a>
                    </p>
                </div>
            </div>
            <div class="contact-card">
                <div class="contact-header-2">
                    <h3>Asesor comercial Provincias</h3>
                </div>
                <div class="contact-info">
                    <p class="junta3"><i class="fas fa-phone"></i>945 057 702</p>
                    <p class="junta2">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:infoventas@jhomeron.com">infoventas@jhomeron.com</a>
                    </p>
                </div>
            </div>
            <div class="contact-card whatsapp">
                <div class="contact-header-3">
                    <h3>WhatsApp</h3>
                    <span>| Consultas Generales</span>
                </div>
                <p>Clic aquí y escríbenos</p>
                <a href="https://wa.me/945057702" class="whatsapp-button" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-whatsapp"></i>
                    <span>945 057 702</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Overlay de Cotización -->
    <div id="cotiza-modal" class="cotiza-overlay hidden">
        <div>
            <button id="close-cotiza" class="close-button">&times;</button>
            <div class="whatsapp-2">
                <a href="https://wa.me/957720068" class="contact-btn whatsapp2-btn" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-whatsapp" id="ws1"></i>
                    <span>¡Chatear con un asesor!</span>
                </a>
            </div>
            <div class="llamada">
                <a href="tel:945057702" class="contact-btn call-btn">
                    <i class="fas fa-phone"></i>
                    <span>¡Llamar a un asesor!</span>
                </a>
            </div>
            <div class="email">
                <a href="mailto:ventas@jhomeron.com" id="open-form-btn" class="contact-btn email-btn">
                    <i class="fas fa-envelope"></i>
                    <span>¡Enviar un correo!</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Overlay del formulario de contacto -->
    <div id="formOverlay" class="form-overlay hidden">
        <div class="form-container">
            <button id="close-form" class="close-button">&times;</button>
            <h2>¿En qué podemos ayudarte?</h2>
            <form id="contactForm" action="https://formsubmit.co/ventas@jhomeron.com" method="POST">
                <input type="hidden" name="_subject" value="Nueva solicitud de cotización desde jhomeron.com">
                <input type="hidden" name="_next" value="https://www.tamsa.jhomeron.com/gracias.html">
                <input type="hidden" name="_template" value="table">
                <div class="form-row">
                    <input type="text" name="Nombre" placeholder="Nombres y apellidos*" required />
                    <input type="text" name="Celular" placeholder="Celular*" required />
                </div>
                <div class="form-row">
                    <input type="text" name="Empresa" placeholder="Empresa*" required />
                    <input type="text" name="Ciudad" placeholder="Ciudad*" required />
                </div>
                <input type="email" name="Correo" placeholder="Correo" required />
                <textarea name="Mensaje" placeholder="Escribe mensaje*" required></textarea>
                <div class="recaptcha-container">
                    <div class="g-recaptcha" data-sitekey="6Lc8jigrAAAAAGysy3S9iNB4G_NIZ9SIE6RqGIRp"></div>
                </div>
                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>

    <div class="breadcrumb">
        <a href="index.html"><img src="icons/home.svg" alt="inicio" /></a>
        <a href="lineasProducto.html">> Productos</a>
        <a href="<?php echo htmlspecialchars($lineaInfo['url']); ?>">> <span id="linea-name"><?php echo htmlspecialchars($lineaInfo['nombre']); ?></span></a>
        <p>> <span id="product-name"><?php echo $tituloBreadcrumb; ?></span></p>
    </div>

    <main class="product-page">
        <section class="product-details">
            <div class="product-info-left">
                <div class="product-showcase">
                    <?php if (count($imagenes) > 1): ?>
                    <button type="button" class="carousel-arrow left-arrow" onclick="moverCarrusel(-1)">
                        <img src="icons/fle_izq.svg" alt="Producto anterior" />
                    </button>
                    <?php endif; ?>
                    <img id="product-image" src="<?php echo htmlspecialchars($imagenes[0]); ?>" alt="<?php echo htmlspecialchars($titulo); ?>" />
                    <?php if (count($imagenes) > 1): ?>
                    <button type="button" class="carousel-arrow right-arrow" onclick="moverCarrusel(1)">
                        <img src="icons/fle_dere.svg" alt="Producto siguiente" />
                    </button>
                    <?php endif; ?>
                </div>

                <?php if (count($tamanos) > 0):
                    $totalTamanos = count($tamanos);
                    $renderizarTamano = function ($t, $i) {
                        if (preg_match('/^([\d.,\/]+)\s*(.*)$/', trim($t), $m)) {
                            $numeroTam = $m[1]; $unidadTam = $m[2];
                        } else { $numeroTam = $t; $unidadTam = ""; }
                        ob_start(); ?>
                        <span class="size<?php echo $i === 0 ? ' active' : ''; ?>" onclick="seleccionarTamano(this, <?php echo $i; ?>)">
                            <span class="number"><?php echo htmlspecialchars($numeroTam); ?></span><span class="unit"><?php echo htmlspecialchars($unidadTam); ?></span>
                        </span>
                        <?php return ob_get_clean();
                    };
                ?>
                <div class="sizes" style="justify-content:center; margin-left:0; max-width:500px; margin-right:auto;">
                    <?php if ($totalTamanos >= 4):
                        $cantidadPrimeraFila = (int) ceil($totalTamanos / 2);
                    ?>
                        <div style="display:flex; flex-direction:column; gap:10px; width:100%;">
                            <div style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center;">
                                <?php for ($i = 0; $i < $cantidadPrimeraFila; $i++) echo $renderizarTamano($tamanos[$i], $i); ?>
                            </div>
                            <div style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center;">
                                <?php for ($i = $cantidadPrimeraFila; $i < $totalTamanos; $i++) echo $renderizarTamano($tamanos[$i], $i); ?>
                            </div>
                        </div>
                    <?php else: foreach ($tamanos as $i => $t) echo $renderizarTamano($t, $i); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if (count($colores) > 0): ?>
                <button type="button" id="ver-colores" class="boton-ver-colores" style="margin-top:16px;">VER COLORES</button>
                <?php endif; ?>

                <div class="share-section">
                    <h3>Compartir producto:</h3>
                    <div class="share-icons" id="iconos-compartir-producto">
                        <a href="#" data-red="facebook"><img src="icons/redes/face.svg" alt="Facebook" /></a>
                        <a href="#" data-red="linkedin"><img src="icons/redes/linke.svg" alt="LinkedIn" /></a>
                        <a href="#" data-red="pinterest"><img src="icons/redes/pinte.svg" alt="Pinterest" /></a>
                        <a href="#" data-red="whatsapp"><img src="icons/redes/wasap.svg" alt="WhatsApp" /></a>
                        <a href="#" data-red="copiar"><img src="icons/redes/enlace.svg" alt="Enlace" /></a>
                    </div>
                </div>
            </div>

            <div class="product-info-right">
                <h1 id="product-title"><?php echo $tituloHtml; ?></h1>
                <p id="product-description"><?php echo htmlspecialchars($descripcion); ?></p>

                <a href="https://wa.me/957720068" target="_blank" class="cta-button">¡COTIZAR AQUÍ!</a>

                <?php if (count($pdfs) > 0 || count($videos) > 0): ?>
                <div class="product-documents">
                    <?php foreach ($pdfs as $pdf):
                        $esCatalogo = (stripos($pdf['nombre'], 'cat') !== false);
                        $esFichaSeg = (stripos($pdf['nombre'], 'segur') !== false);
                        $claseFicha = $esFichaSeg ? 'ficha-seguridad' : 'ficha-tecnica';
                    ?>
                        <a href="<?php echo htmlspecialchars($pdf['ruta_original']); ?>" target="_blank" class="doc-button <?php echo $claseFicha; ?>" <?php echo $esCatalogo ? '' : 'download'; ?>>
                            <?php echo htmlspecialchars($pdf['nombre']); ?> <img src="icons/flechafi.svg" alt="" />
                        </a>
                    <?php endforeach; ?>
                    <?php foreach ($videos as $video): ?>
                        <a href="<?php echo htmlspecialchars($video['ruta_original']); ?>" target="_blank" class="doc-button" title="<?php echo htmlspecialchars($video['nombre']); ?>">
                            Ver video <i class="fas fa-play"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php if (count($colores) > 0): ?>
    <div class="modal-colores-overlay" id="modal-colores" style="display:none; position:absolute; z-index:500;">
        <div class="modal-colores-contenido" style="background:white; border-radius:14px; padding:40px 26px 22px; max-width:620px; width:92vw; box-shadow:0 10px 32px rgba(20,20,50,0.22); position:relative;">
            <button type="button" id="cerrar-modal-colores" style="position:absolute; top:10px; right:10px; width:26px; height:26px; border-radius:50%; border:1.5px solid #ef0606; background:white; color:#ef0606; font-size:15px; cursor:pointer;">&times;</button>
            <div style="display:flex; flex-wrap:wrap; gap:10px;">
                <?php foreach ($colores as $color): ?>
                    <div style="width:32px; height:32px; border-radius:4px; background-image:url('<?php echo htmlspecialchars($color['ruta_thumb'] ?: $color['ruta_original']); ?>'); background-size:cover; background-position:center;" title="<?php echo htmlspecialchars($color['nombre']); ?>"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Footer real del sitio -->
    <footer>
        <div class="footer-top-bar">
            <div class="footer-top-content">
                <img src="icons/logo_jhomeron_footer.svg" alt="Logo" class="footer-logo" />
                <div class="footer-icons">
                    <a href="https://www.facebook.com/SomosIndustriasJhomeronSA" target="_blank">
                        <img src="icons/footer-icons/facebook.png" alt="Facebook" class="normal-icon" />
                        <img src="icons/footer-icons/facebook_rojo.svg" alt="Facebook" class="red-icon" />
                    </a>
                    <a href="https://www.instagram.com/pinturas_jhomeron/?hl=es-la" target="_blank">
                        <img src="icons/footer-icons/tiktok_blanco.svg" alt="Instagram" class="normal-icon" />
                        <img src="icons/footer-icons/instagram_rojo.svg" alt="Instagram" class="red-icon" />
                    </a>
                    <a href="https://www.tiktok.com/@pinturas_jhomeron" target="_blank">
                        <img src="icons/footer-icons/tik-tok.png" alt="TikTok" class="normal-icon" />
                        <img src="icons/footer-icons/tiktok_rojo.svg" alt="TikTok" class="red-icon" />
                    </a>
                    <a href="https://www.linkedin.com/in/pinturas-jhomeron-6b869a368" target="_blank">
                        <img src="icons/footer-icons/linkedin_blanco.svg" alt="LinkedIn" class="normal-icon" />
                        <img src="icons/footer-icons/linkedin_rojo.svg" alt="LinkedIn" class="red-icon" />
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-container">
            <div class="footer-section products">
                <h3>NUESTROS PRODUCTOS</h3>
                <ul>
                    <li><a href="lineasDecorativa.php">Línea Decorativa</a></li>
                    <li><a href="lineasAuto.php">Línea Automotriz</a></li>
                    <li><a href="lineaIndus.php">Línea Industrial</a></li>
                    <li><a href="lineaMarina.php">Línea Marina</a></li>
                    <li><a href="lineaTrafico.php">Línea Señalización</a></li>
                    <li><a href="lineaMadera.php">Línea Madera</a></li>
                    <li><a href="lineaDisolvente.php">Línea Disolventes</a></li>
                    <li><a href="resinasPegame.php">Resinas y Pegamentos</a></li>
                    <li><a href="insuQuimi.php">Insumos Químicos</a></li>
                </ul>
            </div>
            <div class="footer-section customer-service">
                <h3>ATENCIÓN AL CLIENTE</h3>
                <ul>
                    <li class="no-bullet"><i class="fa-solid fa-phone-volume"></i><p>536-4214 | 500-8202 | 500-8203</p></li>
                    <li class="no-bullet"><i class="fa-solid fa-phone-volume"></i><p>500-8205 | 500-8206 | 500-8207</p></li>
                    <li class="no-bullet"><i class="fas fa-envelope"></i><a href="mailto:ventas@jhomeron.com"><p>ventas@jhomeron.com</p></a></li>
                </ul>
                <div class="horario">
                    <h4>HORARIO DE ATENCIÓN</h4>
                    <ul>
                        <li>Lu - Vi | 8:00 am - 5:20 pm</li>
                        <li>Sáb | 8:00 am - 1:00 pm</li>
                    </ul>
                </div>
            </div>
            <div class="footer-section address">
                <h3>DIRECCIÓN</h3>
                <a href="https://www.google.com/maps/place/Industrias+jhomeron+SA/@-11.9209387,-77.0650729,15z" target="_blank" class="address-link">
                    <i class="fas fa-map-marker-alt"></i>
                    <p class="address-text">Calle Santa Ana Mz. "F" Lote 44, Fnd. Chacra Cerro - Chillón<br>Comas - Lima - Perú</p>
                </a>
                <div class="legal">
                    <h3>INFORMACIÓN LEGAL</h3>
                    <ul>
                        <li><a href="politicaPriva.html">Políticas de privacidad</a></li>
                        <li><a href="terminosCondi.html">Términos y condiciones</a></li>
                        <li><a href="libroReclama.html">Libro de Reclamaciones</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>©2025, Industrias Jhomeron S.A. - RUC: 20601777844</p>
        </div>
    </footer>

    <script>
        const imagenesProducto = <?php echo json_encode($imagenes); ?>;
        const cantidadTamanos = <?php echo count($tamanos); ?>;
        let indiceActual = 0;

        // Igual que en pinturas.php: se sincroniza el tamaño con la imagen mientras haya
        // más de 1 imagen, aunque la cantidad de tamaños no coincida exactamente (se usa
        // el índice más cercano disponible en vez de no hacer nada).
        const sincronizado = cantidadTamanos > 0 && imagenesProducto.length > 1;

        function actualizarImagen() {
            document.getElementById("product-image").src = imagenesProducto[indiceActual];
        }

        function actualizarBotonesTamano() {
            const botones = document.querySelectorAll(".sizes .size");
            const indiceBoton = Math.min(indiceActual, botones.length - 1);
            botones.forEach((boton, i) => {
                boton.classList.toggle("active", i === indiceBoton);
            });
        }

        function moverCarrusel(direccion) {
            indiceActual = (indiceActual + direccion + imagenesProducto.length) % imagenesProducto.length;
            actualizarImagen();
            if (sincronizado) actualizarBotonesTamano();
        }

        function seleccionarTamano(elegido, indice) {
            document.querySelectorAll(".sizes .size").forEach(el => el.classList.remove("active"));
            elegido.classList.add("active");

            if (sincronizado) {
                indiceActual = Math.min(indice, imagenesProducto.length - 1);
                actualizarImagen();
            }
        }

        // Compartir producto
        document.addEventListener("DOMContentLoaded", function () {
            const enlaces = document.querySelectorAll("#iconos-compartir-producto a[data-red]");
            const urlActual = encodeURIComponent(window.location.href);
            enlaces.forEach(enlace => {
                const red = enlace.getAttribute("data-red");
                if (red === "facebook") { enlace.href = "https://www.facebook.com/sharer/sharer.php?u=" + urlActual; enlace.target = "_blank"; }
                else if (red === "linkedin") { enlace.href = "https://www.linkedin.com/sharing/share-offsite/?url=" + urlActual; enlace.target = "_blank"; }
                else if (red === "pinterest") { enlace.href = "https://pinterest.com/pin/create/button/?url=" + urlActual; enlace.target = "_blank"; }
                else if (red === "whatsapp") { enlace.href = "https://wa.me/?text=" + urlActual; enlace.target = "_blank"; }
                else if (red === "copiar") {
                    enlace.addEventListener("click", function (e) {
                        e.preventDefault();
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            const original = enlace.innerHTML;
                            enlace.innerHTML = "✓";
                            setTimeout(() => { enlace.innerHTML = original; }, 1500);
                        });
                    });
                }
            });

            // Modal de colores
            const botonVerColores = document.getElementById("ver-colores");
            const modalColores = document.getElementById("modal-colores");
            const cerrarModalColores = document.getElementById("cerrar-modal-colores");
            if (botonVerColores && modalColores) {
                botonVerColores.addEventListener("click", function (e) {
                    e.stopPropagation();
                    const abrir = modalColores.style.display !== "block";
                    if (abrir) {
                        const rect = botonVerColores.getBoundingClientRect();
                        modalColores.style.top = (rect.bottom + window.scrollY + 10) + "px";
                        modalColores.style.left = (rect.left + window.scrollX) + "px";
                        modalColores.style.display = "block";
                    } else {
                        modalColores.style.display = "none";
                    }
                });
                if (cerrarModalColores) {
                    cerrarModalColores.addEventListener("click", function () { modalColores.style.display = "none"; });
                }
                document.addEventListener("click", function (e) {
                    if (modalColores.style.display === "block" && !modalColores.contains(e.target) && e.target !== botonVerColores) {
                        modalColores.style.display = "none";
                    }
                });
            }

            // Buscador del header
            const inputBusqueda = document.querySelector(".busca input");
            if (inputBusqueda) {
                const contenedorBusca = document.querySelector(".busca");
                contenedorBusca.style.position = "relative";
                const listaResultados = document.createElement("div");
                listaResultados.style.cssText = "display:none; position:absolute; top:100%; left:0; right:0; background:white; border-radius:8px; box-shadow:0 8px 24px rgba(0,0,0,0.15); z-index:1000; max-height:300px; overflow-y:auto; margin-top:6px;";
                contenedorBusca.appendChild(listaResultados);

                const estiloHover = document.createElement("style");
                estiloHover.textContent = `
                    .resultado-busqueda { display:flex; align-items:center; gap:12px; padding:10px 16px; text-decoration:none; font-size:14px; font-family:'Outfit',sans-serif; border-bottom:1px solid #eee; transition:background 0.15s; }
                    .resultado-busqueda span { color:#0d3393; font-weight:500; }
                    .resultado-busqueda:hover { background:#f3f3f3; }
                    .resultado-busqueda:hover span { text-decoration:underline; text-decoration-color:#ef0606; }
                `;
                document.head.appendChild(estiloHover);

                let temporizador = null, ultimosResultados = null;
                function pintarResultados(productos) {
                    if (productos.length === 0) {
                        listaResultados.innerHTML = '<div style="padding:14px; color:#999; font-size:13px; font-family:Outfit,sans-serif;">Sin resultados</div>';
                    } else {
                        listaResultados.innerHTML = productos.map(p => `
                            <a href="${p.url}" class="resultado-busqueda">
                                <img src="${p.imagen}" alt="" style="width:38px; height:38px; object-fit:contain; flex-shrink:0;" onerror="this.style.display='none'">
                                <span>${p.nombre}</span>
                            </a>
                        `).join("");
                    }
                }
                function buscarYMostrar(texto) {
                    fetch("buscar_productos.php?q=" + encodeURIComponent(texto))
                        .then(r => r.json())
                        .then(productos => { ultimosResultados = productos; pintarResultados(productos); listaResultados.style.display = "block"; })
                        .catch(() => { listaResultados.style.display = "none"; });
                }
                inputBusqueda.addEventListener("input", function () {
                    const texto = this.value.trim();
                    clearTimeout(temporizador);
                    if (texto.length < 2) { listaResultados.style.display = "none"; ultimosResultados = null; return; }
                    temporizador = setTimeout(() => buscarYMostrar(texto), 250);
                });
                inputBusqueda.addEventListener("focus", function () {
                    const texto = this.value.trim();
                    if (texto.length >= 2 && ultimosResultados !== null) { pintarResultados(ultimosResultados); listaResultados.style.display = "block"; }
                });
                document.addEventListener("click", function (e) {
                    if (!contenedorBusca.contains(e.target)) listaResultados.style.display = "none";
                });
                inputBusqueda.addEventListener("blur", function () {
                    if (!contenedorBusca.contains(document.activeElement)) listaResultados.style.display = "none";
                });
            }

            // Menú móvil
            const menuBtn = document.querySelector(".menu-hamburguesa");
            const menuMovil = document.querySelector(".menu-movil-contenedor");
            const submenuTriggers = document.querySelectorAll(".trigger-submenu");
            if (menuBtn && menuMovil) {
                menuBtn.addEventListener("click", function (e) {
                    e.preventDefault(); e.stopPropagation();
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

            // Submenú móvil de "¡Cotiza aquí!" (Chatear / Llamar / Enviar correo)
            const triggerCotiza = document.querySelector(".trigger-submenu-cotiza");
            if (triggerCotiza) {
                triggerCotiza.addEventListener("click", function (e) {
                    e.preventDefault();
                    const submenuCotiza = this.nextElementSibling;
                    submenuCotiza.classList.toggle("activo");
                    this.classList.toggle("active");
                });
            }
            const cotizaEmailMovil = document.querySelector(".cotiza-email-movil");
            if (cotizaEmailMovil) {
                cotizaEmailMovil.addEventListener("click", function (e) {
                    e.preventDefault();
                    const formOverlayMovil = document.getElementById("formOverlay");
                    if (formOverlayMovil) {
                        formOverlayMovil.classList.remove("hidden");
                        if (menuMovil) menuMovil.classList.remove("activo");
                    }
                });
            }

            document.addEventListener("click", function (e) {
                if (menuMovil && !menuMovil.contains(e.target) && !menuBtn.contains(e.target)) {
                    menuMovil.classList.remove("activo");
                }
            });

            // Overlay de Asesoría
            const asesoriaOverlay = document.getElementById("asesoria-overlay");
            const asesoriaLink = document.getElementById("asesoria-link");
            const closeAsesoria = document.getElementById("close-asesoria");
            const asesoriaMobile = document.querySelector(".asesoria-movil");
            if (asesoriaLink && asesoriaOverlay && closeAsesoria) {
                asesoriaLink.addEventListener("click", function (e) { e.preventDefault(); asesoriaOverlay.classList.remove("hidden"); });
                closeAsesoria.addEventListener("click", function () { asesoriaOverlay.classList.add("hidden"); });
                asesoriaOverlay.addEventListener("click", function (e) { if (e.target === asesoriaOverlay) asesoriaOverlay.classList.add("hidden"); });
            }
            if (asesoriaMobile && asesoriaOverlay) {
                asesoriaMobile.addEventListener("click", function (e) {
                    e.preventDefault(); asesoriaOverlay.classList.remove("hidden");
                    if (menuMovil) menuMovil.classList.remove("activo");
                });
            }

            // Overlay de Cotización + formulario
            const cotizaOverlay = document.getElementById("cotiza-modal");
            const cotizaBtn = document.getElementById("cotiza-aqui");
            const closeCotiza = document.getElementById("close-cotiza");
            if (cotizaBtn && cotizaOverlay && closeCotiza) {
                cotizaBtn.addEventListener("click", function (e) { e.preventDefault(); cotizaOverlay.classList.remove("hidden"); });
                closeCotiza.addEventListener("click", function () { cotizaOverlay.classList.add("hidden"); });
                cotizaOverlay.addEventListener("click", function (e) { if (e.target === cotizaOverlay) cotizaOverlay.classList.add("hidden"); });
            }
            const openFormBtn = document.getElementById("open-form-btn");
            const formOverlay = document.getElementById("formOverlay");
            const closeForm = document.getElementById("close-form");
            if (openFormBtn && formOverlay && closeForm) {
                openFormBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    if (cotizaOverlay) cotizaOverlay.classList.add("hidden");
                    formOverlay.classList.remove("hidden");
                });
                closeForm.addEventListener("click", function () { formOverlay.classList.add("hidden"); });
                formOverlay.addEventListener("click", function (e) { if (e.target === formOverlay) formOverlay.classList.add("hidden"); });
            }
        });
    </script>
</body>
</html>