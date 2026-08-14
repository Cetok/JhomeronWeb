<?php
// resinasPegame.php
// Página de línea "Resinas y Pegamentos", conectada a la base de datos.
// A diferencia de las demás líneas, esta usa vista de LISTA (no tarjetas) y no tiene
// filtro por categoría, tal como el diseño original de resinasPegame.php.

require_once "back_jho/conexion.php";

// Traemos 1 imagen representativa por cada producto de la línea resinas-pegamentos
$sql = "SELECT a.producto_slug, a.nombre, a.ruta_thumb, a.ruta_original, p.nombre_display, p.orden_listado
        FROM archivos a
        INNER JOIN (
            SELECT producto_slug, MIN(orden) AS min_orden, MIN(id) AS min_id
            FROM archivos
            WHERE linea = 'resinas-pegamentos' AND tipo = 'imagen' AND producto_slug IS NOT NULL AND producto_slug != ''
            GROUP BY producto_slug
        ) primero
        ON a.producto_slug = primero.producto_slug AND a.id = primero.min_id
        LEFT JOIN productos p ON p.producto_slug = a.producto_slug
        ORDER BY COALESCE(p.orden_listado, 999) ASC, a.nombre ASC";

$resultado = $conexion->query($sql);
$productos = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resinas y Pegamentos - Jhomeron</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="styleslinea2.css" />
    <link rel="stylesheet" href="stylesFooter.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* El .item-resina no se estiraba solo al ancho completo del contenedor
           (se acomodaba solo al tamaño de su contenido: título + botón), dejando
           la barra azul mucho más corta de lo que debería. Se fuerza explícitamente. */
        .lista-resinas { width: 100%; box-sizing: border-box; }
        .item-resina { width: 100%; box-sizing: border-box; }

        /* A 768px el CSS real deja el botón "VER DETALLES" con esquinas 100%
           cuadradas (border-radius:0), lo cual se ve feo. Se redondea solo
           el lado derecho, a juego con el radio del contenedor (8px). */
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
        <a href="index.html" class="regres"><img src="icons/home.svg" alt="inicio" /></a>
        <a href="lineasProducto.html" class="regres">> Productos</a>
        <p class="lin-tex">> Resinas y Pegamentos</p>
    </div>

    <div class="lnbase bases-section">
        <h2>RESINAS Y PEGAMENTOS</h2>
        <div class="lnar">
            <article>
                Nuestras resinas industriales están formuladas para brindar un alto
                rendimiento en una amplia gama de aplicaciones. Son componentes clave en
                la fabricación de pinturas, recubrimientos, adhesivos, plásticos y otros
                productos industriales.
            </article>
        </div>
    </div>

    <div class="conte-resinas" style="width:100%; box-sizing:border-box;">
        <div class="lista-resinas" style="width:100%;">
            <?php if (count($productos) === 0): ?>
                <p style="font-family:'Outfit', sans-serif; padding: 20px;">
                    Aún no hay productos con línea "resinas-pegamentos" y un producto_slug asignado.
                    Sube alguno desde el panel para verlo aparecer aquí automáticamente.
                </p>
            <?php else: foreach ($productos as $producto):
                $tituloProd = !empty($producto["nombre_display"]) ? $producto["nombre_display"] : str_replace("-", " ", $producto["producto_slug"]);
                $tituloProd = str_replace("|", " ", $tituloProd); // en la lista no aplica el salto de línea
            ?>
                <div class="item-resina" style="width:100%; box-sizing:border-box;">
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