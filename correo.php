<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = 'alvarodaza48@gmail.com';
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['Massage'];

    // Limpiar el contenido de las variables para evitar ataques de inyección
    $nombre = htmlspecialchars($nombre);
    $email = htmlspecialchars($email);
    $mensaje = htmlspecialchars($mensaje);

    // Construir el mensaje completo
    $header = "From: $email\r\nReply-To: $email\r\n";
    $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;

    // Usar la función mail() para enviar el correo electrónico
    if (mail($destinatario, 'Asunto del correo', $mensajeCompleto, $header)) {
        echo "<script>alert('Correo enviado exitosamente');</script>";
    } else {
        echo "<script>alert('Error al enviar el correo');</script>";
    }

    // Redirigir al usuario después de enviar el correo
    echo "<script>setTimeout(function() { window.location.href = 'index.html'; }, 1000);</script>";
    if (mail($destinatario, 'Asunto del correo', $mensajeCompleto, $header)) {
        echo "<script>alert('Correo enviado exitosamente');</script>";
    } else {
        $error = error_get_last();
        echo "<script>alert('Error al enviar el correo: " . $error['message'] . "');</script>";
    }
    
}
?>
