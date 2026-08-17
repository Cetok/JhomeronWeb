<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inspírate y pinta</title>
  <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="stylesInspirate.css" />
  <link rel="stylesheet" href="stylesFooter.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />

</head>

<body>
  <!-- Header-->
<?php require "header.php"; ?>
  <div class="breadcrumb">
    <a href="index.php"><img src="icons/home.svg" alt="inicio" /></a>
    <a href="blog_pintor.php">> Blog del Pintor</a>
    <p>> <span id="product-name">Inspirate y Pinta</span></p>
  </div>
  <div class="main-content">
    <h1>¡INSPÍRATE Y PINTA!</h1>
    <div class="grid-container">
      <a href="simulador.php" class="grid-item">
        <img src="imgs/inspirate/tendencia-de-color-fachada-de-casa.jpg" alt="Fachada" />
        <div class="label-container">
          <button class="label">FACHADA</button>
        </div>
      </a>
      <a href="simulador.php" class="grid-item">
        <img src="imgs/inspirate/tendencia-de-color-sala.jpg" alt="Sala" />
        <div class="label-container">
          <button class="label">SALA</button>
        </div>
      </a>
      <a href="simulador.php" class="grid-item">
        <img src="imgs/inspirate/tendencia-de-color-dormitorio.jpg" alt="Dormitorio" />
        <div class="label-container">
          <button class="label">DORMITORIO</button>
        </div>
      </a>
      <a href="simulador.php" class="grid-item">
        <img src="imgs/inspirate/tendencia-de-color-comedor.jpg" alt="Comedor" />
        <div class="label-container">
          <button class="label">COMEDOR</button>
        </div>
      </a>
      <a href="simulador.php" class="grid-item">
        <img src="imgs/inspirate/tendencia-de-color-cocina.jpg" alt="Cocina" />
        <div class="label-container">
          <button class="label">COCINA</button>
        </div>
      </a>
      <a href="simulador.php" class="grid-item">
        <img src="imgs/inspirate/tendencia-de-color-bano.jpg" alt="Baño" />
        <div class="label-container">
          <button class="label">BAÑO</button>
        </div>
      </a>
    </div>
    <!-- Ventana -->
    <div id="productModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <img id="modalMainImage" src="imgs/lineas_produc/LÍNEA_DECORATIVA--1.jpg" alt="Producto principal"
          class="main-image">
        <div class="product-details">
          <div class="color-selector">
            <div class="color-options">
              <button class="color-btn" style="background-color: gray;"></button>
              <button class="color-btn" style="background-color: #333;"></button>
              <button class="color-btn" style="background-color: #666;"></button>
            </div>
            <img src="icons/flechita.png" alt="Flecha" class="color-arrow">
          </div>
          <div class="product-info">
            <img id="modalProductImage" src="imgs/decorativo/latex/latex_satinado.png" alt="Producto específico"
              class="product-image">
            <button id="viewProductBtn" onclick="window.location.href='pinturas.html?product=latex-satinado';">Ver
              producto</button>
          </div>
        </div>
      </div>
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
      /*document.addEventListener("DOMContentLoaded", function () {
        console.log("DOM fully loaded");
        var modal = document.getElementById("productModal");
        var span = document.getElementsByClassName("close")[0];
        var gridItems = document.querySelectorAll(".grid-item");

        console.log("Number of grid items:", gridItems.length);

        gridItems.forEach(function (item, index) {
          item.addEventListener("click", function (e) {
            e.preventDefault(); // Prevenir la navegación si el grid-item es un enlace
            console.log("Grid item clicked:", index);
            var imgSrc = this.querySelector("img").src;
            console.log("Image source:", imgSrc);
            document.getElementById("modalMainImage").src = imgSrc;
            document.getElementById("modalProductImage").src =
              "imgs/decorativo/latex/latex_satinado.png";
            modal.style.display = "block";
            console.log("Modal should be visible now");
          });
        });

        span.onclick = function () {
          modal.style.display = "none";
          console.log("Modal closed");
        };

        window.onclick = function (event) {
          if (event.target == modal) {
            modal.style.display = "none";
            console.log("Modal closed by clicking outside");
          }
        };
      });*/
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
    </script>
  </div>

  <!-- Footer -->
<?php require "footer_real.php"; ?>
</body>

</html>