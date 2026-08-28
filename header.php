<?php
// header.php
// Header + overlays (Asesoría, Cotiza aquí, formulario de contacto) COMPARTIDOS
// entre todas las páginas dinámicas del sitio (líneas + detalle de producto).
// Se incluye con: <?php require "header.php"; ?>

    <header>
        <div class="navbar">
            <a href="index.php">
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
                            <li><a href="lineaDisolvente.php">Thinner</a></li>
                            <li><a href="lineaFibra.php">Fibra de Vidrio</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="asesoria-movil">Asesoría</a></li>
                    <li><a href="puntoVenta.php">Puntos de venta</a></li>

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
                            <li><a href="lineaDisolvente.php">Thinner</a></li>
                            <li><a href="lineaFibra.php">Fibra de Vidrio</a></li>
                        </ul>
                    </li>
                    <li class="enca"><a id="asesoria-link">Asesoría</a></li>
                    <li class="enca"><a href="puntoVenta.php">Puntos de venta</a></li>
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

    <!-- Overlay de Asesoría (mismo diseño y contactos que el resto del sitio) -->
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
                <input type="hidden" name="_next" value="https://www.tamsa.jhomeron.com/gracias.php">
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

    <!-- Buscador del header: script compartido de verdad. Si algún día hay que
         cambiar cómo funciona la búsqueda, se edita SOLO buscador_dinamico.js
         y se actualiza automáticamente en todas las páginas que usan header.php. -->
    <script src="buscador_dinamico.js"></script>

    <style>
        /* El CSS real tiene el submenú "Líneas" con altura fija (330px) y ancho
           angosto (130px), calculados para los 9 ítems que había antes (7 líneas +
           Resinas + Insumos). Ahora hay 8 (7 + Fibra de Vidrio), así que sobraba
           espacio vacío abajo, y "Fibra de Vidrio" (más largo que las demás
           palabras) se partía en 2 líneas por el ancho angosto. */
        .submenu { height: auto !important; width: 160px !important; }
    </style>