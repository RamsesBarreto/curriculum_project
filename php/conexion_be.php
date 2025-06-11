<?php

// CONEXION A LA BASE DE DATOS
$conexion = mysqli_connect("localhost","root", "", "curriculum_manager_db");

// Se le da a la funcion mysqli_connect los siguientes datos necesarios: 
// nombre del servidor local donde se encuentra nuestra base de datos: "localhost"
// El nombre del administrador de la base de datos en XAMPP (predeterminada por phpmyadmin): "root"
// su contraseña (que en este caso esta por predeterminada vacia)
// el nombre de la base de datos donde albergan todas las tablas relacionadas: "login_register_db"

// VERIFICACION DE QUE ESTE CONECTADO
// Si la conexion fue valida y existe entonces:
// if($conexion) {
//     echo 'Conexion existosa';
// }

// De lo contrario, fue rechazada o no se logro realizar
// else {
//     echo 'no se ha podido conectar a la base de datos';
// }
?>