<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Política y Privacidad</title>
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
      <a href="index.php" class="home-icon"><img src="icons/home.svg" alt="inicio" /></a>
      <p>> Política y Privacidad</p>
    </div>
    <div class="titulo-principal">
      <h1>POLÍTICA Y PRIVACIDAD</h1>
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

    <div class="texto-poli">
      <p>La Política y Privacidad de JHOMERON describe el tratamiento y la protección de los datos personales de los
        usuarios que ingresan al sitio web www.JHOMERON.com.
        La empresa se compromete a garantizar la confidencialidad y seguridad de la información proporcionada por los
        usuarios.
      </p>
      <p>
        <strong> Objetivo y Finalidad:<br></strong>
        JHOMERON valora la privacidad de sus usuarios y se compromete a proteger la información personal. Esta política
        tiene como objetivo explicar cómo se recogen, procesan y protegen los datos personales que los usuarios
        proporcionan a través del sitio web. Los datos personales son aquellos que se introducen en formularios del
        sitio web, mientras que la información pública (como registros públicos o datos accesibles a través de medios de
        comunicación) no se considera personal en este contexto.
      </p>
      <p>
        <strong>2. Recopilación de Información:<br></strong>
        La empresa informa a los usuarios que los datos que proporcionan en la sección "Contacto" del sitio web serán
        utilizados para gestionar sus consultas o comentarios. Estos datos incluyen información básica de contacto que
        los usuarios proporcionan de manera voluntaria, y son adecuados para la finalidad mencionada. Los usuarios dan
        su consentimiento al ingresar sus datos, aceptando la política de privacidad.
      </p>
      <p>
        <strong>3. Calidad y Exactitud de los Datos:<br></strong>
        Los datos recopilados son básicos, pertinentes y necesarios para las finalidades especificadas. Los usuarios
        deben garantizar que los datos proporcionados sean correctos y actuales; de lo contrario, JHOMERON procederá a
        cancelarlos. Los datos no se utilizarán para otros fines incompatibles con los indicados en la política y se
        eliminarán cuando dejen de ser necesarios.
      </p>
      <p>
        <strong>4. Tratamiento de Datos Personales y Consentimiento:<br></strong>
        Los datos proporcionados por los usuarios se almacenan en las bases de datos de JHOMERON y son tratados solo
        para cumplir con los fines establecidos. La empresa garantiza que solo el personal autorizado tendrá acceso a
        estos datos. El tratamiento de datos es legítimo y se realiza con el consentimiento de los usuarios, quienes
        pueden dar su consentimiento expreso mediante el uso de los formularios en el sitio web.
      </p>
      <p>
        <strong>5. Comunicaciones de Datos:<br></strong>
        JHOMERON asegura que no compartirá los datos personales con terceros sin el consentimiento de los usuarios,
        salvo con empresas vinculadas para la entrega de productos o la prestación de servicios. Sin embargo, los datos
        pueden ser comunicados a autoridades judiciales o policiales si así lo requiere la ley.
      </p>
      <p>
        <strong>6. Confidencialidad y Seguridad de los Datos:<br></strong>
        JHOMERON se compromete a mantener la confidencialidad de los datos personales y adoptar las medidas de seguridad
        necesarias para protegerlos de accesos no autorizados, alteraciones o pérdidas. Aunque la empresa implementa
        medidas de seguridad adecuadas, se advierte que la transmisión de información a través de Internet no es
        completamente segura y los usuarios asumen el riesgo al compartir sus datos.
      </p>
      <p>
        <strong>7. Protección de la Privacidad de Menores:<br></strong>
        JHOMERON no recopila datos de menores de 18 años. Si la empresa llega a conocer que se han recopilado datos de
        un menor sin autorización, tomará las medidas correspondientes para eliminarlos de inmediato.
      </p>
      <p>
        <strong>8. Consentimiento del Usuario:<br></strong>
        Al aceptar esta política de privacidad, los usuarios dan su consentimiento para que JHOMERON procese sus datos
        personales según los términos establecidos en el documento.
      </p>
      <p>
        <strong>9. Vigencia y Modificación de la Política:<br></strong>
        La política de privacidad fue actualizada en abril de 2025. JHOMERON se reserva el derecho de modificar esta
        política en caso de cambios en la legislación, doctrina o decisiones internas de la empresa. En caso de cambios,
        los usuarios serán informados mediante la publicación de la nueva política en el sitio web, y se recomienda que
        los usuarios consulten periódicamente esta política para mantenerse informados.
      </p>
      <p>
        Este resumen detalla los puntos clave de la política de privacidad de JHOMERON, destacando su compromiso con la
        seguridad, confidencialidad y protección de los datos personales de los usuarios, así como los derechos y
        responsabilidades relacionados con el uso de su sitio web.
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