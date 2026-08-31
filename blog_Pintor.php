<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog del Pintor</title>
  <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="styleBlog.css" />
  <link rel="stylesheet" href="stylesFooter.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <script src="blogData.js"></script>
</head>

<body>
  <!-- Header-->
<?php require "header.php"; ?>
  <div class="arriba">
    <a href="index.php"><img src="icons/home.svg" alt="inicio" /></a>
    <p>> Blog del pintor</p>
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
    <div class="blog-grid">
      <div class="blog-item large" data-blog-id="tips-madera" style="background-image: url('imgs/blogConte/tips-cotra-las-plagas-en-madera-muebles-de-madera.png')">
        <div class="button-overlay">
          <div class="button-text">
            10 TIPS PARA PROTEGER<br />LA MADERA DE PLAGAS
          </div>
        </div>
      </div>
      <div class="blog-item large" data-blog-id="color-ten"
        style="background-image: url('imgs/blogConte/pintura-y-proteccion-para-estructuras-metalicas.png')">
        <div class="button-overlay">
          <div class="button-text">
            ¿QUÉ PINTURA UTILIZAR <br />PARA ESTRUCTURAS METÁLICAS <br />EXPUESTAS A LA INTEMPERIE?
          </div>
        </div>
      </div>
      <div class="blog-item corto" data-blog-id="color-pa"
        style="background-image: url('imgs/blogConte/pintar-paredes-de-interiores-y-exteriores-acabado-mate-acabado-satinado.png')">
        <div class="button-overlay">
          <div class="button-text">
            ¿CÓMO ELEGIR EL COLOR<br />PERFECTO PARA TUS<br />PAREDES?
          </div>
        </div>
      </div>
      <div class="blog-item corto" data-blog-id="pintar-bar"
        style="background-image: url('imgs/blogConte/como-pintar-un-barco-yate.png')">
        <div class="button-overlay">
          <div class="button-text">
            PASOS PARA PINTAR UN<br />BARCO O CRUCERO
          </div>
        </div>
      </div>
      <div class="blog-item corto" data-blog-id="pin-pis"
        style="background-image: url('imgs/blogConte/pistola-para-pintar.png')">
        <div class="button-overlay">
          <div class="button-text">
            ¿CÓMO ELEGIR LA PISTOLA<br />IDEAL PARA PINTAR?
          </div>
        </div>
      </div>
    </div>

    <div class="zone-banner">
      <h3>ZONA AUTOMOTRIZ</h3>
    </div>

    <div class="automotive-grid">
      <div class="grid-item" style="cursor: pointer" data-blog-id="per-au">
        <img src="imgs/blogConte/pintura-perlada-para-autos.png" alt="BMW azul" />
        <div class="overlay">
          <p>¿CÓMO LOGRAR UN ACABADO PERLADO EN AUTOS?</p>
        </div>
        <div class="text-content">
          Y la diferencia principal con los acabados metalizados, es que el
          brillo de éste (el perlado) se refleja de distinta...
        </div>
      </div>
      <div class="grid-item" data-blog-id="pint-au">
        <img src="imgs/blogConte/colores-de-pintura-para-camionetas.png" alt="Nissan naranja" />
        <div class="overlay">
          <p>10 OPCIONES DE COLOR PARA PINTAR UNA CAMIONETA</p>
        </div>
        <div class="text-content">
          Y la diferencia principal con los acabados metalizados, es que el
          brillo de éste (el perlado) se refleja de distinta...
        </div>
      </div>
      <div class="grid-item" data-blog-id="tip-au">
        <img src="imgs/blogConte/pintura-para-autos-clasicos.png" alt="Nissan blanco" />
        <div class="overlay">
          <p>¿QUÉ TIPO DE PINTURA DEBO UTILIZAR PARA UN AUTO CLÁSICO?</p>
        </div>
        <div class="text-content">
          Y la diferencia principal con los acabados metalizados, es que el
          brillo de éste (el perlado) se refleja de distinta...
        </div>
      </div>

      <div class="grid-item" data-blog-id="top-5">
        <img src="imgs/blogConte/colores-de-camionetas-en-peru.png" alt="Ford rojo" />
        <div class="overlay">
          <p>TOP 5 COLORES MÁS BUSCADOS PARA CAMIONETAS EN PERÚ</p>
        </div>
      </div>
      <div class="grid-item" data-blog-id="pri-au">
        <img src="imgs/blogConte/aplicar-base-primer-automotriz.png" alt="Pintando un auto" />
        <div class="overlay">
          <p>¿CUÁL ES LA FUNCIÓN DE UNA BASE PRIMER?</p>
        </div>
      </div>
      <div class="grid-item" data-blog-id="tip-bri">
        <img src="imgs/blogConte/abrillantado-para-autos-modernos.png" alt="Auto brillante" />
        <div class="overlay">
          <p>TIPOS DE ABRILLANTADO EN AUTOS MODERNOS</p>
        </div>
      </div>
    </div>

    <div class="zone-banner-2">
      <h3>ZONA DECORATIVA</h3>
    </div>

    <div class="decorative-zone">
      <div class="card-grid">
        <div class="card" data-blog-id="10-co" style="cursor: pointer">
          <div class="card-image">
            <img src="imgs/blogConte/cuando-pintar-paredes-con-temple.png" alt="Tendencias de colores" />
          </div>
          <div class="card-content">
            <h3 class="card-title">
              ¿CUÁNDO USAR TEMPLE?
            </h3>
          </div>
          <div class="card-text">
            Si te gusta la decoración y buscas siempre estar a la última, te
            gustará saber cuáles son los colores más...
          </div>
        </div>
        <div class="card" data-blog-id="tipo-rodi" style="cursor: pointer">
          <div class="card-image">
            <img src="imgs/blogConte/rodillos-para-pintar-paredes.png" alt="Tipos de rodillos" />
          </div>
          <div class="card-content">
            <h3 class="card-title">
              ¿QUÉ TIPOS DE RODILLOS PARA PINTAR EXISTEN?
            </h3>
          </div>
          <div class="card-text">
            Si te gusta la decoración y buscas siempre estar a la última, te
            gustará saber cuáles son los colores más...
          </div>
        </div>
        <div class="card" style="cursor: pointer" data-blog-id="tip-pared">
          <div class="card-image">
            <img src="imgs/blogConte/pintar-con-pasta-mural.png" alt="Pasta mural" />
          </div>
          <div class="card-content">
            <h3 class="card-title">
              ¿POR QUÉ UTILIZAR PASTA MURAL EN PAREDES?
            </h3>
          </div>
          <div class="card-text">
            Si te gusta la decoración y buscas siempre estar a la última, te
            gustará saber cuáles son los colores más...
          </div>
        </div>
      </div>
    <!--  <div class="pagination">
        <button class="page-button active">1</button>
        <button class="page-button">2</button>
        <button class="page-button">3</button>
        <button class="page-button">4</button>
        <button class="page-button">5</button>
      </div>--> 
    </div>
    <div class="zone-banner-2">
      <h3>¡INSPÍRATE Y PINTA!</h3>
    </div>

    <div class="inspirate-section">
      <div class="image-container">
        <a href="inspirate.php" class="inspirate-link">
          <img src="imgs/blogConte/tendencia_color.png" alt="Edificio decorativo" class="background-image" />
          <div class="overlay-content">
            <h2>TENDENCIAS DE COLORES</h2>
            <button class="line-decorativa">LÍNEA DECORATIVA</button>
          </div>
        </a>
      </div>
      <button class="linea-decorativa-btn" onclick="location.href='lineasDecorativa.php'">
        <p class="isnp-txt">VER PRODUCTOS</p>
        LÍNEA DECORATIVA
      </button>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const clickableElements = document.querySelectorAll(
        ".grid-item, .blog-item, .card"
      );
      clickableElements.forEach((item) => {
        item.addEventListener("click", function () {
          const blogId = this.dataset.blogId;
          if (blogId) {
            window.location.href = `blogConte.php?blog=${blogId}`;
          }
        });
      });
    });
    document.addEventListener("DOMContentLoaded", function () {
      const paginationButtons = document.querySelectorAll(".page-button");

      paginationButtons.forEach((button) => {
        button.addEventListener("click", function () {
          // Remover la clase 'active' de todos los botones
          paginationButtons.forEach((btn) => btn.classList.remove("active"));

          // Agregar la clase 'active' al botón clicado
          this.classList.add("active");

          // Aquí puedes agregar la lógica para cargar el contenido de la página correspondiente
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
      const triggerCotiza = document.querySelector(".trigger-submenu-cotiza");
      if (triggerCotiza) {
        triggerCotiza.addEventListener("click", function (e) {
          e.preventDefault();
          const submenuCotiza = this.nextElementSibling;
          submenuCotiza.classList.toggle("activo");
          this.classList.toggle("active");
        });
      }

      // Manejar el botón de email en móvil
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
      const automotiveGrid = document.querySelector(".automotive-grid");
      const hiddenItems = document.querySelectorAll(
        ".grid-item:nth-child(n+4)"
      );

      hiddenItems.forEach((item) => {
        item.classList.add("hidden-mobile");
      });

      const verMasDiv = document.createElement("div");
      verMasDiv.className = "ver-mas";
      verMasDiv.innerHTML = `
    <a href="javascript:void(0)">
      VER MÁS <i class="fas fa-chevron-down"></i>
    </a>
  `;

      const thirdItem = document.querySelector(".grid-item:nth-child(3)");
      if (thirdItem) {
        thirdItem.after(verMasDiv);
      }

      verMasDiv.addEventListener("click", function () {
        const isExpanded = this.classList.contains("active");

        // Cambiar estado del botón
        this.classList.toggle("active");

        if (!isExpanded) {
          // Mostrar elementos
          hiddenItems.forEach((item) => {
            item.style.display = "flex";
            // Usar setTimeout para asegurar que el display:flex se aplique antes de la transición
            setTimeout(() => {
              item.classList.add("show");
            }, 10);
          });

          // Mover el botón al final
          setTimeout(() => {
            automotiveGrid.appendChild(verMasDiv);
          }, 300);

          this.querySelector("a").innerHTML =
            'VER MENOS <i class="fas fa-chevron-up"></i>';
        } else {
          // Ocultar elementos
          hiddenItems.forEach((item) => {
            item.classList.remove("show");
            // Esperar a que termine la transición antes de ocultar completamente
            setTimeout(() => {
              item.style.display = "none";
            }, 500);
          });

          // Mover el botón a su posición original
          setTimeout(() => {
            thirdItem.after(verMasDiv);
          }, 300);

          this.querySelector("a").innerHTML =
            'VER MÁS <i class="fas fa-chevron-down"></i>';
        }
      });
    });
  </script>

  <!-- Footer -->
<?php require "footer_real.php"; ?>
</body>

</html>