<?php
// lineasDecorativa_dinamico.php
// PRUEBA PILOTO: versión de lineasDecorativa.html donde las tarjetas de
// producto se generan automáticamente desde la base de datos.
//
// Lógica: por cada "producto_slug" distinto que exista con linea='decorativa',
// se muestra 1 tarjeta, usando su primera imagen (según orden de subida) como miniatura.

require_once "back_jho/conexion.php";

// Traemos 1 imagen representativa por cada producto de la línea decorativa
$sql = "SELECT a.producto_slug, a.nombre, a.ruta_thumb, a.ruta_original, p.nombre_display, p.orden_listado
        FROM archivos a
        INNER JOIN (
            SELECT producto_slug, MIN(orden) AS min_orden, MIN(id) AS min_id
            FROM archivos
            WHERE linea = 'decorativa' AND tipo = 'imagen' AND producto_slug IS NOT NULL AND producto_slug != ''
            GROUP BY producto_slug
        ) primero
        ON a.producto_slug = primero.producto_slug AND a.id = primero.min_id
        LEFT JOIN productos p ON p.producto_slug = a.producto_slug
        ORDER BY COALESCE(p.orden_listado, 999) ASC, a.nombre ASC";

$productos = $conexion->query($sql)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Línea Decorativa (prueba dinámica) - Jhomeron</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="styleslinea.css" />
    <link rel="stylesheet" href="stylesFooter.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>
<body>
    <div style="background:#fff3cd; border-left:4px solid #e0a800; padding:12px 20px; font-family:'Outfit', sans-serif; font-size:13px;">
        🧪 Prueba piloto — estas tarjetas se generan automáticamente desde la base de datos (línea: decorativa).
        Productos encontrados: <strong><?php echo count($productos); ?></strong>
    </div>

    <div class="arriba">
        <div class="arb">
            <div class="arb2">
                <h2>LÍNEA DECORATIVA (dinámico)</h2>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="cards-pintura desktop-version">
            <div class="cards-row">
                <?php if (count($productos) === 0): ?>
                    <p style="font-family:'Outfit', sans-serif; padding: 20px;">
                        Aún no hay productos con línea "decorativa" y un producto_slug asignado.
                        Sube alguno desde el panel para verlo aparecer aquí automáticamente.
                    </p>
                <?php else: foreach ($productos as $producto): ?>
                    <div class="card product-card">
                        <div class="card-header">
                            <p><?php
                            $titulo = !empty($producto["nombre_display"]) ? $producto["nombre_display"] : str_replace("-", " ", $producto["producto_slug"]);
                            $tituloEscapado = htmlspecialchars(mb_strtoupper($titulo));
                            echo str_replace("|", "<br>", $tituloEscapado); // "|" se convierte en salto de línea
                        ?></p>
                            <img src="icons/goteo2.svg" alt="Estilo Arriba" class="img-estilo" />
                        </div>
                        <img src="<?php echo htmlspecialchars($producto["ruta_thumb"] ?: $producto["ruta_original"]); ?>"
                             alt="<?php echo htmlspecialchars($producto["nombre"]); ?>" class="img-contenido" />
                        <a href="pinturas_dinamico.php?product=<?php echo urlencode($producto["producto_slug"]); ?>" class="ver-mas">
                            VER DETALLES
                        </a>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</body>
</html>