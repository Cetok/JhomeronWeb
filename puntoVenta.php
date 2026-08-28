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
  <link rel="stylesheet" href="stylesProducto.css" />
  <link rel="stylesheet" href="stylesFooter.css" />
  <link rel="stylesheet" href="stylePunto.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXlHiGIVuxuCjj88qvGxW_tstHE1AiSA&libraries=places"></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaOnload" async defer></script>
</head>

<body>
  <!-- Header-->
<?php require "header.php"; ?>
  <div class="arriba">
    <a href="index.php"><img src="icons/home.svg" alt="inicio" /></a>
    <p>> Puntos de venta</p>
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

    <div class="map-section">
      <div class="location-dropdown">
        <select>
          <option value="" disabled selected>
            Encuentra el punto de venta más cercano
          </option>
          <option value="lima">Lima</option>
          <option value="callao">Callao</option>
          <option value="amazonas">Amazonas</option>
          <option value="ancash">Ancash</option>
          <option value="arequipa">Arequipa</option>
          <option value="cajamarca">Cajamarca</option>
          <option value="cuzco">Cuzco</option>
          <option value="huanuco">Huánuco</option>
          <option value="ica">Ica</option>
          <option value="junin">Junín</option>
          <option value="libertad">La Libertad</option>
          <option value="lambayeque">Lambayeque</option>
          <option value="loreto">Loreto</option>
          <option value="piura">Piura</option>
          <option value="puno">Puno</option>
          <option value="sanMartin">San MartÍn</option>
          <option value="tacna">Tacna</option>
          <option value="pasco">Pasco</option>
          <!-- Resto de las opciones -->
        </select>
      </div>

      <div class="map-container">
        <div id="google-map"></div>
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


      function initMap() {
        // Coordenadas centrales de Perú
        const peru = { lat: -9.19, lng: -75.0152 };

        const svgMarker = {
          path: "M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z",
          fillColor: "#0D3393",
          fillOpacity: 1,
          strokeWeight: 1,
          strokeColor: "#0D3393",
          scale: 1.2,
          anchor: new google.maps.Point(12, 24),
        };
        const redMarker = {
          path: "M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z",
          fillColor: "#FF0000",
          fillOpacity: 1,
          strokeWeight: 1,
          strokeColor: "#FF0000",
          scale: 1.2,
          anchor: new google.maps.Point(12, 24),
        };
        // Ubicaciones de los puntos de venta
        const locations = [
          // Lima
          {
            lat: -11.981013,
            lng: -76.781029,
            title: "MATIZADOS PEÑA",
            region: "lima",
          },
          {
            lat: -11.9195821,
            lng: -77.0657447,
            title: "INDUSTRIAS JHOMERON SA",
            region: "lima",
          },
          // Callao
          {
            lat: -12.0302198,
            lng: -77.0954918,
            title: "MATIZADOS THIAGO COLOR´S",
            region: "callao",
          },
          {
            lat: -12.030244,
            lng: -77.094997,
            title: " FERRETERIA MIL COLORES",
            region: "callao",
          },
          // Amazonas
          {
            lat: -5.6430177,
            lng: -78.5261982,
            title: "F Y M CHICHO COLORS",
            region: "amazonas",
          },
          {
            lat: -6.228032,
            lng: -77.869827,
            title: "ANTONY CONSTRUC",
            region: "amazonas",
          },
          // Ancash
          {
            lat: -9.519702,
            lng: -77.531615,
            title: "RAYP PINTURAS EL VELOZ S.A.C.",
            region: "ancash",
          },
          {
            lat: -9.506391,
            lng: -77.532383,
            title: "MAT. THAMS COLORS ",
            region: "ancash",
          },
          // Arequipa
          {
            lat: -15.853523,
            lng: -74.249083,
            title: "MATIZADOS FULLCOLORS",
            region: "arequipa",
          },
          {
            lat: -16.3960407,
            lng: -71.5214183,
            title: "MATIZADOS ROSELBER E.I.R.L.",
            region: "arequipa",
          },
          {
            lat: -16.387262,
            lng: -71.553391,
            title: "MEMO COLOR",
            region: "arequipa",
          },
          // Cajamarca
          {
            lat: -5.704920,
            lng: -78.809451,
            title: "LA CASA DEL PINTOR",
            region: "cajamarca",
          },

          // Cusco
          {
            lat: -13.532221,
            lng: -71.941193,
            title: "CHALLCO CONDORI EDISON",
            region: "cuzco",
          },
          // Huánuco
          {
            lat: -9.922731,
            lng: -76.234344,
            title: "MATIZADOS BETO",
            region: "huanuco",
          },
          // Pasco
          {
            lat: -9.847519,
            lng: -75.015039,
            title: "AGRO FERRETERÍA FRANCK",
            region: "pasco",
          },
          // Ica
          {
            lat: -13.4156607,
            lng: -76.1352925,
            title: "COMERCIAL MATICOLOR S.C.R.L.",
            region: "ica",
          },
          // Junín
          {
            lat: -12.041704,
            lng: -75.227051,
            title: "INVERSIONES FERRECOLOR",
            region: "junin",
          },

          // La Libertad
          {
            lat: -8.0923636,
            lng: -79.0080283,
            title: "MATIZADOS PILAR",
            region: "libertad",
          },

          // Lambayeque
          {
            lat: -6.7631968,
            lng: -79.8483839,
            title: "KRISTEL COLOR'S",
            region: "lambayeque",
          },

          // Loreto
          {
            lat: -3.784763,
            lng: -73.287647,
            title: "BEGASA NEGOCIOS S.R.L.",
            region: "loreto",
          },
          // Piura
          {
            lat: -5.165981,
            lng: -80.653021,
            title: "ANTONY COLORS E.I.R.L.",
            region: "piura",
          },
          {
            lat: -5.190477,
            lng: -80.604341,
            title: "RAMIREZ CORDOVA NOE MAXIMO",
            region: "piura",
          },
          // Puno
          {
            lat: -16.083086,
            lng: -69.646514,
            title: "FERRETERIA MATIZADOS EFB",
            region: "puno",
          },

          // San Martín
          {
            lat: -6.497746,
            lng: -76.369577,
            title: "COLOR CENTER M & Y E.I.R.L",
            region: "sanMartin",
          },
          {
            lat: -6.059568,
            lng: -77.168079,
            title: "E & G MATIZADOS",
            region: "sanMartin",
          },
          {
            lat: -6.056263,
            lng: -77.168064,
            title: "MATIZADOS EL DIAMANTE",
            region: "sanMartin",
          },
          {
            lat: -5.941086,
            lng: -77.306910,
            title: " MULTISERVICIOS & MATIZADOS DIAZ S.A.C.",
            region: "sanMartin",
          },
          // TACNA
          {
            lat: -17.9975878,
            lng: -70.257861,
            title: "CORPORACION CALLIRI EIRL",
            region: "tacna",
          },
          {
            lat: -17.995858,
            lng: -70.255007,
            title: "AHINCO NEGOCIOS E.I.R.L.",
            region: "tacna",
          },
        ];

        // Configuración inicial del mapa
        const map = new google.maps.Map(
          document.getElementById("google-map"),
          {
            zoom: 5,
            center: peru,
            mapTypeControl: false,
            fullscreenControl: true,
            streetViewControl: true,
            streetViewControlOptions: {
              position: google.maps.ControlPosition.RIGHT_BOTTOM,
            },
            fullscreenControl: true,
            fullscreenControlOptions: {
              position: google.maps.ControlPosition.LEFT_BOTTOM,
            },
          }
        );

        // Array para almacenar los marcadores
        const markers = [];

        // Función para crear marcador con etiqueta
        function createMarkerWithLabel(location, map) {
          const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: map,
            icon: redMarker,
          });

          // Crear el contenedor de la etiqueta
          const labelDiv = document.createElement("div");
          labelDiv.className = "map-label";
          labelDiv.innerHTML = `
          <div class="label-content">
            ${location.title}
          </div>
          `;

          // Crear overlay personalizado
          const overlay = new google.maps.OverlayView();
          overlay.onAdd = function () {
            const pane = this.getPanes().overlayLayer;
            pane.appendChild(labelDiv);
          };

          overlay.draw = function () {
            const projection = this.getProjection();
            const position = projection.fromLatLngToDivPixel(
              marker.getPosition()
            );

            labelDiv.style.left =
              position.x - labelDiv.offsetWidth / 2 + "px";
            labelDiv.style.top = position.y - 70 + "px";
          };

          overlay.onRemove = function () {
            labelDiv.parentNode.removeChild(labelDiv);
          };

          overlay.setMap(map);
          return { marker, overlay };
        }

        // Crear marcadores iniciales con etiquetas
        locations.forEach((location) => {
          const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: map,
            title: location.title,
            icon: svgMarker,
          });
          markers.push({ marker }); // Cambiar esto para mantener consistencia con la estructura
        });

        // Configurar el buscador de Places
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);

        map.addListener("bounds_changed", () => {
          searchBox.setBounds(map.getBounds());
        });

        const text = document.querySelector(".arriba p");
        text.style.cursor = "pointer";
        text.addEventListener("click", () => {
          window.location.href = "puntoVenta.html";
        });

        // AQUÍ ESTÁ LA LÍNEA AÑADIDA - Definición del selector de ubicaciones
        const locationSelect = document.querySelector(".location-dropdown select");

        // Configuración de zoom personalizado por región
        const regionZoomLevels = {
          "amazonas": 7.5,    // Zoom específico para Amazonas
          "piura": 11.7,         // Zoom específico para Piura
          "lima": 11.5,         // Zoom específico para Lima
          "callao": 19.3,       // Zoom específico para Callao
          "pasco": 14,       // Zoom específico para Pasco
          "ancash": 13,      // Zoom específico para Ancash
          "arequipa": 6,      // Zoom específico para Arequipa
          "cajamarca": 13,    // Zoom específico para Cajamarca
          "cuzco": 9,         // Zoom específico para Cuzco 
          "huanuco": 9,       // Zoom específico para Huánuco
          "ica": 12,           // Zoom específico para Ica
          "junin": 8.5,       // Zoom específico para Junín
          "libertad": 14,     // Zoom específico para La Libertad
          "lambayeque": 14,   // Zoom específico para Lambayeque
          "loreto": 7,        // Zoom específico para Loreto 
          "puno": 11,          // Zoom específico para Puno
          "sanMartin": 8,     // Zoom específico para San Martín
          "tacna": 14.8         // Zoom específico para Tacna
        };

        // Modifica el event listener del selector de ubicaciones
        locationSelect.addEventListener("change", (e) => {
          const selectedRegion = e.target.value;
          const regionText = document.querySelector(".arriba p");
          regionText.classList.add("has-region");
          regionText.innerHTML = `> <span class="puntos-venta">Puntos de venta</span> > ${e.target.options[e.target.selectedIndex].text}`;

          if (selectedRegion === "") {
            regionText.classList.remove("has-region");
            regionText.innerHTML = "> Puntos de venta";
          }

          const regionLocations = locations.filter(
            (loc) => loc.region.toLowerCase() === selectedRegion.toLowerCase()
          );

          if (regionLocations.length > 0) {
            const streetViewPanorama = map.getStreetView();
            if (streetViewPanorama.getVisible()) {
              streetViewPanorama.setVisible(false);
            }
            const bounds = new google.maps.LatLngBounds();

            // Limpiar marcadores existentes
            markers.forEach((marker) => {
              if (marker.marker) marker.marker.setMap(null);
              if (marker.overlay) marker.overlay.setMap(null);
            });
            markers.length = 0;

            // Crear nuevos marcadores con etiquetas
            regionLocations.forEach((loc) => {
              const markerWithLabel = createMarkerWithLabel(loc, map);
              markers.push(markerWithLabel);
              bounds.extend(markerWithLabel.marker.getPosition());
            });

            // Primero ajustar el mapa para mostrar todos los marcadores
            map.fitBounds(bounds);

            // Después de un breve retraso, aplicar el zoom personalizado según el nombre del departamento
            setTimeout(() => {
              // Aplicar el zoom personalizado según el nombre de la región seleccionada
              if (regionZoomLevels[selectedRegion] !== undefined) {
                console.log(`Aplicando zoom personalizado para ${selectedRegion}: ${regionZoomLevels[selectedRegion]}`);
                map.setZoom(regionZoomLevels[selectedRegion]);
              }
              // No hay else aquí porque queremos mantener el zoom de fitBounds si no hay personalización
            }, 100);
          }
        });

        // Escuchar la búsqueda
        searchBox.addListener("places_changed", () => {
          const places = searchBox.getPlaces();
          if (places.length === 0) return;

          const streetViewPanorama = map.getStreetView();
          if (streetViewPanorama.getVisible()) {
            streetViewPanorama.setVisible(false);
          }

          // Limpiar marcadores existentes
          markers.forEach((marker) => {
            if (marker.marker) marker.marker.setMap(null);
            if (marker.overlay) marker.overlay.setMap(null);
          });
          markers.length = 0;

          const bounds = new google.maps.LatLngBounds();

          places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) return;

            const marker = new google.maps.Marker({
              map,
              position: place.geometry.location,
              title: place.name,
            });
            markers.push({ marker });

            if (place.geometry.viewport) {
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });

          map.fitBounds(bounds);
          if (places.length === 1) {
            map.setZoom(9);
          }
        });
      }

      // Inicializar el mapa cuando se carga la página
      document.addEventListener("DOMContentLoaded", initMap);

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