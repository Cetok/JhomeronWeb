document.addEventListener("DOMContentLoaded", function () {
    // Base de datos de productos (ejemplos)
    const productos = [
        // IMPRIMANTES
        {
            id: "imprimante-acrilico",
            nombre: "Imprimante Acrílico Jhomeron",
            imagen: "imgs/decorativo/nuevo/pintura-imprimante-acrilico-pared.png",
            url: "pinturas.html?product=imprimante-acrilico",
            keywords: ["imprimante", "acrilico", "base", "preparacion", "pared"]
        },
        {
            id: "imprimante-jhomeron",
            nombre: "Imprimante Jhomeron",
            imagen: "imgs/decorativo/nuevo/imprimante-para-paredes-jhomeron-peru.png",
            url: "pinturas.html?product=imprimante-jhomeron",
            keywords: ["imprimante", "base", "preparacion", "pared"]
        },
        // SELLADORES
        {
            id: "sellador-pintor",
            nombre: "Sellador de Pared Acrílico Jhomeron",
            imagen: "imgs/decorativo/nuevo/sellador-para-paredes-jhomeron-peru.png",
            url: "pinturas.html?product=sellador-pintor",
            keywords: ["sellador", "acrilico", "pared", "base"]
        },

        // PASTA MURAL
        {
            id: "pasta-mural-jhomeron",
            nombre: "Pasta Mural Jhomeron",
            imagen: "imgs/decorativo/nuevo/pasta-mural-para-paredes-jhomeron-peru.png",
            url: "pinturas.html?product=pasta-mural-jhomeron",
            keywords: ["pasta", "mural", "masilla", "empaste"]
        },

        // TEMPLES
        {
            id: "temple-acrilico-jhomeron",
            nombre: "Temple Acrílico Jhomeron",
            imagen: "imgs/decorativo/bases/temple-acrilico-jhomeron.png",
            url: "pinturas.html?product=temple-acrilico-jhomeron",
            keywords: ["temple", "acrilico", "techo", "economico"]
        },
        {
            id: "temple-acrilico-sinolizado",
            nombre: "Temple Acrílico Sinolizado Jhomeron",
            imagen: "imgs/decorativo/bases/temple_ac_sino.png",
            url: "pinturas.html?product=temple-acrilico-sinolizado",
            keywords: ["temple", "acrilico", "sinolizado", "techo", "economico"]
        },
        {
            id: "temple-tcolors",
            nombre: "Temple Fino Tcolors",
            imagen: "imgs/decorativo/bases/Zona/temple-fino-tcolors-.png",
            url: "pinturas.html?product=temple-tcolors",
            keywords: ["temple", "fino", "tcolors", "techo", "economico"]
        },

        // LÁTEX
        {
            id: "pintor-latex",
            nombre: "Látex Pintor Jhomeron",
            imagen: "imgs/decorativo/nuevo/latex-acabado-mate-pintor-jhomeron-peru.png",
            url: "pinturas.html?product=pintor-latex",
            keywords: ["latex", "pintura", "pintor", "pared", "interior", "exterior", "acabado"]
        },
        {
            id: "duracolor-latex",
            nombre: "Látex Duracolor Jhomeron",
            imagen: "imgs/decorativo/nuevo/latex-acabado-mate-duracolor-jhomeron-peru.png",
            url: "pinturas.html?product=duracolor-latex",
            keywords: ["latex", "duracolor", "pintura", "pared", "interior", "exterior", "acabado"]
        },
        {
            id: "latex-satinado",
            nombre: "Satinado Jhomeron",
            imagen: "imgs/decorativo/nuevo/pintura-para-paredes-latex-satinado-jhomeron-peru.png",
            url: "pinturas.html?product=latex-satinado",
            keywords: ["latex", "satinado", "pintura", "pared", "interior", "exterior", "acabado", "brillante"]
        },
       /* 
        {
            id: "latex-americano",
            nombre: "Látex Americano Jhomeron",
            imagen: "imgs/decorativo/latex/Pintu-zo/satinado-jhomeron-1-galon.png",
            url: "pinturas.html?product=latex-americano",
            keywords: ["latex", "americano", "pintura", "pared", "interior", "exterior", "acabado"]
        },
        {
            id: "latex-supermat",
            nombre: "Látex Supermat Jhomeron",
            imagen: "imgs/decorativo/latex/Pintu-zo/satinado-jhomeron-1-galon.png",
            url: "pinturas.html?product=latex-supermat",
            keywords: ["latex", "supermat", "pintura", "pared", "interior", "exterior", "acabado"]
        },
        */
        {
            id: "tamsa-color",
            nombre: "Látex Tamsa Color",
            imagen: "imgs/decorativo/nuevo/tamsa_color.png",
            url: "pinturas.html?product=tamsa-color",
            keywords: ["latex", "tamsa", "color", "pintura", "decorativa", "interior", "exterior", "acabado"]
        },
        {
            id: "sellador-tamsa",
            nombre: "Sellador para Pared Tamsa",
            imagen: "imgs/decorativo/nuevo/sellador-para-paredes.png",
            url: "pinturas.html?product=sellador-tamsa",
            keywords: ["sellador", "pared", "tamsa", "pintura", "pared", "interior", "exterior", "acabado"]
        },
        {
            id: "latex-galpones",
            nombre: "Látex para Galpones Jhomeron",
            imagen: "imgs/automotriz/detalle_produ_auto/latex-para-galpones.png",
            url: "pinturas.html?product=latex-galpones",
            keywords: ["latex", "galpones", "pintura", "avícola", "ganadero", "techo", "elastomerico"]
        },

        // ESMALTES Y OTROS ACABADOS
        {
            id: "pintura-pizarra",
            nombre: "Pintura para Pizarra Jhomeron",
            imagen: "imgs/decorativo/latex/pintura-para-pizarra.png",
            url: "pinturas.html?product=pintura-pizarra",
            keywords: ["esmalte", "pizarra", "pintura", "escolar", "educativo"]
        },
        {
            id: "oleomate-tcolors",
            nombre: "Oleomate Tcolors",
            imagen: "imgs/decorativo/nuevo/pintura-oleomate-decorativo-tcolors-jhomeron-peru.png",
            url: "pinturas.html?product=oleomate-tcolors",
            keywords: ["oleomate", "mate", "tcolors", "pintura", "interior", "exterior"]
        },
        {
            id: "esmalte-sintetico-tamsa",
            nombre: "Esmalte Sintético Tamsa",
            imagen: "imgs/decorativo/nuevo/esmalte-sintetico-tamsa.png",
            url: "pinturasIndus.html?product=esmalte-sintetico-tamsa",
            keywords: ["esmalte", "sintetico", "tamsa", "pintura", "interior", "exterior"]
        },
        // LÍNEA AUTOMOTRIZ - MASILLAS
        {
            id: "masilla-3k-flex",
            nombre: "Masilla 3K Flex",
            imagen: "imgs/automotriz/ProducPin/Masilla/masilla-3k-flex-4k.png",
            url: "pinturasAuto.html?product=masilla-3k-flex",
            keywords: ["masilla", "automotriz", "poliester", "relleno", "flex", "3k"]
        },
        {
            id: "masilla-toque-flex",
            nombre: "Masilla Toque Flex",
            imagen: "imgs/automotriz/ProducPin/Masilla/masilla-toque-flex-45.png",
            url: "pinturasAuto.html?product=masilla-toque-flex",
            keywords: ["masilla", "automotriz", "toque", "flex", "poliester", "reparación"]
        },
        {
            id: "masilla-jhomeron-flex",
            nombre: "Masilla Jhomeron Flex",
            imagen: "imgs/automotriz/ProducPin/Masilla/masilla-jhomeron-flex.png",
            url: "pinturasAuto.html?product=masilla-jhomeron-flex",
            keywords: ["masilla", "poliester", "jhomeron", "flex", "automotriz", "reparación"]
        },
        {
            id: "masilla-poli-rino",
            nombre: "Masilla Poliester Rinok Flex",
            imagen: "imgs/automotriz/ProducPin/Masilla/masilla-poliester-rinok-flex-5kg.png",
            url: "pinturasAuto.html?product=masilla-poli-rino",
            keywords: ["masilla", "rinok", "poliester", "flex", "automotriz", "reparación"]
        },
        {
            id: "masilla-auto-fx300",
            nombre: "Masilla Automotriz FX3000",
            imagen: "imgs/automotriz/nuevos/masilla-automotriz-fx-3000-jhomeron.png",
            url: "pinturasAuto.html?product=masilla-auto-fx300",
            keywords: ["masilla", "automotriz", "fx3000", "acabado", "fino"]
        },
        {
            id: "masilla-poli-premiun",
            nombre: "Masilla Polilight Lightweight Filler",
            imagen: "imgs/automotriz/nuevos/masilla-polikor-poliester-automotriz-peru-jhomeron.png",
            url: "pinturasAuto.html?product=masilla-poli-light-filler",
            keywords: ["masilla", "polilight", "lightweight", "filler", "automotriz", "ligera"]
        },
        {
            id: "masilla-super-macun",
            nombre: "Masilla Polykor Poliester Putty",
            imagen: "imgs/automotriz/ProducPin/Masilla/masilla-polykor-filler-4kg.png",
            url: "pinturasAuto.html?product=masilla-super-macun",
            keywords: ["masilla", "supersoft", "poliester", "putty", "automotriz", "suave"]
        },

        // BASES AUTOMOTRICES
        {
            id: "base-aceite-pintor",
            nombre: "Base al Aceite Pintorcito",
            imagen: "imgs/automotriz/nuevos/base-al-aceite-automotriz-jhomeron.png",
            url: "pinturasAuto.html?product=base-aceite-pintor",
            keywords: ["base", "aceite", "pintorcito", "anticorrosivo", "automotriz"]
        },
        {
            id: "base-aceite-6500HS",
            nombre: "Base al Aceite Ultra 6500 HS",
            imagen: "imgs/automotriz/nuevos/base-al-aceite-automotriz-ultra.png",
            url: "pinturasAuto.html?product=base-aceite-6500HS",
            keywords: ["base", "aceite", "ultra", "6500", "hs", "automotriz", "anticorrosivo"]
        },
        {
            id: "base-primer-jhome",
            nombre: "Base Primer Jhomeron",
            imagen: "imgs/automotriz/deta_nue/base-primer-para-metales-automotriz.png",
            url: "pinturasAuto.html?product=base-primer-jhome",
            keywords: ["base", "primer", "jhomeron", "automotriz", "anticorrosivo"]
        },
        /*{
            id: "base-zincromato",
            nombre: "Base Zincromato Automotriz X7000",
            imagen: "imgs/automotriz/ProducPin/Base/zona/base-zincromato-automotriz-x7000.png",
            url: "pinturasAuto.html?product=base-zincromato",
            keywords: ["base", "zincromato", "x7000", "automotriz", "anticorrosivo"]
        },*/
        {
            id: "base-sol",
            nombre: "Base Zincromato Sol",
            imagen: "imgs/automotriz/nuevos/base-zincromato-sol-jhomeron.png",
            url: "pinturasAuto.html?product=base-sol",
            keywords: ["base", "zincromato", "sol", "automotriz", "anticorrosivo"]
        },
        {
            id: "etching-primer",
            nombre: "Etching Primer",
            imagen: "imgs/automotriz/deta_nue/etching-primer-protector-de-metales.png",
            url: "pinturasAuto.html?product=etching-primer",
            keywords: ["etching", "primer", "base", "automotriz", "adherencia"]
        },
        {
            id: "activador-primer",
            nombre: "Activador para Etching Primer",
            imagen: "imgs/automotriz/ProducPin/Base/Activador.png",
            url: "pinturasAuto.html?product=activador-primer",
            keywords: ["activador", "etching", "primer", "base", "automotriz"]
        },

        // PREPARACIÓN DE SUPERFICIES AUTOMOTRICES
        {
            id: "romevedor-pintura",
            nombre: "Removedor de Pintura",
            imagen: "imgs/automotriz/deta_nue/removedor-de-pintura-de-metales.png",
            url: "pinturasAuto.html?product=romevedor-pintura",
            keywords: ["removedor", "pintura", "automotriz", "limpieza"]
        },
        {
            id: "grease-removel",
            nombre: "Grease Removal",
            imagen: "imgs/automotriz/nuevos/grease-removal-automotriz.png",
            url: "pinturasAuto.html?product=grease-removel",
            keywords: ["grease", "removal", "desengrasante", "automotriz", "limpieza"]
        },
        {
            id: "aco_meta",
            nombre: "Acondicionador para Metales",
            imagen: "imgs/disolventes/zona/acondicionador-para-metales.png",
            url: "pinturasAuto.html?product=aco_meta",
            keywords: ["acondicionador", "metales", "automotriz", "preparación"]
        },

        // ACABADOS AUTOMOTRICES - GLOSS
        {
            id: "super-gloss-15",
            nombre: "Super Gloss L-15",
            imagen: "imgs/automotriz/deta_nue/pintura-para-metales-galvanizado-gloss-l15.png",
            url: "pinturasAuto.html?product=super-gloss-15",
            keywords: ["super", "gloss", "l15", "automotriz", "brillo", "acabado"]
        },
        {
            id: "super-gloss-brillo",
            nombre: "Super Gloss Brillo Directo",
            imagen: "imgs/automotriz/deta_nue/pintura-automotriz-industrial-super-gloss.png",
            url: "pinturasAuto.html?product=super-gloss-brillo",
            keywords: ["super", "gloss", "brillo", "directo", "automotriz", "acabado"]
        },
        {
            id: "3k-gloss",
            nombre: "3K Gloss Poliuretano",
            imagen: "imgs/automotriz/deta_nue/pintura-gloss-automotriz-industrial-jhomeron.png",
            url: "pinturasAuto.html?product=3k-gloss",
            keywords: ["3k", "gloss", "poliuretano", "automotriz", "acabado", "brillo"]
        },

        // POLIURETANOS AUTOMOTRICES
        {
            id: "poli-2k-direct",
            nombre: "Polyurethane 2K Direct Shine",
            imagen: "imgs/automotriz/nuevos/pintura-monocapa-direct-shine.png",
            url: "pinturasAuto.html?product=poli-2k-direct",
            keywords: ["polyurethane", "2k", "direct", "shine", "monocapa", "automotriz"]
        },
        {
            id: "mono-fx7500",
            nombre: "Polyurethane Monocapa 100-80",
            imagen: "imgs/automotriz/ProducPin/Acabado/Monocapa-FX7500---1GL.png",
            url: "pinturasAuto.html?product=mono-fx7500",
            keywords: ["polyurethane", "monocapa", "100-80", "fx7500", "automotriz"]
        },
        {
            id: "bi-fx8500",
            nombre: "Polyurethane Bicapa HS 100-80",
            imagen: "imgs/automotriz/ProducPin/Acabado/Bicapa-FX8500-1GL.png",
            url: "pinturasAuto.html?product=bi-fx8500",
            keywords: ["polyurethane", "bicapa", "hs", "100-80", "fx8500", "automotriz"]
        },
        {
            id: "ultra-base-3k",
            nombre: "Polyurethane Ultra Base 3K",
            imagen: "imgs/automotriz/nuevos/pintura-poliuretano-automotriz-ultra-base.png",
            url: "pinturasAuto.html?product=ultra-base-3k",
            keywords: ["polyurethane", "ultra", "base", "3k", "automotriz"]
        },
        {
            id: "poli-hs-80",
            nombre: "Polyurethane HS 80-30",
            imagen: "imgs/automotriz/nuevos/poliurethano-hs-80-30.png",
            url: "pinturasAuto.html?product=poli-hs-80",
            keywords: ["polyurethane", "hs", "80-30", "automotriz"]
        },
        {
            id: "des-k",
            nombre: "Destellante K",
            imagen: "imgs/automotriz/nuevos/destellante-k-automotriz-makatony-jhomeron.png",
            url: "pinturasAuto.html?product=des-k",
            keywords: ["destellante", "k", "automotriz", "efecto", "especial"]
        },
        {
            id: "perlado-maka",
            nombre: "Perlados Makatony",
            imagen: "imgs/automotriz/nuevos/perlado-mak-automotriz-makatony-jhomeron_1.png",
            url: "pinturasAuto.html?product=perlado-maka",
            keywords: ["perlados", "makatony", "automotriz", "efecto", "especial"]
        },
        {
            id: "perla-sp",
            nombre: "Perlado SP",
            imagen: "imgs/automotriz/nuevos/laca-acrilica-perlado-sp-automotriz-jhomeron_1.png",
            url: "pinturasAuto.html?product=perla-sp",
            keywords: ["perlado", "sp", "automotriz", "efecto", "especial"]
        },

        // BARNICES Y CATALIZADORES AUTOMOTRICES
        {
            id: "ba-poli-hs",
            nombre: "Barniz Poliuretano HS",
            imagen: "imgs/automotriz/nuevos/barniz-poliuretano-hs-jhomeron.png",
            url: "pinturasAuto.html?product=ba-poli-hs",
            keywords: ["barniz", "poliuretano", "hs", "automotriz", "acabado"]
        },
        {
            id: "barniz-bs444-hs",
            nombre: "BS444 MS Clear Coat",
            imagen: "imgs/automotriz/Acabados/zona/barniz-bs-444-automotriz.png",
            url: "pinturasAuto.html?product=barniz-bs444-hs",
            keywords: ["bs444", "ms", "clear", "coat", "barniz", "automotriz"]
        },
        {
            id: "barniz-bs777-hs",
            nombre: "BS777 HS Clear Coat",
            imagen: "imgs/automotriz/Acabados/zona/barniz-bs-777-automotriz.png",
            url: "pinturasAuto.html?product=barniz-bs777-hs",
            keywords: ["bs777", "hs", "clear", "coat", "barniz", "automotriz"]
        },
        {
            id: "cataliza-poly",
            nombre: "Catalizador Poliuretano",
            imagen: "imgs/automotriz/detalle_produ_auto/catalizador-polyurethane-automotriz-jhomeron.png",
            url: "pinturasAuto.html?product=cataliza-poly",
            keywords: ["catalizador", "poliuretano", "hardener", "automotriz"]
        },
        {
            id: "bh-tj-dry",
            nombre: "BH001-1 TJ SuperFast Dry Hardener",
            imagen: "imgs/automotriz/nuevos/bh001_tj_li.png",
            url: "pinturasAuto.html?product=bh-tj-dry",
            keywords: ["bh001", "tj", "superfast", "dry", "hardener", "catalizador", "automotriz"]
        },
        {
            id: "bh-hs-dry",
            nombre: "BH031-1 HS SuperFast Dry Hardener",
            imagen: "imgs/automotriz/nuevos/bh031_hs_li.png",
            url: "pinturasAuto.html?product=bh-hs-dry",
            keywords: ["bh031", "hs", "superfast", "dry", "hardener", "catalizador", "automotriz"]
        },

        // DISOLVENTES AUTOMOTRICES
        {
            id: "di_poli_pi",
            nombre: "3K Diluyente Poliuretano",
            imagen: "imgs/automotriz/nuevos/diluyente-poliuretano-3k-jhomeron.png",
            url: "pinturasAuto.html?product=di_poli_pi",
            keywords: ["3k", "diluyente", "poliuretano", "automotriz", "solvente"]
        },
        {
            id: "di_poli_3k",
            nombre: "3K Disolvente Poliuretano 2 en 1",
            imagen: "imgs/automotriz/nuevos/disolvente-poliuretano-automotriz-3k-jhomeron.png",
            url: "pinturasAuto.html?product=di_poli_3k",
            keywords: ["3k", "disolvente", "poliuretano", "2en1", "automotriz", "solvente"]
        },
        {
            id: "di_poli_alto",
            nombre: "Disolvente PU Pintor Alto Brillo",
            imagen: "imgs/automotriz/deta_nue/disolvente-poliuretano-automotriz-alto-brillo-1.png",
            url: "pinturasAuto.html?product=di_poli_alto",
            keywords: ["disolvente", "pu", "pintor", "alto", "brillo", "automotriz", "solvente"]
        },
        {
            id: "thi_poli",
            nombre: "Thinner Poliester PU-455",
            imagen: "imgs/disolventes/THINNER_POLIESTER.png",
            url: "pinturasAuto.html?product=thi_poli",
            keywords: ["thinner", "poliester", "pu455", "automotriz", "solvente"]
        },

        {
            id: "varnish-acele-3k",
            nombre: "Varnish Accelerator 3K",
            imagen: "imgs/automotriz/Acabados/VARNISH_ACELERATOR.png",
            url: "pinturasAuto.html?product=varnish-acele-3k",
            keywords: ["varnish", "accelerator", "3k", "automotriz", "secado"]
        },

        // PRODUCTOS ESPECIALES AUTOMOTRICES
        {
            id: "under-auto",
            nombre: "Undercoating Automotriz",
            imagen: "imgs/automotriz/nuevos/undercoating-automotriz-jhomeron.png",
            url: "pinturasAuto.html?product=under-auto",
            keywords: ["undercoating", "protector", "automotriz", "chasis"]
        },
        {
            id: "anti-auto",
            nombre: "Antigravilla Automotriz",
            imagen: "imgs/automotriz/nuevos/antigravilla-protecction-automotri-jhomeron.png",
            url: "pinturasAuto.html?product=anti-auto",
            keywords: ["antigravilla", "protector", "automotriz", "impactos"]
        },
        {
            id: "base-mate-uni",
            nombre: "Base Mateante Universal",
            imagen: "imgs/automotriz/nuevos/base-mateante-jhomeron.png",
            url: "pinturasAuto.html?product=base-mate-uni",
            keywords: ["base", "mateante", "universal", "automotriz", "acabado"]
        },
        {
            id: "base-ace-jhome",
            nombre: "Base al Aceite Jhomeron",
            imagen: "imgs/automotriz/nuevos/base-al-aceite-jhomeron-1.png",
            url: "pinturasAuto.html?product=base-ace-jhome",
            keywords: ["base", "aceite", "jhomeron", "automotriz", "base al"]
        },
        {
            id: "puli-auto",
            nombre: "Pulidor Automotriz",
            imagen: "imgs/automotriz/nuevos/pulidor-automotriz-jhomeron.png",
            url: "pinturasAuto.html?product=puli-auto",
            keywords: ["pulidor", "automotriz", "brillo", "acabado"]
        },
        {
            id: "masking",
            nombre: "Masking Film",
            imagen: "imgs/automotriz/nuevos/masking-film-jhomeron.png",
            url: "pinturasAuto.html?product=masking",
            keywords: ["masking", "film", "automotriz", "materiales"]
        },
        {
            id: "colador",
            nombre: "Colador (Filtro 125 Micrones)",
            imagen: "imgs/automotriz/nuevos/colador-filtro-para-pintura.png",
            url: "pinturasAuto.html?product=colador",
            keywords: ["colador", "filtro", "125", "micrones", "automotriz", "materiales"]
        },
        {
            id: "pro-plas",
            nombre: "Protector de Plástico",
            imagen: "imgs/automotriz/deta_nue/protector-de-plastico-jhomeron.png",
            url: "pinturasAuto.html?product=pro-plas",
            keywords: ["protector", "plastico", "automotriz", "materiales"]
        },
        {
            id: "pu-bi-base",
            nombre: "PU Bicapa HS 100-80 Base Brinder",
            imagen: "imgs/automotriz/nuevos/base-brinder-jhomeron.png",
            url: "pinturasAuto.html?product=pu-bi-base",
            keywords: ["pu", "bicapa", "hs", "brinder", "automotriz", "base"]
        },
        {
            id: "pu-bi-efec",
            nombre: "PU Bicapa HS 100-80 Efecto Metálico",
            imagen: "imgs/automotriz/nuevos/poliuretano-efecto-metalico.png",
            url: "pinturasAuto.html?product=pu-bi-efec",
            keywords: ["pu", "bicapa", "hs", "efecto", "metalico", "automotriz"]
        },
        {
            id: "laca-auto",
            nombre: "Laca Acrílica Automotriz",
            imagen: "imgs/automotriz/deta_nue/laca-acrilica-automotriz.png",
            url: "pinturasAuto.html?product=laca-auto",
            keywords: ["laca", "acrilica", "automotriz", "acabado"]
        },

        // PRODUCTOS LÍNEA INDUSTRIAL
        // ANTICORROSIVOS
        {
            id: "esma-anti-tk",
            nombre: "Esmalte Anticorrosivo TK-2031",
            imagen: "imgs/industrial/zona/anticorrosivo-industrial-tcolors.png",
            url: "pinturasIndus.html?product=esma-anti-tk",
            keywords: ["esmalte", "anticorrosivo", "industrial", "tk2031", "metales", "protección"]
        },
        {
            id: "base-zyncro",
            nombre: "Base Zincromato Industrial",
            imagen: "imgs/industrial/zona/base-zincromato-industrial-tcolors.png",
            url: "pinturasIndus.html?product=base-zyncro",
            keywords: ["base", "zincromato", "industrial", "anticorrosivo", "metales"]
        },

        // ACABADOS ALQUÍDICOS
        {
            id: "esma-sinte",
            nombre: "Esmalte Sintético Flash",
            imagen: "imgs/industrial/esmalte-sintetico-flash.png",
            url: "pinturasIndus.html?product=esma-sinte",
            keywords: ["esmalte", "sintético", "flash", "industrial", "acabado", "alquídico"]
        },
        {
            id: "esma-sinte-fk",
            nombre: "Esmalte Sintético FK Ultra",
            imagen: "imgs/industrial/esmalte-sintetico-fk-ultra.png",
            url: "pinturasIndus.html?product=esma-sinte-fk",
            keywords: ["esmalte", "sintético", "fk", "ultra", "industrial", "acabado", "alquídico"]
        },

        // IGNÍFUGOS
        {
            id: "ba-retar-fue",
            nombre: "Barniz Retardador de Fuego",
            imagen: "imgs/industrial/zona/barniz-transparente-retardador-de-fuego-jhomeron.png",
            url: "pinturasIndus.html?product=ba-retar-fue",
            keywords: ["barniz", "retardador", "fuego", "ignífugo", "industrial", "protección"]
        },
        {
            id: "esma-retar-fue",
            nombre: "Esmalte Retardador de Fuego",
            imagen: "imgs/industrial/retardador-de-fuego-jhomeron.png",
            url: "pinturasIndus.html?product=esma-retar-fue",
            keywords: ["esmalte", "retardador", "fuego", "ignífugo", "industrial", "protección"]
        },
        {
            id: "diso-retar-fue",
            nombre: "Disolvente para Retardador de Fuego",
            imagen: "imgs/industrial/zona/anticorrosivo-tcolors-1gal- (2)-.png",
            url: "pinturasIndus.html?product=diso-retar-fue",
            keywords: ["disolvente", "retardador", "fuego", "ignífugo", "industrial", "solvente"]
        },

        // MARTILLADOS
        {
            id: "martillado-zy",
            nombre: "Esmalte Martillado Zynthane",
            imagen: "imgs/industrial/zona/esmalte-martillado-para-metales-jhomeron.png",
            url: "pinturasIndus.html?product=martillado-zy",
            keywords: ["esmalte", "martillado", "zynthane", "industrial", "acabado", "especial"]
        },

        // EPÓXICOS RESINAS
        {
            id: "re_150",
            nombre: "Resina Epóxica JR-150",
            imagen: "imgs/madera/resina_epoxica.png",
            url: "pinturasIndus.html?product=re_150",
            keywords: ["resina", "epóxica", "jr150", "industrial", "pisos", "alta resistencia"]
        },
        {
            id: "re_160",
            nombre: "Catalizador JR-160",
            imagen: "imgs/madera/CATALIZADOR_JR_160.png",
            url: "pinturasIndus.html?product=re_160",
            keywords: ["catalizador", "epóxico", "jr160", "industrial", "pisos", "endurecedor"]
        },
        {
            id: "re_170",
            nombre: "Catalizador JR-170",
            imagen: "imgs/madera/CATALIZADOR_JR170.png",
            url: "pinturasIndus.html?product=re_170",
            keywords: ["catalizador", "epóxico", "jr170", "industrial", "madera", "endurecedor"]
        },
        // DIELÉCTRICOS
        {
            id: "so_di",
            nombre: "Disolvente Dieléctrico",
            imagen: "imgs/disolventes/zona/solvente-dielectrico-sdl-15.png",
            url: "pinturasIndus.html?product=so_di",
            keywords: ["disolvente", "dieléctrico", "industrial", "solvente", "limpieza"]
        },

        // PRODUCTOS LÍNEA MARINA - EPÓXICOS
        {
            id: "ma-ca-a",
            nombre: "Masilla Caramelo A",
            imagen: "imgs/marina/product/masilla-caramelo-jhomeron.png",
            url: "pinturasMarina.html?product=ma-ca-a",
            keywords: ["masilla", "caramelo", "a", "marina", "epoxico", "bicomponente"]
        },
        {
            id: "ma-ca-b",
            nombre: "Masilla Caramelo B",
            imagen: "imgs/marina/product/masilla-caramelo-jhomeron-parte-b.png",
            url: "pinturasMarina.html?product=ma-ca-b",
            keywords: ["masilla", "caramelo", "b", "marina", "epoxico", "bicomponente"]
        },
        {
            id: "base_epo",
            nombre: "Base Epóxico Sistema 1:1",
            imagen: "imgs/marina/product/base-expoxica-bismark-jhomeron-sistema-1-1-peru.png",
            url: "pinturasMarina.html?product=base_epo",
            keywords: ["base", "epoxico", "marina", "sistema", "1:1", "bicomponente"]
        },
        {
            id: "base-epo-3",
            nombre: "Base Epóxico Sistema 3/4:1/4",
            imagen: "imgs/marina/product/base-epoxica-sistema-3-4-jhomeron.png",
            url: "pinturasMarina.html?product=base-epo-3",
            keywords: ["base", "epoxico", "marina", "sistema", "3/4:1/4", "bicomponente"]
        },
        {
            id: "base_zincro",
            nombre: "Base Zincromato Sistema 1:1",
            imagen: "imgs/marina/product/base-zincromato-epoxico-sistema-1-1-jhomeron-peru.png",
            url: "pinturasMarina.html?product=base_zincro",
            keywords: ["base", "zincromato", "epoxico", "marina", "sistema", "1:1"]
        },
        {
            id: "base_zincro-3",
            nombre: "Base Zincromato Sistema 3/4:1/4",
            imagen: "imgs/marina/product/base-zincromato-epoxico-sistema-3-4-1-4-jhomeron-peru.png",
            url: "pinturasMarina.html?product=base_zincro-3",
            keywords: ["base", "zincromato", "epoxico", "marina", "sistema", "3/4:1/4"]
        },
        {
            id: "esma_epo",
            nombre: "Esmalte Epóxico Sistema 1:1",
            imagen: "imgs/marina/product/esmalte-epoxico-sistema-1-1-jhomeron-peru.png",
            url: "pinturasMarina.html?product=esma_epo",
            keywords: ["esmalte", "epoxico", "marina", "sistema", "1:1", "bicomponente"]
        },
        {
            id: "esma-epo-3",
            nombre: "Esmalte Epóxico Sistema 3/4:1/4",
            imagen: "imgs/marina/product/esmalte-epoxico-sistema-3-4-1-1-jhomeron-peru.png",
            url: "pinturasMarina.html?product=esma-epo-3",
            keywords: ["esmalte", "epoxico", "marina", "sistema", "3/4:1/4", "bicomponente"]
        },
        {
            id: "cata_epo",
            nombre: "Catalizador Epóxico Sistema 1:1",
            imagen: "imgs/marina/product/catalizador-epoxico-sistema-1-1-jhomeron-peru.png",
            url: "pinturasMarina.html?product=cata_epo",
            keywords: ["catalizador", "epoxico", "marina", "sistema", "1:1", "bicomponente"]
        },
        {
            id: "cata_epo-3",
            nombre: "Catalizador Epóxico Sistema 3/4:1/4",
            imagen: "imgs/marina/product/catalizador-epoxico-sistema-3-4-1-1-jhomeron-peru.png",
            url: "pinturasMarina.html?product=cata_epo-3",
            keywords: ["catalizador", "epoxico", "marina", "sistema", "3/4:1/4", "bicomponente"]
        },
        {
            id: "dis_600",
            nombre: "Disolvente Epóxico Bismark",
            imagen: "imgs/marina/product/disolvente-para-epoxico-bismark-jhomeron.png",
            url: "pinturasMarina.html?product=dis_600",
            keywords: ["disolvente", "epoxico", "t600", "marina", "bismark"]
        },
        {
            id: "dis_800",
            nombre: "Disolvente Epóxico T-800",
            imagen: "imgs/marina/disolvente_t800.png",
            url: "pinturasMarina.html?product=dis_800",
            keywords: ["disolvente", "epoxico", "t800", "marina", "solvente"]
        },

        // ACABADOS ALQUÍDICOS MARINOS
        {
            id: "bar_mari",
            nombre: "Barniz Marino Jhomeron",
            imagen: "imgs/pintu_mari/barniz-marino-jhomeron-1-gal.png",
            url: "pinturasMarina.html?product=bar_mari",
            keywords: ["barniz", "marino", "jhomeron", "acabado", "alquidico"]
        },

        // ACABADOS CAUCHO CLORADO
        {
            id: "esma-cau-clo",
            nombre: "Esmalte Caucho Clorado",
            imagen: "imgs/marina/product/esmalte-caucho-clorado-jhomeron.png",
            url: "pinturasMarina.html?product=esma-cau-clo",
            keywords: ["esmalte", "caucho", "clorado", "marina", "acabado"]
        },
        /*{
            id: "dis-cau-clo",
            nombre: "Disolvente Caucho Clorado",
            imagen: "imgs/sin_imagen.svg",
            url: "pinturasMarina.html?product=dis-cau-clo",
            keywords: ["disolvente", "caucho", "clorado", "marina", "solvente"]
        },*/

        // LÍNEA TRÁFICO/SEÑALIZACIÓN
        /*{
            id: "tra-acri",
            nombre: "Tráfico Acrílico Jhomeron",
            imagen: "imgs/sin_imagen.svg",
            url: "pinturasTrafico.html?product=tra-acri",
            keywords: ["trafico", "acrilico", "jhomeron", "señalizacion", "vial"]
        },*/
        {
            id: "trafico_tipo",
            nombre: "3K TT - P - 115 F Tipo II Jhomeron",
            imagen: "imgs/trafico/trafico_3k.png",
            url: "pinturasTrafico.html?product=trafico_tipo",
            keywords: ["trafico", "3k", "ttp", "115f", "tipo", "señalizacion", "vial"]
        },
        /*
        {
            id: "trafico_tipo_3",
            nombre: "Tráfico TT - P - 115 E Tipo III",
            imagen: "imgs/sin_imagen.svg",
            url: "pinturasTrafico.html?product=trafico_tipo_3",
            keywords: ["trafico", "ttp", "115e", "tipo", "señalizacion", "vial"]
        },
        */
        {
            id: "trafico_jhomeron",
            nombre: "Tráfico Jhomeron",
            imagen: "imgs/trafico/zona/pintura-para-trafico-jhomeron.png",
            url: "pinturasTrafico.html?product=trafico_jhomeron",
            keywords: ["trafico", "jhomeron", "señalizacion", "vial", "pavimento"]
        },
        {
            id: "diso_trafi",
            nombre: "Disolvente Tráfico",
            imagen: "imgs/trafico/disolvente_trafico.png",
            url: "pinturasTrafico.html?product=diso_trafi",
            keywords: ["disolvente", "trafico", "solvente", "dilucion", "señalizacion"]
        },
        /*
        {
            id: "tra-acri-ba",
            nombre: "Tráfico Acrílico Base Agua",
            imagen: "imgs/sin_imagen.svg",
            url: "pinturasTrafico.html?product=tra-acri-ba",
            keywords: ["trafico", "acrilico", "base", "agua", "señalizacion", "vial", "ecologico"]
        },
        */
        {
            id: "pi-depo",
            nombre: "Pintura para Losa Deportiva",
            imagen: "imgs/trafico/losa-derpotiva.png",
            url: "pinturasTrafico.html?product=pi-depo",
            keywords: ["pintura", "losa", "deportiva", "canchas", "pavimento", "señalizacion"]
        },

        // LÍNEA MADERA
        {
            id: "per_ma",
            nombre: "Preservante para Madera",
            imagen: "imgs/pintu_made/Preservante-para-madera---3L.png",
            url: "pinturasMadera.html?product=per_ma",
            keywords: ["preservante", "madera", "protector", "biocida", "insectos", "hongos"]
        },
        {
            id: "base_piro",
            nombre: "Base Piroxilina B-5000",
            imagen: "imgs/madera/zona/base-piroxilina-jhomeron.png",
            url: "pinturasMadera.html?product=base_piro",
            keywords: ["base", "piroxilina", "b5000", "madera", "adherencia"]
        },
        {
            id: "laca-se-ca",
            nombre: "Laca Selladora Carpintero",
            imagen: "imgs/madera/zona/base-piroxilina-jhomeron.png",
            url: "pinturasMadera.html?product=laca-se-ca",
            keywords: ["laca", "selladora", "carpintero", "madera", "poros"]
        },
        {
            id: "laca_se",
            nombre: "Laca Selladora",
            imagen: "imgs/pintu_made/laca-selladora-para-madera-carpinteria.png",
            url: "pinturasMadera.html?product=laca_se",
            keywords: ["laca", "selladora", "madera", "poros", "adherencia"]
        },
        {
            id: "laca_piro",
            nombre: "Laca Piroxilina",
            imagen: "imgs/madera/product/laca-piroxilina-duco-para-madera.png",
            url: "pinturasMadera.html?product=laca_piro",
            keywords: ["laca", "piroxilina", "madera", "dureza", "duco"]
        },
        {
            id: "bar_tam",
            nombre: "Barniz Sintético",
            imagen: "imgs/pintu_made/barniz-para-madera-Jomer-1gal.png",
            url: "pinturasMadera.html?product=bar_tam",
            keywords: ["barniz", "sintetico", "madera", "acabado", "brillo"]
        },
        {
            id: "laca_cri",
            nombre: "Laca Cristal",
            imagen: "imgs/automotriz/deta_nue/laca-cristal-para-madera-.png",
            url: "pinturasMadera.html?product=laca_cri",
            keywords: ["laca", "cristal", "madera", "acabado", "brillo"]
        },
        {
            id: "bar_zyn",
            nombre: "Barniz DD Jhomeron",
            imagen: "imgs/pintu_made/barniz-para-madera-dd.png",
            url: "pinturasMadera.html?product=bar_zyn",
            keywords: ["barniz", "dd", "jhomeron", "madera", "bicomponente"]
        },
        {
            id: "ca_zyn",
            nombre: "Catalizador DD Jhomeron",
            imagen: "imgs/pintu_made/catalizador-para-madera-dd-jhomeron.png",
            url: "pinturasMadera.html?product=ca_zyn",
            keywords: ["catalizador", "dd", "jhomeron", "madera", "bicomponente"]
        },
        {
            id: "dis_zyn",
            nombre: "Disolvente DD Jhomeron",
            imagen: "imgs/madera//zona/disolvente-dd-jhomeron.png",
            url: "pinturasMadera.html?product=dis_zyn",
            keywords: ["disolvente", "dd", "jhomeron", "madera", "dilucion"]
        },
        {
            id: "cola_ca",
            nombre: "Cola Carpintero",
            imagen: "imgs/madera/zona/cola-carpintero-para-madera.png",
            url: "pinturasMadera.html?product=cola_ca",
            keywords: ["cola", "carpintero", "pegamento", "madera", "adhesivo"]
        },

        // Linea Disolventes
        {
            id: "extra_thi",
            nombre: "Extra Thinner 3K",
            imagen: "imgs/disolventes/extra-thinner-jhomeron.png",
            url: "pinturasDisol.html?product=extra_thi",
            keywords: ["thinner", "extra", "3k", "disolvente", "solvente", "automotriz"]
        },
        {
            id: "thi-acri-pi",
            nombre: "Thinner Acrílico Pintor",
            imagen: "imgs/disolventes/thinner-acrilico-pintor-jhomeron.png",
            url: "pinturasDisol.html?product=thi-acri-pi",
            keywords: ["thinner", "acrilico", "pintor", "disolvente", "solvente", "acrilico pintor"]
        },
        {
            id: "thi_3k",
            nombre: "Thinner Acrílico Automotriz 3K",
            imagen: "imgs/disolventes/thinner-acrilico-3k-jhomeron-1.png",
            url: "pinturasDisol.html?product=thi_3k",
            keywords: ["thinner", "acrilico", "automotriz", "3k", "disolvente", "solvente"]
        },
        {
            id: "thi_70",
            nombre: "Thinner Acrílico Automotriz T-70",
            imagen: "imgs/disolventes/nuevos/thinner-acrilico-t70-jhomeron.png",
            url: "pinturasDisol.html?product=thi_70",
            keywords: ["thinner", "acrilico", "automotriz", "t70", "disolvente", "solvente"]
        },
        {
            id: "thi_50",
            nombre: "Thinner Acrílico R.50",
            imagen: "imgs/disolventes/nuevos/thinner-acrilico-r-50-1.png",
            url: "pinturasDisol.html?product=thi_50",
            keywords: ["thinner", "acrilico", "r50", "disolvente", "solvente"]
        },
        {
            id: "thi-stan",
            nombre: "Thinner Estándar Jhomeron",
            imagen: "imgs/disolventes/nuevos/thinner-standar-jhomeron.png",
            url: "pinturasDisol.html?product=thi-stan",
            keywords: ["thinner", "estandar", "standard", "jhomeron", "disolvente", "solvente"]
        },
        
        // LÍNEA DISOLVENTES - AGUARRÁS
        {
            id: "agu_jho",
            nombre: "Aguarrás Mineral Jhomeron",
            imagen: "imgs/disolventes/nuevos/aguarras-jhomeron-1.png",
            url: "pinturasDisol.html?product=agu_jho",
            keywords: ["aguarras", "mineral", "jhomeron", "disolvente", "solvente"]
        },
        
        // LÍNEA DISOLVENTES - BENCINA
        {
            id: "benci",
            nombre: "Bencina Jhomeron",
            imagen: "imgs/disolventes/nuevos/bencina-jhomeron-1.png",
            url: "pinturasDisol.html?product=benci",
            keywords: ["bencina", "jhomeron", "disolvente", "solvente", "limpiador"]
        },
        
        // LÍNEA DISOLVENTES - RETARDADORES
        {
            id: "lac_flo",
            nombre: "Lacquer Flow Jhomeron",
            imagen: "imgs/disolventes/nuevos/lacquer-flow-jhomeron-1.png",
            url: "pinturasDisol.html?product=lac_flo",
            keywords: ["lacquer", "flow", "retardador", "disolvente", "jhomeron"]
        },

        //Resinas y Pegamentos
        {
            id: "resina-tamsamaelic-t300",
            nombre: "Resina Tamsamaelic T300",
            imagen: "imgs/resinas/resina-tamsa-maelic-t300.png",
            url: "pinturaRePega.html?id=1&nombre=RESINA+TAMSAMAELIC+T300",
            keywords: ["resina", "tamsamaelic", "t300", "colofonia", "glicerina", "barnices", "pinturas"]
        },
        {
            id: "resina-tamsacryl-t50x",
            nombre: "Resina Tamsacryl T50 X",
            imagen: "imgs/resinas/resina-tamsa-cryl-t50-x-jhomeron.png",
            url: "pinturaRePega.html?id=2&nombre=RESINA+TAMSACRYL+T50+X",
            keywords: ["resina", "tamsacryl", "t50x", "copolímero", "acrílico", "termoplástico", "lacas", "automotriz"]
        },
        {
            id: "resina-tamsavinil-4005",
            nombre: "Resina Tamsavinil 4005",
            imagen: "imgs/resinas/nuevos/resina-tamsa-vinil.png",
            url: "pinturaRePega.html?id=3&nombre=RESINA+TAMSAVINIL+4005",
            keywords: ["resina", "tamsavinil", "4005", "latex", "vinil", "acrílico", "copolímero", "dispersiones"]
        },
        {
            id: "resina-tamsa-metacril-60px",
            nombre: "Resina Tamsa Metacril 60 PX",
            imagen: "imgs/resinas/resina-tamsa-metacril-jhomeron.png",
            url: "pinturaRePega.html?id=4&nombre=RESINA+TAMSA+METACRIL+60+PX",
            keywords: ["resina", "tamsa", "metacril", "60px", "metil", "metacrilato", "xilol", "barnices", "esmaltes"]
        },
        {
            id: "resina-tamsa-styrex-d-60x",
            nombre: "Resina Tamsa Styrex D 60 X",
            imagen: "imgs/resinas/resina-tamsa-styrex-jhomeron.png",
            url: "pinturaRePega.html?id=5&nombre=RESINA+TAMSA+STYREX+D+60+X",
            keywords: ["resina", "tamsa", "styrex", "d60x", "estireno", "xilol", "barnices", "esmaltes", "martillados"]
        },
        {
            id: "resina-tamsalkyd-ts-70x",
            nombre: "Resina Tamsalkyd TS 70 X",
            imagen: "imgs/resinas/resina-tamsa-kyd-ts-70-x-jhomeron.png",
            url: "pinturaRePega.html?id=6&nombre=RESINA+TAMSALKYD+TS+70+X",
            keywords: ["resina", "tamsalkyd", "ts70x", "alquídica", "soya", "xilol", "nitrocelulosa", "industrial"]
        },
        {
            id: "resina-barniz-marino",
            nombre: "Resina Barniz Marino",
            imagen: "imgs/resinas/resina-barniz-marino-jhomeron.png",
            url: "pinturaRePega.html?id=7&nombre=RESINA+BARNIZ+MARINO",
            keywords: ["resina", "barniz", "marino", "alquídica", "soya", "aguarrás", "elasticidad"]
        },
        {
            id: "resina-f100",
            nombre: "Resina F100",
            imagen: "imgs/resinas/resina-f-100-jhomeron.png",
            url: "pinturaRePega.html?id=8&nombre=RESINA+F100",
            keywords: ["resina", "f100", "poliéster", "ortoftálico", "pet", "fibra", "vidrio", "laminados"]
        },
        {
            id: "resina-tamsapol-mas-68",
            nombre: "Resina Tamsapol MAS 68",
            imagen: "imgs/resinas/nuevos/resina-tamsapol-mas-68.png",
            url: "pinturaRePega.html?id=9&nombre=RESINA+TAMSAPOL+MAS+68",
            keywords: ["resina", "tamsapol", "mas68", "poliéster", "ortoftálico", "pet", "masillas", "plásticas"]
        },
        {
            id: "resina-tamsapol-t80",
            nombre: "Resina Tamsapol T80",
            imagen: "imgs/resinas/nuevos/resina-tamsapol-t-80.png",
            url: "pinturaRePega.html?id=10&nombre=RESINA+TAMSAPOL+T80",
            keywords: ["resina", "tamsapol", "t80", "poliéster", "ortoftálico", "abrasión", "gelcoat", "moldeo"]
        },
        {
            id: "resina-setalux-1152",
            nombre: "Resina Setalux 1152 (SS51)",
            imagen: "imgs/resinas/nuevos/resina-setalux-1152.png",
            url: "pinturaRePega.html?id=11&nombre=RESINA+SETALUX+1152+(SS51)",
            keywords: ["resina", "setalux", "1152", "ss51", "acrílica", "hidroxilada", "poliisocianato", "durabilidad"]
        },
        {
            id: "resina-ac-eagle",
            nombre: "Resina AC-Eagle (OH 138-32M60) 60%",
            imagen: "imgs/resinas/nuevos/resina-eagle.png",
            url: "pinturaRePega.html?id=12&nombre=RESINA+AC-EAGLE+(OH+138-32M60)+60%+-+Hydroxy+Acrylic+Resin",
            keywords: ["resina", "ac-eagle", "oh138", "32m60", "acrílica", "hidroxilada", "voc", "automotriz", "industrial"]
        },


        //Insumos Químicos
        {
            id: "octoato-cobalto-t300",
            nombre: "Octoato de Cobalto T300",
            imagen: "imgs/insumos/octoato-de-cobalto-3-kg-jhomeron.png",
            url: "pintuInsuQui.html?id=1&nombre=OCTOATO+DE+COBALTO+T300",
            keywords: ["octoato", "cobalto", "t300", "secante", "catalizador", "pinturas", "resinas", "alquídicas"]
        },
        {
            id: "octoato-plomo-t100",
            nombre: "Octoato de Plomo T100",
            imagen: "imgs/insumos/octoato-de-plomo-t-100-jhomeron.png",
            url: "pintuInsuQui.html?id=2&nombre=OCTOATO+DE+PLOMO+T100",
            keywords: ["octoato", "plomo", "t100", "secante", "metálico", "pinturas", "recubrimientos", "alquídicos"]
        },
        {
            id: "peroxido-mek",
            nombre: "Peróxido de MEK",
            imagen: "imgs/insumos/peroxido-de-mek-jhomeron.png",
            url: "pintuInsuQui.html?id=6&nombre=PEROXIDO+DE+MEK",
            keywords: ["peroxido", "mek", "iniciador", "polimerización", "resinas", "poliéster", "viniléster", "curado"]
        },
        
        // INSUMOS QUÍMICOS - PIGMENTOS
        {
            id: "pigmento-amarillo-md-py34",
            nombre: "Pigmento Amarillo MD PY34",
            imagen: "imgs/insumos/nuevos/pigmento-amarillo-md.png",
            url: "pintuInsuQui.html?id=7&nombre=PIGMENTO+AMARILLO+MD+PY34",
            keywords: ["pigmento", "amarillo", "md", "py34", "inorgánico", "resistencia", "luz", "industrial"]
        },
        {
            id: "pigmento-azul-ultramar-pb29",
            nombre: "Pigmento Azul Ultramar PB 29",
            imagen: "imgs/insumos/nuevos/pigmento-azul-ultramar.png",
            url: "pintuInsuQui.html?id=8&nombre=PIGMENTO+AZUL+ULTRAMAR+PB+29",
            keywords: ["pigmento", "azul", "ultramar", "pb29", "inorgánico", "sintético", "resistencia", "álcalis"]
        },
        {
            id: "solvent-red-119",
            nombre: "Solvent Red 119",
            imagen: "imgs/insumos/nuevos/solvent-red-insumo-industrial.png",
            url: "pintuInsuQui.html?id=9&nombre=SOLVENT+RED+119",
            keywords: ["solvent", "red", "119", "colorante", "orgánico", "transparencia", "solventes", "tinción"]
        },
        
        // INSUMOS QUÍMICOS - ADITIVOS
        {
            id: "casolv-v10",
            nombre: "Casolv V10",
            imagen: "imgs/insumos/nuevos/casolv-v10.png",
            url: "pintuInsuQui.html?id=10&nombre=CASOLV+V10",
            keywords: ["casolv", "v10", "aditivo", "humectante", "dispersante", "solvente", "pigmentos", "floculación"]
        },
        {
            id: "dispercol-qn",
            nombre: "Dispercol QN",
            imagen: "imgs/insumos/nuevos/dispercol-qn-insumo-industrial.png",
            url: "pintuInsuQui.html?id=11&nombre=DISPERCOL+QN",
            keywords: ["dispercol", "qn", "dispersante", "polimérico", "pinturas", "agua", "molienda", "pigmentos"]
        },
        {
            id: "humectante",
            nombre: "Humectante",
            imagen: "imgs/insumos/nuevos/humectante-nonilfenol.png",
            url: "pintuInsuQui.html?id=12&nombre=HUMECTANTE",
            keywords: ["humectante", "tensioactivo", "acuoso", "mojabilidad", "sustratos", "pigmentos", "dispersión", "espuma"]
        },
        
        // INSUMOS QUÍMICOS - TALCO
        {
            id: "talco-ac-325",
            nombre: "Talco AC-325",
            imagen: "imgs/insumos/nuevos/talco-industrial.png",
            url: "pintuInsuQui.html?id=15&nombre=TALCO+AC-325",
            keywords: ["talco", "ac325", "silicato", "magnesio", "hidratado", "micronizado", "carga", "funcional"]
        },
        
        // INSUMOS QUÍMICOS - OTROS
        {
            id: "microesfera-vidrio-m247",
            nombre: "Microesfera de Vidrio M 247 Tipo I",
            imagen: "imgs/insumos/nuevos/microesfera-de-vidrio.png",
            url: "pintuInsuQui.html?id=3&nombre=MICROESFERA+DE+VIDRIO+M+247+TIPO+I",
            keywords: ["microesfera", "vidrio", "m247", "tipo1", "reflectividad", "señalización", "vial", "visibilidad"]
        },
        {
            id: "aerosil-jhomeron",
            nombre: "Aerosil Jhomeron",
            imagen: "imgs/insumos/aerosil-200-jhomeron.png",
            url: "pintuInsuQui.html?id=4&nombre=AEROSIL+JHOMERON",
            keywords: ["aerosil", "jhomeron", "dióxido", "silicio", "pirógeno", "reológico", "tixotrópico", "viscosidad"]
        },
        {
            id: "monomero-estireno",
            nombre: "Monómero Estireno",
            imagen: "imgs/insumos/monomero-estireno-jhomeron-20-kg.png",
            url: "pintuInsuQui.html?id=5&nombre=MONOMERO+ESTIRENO",
            keywords: ["monomero", "estireno", "diluyente", "reactivo", "resinas", "poliéster", "viscosidad", "curado"]
        },
        {
            id: "vinalyst-4330",
            nombre: "Vinalyst 4330",
            imagen: "imgs/insumos/nuevos/vynalist-insumo-industrial.png",
            url: "pintuInsuQui.html?id=13&nombre=VINALYST+4330",
            keywords: ["vinalyst", "4330", "resina", "vinílica", "recubrimientos", "secado", "rápido", "adhesión"]
        },
        {
            id: "fascat-4202",
            nombre: "Fascat 4202",
            imagen: "imgs/insumos/nuevos/fascat.png",
            url: "pintuInsuQui.html?id=14&nombre=FASCAT+4202",
            keywords: ["fascat", "4202", "catalizador", "organometálico", "síntesis", "resinas", "alquídicas", "poliésteres"]
        },
        {
            id: "tiza",
            nombre: "Tiza Blanca Industrial",
            imagen: "imgs/insumos/nuevos/tiza-blanca-industrial.png",
            url: "pintuInsuQui.html?id=16&nombre=TIZA",
            keywords: ["blanca", "tiza", "insumo", "quimico", "síntesis"]
        }
    ];

    // Crear el contenedor de resultados de búsqueda
    const searchContainer = document.querySelector('.busca');
    const searchInput = searchContainer.querySelector('input');

    // Crear el contenedor de resultados si no existe
    let searchResults = document.querySelector('.search-results');
    if (!searchResults) {
        searchResults = document.createElement('div');
        searchResults.className = 'search-results';
        searchContainer.appendChild(searchResults);
    }

    // Función para buscar productos
    function buscarProductos(query) {
        if (!query || query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        const queryLower = query.toLowerCase();
        const resultados = productos.filter(producto => {
            // Buscar en nombre
            const nombreMatch = producto.nombre.toLowerCase().includes(queryLower);

            // Buscar en palabras clave
            const keywordMatch = producto.keywords.some(keyword =>
                keyword.toLowerCase().includes(queryLower)
            );

            return nombreMatch || keywordMatch;
        });

        mostrarResultados(resultados);
    }

    // Función para mostrar resultados
    function mostrarResultados(resultados) {
        searchResults.innerHTML = '';

        if (resultados.length === 0) {
            searchResults.innerHTML = '<div class="search-no-results">No se encontraron productos</div>';
            searchResults.style.display = 'block';
            return;
        }

        resultados.forEach(producto => {
            const item = document.createElement('a');
            item.className = 'search-result-item';
            item.href = producto.url;

            item.innerHTML = `
      <img src="${producto.imagen}" alt="${producto.nombre}" class="search-result-image">
      <div class="search-result-name">${producto.nombre}</div>
    `;

            searchResults.appendChild(item);
        });

        searchResults.style.display = 'block';
    }

    // Event listeners
    searchInput.addEventListener('input', function () {
        buscarProductos(this.value);
    });

    searchInput.addEventListener('focus', function () {
        if (this.value.length >= 2) {
            buscarProductos(this.value);
        }
    });

    // Cerrar resultados al hacer clic fuera
    document.addEventListener('click', function (e) {
        if (!searchContainer.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Enviar búsqueda al presionar Enter
    searchInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = this.value.trim();

            if (query.length >= 2) {
                const resultados = productos.filter(producto => {
                    const nombreMatch = producto.nombre.toLowerCase().includes(query.toLowerCase());
                    const keywordMatch = producto.keywords.some(keyword =>
                        keyword.toLowerCase().includes(query.toLowerCase())
                    );

                    return nombreMatch || keywordMatch;
                });

                if (resultados.length > 0) {
                    // Redirigir al primer resultado
                    window.location.href = resultados[0].url;
                } else {
                    alert('No se encontraron productos que coincidan con tu búsqueda.');
                }
            }
        }
    });

    // Exponer función para pruebas
    window.testBusqueda = function (query) {
        searchInput.value = query;
        buscarProductos(query);
    };
});