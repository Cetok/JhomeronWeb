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
  <link rel="stylesheet" href="stylesFooter.css" />
  <link rel="stylesheet" href="styleConte.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <script src="blogData.js"></script>
</head>

<body>
  <!-- Header-->
<?php require "header.php"; ?>
  <div class="breadcrumb">
    <a href="index.php"><img src="icons/home.svg" alt="inicio" /></a>
    <a href="blog_pintor.php">> Blog del Pintor</a>
    <p>
      >
      <span id="product-name">Las principales causas de defector en trabajos de repintado
        automotriz</span>
    </p>
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

    <div class="zone">
      <h1>
        Las principales causas de defector en trabajos de repintado automotriz
      </h1>
    </div>
    <div class="cont-img">
      <img src="imgs/lineas_produc/LÍNEA-INDUSTRIAL.jpg" alt="" />
    </div>
    <div class="contex">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic beatae
        quis id cum debitis, eveniet facilis assumenda autem distinctio nisi
        vitae est animi esse repudiandae nam. Itaque animi quo consequatur!
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic beatae
        quis id cum debitis, eveniet facilis assumenda autem distinctio nisi
        vitae est animi esse repudiandae nam. Itaque animi quo consequatur!
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic beatae
        quis id cum debitis, eveniet facilis assumenda autem distinctio nisi
        vitae est animi esse repudiandae nam. Itaque animi quo consequatur!
      </p>
      <div class="share-section">
        <h3>No olvides compratir en:</h3>
        <div class="share-icons">
          <a href="#"><img src="icons/redes/face.svg" alt="Facebook" /></a>
          <a href="#"><img src="icons/redes/linke.svg" alt="LinkedIn" /></a>
          <a href="#"><img src="icons/redes/pinte.svg" alt="Pinterest" /></a>
          <a href="#"><img src="icons/redes/wasap.svg" alt="WhatsApp" /></a>
          <a href="#"><img src="icons/redes/enlace.svg" alt="Enlace" /></a>
        </div>
      </div>
    </div>

    <!-- Fila de productos 
    <div class="products-row">
      <div class="product-card">
        <img src="imgs/automotriz/Masillas/masilla_fx3000.png" alt="Producto 1" />
        <button class="details-btn">VER DETALLES</button>
      </div>
      <div class="product-card">
        <img src="imgs/automotriz/Masillas/masilla_fx3000.png" alt="Producto 2" />
        <button class="details-btn">VER DETALLES</button>
      </div>
      <div class="product-card">
        <img src="imgs/automotriz/Masillas/masilla_fx3000.png" alt="Producto 3" />
        <button class="details-btn">VER DETALLES</button>
      </div>
      <div class="product-card">
        <img src="imgs/automotriz/Masillas/masilla_fx3000.png" alt="Producto 4" />
        <button class="details-btn">VER DETALLES</button>
      </div>
    </div>
    <div class="pagination-buttons">
      <button class="active" onclick="setActiveButton(this)"></button>
      <button onclick="setActiveButton(this)"></button>
      <button onclick="setActiveButton(this)"></button>
      <button onclick="setActiveButton(this)"></button>
    </div>
    -->
    <!-- Zona de artículos relacionados
    <h2>ARTÍCULOS RELACIONADOS</h2>
    <div class="articles-row">
      <div class="article-card">
        <img src="imgs/lineas_produc/linea-tránsito..jpg" alt="Imagen 1" />
        <p>
          Top 5 colores más<br />
          buscados para<br />
          camionetas en Perú
        </p>
      </div>
      <div class="article-card">
        <img src="imgs/lineas_produc/linea-tránsito..jpg" alt="Imagen 2" />
        <p>
          ¿Cuál es la función<br />
          de una base primer?
        </p>
      </div>
      <div class="article-card">
        <img src="imgs/lineas_produc/linea-tránsito..jpg" alt="Imagen 3" />
        <p>
          Tipos de abrillantado<br />
          en autos modernos
        </p>
      </div>
    </div>
    -->
  </div>

  <script>

    function setActiveButton(button) {
      // Obtiene todos los botones de la paginación
      const buttons = document.querySelectorAll(".pagination-buttons button");

      // Elimina la clase 'active' de todos los botones
      buttons.forEach((btn) => btn.classList.remove("active"));

      // Agrega la clase 'active' al botón que fue clickeado
      button.classList.add("active");
    }
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

  </script>
  <script>
    // Test manual para debugging
    setTimeout(() => {
      console.log('=== TEST MANUAL ===');
      console.log('Elementos encontrados:');
      console.log('product-name:', !!document.getElementById("product-name"));
      console.log('.zone h1:', !!document.querySelector(".zone h1"));
      console.log('.cont-img img:', !!document.querySelector(".cont-img img"));
      console.log('.contex:', !!document.querySelector(".contex"));

      // Test manual de carga
      const urlParams = new URLSearchParams(window.location.search);
      const blogId = urlParams.get("blog");
      console.log('Blog ID desde URL:', blogId);

      if (blogId === 'tips-madera') {
        loadBlogContent('tips-madera');
      } else if (blogId === 'color-ten') {
        loadBlogContent('color-ten');
      } else if (blogId === 'color-pa') {
        loadBlogContent('color-pa');
      } else if (blogId === 'pintar-bar') {
        loadBlogContent('pintar-bar');
      } else if (blogId === 'pin-pis') {
        loadBlogContent('pin-pis');
      } else if (blogId === 'per-au') {
        loadBlogContent('per-au');
      } else if (blogId === 'pint-au') {
        loadBlogContent('pint-au');
      } else if (blogId === 'tip-au') {
        loadBlogContent('tip-au');
      } else if (blogId === 'top-5') {
        loadBlogContent('top-5');
      } else if (blogId === 'pri-au') {
        loadBlogContent('pri-au');
      } else if (blogId === 'tip-bri') {
        loadBlogContent('tip-bri');
      } else if (blogId === '10-co') {
        loadBlogContent('10-co');
      } else if (blogId === 'tipo-rodi') {
        loadBlogContent('tipo-rodi');
      } else if (blogId === 'tip-pared') {
        loadBlogContent('tip-pared');
      }

    }, 200);
  </script>
  <script>
    function initializeShareFunctionality() {
      // Obtener información del artículo actual
      function getCurrentArticleInfo() {
        const urlParams = new URLSearchParams(window.location.search);
        const blogId = urlParams.get("blog");
        const currentUrl = window.location.href;

        let title = "Blog del Pintor - Jhomeron";
        let description = "Descubre consejos y tips de pintura profesional";

        // Si tenemos el blog ID y existe en blogData, usar esa información
        if (blogId && typeof blogData !== 'undefined' && blogData[blogId]) {
          title = blogData[blogId].title + " - Jhomeron";
          description = blogData[blogId].content[0] || "Descubre consejos y tips de pintura profesional";
          // Limpiar HTML del description
          description = description.replace(/<[^>]*>/g, '').substring(0, 150) + "...";
        }

        return {
          url: currentUrl,
          title: title,
          description: description
        };
      }

      // Función para compartir en Facebook
      function shareOnFacebook() {
        const info = getCurrentArticleInfo();
        const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(info.url)}&quote=${encodeURIComponent(info.title + ' - ' + info.description)}`;

        window.open(facebookUrl, 'facebook-share', 'width=580,height=296,scrollbars=yes,resizable=yes');

        // Tracking opcional
        console.log('Compartido en Facebook:', info.title);
      }

      // Función para compartir en LinkedIn
      function shareOnLinkedIn() {
        const info = getCurrentArticleInfo();
        const linkedinUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(info.url)}&title=${encodeURIComponent(info.title)}&summary=${encodeURIComponent(info.description)}`;

        window.open(linkedinUrl, 'linkedin-share', 'width=580,height=296,scrollbars=yes,resizable=yes');

        console.log('Compartido en LinkedIn:', info.title);
      }

      // Función para compartir en Pinterest
      function shareOnPinterest() {
        const info = getCurrentArticleInfo();
        let imageUrl = '';

        // Intentar obtener la imagen del artículo
        const articleImage = document.querySelector('.cont-img img');
        if (articleImage && articleImage.src) {
          // Convertir URL relativa a absoluta si es necesario
          imageUrl = articleImage.src.startsWith('http') ?
            articleImage.src :
            window.location.origin + '/' + articleImage.src.replace(/^\.?\//, '');
        }

        const pinterestUrl = `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(info.url)}&media=${encodeURIComponent(imageUrl)}&description=${encodeURIComponent(info.title + ' - ' + info.description)}`;

        window.open(pinterestUrl, 'pinterest-share', 'width=580,height=296,scrollbars=yes,resizable=yes');

        console.log('Compartido en Pinterest:', info.title);
      }

      // Función para compartir en WhatsApp
      function shareOnWhatsApp() {
        const info = getCurrentArticleInfo();
        const message = `${info.title}\n\n${info.description}\n\nLee más en: ${info.url}`;
        const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(message)}`;

        // En dispositivos móviles abre la app, en desktop abre WhatsApp Web
        if (/Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          window.location.href = whatsappUrl;
        } else {
          window.open(whatsappUrl, 'whatsapp-share', 'width=580,height=296,scrollbars=yes,resizable=yes');
        }

        console.log('Compartido en WhatsApp:', info.title);
      }

      // Función para copiar enlace
      function copyLink() {
        const info = getCurrentArticleInfo();

        // Usar la API moderna del portapapeles si está disponible
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(info.url).then(() => {
            showCopyNotification('¡Enlace copiado al portapapeles!');
          }).catch(err => {
            console.error('Error al copiar:', err);
            fallbackCopyTextToClipboard(info.url);
          });
        } else {
          // Fallback para navegadores más antiguos
          fallbackCopyTextToClipboard(info.url);
        }

        console.log('Enlace copiado:', info.url);
      }

      // Función fallback para copiar texto
      function fallbackCopyTextToClipboard(text) {
        const textArea = document.createElement("textarea");
        textArea.value = text;
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        textArea.style.top = "-999999px";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
          const successful = document.execCommand('copy');
          if (successful) {
            showCopyNotification('¡Enlace copiado al portapapeles!');
          } else {
            showCopyNotification('No se pudo copiar el enlace');
          }
        } catch (err) {
          console.error('Error al copiar:', err);
          showCopyNotification('Error al copiar el enlace');
        }

        document.body.removeChild(textArea);
      }

      // Función para mostrar notificación de copia
      function showCopyNotification(message) {
        // Crear elemento de notificación
        const notification = document.createElement('div');
        notification.textContent = message;
        notification.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      background: #0d3393;
      color: white;
      padding: 12px 20px;
      border-radius: 5px;
      z-index: 10000;
      font-family: Arial, sans-serif;
      font-size: 14px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      animation: slideIn 0.3s ease;
    `;

        // Agregar animación CSS
        if (!document.getElementById('copy-notification-styles')) {
          const style = document.createElement('style');
          style.id = 'copy-notification-styles';
          style.textContent = `
        @keyframes slideIn {
          from { transform: translateX(100%); opacity: 0; }
          to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
          from { transform: translateX(0); opacity: 1; }
          to { transform: translateX(100%); opacity: 0; }
        }
      `;
          document.head.appendChild(style);
        }

        document.body.appendChild(notification);

        // Remover después de 3 segundos
        setTimeout(() => {
          notification.style.animation = 'slideOut 0.3s ease';
          setTimeout(() => {
            if (notification.parentNode) {
              notification.parentNode.removeChild(notification);
            }
          }, 300);
        }, 3000);
      }

      // Agregar event listeners a los iconos de compartir
      function attachShareListeners() {
        const shareSection = document.querySelector('.share-section');
        if (!shareSection) return;

        // Facebook
        const facebookIcon = shareSection.querySelector('a[href="#"]:has(img[alt="Facebook"]), a[href="#"]:has(img[src*="face"])');
        if (facebookIcon) {
          facebookIcon.addEventListener('click', function (e) {
            e.preventDefault();
            shareOnFacebook();
          });
        }

        // LinkedIn
        const linkedinIcon = shareSection.querySelector('a[href="#"]:has(img[alt="LinkedIn"]), a[href="#"]:has(img[src*="linke"])');
        if (linkedinIcon) {
          linkedinIcon.addEventListener('click', function (e) {
            e.preventDefault();
            shareOnLinkedIn();
          });
        }

        // Pinterest
        const pinterestIcon = shareSection.querySelector('a[href="#"]:has(img[alt="Pinterest"]), a[href="#"]:has(img[src*="pinte"])');
        if (pinterestIcon) {
          pinterestIcon.addEventListener('click', function (e) {
            e.preventDefault();
            shareOnPinterest();
          });
        }

        // WhatsApp
        const whatsappIcon = shareSection.querySelector('a[href="#"]:has(img[alt="WhatsApp"]), a[href="#"]:has(img[src*="wasap"])');
        if (whatsappIcon) {
          whatsappIcon.addEventListener('click', function (e) {
            e.preventDefault();
            shareOnWhatsApp();
          });
        }

        // Copiar enlace
        const linkIcon = shareSection.querySelector('a[href="#"]:has(img[alt="Enlace"]), a[href="#"]:has(img[src*="enlace"])');
        if (linkIcon) {
          linkIcon.addEventListener('click', function (e) {
            e.preventDefault();
            copyLink();
          });
        }

        // Método alternativo usando índices si las imágenes no tienen atributos específicos
        const shareIcons = shareSection.querySelectorAll('a[href="#"]');
        if (shareIcons.length >= 5) {
          shareIcons[0].addEventListener('click', (e) => { e.preventDefault(); shareOnFacebook(); });
          shareIcons[1].addEventListener('click', (e) => { e.preventDefault(); shareOnLinkedIn(); });
          shareIcons[2].addEventListener('click', (e) => { e.preventDefault(); shareOnPinterest(); });
          shareIcons[3].addEventListener('click', (e) => { e.preventDefault(); shareOnWhatsApp(); });
          shareIcons[4].addEventListener('click', (e) => { e.preventDefault(); copyLink(); });
        }

        console.log('Event listeners de compartir agregados');
      }

      // Ejecutar cuando el DOM esté listo
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', attachShareListeners);
      } else {
        attachShareListeners();
      }

      // También ejecutar después de que se cargue el contenido del blog
      setTimeout(attachShareListeners, 500);
    }

    // Inicializar funcionalidad de compartir
    initializeShareFunctionality();

    // Exponer funciones globalmente para uso manual si es necesario
    window.blogShare = {
      facebook: () => shareOnFacebook(),
      linkedin: () => shareOnLinkedIn(),
      pinterest: () => shareOnPinterest(),
      whatsapp: () => shareOnWhatsApp(),
      copyLink: () => copyLink()
    };
  </script>
  <!-- Footer -->
<?php require "footer_real.php"; ?>
</body>

</html>