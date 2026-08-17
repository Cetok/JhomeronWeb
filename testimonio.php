<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Testimonios</title>
  <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="styleTesti.css" />
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
    <p>> Testimonios</p>
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
    <div class="video-gallery-container">
      <div class="video-row top-row">
        <div class="video-large">
          <video poster="imgs/portadas/testimonios-pinturas-jhomeron.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7481052206393822469" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>
        </div>
        <div class="video-small">
          <video poster="imgs/portadas/pintar-con-epoxico-bismark.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7472806028401265925" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>
        </div>
        <div class="video-small">
          <video poster="imgs/portadas/testimonios-productos-jhomeron.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7486237473865993477" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>
        </div>
      </div>

      <div class="video-row middle-row">
        <div class="video-item">
          <video poster="imgs/portadas/epoxico-laminar-jhomeron.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7476593809783065862" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>
        </div>
        <div class="video-item">
          <video poster="imgs/portadas/pintura-bicapa-jhomeron.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7476219475814075654" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>

        </div>
        <div class="video-item">
          <video poster="imgs/portadas/pinturas-jhomeron-super-gloss.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7475741719657745670" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>
        </div>
      </div>

      <h2 class="campaign-title">NUESTRAS CAMPAÑAS</h2>

      <div class="video-row campaign-row">
        <div class="video-item">
          <video poster="imgs/portadas/san-valentin-surquillo.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7471708221888105783" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>
        </div>
        <div class="video-item">
          <video poster="imgs/portadas/murales-en-rioja-patrocinio.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7475110363617299717" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>
        </div>
        <div class="video-item">
          <video poster="imgs/portadas/carnaval-de-rioja-jhomeron.png">
            <source src="https://www.tiktok.com/@pinturas_jhomeron/video/7474309809509059846" type="video/mp4" />
          </video>
          <div class="play-circle-top"></div>

        </div>
      </div>
      <!-- 
      <div class="pagination">
        <span class="page-number active">1</span>
        <span class="page-number">2</span>
        <span class="page-number">3</span>
        <span class="page-number">4</span>
        <span class="page-number">5</span>
      </div>
      -->
    </div>
    <div id="videoModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <video id="modalVideo" controls>
          <source src="" type="video/mp4" />
        </video>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const topRowVideos = document.querySelectorAll(
        ".video-large, .video-small"
      );
      const modal = document.getElementById("videoModal");
      const modalVideo = document.getElementById("modalVideo");
      const closeBtn = document.querySelector(".close");

      topRowVideos.forEach((item) => {
        const video = item.querySelector("video");
        const playCircle = item.querySelector(".play-circle-top");

        const openModal = (e) => {
          e.stopPropagation();
          modal.style.display = "block";
          modalVideo.src = video.querySelector("source").src;
          modalVideo.play();
        };

        item.addEventListener("click", openModal);
        if (playCircle) {
          playCircle.addEventListener("click", openModal);
        }
      });

      closeBtn.onclick = function () {
        modal.style.display = "none";
        modalVideo.pause();
        modalVideo.src = "";
      };

      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
          modalVideo.pause();
          modalVideo.src = "";
        }
      };
    });
    document.addEventListener("DOMContentLoaded", function () {
      const allVideoItems = document.querySelectorAll(
        ".video-large, .video-small, .video-item"
      );
      const paginationItems = document.querySelectorAll(".page-number");
      const modal = document.getElementById("videoModal");
      const modalVideo = document.getElementById("modalVideo");
      const closeBtn = document.querySelector(".close");

      // Añadir estilos al elemento head para corregir la altura del modal
      const styleEl = document.createElement('style');
      styleEl.textContent = `
    .modal-content {
      margin: 5% auto;
      padding: 20px;
      width: 70%;
      max-width: 800px;
      position: relative;
      background: transparent;
      height: auto;
    }

    #modalVideo {
      width: 100%;
      height: auto;
      min-height: 700px;
      display: block;
    }

    #tiktokEmbed {
      width: 100%;
      height: 700px;
      border: none;
      display: block;
    }

    @media screen and (max-width: 750px) {
      .modal-content {
        width: 92%;
        margin: 10% auto;
        padding: 10px;
      }
      
      #modalVideo, #tiktokEmbed {
        height: 500px;
      }
    }

    @media screen and (max-width: 500px) {
      #modalVideo, #tiktokEmbed {
        height: 580px;
      }
    }
  `;
      document.head.appendChild(styleEl);

      allVideoItems.forEach((item) => {
        const video = item.querySelector("video");
        const playButton = item.querySelector(".play-circle-top");

        const openModal = (e) => {
          e.stopPropagation();
          modal.style.display = "block";

          // Obtenemos el source URL del video
          const sourceUrl = video.querySelector("source").src;

          // Verificamos si es un enlace de TikTok
          if (sourceUrl.includes("tiktok.com")) {
            // Creamos un iframe para TikTok si no existe
            let tiktokIframe = document.getElementById("tiktokEmbed");
            if (!tiktokIframe) {
              tiktokIframe = document.createElement("iframe");
              tiktokIframe.id = "tiktokEmbed";
              tiktokIframe.allowFullscreen = true;
              tiktokIframe.frameBorder = "0";

              // Reemplazamos el video con el iframe
              modalVideo.style.display = "none";
              modal.querySelector(".modal-content").appendChild(tiktokIframe);
            } else {
              tiktokIframe.style.display = "block";
              modalVideo.style.display = "none";
            }

            // Extraemos el ID del video de TikTok
            const tiktokId = sourceUrl.split("/video/")[1].split("?")[0];
            // Configuramos el iframe con la URL de embebido de TikTok
            tiktokIframe.src = `https://www.tiktok.com/embed/v2/${tiktokId}`;
          } else {
            // Si no es TikTok, usamos el reproductor normal
            modalVideo.style.display = "block";
            modalVideo.src = sourceUrl;
            modalVideo.play();

            // Ocultamos el iframe de TikTok si existe
            const tiktokIframe = document.getElementById("tiktokEmbed");
            if (tiktokIframe) {
              tiktokIframe.style.display = "none";
            }
          }
        };

        item.addEventListener("click", openModal);
        if (playButton) {
          playButton.addEventListener("click", openModal);
        }
      });

      closeBtn.onclick = function () {
        modal.style.display = "none";
        modalVideo.pause();
        modalVideo.src = "";

        // También limpiamos el iframe de TikTok si existe
        const tiktokIframe = document.getElementById("tiktokEmbed");
        if (tiktokIframe) {
          tiktokIframe.src = "";
          tiktokIframe.style.display = "none";
        }
      };

      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
          modalVideo.pause();
          modalVideo.src = "";

          // También limpiamos el iframe de TikTok si existe
          const tiktokIframe = document.getElementById("tiktokEmbed");
          if (tiktokIframe) {
            tiktokIframe.src = "";
            tiktokIframe.style.display = "none";
          }
        }
      };

      paginationItems.forEach((item) => {
        item.addEventListener("click", () => {
          paginationItems.forEach((i) => i.classList.remove("active"));
          item.classList.add("active");
        });
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
  <!-- Footer -->
<?php require "footer_real.php"; ?>
</body>

</html>