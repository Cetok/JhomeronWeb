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
    header("Location: listar.php");
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

    header("Location: listar.php");
    exit;
}

$resultado = $conexion->query("SELECT * FROM archivos WHERE tipo = 'imagen' ORDER BY producto_slug ASC, orden ASC, fecha_subida DESC");

$iconos_tipo = [
    "imagen" => "🖼",
    "pdf" => "📄",
    "video" => "🎬",
    "link" => "🔗",
];

require "header.php";
?>
    <div class="encabezado-pagina">
        <h2>Archivos subidos</h2>
        <p>Gestiona las imágenes, PDFs, videos y links de tu catálogo.</p>
    </div>

    <div class="tarjeta">
        <table>
            <tr>
                <th>Miniatura</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Línea</th>
                <th>Producto</th>
                <th>Orden</th>
                <th>Fecha</th>
                <th></th>
            </tr>
            <?php if ($resultado->num_rows === 0): ?>
            <tr><td colspan="8" class="vacio">Aún no has subido ningún archivo. <a class="link-secundario" href="subir.php">Sube el primero →</a></td></tr>
            <?php else: while ($fila = $resultado->fetch_assoc()): ?>
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
                <td><?php echo (int) $fila["orden"]; ?></td>
                <td class="col-fecha"><?php echo htmlspecialchars($fila["fecha_subida"]); ?></td>
                <td style="white-space:nowrap;">
                    <?php if ($fila["producto_slug"]): ?>
                        <a href="listar.php?mover=arriba&id=<?php echo $fila['id']; ?>" class="accion-orden" title="Subir">▲</a>
                        <a href="listar.php?mover=abajo&id=<?php echo $fila['id']; ?>" class="accion-orden" title="Bajar">▼</a>
                    <?php endif; ?>
                    <a class="accion-editar" href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>
                    <a class="accion-borrar" href="listar.php?borrar=<?php echo $fila['id']; ?>"
                       onclick="return confirm('¿Seguro que quieres borrar este archivo?');">Borrar</a>
                </td>
            </tr>
            <?php endwhile; endif; ?>
        </table>
    </div>
<?php require "footer.php"; ?>