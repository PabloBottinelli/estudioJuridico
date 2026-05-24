<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $destinatario = "info@cimientos.com.ar";

    $nombre = trim($_POST["nombre"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $asunto = trim($_POST["asunto"] ?? "");
    $mensaje = trim($_POST["mensaje"] ?? "");

    if ($nombre === "" || $email === "" || $mensaje === "") {
        header("Location: index.html?error=campos#contacto");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.html?error=email#contacto");
        exit;
    }

    if ($asunto === "") {
        $asunto = "Nueva consulta desde la web";
    }

    $contenido = "Nueva consulta desde el sitio web de Consultora Cimientos\n\n";
    $contenido .= "Nombre: " . $nombre . "\n";
    $contenido .= "Email: " . $email . "\n";
    $contenido .= "Asunto: " . $asunto . "\n\n";
    $contenido .= "Mensaje:\n" . $mensaje . "\n";

    $headers = "From: Consultora Cimientos <info@cimientos.com.ar>\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $enviado = mail($destinatario, $asunto, $contenido, $headers);

    if ($enviado) {
        header("Location: index.html?enviado=ok#contacto");
        exit;
    } else {
        header("Location: index.html?error=envio#contacto");
        exit;
    }

} else {
    header("Location: index.html");
    exit;
}