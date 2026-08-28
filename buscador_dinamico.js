// Buscador del header: busca en productos ya dinamicos (todas las líneas)
        (function () {
            const inputBusqueda = document.querySelector(".busca input");
            if (!inputBusqueda) return;

            const contenedorBusca = document.querySelector(".busca");
            contenedorBusca.style.position = "relative";

            const listaResultados = document.createElement("div");
            listaResultados.style.cssText = "display:none; position:absolute; top:100%; left:0; right:0; background:white; border-radius:8px; box-shadow:0 8px 24px rgba(0,0,0,0.15); z-index:1000; max-height:300px; overflow-y:auto; margin-top:6px;";
            contenedorBusca.appendChild(listaResultados);

            const estiloHover = document.createElement("style");
            estiloHover.textContent = `
                .resultado-busqueda {
                    display: flex; align-items: center; gap: 12px; padding: 10px 16px;
                    text-decoration: none; color: #0d3393; font-size: 14px; font-family: 'Outfit', sans-serif;
                    border-bottom: 1px solid #eee; transition: background 0.15s;
                }
                .resultado-busqueda span { color: #0d3393; font-weight: 600; }
                .resultado-busqueda:hover { background: #f3f3f3; }
                .resultado-busqueda:hover span { text-decoration: underline; text-decoration-color: #ef0606; }
            `;
            document.head.appendChild(estiloHover);

            let temporizador = null;
            let ultimosResultados = null;

            function pintarResultados(productos) {
                if (productos.length === 0) {
                    listaResultados.innerHTML = '<div style="padding:14px; color:#999; font-size:13px; font-family:Outfit,sans-serif;">Sin resultados</div>';
                } else {
                    listaResultados.innerHTML = productos.map(p => `
                        <a href="${p.url}" class="resultado-busqueda">
                            <img src="${p.imagen}" alt="" style="width:38px; height:38px; object-fit:contain; flex-shrink:0;" onerror="this.style.display='none'">
                            <span>${p.nombre}</span>
                        </a>
                    `).join("");
                }
            }

            function buscarYMostrar(texto) {
                fetch("buscar_productos.php?q=" + encodeURIComponent(texto))
                    .then(r => r.json())
                    .then(productos => {
                        ultimosResultados = productos;
                        pintarResultados(productos);
                        listaResultados.style.display = "block";
                    })
                    .catch(() => { listaResultados.style.display = "none"; });
            }

            inputBusqueda.addEventListener("input", function () {
                const texto = this.value.trim();
                clearTimeout(temporizador);

                if (texto.length < 2) {
                    listaResultados.style.display = "none";
                    ultimosResultados = null;
                    return;
                }

                temporizador = setTimeout(() => buscarYMostrar(texto), 250);
            });

            inputBusqueda.addEventListener("focus", function () {
                const texto = this.value.trim();
                if (texto.length >= 2 && ultimosResultados !== null) {
                    pintarResultados(ultimosResultados);
                    listaResultados.style.display = "block";
                }
            });

            document.addEventListener("click", function (e) {
                if (!contenedorBusca.contains(e.target)) {
                    listaResultados.style.display = "none";
                }
            });

            inputBusqueda.addEventListener("blur", function () {
                setTimeout(() => {
                    if (!contenedorBusca.contains(document.activeElement)) {
                        listaResultados.style.display = "none";
                    }
                }, 150);
            });
        })();