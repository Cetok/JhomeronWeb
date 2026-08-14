<?php
// listar.php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET["borrar"])) {
    $id = (int) $_GET["borrar"];
    $stmt = $conexion->prepare("SELECT ruta_original, ruta_thumb, ruta_detalle, tipo FROM archivos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $fila = $stmt->get_result()->fetch_assoc();

    if ($fila) {
        if ($fila["tipo"] !== "video" && $fila["tipo"] !== "link") {
            // Las rutas en la BD son relativas a la raíz del proyecto; aquí agregamos "../"
            // porque este archivo (listar.php) vive dentro de back_jho/
            $rOriginal = "../" . $fila["ruta_original"];
            $rThumb = $fila["ruta_thumb"] ? "../" . $fila["ruta_thumb"] : null;
            $rDetalle = $fila["ruta_detalle"] ? "../" . $fila["ruta_detalle"] : null;

            if (file_exists($rOriginal)) unlink($rOriginal);
            if ($rThumb && file_exists($rThumb) && $rThumb !== $rOriginal) unlink($rThumb);
            if ($rDetalle && file_exists($rDetalle) && $rDetalle !== $rOriginal) unlink($rDetalle);
        }
        $stmt2 = $conexion->prepare("DELETE FROM archivos WHERE id = ?");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
    }
    $volverA = isset($_GET["filtro"]) ? "listar.php?filtro=" . urlencode($_GET["filtro"]) : "listar.php";
    header("Location: " . $volverA);
    exit;
}


// --- Reordenar: mover una imagen arriba o abajo dentro de su mismo producto ---
if (isset($_GET["mover"]) && isset($_GET["id"])) {
    $idMover = (int) $_GET["id"];
    $direccion = $_GET["mover"]; // "arriba" o "abajo"

    // Traemos el archivo que se quiere mover, para saber su producto_slug
    $stmt = $conexion->prepare("SELECT producto_slug FROM archivos WHERE id = ?");
    $stmt->bind_param("i", $idMover);
    $stmt->execute();
    $filaMover = $stmt->get_result()->fetch_assoc();

    if ($filaMover && $filaMover["producto_slug"]) {
        $slugGrupo = $filaMover["producto_slug"];

        // Traemos TODAS las imágenes de ese mismo producto, en su orden actual
        $stmt2 = $conexion->prepare("SELECT id, orden FROM archivos WHERE producto_slug = ? ORDER BY orden ASC, id ASC");
        $stmt2->bind_param("s", $slugGrupo);
        $stmt2->execute();
        $grupo = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

        // Normalizamos: les asignamos 1,2,3... en el orden actual, para que siempre haya un orden claro
        foreach ($grupo as $i => &$fila) {
            $fila["orden"] = $i + 1;
        }
        unset($fila);

        // Buscamos la posición del que queremos mover
        $posicion = null;
        foreach ($grupo as $i => $fila) {
            if ($fila["id"] == $idMover) { $posicion = $i; break; }
        }

        if ($posicion !== null) {
            $posicionVecino = ($direccion === "arriba") ? $posicion - 1 : $posicion + 1;
            if ($posicionVecino >= 0 && $posicionVecino < count($grupo)) {
                // Intercambiamos el "orden" entre el elegido y su vecino
                $ordenTemp = $grupo[$posicion]["orden"];
                $grupo[$posicion]["orden"] = $grupo[$posicionVecino]["orden"];
                $grupo[$posicionVecino]["orden"] = $ordenTemp;
            }
        }

        // Guardamos los nuevos valores de orden para todo el grupo
        $stmtUpdate = $conexion->prepare("UPDATE archivos SET orden = ? WHERE id = ?");
        foreach ($grupo as $fila) {
            $stmtUpdate->bind_param("ii", $fila["orden"], $fila["id"]);
            $stmtUpdate->execute();
        }
    }

    $volverA = isset($_GET["filtro"]) ? "listar.php?filtro=" . urlencode($_GET["filtro"]) : "listar.php";
    header("Location: " . $volverA);
    exit;
}

