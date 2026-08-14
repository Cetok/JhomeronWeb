<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simulador</title>
  <link rel="icon" href="imgs/pinturas-jhomeron-peru.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="styleSimula.css" />
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
    <p>> Simulador</p>
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
    <div class="visualizador">
      <!-- Menú de navegación izquierdo -->
      <div class="menu-lateral">
        <div class="opcion-menu activo">
          <img src="imgs/Simulador/iconos/FACHADA.svg" alt="Fachada" />
          <span>Fachada</span>
        </div>
        <div class="opcion-menu">
          <img src="imgs/Simulador/iconos/SALA.svg" alt="Sala" />
          <span>Sala</span>
        </div>
        <div class="opcion-menu">
          <img src="imgs/Simulador/iconos/DORMITORIO.svg" alt="Dormitorio" />
          <span>Dormitorio</span>
        </div>
        <div class="opcion-menu">
          <img src="imgs/Simulador/iconos/COMEDOR.svg" alt="Comedor" />
          <span>Comedor</span>
        </div>
        <div class="opcion-menu">
          <img src="imgs/Simulador/iconos/COCINA.svg" alt="Cocina" />
          <span>Cocina</span>
        </div>
        <div class="opcion-menu">
          <img src="imgs/Simulador/iconos/BANO.svg" alt="Baño" />
          <span>Baño</span>
        </div>
      </div>

      <!-- Área principal -->
      <div class="area-principal">
        <!-- Visualizador de habitación -->
        <div class="visualizador-habitacion">
          <img src="imgs/Simulador/menu_img/FACHADA3-0.jpg" alt="Visualización de habitación" id="imagen-habitacion" />

          <!-- Barra de colores -->
          <div class="barra-colores">
            <div class="colores-wrapper">
              <!-- Los divs color-option se generarán dinámicamente desde JavaScript -->
            </div>
            <button class="cerrar-colores">&times;</button>
          </div>

          <!-- Botón de WhatsApp -->
          <a href="https://wa.me/957720068" class="visu-wasap" target="_blank">
            <i class="fab fa-whatsapp"></i>
          </a>
        </div>

        <!-- Tipos de pintura -->
        <div class="tipos-pintura">
          <div class="tipo-pintura">
            <h3>Satinado</h3>
            <div class="contenedor-producto">
              <img src="imgs/Simulador/Productos/latex-satinado.png" alt="Satinado" />
              <button class="btn-ver-colores">VER COLORES</button>
            </div>
          </div>

          <div class="tipo-pintura">
            <h3 class="mate-tit">Mate</h3>
            <div class="dual-container">
              <div class="contenedor-producto">
                <img src="imgs/Simulador/Productos/latex-duracolor-acabado-mate.png" alt="Mate Duracolor" />
                <button class="btn-ver-colores">VER COLORES</button>
              </div>
              <div class="contenedor-producto">
                <img src="imgs/Simulador/Productos/latex-pintor-acabado-mate.png" alt="Mate Pintor" />
                <button class="btn-ver-colores">VER COLORES</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Remover el segundo manejador de eventos que está causando conflicto
      const barraColores = document.querySelector(".barra-colores");
      const botonesVerColores =
        document.querySelectorAll(".btn-ver-colores");
      const imagenHabitacion = document.getElementById("imagen-habitacion");
      let habitacionActual = "fachada";

      // Mapeo de habitaciones a sus respectivas imágenes base
      const imagenesHabitacionesBase = {
        fachada: "imgs/Simulador/menu_img/FACHADA3-0.jpg",
        sala: "imgs/simu-colors/tip-si/sala_color/SALA1-0.jpg",
        dormitorio: "imgs/lineas_produc/dormitorio.jpg",
        comedor: "imgs/lineas_produc/comedor.jpg",
        cocina: "imgs/lineas_produc/cocina.jpg",
        baño: "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-0.jpg",
      };

      const coloresPorHabitacion = {
        fachada: {
          Satinado: [
            {
              img: "imgs/simu-colors/Satinado/1mango.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-1-mango.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Satinado/2tangelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-2-tangelo.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Satinado/3granada.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-3-granada.jpg",
              nombre: "Granada",
            },
            {
              img: "imgs/simu-colors/Satinado/4lila.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-4-lila.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Satinado/5orquidea.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-5-orquidea.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Satinado/6pradera.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-6-pradera.jpg",
              nombre: "Pradera",
            },
            {
              img: "imgs/simu-colors/Satinado/7artico.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-7-artico.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Satinado/8indigo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-8-indigo.jpg",
              nombre: "Índigo",
            },
            {
              img: "imgs/simu-colors/Satinado/9crayola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-9-crayola.jpg",
              nombre: "Crayola",
            },
            {
              img: "imgs/simu-colors/Satinado/10eucalipto.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-10-eucalipto.jpg",
              nombre: "Eucalipto",
            },
            {
              img: "imgs/simu-colors/Satinado/11grishorizonte.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-11-gris-horizonte.jpg",
              nombre: "Gris Horizonte",
            },
            {
              img: "imgs/simu-colors/Satinado/12chamaya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-12-chamaya.jpg",
              nombre: "Chamaya",
            },
            {
              img: "imgs/simu-colors/Satinado/13verde.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-13-verde.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Satinado/14negro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-14-negro.jpg",
              nombre: "Negro",
            },
            {
              img: "imgs/simu-colors/Satinado/15mandarina.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-15-mandarina.jpg",
              nombre: "Mandarina",
            },
            {
              img: "imgs/simu-colors/Satinado/16tabacomedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-16-tabaco-medio.jpg",
              nombre: "Tabaco Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/17blancoperla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-17-blanco-perla.jpg",
              nombre: "Blanco Perla",
            },
            {
              img: "imgs/simu-colors/Satinado/18lacremedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-18-lacre-medio.jpg",
              nombre: "Lacre Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/19rosadonatural.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-19-rosado-natural.jpg",
              nombre: "Rosa Natural",
            },
            {
              img: "imgs/simu-colors/Satinado/20azulbohemio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-20-azul-bohemio.jpg",
              nombre: "Azul Bohemio",
            },
            {
              img: "imgs/simu-colors/Satinado/21blancohumo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-21-blanco-humo.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Satinado/22verdeclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-22-verde-claro.jpg",
              nombre: "Verde Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/23costadeoro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-23-costa-de-oro.jpg",
              nombre: "Costa de Oro",
            },
            {
              img: "imgs/simu-colors/Satinado/23rojoteja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-24-rojo-teja.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Satinado/25bengala.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-25-bengala.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Satinado/26rojo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-26-rojo.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Satinado/27melon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-27-melon.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Satinado/28blancoarena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-28-blanco-arena.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Satinado/29azul.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-29-azul.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Satinado/30lacre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-30-lacre.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Satinado/31almendra.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-31-almendra.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Satinado/32hierbabuena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-32-hierba-buena.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Satinado/33canelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-33-canelo.jpg",
              nombre: "Canelo",
            },
            {
              img: "imgs/simu-colors/Satinado/34sunset.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-34-sunset.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Satinado/35miel.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-35-miel.jpg",
              nombre: "Miel",
            },
            {
              img: "imgs/simu-colors/Satinado/36lucuma.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-36-lucuma.jpg",
              nombre: "Lúcuma",
            },
            {
              img: "imgs/simu-colors/Satinado/37amarillomd.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-37-amarillo-MD.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Satinado/38grisclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-38-gris-claro.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/39danubio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-39-Danubio.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Satinado/40crema.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-40-crema.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Satinado/41blancohueso.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-41-blanco-hueso.jpg",
              nombre: "Blanco Hueso",
            },
            {
              img: "imgs/simu-colors/Satinado/41margarita.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-42-margarita.jpg",
              nombre: "Margarita",
            },
            {
              img: "imgs/simu-colors/Satinado/43bambu.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-43-bambu.jpg",
              nombre: "Bambú",
            },
            {
              img: "imgs/simu-colors/Satinado/44naranja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-44-naranja.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Satinado/45salmon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-45-salmon.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Satinado/46maracuya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-46-maracuya.jpg",
              nombre: "Maracuyá",
            },
            {
              img: "imgs/simu-colors/Satinado/47cochinilla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-47-cochinilla.jpg",
              nombre: "Cochinilla",
            },
            {
              img: "imgs/simu-colors/Satinado/48amarillo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-48-amarillo.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Satinado/49amarilloocre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-49-amarillo-ocre.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Satinado/50marfil.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-50-marfil.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Satinado/51amapola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-51-amapola.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Satinado/52violeta.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-52-violeta.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Satinado/53citron.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color//FACHADA3-53-citron.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Satinado/54turquesa.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-54-turquesa.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Satinado/55azullirio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-55-azul-lirio.jpg",
              nombre: "Azul Lirio",
            },
            {
              img: "imgs/simu-colors/Satinado/56grosella.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-56-grosell.jpg",
              nombre: "Grosella",
            },
            {
              img: "imgs/simu-colors/Satinado/57verdetenis.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-57-verde-tenis.jpg",
              nombre: "Verde Tenis",
            },
            {
              img: "imgs/simu-colors/Satinado/58maiz.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-58-maiz.jpg",
              nombre: "Maíz",
            },
            {
              img: "imgs/simu-colors/Satinado/59rojovalicha.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-59-rojo-valicha.jpg",
              nombre: "Rojo Valicha",
            },
            {
              img: "imgs/simu-colors/Satinado/60marronsevillano.svg",
              roomImg:
                "imgs/simu-colors/tip-si/fachada_color/FACHADA3-60-marron-sevillano.jpg",
              nombre: "Marrón Sevillano",
            },
          ],
          "Mate Duracolor": [
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-amarillo-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-amarillo-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-amapola-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-amapola-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-orquidia-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-orquidia-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-blanco-arena-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-blanco-arena-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-azul-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-azul-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-turquesa-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-turquesa-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-rojo-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-rojo-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-amarillo-ocre-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-amarillo-ocre-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-champagne-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-champagne-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Champagne",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-violeta-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-violeta-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-verde-vibrante-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-verde-vibrante-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Verde Vibrante",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-alabastro-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-alabastro-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Alabastro",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-citron-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-citron-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-sunset-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-sunset-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-rojo-teja-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-rojo-teja-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-crema-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-crema-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-lacre-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-lacre-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-mango-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-mango-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-damasco-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-damasco-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Damasco",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-salmon-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-salmon-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-marfil-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-marfil-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-blanco-humo-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-blanco-humo-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-rojo-puca-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-rojo-puca-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Rojo Puca",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-granito-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-granito-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-naranja-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-naranja-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-expresion-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-expresion-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Expresión",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-verde-esmeralda-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-verde-esmeralda-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-colonial-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-colonial-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-almendra-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-almendra-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-verde-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-verde-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-celeste-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-celeste-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-blanco-ostra-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-blanco-ostra-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-milano-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-milano-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Milano",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-ocaso-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-ocaso-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Ocaso",
            },
            {
              img: "imgs/Simulador/duracolor_simu_colores/pintura-para-fachada-de-casa-color-ambar-acabado-mate-duracolor-jhomeron.svg",
              roomImg: "imgs/Simulador/duracolor_simu_fachada/pintura-para-fachada-de-casa-color-ambar-acabado-mate-duracolor-jhomeron.jpg",
              nombre: "Ámbar",
            }
          ],
          "Mate Pintor": [
            {
              img: "imgs/simu-colors/Pintor/1-rojobandera.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-1-Rojo-Bandera-PINTOR.jpg",
              nombre: "Rojo Bandera",
            },
            {
              img: "imgs/simu-colors/Pintor/2-azulelectrico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-2-Azul-electrico-PINTOR.jpg",
              nombre: "Azul Eléctrico",
            },
            {
              img: "imgs/simu-colors/Pintor/3-violeta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-3-violeta-PINTOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Pintor/4-amarillo_md.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-4-amarillo-MD-PINTOR.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Pintor/5-verde_cana.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-5-Verde-Cana-PINTOR.jpg",
              nombre: "Verde Caña",
            },
            {
              img: "imgs/simu-colors/Pintor/6-magenta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-6-magenta-PINTOR.jpg",
              nombre: "Magenta",
            },
            {
              img: "imgs/simu-colors/Pintor/7-naranja_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-7-naranja-PINTOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Pintor/8-atlantis_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-8-atlantis-PINTOR.jpg",
              nombre: "Atlantis",
            },
            {
              img: "imgs/simu-colors/Pintor/9-sunset_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-9-sunset-PINTOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Pintor/10-verde_pino.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-10-verde-pino-PINTOR.jpg",
              nombre: "Verde Pino",
            },
            {
              img: "imgs/simu-colors/Pintor/11-amarillocromo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-11-amarillo-Cromo-PINTOR.jpg",
              nombre: "Amarillo Cromo",
            },
            {
              img: "imgs/simu-colors/Pintor/12-hierba_buena.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-12-Hierba-buena-PINTOR.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Pintor/13-celeste_sedapal.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-13-Celeste-sedapal-PINTOR.jpg",
              nombre: "Celeste Sedapal",
            },
            {
              img: "imgs/simu-colors/Pintor/14-verde_selva.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-14-Verde-Selva-PINTOR.jpg",
              nombre: "Verde Selva",
            },
            {
              img: "imgs/simu-colors/Pintor/15-amarillo_tropical.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-15-Amarillo-tropical-PINTOR.jpg",
              nombre: "Amarillo Tropical",
            },
            {
              img: "imgs/simu-colors/Pintor/16-salmon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-16-Salmon-PINTOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Pintor/17-blancohumo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-17-Blanco-humo-PINTOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Pintor/18-bengala.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-18-Bengala-PINTO.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Pintor/19-granito.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-19-Granito-PINTOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Pintor/20-verde_esmeralda.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-20-Verde-esmeralda-PINTOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Pintor/21-artico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-21-Artico-PINTOR.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Pintor/22-girasol.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-22-Girasol-PINTOR.jpg",
              nombre: "Girasol",
            },
            {
              img: "imgs/simu-colors/Pintor/23-albaricoque.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-23-Albaricoque-PINTOR.jpg",
              nombre: "Albaricoque",
            },
            {
              img: "imgs/simu-colors/Pintor/24-colonial.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-24-Colonial-PINTOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Pintor/25-blanco_ostra.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-25-Blanco-Ostra-PINTOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Pintor/26-lila.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-26-Lila-PINTOR.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Pintor/27-orquidea.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-27-Orquidea-PINTOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Pintor/28-rojoteja.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-28-Rojo-teja-PINTOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Pintor/29-lacre.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-29-lacre-PINTOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Pintor/30-gris_claro.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-30-Gris-Claro-PINTOR.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Pintor/31-marfil_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-31-Marfil-PINTOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Pintor/32-amarilloocre_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-32-Amarillo-Ocre-PINTOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Pintor/33-danubio_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-33-Danubio-PINTOR.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Pintor/34-sacha_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-34-Sacha-PINTOR.jpg",
              nombre: "Sacha",
            },
            {
              img: "imgs/simu-colors/Pintor/35-verde_nilo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-35-Verde-Nilo-PINTOR.jpg",
              nombre: "Verde Nilo",
            },
            {
              img: "imgs/simu-colors/Pintor/36-crema_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-36-Crema-PINTOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Pintor/37-citron_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-37-Citron-PINTOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Pintor/38-tangelo_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-38-Tangelo-PINTOR.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Pintor/39-melon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-39-Melon-PINTOR.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Pintor/40-mango_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-40-Mango-PINTOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Pintor/41-celeste_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/FACHADA3-PINTOR-41-Celeste-PINTOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Pintor/42-rosawawa.svg",
              roomImg: "imgs/simu-colors/Pintor-img/FACHADA-PINTOR-900x500/COLORES---TAMANO-900X500.jpg",
              nombre: "Rosa Wawa",
            },
          ],
        },
        sala: {
          Satinado: [
            {
              img: "imgs/simu-colors/Satinado/1mango.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-1-mango.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Satinado/2tangelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-2-tangelo.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Satinado/3granada.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-3-granada.jpg",
              nombre: "Granada",
            },
            {
              img: "imgs/simu-colors/Satinado/4lila.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-4-lila.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Satinado/5orquidea.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-5-orquidea.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Satinado/6pradera.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-6-pradera.jpg",
              nombre: "Pradera",
            },
            {
              img: "imgs/simu-colors/Satinado/7artico.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-7-artico.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Satinado/8indigo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-8-indigo.jpg",
              nombre: "Índigo",
            },
            {
              img: "imgs/simu-colors/Satinado/9crayola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-9-crayola.jpg",
              nombre: "Crayola",
            },
            {
              img: "imgs/simu-colors/Satinado/10eucalipto.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-10-eucalipto.jpg",
              nombre: "Eucalipto",
            },
            {
              img: "imgs/simu-colors/Satinado/11grishorizonte.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-11-gris-horizonte.jpg",
              nombre: "Gris Horizonte",
            },
            {
              img: "imgs/simu-colors/Satinado/12chamaya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-12-chamaya.jpg",
              nombre: "Chamaya",
            },
            {
              img: "imgs/simu-colors/Satinado/13verde.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-13-verde.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Satinado/14negro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-14-negro.jpg",
              nombre: "Negro",
            },
            {
              img: "imgs/simu-colors/Satinado/15mandarina.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-15-mandarina.jpg",
              nombre: "Mandarina",
            },
            {
              img: "imgs/simu-colors/Satinado/16tabacomedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-16-tabaco-medio.jpg",
              nombre: "Tabaco Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/17blancoperla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-17-blanco-perla.jpg",
              nombre: "Blanco Perla",
            },
            {
              img: "imgs/simu-colors/Satinado/18lacremedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-18-lacre-medio.jpg",
              nombre: "Lacre Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/19rosadonatural.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-19-rosado-natural.jpg",
              nombre: "Rosa Natural",
            },
            {
              img: "imgs/simu-colors/Satinado/20azulbohemio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-20-azul-bohemio.jpg",
              nombre: "Azul Bohemio",
            },
            {
              img: "imgs/simu-colors/Satinado/21blancohumo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-21-blanco-humo.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Satinado/22verdeclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-22-verde-claro.jpg",
              nombre: "Verde Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/23costadeoro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-23-costa-de-oro.jpg",
              nombre: "Costa de Oro",
            },
            {
              img: "imgs/simu-colors/Satinado/23rojoteja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-24-rojo-teja.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Satinado/25bengala.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-25-bengala.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Satinado/26rojo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-26-rojo.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Satinado/27melon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-27-melon.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Satinado/28blancoarena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-28-blanco-arena.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Satinado/29azul.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-29-azul.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Satinado/30lacre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-30-lacre.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Satinado/31almendra.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-31-almendra.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Satinado/32hierbabuena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-32-hierba-buena.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Satinado/33canelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-33-canelo.jpg",
              nombre: "Canelo",
            },
            {
              img: "imgs/simu-colors/Satinado/34sunset.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-34-sunset.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Satinado/35miel.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-35-miel.jpg",
              nombre: "Miel",
            },
            {
              img: "imgs/simu-colors/Satinado/36lucuma.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-36-lucuma.jpg",
              nombre: "Lúcuma",
            },
            {
              img: "imgs/simu-colors/Satinado/37amarillomd.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-37-amarillo-MD.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Satinado/38grisclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-38-gris-claro.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/39danubio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-39-Danubio.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Satinado/40crema.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-40-crema.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Satinado/41blancohueso.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-41-blanco-hueso.jpg",
              nombre: "Blanco Hueso",
            },
            {
              img: "imgs/simu-colors/Satinado/41margarita.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-42-margarita.jpg",
              nombre: "Margarita",
            },
            {
              img: "imgs/simu-colors/Satinado/43bambu.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-43-bambu.jpg",
              nombre: "Bambú",
            },
            {
              img: "imgs/simu-colors/Satinado/44naranja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-44-naranja.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Satinado/45salmon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-45-salmon.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Satinado/46maracuya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-46-maracuya.jpg",
              nombre: "Maracuyá",
            },
            {
              img: "imgs/simu-colors/Satinado/47cochinilla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-47-cochinilla.jpg",
              nombre: "Cochinilla",
            },
            {
              img: "imgs/simu-colors/Satinado/48amarillo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-48-amarillo.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Satinado/49amarilloocre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-49-amarillo-ocre.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Satinado/50marfil.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-50-marfil.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Satinado/51amapola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-51-amapola.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Satinado/52violeta.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-52-violeta.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Satinado/53citron.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-53-citron.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Satinado/54turquesa.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-54-turquesa.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Satinado/55azullirio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-55-azul-lirio.jpg",
              nombre: "Azul Lirio",
            },
            {
              img: "imgs/simu-colors/Satinado/56grosella.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-56-grosell.jpg",
              nombre: "Grosella",
            },
            {
              img: "imgs/simu-colors/Satinado/57verdetenis.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-57-verde-tenis.jpg",
              nombre: "Verde Tenis",
            },
            {
              img: "imgs/simu-colors/Satinado/58maiz.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-58-maiz.jpg",
              nombre: "Maíz",
            },
            {
              img: "imgs/simu-colors/Satinado/59rojovalicha.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-59-rojo-valicha.jpg",
              nombre: "Rojo Valicha",
            },
            {
              img: "imgs/simu-colors/Satinado/60marronsevillano.svg",
              roomImg:
                "imgs/simu-colors/tip-si/sala_color/SALA1-60-marron-sevillano.jpg",
              nombre: "Marrón Sevillano",
            },
          ],
          "Mate Duracolor": [
            {
              img: "imgs/simu-colors/Duracolor/1amarillo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-1-amarillo-DURACOLOR.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Duracolor/2amapola.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-2-amapola-DURACOLOR.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Duracolor/3orquidea.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-3-orquidea-DURACOLOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Duracolor/4blancoarena.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-4-blanco-arena-DURACOLOR.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Duracolor/5azul.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-5-azul-DURACOLOR.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Duracolor/6turquesa.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-6-turquesa-DURACOLOR.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Duracolor/7rojo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-7-rojo-DURACOLOR.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Duracolor/8amarilloocre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-8-amarillo-ocre-DURACOLOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Duracolor/9champagne.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-9-champagne-DURACOLOR.jpg",
              nombre: "Champagne",
            },
            {
              img: "imgs/simu-colors/Duracolor/10violeta.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-10-violeta-DURACOLOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Duracolor/11verdevibrante.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-11-verde-vibrante-DURACOLOR.jpg",
              nombre: "Verde Vibrante",
            },
            {
              img: "imgs/simu-colors/Duracolor/12alabastro.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-12-alabastro-DURACOLOR.jpg",
              nombre: "Alabastro",
            },
            {
              img: "imgs/simu-colors/Duracolor/13citron.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-13-citron-DURACOLOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Duracolor/14sunset.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-14-sunset-DURACOLOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Duracolor/15rojoteja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-15-rojo-teja-DURACOLOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Duracolor/16crema.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-16-crema-DURACOLOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Duracolor/17lacre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-17-lacre-DURACOLOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Duracolor/18mango.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-18-mango-DURACOLOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Duracolor/19damasco.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-19-damasco-DURACOLOR.jpg",
              nombre: "Damasco",
            },
            {
              img: "imgs/simu-colors/Duracolor/20salmon.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-20-salmon-DURACOLOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Duracolor/21marfil.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-21-marfil-DURACOLOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Duracolor/22blancohumo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-22-blanco-humo-DURACOLOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Duracolor/23rojopuca.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-23-rojo-puca-DURACOLOR.jpg",
              nombre: "Rojo Puca",
            },
            {
              img: "imgs/simu-colors/Duracolor/24granito.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-24-granito-DURACOLOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Duracolor/25naranja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-25-naranja-DURACOLOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Duracolor/26expresion.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-26-expresion-DURACOLOR.jpg",
              nombre: "Expresión",
            },
            {
              img: "imgs/simu-colors/Duracolor/27verdeesmeralda.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-27-verde-esmeralda-DURACOLOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Duracolor/28colonial.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-28-colonial-DURACOLOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Duracolor/29almendra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-29-almendra-DURACOLOR.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Duracolor/30verde.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-30-verde-DURACOLOR.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Duracolor/31celeste.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-31-celeste-DURACOLOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Duracolor/32blancoostra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-32-blanco-ostra-DURACOLOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Duracolor/33milano.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-33-milano-DURACOLOR.jpg",
              nombre: "Milano",
            },
            {
              img: "imgs/simu-colors/Duracolor/34ocaso.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-34-ocaso-DURACOLOR.jpg",
              nombre: "Ocaso",
            },
            {
              img: "imgs/simu-colors/Duracolor/35ambar.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/SALA-DURACOLOR-900x500/SALA1-DURACOLOR-35-ambar-DURACOLOR.jpg",
              nombre: "Ámbar",
            }

          ],
          "Mate Pintor": [
            {
              img: "imgs/simu-colors/Pintor/1-rojobandera.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-1-Rojo-Bandera-PINTOR.jpg",
              nombre: "Rojo Bandera",
            },
            {
              img: "imgs/simu-colors/Pintor/2-azulelectrico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-2-Azul-electrico-PINTOR.jpg",
              nombre: "Azul Eléctrico",
            },
            {
              img: "imgs/simu-colors/Pintor/3-violeta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-3-violeta-PINTOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Pintor/4-amarillo_md.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-4-amarillo-MD-PINTOR.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Pintor/5-verde_cana.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-5-Verde-Cana-PINTOR.jpg",
              nombre: "Verde Caña",
            },
            {
              img: "imgs/simu-colors/Pintor/6-magenta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-6-magenta-PINTOR.jpg",
              nombre: "Magenta",
            },
            {
              img: "imgs/simu-colors/Pintor/7-naranja_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-7-naranja-PINTOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Pintor/8-atlantis_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-8-atlantis-PINTOR.jpg",
              nombre: "Atlantis",
            },
            {
              img: "imgs/simu-colors/Pintor/9-sunset_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-9-sunset-PINTOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Pintor/10-verde_pino.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-10-verde-pino-PINTOR.jpg",
              nombre: "Verde Pino",
            },
            {
              img: "imgs/simu-colors/Pintor/11-amarillocromo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-11-amarillo-Cromo-PINTOR.jpg",
              nombre: "Amarillo Cromo",
            },
            {
              img: "imgs/simu-colors/Pintor/12-hierba_buena.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-12-Hierba-buena-PINTOR.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Pintor/13-celeste_sedapal.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-13-Celeste-sedapal-PINTOR.jpg",
              nombre: "Celeste Sedapal",
            },
            {
              img: "imgs/simu-colors/Pintor/14-verde_selva.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-14-Verde-Selva-PINTOR.jpg",
              nombre: "Verde Selva",
            },
            {
              img: "imgs/simu-colors/Pintor/15-amarillo_tropical.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-15-Amarillo-tropical-PINTOR.jpg",
              nombre: "Amarillo Tropical",
            },
            {
              img: "imgs/simu-colors/Pintor/16-salmon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-16-Salmon-PINTOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Pintor/17-blancohumo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-17-Blanco-humo-PINTOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Pintor/18-bengala.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-18-Bengala-PINTO.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Pintor/19-granito.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-19-Granito-PINTOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Pintor/20-verde_esmeralda.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-20-Verde-esmeralda-PINTOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Pintor/21-artico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-21-Artico-PINTOR.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Pintor/22-girasol.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-22-Girasol-PINTOR.jpg",
              nombre: "Girasol",
            },
            {
              img: "imgs/simu-colors/Pintor/23-albaricoque.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-23-Albaricoque-PINTOR.jpg",
              nombre: "Albaricoque",
            },
            {
              img: "imgs/simu-colors/Pintor/24-colonial.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-24-Colonial-PINTOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Pintor/25-blanco_ostra.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-25-Blanco-Ostra-PINTOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Pintor/26-lila.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-26-Lila-PINTOR.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Pintor/27-orquidea.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-27-Orquidea-PINTOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Pintor/28-rojoteja.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-28-Rojo-teja-PINTOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Pintor/29-lacre.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-29-lacre-PINTOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Pintor/30-gris_claro.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-30-Gris-Claro-PINTOR.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Pintor/31-marfil_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-31-Marfil-PINTOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Pintor/32-amarilloocre_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-32-Amarillo-Ocre-PINTOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Pintor/33-danubio_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-33-Danubio-PINTOR.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Pintor/34-sacha_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-34-Sacha-PINTOR.jpg",
              nombre: "Sacha",
            },
            {
              img: "imgs/simu-colors/Pintor/35-verde_nilo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-35-Verde-Nilo-PINTOR.jpg",
              nombre: "Verde Nilo",
            },
            {
              img: "imgs/simu-colors/Pintor/36-crema_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-36-Crema-PINTO.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Pintor/37-citron_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-37-Citron-PINTOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Pintor/38-tangelo_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-38-Tangelo-PINTOR.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Pintor/39-melon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-39-Melon-PINTOR.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Pintor/40-mango_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-40-Mango-PINTOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Pintor/41-celeste_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-41-Celeste-PINTOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Pintor/42-rosawawa.svg",
              roomImg: "imgs/simu-colors/Pintor-img/SALA-PINTOR-900x500/SALA1-PINTOR-42-Rosa-Wawa-PINTOR.jpg",
              nombre: "Rosa Wawa",
            },
          ],
        },
        dormitorio: {
          // Similar estructura para dormitorio
          Satinado: [
            {
              img: "imgs/simu-colors/Satinado/1mango.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-1-mango.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Satinado/2tangelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-2-tangelo.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Satinado/3granada.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-3-granada.jpg",
              nombre: "Granada",
            },
            {
              img: "imgs/simu-colors/Satinado/4lila.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-4-lila.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Satinado/5orquidea.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-5-orquidea.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Satinado/6pradera.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-6-pradera.jpg",
              nombre: "Pradera",
            },
            {
              img: "imgs/simu-colors/Satinado/7artico.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-7-artico.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Satinado/8indigo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-8-indigo.jpg",
              nombre: "Índigo",
            },
            {
              img: "imgs/simu-colors/Satinado/9crayola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-9-crayola.jpg",
              nombre: "Crayola",
            },
            {
              img: "imgs/simu-colors/Satinado/10eucalipto.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-10-eucalipto.jpg",
              nombre: "Eucalipto",
            },
            {
              img: "imgs/simu-colors/Satinado/11grishorizonte.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-11-gris-horizonte.jpg",
              nombre: "Gris Horizonte",
            },
            {
              img: "imgs/simu-colors/Satinado/12chamaya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-12-chamaya.jpg",
              nombre: "Chamaya",
            },
            {
              img: "imgs/simu-colors/Satinado/13verde.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-13-verde.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Satinado/14negro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-14-negro.jpg",
              nombre: "Negro",
            },
            {
              img: "imgs/simu-colors/Satinado/15mandarina.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-15-mandarina.jpg",
              nombre: "Mandarina",
            },
            {
              img: "imgs/simu-colors/Satinado/16tabacomedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-16-tabaco-medio.jpg",
              nombre: "Tabaco Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/17blancoperla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-17-blanco-perla.jpg",
              nombre: "Blanco Perla",
            },
            {
              img: "imgs/simu-colors/Satinado/18lacremedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-18-lacre-medio.jpg",
              nombre: "Lacre Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/19rosadonatural.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-19-rosado-natural.jpg",
              nombre: "Rosa Natural",
            },
            {
              img: "imgs/simu-colors/Satinado/20azulbohemio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-20-azul-bohemio.jpg",
              nombre: "Azul Bohemio",
            },
            {
              img: "imgs/simu-colors/Satinado/21blancohumo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-21-blanco-humo.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Satinado/22verdeclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-22-verde-claro.jpg",
              nombre: "Verde Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/23costadeoro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-23-costa-de-oro.jpg",
              nombre: "Costa de Oro",
            },
            {
              img: "imgs/simu-colors/Satinado/23rojoteja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-24-rojo-teja.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Satinado/25bengala.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-25-bengala.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Satinado/26rojo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-26-rojo.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Satinado/27melon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-27-melon.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Satinado/28blancoarena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-28-blanco-arena.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Satinado/29azul.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-29-azul.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Satinado/30lacre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-30-lacre.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Satinado/31almendra.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-31-almendra.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Satinado/32hierbabuena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-32-hierba-buena.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Satinado/33canelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-33-canelo.jpg",
              nombre: "Canelo",
            },
            {
              img: "imgs/simu-colors/Satinado/34sunset.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-34-sunset.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Satinado/35miel.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-35-miel.jpg",
              nombre: "Miel",
            },
            {
              img: "imgs/simu-colors/Satinado/36lucuma.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-36-lucuma.jpg",
              nombre: "Lúcuma",
            },
            {
              img: "imgs/simu-colors/Satinado/37amarillomd.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-37-amarillo-MD.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Satinado/38grisclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-38-gris-claro.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/39danubio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-39-Danubio.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Satinado/40crema.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-40-crema.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Satinado/41blancohueso.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-41-blanco-hueso.jpg",
              nombre: "Blanco Hueso",
            },
            {
              img: "imgs/simu-colors/Satinado/41margarita.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-42-margarita.jpg",
              nombre: "Margarita",
            },
            {
              img: "imgs/simu-colors/Satinado/43bambu.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-43-bambu.jpg",
              nombre: "Bambú",
            },
            {
              img: "imgs/simu-colors/Satinado/44naranja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-44-naranja.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Satinado/45salmon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-45-salmon.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Satinado/46maracuya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-46-maracuya.jpg",
              nombre: "Maracuyá",
            },
            {
              img: "imgs/simu-colors/Satinado/47cochinilla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-47-cochinilla.jpg",
              nombre: "Cochinilla",
            },
            {
              img: "imgs/simu-colors/Satinado/48amarillo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-48-amarillo.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Satinado/49amarilloocre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-49-amarillo-ocre.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Satinado/50marfil.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-50-marfil.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Satinado/51amapola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-51-amapola.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Satinado/52violeta.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-52-violeta.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Satinado/53citron.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-53-citron.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Satinado/54turquesa.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-54-turquesa.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Satinado/55azullirio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-55-azul-lirio.jpg",
              nombre: "Azul Lirio",
            },
            {
              img: "imgs/simu-colors/Satinado/56grosella.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-56-grosella.jpg",
              nombre: "Grosella",
            },
            {
              img: "imgs/simu-colors/Satinado/57verdetenis.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-57-verde-tenis.jpg",
              nombre: "Verde Tenis",
            },
            {
              img: "imgs/simu-colors/Satinado/58maiz.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-58-maiz.jpg",
              nombre: "Maíz",
            },
            {
              img: "imgs/simu-colors/Satinado/59rojovalicha.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-59-rojo-valicha.jpg",
              nombre: "Rojo Valicha",
            },
            {
              img: "imgs/simu-colors/Satinado/60marronsevillano.svg",
              roomImg:
                "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-60-marron-sevillano.jpg",
              nombre: "Marrón Sevillano",
            },
          ],
          "Mate Duracolor": [
            {
              img: "imgs/simu-colors/Duracolor/1amarillo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-1-amarillo-DURACOLOR.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Duracolor/2amapola.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-2-amapola-DURACOLOR.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Duracolor/3orquidea.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-3-orquidea-DURACOLOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Duracolor/4blancoarena.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-4-blanco-arena-DURACOLOR.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Duracolor/5azul.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-5-azul-DURACOLOR.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Duracolor/6turquesa.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-6-turquesa-DURACOLOR.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Duracolor/7rojo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-7-rojo-DURACOLOR.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Duracolor/8amarilloocre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-8-amarillo-ocre-DURACOLOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Duracolor/9champagne.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-9-champagne-DURACOLOR.jpg",
              nombre: "Champagne",
            },
            {
              img: "imgs/simu-colors/Duracolor/10violeta.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-10-violeta-DURACOLOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Duracolor/11verdevibrante.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-11-verde-vibrante-DURACOLOR.jpg",
              nombre: "Verde Vibrante",
            },
            {
              img: "imgs/simu-colors/Duracolor/12alabastro.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-12-alabastro-DURACOLOR.jpg",
              nombre: "Alabastro",
            },
            {
              img: "imgs/simu-colors/Duracolor/13citron.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-13-citron-DURACOLOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Duracolor/14sunset.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-14-sunset-DURACOLOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Duracolor/15rojoteja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-15-rojo-teja-DURACOLOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Duracolor/16crema.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-16-crema-DURACOLOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Duracolor/17lacre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-17-lacre-DURACOLOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Duracolor/18mango.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-18-mango-DURACOLOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Duracolor/19damasco.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-19-damasco-DURACOLOR.jpg",
              nombre: "Damasco",
            },
            {
              img: "imgs/simu-colors/Duracolor/20salmon.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-20-salmon-DURACOLOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Duracolor/21marfil.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-21-marfil-DURACOLOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Duracolor/22blancohumo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-22-blanco-humo-DURACOLOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Duracolor/23rojopuca.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-23-rojo-puca-DURACOLOR.jpg",
              nombre: "Rojo Puca",
            },
            {
              img: "imgs/simu-colors/Duracolor/24granito.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-24-granito-DURACOLOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Duracolor/25naranja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-25-naranja-DURACOLOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Duracolor/26expresion.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-26-expresion-DURACOLOR.jpg",
              nombre: "Expresión",
            },
            {
              img: "imgs/simu-colors/Duracolor/27verdeesmeralda.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-27-verde-esmeralda-DURACOLOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Duracolor/28colonial.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-28-colonial-DURACOLOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Duracolor/29almendra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-29-almendra-DURACOLOR.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Duracolor/30verde.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-30-verde-DURACOLOR.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Duracolor/31celeste.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-31-celeste-DURACOLOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Duracolor/32blancoostra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-32-blanco-ostra-DURACOLOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Duracolor/33milano.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-33-milano-DURACOLOR.jpg",
              nombre: "Milano",
            },
            {
              img: "imgs/simu-colors/Duracolor/34ocaso.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-34-ocaso-DURACOLOR.jpg",
              nombre: "Ocaso",
            },
            {
              img: "imgs/simu-colors/Duracolor/35ambar.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/DORMITORIO-DURACOLOR-900x500/DORMITORIO1-DURACOLOR-35-ambar-DURACOLOR.jpg",
              nombre: "Ámbar",
            }
          ],
          "Mate Pintor": [
            {
              img: "imgs/simu-colors/Pintor/1-rojobandera.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-1-Rojo-Bandera-PINTOR.jpg",
              nombre: "Rojo Bandera",
            },
            {
              img: "imgs/simu-colors/Pintor/2-azulelectrico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-2-Azul-electrico-PINTOR.jpg",
              nombre: "Azul Eléctrico",
            },
            {
              img: "imgs/simu-colors/Pintor/3-violeta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-3-violeta-PINTOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Pintor/4-amarillo_md.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-4-amarillo-MD-PINTOR.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Pintor/5-verde_cana.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-5-Verde-Cana-PINTOR.jpg",
              nombre: "Verde Caña",
            },
            {
              img: "imgs/simu-colors/Pintor/6-magenta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-6-magenta-PINTOR.jpg",
              nombre: "Magenta",
            },
            {
              img: "imgs/simu-colors/Pintor/7-naranja_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-7-naranja-PINTOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Pintor/8-atlantis_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-8-atlantis-PINTOR.jpg",
              nombre: "Atlantis",
            },
            {
              img: "imgs/simu-colors/Pintor/9-sunset_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-9-sunset-PINTOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Pintor/10-verde_pino.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-10-verde-pino-PINTOR.jpg",
              nombre: "Verde Pino",
            },
            {
              img: "imgs/simu-colors/Pintor/11-amarillocromo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-11-amarillo-Cromo-PINTOR.jpg",
              nombre: "Amarillo Cromo",
            },
            {
              img: "imgs/simu-colors/Pintor/12-hierba_buena.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-12-Hierba-buena-PINTOR.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Pintor/13-celeste_sedapal.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-13-Celeste-sedapal-PINTOR.jpg",
              nombre: "Celeste Sedapal",
            },
            {
              img: "imgs/simu-colors/Pintor/14-verde_selva.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-14-Verde-Selva-PINTOR.jpg",
              nombre: "Verde Selva",
            },
            {
              img: "imgs/simu-colors/Pintor/15-amarillo_tropical.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-15-Amarillo-tropical-PINTOR.jpg",
              nombre: "Amarillo Tropical",
            },
            {
              img: "imgs/simu-colors/Pintor/16-salmon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-16-Salmon-PINTOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Pintor/17-blancohumo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-17-Blanco-humo-PINTOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Pintor/18-bengala.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-18-Bengala-PINTO.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Pintor/19-granito.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-19-Granito-PINTOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Pintor/20-verde_esmeralda.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-20-Verde-esmeralda-PINTOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Pintor/21-artico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-21-Artico-PINTOR.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Pintor/22-girasol.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-22-Girasol-PINTOR.jpg",
              nombre: "Girasol",
            },
            {
              img: "imgs/simu-colors/Pintor/23-albaricoque.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-23-Albaricoque-PINTOR.jpg",
              nombre: "Albaricoque",
            },
            {
              img: "imgs/simu-colors/Pintor/24-colonial.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-24-Colonial-PINTOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Pintor/25-blanco_ostra.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-25-Blanco-Ostra-PINTOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Pintor/26-lila.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-26-Lila-PINTOR.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Pintor/27-orquidea.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-27-Orquidea-PINTOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Pintor/28-rojoteja.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-28-Rojo-teja-PINTOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Pintor/29-lacre.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-29-lacre-PINTOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Pintor/30-gris_claro.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-30-Gris-Claro-PINTOR.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Pintor/31-marfil_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-31-Marfil-PINTOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Pintor/32-amarilloocre_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-32-Amarillo-Ocre-PINTOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Pintor/33-danubio_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-33-Danubio-PINTOR.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Pintor/34-sacha_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-34-Sacha-PINTOR.jpg",
              nombre: "Sacha",
            },
            {
              img: "imgs/simu-colors/Pintor/35-verde_nilo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-35-Verde-Nilo-PINTOR.jpg",
              nombre: "Verde Nilo",
            },
            {
              img: "imgs/simu-colors/Pintor/36-crema_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-36-Crema-PINTOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Pintor/37-citron_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-37-Citron-PINTOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Pintor/38-tangelo_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-38-Tangelo-PINTOR.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Pintor/39-melon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-39-Melon-PINTOR.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Pintor/40-mango_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-40-Mango-PINTOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Pintor/41-celeste_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-41-Celeste-PINTOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Pintor/42-rosawawa.svg",
              roomImg: "imgs/simu-colors/Pintor-img/DORMITORIO-PINTOR-900x500/DORMITORIO1-PINTOR-42-Rosa-Wawa-PINTOR.jpg",
              nombre: "Rosa Wawa",
            },
          ],
        },
        comedor: {
          // Similar estructura para comedor
          Satinado: [
            {
              img: "imgs/simu-colors/Satinado/1mango.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-1-mango.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Satinado/2tangelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-2-tangelo.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Satinado/3granada.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-3-granada.jpg",
              nombre: "Granada",
            },
            {
              img: "imgs/simu-colors/Satinado/4lila.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-4-lila.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Satinado/5orquidea.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-5-orquidea.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Satinado/6pradera.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-6-pradera.jpg",
              nombre: "Pradera",
            },
            {
              img: "imgs/simu-colors/Satinado/7artico.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-7-artico.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Satinado/8indigo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-8-indigo.jpg",
              nombre: "Índigo",
            },
            {
              img: "imgs/simu-colors/Satinado/9crayola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-9-crayola.jpg",
              nombre: "Crayola",
            },
            {
              img: "imgs/simu-colors/Satinado/10eucalipto.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-10-eucalipto.jpg",
              nombre: "Eucalipto",
            },
            {
              img: "imgs/simu-colors/Satinado/11grishorizonte.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-11-gris-horizonte.jpg",
              nombre: "Gris Horizonte",
            },
            {
              img: "imgs/simu-colors/Satinado/12chamaya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-12-chamaya.jpg",
              nombre: "Chamaya",
            },
            {
              img: "imgs/simu-colors/Satinado/13verde.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-13-verde.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Satinado/14negro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-14-negro.jpg",
              nombre: "Negro",
            },
            {
              img: "imgs/simu-colors/Satinado/15mandarina.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-15-mandarina.jpg",
              nombre: "Mandarina",
            },
            {
              img: "imgs/simu-colors/Satinado/16tabacomedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-16-tabaco-medio.jpg",
              nombre: "Tabaco Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/17blancoperla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-17-blanco-perla.jpg",
              nombre: "Blanco Perla",
            },
            {
              img: "imgs/simu-colors/Satinado/18lacremedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-18-lacre-medio.jpg",
              nombre: "Lacre Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/19rosadonatural.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-19-rosado-natural.jpg",
              nombre: "Rosa Natural",
            },
            {
              img: "imgs/simu-colors/Satinado/20azulbohemio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-20-azul-bohemio.jpg",
              nombre: "Azul Bohemio",
            },
            {
              img: "imgs/simu-colors/Satinado/21blancohumo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-21-blanco-humo.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Satinado/22verdeclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-22-verde-claro.jpg",
              nombre: "Verde Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/23costadeoro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-23-costa-de-oro.jpg",
              nombre: "Costa de Oro",
            },
            {
              img: "imgs/simu-colors/Satinado/23rojoteja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-24-rojo-teja.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Satinado/25bengala.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-25-bengala.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Satinado/26rojo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-26-rojo.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Satinado/27melon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-27-melon.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Satinado/28blancoarena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-28-blanco-arena.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Satinado/29azul.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-29-azul.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Satinado/30lacre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-30-lacre.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Satinado/31almendra.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-31-almendra.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Satinado/32hierbabuena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-32-hierba-buena.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Satinado/33canelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-33-canelo.jpg",
              nombre: "Canelo",
            },
            {
              img: "imgs/simu-colors/Satinado/34sunset.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-34-sunset.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Satinado/35miel.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-35-miel.jpg",
              nombre: "Miel",
            },
            {
              img: "imgs/simu-colors/Satinado/36lucuma.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-36-lucuma.jpg",
              nombre: "Lúcuma",
            },
            {
              img: "imgs/simu-colors/Satinado/37amarillomd.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-37-amarillo-MD.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Satinado/38grisclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-38-gris-claro.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/39danubio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-39-Danubio.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Satinado/40crema.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-40-crema.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Satinado/41blancohueso.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-41-blanco-hueso.jpg",
              nombre: "Blanco Hueso",
            },
            {
              img: "imgs/simu-colors/Satinado/41margarita.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-42-margarita.jpg",
              nombre: "Margarita",
            },
            {
              img: "imgs/simu-colors/Satinado/43bambu.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-43-bambu.jpg",
              nombre: "Bambú",
            },
            {
              img: "imgs/simu-colors/Satinado/44naranja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-44-naranja.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Satinado/45salmon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-45-salmon.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Satinado/46maracuya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-46-maracuya.jpg",
              nombre: "Maracuyá",
            },
            {
              img: "imgs/simu-colors/Satinado/47cochinilla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-47-cochinilla.jpg",
              nombre: "Cochinilla",
            },
            {
              img: "imgs/simu-colors/Satinado/48amarillo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-48-amarillo.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Satinado/49amarilloocre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-49-amarillo-ocre.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Satinado/50marfil.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-50-marfil.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Satinado/51amapola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-51-amapola.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Satinado/52violeta.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-52-violeta.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Satinado/53citron.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-53-citron.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Satinado/54turquesa.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-54-turquesa.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Satinado/55azullirio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-55-azul-lirio.jpg",
              nombre: "Azul Lirio",
            },
            {
              img: "imgs/simu-colors/Satinado/56grosella.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-56-grosella.jpg",
              nombre: "Grosella",
            },
            {
              img: "imgs/simu-colors/Satinado/57verdetenis.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-57-verde-tenis.jpg",
              nombre: "Verde Tenis",
            },
            {
              img: "imgs/simu-colors/Satinado/58maiz.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-58-maiz.jpg",
              nombre: "Maíz",
            },
            {
              img: "imgs/simu-colors/Satinado/59rojovalicha.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-59-rojo-valicha.jpg",
              nombre: "Rojo Valicha",
            },
            {
              img: "imgs/simu-colors/Satinado/60marronsevillano.svg",
              roomImg:
                "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-60-marron-sevillano.jpg",
              nombre: "Marrón Sevillano",
            },
          ],
          "Mate Duracolor": [
            {
              img: "imgs/simu-colors/Duracolor/1amarillo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-1-amarillo-DURACOLOR.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Duracolor/2amapola.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-2-amapola-DURACOLOR.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Duracolor/3orquidea.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-3-orquidea-DURACOLOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Duracolor/4blancoarena.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-4-blanco-arena-DURACOLOR.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Duracolor/5azul.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-5-azul-DURACOLOR.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Duracolor/6turquesa.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-6-turquesa-DURACOLOR.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Duracolor/7rojo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-7-rojo-DURACOLOR.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Duracolor/8amarilloocre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-8-amarillo-ocre-DURACOLOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Duracolor/9champagne.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-9-champagne-DURACOLOR.jpg",
              nombre: "Champagne",
            },
            {
              img: "imgs/simu-colors/Duracolor/10violeta.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-10-violeta-DURACOLOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Duracolor/11verdevibrante.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-11-verde-vibrante-DURACOLOR.jpg",
              nombre: "Verde Vibrante",
            },
            {
              img: "imgs/simu-colors/Duracolor/12alabastro.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-12-alabastro-DURACOLOR.jpg",
              nombre: "Alabastro",
            },
            {
              img: "imgs/simu-colors/Duracolor/13citron.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-13-citron-DURACOLOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Duracolor/14sunset.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-14-sunset-DURACOLOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Duracolor/15rojoteja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-15-rojo-teja-DURACOLOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Duracolor/16crema.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-16-crema-DURACOLOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Duracolor/17lacre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-17-lacre-DURACOLOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Duracolor/18mango.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-18-mango-DURACOLOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Duracolor/19damasco.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-19-damasco-DURACOLOR.jpg",
              nombre: "Damasco",
            },
            {
              img: "imgs/simu-colors/Duracolor/20salmon.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-20-salmon-DURACOLOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Duracolor/21marfil.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-21-marfil-DURACOLOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Duracolor/22blancohumo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-22-blanco-humo-DURACOLOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Duracolor/23rojopuca.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-23-rojo-puca-DURACOLOR.jpg",
              nombre: "Rojo Puca",
            },
            {
              img: "imgs/simu-colors/Duracolor/24granito.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-24-granito-DURACOLOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Duracolor/25naranja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-25-naranja-DURACOLOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Duracolor/26expresion.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-26-expresion-DURACOLOR.jpg",
              nombre: "Expresión",
            },
            {
              img: "imgs/simu-colors/Duracolor/27verdeesmeralda.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-27-verde-esmeralda-DURACOLOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Duracolor/28colonial.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-28-colonial-DURACOLOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Duracolor/29almendra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-29-almendra-DURACOLOR.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Duracolor/30verde.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-30-verde-DURACOLOR.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Duracolor/31celeste.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-31-celeste-DURACOLOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Duracolor/32blancoostra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-32-blanco-ostra-DURACOLOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Duracolor/33milano.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-33-milano-DURACOLOR.jpg",
              nombre: "Milano",
            },
            {
              img: "imgs/simu-colors/Duracolor/34ocaso.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-34-ocaso-DURACOLOR.jpg",
              nombre: "Ocaso",
            },
            {
              img: "imgs/simu-colors/Duracolor/35ambar.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COMEDOR-DURACOLOR-900x500/COMEDOR2-DURACOLOR-35-ambar-DURACOLOR.jpg",
              nombre: "Ámbar",
            }
          ],
          "Mate Pintor": [
            {
              img: "imgs/simu-colors/Pintor/1-rojobandera.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-1-Rojo-Bandera-PINTOR.jpg",
              nombre: "Rojo Bandera",
            },
            {
              img: "imgs/simu-colors/Pintor/2-azulelectrico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-2-Azul-electrico-PINTOR.jpg",
              nombre: "Azul Eléctrico",
            },
            {
              img: "imgs/simu-colors/Pintor/3-violeta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-3-violeta-PINTOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Pintor/4-amarillo_md.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-4-amarillo-MD-PINTOR.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Pintor/5-verde_cana.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-5-Verde-Cana-PINTOR.jpg",
              nombre: "Verde Caña",
            },
            {
              img: "imgs/simu-colors/Pintor/6-magenta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-6-magenta-PINTOR.jpg",
              nombre: "Magenta",
            },
            {
              img: "imgs/simu-colors/Pintor/7-naranja_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-7-naranja-PINTOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Pintor/8-atlantis_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-8-atlantis-PINTOR.jpg",
              nombre: "Atlantis",
            },
            {
              img: "imgs/simu-colors/Pintor/9-sunset_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-9-sunset-PINTOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Pintor/10-verde_pino.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-10-verde-pino-PINTOR.jpg",
              nombre: "Verde Pino",
            },
            {
              img: "imgs/simu-colors/Pintor/11-amarillocromo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-11-amarillo-Cromo-PINTOR.jpg",
              nombre: "Amarillo Cromo",
            },
            {
              img: "imgs/simu-colors/Pintor/12-hierba_buena.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-12-Hierba-buena-PINTOR.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Pintor/13-celeste_sedapal.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR13-Celeste-sedapal-PINTOR.jpg",
              nombre: "Celeste Sedapal",
            },
            {
              img: "imgs/simu-colors/Pintor/14-verde_selva.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-14-Verde-Selva-PINTOR.jpg",
              nombre: "Verde Selva",
            },
            {
              img: "imgs/simu-colors/Pintor/15-amarillo_tropical.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-15-Amarillo-tropical-PINTOR.jpg",
              nombre: "Amarillo Tropical",
            },
            {
              img: "imgs/simu-colors/Pintor/16-salmon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-16-Salmon-PINTOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Pintor/17-blancohumo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-17-Blanco-humo-PINTOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Pintor/18-bengala.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-18-Bengala-PINTO.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Pintor/19-granito.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-19-Granito-PINTOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Pintor/20-verde_esmeralda.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-20-Verde-esmeralda-PINTOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Pintor/21-artico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-21-Artico-PINTOR.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Pintor/22-girasol.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-22-Girasol-PINTOR.jpg",
              nombre: "Girasol",
            },
            {
              img: "imgs/simu-colors/Pintor/23-albaricoque.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-23-Albaricoque-PINTOR.jpg",
              nombre: "Albaricoque",
            },
            {
              img: "imgs/simu-colors/Pintor/24-colonial.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-24-Colonial-PINTOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Pintor/25-blanco_ostra.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-25-Blanco-Ostra-PINTOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Pintor/26-lila.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-26-Lila-PINTOR.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Pintor/27-orquidea.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-27-Orquidea-PINTOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Pintor/28-rojoteja.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-28-Rojo-teja-PINTOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Pintor/29-lacre.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-29-lacre-PINTOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Pintor/30-gris_claro.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-30-Gris-Claro-PINTOR.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Pintor/31-marfil_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-31-Marfil-PINTOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Pintor/32-amarilloocre_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-32-Amarillo-Ocre-PINTOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Pintor/33-danubio_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-33-Danubio-PINTOR.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Pintor/34-sacha_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-34-Sacha-PINTOR.jpg",
              nombre: "Sacha",
            },
            {
              img: "imgs/simu-colors/Pintor/35-verde_nilo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-35-Verde-Nilo-PINTOR.jpg",
              nombre: "Verde Nilo",
            },
            {
              img: "imgs/simu-colors/Pintor/36-crema_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-36-Crema-PINTOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Pintor/37-citron_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-37-Citron-PINTOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Pintor/38-tangelo_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-38-Tangelo-PINTOR.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Pintor/39-melon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-39-Melon-PINTOR.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Pintor/40-mango_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-40-Mango-PINTOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Pintor/41-celeste_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-41-Celeste-PINTOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Pintor/42-rosawawa.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COMEDOR-PINTOR-900x500/COMEDOR2-PINTOR-42-Rosa-Wawa-PINTOR.jpg",
              nombre: "Rosa Wawa",
            },
          ],
        },
        cocina: {
          // Similar estructura para cocina
          Satinado: [
            {
              img: "imgs/simu-colors/Satinado/1mango.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-1-mango.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Satinado/2tangelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-2-tangelo.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Satinado/3granada.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-3-granada.jpg",
              nombre: "Granada",
            },
            {
              img: "imgs/simu-colors/Satinado/4lila.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-4-lila.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Satinado/5orquidea.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-5-orquidea.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Satinado/6pradera.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-6-pradera.jpg",
              nombre: "Pradera",
            },
            {
              img: "imgs/simu-colors/Satinado/7artico.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-7-artico.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Satinado/8indigo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-8-indigo.jpg",
              nombre: "Índigo",
            },
            {
              img: "imgs/simu-colors/Satinado/9crayola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-9-crayola.jpg",
              nombre: "Crayola",
            },
            {
              img: "imgs/simu-colors/Satinado/10eucalipto.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-10-eucalipto.jpg",
              nombre: "Eucalipto",
            },
            {
              img: "imgs/simu-colors/Satinado/11grishorizonte.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-11-gris-horizonte.jpg",
              nombre: "Gris Horizonte",
            },
            {
              img: "imgs/simu-colors/Satinado/12chamaya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-12-chamaya.jpg",
              nombre: "Chamaya",
            },
            {
              img: "imgs/simu-colors/Satinado/13verde.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-13-verde.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Satinado/14negro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-14-negro.jpg",
              nombre: "Negro",
            },
            {
              img: "imgs/simu-colors/Satinado/15mandarina.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-15-mandarina.jpg",
              nombre: "Mandarina",
            },
            {
              img: "imgs/simu-colors/Satinado/16tabacomedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-16-tabaco-medio.jpg",
              nombre: "Tabaco Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/17blancoperla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-17-blanco-perla.jpg",
              nombre: "Blanco Perla",
            },
            {
              img: "imgs/simu-colors/Satinado/18lacremedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-18-lacre-medio.jpg",
              nombre: "Lacre Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/19rosadonatural.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-19-rosado-natural.jpg",
              nombre: "Rosa Natural",
            },
            {
              img: "imgs/simu-colors/Satinado/20azulbohemio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-20-azul-bohemio.jpg",
              nombre: "Azul Bohemio",
            },
            {
              img: "imgs/simu-colors/Satinado/21blancohumo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-21-blanco-humo.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Satinado/22verdeclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-22-verde-claro.jpg",
              nombre: "Verde Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/23costadeoro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-23-costa-de-oro.jpg",
              nombre: "Costa de Oro",
            },
            {
              img: "imgs/simu-colors/Satinado/23rojoteja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-24-rojo-teja.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Satinado/25bengala.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-25-bengala.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Satinado/26rojo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-26-rojo.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Satinado/27melon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-27-melon.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Satinado/28blancoarena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-28-blanco-arena.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Satinado/29azul.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-29-azul.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Satinado/30lacre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-30-lacre.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Satinado/31almendra.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-31-almendra.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Satinado/32hierbabuena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-32-hierba-buena.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Satinado/33canelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-33-canelo.jpg",
              nombre: "Canelo",
            },
            {
              img: "imgs/simu-colors/Satinado/34sunset.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-34-sunset.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Satinado/35miel.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-35-miel.jpg",
              nombre: "Miel",
            },
            {
              img: "imgs/simu-colors/Satinado/36lucuma.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-36-lucuma.jpg",
              nombre: "Lúcuma",
            },
            {
              img: "imgs/simu-colors/Satinado/37amarillomd.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-37-amarillo-MD.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Satinado/38grisclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-38-gris-claro.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/39danubio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-39-Danubio.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Satinado/40crema.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-40-crema.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Satinado/41blancohueso.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-41-blanco-hueso.jpg",
              nombre: "Blanco Hueso",
            },
            {
              img: "imgs/simu-colors/Satinado/41margarita.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-42-margarita.jpg",
              nombre: "Margarita",
            },
            {
              img: "imgs/simu-colors/Satinado/43bambu.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-43-bambu.jpg",
              nombre: "Bambú",
            },
            {
              img: "imgs/simu-colors/Satinado/44naranja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-44-naranja.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Satinado/45salmon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-45-salmon.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Satinado/46maracuya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-46-maracuya.jpg",
              nombre: "Maracuyá",
            },
            {
              img: "imgs/simu-colors/Satinado/47cochinilla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-47-cochinilla.jpg",
              nombre: "Cochinilla",
            },
            {
              img: "imgs/simu-colors/Satinado/48amarillo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-48-amarillo.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Satinado/49amarilloocre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-49-amarillo-ocre.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Satinado/50marfil.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-50-marfil.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Satinado/51amapola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-51-amapola.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Satinado/52violeta.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-52-violeta.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Satinado/53citron.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-53-citron.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Satinado/54turquesa.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-54-turquesa.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Satinado/55azullirio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-55-azul-lirio.jpg",
              nombre: "Azul Lirio",
            },
            {
              img: "imgs/simu-colors/Satinado/56grosella.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-56-grosella.jpg",
              nombre: "Grosella",
            },
            {
              img: "imgs/simu-colors/Satinado/57verdetenis.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-57-verde-tenis.jpg",
              nombre: "Verde Tenis",
            },
            {
              img: "imgs/simu-colors/Satinado/58maiz.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-58-maiz.jpg",
              nombre: "Maíz",
            },
            {
              img: "imgs/simu-colors/Satinado/59rojovalicha.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-59-rojo-valicha.jpg",
              nombre: "Rojo Valicha",
            },
            {
              img: "imgs/simu-colors/Satinado/60marronsevillano.svg",
              roomImg:
                "imgs/simu-colors/tip-si/cocina_color/COCINA1-60-marron-sevillano.jpg",
              nombre: "Marrón Sevillano",
            },
          ],
          "Mate Duracolor": [
            {
              img: "imgs/simu-colors/Duracolor/1amarillo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-1-amarillo-DURACOLOR.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Duracolor/2amapola.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-2-amapola-DURACOLOR.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Duracolor/3orquidea.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-3-orquidea-DURACOLOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Duracolor/4blancoarena.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-4-blanco-arena-DURACOLOR.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Duracolor/5azul.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-5-azul-DURACOLOR.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Duracolor/6turquesa.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-6-turquesa-DURACOLOR.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Duracolor/7rojo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-7-rojo-DURACOLOR.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Duracolor/8amarilloocre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-8-amarillo-ocre-DURACOLOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Duracolor/9champagne.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-9-champagne-DURACOLOR.jpg",
              nombre: "Champagne",
            },
            {
              img: "imgs/simu-colors/Duracolor/10violeta.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-10-violeta-DURACOLOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Duracolor/11verdevibrante.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-11-verde-vibrante-DURACOLOR.jpg",
              nombre: "Verde Vibrante",
            },
            {
              img: "imgs/simu-colors/Duracolor/12alabastro.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-12-alabastro-DURACOLOR.jpg",
              nombre: "Alabastro",
            },
            {
              img: "imgs/simu-colors/Duracolor/13citron.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-13-citron-DURACOLOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Duracolor/14sunset.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-14-sunset-DURACOLOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Duracolor/15rojoteja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-15-rojo-teja-DURACOLOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Duracolor/16crema.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-16-crema-DURACOLOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Duracolor/17lacre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-17-lacre-DURACOLOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Duracolor/18mango.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-18-mango-DURACOLOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Duracolor/19damasco.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-19-damasco-DURACOLOR.jpg",
              nombre: "Damasco",
            },
            {
              img: "imgs/simu-colors/Duracolor/20salmon.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-20-salmon-DURACOLOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Duracolor/21marfil.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-21-marfil-DURACOLOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Duracolor/22blancohumo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-22-blanco-humo-DURACOLOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Duracolor/23rojopuca.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-23-rojo-puca-DURACOLOR.jpg",
              nombre: "Rojo Puca",
            },
            {
              img: "imgs/simu-colors/Duracolor/24granito.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-24-granito-DURACOLOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Duracolor/25naranja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-25-naranja-DURACOLOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Duracolor/26expresion.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-26-expresion-DURACOLOR.jpg",
              nombre: "Expresión",
            },
            {
              img: "imgs/simu-colors/Duracolor/27verdeesmeralda.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-27-verde-esmeralda-DURACOLOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Duracolor/28colonial.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-28-colonial-DURACOLOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Duracolor/29almendra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-29-almendra-DURACOLOR.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Duracolor/30verde.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-30-verde-DURACOLOR.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Duracolor/31celeste.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-31-celeste-DURACOLOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Duracolor/32blancoostra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-32-blanco-ostra-DURACOLOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Duracolor/33milano.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-33-milano-DURACOLOR.jpg",
              nombre: "Milano",
            },
            {
              img: "imgs/simu-colors/Duracolor/34ocaso.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-34-ocaso-DURACOLOR.jpg",
              nombre: "Ocaso",
            },
            {
              img: "imgs/simu-colors/Duracolor/35ambar.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/COCINA-DURACOLOR-900x500/COCINA1-DURACOLOR-35-ambar-DURACOLOR.jpg",
              nombre: "Ámbar",
            }
          ],
          "Mate Pintor": [
            {
              img: "imgs/simu-colors/Pintor/1-rojobandera.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-1-Rojo-Bandera-PINTOR.jpg",
              nombre: "Rojo Bandera",
            },
            {
              img: "imgs/simu-colors/Pintor/2-azulelectrico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-2-Azul-electrico-PINTOR.jpg",
              nombre: "Azul Eléctrico",
            },
            {
              img: "imgs/simu-colors/Pintor/3-violeta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-3-violeta-PINTOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Pintor/4-amarillo_md.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-4-amarillo-MD-PINTOR.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Pintor/5-verde_cana.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-5-Verde-Cana-PINTOR.jpg",
              nombre: "Verde Caña",
            },
            {
              img: "imgs/simu-colors/Pintor/6-magenta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-6-magenta-PINTOR.jpg",
              nombre: "Magenta",
            },
            {
              img: "imgs/simu-colors/Pintor/7-naranja_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-7-naranja-PINTOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Pintor/8-atlantis_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-8-atlantis-PINTOR.jpg",
              nombre: "Atlantis",
            },
            {
              img: "imgs/simu-colors/Pintor/9-sunset_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-9-sunset-PINTOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Pintor/10-verde_pino.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-10-verde-pino-PINTOR.jpg",
              nombre: "Verde Pino",
            },
            {
              img: "imgs/simu-colors/Pintor/11-amarillocromo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-11-amarillo-Cromo-PINTOR.jpg",
              nombre: "Amarillo Cromo",
            },
            {
              img: "imgs/simu-colors/Pintor/12-hierba_buena.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-12-Hierba-buena-PINTOR.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Pintor/13-celeste_sedapal.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-13-Celeste-sedapal-PINTOR.jpg",
              nombre: "Celeste Sedapal",
            },
            {
              img: "imgs/simu-colors/Pintor/14-verde_selva.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-14-Verde-Selva-PINTOR.jpg",
              nombre: "Verde Selva",
            },
            {
              img: "imgs/simu-colors/Pintor/15-amarillo_tropical.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-15-Amarillo-tropical-PINTOR.jpg",
              nombre: "Amarillo Tropical",
            },
            {
              img: "imgs/simu-colors/Pintor/16-salmon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-16-Salmon-PINTOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Pintor/17-blancohumo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-17-Blanco-humo-PINTOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Pintor/18-bengala.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-18-Bengala-PINTO.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Pintor/19-granito.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-19-Granito-PINTOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Pintor/20-verde_esmeralda.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-20-Verde-esmeralda-PINTOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Pintor/21-artico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-21-Artico-PINTOR.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Pintor/22-girasol.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-22-Girasol-PINTOR.jpg",
              nombre: "Girasol",
            },
            {
              img: "imgs/simu-colors/Pintor/23-albaricoque.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-23-Albaricoque-PINTOR.jpg",
              nombre: "Albaricoque",
            },
            {
              img: "imgs/simu-colors/Pintor/24-colonial.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-24-Colonial-PINTOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Pintor/25-blanco_ostra.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-25-Blanco-Ostra-PINTOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Pintor/26-lila.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-26-Lila-PINTOR.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Pintor/27-orquidea.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-27-Orquidea-PINTOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Pintor/28-rojoteja.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-28-Rojo-teja-PINTOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Pintor/29-lacre.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-29-lacre-PINTOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Pintor/30-gris_claro.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-30-Gris-Claro-PINTOR.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Pintor/31-marfil_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-31-Marfil-PINTOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Pintor/32-amarilloocre_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-32-Amarillo-Ocre-PINTOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Pintor/33-danubio_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-33-Danubio-PINTOR.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Pintor/34-sacha_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-34-Sacha-PINTOR.jpg",
              nombre: "Sacha",
            },
            {
              img: "imgs/simu-colors/Pintor/35-verde_nilo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-35-Verde-Nilo-PINTOR.jpg",
              nombre: "Verde Nilo",
            },
            {
              img: "imgs/simu-colors/Pintor/36-crema_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-36-Crema-PINTOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Pintor/37-citron_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-37-Citron-PINTO.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Pintor/38-tangelo_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-38-Tangelo-PINTOR.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Pintor/39-melon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-39-Melon-PINTOR.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Pintor/40-mango_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-40-Mango-PINTOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Pintor/41-celeste_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-41-Celeste-PINTOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Pintor/42-rosawawa.svg",
              roomImg: "imgs/simu-colors/Pintor-img/COCINA-PINTOR-900x500/COCINA1-PINTOR-42-Rosa-Wawa-PINTOR.jpg",
              nombre: "Rosa Wawa",
            },
          ],
        },
        baño: {
          // Similar estructura para baño
          Satinado: [
            {
              img: "imgs/simu-colors/Satinado/1mango.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-1-mango.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Satinado/2tangelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-2-tangelo.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Satinado/3granada.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-3-granada.jpg",
              nombre: "Granada",
            },
            {
              img: "imgs/simu-colors/Satinado/4lila.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-4-lila.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Satinado/5orquidea.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-5-orquidea.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Satinado/6pradera.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-6-pradera.jpg",
              nombre: "Pradera",
            },
            {
              img: "imgs/simu-colors/Satinado/7artico.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-7-artico.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Satinado/8indigo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-8-indigo.jpg",
              nombre: "Índigo",
            },
            {
              img: "imgs/simu-colors/Satinado/9crayola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-9-crayola.jpg",
              nombre: "Crayola",
            },
            {
              img: "imgs/simu-colors/Satinado/10eucalipto.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-10-eucalipto.jpg",
              nombre: "Eucalipto",
            },
            {
              img: "imgs/simu-colors/Satinado/11grishorizonte.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-11-gris-horizonte.jpg",
              nombre: "Gris Horizonte",
            },
            {
              img: "imgs/simu-colors/Satinado/12chamaya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-12-chamaya.jpg",
              nombre: "Chamaya",
            },
            {
              img: "imgs/simu-colors/Satinado/13verde.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-13-verde.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Satinado/14negro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-14-negro.jpg",
              nombre: "Negro",
            },
            {
              img: "imgs/simu-colors/Satinado/15mandarina.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-15-mandarina.jpg",
              nombre: "Mandarina",
            },
            {
              img: "imgs/simu-colors/Satinado/16tabacomedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-16-tabaco-medio.jpg",
              nombre: "Tabaco Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/17blancoperla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-17-blanco-perla.jpg",
              nombre: "Blanco Perla",
            },
            {
              img: "imgs/simu-colors/Satinado/18lacremedio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-18-lacre-medio.jpg",
              nombre: "Lacre Medio",
            },
            {
              img: "imgs/simu-colors/Satinado/19rosadonatural.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-19-rosado-natural.jpg",
              nombre: "Rosa Natural",
            },
            {
              img: "imgs/simu-colors/Satinado/20azulbohemio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-20-azul-bohemio.jpg",
              nombre: "Azul Bohemio",
            },
            {
              img: "imgs/simu-colors/Satinado/21blancohumo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-21-blanco-humo.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Satinado/22verdeclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-22-verde-claro.jpg",
              nombre: "Verde Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/23costadeoro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-23-costa-de-oro.jpg",
              nombre: "Costa de Oro",
            },
            {
              img: "imgs/simu-colors/Satinado/23rojoteja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-24-rojo-teja.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Satinado/25bengala.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-25-bengala.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Satinado/26rojo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-26-rojo.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Satinado/27melon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-27-melon.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Satinado/28blancoarena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-28-blanco-arena.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Satinado/29azul.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-29-azul.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Satinado/30lacre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-30-lacre.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Satinado/31almendra.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-31-almendra.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Satinado/32hierbabuena.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-32-hierba-buena.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Satinado/33canelo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-33-canelo.jpg",
              nombre: "Canelo",
            },
            {
              img: "imgs/simu-colors/Satinado/34sunset.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-34-sunset.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Satinado/35miel.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-35-miel.jpg",
              nombre: "Miel",
            },
            {
              img: "imgs/simu-colors/Satinado/36lucuma.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-36-lucuma.jpg",
              nombre: "Lúcuma",
            },
            {
              img: "imgs/simu-colors/Satinado/37amarillomd.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-37-amarillo-MD.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Satinado/38grisclaro.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-38-gris-claro.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Satinado/39danubio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-39-Danubio.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Satinado/40crema.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-40-crema.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Satinado/41blancohueso.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-41-blanco-hueso.jpg",
              nombre: "Blanco Hueso",
            },
            {
              img: "imgs/simu-colors/Satinado/41margarita.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-42-margarita.jpg",
              nombre: "Margarita",
            },
            {
              img: "imgs/simu-colors/Satinado/43bambu.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-43-bambu.jpg",
              nombre: "Bambú",
            },
            {
              img: "imgs/simu-colors/Satinado/44naranja.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-44-naranja.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Satinado/45salmon.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-45-salmon.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Satinado/46maracuya.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-46-maracuya.jpg",
              nombre: "Maracuyá",
            },
            {
              img: "imgs/simu-colors/Satinado/47cochinilla.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-47-cochinilla.jpg",
              nombre: "Cochinilla",
            },
            {
              img: "imgs/simu-colors/Satinado/48amarillo.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-48-amarillo.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Satinado/49amarilloocre.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-49-amarillo-ocre.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Satinado/50marfil.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-50-marfil.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Satinado/51amapola.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-51-amapola.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Satinado/52violeta.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-52-violeta.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Satinado/53citron.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-53-citron.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Satinado/54turquesa.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-54-turquesa.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Satinado/55azullirio.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-55-azul-lirio.jpg",
              nombre: "Azul Lirio",
            },
            {
              img: "imgs/simu-colors/Satinado/56grosella.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-56-grosella.jpg",
              nombre: "Grosella",
            },
            {
              img: "imgs/simu-colors/Satinado/57verdetenis.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-57-verde-tenis.jpg",
              nombre: "Verde Tenis",
            },
            {
              img: "imgs/simu-colors/Satinado/58maiz.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-58-maiz.jpg",
              nombre: "Maíz",
            },
            {
              img: "imgs/simu-colors/Satinado/59rojovalicha.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-59-rojo-valicha.jpg",
              nombre: "Rojo Valicha",
            },
            {
              img: "imgs/simu-colors/Satinado/60marronsevillano.svg",
              roomImg:
                "imgs/simu-colors/tip-si/BANO2-900X500/BANO2-60-marron-sevillano.jpg",
              nombre: "Marrón Sevillano",
            },
          ],
          "Mate Duracolor": [
            {
              img: "imgs/simu-colors/Duracolor/1amarillo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-1-amarillo-DURACOLOR.jpg",
              nombre: "Amarillo",
            },
            {
              img: "imgs/simu-colors/Duracolor/2amapola.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-2-amapola-DURACOLOR.jpg",
              nombre: "Amapola",
            },
            {
              img: "imgs/simu-colors/Duracolor/3orquidea.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-3-orquidea-DURACOLOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Duracolor/4blancoarena.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-4-blanco-arena-DURACOLOR.jpg",
              nombre: "Blanco Arena",
            },
            {
              img: "imgs/simu-colors/Duracolor/5azul.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-5-azul-DURACOLOR.jpg",
              nombre: "Azul",
            },
            {
              img: "imgs/simu-colors/Duracolor/6turquesa.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-6-turquesa-DURACOLOR.jpg",
              nombre: "Turquesa",
            },
            {
              img: "imgs/simu-colors/Duracolor/7rojo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-7-rojo-DURACOLOR.jpg",
              nombre: "Rojo",
            },
            {
              img: "imgs/simu-colors/Duracolor/8amarilloocre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-8-amarillo-ocre-DURACOLOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Duracolor/9champagne.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-9-champagne-DURACOLOR.jpg",
              nombre: "Champagne",
            },
            {
              img: "imgs/simu-colors/Duracolor/10violeta.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-10-violeta-DURACOLOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Duracolor/11verdevibrante.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-11-verde-vibrante-DURACOLOR.jpg",
              nombre: "Verde Vibrante",
            },
            {
              img: "imgs/simu-colors/Duracolor/12alabastro.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-12-alabastro-DURACOLOR.jpg",
              nombre: "Alabastro",
            },
            {
              img: "imgs/simu-colors/Duracolor/13citron.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-13-citron-DURACOLOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Duracolor/14sunset.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-14-sunset-DURACOLOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Duracolor/15rojoteja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-15-rojo-teja-DURACOLOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Duracolor/16crema.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-16-crema-DURACOLOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Duracolor/17lacre.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-17-lacre-DURACOLOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Duracolor/18mango.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-18-mango-DURACOLOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Duracolor/19damasco.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-19-damasco-DURACOLOR.jpg",
              nombre: "Damasco",
            },
            {
              img: "imgs/simu-colors/Duracolor/20salmon.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-20-salmon-DURACOLOR.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Duracolor/21marfil.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-21-marfil-DURACOLOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Duracolor/22blancohumo.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-22-blanco-humo-DURACOLOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Duracolor/23rojopuca.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-23-rojo-puca-DURACOLOR.jpg",
              nombre: "Rojo Puca",
            },
            {
              img: "imgs/simu-colors/Duracolor/24granito.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-24-granito-DURACOLOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Duracolor/25naranja.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-25-naranja-DURACOLOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Duracolor/26expresion.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-26-expresion-DURACOLOR.jpg",
              nombre: "Expresión",
            },
            {
              img: "imgs/simu-colors/Duracolor/27verdeesmeralda.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-27-verde-esmeralda-DURACOLOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Duracolor/28colonial.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-28-colonial-DURACOLOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Duracolor/29almendra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-29-almendra-DURACOLOR.jpg",
              nombre: "Almendra",
            },
            {
              img: "imgs/simu-colors/Duracolor/30verde.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-30-verde-DURACOLOR.jpg",
              nombre: "Verde",
            },
            {
              img: "imgs/simu-colors/Duracolor/31celeste.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-31-celeste-DURACOLOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Duracolor/32blancoostra.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-32-blanco-ostra-DURACOLOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Duracolor/33milano.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-33-milano-DURACOLOR.jpg",
              nombre: "Milano",
            },
            {
              img: "imgs/simu-colors/Duracolor/34ocaso.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-34-ocaso-DURACOLOR.jpg",
              nombre: "Ocaso",
            },
            {
              img: "imgs/simu-colors/Duracolor/35ambar.svg",
              roomImg: "imgs/simu-colors/Duracolor-img/BANO-DURACOLOR-900x500/BANO2-DURACOLOR-35-ambar-DURACOLOR.jpg",
              nombre: "Ámbar",
            }
          ],
          "Mate Pintor": [
            {
              img: "imgs/simu-colors/Pintor/1-rojobandera.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-1-Rojo-Bandera-PINTOR.jpg",
              nombre: "Rojo Bandera",
            },
            {
              img: "imgs/simu-colors/Pintor/2-azulelectrico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-2-Azul-electrico-PINTOR.jpg",
              nombre: "Azul Eléctrico",
            },
            {
              img: "imgs/simu-colors/Pintor/3-violeta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-3-violeta-PINTOR.jpg",
              nombre: "Violeta",
            },
            {
              img: "imgs/simu-colors/Pintor/4-amarillo_md.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-4-amarillo-MD-PINTOR.jpg",
              nombre: "Amarillo MD",
            },
            {
              img: "imgs/simu-colors/Pintor/5-verde_cana.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-5-Verde-Cana-PINTOR.jpg",
              nombre: "Verde Caña",
            },
            {
              img: "imgs/simu-colors/Pintor/6-magenta_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-6-magenta-PINTOR.jpg",
              nombre: "Magenta",
            },
            {
              img: "imgs/simu-colors/Pintor/7-naranja_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-7-naranja-PINTOR.jpg",
              nombre: "Naranja",
            },
            {
              img: "imgs/simu-colors/Pintor/8-atlantis_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-8-atlantis-PINTOR.jpg",
              nombre: "Atlantis",
            },
            {
              img: "imgs/simu-colors/Pintor/9-sunset_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-9-sunset-PINTOR.jpg",
              nombre: "Sunset",
            },
            {
              img: "imgs/simu-colors/Pintor/10-verde_pino.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-10-verde-pino-PINTOR.jpg",
              nombre: "Verde Pino",
            },
            {
              img: "imgs/simu-colors/Pintor/11-amarillocromo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-11-amarillo-Cromo-PINTOR.jpg",
              nombre: "Amarillo Cromo",
            },
            {
              img: "imgs/simu-colors/Pintor/12-hierba_buena.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-12-Hierba-buena-PINTOR.jpg",
              nombre: "Hierba Buena",
            },
            {
              img: "imgs/simu-colors/Pintor/13-celeste_sedapal.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-13-Celeste-sedapal-PINTOR.jpg",
              nombre: "Celeste Sedapal",
            },
            {
              img: "imgs/simu-colors/Pintor/14-verde_selva.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-14-Verde-Selva-PINTOR.jpg",
              nombre: "Verde Selva",
            },
            {
              img: "imgs/simu-colors/Pintor/15-amarillo_tropical.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-15-Amarillo-tropical-PINTOR.jpg",
              nombre: "Amarillo Tropical",
            },
            {
              img: "imgs/simu-colors/Pintor/16-salmon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-16-Salmon-PINTO.jpg",
              nombre: "Salmón",
            },
            {
              img: "imgs/simu-colors/Pintor/17-blancohumo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-17-Blanco-humo-PINTOR.jpg",
              nombre: "Blanco Humo",
            },
            {
              img: "imgs/simu-colors/Pintor/18-bengala.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-18-Bengala-PINTO.jpg",
              nombre: "Bengala",
            },
            {
              img: "imgs/simu-colors/Pintor/19-granito.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-19-Granito-PINTOR.jpg",
              nombre: "Granito",
            },
            {
              img: "imgs/simu-colors/Pintor/20-verde_esmeralda.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-20-Verde-esmeralda-PINTOR.jpg",
              nombre: "Verde Esmeralda",
            },
            {
              img: "imgs/simu-colors/Pintor/21-artico.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-21-Artico-PINTOR.jpg",
              nombre: "Ártico",
            },
            {
              img: "imgs/simu-colors/Pintor/22-girasol.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-22-Girasol-PINTOR.jpg",
              nombre: "Girasol",
            },
            {
              img: "imgs/simu-colors/Pintor/23-albaricoque.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-23-Albaricoque-PINTOR.jpg",
              nombre: "Albaricoque",
            },
            {
              img: "imgs/simu-colors/Pintor/24-colonial.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-24-Colonial-PINTOR.jpg",
              nombre: "Colonial",
            },
            {
              img: "imgs/simu-colors/Pintor/25-blanco_ostra.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-25-Blanco-Ostra-PINTOR.jpg",
              nombre: "Blanco Ostra",
            },
            {
              img: "imgs/simu-colors/Pintor/26-lila.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-26-Lila-PINTOR.jpg",
              nombre: "Lila",
            },
            {
              img: "imgs/simu-colors/Pintor/27-orquidea.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-27-Orquidea-PINTOR.jpg",
              nombre: "Orquídea",
            },
            {
              img: "imgs/simu-colors/Pintor/28-rojoteja.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-28-Rojo-teja-PINTOR.jpg",
              nombre: "Rojo Teja",
            },
            {
              img: "imgs/simu-colors/Pintor/29-lacre.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-29-lacre-PINTOR.jpg",
              nombre: "Lacre",
            },
            {
              img: "imgs/simu-colors/Pintor/30-gris_claro.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-30-Gris-Claro-PINTOR.jpg",
              nombre: "Gris Claro",
            },
            {
              img: "imgs/simu-colors/Pintor/31-marfil_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-31-Marfil-PINTOR.jpg",
              nombre: "Marfil",
            },
            {
              img: "imgs/simu-colors/Pintor/32-amarilloocre_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-32-Amarillo-Ocre-PINTOR.jpg",
              nombre: "Amarillo Ocre",
            },
            {
              img: "imgs/simu-colors/Pintor/33-danubio_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-33-Danubio-PINTOR.jpg",
              nombre: "Danubio",
            },
            {
              img: "imgs/simu-colors/Pintor/34-sacha_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-34-Sacha-PINTOR.jpg",
              nombre: "Sacha",
            },
            {
              img: "imgs/simu-colors/Pintor/35-verde_nilo.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-35-Verde-Nilo-PINTOR.jpg",
              nombre: "Verde Nilo",
            },
            {
              img: "imgs/simu-colors/Pintor/36-crema_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-36-Crema-PINTOR.jpg",
              nombre: "Crema",
            },
            {
              img: "imgs/simu-colors/Pintor/37-citron_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-37-Citron-PINTOR.jpg",
              nombre: "Citrón",
            },
            {
              img: "imgs/simu-colors/Pintor/38-tangelo_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-38-Tangelo-PINTOR.jpg",
              nombre: "Tangelo",
            },
            {
              img: "imgs/simu-colors/Pintor/39-melon_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-39-Melon-PINTOR.jpg",
              nombre: "Melón",
            },
            {
              img: "imgs/simu-colors/Pintor/40-mango_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-40-Mango-PINTOR.jpg",
              nombre: "Mango",
            },
            {
              img: "imgs/simu-colors/Pintor/41-celeste_1.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-41-Celeste-PINTOR.jpg",
              nombre: "Celeste",
            },
            {
              img: "imgs/simu-colors/Pintor/42-rosawawa.svg",
              roomImg: "imgs/simu-colors/Pintor-img/BANO-PINTOR-900x500/BANO2-PINTOR-42-Rosa-Wawa-PINTOR.jpg",
              nombre: "Rosa Wawa",
            },
          ],
        },
      };
      function obtenerColoresActuales(tipoProducto) {
        // Si existe la configuración para esta habitación y este tipo de producto
        if (
          coloresPorHabitacion[habitacionActual] &&
          coloresPorHabitacion[habitacionActual][tipoProducto]
        ) {
          return coloresPorHabitacion[habitacionActual][tipoProducto];
        }

        // Si no existe, usa los de fachada como fallback
        if (coloresPorHabitacion["fachada"][tipoProducto]) {
          return coloresPorHabitacion["fachada"][tipoProducto];
        }

        // Si tampoco existe para fachada, retorna array vacío
        return [];
      }
      // Función para versión escritorio
      function crearCarrusel(colores) {
        const wrapper = document.querySelector(".colores-wrapper");
        wrapper.innerHTML = "";

        const carouselContainer = document.createElement("div");
        carouselContainer.className = "carousel-container";
        carouselContainer.style.cssText = `
      display: flex;
      align-items: center;
      width: 100%;
      position: relative;
      padding: 10px 0;
    `;

        const leftArrow = document.createElement("button");
        leftArrow.innerHTML = "&#10094;";
        leftArrow.className = "carousel-arrow left-arrow";
        leftArrow.style.cssText = `
      position: absolute;
      left: 10px;
      background: white;
      border: none;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      cursor: pointer;
      z-index: 2;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #0d3393;
      font-size: 18px;
    `;

        const rightArrow = document.createElement("button");
        rightArrow.innerHTML = "&#10095;";
        rightArrow.className = "carousel-arrow right-arrow";
        rightArrow.style.cssText = leftArrow.style.cssText;
        rightArrow.style.left = "auto";
        rightArrow.style.right = "10px";

        const colorGrid = document.createElement("div");
        colorGrid.className = "color-grid";
        colorGrid.style.cssText = `
      display: grid;
      grid-template-columns: repeat(12, minmax(30px, 1fr));
      gap: 15px;
      padding: 0 50px;
      margin: 0 auto;
      width: calc(100% - 100px);
    `;

        let currentPage = 0;
        const colorsPerPage = 12;
        const totalPages = Math.ceil(colores.length / colorsPerPage);

        function showPage(page) {
          colorGrid.innerHTML = "";
          const start = page * colorsPerPage;
          const end = Math.min(start + colorsPerPage, colores.length);

          for (let i = start; i < end; i++) {
            const color = colores[i];
            const colorDiv = document.createElement("div");
            colorDiv.className = "color-option";
            colorDiv.setAttribute("data-color-name", color.nombre);
            colorDiv.style.cssText = `
          width: 30px;
          height: 30px;
          border-radius: 5px;
          cursor: pointer;
          transition: transform 0.2s;
          position: relative;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        `;

            const img = document.createElement("img");
            img.src = color.img;
            img.alt = color.nombre;
            img.style.width = "100%";
            img.style.height = "100%";

            const tooltip = document.createElement("div");
            tooltip.className = "color-tooltip";
            tooltip.textContent = color.nombre;
            tooltip.style.cssText = `
          position: absolute;
          bottom: 100%;
          left: 50%;
          transform: translateX(-50%);
          padding: 4px 8px;
          background-color: white;
          color: #0d3393;
          font-size: 12px;
          white-space: nowrap;
          border-radius: 4px;
          opacity: 0;
          visibility: hidden;
          transition: opacity 0.2s;
          z-index: 1000;
          margin-bottom: 5px;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        `;

            colorDiv.addEventListener("click", () => {
              imagenHabitacion.classList.add("fading");
              setTimeout(() => {
                if (color.roomImg) {
                  imagenHabitacion.src = color.roomImg;
                }
                setTimeout(() => {
                  imagenHabitacion.classList.remove("fading");
                }, 50);
              }, 300);
            });

            colorDiv.appendChild(img);
            colorDiv.appendChild(tooltip);

            colorDiv.addEventListener("mouseenter", () => {
              tooltip.style.opacity = "1";
              tooltip.style.visibility = "visible";
            });

            colorDiv.addEventListener("mouseleave", () => {
              tooltip.style.opacity = "0";
              tooltip.style.visibility = "hidden";
            });

            colorGrid.appendChild(colorDiv);
          }

          leftArrow.style.visibility = page === 0 ? "hidden" : "visible";
          rightArrow.style.visibility =
            page === totalPages - 1 ? "hidden" : "visible";
        }

        leftArrow.addEventListener("click", () => {
          if (currentPage > 0) {
            currentPage--;
            showPage(currentPage);
          }
        });

        rightArrow.addEventListener("click", () => {
          if (currentPage < totalPages - 1) {
            currentPage++;
            showPage(currentPage);
          }
        });

        carouselContainer.appendChild(leftArrow);
        carouselContainer.appendChild(colorGrid);
        carouselContainer.appendChild(rightArrow);
        wrapper.appendChild(carouselContainer);

        showPage(0);
      }

      // Función para versión móvil
      function crearBarraColoresMobile(colores) {
        const barraExistente = document.querySelector(
          ".barra-colores-mobile"
        );
        if (barraExistente) {
          barraExistente.remove();
        }

        const barraMobile = document.createElement("div");
        barraMobile.className = "barra-colores-mobile";

        // Contenedor principal del carrusel
        const carouselContainer = document.createElement("div");
        carouselContainer.className = "carousel-container-mobile";

        // Botón izquierdo
        const leftButton = document.createElement("button");
        leftButton.className = "carousel-button-mobile left";
        leftButton.innerHTML = "&#10094;";

        // Botón derecho
        const rightButton = document.createElement("button");
        rightButton.className = "carousel-button-mobile right";
        rightButton.innerHTML = "&#10095;";

        // Contenedor de los colores
        const colorContainer = document.createElement("div");
        colorContainer.className = "color-grid-mobile";

        // Variables para el carrusel
        let currentPage = 0;
        const colorsPerPage = window.innerWidth <= 480 ? 3 : 4;

        const totalPages = Math.ceil(colores.length / colorsPerPage);

        // Función para mostrar los colores de la página actual
        function showColors(page) {
          colorContainer.innerHTML = "";
          const start = page * colorsPerPage;
          const end = Math.min(start + colorsPerPage, colores.length);

          for (let i = start; i < end; i++) {
            const color = colores[i];
            const colorDiv = document.createElement("div");
            colorDiv.className = "color-option-mobile";

            const colorImg = document.createElement("img");
            colorImg.src = color.img;
            colorImg.alt = color.nombre;

            const colorName = document.createElement("span");
            colorName.className = "color-name-mobile";
            colorName.textContent = color.nombre;

            colorDiv.appendChild(colorImg);
            colorDiv.appendChild(colorName);

            colorDiv.addEventListener("click", () => {
              imagenHabitacion.classList.add("fading");
              setTimeout(() => {
                if (color.roomImg) {
                  imagenHabitacion.src = color.roomImg;
                }
                setTimeout(() => {
                  imagenHabitacion.classList.remove("fading");
                }, 50);
              }, 300);
            });

            colorContainer.appendChild(colorDiv);
          }

          // Actualizar visibilidad de los botones
          leftButton.style.display = page === 0 ? "none" : "flex";
          rightButton.style.display =
            page === totalPages - 1 ? "none" : "flex";
        }

        // Event listeners para los botones
        leftButton.addEventListener("click", () => {
          if (currentPage > 0) {
            currentPage--;
            showColors(currentPage);
          }
        });

        rightButton.addEventListener("click", () => {
          if (currentPage < totalPages - 1) {
            currentPage++;
            showColors(currentPage);
          }
        });

        // Agregar los elementos al DOM
        carouselContainer.appendChild(leftButton);
        carouselContainer.appendChild(colorContainer);
        carouselContainer.appendChild(rightButton);
        barraMobile.appendChild(carouselContainer);

        // Mostrar la primera página
        showColors(0);

        const visualizador = document.querySelector(
          ".visualizador-habitacion"
        );
        visualizador.after(barraMobile);

        // Agregar estilos dinámicamente
        const styles = document.createElement("style");
        styles.textContent = `
      .barra-colores-mobile {
        width: 100%;
        background: white;
        padding: 20px 0;
        margin-top: 20px;
        border: 1px solid #0d3393;
        border-radius: 10px;
      }
      
      .carousel-container-mobile {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 40px;
        background: white;
        margin: 0 15px;
      }
      
      .carousel-button-mobile {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        border: none;
        border-radius: 50%;
        background: white;
        color: #0d3393;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        z-index: 2;
      }
      
      .carousel-button-mobile.left {
        left: 5px;
      }
      
      .carousel-button-mobile.right {
        right: 5px;
      }
      
      .color-grid-mobile {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        width: 100%;
      }
      
      .color-option-mobile {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
      }
      
      .color-option-mobile img {
        width: 55px;
        height: 55px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      
      .color-name-mobile {
        font-size: 12px;
        color: #0d3393;
        text-align: center;
        margin-top: 4px;
      }
    `;

        document.head.appendChild(styles);

        return barraMobile;
      }

      // Manejo de eventos para los botones de ver colores
      botonesVerColores.forEach((boton) => {
        boton.addEventListener("click", function () {
          const productoContainer = this.closest(".contenedor-producto");
          const productoImg = productoContainer.querySelector("img");
          const nombreProducto = productoImg.alt;
          const esMobile = window.innerWidth <= 790;

          // Usar la función para obtener los colores actuales según la habitación
          let coloresActuales;

          // Obtener los colores para la habitación y producto actuales
          coloresActuales = obtenerColoresActuales(nombreProducto);

          if (coloresActuales.length > 0) {
            if (esMobile) {
              const barraMobile = crearBarraColoresMobile(coloresActuales);
              barraColores.classList.remove("visible");
              barraMobile.style.display = "block";
            } else {
              crearCarrusel(coloresActuales);
              barraColores.classList.add("visible");
              const barraMobile = document.querySelector(
                ".barra-colores-mobile"
              );
              if (barraMobile) barraMobile.style.display = "none";
            }
          }

          botonesVerColores.forEach((b) => {
            if (b !== boton) b.classList.remove("activo");
          });
          this.classList.toggle("activo");

          if (!this.classList.contains("activo")) {
            barraColores.classList.remove("visible");
            const barraMobile = document.querySelector(
              ".barra-colores-mobile"
            );
            if (barraMobile) barraMobile.style.display = "none";
          }
        });
      });

      // Manejo del botón cerrar
      const botonCerrar = document.querySelector(".cerrar-colores");
      botonCerrar.addEventListener("click", function () {
        barraColores.classList.remove("visible");
        botonesVerColores.forEach((boton) =>
          boton.classList.remove("activo")
        );
      });

      // Manejo de resize
      window.addEventListener("resize", () => {
        const esMobile = window.innerWidth <= 790;
        const barraMobile = document.querySelector(".barra-colores-mobile");
        const barraDesktop = document.querySelector(".barra-colores");

        if (esMobile) {
          if (barraDesktop.classList.contains("visible")) {
            barraDesktop.classList.remove("visible");
            if (barraMobile) barraMobile.style.display = "block";
          }
        } else {
          if (barraMobile && barraMobile.style.display === "block") {
            barraMobile.style.display = "none";
            barraDesktop.classList.add("visible");
          }
        }
      });

      // Estilos adicionales
      const styles = `
    .barra-colores {
      position: absolute;
      top: 30px;
      left: 16px;
      right: 16px;
      background-color: rgba(255, 255, 255, 0.6);
      padding: 8px 40px;
      border-radius: 8px;
      display: none;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .carousel-arrow:hover {
      background-color: #f8f9fa;
      transform: scale(1.1);
      transition: all 0.2s ease;
    }

    @media screen and (max-width: 750px) {
      .barra-colores {
        display: none !important;
      }
      
      .barra-colores-mobile {
        -webkit-overflow-scrolling: touch;
      }
      
      .barra-colores-mobile .carousel-mobile::-webkit-scrollbar {
        display: none;
      }
    }
  `;

      const styleSheet = document.createElement("style");
      styleSheet.textContent = styles;
      document.head.appendChild(styleSheet);

      // Manejo de cambio de habitación
      const opcionesMenu = document.querySelectorAll(".opcion-menu");

      opcionesMenu.forEach((opcion) => {
        opcion.addEventListener("click", function () {
          // Actualizar la habitación actual
          const tipoHabitacion =
            this.querySelector("span").textContent.toLowerCase();
          habitacionActual = tipoHabitacion;

          // Actualizar la imagen base de la habitación
          if (imagenesHabitacionesBase[habitacionActual]) {
            imagenHabitacion.src =
              imagenesHabitacionesBase[habitacionActual];
          }

          // Cerrar la paleta de colores si está abierta
          barraColores.classList.remove("visible");
          const barraMobile = document.querySelector(
            ".barra-colores-mobile"
          );
          if (barraMobile) barraMobile.style.display = "none";

          // Quitar la selección de todos los botones de ver colores
          botonesVerColores.forEach((boton) =>
            boton.classList.remove("activo")
          );
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
      const opcionesMenu = document.querySelectorAll(".opcion-menu");
      const imagenHabitacion = document.getElementById("imagen-habitacion");

      // Mapeo de habitaciones a sus respectivas imágenes
      const imagenesHabitaciones = {
        fachada: "imgs/Simulador/menu_img/FACHADA3-0.jpg",
        sala: "imgs/simu-colors/tip-si/sala_color/SALA1-0.jpg",
        dormitorio:
          "imgs/simu-colors/tip-si/dormitorio_color/DORMITORIO1-0.jpg",
        comedor: "imgs/simu-colors/tip-si/comedor_color/COMEDOR2-0.jpg",
        cocina: "imgs/simu-colors/tip-si/cocina_color/COCINA1-0.jpg",
        baño: "imgs/simu-colors/tip-si/bano_color/BANO2-0.jpg",
      };

      // Manejar selección de habitación
      opcionesMenu.forEach((opcion) => {
        opcion.addEventListener("click", function () {
          // Remover clase activo de todas las opciones
          opcionesMenu.forEach((op) => op.classList.remove("activo"));

          // Agregar clase activo a la opción seleccionada
          this.classList.add("activo");

          // Cambiar imagen de habitación
          const habitacion =
            this.querySelector("span").textContent.toLowerCase();
          if (imagenesHabitaciones[habitacion]) {
            imagenHabitacion.src = imagenesHabitaciones[habitacion];
          }
        });
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
      const menuLateral = document.querySelector(".menu-lateral");
      const opcionesMenu = document.querySelectorAll(".opcion-menu");


      function aplicarEstilosMobile() {
        if (window.innerWidth <= 790) {
          // Aplicar estilos al contenedor del menú
          menuLateral.style.cssText = `
        width: 120%;
        margin: 0;
        padding: 10px 5px;
        display: flex;
        justify-content: flex-start; /* Cambio a flex-start para alinear desde el inicio */
        gap: 15px;
        overflow-x: auto;
        overflow-y: hidden; /* Asegurar que no haya scroll vertical */
        background-color: #f3f3f3;
        position: sticky;
        top: 0;
        z-index: 100;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE y Edge */
        -webkit-overflow-scrolling: touch; /* Scroll suave en iOS */
      `;

          // Ocultar la scrollbar para Chrome, Safari y Opera
          menuLateral.style.scrollbarWidth = "none";
          menuLateral.style.msOverflowStyle = "none";

          // Agregar scrollIndicator (opcional, para indicar que hay más contenido)
          let scrollIndicator = document.querySelector('.menu-scroll-indicator');
          if (!scrollIndicator) {
            scrollIndicator = document.createElement('div');
            scrollIndicator.className = 'menu-scroll-indicator';
            scrollIndicator.style.cssText = `
          position: absolute;
          top: 0;
          right: 0;
          width: 30px;
          height: 100%;
          pointer-events: none;
          z-index: 101;
        `;
            menuLateral.parentNode.appendChild(scrollIndicator);
          }

          // Estilos para los círculos de opciones
          opcionesMenu.forEach((opcion) => {
            // Guardar el texto original
            const texto = opcion.querySelector("span").textContent;
            const esActivo = opcion.classList.contains("activo");

            opcion.style.cssText = `
                    width: 60px;
                    height: 60px;
                    flex-shrink: 0;
                    border-radius: 50%;
                    background-color: ${esActivo ? "#0d3393" : "white"};
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                    padding: 0;
                    margin: 0;
                    transition: all 0.3s ease;
                `;

            const img = opcion.querySelector("img");
            img.style.cssText = `
                    width: 36px;
                    height: 36px;
                    margin: 0;
                    transition: opacity 0.3s ease;
                    opacity: ${esActivo ? "0" : "1"};
                    filter: ${esActivo
                ? "brightness(0) invert(1)"
                : "brightness(0) saturate(100%) invert(18%) sepia(90%) saturate(2645%) hue-rotate(218deg) brightness(94%) contrast(101%)"
              };
                `;

            const span = opcion.querySelector("span");
            span.style.cssText = `
                    position: absolute;
                    font-size: 10px;
                    color: ${esActivo ? "white" : "#0d3393"};
                    opacity: ${esActivo ? "1" : "0"};
                    margin: 0;
                    transition: opacity 0.3s ease;
                `;

            // Evento click
            opcion.addEventListener("click", function () {
              opcionesMenu.forEach((op) => {
                const opImg = op.querySelector("img");
                const opSpan = op.querySelector("span");

                op.style.backgroundColor = "white";
                opImg.style.opacity = "1";
                opImg.style.filter =
                  "brightness(0) saturate(100%) invert(18%) sepia(90%) saturate(2645%) hue-rotate(218deg) brightness(94%) contrast(101%)";
                opSpan.style.opacity = "0";
                opSpan.style.color = "#0d3393";
              });

              this.style.backgroundColor = "#0d3393";
              img.style.opacity = "0";
              span.style.opacity = "1";
              span.style.color = "white";
            });
          });

          // Scroll hacia la opción activa (si existe)
          const opcionActiva = menuLateral.querySelector('.opcion-menu.activo');
          if (opcionActiva) {
            // Desactivar temporalmente la transición suave
            menuLateral.style.scrollBehavior = 'auto';

            // Si es la primera opción, scroll al inicio
            if (opcionActiva === opcionesMenu[0]) {
              menuLateral.scrollLeft = 0;
            } else {
              // Calcular la posición para centrar el elemento activo
              const offset = opcionActiva.offsetLeft - (menuLateral.clientWidth - opcionActiva.offsetWidth) / 2;
              menuLateral.scrollLeft = Math.max(0, offset);
            }

            // Volver a activar la transición suave después de un pequeño retraso
            setTimeout(() => {
              menuLateral.style.scrollBehavior = 'smooth';
            }, 100);
          } else {
            // Si no hay ninguna opción activa, activar la primera por defecto (Fachada)
            if (opcionesMenu.length > 0) {
              const primeraOpcion = opcionesMenu[0];
              primeraOpcion.classList.add('activo');
              primeraOpcion.click(); // Simular click para aplicar estilos
              menuLateral.scrollLeft = 0; // Scroll al inicio
            }
          }

          // Eliminar el scrollbar para Chrome, Safari y Opera
          const style = document.createElement('style');
          style.innerHTML = `
        .menu-lateral::-webkit-scrollbar {
          display: none;
          width: 0;
          height: 0;
        }
      `;
          document.head.appendChild(style);

        } else {
          // Restaurar estilos para desktop
          menuLateral.style = "";
          opcionesMenu.forEach((opcion) => {
            opcion.style = "";
            opcion.querySelector("img").style = "";
            opcion.querySelector("span").style = "";
          });

          // Eliminar indicador de scroll si existe
          const scrollIndicator = document.querySelector('.menu-scroll-indicator');
          if (scrollIndicator) {
            scrollIndicator.remove();
          }
        }
      }

      // Asegurar que siempre haya una opción activa (inicialmente Fachada)
      const asegurarOpcionActiva = () => {
        const opcionActiva = document.querySelector('.opcion-menu.activo');
        if (!opcionActiva && opcionesMenu.length > 0) {
          opcionesMenu[0].classList.add('activo');
        }
      };

      // Aplicar estilos iniciales
      asegurarOpcionActiva();
      aplicarEstilosMobile();


      // Actualizar en resize
      window.addEventListener("resize", function () {
        aplicarEstilosMobile();
        if (window.innerWidth > 750) {
          ocultarTextosEnDesktop();
        }
      });
    });
    // Añadir flechas a los contenedores de productos
    document.addEventListener("DOMContentLoaded", function () {
      // Seleccionar todos los contenedores de producto
      const contenedoresProducto = document.querySelectorAll('.contenedor-producto');

      // Para cada contenedor, añadir un elemento flecha
      contenedoresProducto.forEach(contenedor => {
        const flecha = document.createElement('div');
        flecha.className = 'flecha-indicadora';
        // Insertar la flecha después de la imagen pero antes del botón
        contenedor.insertBefore(flecha, contenedor.querySelector('.btn-ver-colores'));
      });

      // Modificar el comportamiento del botón Ver Colores
      const botonesVerColores = document.querySelectorAll('.btn-ver-colores');

      botonesVerColores.forEach(boton => {
        boton.addEventListener('click', function () {
          // Obtener el contenedor padre
          const contenedor = this.closest('.contenedor-producto');
          // Obtener la flecha de este contenedor
          const flecha = contenedor.querySelector('.flecha-indicadora');

          // Si el botón está activo, mostrar la flecha; si no, ocultarla
          if (this.classList.contains('activo')) {
            flecha.style.opacity = '1';
            flecha.style.transform = 'translateY(0) scale(1)';
          } else {
            flecha.style.opacity = '0';
            flecha.style.transform = 'translateY(-10px) scale(0.8)';
          }

          // Ocultar todas las demás flechas
          document.querySelectorAll('.flecha-indicadora').forEach(f => {
            if (f !== flecha) {
              f.style.opacity = '0';
              f.style.transform = 'translateY(-10px) scale(0.8)';
            }
          });
        });
      });
    });
    // Añadir al manejador del botón cerrar
    const botonCerrar = document.querySelector('.cerrar-colores');
    botonCerrar.addEventListener('click', function () {
      // Ocultar todas las flechas cuando se cierra la barra
      document.querySelectorAll('.flecha-indicadora').forEach(flecha => {
        flecha.style.opacity = '0';
        flecha.style.transform = 'translateY(-10px) scale(0.8)';
      });

      // También quitar la clase activo de todos los botones
      botonesVerColores.forEach(boton => boton.classList.remove('activo'));
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
    document.addEventListener("DOMContentLoaded", function () {
      // Almacenar el estado de los botones y colores
      let botonActivo = null;
      let tipoProductoActual = "";

      // Función para manejar el cambio de tamaño de pantalla
      function manejarCambioTamanho() {
        const anchoPantalla = window.innerWidth;

        // Si hay un botón activo, significa que hay una paleta de colores abierta
        if (botonActivo && botonActivo.classList.contains("activo")) {
          // Obtener el tipo de producto del botón activo
          const productoContainer = botonActivo.closest(".contenedor-producto");
          const productoImg = productoContainer.querySelector("img");
          tipoProductoActual = productoImg.alt;

          // Obtener las barras de colores
          const barraEscritorio = document.querySelector(".barra-colores");
          const barraMobile = document.querySelector(".barra-colores-mobile");

          // Si estamos en versión escritorio (más de 750px)
          if (anchoPantalla > 750) {
            // Ocultar la barra móvil si existe
            if (barraMobile) {
              barraMobile.style.display = "none";
            }

            // Mostrar la barra de escritorio con los colores actuales
            const coloresActuales = obtenerColoresActuales(tipoProductoActual);
            crearCarrusel(coloresActuales);
            barraEscritorio.classList.add("visible");
          }
          // Si estamos en versión móvil (750px o menos)
          else {
            // Ocultar la barra de escritorio
            barraEscritorio.classList.remove("visible");

            // Mostrar la barra móvil
            const coloresActuales = obtenerColoresActuales(tipoProductoActual);
            if (!barraMobile) {
              crearBarraColoresMobile(coloresActuales);
            } else {
              barraMobile.style.display = "block";
            }
          }
        }
      }

      // Obtener todos los botones "Ver Colores"
      const botonesVerColores = document.querySelectorAll(".btn-ver-colores");

      // Añadir un evento a cada botón
      botonesVerColores.forEach(function (boton) {
        boton.addEventListener("click", function () {
          // Si este botón está activo, guardarlo para referencia
          if (this.classList.contains("activo")) {
            botonActivo = this;
          } else if (this === botonActivo) {
            // Si este botón era el activo y se desactivó, borrar la referencia
            botonActivo = null;
          }
        });
      });

      // Añadir el evento de cambio de tamaño de pantalla
      let tiempoEspera;
      window.addEventListener("resize", function () {
        // Usar un tiempo de espera para evitar demasiadas llamadas
        clearTimeout(tiempoEspera);
        tiempoEspera = setTimeout(manejarCambioTamanho, 200);
      });

      // También manejar el caso cuando se cierra la barra de colores
      const botonCerrar = document.querySelector(".cerrar-colores");
      if (botonCerrar) {
        botonCerrar.addEventListener("click", function () {
          botonActivo = null;
        });
      }
    });
    function garantizarFuncionesDisponibles() {
      // Comprobar si obtenerColoresActuales existe
      if (typeof obtenerColoresActuales !== 'function') {
        window.obtenerColoresActuales = function (tipoProducto) {
          // Si existe la configuración para esta habitación y este tipo de producto
          if (
            coloresPorHabitacion[habitacionActual] &&
            coloresPorHabitacion[habitacionActual][tipoProducto]
          ) {
            return coloresPorHabitacion[habitacionActual][tipoProducto];
          }

          // Si no existe, usa los de fachada como fallback
          if (coloresPorHabitacion["fachada"][tipoProducto]) {
            return coloresPorHabitacion["fachada"][tipoProducto];
          }

          // Si tampoco existe para fachada, retorna array vacío
          return [];
        };
      }

      // Comprobar si crearCarrusel existe
      if (typeof crearCarrusel !== 'function') {
        console.error("Función crearCarrusel no encontrada. Verifica el código original.");
      }
    }

    // Llamar a esta función después de que el DOM esté cargado
    document.addEventListener("DOMContentLoaded", garantizarFuncionesDisponibles);
  </script>
  <!-- Footer -->
<?php require "footer_real.php"; ?>
</body>

</html>