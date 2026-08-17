<?php
// insuQuimi.php
// Página de línea "Insumos Químicos", conectada a la base de datos.
// A diferencia de las demás líneas, usa vista de LISTA (no tarjetas), aunque sí
// mantiene el filtro por categoría, tal como el diseño original de insuQuimi.html.

require_once "back_jho/conexion.php";

// Convierte "Látex acabado" -> "latex-acabado", sin tildes, para usarlo como
// valor de filtro (data-category) y como id de botón. Así el filtro funciona
// automáticamente sin importar qué categorías existan en la base de datos.
function slugCategoria($texto) {
    $texto = mb_strtolower(trim($texto), "UTF-8");
    $mapa = ["á"=>"a","é"=>"e","í"=>"i","ó"=>"o","ú"=>"u","ñ"=>"n"];
    $texto = strtr($texto, $mapa);
    $texto = preg_replace('/[^a-z0-9]+/', '-', $texto);
    return trim($texto, '-');
}

// Traemos 1 imagen representativa por cada producto de la línea insumos-quimicos
$sql = "SELECT a.producto_slug, a.nombre, a.ruta_thumb, a.ruta_original, p.nombre_display, p.orden_listado, p.categoria, p.grupo_filtro
        FROM archivos a
        INNER JOIN (
            SELECT producto_slug, MIN(orden) AS min_orden, MIN(id) AS min_id
            FROM archivos
            WHERE linea = 'insumos-quimicos' AND tipo = 'imagen' AND producto_slug IS NOT NULL AND producto_slug != ''
            GROUP BY producto_slug
        ) primero
        ON a.producto_slug = primero.producto_slug AND a.id = primero.min_id
        LEFT JOIN productos p ON p.producto_slug = a.producto_slug
        ORDER BY COALESCE(p.orden_listado, 999) ASC, a.nombre ASC";

$resultado = $conexion->query($sql);
$productos = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];

// Agrupamos las categorías encontradas por su "grupo_filtro":
// - Si un grupo tiene MÁS DE UNA categoría distinta -> sale como botón desplegable con checkboxes
//   (ej: "Preparación" agrupa "Preparación de Superficies" y "Preparación de adherencia").
// - Si un grupo tiene UNA sola categoría -> sale como botón simple de selección única (como antes).
$ordenPreferido = ["Secante", "Pigmento", "Aditivo", "Talco"]; // orden visto en tu captura de referencia
                       // en el orden que prefieras (ej: ["Recubrimientos", "Anticorrosivos", ...]).
                       // Mientras tanto, sale en el orden en que aparecen los productos. "Otros" igual
                       // se manda siempre al final, sin importar esta lista.