// Mismo orden que aparecen las líneas en la web real (igual que en productos.php)
$ordenLineas = [
    "decorativa", "automotriz", "industrial", "marina", "trafico",
    "madera", "disolventes", "resinas-pegamentos", "insumos-quimicos",
];
$nombresLineas = [
    "decorativa" => "Decorativa",
    "automotriz" => "Automotriz",
    "industrial" => "Industrial",
    "marina" => "Marina",
    "trafico" => "Señalización",
    "madera" => "Madera",
    "disolventes" => "Disolventes",
    "resinas-pegamentos" => "Resinas y Pegamentos",
    "insumos-quimicos" => "Insumos Químicos",
];

$filtroLinea = $_GET["filtro"] ?? "";

$lineasDisponiblesRaw = $conexion->query("SELECT DISTINCT linea FROM archivos WHERE tipo = 'imagen' AND linea IS NOT NULL AND linea != ''")->fetch_all(MYSQLI_ASSOC);
usort($lineasDisponiblesRaw, function ($a, $b) use ($ordenLineas) {
    $ia = array_search($a["linea"], $ordenLineas);
    $ib = array_search($b["linea"], $ordenLineas);
    $ia = ($ia === false) ? 999 : $ia;
    $ib = ($ib === false) ? 999 : $ib;
    return $ia <=> $ib;
});

if ($filtroLinea !== "") {
    $stmtF = $conexion->prepare("SELECT * FROM archivos WHERE tipo = 'imagen' AND linea = ? ORDER BY producto_slug ASC, orden ASC, fecha_subida DESC");
    $stmtF->bind_param("s", $filtroLinea);
    $stmtF->execute();
    $filas = $stmtF->get_result()->fetch_all(MYSQLI_ASSOC);
} else {
    $filas = $conexion->query("SELECT * FROM archivos WHERE tipo = 'imagen' ORDER BY FIELD(linea, 'decorativa','automotriz','industrial','marina','trafico','madera','disolventes','resinas-pegamentos','insumos-quimicos') ASC, producto_slug ASC, orden ASC, fecha_subida DESC")->fetch_all(MYSQLI_ASSOC);
}

// Calculamos, para cada imagen, su posición dentro de su propio producto (ej: "2 de 4")
// y si es la primera/última de su grupo — así se puede mostrar "Posición X de Y" en vez
// del número crudo de "orden", y las flechas ▲▼ se desactivan visualmente en los extremos
// (antes se podían pulsar igual ahí, sin hacer nada, lo cual confundía).
$totalPorGrupo = [];
foreach ($filas as $fila) {
    if ($fila["producto_slug"]) $totalPorGrupo[$fila["producto_slug"]] = ($totalPorGrupo[$fila["producto_slug"]] ?? 0) + 1;
}
$contadorPorGrupo = [];
foreach ($filas as &$fila) {
    if ($fila["producto_slug"]) {
        $contadorPorGrupo[$fila["producto_slug"]] = ($contadorPorGrupo[$fila["producto_slug"]] ?? 0) + 1;
        $fila["_posicion"] = $contadorPorGrupo[$fila["producto_slug"]];
        $fila["_total_grupo"] = $totalPorGrupo[$fila["producto_slug"]];
    } else {
        $fila["_posicion"] = null;
        $fila["_total_grupo"] = null;
    }
}
unset($fila);

$iconos_tipo = [
    "imagen" => "🖼",
    "pdf" => "📄",
    "video" => "🎬",
    "link" => "🔗",
];

