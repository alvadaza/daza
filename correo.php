<?php

    $destinatario = 'alvarodaza48@gmail.com';
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['Massage'];

    $header = "Enviado desde la pájina wed";
    $mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;

    mail($destinatario, $nombre, $email, $mensajeCompleto, $header);
    echo "<script>alert('correo enviado exitosamente')</script>";
    echo "<script> setTimeout(\"location.href='index.html'\",1000)</script>";
?>
