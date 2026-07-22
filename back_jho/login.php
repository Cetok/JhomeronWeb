<?php
// login.php
session_start();
require_once "conexion.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_ingresado = $_POST["usuario"] ?? "";
    $password_ingresada = $_POST["password"] ?? "";

    $stmt = $conexion->prepare("SELECT id, usuario, password_hash FROM usuarios_admin WHERE usuario = ?");
    $stmt->bind_param("s", $usuario_ingresado);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        if (password_verify($password_ingresada, $fila["password_hash"])) {
            $_SESSION["admin_id"] = $fila["id"];
            $_SESSION["admin_usuario"] = $fila["usuario"];
            header("Location: subir.php");
            exit;
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al panel - Jhomeron</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300..800&display=swap" rel="stylesheet" />
    <style>
        :root {
            --azul: #0d3393;
            --azul-oscuro: #071b4a;
            --azul-brillo: #3b6fed;
            --rojo: #c0392b;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, var(--azul-oscuro) 0%, var(--azul) 60%, var(--azul-brillo) 130%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        /* Gotas decorativas flotando de fondo */
        .gota-fondo {
            position: absolute;
            border-radius: 50% 50% 50% 0;
            background: rgba(255,255,255,0.06);
            transform: rotate(-45deg);
        }
        .g1 { width: 260px; height: 260px; top: -60px; left: -60px; }
        .g2 { width: 180px; height: 180px; bottom: 40px; right: 60px; background: rgba(255,255,255,0.05); }
        .g3 { width: 100px; height: 100px; bottom: -30px; left: 30%; background: rgba(255,255,255,0.07); }

        .caja-login {
            position: relative;
            z-index: 2;
            background: white;
            padding: 44px 40px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(3,10,40,0.35);
            width: 330px;
            text-align: center;
        }
        .gota-logo {
            width: 46px;
            height: 46px;
            margin: 0 auto 18px;
            border-radius: 50% 50% 50% 4px;
            background: linear-gradient(135deg, var(--azul-brillo), var(--azul-oscuro));
            box-shadow: 0 6px 16px rgba(13,51,147,0.35);
        }
        .caja-login h2 {
            color: #1b1d29;
            font-size: 21px;
            font-weight: 700;
        }
        .caja-login p.subtitulo {
            color: #9298a8;
            font-size: 13px;
            margin-top: 4px;
            margin-bottom: 22px;
        }
        .caja-login input {
            width: 100%;
            padding: 12px 14px;
            margin: 7px 0;
            border: 1.5px solid #e4e6ef;
            border-radius: 9px;
            font-size: 14px;
            font-family: 'Outfit', sans-serif;
            background: #fbfbfd;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .caja-login input:focus {
            outline: none;
            border-color: var(--azul-brillo);
            box-shadow: 0 0 0 3px rgba(59,111,237,0.15);
            background: white;
        }
        .caja-login button {
            width: 100%;
            padding: 12px;
            margin-top: 14px;
            background: linear-gradient(135deg, var(--azul-brillo), var(--azul));
            color: white;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            font-size: 15px;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(59,111,237,0.35);
            transition: transform 0.15s, box-shadow 0.15s;
        }
        .caja-login button:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(59,111,237,0.45); }
        .mensaje-error {
            color: var(--rojo);
            font-size: 13px;
            margin-bottom: 8px;
            background: #fdeeec;
            padding: 9px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="gota-fondo g1"></div>
    <div class="gota-fondo g2"></div>
    <div class="gota-fondo g3"></div>

    <div class="caja-login">
        <div class="gota-logo"></div>
        <h2>Panel Jhomeron</h2>
        <p class="subtitulo">Acceso administrativo</p>
        <?php if ($error): ?>
            <p class="mensaje-error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>