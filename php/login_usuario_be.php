
<script src="../JS/sweetalert2.js"></script>

<?php

    session_start();

    include_once ('conexion_be.php');

    // INPUTS POST DEL LOGIN
    
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];

    // metodo de consulta
    $validar_login_aspirante = mysqli_query($conexion, "SELECT * FROM applicant WHERE email = '$correo' AND password = '$contrasena'");
    // validar si el usuario existe

    // Si se encuentra coincidencias entonces



    if(mysqli_num_rows($validar_login_aspirante) > 0) {
        $usuario = mysqli_fetch_assoc($validar_login_aspirante);
        // DATOS PERSONALES
        $_SESSION['nombre'] = $usuario['name'];
        $_SESSION['apellido'] = $usuario['lastname'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['phone'] = $usuario['phone_number'];
        $_SESSION['tipo_usuario'] = 'applicant';
        $_SESSION['edad'] = $usuario['age'];
        $_SESSION['genero'] = $usuario['gender'];
        $_SESSION['nacimiento'] = $usuario['birthday_date'];
        $_SESSION['direccion'] = $usuario['address'];
        $_SESSION['tipo_usuario'] = 'aspirante';
        $_SESSION['id_aspirante'] = $usuario['id'];
        mysqli_close($conexion);
        header("location: ../c.sistema/aspirante.php");
        exit();
        
    }

    else {
      $ejecutar = true;
    }


    if($ejecutar) {

       $validar_login_empresa = mysqli_query($conexion, "SELECT * FROM company WHERE email = '$correo' AND password = '$contrasena'");

      if(mysqli_num_rows($validar_login_empresa) > 0) {
        $usuario = mysqli_fetch_assoc($validar_login_empresa);
        $_SESSION['nombre'] = $usuario['social_denomination'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['phone'] = $usuario['contact_number'];
        $_SESSION['industria'] = $usuario['industry'];
        $_SESSION['rif'] = $usuario['rif'];
        $_SESSION['domicilio'] = $usuario['domicile'];
        $_SESSION['tipo_usuario'] = 'empresa';
        $_SESSION['id_empresa'] = $usuario['id'];
        mysqli_close($conexion);
        header("location: ../c.sistema/empresa.php");
        exit();
    }

  }

    else {
      $error = true;
    }

  
      echo "<script>
    alert('No hay coincidencias');
    window.location = '/login-registro/a.inicio/login_register.php';
    </script>";
    exit();





?>