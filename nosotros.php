<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nosotros</title>
  <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="styleNosotros.css" />
  <link rel="stylesheet" href="stylesFooter.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaOnload" async defer></script>
  <script src="buscador.js"></script>
</head>

<body>
  <!-- Header-->
<?php require "header.php"; ?>
  <div class="arriba">
    <a href="index.html"><img src="icons/home.svg" alt="inicio" /></a>
    <p>> Acerca de nosotros</p>
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

    <!-- container -->
    <div class="nosotros-container">
      <div class="cards-container">
        <div class="column">
          <div class="card card-large" onclick="flipCard(this)" style="height: 400px; width: 598px">
            <div class="card-inner">
              <div class="card-front">
                <img src="imgs/nosotros_img/quien_somos.png" alt="¿Quiénes somos?" />
                <div class="card-content">
                  <h2 class="card-title1">¿QUIÉNES SOMOS?</h2>
                </div>
              </div>
              <div class="card-back">
                <p class="back-content1 texto-largo">
                  Nuestra empresa fue fundada por tres hermanos en 1994 originarios del distrito de San Juan de Chacña,
                  provincia de Aymaraes, departamento de
                  Apurímac bajo el nombre de "Fábrica de Pinturas TAM S.A.". Tras más de 30 años de trayectoria, nos
                  hemos transformado en Industrias Jhomeron
                  S.A., consolidándonos como líderes en la fabricación de pinturas automotrices, industriales,
                  decorativas y de señalización vial, además de la
                  comercialización de una amplia gama de insumos químicos.
                </p>

                <!-- Texto corto para móviles -->
                <p class="back-content1 texto-corto">
                  Fundada en 1994 por tres hermanos de San Juan de Chacña, Apurímac. Con más de 30 años de experiencia,
                  somos líderes en fabricación de pinturas e insumos químicos de alta calidad, comprometidos con la
                  innovación y las necesidades del mercado.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="column column-right">
          <div class="row">
            <div class="card" onclick="flipCard(this)" style="width: 299px; height: 220px">
              <div class="card-inner">
                <div class="card-front">
                  <img src="imgs/nosotros_img/mision.png" alt="Misión" />
                  <div class="card-content">
                    <h2 class="card-title">MISIÓN</h2>
                  </div>
                </div>
                <div class="card-back">
                  <p class="back-content">
                    Desarrollar, fabricar y comercializar pinturas e insumos químicos de alta calidad, 
                    brindando soluciones innovadores y sostenibles que transformen espacios y 
                    contribuyan al desarrollo del pais. Trabajamos con compromiso, tecnología 
                    y cercanía a nuestros clientes, manteniendo viva nuestra tradición familiar.
                  </p>
                </div>
              </div>
            </div>
            <div class="card" onclick="flipCard(this)" style="width: 299px; height: 220px">
              <div class="card-inner">
                <div class="card-front">
                  <img src="imgs/nosotros_img/vision.png" alt="Visión" />
                  <div class="card-content">
                    <h2 class="card-title">VISIÓN</h2>
                  </div>
                </div>
                <div class="card-back">
                  <p class="back-content">
                  Ser reconocidos a nivel nacional como referentes en la industria de pinturas,
                  distinguiéndonos por nuestra innovación, calidad, eficiencia automatizada y 
                  compromiso con la mejora continua, mientras transformamos cada  espacio con 
                  color, pasión y confianza.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="card" onclick="flipCard(this)" style="width: 608px; height: 167px">
              <div class="card-inner">
                <div class="card-front">
                  <img src="imgs/nosotros_img/valores-pinturas-jhomeron-peru.png" alt="Valores" />
                  <div class="card-content">
                    <h2 class="card-title">VALORES</h2>
                  </div>
                </div>
                <div class="card-back">
                  <div class="valores-content">
                    <ul class="valores-list">
                      <li>Liderazgo</li>
                      <li>Eficiencia</li>
                      <li>Integridad</li>
                    </ul>
                    <ul class="valores-list">
                      <li>Calidad</li>
                      <li>Innovación</li>
                      <li>Responsabilidad social <br>y sostenible con el<br> medio ambiente</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="stats">
        <div class="stat-item">
          <div class="stat-icon">
            <img src="icons/Nosotros-icons/clientes.svg" alt="Clientes" />
          </div>
          <div class="stat-title">+ 1000 CLIENTES<br />SATISFECHOS</div>
        </div>
        <div class="stat-item">
          <div class="stat-icon">
            <img src="icons/Nosotros-icons/puntos_ventas.svg" alt="Puntos de Venta" />
          </div>
          <div class="stat-title">+ 100 PUNTOS<br />DE VENTA</div>
        </div>
        <div class="stat-item">
          <div class="stat-icon">
            <img src="icons/Nosotros-icons/productos.svg" alt="Productos" />
          </div>
          <div class="stat-title">+200 PRODUCTOS<br />DE CALIDAD</div>
        </div>
        <div class="stat-item">
          <div class="stat-icon">
            <img src="icons/Nosotros-icons/en_15_regiones.svg" alt="Regiones" />
          </div>
          <div class="stat-title">EN +15 REGIONES<br />DEL PERÚ</div>
        </div>
      </div>
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
        let currentFlippedCard = null;

        function flipCard(card) {
          // Si la tarjeta clickeada ya está volteada, solo la volteamos de vuelta
          if (card === currentFlippedCard) {
            card.classList.toggle("flipped");
            currentFlippedCard = null;
            return;
          }

          // Si hay una tarjeta volteada actualmente, la volteamos de vuelta
          if (currentFlippedCard) {
            currentFlippedCard.classList.remove("flipped");
          }

          // Volteamos la nueva tarjeta
          card.classList.add("flipped");
          currentFlippedCard = card;
        }

        // Añadimos event listeners a todas las tarjetas
        const cards = document.querySelectorAll(".card");
        cards.forEach((card) => {
          card.addEventListener("click", function () {
            flipCard(this);
          });
        });

        // Cerrar tarjeta al tocar fuera de ella (opcional para móvil)
        document.addEventListener("click", function (e) {
          if (!e.target.closest(".card") && currentFlippedCard) {
            currentFlippedCard.classList.remove("flipped");
            currentFlippedCard = null;
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
  </div>

  <!-- Footer -->
<?php require "footer_real.php"; ?>
</body>

</html>