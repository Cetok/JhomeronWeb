<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Términos y Condiciones</title>
    <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="stylePolitica.css" />
    <link rel="stylesheet" href="stylesFooter.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaOnload" async defer></script>
    <script src="buscador.js"></script>
</head>

<body>
    <!-- Header-->
<?php require "header.php"; ?>
    <div class="cabecera-azul">
        <div class="navegacion">
            <a href="index.html" class="home-icon"><img src="icons/home.svg" alt="inicio" /></a>
            <p>> Términos y Condiciones</p>
        </div>
        <div class="titulo-principal">
            <h1>TÉRMINOS Y CONDICIONES</h1>
        </div>
    </div>
    <div class="main-content">
        <!--Asesoria-->
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
        <!--Cotiza-->
        <div id="cotiza-modal" class="cotiza-overlay hidden">
            <div>
                <button id="close-cotiza" class="close-button">&times;</button>
                <div class="whatsapp-2">
                    <a href="https://wa.me/957720068" class="contact-btn whatsapp2-btn" target="_blank"
                        rel="noopener noreferrer">
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
                    <a href="#" id="open-form-btn" class="contact-btn email-btn">
                        <i class="fas fa-envelope"></i>
                        <span>¡Enviar un correo!</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- El overlay del formulario -->
        <div id="formOverlay" class="form-overlay hidden">
            <div class="form-container">
                <button id="close-form" class="close-button">&times;</button>
                <h2>¿En qué podemos ayudarte?</h2>
                <form id="contactForm">
                    <div class="form-row">
                        <input type="text" placeholder="Nombres y apellidos*" required />
                        <input type="tel" placeholder="Celular*" required />
                    </div>
                    <div class="form-row">
                        <input type="text" placeholder="Empresa*" required />
                        <input type="text" placeholder="Ciudad*" required />
                    </div>
                    <input type="email" placeholder="Correo" required />
                    <textarea placeholder="Escribe mensaje*" required></textarea>
                    <div class="g-recaptcha" data-sitekey="6Ldp6FUqAAAAAM-D4Ve3JnlxUKnt__UPSmb6Cbjr"></div>
                    <button type="submit">ENVIAR</button>
                </form>
            </div>
        </div>

        <div class="texto-poli">
            <p>
                El uso del sitio web de JHOMERON Perú está sujeto a los "Términos y Condiciones"
                establecidos según la legislación peruana. Estos términos rigen todas las visitas, contratos y
                transacciones
                realizadas en el sitio, así como los efectos legales derivados de los mismos. Para poder realizar
                compras en la página web de JHOMERON,
                los usuarios deben aceptar estos términos, los cuales se consideran aceptados simplemente al registrarse
                o realizar una compra. Además,
                JHOMERON se reserva el derecho de modificar o actualizar los "Términos y Condiciones" en cualquier
                momento, sin previo aviso.
            </p>
            <p>
                La empresa se compromete a realizar su mejor esfuerzo para garantizar la disponibilidad de los productos
                y evitar errores en la transmisión
                de información. Sin embargo, debido a las características inherentes de internet, no se puede garantizar
                que siempre se logren estos objetivos.
                Asimismo, el acceso a los servicios del sitio web puede verse interrumpido temporalmente por trabajos de
                reparación, mantenimiento o la
                incorporación de nuevos productos, aunque JHOMERON procurará limitar la frecuencia y duración de tales
                suspensiones.
            </p>
            <p>
                Los Términos y Condiciones de JHOMERON establecen lo siguiente:<br><br>
                <strong>1. Derechos del Usuario</strong> <br>El usuario tiene los derechos reconocidos por la
                legislación peruana de
                protección al consumidor,
                así como los derechos adicionales proporcionados por estos términos. Entre ellos, se incluye el derecho
                a la información,
                rectificación y cancelación de sus datos personales en la base de datos de la empresa. La simple visita
                al sitio web no implica
                ninguna obligación para el consumidor, a menos que acepte explícitamente las condiciones ofrecidas por
                JHOMERON al realizar una
                compra o registrar sus datos.
            </p>
            <p>
                <strong>2. Procedimiento para Hacer Uso del Sitio</strong> <br>En el momento de realizar una compra o
                contratación de
                productos en el sitio, JHOMERON
                se compromete a informar claramente los pasos que el usuario debe seguir para completar el proceso de
                adquisición. Esto garantizará
                que el usuario pueda entender cómo proceder correctamente con la compra.
            </p>
            <p>
                <strong>3. Medios de Pago</strong><br> Los productos disponibles en la página web de JHOMERON pueden ser
                pagados a través de
                los siguientes medios:
                Yape o depósito en cuenta, a menos que se indique un medio de pago diferente en ofertas especiales o
                productos específicos.
                Esto proporciona flexibilidad al consumidor para elegir el método que le sea más conveniente.
            </p>
            <p>
                <strong>4. Formación del Consentimiento en los Contratos</strong> <br>Cuando un usuario desea realizar
                una compra en el
                sitio, este envía una "Solicitud de Compra"
                mediante un proceso electrónico, ya sea a través de la web, WhatsApp o teléfono. Esta solicitud está
                sujeta a la validación por parte de
                JHOMERON, lo cual incluye confirmar el precio del producto, verificar la validez del medio de pago y la
                disponibilidad del producto en stock.
                Si hay alguna discrepancia en el precio, JHOMERON se pondrá en contacto con el usuario en un plazo de 3
                días hábiles para informar sobre el
                error y determinar si la compra se realizará con el precio correcto o si se cancelará.
            </p>
            <p>
                Además, para completar el proceso de compra, JHOMERON deberá validar los datos del usuario y verificar
                que el producto esté disponible.
                Solo después de esta validación se emitirá la boleta o factura de venta y se procederá al despacho del
                pedido. Si la validación no es exitosa
                (por ejemplo, si los datos del cliente no coinciden con los de la base de datos de JHOMERON o si hay un
                error sistémico), la empresa se reserva
                el derecho de anular la compra. Además, en caso de fraude o de problemas con los datos proporcionados,
                JHOMERON podrá dejar sin efecto la compra
                si no se contacta con el usuario dentro de las 48 horas hábiles posteriores a la solicitud.
            </p>
            <p>
                <strong>5. Despacho de los Productos<br></strong>
                Los productos adquiridos en el sitio web de JHOMERON se enviarán conforme a las condiciones de despacho
                y entrega seleccionadas por el usuario
                al momento de realizar la compra. Si los productos provienen de diferentes almacenes, serán despachados
                de manera independiente, siguiendo las
                opciones disponibles en el sitio. El usuario es responsable de proporcionar información precisa y
                completa sobre el lugar de envío, ya que
                cualquier error en esta información será responsabilidad exclusiva del cliente. Los plazos de entrega
                empiezan a contarse desde que JHOMERON
                valida la solicitud de compra, es decir, desde la confirmación del pago y la disponibilidad del
                producto, y se consideran días hábiles para el
                cumplimiento de dicho plazo.
            </p>
            <p>
                Si antes de realizar el envío se descubre que un producto no puede ser entregado, JHOMERON podrá ofrecer
                un producto equivalente en calidad,
                precio y función. El cliente no está obligado a aceptar el producto de sustitución; si decide no
                aceptarlo, se procederá con la devolución
                total del monto pagado.
            </p>
            <p>
                El estado de un pedido se divide en varias fases:<br>
                • Pago Pendiente: El cliente no ha realizado el pago.<br>
                • Pago Confirmado: El pago fue realizado y JHOMERON está verificando la información de la orden y el
                medio de pago.<br>
                • Alistando Pedido: JHOMERON ha validado los datos del pedido y está procesando el mismo (picking y
                packing).<br>
                • Pedido Listo: El pedido está siendo enviado o listo para ser recogido en tienda.<br>
                • Entregado: El cliente ha recibido o recogido su pedido.
            </p>
            <p>
                Los plazos de entrega son aproximados y no deben considerarse como fechas límite estrictas. Si un pedido
                excede el plazo estimado, esto no da derecho
                a compensación, aunque el cliente puede contactar a JHOMERON para obtener información adicional sobre el
                estado de su pedido. Al realizar un pedido,
                el cliente acepta estos Términos y Condiciones.
            </p>
            <p>
                <strong>6. Vigencia, Validez y Stock de las Ofertas<br></strong>
                Los precios y ofertas de los productos publicados en el sitio web de JHOMERON son válidos únicamente
                mientras estén disponibles en la página.
                JHOMERON tiene el derecho de modificar cualquier información publicada en el sitio, incluyendo
                productos, precios, existencias y condiciones,
                sin previo aviso, hasta recibir una solicitud de compra y confirmar la disponibilidad del stock. Las
                ofertas se cumplirán siempre que haya
                stock disponible al momento de la verificación del pedido. La empresa no se compromete a cumplir con
                ofertas basadas en errores de
                transcripción o imágenes, y puede haber ligeras variaciones en los colores o características de los
                productos debido a diferentes tecnologías
                de exhibición o a cambios realizados por los proveedores.
            </p>
            <p>
                <strong>7. Consentimiento<br></strong>
                Al aceptar estos Términos y Condiciones, el usuario autoriza a JHOMERON a tratar sus datos personales
                para las finalidades descritas
                en este documento.
            </p>
            <p>
                <strong>8. Vigencia y Modificación de los Términos y Condiciones<br></strong>
                Estos Términos y Condiciones fueron actualizados en abril de 2025. JHOMERON se reserva el derecho de
                modificarlos si hay cambios en la legislación vigente,
                en la interpretación legal o por decisiones internas de la empresa. Si se realiza alguna modificación,
                el nuevo texto se publicará en el sitio
                web. Se recomienda a los usuarios revisar periódicamente esta sección para estar al tanto de cualquier
                actualización.
            </p>

        </div>


    </div>

    <!-- Footer -->