require "header.php";
?>
    <style>
        .etiqueta-portada { font-size: 11px; color: #0d3393; font-weight: 600; margin-left: 4px; }
        .accion-orden-desactivada { color: #ccc; cursor: default; pointer-events: none; }
    </style>
    <div class="encabezado-pagina">
        <h2>Archivos subidos</h2>
        <p>Gestiona las imágenes, PDFs, videos y links de tu catálogo.</p>
    </div>

    <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:18px;">
        <a href="listar.php" class="filtro-linea <?php echo $filtroLinea === '' ? 'filtro-activo' : ''; ?>">Todas</a>
        <?php foreach ($lineasDisponiblesRaw as $l): ?>
            <a href="listar.php?filtro=<?php echo urlencode($l['linea']); ?>"
               class="filtro-linea <?php echo $filtroLinea === $l['linea'] ? 'filtro-activo' : ''; ?>">
                <?php echo htmlspecialchars($nombresLineas[$l['linea']] ?? ucwords(str_replace('-', ' ', $l['linea']))); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="tarjeta">
        <table>
            <tr>
                <th>Miniatura</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Línea</th>
                <th>Producto</th>
                <th>Posición</th>
                <th>Fecha</th>
                <th></th>
            </tr>
            <?php if (count($filas) === 0): ?>
            <tr><td colspan="8" class="vacio">Aún no has subido ningún archivo. <a class="link-secundario" href="subir.php">Sube el primero →</a></td></tr>
            <?php else: foreach ($filas as $fila): ?>
            <tr>
                <td>
                    <?php if ($fila["tipo"] === "imagen" && $fila["ruta_thumb"]): ?>
                        <img class="miniatura" src="<?php echo htmlspecialchars('../' . $fila["ruta_thumb"]); ?>" alt="">
                    <?php else: ?>
                        <?php echo $iconos_tipo[$fila["tipo"]] ?? "📎"; ?>
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($fila["nombre"]); ?></td>
                <td><span class="gota-tipo gota-<?php echo htmlspecialchars($fila["tipo"]); ?>"><?php echo htmlspecialchars($fila["tipo"]); ?></span></td>
                <td><?php echo htmlspecialchars($fila["linea"] ?: "—"); ?></td>
                <td><?php echo htmlspecialchars($fila["producto_slug"] ?: "—"); ?></td>
                <td>
                    <?php if ($fila["_posicion"] !== null): ?>
                        <?php echo (int) $fila["_posicion"]; ?> de <?php echo (int) $fila["_total_grupo"]; ?>
                        <?php if ($fila["_posicion"] === 1): ?>
                            <span class="etiqueta-portada" title="Esta es la primera imagen: la que se usa como portada / tamaño 1">· portada</span>
                        <?php endif; ?>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </td>
                <td class="col-fecha"><?php echo htmlspecialchars($fila["fecha_subida"]); ?></td>
                <td style="white-space:nowrap;">
                    <?php if ($fila["producto_slug"] && $fila["_total_grupo"] > 1): ?>
                        <?php if ($fila["_posicion"] > 1): ?>
                            <a href="listar.php?mover=arriba&id=<?php echo $fila['id']; ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>" class="accion-orden" title="Subir">▲</a>
                        <?php else: ?>
                            <span class="accion-orden accion-orden-desactivada" title="Ya es la primera">▲</span>
                        <?php endif; ?>
                        <?php if ($fila["_posicion"] < $fila["_total_grupo"]): ?>
                            <a href="listar.php?mover=abajo&id=<?php echo $fila['id']; ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>" class="accion-orden" title="Bajar">▼</a>
                        <?php else: ?>
                            <span class="accion-orden accion-orden-desactivada" title="Ya es la última">▼</span>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a class="accion-editar" href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>
                    <a class="accion-borrar" href="listar.php?borrar=<?php echo $fila['id']; ?><?php echo $filtroLinea ? '&filtro='.urlencode($filtroLinea) : ''; ?>"
                       onclick="return confirm('¿Seguro que quieres borrar este archivo?');">Borrar</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
        </table>
    </div>
<?php require "footer.php"; ?>