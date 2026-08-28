<?php
// footer_real.php
// Footer COMPARTIDO (el diseño real del sitio, con <footer> real) para las páginas
// de contenido general (Nosotros, Políticas, Términos, Blog, Puntos de venta, etc).
// Distinto de footer.php (que usa el jf-footer aislado para las páginas de producto).
// Se incluye con: <?php require "footer_real.php"; ?>
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
            <!-- Nuestros Productos -->
            <div class="footer-section products">
                <h3>NUESTROS PRODUCTOS</h3>
                <ul>
                    <li><a href="lineasDecorativa.php">Línea Decorativa</a></li>
                    <li><a href="lineasAuto.php">Línea Automotriz</a></li>
                    <li><a href="lineaIndus.php">Línea Industrial</a></li>
                    <li><a href="lineaMarina.php">Línea Marina</a></li>
                    <li><a href="lineaTrafico.php">Línea Señalización</a></li>
                    <li><a href="lineaMadera.php">Línea Madera</a></li>
                    <li><a href="lineaDisolvente.php">Línea Thinner</a></li>
                    <li><a href="lineaFibra.php">Línea Fibra de Vidrio</a></li>
                </ul>
            </div>

            <!-- Atención al Cliente -->
            <div class="footer-section customer-service">
                <h3>ATENCIÓN AL CLIENTE</h3>
                <ul>
                    <li class="no-bullet">
                        <i class="fa-solid fa-phone-volume"></i>
                        <p>536-4214 | 500-8202 | 500-8203</p>
                    </li>
                    <li class="no-bullet">
                        <i class="fa-solid fa-phone-volume"></i>
                        <p>500-8205 | 500-8206 | 500-8207</p>
                    </li>
                    <li class="no-bullet">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:ventas@jhomeron.com">
                            <p>ventas@jhomeron.com</p>
                        </a>
                    </li>
                </ul>
                <div class="horario">
                    <h4>HORARIO DE ATENCIÓN</h4>
                    <ul>
                        <li>Lu - Vi | 8:00 am - 5:20 pm</li>
                        <li>Sáb | 8:00 am - 1:00 pm</li>
                    </ul>
                </div>
            </div>

            <!-- Dirección e Información Legal -->
            <div class="footer-section address">
                <h3>DIRECCIÓN</h3>
                <!-- Dirección ahora es linkeable con ícono de ubicación -->
                <a href="https://www.google.com/maps/search/?api=1&query=Calle+Santa+Ana+Mz+F+Lote+44+Chacra+Cerro+Chillón+Comas+Lima+Perú"
                    target="_blank" class="address-link">
                    <i class="fas fa-map-marker-alt"></i>
                    <p class="address-text">Calle Santa Ana Mz. "F" Lote 44, Fnd. Chacra Cerro - Chillón<br>Comas - Lima
                        - Perú
                    </p>
                </a>

                <div class="legal">
                    <h3>INFORMACIÓN LEGAL</h3>
                    <ul>
                        <li><a href="politicaPriva.php">Políticas de privacidad</a></li>
                        <li><a href="terminosCondi.php">Términos y condiciones</a></li>
                        <li><a href="libroReclama.php">Libro de Reclamaciones</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>©2025, Industrias Jhomeron S.A. - RUC: 20601777844</p>
        </div>
    </footer>