<?php require "footer_real.php"; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Manejar el trigger del submenú de cotización
            const triggerCotiza = document.querySelector(
                ".trigger-submenu-cotiza"
            );
            if (triggerCotiza) {
                triggerCotiza.addEventListener("click", function (e) {
                    e.preventDefault();
                    const submenuCotiza = this.nextElementSibling;
                    submenuCotiza.classList.toggle("activo");
                    this.classList.toggle("active");
                });
            }

            // Manejar el botón de email en móvil
            const cotizaEmailMovil = document.querySelector(
                ".cotiza-email-movil"
            );
            if (cotizaEmailMovil) {
                cotizaEmailMovil.addEventListener("click", function (e) {
                    e.preventDefault();
                    const formOverlay = document.getElementById("formOverlay");
                    const menuMovil = document.querySelector(
                        ".menu-movil-contenedor"
                    );

                    if (formOverlay && menuMovil) {
                        formOverlay.classList.remove("hidden");
                        menuMovil.classList.remove("activo");
                    }
                });
            }
        });
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.querySelector(".menu-hamburguesa");
            const menuMovil = document.querySelector(".menu-movil-contenedor");
            const submenuTriggers = document.querySelectorAll(".trigger-submenu");
            const asesoriaMobile = document.querySelector(".asesoria-movil");
            const asesoriaOverlay = document.getElementById("asesoria-overlay");

            if (asesoriaMobile && asesoriaOverlay) {
                asesoriaMobile.addEventListener("click", function (e) {
                    e.preventDefault();
                    asesoriaOverlay.classList.remove("hidden");
                    menuMovil.classList.remove("activo");
                });
            }

            // Toggle menú móvil
            if (menuBtn && menuMovil) {
                menuBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    menuMovil.classList.toggle("activo");
                });
            }

            // Toggle submenús y rotación de flecha
            submenuTriggers.forEach((trigger) => {
                trigger.addEventListener("click", function (e) {
                    e.preventDefault();
                    const submenu = this.nextElementSibling;
                    submenu.classList.toggle("activo");
                    this.classList.toggle("active"); // Para la rotación de la flecha
                });
            });

            // Cerrar menú al hacer click fuera
            document.addEventListener("click", function (e) {
                if (!menuMovil.contains(e.target) && !menuBtn.contains(e.target)) {
                    menuMovil.classList.remove("activo");
                    submenuTriggers.forEach((trigger) => {
                        trigger.classList.remove("active");
                        trigger.nextElementSibling.classList.remove("activo");
                    });
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const asesoriaOverlay = document.getElementById("asesoria-overlay");
            const asesoriaLink = document.getElementById("asesoria-link");
            const closeAsesoria = document.getElementById("close-asesoria");

            asesoriaLink.addEventListener("click", function (e) {
                e.preventDefault();
                asesoriaOverlay.classList.remove("hidden");
            });

            closeAsesoria.addEventListener("click", function () {
                asesoriaOverlay.classList.add("hidden");
            });

            // Cerrar el overlay al hacer clic fuera de él
            asesoriaOverlay.addEventListener("click", function (e) {
                if (e.target === asesoriaOverlay) {
                    asesoriaOverlay.classList.add("hidden");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const cotizaOverlay = document.getElementById("cotiza-modal");
            const cotizaBtn = document.getElementById("cotiza-aqui");
            const closeCotiza = document.getElementById("close-cotiza");

            cotizaBtn.addEventListener("click", function (e) {
                e.preventDefault();
                cotizaOverlay.classList.remove("hidden");
            });

            closeCotiza.addEventListener("click", function () {
                cotizaOverlay.classList.add("hidden");
            });

            // Close the overlay when clicking outside of it
            cotizaOverlay.addEventListener("click", function (e) {
                if (e.target === cotizaOverlay) {
                    cotizaOverlay.classList.add("hidden");
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const openFormBtn = document.getElementById("open-form-btn");
            const formOverlay = document.getElementById("formOverlay");
            const closeForm = document.getElementById("close-form");
            const cotizaModal = document.getElementById("cotiza-modal");

            openFormBtn.addEventListener("click", function (e) {
                e.preventDefault();
                cotizaModal.classList.add("hidden");
                formOverlay.classList.remove("hidden");
            });

            closeForm.addEventListener("click", function () {
                formOverlay.classList.add("hidden");
            });

            function onSubmit(token) {
                document.getElementById("demo-form").submit();
            }

            // Cerrar el formulario al hacer clic fuera de él
            formOverlay.addEventListener("click", function (e) {
                if (e.target === formOverlay) {
                    formOverlay.classList.add("hidden");
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const contactForm = document.getElementById("contactForm");

            if (contactForm) {
                // Añadir evento para depurar la verificación
                contactForm.addEventListener("submit", function (e) {
                    e.preventDefault();

                    // Feedback visual de la verificación
                    const submitButton = contactForm.querySelector('button[type="submit"]');
                    submitButton.innerHTML = "Verificando...";
                    submitButton.disabled = true;

                    // Verificar recaptcha
                    const recaptchaResponse = grecaptcha.getResponse();

                    console.log("Respuesta reCAPTCHA:", recaptchaResponse ? "Obtenida" : "Vacía");

                    if (!recaptchaResponse.length) {
                        // Crear mensaje de error
                        showMessage("error", "Por favor, verifica que no eres un robot");
                        submitButton.innerHTML = "ENVIAR";
                        submitButton.disabled = false;
                        return;
                    }

                    // Si el captcha es válido, mostrar que se está enviando
                    showMessage("success", "Verificación correcta, enviando formulario...");

                    // Enviar el formulario después de una verificación exitosa
                    setTimeout(() => {
                        contactForm.submit();
                    }, 1000);
                });
            }

            // Función para mostrar mensajes
            function showMessage(type, message) {
                // Verificar si ya existe un mensaje y eliminarlo
                const existingMessage = document.querySelector(".form-message");
                if (existingMessage) {
                    existingMessage.remove();
                }

                // Crear el elemento de mensaje
                const messageElement = document.createElement("div");
                messageElement.classList.add("form-message");
                messageElement.classList.add(type === "success" ? "form-message-success" : "form-message-error");
                messageElement.textContent = message;

                // Estilos para el mensaje
                messageElement.style.padding = "10px 15px";
                messageElement.style.marginTop = "15px";
                messageElement.style.borderRadius = "5px";
                messageElement.style.fontFamily = "'Outfit', sans-serif";
                messageElement.style.fontSize = "14px";
                messageElement.style.fontWeight = "500";

                if (type === "success") {
                    messageElement.style.backgroundColor = "#d4edda";
                    messageElement.style.color = "#155724";
                    messageElement.style.border = "1px solid #c3e6cb";
                } else {
                    messageElement.style.backgroundColor = "#f8d7da";
                    messageElement.style.color = "#721c24";
                    messageElement.style.border = "1px solid #f5c6cb";
                }

                // Insertar el mensaje después del botón de envío
                const submitButton = contactForm.querySelector('button[type="submit"]');
                submitButton.parentNode.insertBefore(messageElement, submitButton.nextSibling);
            }

            // Callback para cuando el reCAPTCHA se carga correctamente
            window.recaptchaLoaded = function () {
                console.log("reCAPTCHA cargado correctamente");
            };
        });
    </script>
</body>

</html>