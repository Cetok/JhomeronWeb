<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lineas de Productos</title>
  <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="styleLibro.css" />
  <link rel="stylesheet" href="stylesFooter.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaOnload" async defer></script>
  <script src="buscador.js"></script>
</head>

<body>
  <!-- Header-->
<?php require "header.php"; ?>
  <div class="arriba">
    <a href="index.php"><img src="icons/home.svg" alt="inicio" /></a>
    <p style="font-weight: 500;">> Libro de reclamaciones</p>
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
    <!-- El overlay del formulario -->
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

          <!-- reCAPTCHA correctamente implementado antes del botón ENVIAR -->
          <div class="recaptcha-container">
            <div class="g-recaptcha" data-sitekey="6Lc8jigrAAAAAGysy3S9iNB4G_NIZ9SIE6RqGIRp"></div>
          </div>

          <button type="submit">ENVIAR</button>
        </form>
      </div>
    </div>
    <!-- Formulario aquí -->
    <div class="form-reclamaciones">
      <h1>LIBRO DE RECLAMACIONES</h1>
      <form id="reclamacionesForm" method="POST" action="https://formsubmit.co/arealegal@jhomeron.com">
        <!-- Campos ocultos para FormSubmit -->
        <input type="hidden" name="_cc" value="gerencia@jhomeron.com">
        <input type="hidden" name="_autoresponse" value="Hemos recibido su reclamación. Gracias por contactarnos.">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_subject" value="Nueva reclamación recibida">
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_next" value="https://www.tamsa.jhomeron.com/graciasLibro.html">

        <div class="reclamaciones-group">
          <label for="fecha">Fecha de reclamo*</label>
          <input type="text" id="fecha" name="fecha" class="reclamaciones-fecha" readonly required>
        </div>

        <h2>1. Datos del consumidor reclamante</h2>
        <div class="reclamaciones-row">
          <div class="reclamaciones-column">
            <label for="nombres">Nombres y apellidos*</label>
            <input type="text" id="nombres" name="nombres" required>
          </div>
          <div class="reclamaciones-column">
            <label for="dni">DNI / CE*</label>
            <input type="text" id="dni" name="dni" required>
          </div>
        </div>
        <div class="reclamaciones-row">
          <div class="reclamaciones-column">
            <label for="email">Correo electrónico*</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="reclamaciones-column">
            <label for="telefono">Teléfono*</label>
            <input type="tel" id="telefono" name="telefono" required>
          </div>
        </div>
        <div class="reclamaciones-full-width">
          <label for="domicilio">Domicilio*</label>
          <input type="text" id="domicilio" name="domicilio" required>
        </div>

        <h2>2. Identificación del bien contratado</h2>
        <div class="reclamaciones-row">
          <div class="reclamaciones-column">
            <label>Bien contratado*</label>
            <div class="reclamaciones-radio-group">
              <label><input type="radio" name="bien" value="producto" required> Producto</label>
              <label><input type="radio" name="bien" value="servicio" required> Servicio</label>
            </div>
          </div>
          <div class="reclamaciones-column">
            <label for="monto">Monto reclamado (S/)*</label>
            <input type="text" id="monto" name="monto" required>
          </div>
        </div>
        <div class="reclamaciones-full-width">
          <label for="descripcion">Descripción*</label>
          <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
        </div>

        <h2>3. Detalle del reclamo y pedido del consumidor</h2>
        <div class="reclamaciones-group">
          <label>Detalle del reclamo*</label>
          <div class="reclamaciones-radio-group">
            <label><input type="radio" name="tipo_reclamo" value="reclamo" required> (1) Reclamo</label>
            <label><input type="radio" name="tipo_reclamo" value="queja" required> (2) Queja</label>
          </div>
        </div>
        <div class="reclamaciones-row">
          <div class="reclamaciones-column">
            <label for="detalle">Detalle*</label>
            <textarea id="detalle" name="detalle" rows="4" required></textarea>
          </div>
          <div class="reclamaciones-column">
            <label for="pedido">Pedido*</label>
            <textarea id="pedido" name="pedido" rows="4" required></textarea>
          </div>
        </div>

        <p class="reclamaciones-footnote"><strong>(1) Reclamo:</strong> Disconformidad relacionada a los productos o
          servicios.</p>
        <p class="reclamaciones-footnote"><strong>(2) Queja:</strong> Disconformidad no relacionada a los productos o
          servicios o malestar o descontento respecto a la atención al público.</p>
        <button type="submit" class="reclamaciones-submit-btn">ENVIAR</button>
      </form>
    </div>

    <script>
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
        // Formatear la fecha actual como DD/MM/YYYY
        const today = new Date();
        const day = String(today.getDate()).padStart(2, '0');
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Los meses van de 0 a 11
        const year = today.getFullYear();

        // Establecer la fecha actual en el campo de fecha
        const fechaInput = document.getElementById('fecha');
        fechaInput.value = `${day}/${month}/${year}`;

        // Asegurarse de que el campo no sea editable
        fechaInput.setAttribute('readonly', 'readonly');
        fechaInput.style.backgroundColor = '#f8f8f8';
        fechaInput.style.cursor = 'default';
      });

      document.addEventListener("DOMContentLoaded", function () {
        // Formatear la fecha actual como DD/MM/YYYY
        const today = new Date();
        const day = String(today.getDate()).padStart(2, '0');
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Los meses van de 0 a 11
        const year = today.getFullYear();

        // Establecer la fecha actual en el campo de fecha
        const fechaInput = document.getElementById('fecha');
        fechaInput.value = `${day}/${month}/${year}`;

        // Asegurarse de que el campo no sea editable
        fechaInput.setAttribute('readonly', 'readonly');
        fechaInput.style.backgroundColor = '#f8f8f8';
        fechaInput.style.cursor = 'default';

        // Manejar el envío del formulario
        const form = document.getElementById('reclamacionesForm');

        if (form) {
          form.addEventListener('submit', function (e) {
            // No detener el envío del formulario, pero configurar para enviar copia al usuario
            const userEmail = document.getElementById('email').value;

            if (userEmail) {
              // Agregar el correo del usuario como BCC para que reciba una copia
              const bccInput = document.createElement('input');
              bccInput.type = 'hidden';
              bccInput.name = '_bcc';
              bccInput.value = userEmail;
              form.appendChild(bccInput);
            }

            // También puedes mostrar un mensaje de confirmación
            alert('Su reclamación ha sido enviada correctamente. Recibirá una copia en su correo electrónico.');
          });
        }
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
  </div>

  <!-- Footer -->
<?php require "footer_real.php"; ?>
</body>

</html>