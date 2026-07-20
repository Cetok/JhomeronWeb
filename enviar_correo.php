<?php
// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verificar el reCAPTCHA
    // Actualizar la clave secreta aquí
   // $recaptchaSecretKey = "6Lc8jigrAAAAAG92a38H0KQKYIueIP8uO8sUp5fF"; // Nueva clave secreta
    $recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
    
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captchaResult = json_decode($verify);
    

    // Un score más alto significa mayor probabilidad de que sea un humano
    if ($captchaResult->success && $captchaResult->score >= 0.5) { 
        // reCAPTCHA pasó, procesar el formulario
        
        // Recoger los datos del formulario
        $nombre = isset($_POST['Nombre']) ? htmlspecialchars(trim($_POST['Nombre'])) : '';
        $celular = isset($_POST['Celular']) ? htmlspecialchars(trim($_POST['Celular'])) : '';
        $empresa = isset($_POST['Empresa']) ? htmlspecialchars(trim($_POST['Empresa'])) : '';
        $ciudad = isset($_POST['Ciudad']) ? htmlspecialchars(trim($_POST['Ciudad'])) : '';
        $correo = isset($_POST['Correo']) ? htmlspecialchars(trim($_POST['Correo'])) : '';
        $mensaje = isset($_POST['Mensaje']) ? htmlspecialchars(trim($_POST['Mensaje'])) : '';
        
        // Para debug - guardar en un archivo
        $log = "Datos recibidos: Nombre=$nombre, Celular=$celular, Empresa=$empresa, Ciudad=$ciudad, Correo=$correo, Mensaje=$mensaje\n";
        file_put_contents('form_log.txt', $log, FILE_APPEND);
        
        // Validar que los campos requeridos no estén vacíos
        if (empty($nombre) || empty($celular) || empty($empresa) || empty($ciudad) || empty($correo) || empty($mensaje)) {
            echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
            exit;
        }
        
        // Validar el formato del correo electrónico
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'El formato del correo electrónico no es válido']);
            exit;
        }
        
        // Configurar el destinatario y el asunto
        $destinatario = "ventas@jhomeron.com"; // Reemplaza con tu correo electrónico
        $asunto = "Nueva solicitud de cotización desde el sitio web";
        
        // El resto del código se mantiene igual...
        $mensajeHTML = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { 
                    font-family: Arial, sans-serif; 
                    line-height: 1.6;
                    color: #333;
                }
                .container { 
                    max-width: 600px; 
                    margin: 0 auto; 
                    padding: 20px; 
                    border: 1px solid #ddd;
                    border-radius: 5px;
                }
                h2 { 
                    color: #0d3393; 
                    border-bottom: 2px solid #ef0606; 
                    padding-bottom: 10px; 
                }
                .info-block {
                    background-color: #f9f9f9;
                    padding: 15px;
                    margin-bottom: 20px;
                    border-left: 4px solid #0d3393;
                }
                .label {
                    font-weight: bold;
                    color: #0d3393;
                }
                .footer {
                    font-size: 12px;
                    text-align: center;
                    margin-top: 30px;
                    padding-top: 10px;
                    border-top: 1px solid #ddd;
                    color: #777;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Nueva Solicitud de Cotización</h2>
                
                <div class='info-block'>
                    <p><span class='label'>Nombre:</span> $nombre</p>
                    <p><span class='label'>Celular:</span> $celular</p>
                    <p><span class='label'>Empresa:</span> $empresa</p>
                    <p><span class='label'>Ciudad:</span> $ciudad</p>
                    <p><span class='label'>Correo:</span> $correo</p>
                </div>
                
                <h3>Mensaje:</h3>
                <p>" . nl2br($mensaje) . "</p>
                
                <div class='footer'>
                    <p>Este mensaje fue enviado desde el formulario de contacto en jhomeron.com</p>
                    <p>Fecha y hora: " . date('d/m/Y H:i:s') . "</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Crear una versión de texto plano para clientes de correo que no soportan HTML
        $mensajeTexto = "
        NUEVA SOLICITUD DE COTIZACIÓN
        
        Nombre: $nombre
        Celular: $celular
        Empresa: $empresa
        Ciudad: $ciudad
        Correo: $correo
        
        MENSAJE:
        $mensaje
        
        ----------------------------------------
        Este mensaje fue enviado desde el formulario de contacto en jhomeron.com
        Fecha y hora: " . date('d/m/Y H:i:s') . "
        ";
        
        // Configurar los encabezados del correo
        $cabeceras = "From: Sitio Web Jhomeron <web@jhomeron.com>\r\n";
        $cabeceras .= "Reply-To: $correo\r\n";
        $cabeceras .= "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-Type: multipart/alternative; boundary=\"boundary\"\r\n";
        
        // Construir el mensaje con partes de texto y HTML
        $mensaje = "--boundary\r\n";
        $mensaje .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $mensaje .= $mensajeTexto . "\r\n";
        $mensaje .= "--boundary\r\n";
        $mensaje .= "Content-Type: text/html; charset=UTF-8\r\n";
        $mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $mensaje .= $mensajeHTML . "\r\n";
        $mensaje .= "--boundary--";
        
        // Intentar el envío con manejo de errores
        $mailSuccess = false;
        try {
            $mailSuccess = mail($destinatario, $asunto, $mensaje, $cabeceras);
            file_put_contents('form_log.txt', "Intento de envío: " . ($mailSuccess ? "Éxito" : "Fallido") . "\n", FILE_APPEND);
        } catch (Exception $e) {
            file_put_contents('form_log.txt', "Error: " . $e->getMessage() . "\n", FILE_APPEND);
        }
        
        if ($mailSuccess) {
            echo json_encode(['success' => true, 'message' => 'Tu mensaje ha sido enviado correctamente. ¡Gracias por contactarnos!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.']);
        }
    } else {
        // reCAPTCHA falló
        echo json_encode(['success' => false, 'message' => 'No pudimos verificar que no eres un robot. Por favor, inténtalo de nuevo más tarde.']);
        
        // Para debug - guardar información del error de reCAPTCHA
        $log = "Error de reCAPTCHA: " . json_encode($captchaResult) . "\n";
        file_put_contents('recaptcha_log.txt', $log, FILE_APPEND);
    }
} else {
    // Si alguien intenta acceder directamente a este script
    echo json_encode(['success' => false, 'message' => 'Acceso no permitido']);
}
?>