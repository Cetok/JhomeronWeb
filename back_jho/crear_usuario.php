<?php
// crear_usuario.php
// USO UNICO: crea tu primer usuario admin con la contraseña ya cifrada.
// Despues de usarlo UNA VEZ, hay que BORRARLO del servidor por seguridad.

require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_nuevo = trim($_POST["usuario"]);
    $password_nueva = $_POST["password"];

    if ($usuario_nuevo === "" || $password_nueva === "") {
        $mensaje = "Completa ambos campos.";
    } else {
        $password_cifrada = password_hash($password_nueva, PASSWORD_DEFAULT);

        $stmt = $conexion->prepare("INSERT INTO usuarios_admin (usuario, password_hash) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario_nuevo, $password_cifrada);

        if ($stmt->execute()) {
            $mensaje = "Usuario '$usuario_nuevo' creado correctamente. Ya puedes ir a login.php. Recuerda BORRAR este archivo (crear_usuario.php) ahora.";
        } else {
            $mensaje = "Error: " . $stmt->error . " (Ya existe ese usuario?)";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear usuario admin (uso unico)</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 60px auto; }
        input { width: 100%; padding: 8px; margin: 6px 0; box-sizing: border-box; }
        button { padding: 8px 16px; background: #0d3393; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .mensaje { margin-top: 15px; padding: 10px; background: #eee; border-radius: 4px; }
        .aviso { color: #c0392b; font-weight: bold; }
    </style>
</head>
<body>
    <p class="aviso">Este archivo es de uso unico. Borralo despues de crear tu usuario.</p>
    <h2>Crear usuario admin</h2>
    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario que quieres usar" required>
        <input type="password" name="password" placeholder="Contraseña que quieres usar" required>
        <button type="submit">Crear usuario</button>
    </form>
    <?php if ($mensaje): ?>
        <div class="mensaje"><?php echo htmlspecialchars($mensaje); ?></div>
    <?php endif; ?>
</body>
</html>