<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jhomeron</title>
  <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaOnload" async defer></script>
</head>

<body>

  <div id="loading-screen">
    <video id="loading-video" autoplay muted playsinline preload="auto" webkit-playsinline>
      <source src="imgs/pantallacar.mp4" type="video/mp4" />
      Tu navegador no soporta el elemento de video.
    </video>
    <div class="loading-fallback"></div>
    <!-- Spinner removido -->
    <div class="loading-spinner">
    </div>
  </div>

  <!-- Header-->
<?php require "header.php"; ?>
  <!-- Contenedor-->
  <div class="angry-grid">
    <a href="lineasProducto.php" id="item-0" data-gif="icons/gif_hover_grande_1.gif">
      <video autoplay loop muted playsinline>
        <source src="imgs/inicio/producto.mp4" type="video/mp4" />
        Tu navegador no soporta el elemento de video.
      </video>
      <div class="overlay">
        <button class="btn">NUESTROS</button>
        <h3 class="text">PRODUCTOS</h3>
        <p class="text">Elige el color deseado<br />y empieza a pintar.</p>
      </div>
    </a>
    <a href="simulador.php" id="item-1" data-gif="icons/gif_hover_grande_2.gif">
      <div class="overlay">
        <button class="btn">PINTA CON EL</button>
        <h3 class="text">SIMULADOR</h3>
        <p class="text">
          Descubre el color<br />
          ideal que necesitas.
        </p>
      </div>
    </a>
    <a href="blog_pintor.php" id="item-2" data-gif="icons/gif_hover_largo.gif">
      <div class="overlay">
        <button class="btn">EL BLOG</button>
        <h3 class="text">DEL PINTOR</h3>
        <p class="text">
          Encuentra tips, tendencias, recomendaciones y noticias.
        </p>
      </div>
    </a>
    <a href="nosotros.php" id="item-3" data-gif="icons/gif_hover_grande_3.gif">
      <div class="overlay">
        <button class="btn">ACERCA DE</button>
        <h3 class="text">NOSOTROS</h3>
        <p class="text">
          Descubre nuestra historia<br />
          y experiencia en el sector.
        </p>
      </div>
    </a>
    <a href="testimonio.php" id="item-4" data-gif="icons/gif_hover_grande_4.gif">
      <div class="overlay">
        <button class="btn">CAMPAÑAS</button>
        <h3 class="text">TESTIMONIOS</h3>
        <p class="text">
          Un espacio donde hablan nuestros clientes y nuestras acciones.
        </p>
      </div>
    </a>
  </div>
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

        <!-- reCAPTCHA correctamente implementado antes del botón ENVIAR -->
        <div class="recaptcha-container">
          <div class="g-recaptcha" data-sitekey="6Lc8jigrAAAAAGysy3S9iNB4G_NIZ9SIE6RqGIRp"></div>
        </div>

        <button type="submit">ENVIAR</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Variable para controlar si ya se mostró la pantalla de carga
      let loadingScreenShown = false;

      // Detectar si es dispositivo móvil
      const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
      const isIOS = /iPhone|iPad|iPod/i.test(navigator.userAgent);

      // -------- Funciones de la pantalla de carga --------
      function playLoadingVideo() {
        const video = document.getElementById("loading-video");
        const loadingScreen = document.getElementById("loading-screen");

        if (video && !loadingScreenShown) {
          video.currentTime = 1.0;
          video.playbackRate = 7.0;

          // Configuración especial para móviles
          if (isMobile) {
            video.muted = true;
            video.playsInline = true;
            video.autoplay = true;

            // Para iOS específicamente
            if (isIOS) {
              video.style.pointerEvents = 'none';
              video.style.userSelect = 'none';
              video.style.webkitUserSelect = 'none';

              // Forzar reproducción en iOS
              const playPromise = video.play();

              if (playPromise !== undefined) {
                playPromise.then(() => {
                  // Video se reprodujo exitosamente
                  loadingScreenShown = true;
                }).catch(error => {
                  console.log("Error al reproducir video:", error);
                  useStaticBackground();
                });
              }
            } else {
              video.play();
              loadingScreenShown = true;
            }
          } else {
            video.play();
            loadingScreenShown = true;
          }
        }
      }

      function useStaticBackground() {
        const loadingScreen = document.getElementById("loading-screen");
        const video = document.getElementById("loading-video");
        const fallback = document.querySelector(".loading-fallback");

        if (video) {
          video.style.display = 'none';
        }

        if (fallback) {
          fallback.style.display = 'block';
        }

        // Ocultar la pantalla de carga después de un tiempo fijo
        setTimeout(hideLoadingScreen, 2000);
      }

      function showLoadingScreen() {
        if (!loadingScreenShown) {
          const loadingScreen = document.getElementById("loading-screen");
          if (loadingScreen) {
            loadingScreen.style.display = "flex";
            playLoadingVideo();
          }
        }
      }

      function hideLoadingScreen() {
        const loadingScreen = document.getElementById("loading-screen");
        if (loadingScreen) {
          loadingScreen.style.display = "none";
          loadingScreenShown = true;
        }
      }

      // Mostrar pantalla de carga solo una vez al inicio
      if (!loadingScreenShown) {
        showLoadingScreen();
      }

      // -------- Manejo del video de carga --------
      const loadingVideo = document.getElementById("loading-video");
      if (loadingVideo) {
        loadingVideo.playbackRate = 7.0;

        // Tiempo máximo de carga para móviles
        const maxLoadTime = isMobile ? 3000 : 5000;

        // Configurar timeout de seguridad
        const loadingTimeout = setTimeout(() => {
          hideLoadingScreen();
        }, maxLoadTime);

        loadingVideo.addEventListener("ended", () => {
          clearTimeout(loadingTimeout);
          hideLoadingScreen();
        });

        loadingVideo.addEventListener("error", () => {
          console.error("Error en la reproducción del video");
          clearTimeout(loadingTimeout);
          useStaticBackground();
        });

        // Eventos específicos para móviles
        if (isMobile) {
          loadingVideo.addEventListener("suspend", () => {
            console.log("Video suspendido");
          });

          loadingVideo.addEventListener("abort", () => {
            console.log("Video abortado");
            useStaticBackground();
          });

          loadingVideo.addEventListener("stalled", () => {
            console.log("Video estancado");
            setTimeout(() => {
              if (loadingVideo.readyState < 3) {
                useStaticBackground();
              }
            }, 1000);
          });
        }
      }

      // -------- Manejo de la navegación --------
      document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", (e) => {
          if (
            !e.target.classList.contains("no-loading") &&
            !e.target.closest(".angry-grid") &&
            link.href &&
            !link.href.includes("#") &&
            !link.href.includes("tel:") &&
            !link.href.includes("mailto:") &&
            !link.href.includes("wa.me")
          ) {
            e.preventDefault();
            showLoadingScreen();
            setTimeout(() => {
              window.location = link.href;
            }, 500);
          }
        });
      });

      // -------- Manejo del angry-grid y GIFs --------
      const gridItems = document.querySelectorAll(".angry-grid a");
      gridItems.forEach((item, index) => {
        const gifUrl = item.getAttribute("data-gif");
        item.style.setProperty(`--item-${index}-gif`, `url('${gifUrl}')`);

        item.addEventListener("mouseenter", function () {
          this.classList.add("gif-active");
        });

        item.addEventListener("mouseleave", function () {
          this.classList.remove("gif-active");
        });

        item.addEventListener("click", function (e) {
          e.preventDefault();
          const href = this.getAttribute("href");
          if (href) {
            showLoadingScreen();
            setTimeout(() => {
              window.location.href = href;
            }, 500);
          }
        });
      });

      // -------- Manejo del overlay de asesoría --------
      const asesoriaOverlay = document.getElementById("asesoria-overlay");
      const asesoriaLink = document.getElementById("asesoria-link");
      const closeAsesoria = document.getElementById("close-asesoria");

      if (asesoriaLink && asesoriaOverlay && closeAsesoria) {
        asesoriaLink.addEventListener("click", function (e) {
          e.preventDefault();
          asesoriaOverlay.classList.remove("hidden");
        });

        closeAsesoria.addEventListener("click", function () {
          asesoriaOverlay.classList.add("hidden");
        });

        asesoriaOverlay.addEventListener("click", function (e) {
          if (e.target === asesoriaOverlay) {
            asesoriaOverlay.classList.add("hidden");
          }
        });
      }

      // -------- Manejo del overlay de cotización --------
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
          if (e.target === cotizaOverlay) {
            cotizaOverlay.classList.add("hidden");
          }
        });
      }

      // -------- Manejo del formulario --------
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
          if (e.target === formOverlay) {
            formOverlay.classList.add("hidden");
          }
        });
      }
    });

    // Manejar navegación hacia atrás
    window.addEventListener("popstate", function () {
      const loadingScreen = document.getElementById("loading-screen");
      if (loadingScreen) {
        loadingScreen.style.display = "none";
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
      // Manejar el trigger del submenú de cotización
      const triggerCotiza = document.querySelector(".trigger-submenu-cotiza");

      if (triggerCotiza) {
        triggerCotiza.addEventListener("click", function (e) {
          e.preventDefault();
          e.stopPropagation(); // Evitar que el clic se propague al document

          // Obtener el submenú asociado a este trigger
          const submenuCotiza = this.nextElementSibling;

          // Toggle de la clase activo para mostrar/ocultar
          if (submenuCotiza) {
            submenuCotiza.classList.toggle("activo");
            this.classList.toggle("active"); // Para la rotación de la flecha
          }
        });
      }

      // Manejar el botón de email en móvil para que abra el formulario
      const cotizaEmailMovil = document.querySelector(".cotiza-email-movil");

      if (cotizaEmailMovil) {
        cotizaEmailMovil.addEventListener("click", function (e) {
          e.preventDefault();

          const formOverlay = document.getElementById("formOverlay");
          const menuMovil = document.querySelector(".menu-movil-contenedor");

          if (formOverlay && menuMovil) {
            formOverlay.classList.remove("hidden");
            menuMovil.classList.remove("activo");
          }
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
    </body>

</html>