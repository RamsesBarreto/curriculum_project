<?php
function enviarCorreo($to, $subject, $message) {
    $headers = "From: tuempresa@dominio.com\r\n";
    $headers .= "Reply-To: tuempresa@dominio.com\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    return mail($to, $subject, $message, $headers);
}
?>