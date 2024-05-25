<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Envía un mensaje de error si algún campo es inválido
        header("Location: error.html");
        exit;
    }

    // Configura el destinatario del correo
    $recipient = "ingenieroalvarod@gmail.com";
    $subject = "Nuevo mensaje de $name";
    
    // Construye el contenido del correo
    $email_content = "Nombre: $name\n";
    $email_content .= "Correo: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Configura las cabeceras del correo
    $email_headers = "From: $name <$email>";

    // Envía el correo
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Redirecciona a una página de agradecimiento si el correo se envió correctamente
        header("Location: gracias.html");
    } else {
        // Redirecciona a una página de error si hubo un problema
        header("Location: error.html");
    }
}
?>

