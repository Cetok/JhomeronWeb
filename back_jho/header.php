<?php
// header.php
// Encabezado compartido: sidebar de navegación + estilos del panel.
// Se incluye al inicio de subir.php, listar.php y editar.php.

$pagina_actual = basename($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Jhomeron</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300..800&display=swap" rel="stylesheet" />
    <style>
        :root {
            --azul: #0d3393;
            --azul-oscuro: #071b4a;
            --azul-brillo: #3b6fed;
            --blanco: #ffffff;
            --gris-fondo: #f5f6fa;
            --gris-borde: #e4e6ef;
            --gris-texto: #6b7280;
            --rojo: #c0392b;
            --texto: #1b1d29;

            --gota-imagen: #3b6fed;
            --gota-pdf: #e0672c;
            --gota-video: #7c3aed;
            --gota-link: #0d9488;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--gris-fondo);
            color: var(--texto);
            display: flex;
            min-height: 100vh;
        }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            width: 230px;
            flex-shrink: 0;
            background: linear-gradient(180deg, var(--azul-oscuro) 0%, var(--azul) 130%);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 28px 18px;
            position: relative;
            overflow: hidden;
        }
        /* Gota decorativa de fondo, como una salpicadura de pintura */
        .sidebar::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            background: radial-gradient(circle, rgba(59,111,237,0.35) 0%, transparent 70%);
            bottom: -80px;
            right: -80px;
            border-radius: 50%;
            pointer-events: none;
        }
        .marca {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }
        .marca .gota-logo {
            width: 34px;
            height: 34px;
            border-radius: 50% 50% 50% 4px;
            background: linear-gradient(135deg, #ffffff, var(--azul-brillo));
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.25);
        }
        .marca h1 {
            font-size: 17px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }
        .marca span {
            display: block;
            font-size: 11px;
            font-weight: 300;
            opacity: 0.65;
            letter-spacing: 0.5px;
        }

        nav.menu-lateral {
            display: flex;
            flex-direction: column;
            gap: 4px;
            position: relative;
            z-index: 1;
            flex-grow: 1;
        }
        nav.menu-lateral a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.18s, color 0.18s, transform 0.18s;
        }
        nav.menu-lateral a .icono { font-size: 17px; width: 20px; text-align: center; }
        nav.menu-lateral a:hover {
            background: rgba(255,255,255,0.08);
            color: white;
            transform: translateX(2px);
        }
        nav.menu-lateral a.activo {
            background: rgba(255,255,255,0.14);
            color: white;
            font-weight: 600;
            box-shadow: inset 3px 0 0 var(--azul-brillo);
        }

        .pie-sidebar {
            position: relative;
            z-index: 1;
            margin-top: 16px;
        }
        .tarjeta-usuario {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 10px 12px;
            margin-bottom: 10px;
        }
        .avatar-usuario {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--azul-brillo), #8fb0ff);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }
        .info-usuario {
            overflow: hidden;
        }
        .info-usuario .nombre-usuario {
            font-size: 13.5px;
            font-weight: 600;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .info-usuario .rol-usuario {
            font-size: 11px;
            color: rgba(255,255,255,0.55);
        }
        .boton-salir {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 9px;
            border-radius: 10px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: background 0.18s, color 0.18s;
        }
        .boton-salir:hover {
            background: rgba(192,57,43,0.25);
            border-color: rgba(192,57,43,0.4);
            color: white;
        }

        /* ---------- CONTENIDO ---------- */
        .contenido {
            flex-grow: 1;
            padding: 36px 44px;
            max-width: 1400px;
            width: 100%;
        }
        .encabezado-pagina {
            margin-bottom: 26px;
        }
        .encabezado-pagina h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--texto);
        }
        .encabezado-pagina p {
            color: var(--gris-texto);
            font-size: 14px;
            margin-top: 4px;
        }

        .tarjeta {
            background: white;
            border-radius: 16px;
            padding: 28px 30px;
            box-shadow: 0 1px 3px rgba(20,20,50,0.06), 0 8px 24px rgba(20,20,50,0.04);
            border: 1px solid var(--gris-borde);
        }

        .link-secundario {
            color: var(--azul);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }
        .link-secundario:hover { text-decoration: underline; }

        label { display: block; font-size: 12.5px; font-weight: 600; margin: 16px 0 6px; color: #4b5060; text-transform: uppercase; letter-spacing: 0.4px; }
        input, select {
            width: 100%;
            padding: 11px 13px;
            border: 1.5px solid var(--gris-borde);
            border-radius: 9px;
            font-size: 14.5px;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.15s, box-shadow 0.15s;
            background: #fbfbfd;
        }
        input:focus, select:focus {
            outline: none;
            border-color: var(--azul-brillo);
            box-shadow: 0 0 0 3px rgba(59,111,237,0.15);
            background: white;
        }

        button, .boton {
            margin-top: 26px;
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--azul-brillo), var(--azul));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.15s;
            box-shadow: 0 4px 14px rgba(59,111,237,0.35);
        }
        button:hover, .boton:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(59,111,237,0.45); }
        button:active { transform: translateY(0); }

        .mensaje {
            margin-bottom: 18px;
            padding: 13px 16px;
            background: #eafaf0;
            border-left: 4px solid #1ea672;
            border-radius: 8px;
            font-size: 14px;
            color: #146c48;
        }
        .error {
            margin-bottom: 18px;
            padding: 13px 16px;
            background: #fdeeec;
            border-left: 4px solid var(--rojo);
            border-radius: 8px;
            font-size: 14px;
            color: var(--rojo);
        }

        /* ---------- GOTAS DE TIPO (badges) ---------- */
        .gota-tipo {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px 4px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
        }
        .gota-tipo::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50% 50% 50% 0;
            background: white;
            transform: rotate(-45deg);
            opacity: 0.9;
        }
        .gota-imagen { background: var(--gota-imagen); }
        .gota-pdf { background: var(--gota-pdf); }
        .gota-video { background: var(--gota-video); }
        .gota-link { background: var(--gota-link); }

        /* ---------- TABLA ---------- */
        table { width: 100%; table-layout: auto; border-collapse: collapse; margin-top: 8px; }
        th {
            text-align: left; font-size: 11.5px; text-transform: uppercase; letter-spacing: 0.5px;
            color: #9298a8; padding: 12px 10px; border-bottom: 2px solid var(--gris-borde); font-weight: 700;
            white-space: nowrap;
        }
        td { padding: 12px 10px; border-bottom: 1px solid var(--gris-borde); font-size: 14px; vertical-align: middle; }
        td.col-fecha { white-space: nowrap; color: #6b7280; font-size: 13px; }
        tr:hover td { background: #fafbff; }
        img.miniatura { width: 46px; height: 46px; object-fit: cover; border-radius: 8px; border: 1px solid var(--gris-borde); flex-shrink: 0; }

        .accion-orden {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border-radius: 6px;
            background: var(--gris-fondo);
            color: var(--azul);
            text-decoration: none;
            font-size: 11px;
            margin-right: 4px;
            border: 1px solid var(--gris-borde);
            transition: background 0.15s;
        }
        .accion-orden:hover { background: #eaf0fc; }
        .accion-editar { color: var(--azul); text-decoration: none; font-size: 13px; font-weight: 600; margin-right: 14px; margin-left: 8px; }
        .accion-editar:hover { text-decoration: underline; }
        .accion-borrar { color: var(--rojo); text-decoration: none; font-size: 13px; font-weight: 600; }
        .accion-borrar:hover { text-decoration: underline; }
        .vacio { text-align: center; color: #9298a8; padding: 40px 0; }

        details summary::-webkit-details-marker { display: none; }
        details summary { list-style: none; }
        details[open] summary { border-bottom: 1px solid var(--gris-borde); }

        .filtro-linea {
            display: inline-block;
            padding: 7px 16px;
            border-radius: 20px;
            background: white;
            border: 1.5px solid var(--gris-borde);
            color: #4b5060;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
        }
        .filtro-linea:hover { border-color: var(--azul-brillo); }
        .filtro-linea.filtro-activo {
            background: var(--azul);
            border-color: var(--azul);
            color: white;
        }

        /* ---------- ZONA DE ARCHIVO ---------- */
        .zona-archivo {
            position: relative;
            border: 2px dashed var(--gris-borde);
            border-radius: 12px;
            padding: 26px 18px;
            text-align: center;
            background: #fbfbfd;
            transition: border-color 0.15s, background 0.15s;
            cursor: pointer;
        }
        .zona-archivo:hover { border-color: var(--azul-brillo); background: #f4f7ff; }
        .zona-archivo input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .zona-archivo .icono-subida {
            font-size: 26px;
            display: block;
            margin-bottom: 6px;
        }
        .zona-archivo .texto-subida {
            font-size: 13.5px;
            color: #6b7280;
            font-weight: 500;
        }
        .zona-archivo .texto-subida strong { color: var(--azul-brillo); }
        .zona-archivo .nombre-archivo-elegido {
            margin-top: 8px;
            font-size: 12.5px;
            color: var(--azul);
            font-weight: 600;
            word-break: break-all;
        }

        .vista-actual {
            display: flex; align-items: center; gap: 14px;
            background: var(--gris-fondo); padding: 14px; border-radius: 12px; margin-bottom: 6px;
        }
        .vista-actual img { width: 64px; height: 64px; object-fit: cover; border-radius: 8px; border: 1px solid var(--gris-borde); }
        .nota { font-size: 12px; color: #9298a8; margin-top: 5px; }

        .contenido { width: 100%; }

        @media (max-width: 900px) {
            .contenido { padding: 28px 24px; }
            .tarjeta { padding: 22px 18px; }
        }

        @media (max-width: 720px) {
            body { flex-direction: column; }
            .sidebar {
                width: 100%;
                flex-direction: row;
                align-items: center;
                padding: 14px 18px;
                overflow-x: auto;
            }
            .sidebar::after { display: none; }
            .marca { margin-bottom: 0; flex-shrink: 0; }
            .marca span { display: none; }
            nav.menu-lateral { flex-direction: row; flex-grow: 0; gap: 6px; }
            nav.menu-lateral a { padding: 8px 10px; font-size: 13px; white-space: nowrap; }
            .pie-sidebar { display: none; }
            .contenido { padding: 20px 16px; }
            .encabezado-pagina h2 { font-size: 20px; }
            .tarjeta { padding: 18px 16px; border-radius: 12px; }
        }

        @media (max-width: 480px) {
            .contenido { padding: 16px 12px; }
            .encabezado-pagina p { font-size: 13px; }
            button, .boton { font-size: 14px; padding: 11px; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="marca">
            <div class="gota-logo"></div>
            <div>
                <h1>Jhomeron</h1>
                <span>Panel de gestión</span>
            </div>
        </div>
        <nav class="menu-lateral">
            <a href="subir.php" class="<?php echo $pagina_actual === 'subir.php' ? 'activo' : ''; ?>">
                <span class="icono">⬆</span> Subir archivo
            </a>
            <a href="listar.php" class="<?php echo ($pagina_actual === 'listar.php' || $pagina_actual === 'editar.php') ? 'activo' : ''; ?>">
                <span class="icono">🗂</span> Ver archivos
            </a>
            <a href="productos.php" class="<?php echo $pagina_actual === 'productos.php' ? 'activo' : ''; ?>">
                <span class="icono">🏷</span> Productos
            </a>
        </nav>
        <div class="pie-sidebar">
            <?php if (isset($_SESSION["admin_usuario"])): ?>
            <div class="tarjeta-usuario">
                <div class="avatar-usuario"><?php echo strtoupper(substr($_SESSION["admin_usuario"], 0, 1)); ?></div>
                <div class="info-usuario">
                    <div class="nombre-usuario"><?php echo htmlspecialchars($_SESSION["admin_usuario"]); ?></div>
                    <div class="rol-usuario">Administrador</div>
                </div>
            </div>
            <?php endif; ?>
            <a href="logout.php" class="boton-salir"><span>↩</span> Cerrar sesión</a>
        </div>
    </aside>
    <main class="contenido">