$gruposFiltro = []; // "Preparación" => ["Preparación de Superficies", "Preparación de adherencia"]
foreach ($productos as $p) {
    $cat = trim($p["categoria"] ?? "");
    if ($cat === "") continue;
    $grupo = trim($p["grupo_filtro"] ?? "");
    if ($grupo === "") $grupo = $cat; // sin grupo asignado = botón propio (grupo = su propia categoría)

    if (!isset($gruposFiltro[$grupo])) $gruposFiltro[$grupo] = [];
    if (!in_array($cat, $gruposFiltro[$grupo], true)) $gruposFiltro[$grupo][] = $cat;
}
uksort($gruposFiltro, function ($a, $b) use ($ordenPreferido) {
    // "Otros" (o cualquier variante: Otro, OTROS, etc.) siempre va al final, sin excepción.
    $slugA = slugCategoria($a);
    $slugB = slugCategoria($b);
    $esOtrosA = in_array($slugA, ["otros", "otro"], true);
    $esOtrosB = in_array($slugB, ["otros", "otro"], true);
    if ($esOtrosA && !$esOtrosB) return 1;
    if ($esOtrosB && !$esOtrosA) return -1;
    if ($esOtrosA && $esOtrosB) return 0;

    // Para el resto: coincidencia flexible contra el orden preferido (usamos "empieza con"
    // en vez de coincidencia exacta, para que "Masilla" y "Masillas" cuenten igual).
    $ordenSlugs = array_map("slugCategoria", $ordenPreferido);
    $buscarPosicion = function ($slug) use ($ordenSlugs) {
        foreach ($ordenSlugs as $i => $s) {
            if ($slug === $s || strpos($slug, $s) === 0 || strpos($s, $slug) === 0) return $i;
        }
        return 999;
    };
    $ia = $buscarPosicion($slugA);
    $ib = $buscarPosicion($slugB);
    return $ia <=> $ib;
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insumos Químicos - Jhomeron</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="styleslinea.css" />
    <link rel="stylesheet" href="stylesFooter.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* El CSS real, a 768px y 480px, REDISEÑA la lista como tarjetas separadas
           (con huecos entre cada fila y el botón "VER DETALLES" cuadrado/pegado al
           borde) — muy distinto al estilo de escritorio (fila continua, sin huecos,
           botón en forma de píldora). Aquí cancelamos ese rediseño y forzamos que
           se vea EXACTAMENTE igual que en escritorio, en cualquier tamaño de pantalla. */
        @media (max-width: 768px) {
            .lista-resinas { gap: 0 !important; }
            .item-resina {
                border-radius: 5px !important;
                padding: 10px 20px !important;
                overflow: visible !important;
            }
            .btn-ver-detalles {
                border-radius: 100px !important;
                height: auto !important;
                padding: 5px 20px !important;
                white-space: nowrap;
            }
        }
        @media (max-width: 480px) {
            .lista-resinas { gap: 0 !important; }
            .item-resina {
                border-radius: 5px !important;
                padding: 8px 14px !important;
            }
            .btn-ver-detalles {
                border-radius: 100px !important;
                padding: 4px 14px !important;
                min-width: auto !important;
            }
        }

        /* ---------- BOTONES DE FILTRO: ajuste de ancho dinámico ---------- */
        /* La clase .btn1 real (styleslinea.css) trae un ancho fijo de 110px pensado
           para las páginas estáticas, que además ajustan cada botón por su #id específico.
           Como aquí los botones se generan dinámicamente (sin esos ids), sobreescribimos
           el ancho para que cada uno se adapte a su propio texto, con espacio a los lados
           y sin saltos de línea. */
        .arb2 .btn1 {
            width: auto;
            padding: 0 22px;
            white-space: nowrap;
        }

        /* ---------- BOTÓN DESPLEGABLE DE GRUPO (ej: "Preparación", "Otros") ---------- */
        /* Se usa cuando varias categorías comparten el mismo grupo_filtro: en vez de
           un botón por categoría, sale 1 botón con un desplegable de checkboxes. */
        .grupo-filtro-wrap { position: relative; }
        .btn-grupo-trigger i { margin-left: 8px; font-size: 12px; transition: transform 0.15s; }
        .btn-grupo-trigger.abierto i { transform: rotate(180deg); }

        .grupo-dropdown-panel {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 6px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.18);
            padding: 10px 4px;
            min-width: 220px;
            z-index: 500;
        }
        .grupo-dropdown-panel.abierto { display: block; }
        .grupo-dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 14px;
            font-family: 'Outfit', sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: #0d3393;
            cursor: pointer;
            white-space: nowrap;
        }
        .grupo-dropdown-item:hover { background: #f3f3f3; }
        .grupo-dropdown-item input[type="checkbox"],
        .grupo-dropdown-item:hover input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #0d3393;
            border: 1px solid #0d3393;
            filter: none;
            opacity: 1;
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
    <?php require "header.php"; ?>

    <div class="arriba">
        <div class="arb">
            <div class="nav-links">
                <a href="index.php"><img src="icons/home.svg" alt="inicio" /></a>
                <a href="lineasProducto.php">> Productos</a>
                <span>> Insumos Químicos</span>
            </div>

            <div class="arb2">
                <h2>INSUMOS QUÍMICOS</h2>

                <?php if (count($gruposFiltro) > 0): ?>
                <!-- Filtro móvil (dropdown) -->
                <div class="mobile-filter-btn">
                    <button id="mobileFilterBtn">
                        Filtrar productos
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div id="mobileFilterMenu" class="mobile-filter-menu">
                        <div class="filter-item" data-filter="all">Todos los productos</div>
                        <?php foreach ($gruposFiltro as $nombreGrupo => $categoriasDelGrupo): ?>
                            <?php foreach ($categoriasDelGrupo as $nombreCat): ?>
                                <div class="filter-item" data-filter="<?php echo htmlspecialchars(slugCategoria($nombreCat)); ?>"><?php echo htmlspecialchars($nombreCat); ?></div>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Filtro desktop -->
                <div class="arbtn">
                    <?php foreach ($gruposFiltro as $nombreGrupo => $categoriasDelGrupo):
                        $slugGrupo = slugCategoria($nombreGrupo);
                    ?>
                        <?php if (count($categoriasDelGrupo) === 1): ?>
                            <!-- Grupo con 1 sola categoría: botón simple de selección única -->
                            <button class="btn1" data-filter="<?php echo htmlspecialchars(slugCategoria($categoriasDelGrupo[0])); ?>" data-grupo="<?php echo htmlspecialchars($slugGrupo); ?>">
                                <?php echo htmlspecialchars($categoriasDelGrupo[0]); ?>
                            </button>
                        <?php else: ?>
                            <!-- Grupo con varias categorías: botón desplegable con checkboxes (selección múltiple) -->
                            <div class="grupo-filtro-wrap">
                                <button type="button" class="btn1 btn-grupo-trigger" data-grupo="<?php echo htmlspecialchars($slugGrupo); ?>">
                                    <?php echo htmlspecialchars($nombreGrupo); ?> <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="grupo-dropdown-panel">
                                    <?php foreach ($categoriasDelGrupo as $nombreCat): ?>
                                        <label class="grupo-dropdown-item">
                                            <input type="checkbox" data-grupo="<?php echo htmlspecialchars($slugGrupo); ?>" data-categoria="<?php echo htmlspecialchars(slugCategoria($nombreCat)); ?>">
                                            <?php echo htmlspecialchars($nombreCat); ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="conte-resinas" style="width:100%; box-sizing:border-box;">
            <div class="lista-resinas" style="width:100%;">
                <?php if (count($productos) === 0): ?>
                    <p style="font-family:'Outfit', sans-serif; padding: 20px;">
                        Aún no hay productos con línea "insumos-quimicos" y un producto_slug asignado.
                        Sube alguno desde el panel para verlo aparecer aquí automáticamente.
                    </p>
                <?php else: foreach ($productos as $producto):
                    $slugCatProducto = !empty($producto["categoria"]) ? slugCategoria($producto["categoria"]) : "";
                    $tituloProd = !empty($producto["nombre_display"]) ? $producto["nombre_display"] : str_replace("-", " ", $producto["producto_slug"]);
                    $tituloProd = str_replace("|", " ", $tituloProd); // en la lista no aplica el salto de línea
                ?>
                    <div class="item-resina product-card" data-category="<?php echo htmlspecialchars($slugCatProducto); ?>" style="width:100%; box-sizing:border-box;">
                        <div class="item-left">
                            <span class="bullet"></span>
                            <span class="nombre-resina"><?php echo htmlspecialchars(mb_strtoupper($tituloProd)); ?></span>
                        </div>
                        <a href="pinturaSimple.php?product=<?php echo urlencode($producto["producto_slug"]); ?>" class="btn-ver-detalles">VER DETALLES</a>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>

        <div class="lnco">
            <h3>Compartir productos:</h3>
            <div class="redes" id="redes-compartir-lista">
                <a href="#" data-red="facebook"><img src="icons/redes/face.svg" alt="facebook" /></a>
                <a href="#" data-red="linkedin"><img src="icons/redes/linke.svg" alt="linkedin" /></a>
                <a href="#" data-red="pinterest"><img src="icons/redes/pinte.svg" alt="pinterest" /></a>
                <a href="#" data-red="whatsapp"><img src="icons/redes/wasap.svg" alt="whatsapp" /></a>
                <a href="#" data-red="copiar"><img src="icons/redes/enlace.svg" alt="enlace" /></a>
            </div>
        </div>
    </div>

<?php require "footer.php"; ?>

    <script>
        // Buscador del header: busca en productos ya dinamicos (decorativa, industrial, automotriz)
        (function () {
            const inputBusqueda = document.querySelector(".busca input");
            if (!inputBusqueda) return;

            const contenedorBusca = document.querySelector(".busca");
            contenedorBusca.style.position = "relative";

            const listaResultados = document.createElement("div");
            listaResultados.style.cssText = "display:none; position:absolute; top:100%; left:0; right:0; background:white; border-radius:8px; box-shadow:0 8px 24px rgba(0,0,0,0.15); z-index:1000; max-height:300px; overflow-y:auto; margin-top:6px;";
            contenedorBusca.appendChild(listaResultados);

            // Estilo del hover para cada resultado, inyectado una sola vez
            const estiloHover = document.createElement("style");
            estiloHover.textContent = `
                .resultado-busqueda {
                    display: flex; align-items: center; gap: 12px; padding: 10px 16px;
                    text-decoration: none; color: #0d3393; font-size: 14px; font-family: 'Outfit', sans-serif;
                    border-bottom: 1px solid #eee; transition: background 0.15s;
                }
                .resultado-busqueda span { color: #0d3393; font-weight: 600; }
                .resultado-busqueda:hover { background: #f3f3f3; }
                .resultado-busqueda:hover span { text-decoration: underline; text-decoration-color: #ef0606; }
            `;
            document.head.appendChild(estiloHover);

            let temporizador = null;
            let ultimosResultados = null; // guarda el último resultado para volver a mostrarlo al reenfocar

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
                    .then(productos => {
                        ultimosResultados = productos;
                        pintarResultados(productos);
                        listaResultados.style.display = "block";
                    })
                    .catch(() => { listaResultados.style.display = "none"; });
            }

            inputBusqueda.addEventListener("input", function () {
                const texto = this.value.trim();
                clearTimeout(temporizador);

                if (texto.length < 2) {
                    listaResultados.style.display = "none";
                    ultimosResultados = null;
                    return;
                }

                temporizador = setTimeout(() => buscarYMostrar(texto), 250);
            });

            // Al volver a hacer foco en la barra: si ya había una búsqueda con resultados,
            // se vuelve a mostrar el mismo panel (sin repetir la petición al servidor)
            inputBusqueda.addEventListener("focus", function () {
                const texto = this.value.trim();
                if (texto.length >= 2 && ultimosResultados !== null) {
                    pintarResultados(ultimosResultados);
                    listaResultados.style.display = "block";
                }
            });

            // Al salir de la barra (clic afuera, tab, etc.) el panel se oculta por completo:
            // no debe quedar ningún rastro visual de la búsqueda anterior.
            document.addEventListener("click", function (e) {
                if (!contenedorBusca.contains(e.target)) {
                    listaResultados.style.display = "none";
                }
            });

            // Respaldo: si el campo pierde el foco (blur) sin que haya habido un clic
            // detectado fuera del contenedor (ej: la barra se encoge de vuelta a su ancho
            // normal al desenfocarse), igual se oculta el panel. El pequeño retraso permite
            // que un clic sobre un resultado (el <a>) alcance a registrarse antes de ocultarlo.
            inputBusqueda.addEventListener("blur", function () {
                setTimeout(() => {
                    if (!contenedorBusca.contains(document.activeElement)) {
                        listaResultados.style.display = "none";
                    }
                }, 150);
            });
        })();

        // Filtro por categoría (botones simples y desplegables con checkboxes)
        document.addEventListener("DOMContentLoaded", function () {
            const allCards = document.querySelectorAll(".product-card");
            const botonesSimples = document.querySelectorAll(".arbtn > .btn1[data-filter]");
            const botonesGrupo = document.querySelectorAll(".btn-grupo-trigger");
            const checkboxesGrupo = document.querySelectorAll(".grupo-dropdown-item input[type=checkbox]");
            const mobileFilterBtn = document.getElementById("mobileFilterBtn");
            const mobileFilterMenu = document.getElementById("mobileFilterMenu");
            const filterItems = document.querySelectorAll(".filter-item");

            // En la vista de lista no hace falta reagrupar en filas de "N por fila"
            // (eso era solo para la cuadrícula de tarjetas). Aquí basta con mostrar/ocultar.
            function reorganizarTarjetas(tarjetasVisibles) {
                // no-op: se deja intencionalmente vacío, ver comentario arriba
            }

            function resetearTodo() {
                botonesSimples.forEach(btn => { btn.style.backgroundColor = "#0d3393"; btn.style.color = "#f3f3f3"; });
                botonesGrupo.forEach(btn => { btn.style.backgroundColor = "#0d3393"; btn.style.color = "#f3f3f3"; btn.classList.remove("abierto"); });
                checkboxesGrupo.forEach(chk => { chk.checked = false; });
                document.querySelectorAll(".grupo-dropdown-panel").forEach(p => p.classList.remove("abierto"));
            }

            function activarBotonSimple(btn) {
                resetearTodo();
                if (btn) { btn.style.backgroundColor = "#fff"; btn.style.color = "#0D3393"; }
            }

            function activarBotonGrupo(slugGrupo) {
                const btn = Array.from(botonesGrupo).find(b => b.getAttribute("data-grupo") === slugGrupo);
                if (btn) { btn.style.backgroundColor = "#fff"; btn.style.color = "#0D3393"; }
            }

            function mostrarTodos() {
                resetearTodo();
                allCards.forEach(card => { card.style.display = "flex"; });
                reorganizarTarjetas(Array.from(allCards));
            }

            // Filtra mostrando cualquier tarjeta cuya categoría esté dentro del set (OR)
            function filtrarPorCategorias(setCategorias) {
                const visibles = [];
                allCards.forEach(card => {
                    if (setCategorias.has(card.getAttribute("data-category"))) {
                        card.style.display = "flex";
                        visibles.push(card);
                    } else {
                        card.style.display = "none";
                    }
                });
                reorganizarTarjetas(visibles);
            }

            let grupoActivo = null;              // slug del grupo actualmente en uso (botón simple o desplegable)
            let categoriasActivas = new Set();    // slugs de categorías filtrando ahora mismo

            // --- Botones simples (1 categoría = 1 grupo) ---
            botonesSimples.forEach(btn => {
                btn.addEventListener("click", function () {
                    const categoria = this.getAttribute("data-filter");
                    const grupo = this.getAttribute("data-grupo");
                    if (grupoActivo === grupo && categoriasActivas.size === 1 && categoriasActivas.has(categoria)) {
                        // Volver a tocar el mismo botón: quita el filtro
                        grupoActivo = null;
                        categoriasActivas = new Set();
                        mostrarTodos();
                    } else {
                        grupoActivo = grupo;
                        categoriasActivas = new Set([categoria]);
                        activarBotonSimple(this);
                        filtrarPorCategorias(categoriasActivas);
                    }
                });
            });

            // --- Botones de grupo (abren/cierran el desplegable de checkboxes) ---
            botonesGrupo.forEach(btn => {
                btn.addEventListener("click", function (e) {
                    e.stopPropagation();
                    const panel = this.nextElementSibling;
                    const estabaAbierto = panel.classList.contains("abierto");
                    document.querySelectorAll(".grupo-dropdown-panel").forEach(p => p.classList.remove("abierto"));
                    botonesGrupo.forEach(b => b.classList.remove("abierto"));
                    if (!estabaAbierto) {
                        panel.classList.add("abierto");
                        this.classList.add("abierto");
                    }
                });
            });

            // Cerrar cualquier desplegable de grupo al hacer clic afuera
            document.addEventListener("click", function (e) {
                if (!e.target.closest(".grupo-filtro-wrap")) {
                    document.querySelectorAll(".grupo-dropdown-panel").forEach(p => p.classList.remove("abierto"));
                    botonesGrupo.forEach(b => b.classList.remove("abierto"));
                }
            });

            // --- Checkboxes dentro de un grupo: selección múltiple (OR) ---
            checkboxesGrupo.forEach(chk => {
                chk.addEventListener("change", function () {
                    const grupo = this.getAttribute("data-grupo");
                    const categoria = this.getAttribute("data-categoria");

                    // Si se estaba usando otro filtro (botón simple u otro grupo), se limpia primero
                    // (tanto visualmente como el conjunto de categorías activas en memoria)
                    if (grupoActivo !== null && grupoActivo !== grupo) {
                        const estabaMarcado = this.checked;
                        resetearTodo();
                        categoriasActivas = new Set();
                        this.checked = estabaMarcado;
                    }

                    grupoActivo = grupo;
                    if (this.checked) {
                        categoriasActivas.add(categoria);
                    } else {
                        categoriasActivas.delete(categoria);
                    }

                    if (categoriasActivas.size === 0) {
                        grupoActivo = null;
                        mostrarTodos();
                    } else {
                        activarBotonGrupo(grupo);
                        filtrarPorCategorias(categoriasActivas);
                    }
                });
            });

            if (mobileFilterBtn && mobileFilterMenu) {
                mobileFilterBtn.addEventListener("click", function (e) {
                    e.stopPropagation();
                    mobileFilterMenu.classList.toggle("show");
                });
                document.addEventListener("click", function (e) {
                    if (!mobileFilterBtn.contains(e.target) && !mobileFilterMenu.contains(e.target)) {
                        mobileFilterMenu.classList.remove("show");
                    }
                });
            }

            // En móvil se mantiene selección única por simplicidad (tocar una opción = solo esa categoría)
            filterItems.forEach(item => {
                item.addEventListener("click", function () {
                    const categoria = this.getAttribute("data-filter");
                    if (mobileFilterBtn) {
                        mobileFilterBtn.innerHTML = this.textContent + ' <i class="fas fa-chevron-down"></i>';
                    }
                    if (mobileFilterMenu) mobileFilterMenu.classList.remove("show");

                    if (categoria === "all") {
                        grupoActivo = null;
                        categoriasActivas = new Set();
                        mostrarTodos();
                    } else {
                        resetearTodo();
                        grupoActivo = "movil";
                        categoriasActivas = new Set([categoria]);
                        filtrarPorCategorias(categoriasActivas);
                    }
                });
            });

            // Al cargar, se muestran todos los productos sin ningún filtro activo
            mostrarTodos();
        });

        // "Compartir productos" (la lista completa, no un producto individual)
        document.addEventListener("DOMContentLoaded", function () {
            const enlaces = document.querySelectorAll("#redes-compartir-lista a[data-red]");
            const urlActual = encodeURIComponent(window.location.href);

            enlaces.forEach(enlace => {
                const red = enlace.getAttribute("data-red");
                if (red === "facebook") {
                    enlace.href = "https://www.facebook.com/sharer/sharer.php?u=" + urlActual;
                    enlace.target = "_blank";
                } else if (red === "linkedin") {
                    enlace.href = "https://www.linkedin.com/sharing/share-offsite/?url=" + urlActual;
                    enlace.target = "_blank";
                } else if (red === "pinterest") {
                    enlace.href = "https://pinterest.com/pin/create/button/?url=" + urlActual;
                    enlace.target = "_blank";
                } else if (red === "whatsapp") {
                    enlace.href = "https://wa.me/?text=" + urlActual;
                    enlace.target = "_blank";
                } else if (red === "copiar") {
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
        });

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

        // -------- Manejo del overlay de Asesoría --------
        (function () {
            const asesoriaOverlay = document.getElementById("asesoria-overlay");
            const asesoriaLink = document.getElementById("asesoria-link");
            const closeAsesoria = document.getElementById("close-asesoria");
            const asesoriaMobile = document.querySelector(".asesoria-movil");
            const menuMovilEl = document.querySelector(".menu-movil-contenedor");

            if (asesoriaLink && asesoriaOverlay && closeAsesoria) {
                asesoriaLink.addEventListener("click", function (e) {
                    e.preventDefault();
                    asesoriaOverlay.classList.remove("hidden");
                });
                closeAsesoria.addEventListener("click", function () {
                    asesoriaOverlay.classList.add("hidden");
                });
                asesoriaOverlay.addEventListener("click", function (e) {
                    if (e.target === asesoriaOverlay) asesoriaOverlay.classList.add("hidden");
                });
            }
            if (asesoriaMobile && asesoriaOverlay) {
                asesoriaMobile.addEventListener("click", function (e) {
                    e.preventDefault();
                    asesoriaOverlay.classList.remove("hidden");
                    if (menuMovilEl) menuMovilEl.classList.remove("activo");
                });
            }
        })();

        // -------- Manejo del overlay de Cotización --------
        (function () {
            const cotizaOverlay = document.getElementById("cotiza-modal");
            const cotizaBtn = document.getElementById("cotiza-aqui");
            const closeCotiza = document.getElementById("close-cotiza");

            if (cotizaBtn && cotizaOverlay && closeCotiza) {
                cotizaBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    cotizaOverlay.classList.remove("hidden");
                });
                closeCotiza.addEventListener("click", function () {
                    cotizaOverlay.classList.add("hidden");
                });
                cotizaOverlay.addEventListener("click", function (e) {
                    if (e.target === cotizaOverlay) cotizaOverlay.classList.add("hidden");
                });
            }

            // -------- Overlay del formulario (se abre desde "Enviar un correo") --------
            const openFormBtn = document.getElementById("open-form-btn");
            const formOverlay = document.getElementById("formOverlay");
            const closeForm = document.getElementById("close-form");

            if (openFormBtn && formOverlay && closeForm) {
                openFormBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    if (cotizaOverlay) cotizaOverlay.classList.add("hidden");
                    formOverlay.classList.remove("hidden");
                });
                closeForm.addEventListener("click", function () {
                    formOverlay.classList.add("hidden");
                });
                formOverlay.addEventListener("click", function (e) {
                    if (e.target === formOverlay) formOverlay.classList.add("hidden");
                });
            }
        })();
        });
    </script>
</body>
</html>