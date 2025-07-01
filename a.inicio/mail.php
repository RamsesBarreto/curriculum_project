<?php

$to="ramsesbarreto2005@gmail.com";
$subject="prueba de correo";
$message="este es un correo con xampp"; 
$headers='From: talenthunterbooking@gmail.com' ."\r\n".
'Reply-To: talenthunterbooking@gmail.com'; 


if(mail($to,$subject,$message,$headers)){
    echo "el correo enviado a $to fue exitoso";
}
else{
echo "Error al enviar el correo";
}
?>