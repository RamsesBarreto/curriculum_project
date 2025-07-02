<?php
    
session_start();

if(!isset($_SESSION['tipo_usuario'])) {
    echo "<script>
    alert('Debes iniciar sesion primero');
    window.location = '/login-registro/a.inicio/login_register.php';
    </script>";
    session_destroy();
    die();
}

if($_SESSION['tipo_usuario'] != 'empresa') {
    header("location: /login-registro/c.sistema/aspirante.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME ASPIRANTE</title>
    <link rel="stylesheet" href="../css/estructura.css">
    <link rel="stylesheet" href="../css/tarjetas.css">
<style>
        /* Animación de aparición para el manual */
        .fade-in {
            opacity: 0;
            transform: translateY(0px) scale(0.96);
            transition: opacity 1.2s cubic-bezier(0.22, 1, 0.36, 1), transform 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    </style>
   

</head>

<body class="aparecer-arriba">
<header>
        <div class="container">
            <div class="logo">
            <div class="imagen-logo"></div>
                <p>TALENTHUNTER</p>
            </div>
            <nav>
                <a href="/login-registro/c.sistema/empresa.php">Inicio</a>
                <a href="/login-registro/b.formularios/publicaciones.php">Ofertar</a>
                <a href="/login-registro/c.sistema/buzon.php">Buzon de CV</a>
                <a href="/login-registro/c.sistema/manualempresa.html">Manual</a>
                <a href="/login-registro/php/cerrar_sesion.php">Cerrar Sesion</a>
            </nav>
        </div>
    </header>
    <section id="caracteristicas" class="empresa fade-in">
        <div class="container">

            

<div class="izquierda-wrapper">
                


<div class="carta-container">
                

            <div class="interes-wrapper">
                    <h2>Datos Corporativos</h2>
                </div> 
                    <div class="cartas">
                        <div class="titulo-cartas-wrapper">
                            <div class="img-container perfil"></div>
                            <h3><?php echo ucfirst($_SESSION['nombre'])?></h3>
                        </div>
                        <p><?php echo 'Sector' . ' ' . ucfirst($_SESSION['industria'])?></p>
                    </div>
                    <div class="datos-container">
                        <div class="datos">
                            <svg class="img-container" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M21 3C21.5523 3 22 3.44772 22 4V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V19H20V7.3L12 14.5L2 5.5V4C2 3.44772 2.44772 3 3 3H21ZM8 15V17H0V15H8ZM5 10V12H0V10H5ZM19.5659 5H4.43414L12 11.8093L19.5659 5Z">
                                </path>
                            </svg>
                            <p><?php echo $_SESSION['email']?></p>
                        </div>
                        <div class="datos">
                            <svg class="img-container" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z">
                                </path>
                            </svg>
                            <p><?php echo $_SESSION['phone']?></p>
                        </div>
                        <div class="datos">
                            <svg class="img-container" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13Z">
                                </path>
                            </svg>
                            <p><?php echo $_SESSION['domicilio']?></p>
                        </div>
                        <div class="datos">
                            <img class="img-container" src="../img/bank.png" alt="">
                            <p><?php echo $_SESSION['rif']?></p>
                        </div>
                    </div>

                </div>

            </div>
                
<div class="bienvenida-container">
  <div class="bienvenida-wrapper">
                    <h3><?php echo 'Bienvenido' . ' ' . ucfirst($_SESSION['nombre'])?></h3>
                    <p>Gestiona tu perfil, publica las ofertas de empleo disponibles en tu compañia, gestiona el buzon de curriculums y consulta el manual para hallar a los candidatos laborales capacitados para el puesto de trabajo.</p>
                </div>
                </div>


<div class="content-wrapper">

                <div class="carta-container">
                    <!-- PRIMERA PARTE -->
                     <div class="interes-wrapper">
                    <h2>Datos de interes</h2>
                </div> 
                    <div class="primer-wrapper">
                          <!-- ////////////////////////////////////////////////////////////////// -->
                      <a href="/login-registro/b.formularios/publicaciones.php"><div class="cartas">
                            <div class="titulo-cartas-wrapper">
                                <h3>Ofertar</h3>
                                <svg class="img-container" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M9 13V16H15V13H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V13H9ZM11 11H13V14H11V11ZM7 5V2C7 1.44772 7.44772 1 8 1H16C16.5523 1 17 1.44772 17 2V5H21C21.5523 5 22 5.44772 22 6V11H15V9H9V11H2V6C2 5.44772 2.44772 5 3 5H7ZM9 3V5H15V3H9Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="parrafo-wrapper">
                            <p>Publica las vacantes disponibles de tu empresa! </p>
                            </div>
                        </div>
                        </a>
                          <!-- ////////////////////////////////////////////////////////////////// -->
                <a href="/Login-Registro/c.sistema/buzon.php"> 
                        <div class="cartas">
                            <div class="titulo-cartas-wrapper">
                                <h3>Buzon de CV</h3>
                                <svg class="img-container" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                    </path>
                                </svg>

                            </div>
                            <p>Gestiona los curriculums <br> de tus publicaciones!</p>
                        </div>
                    </div>
                </a>
                

                
                        

                    <!-- SEGUNDA PARTE -->
                  
                        <!-- ////////////////////////////////////////////////////////////////// -->
                       
                          <div class="segundo-wrapper">
                        <a href="">
                            <div class="cartas">
                            <div class="titulo-cartas-wrapper">
                                <h3>Imagen</h3>
                                <svg class="img-container" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM20 17H24V19H20V17ZM17 12H24V14H17V12ZM19 7H24V9H19V7Z">
                                    </path>
                                </svg>

                            </div>
                            <p>Perzonaliza tu perfil para atraer aspirantes! </p>
                        </div>
                        </a>
                         <!-- ////////////////////////////////////////////////////////////////// -->
<a href="/login-registro/c.sistema/manualempresa.html">
    <div class="cartas">
                            <div class="titulo-cartas-wrapper">
                                <h3>Manual</h3>
                                <svg class="img-container" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 15V17H13V15H11ZM13 13.3551C14.4457 12.9248 15.5 11.5855 15.5 10C15.5 8.067 13.933 6.5 12 6.5C10.302 6.5 8.88637 7.70919 8.56731 9.31346L10.5288 9.70577C10.6656 9.01823 11.2723 8.5 12 8.5C12.8284 8.5 13.5 9.17157 13.5 10C13.5 10.8284 12.8284 11.5 12 11.5C11.4477 11.5 11 11.9477 11 12.5V14H13V13.3551Z">
                                    </path>
                                </svg>

                            </div>
                            <p>Expande tus conocimientos sobre el sistema! </p>
                        </div>

</a>                    <!-- ////////////////////////////////////////////////////////////////// -->
                    </div>
                    
                </div>
                </div>


        </div>
        

    </section>


    <footer>
        <div class="container">
            <div class="texto">
                <nav>
                    <a href="#">Nosotros</a>
                    <a href="#">Contacto</a>
                    <a href="#">Condiciones</a>
                    <a href="#">Politica de Privacidad</a>
                </nav>
                <p>&copy; Ramses Barreto, Juan Yciarte 2025. Todos los derechos reservados</p>
            </div>
            <div class="img-container">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" width="24" height="24"
                        fill="currentColor">
                        <path
                            d="M13.0281 2.00073C14.1535 2.00259 14.7238 2.00855 15.2166 2.02322L15.4107 2.02956C15.6349 2.03753 15.8561 2.04753 16.1228 2.06003C17.1869 2.1092 17.9128 2.27753 18.5503 2.52503C19.2094 2.7792 19.7661 3.12253 20.3219 3.67837C20.8769 4.2342 21.2203 4.79253 21.4753 5.45003C21.7219 6.0867 21.8903 6.81337 21.9403 7.87753C21.9522 8.1442 21.9618 8.3654 21.9697 8.58964L21.976 8.78373C21.9906 9.27647 21.9973 9.84686 21.9994 10.9723L22.0002 11.7179C22.0003 11.809 22.0003 11.903 22.0003 12L22.0002 12.2821L21.9996 13.0278C21.9977 14.1532 21.9918 14.7236 21.9771 15.2163L21.9707 15.4104C21.9628 15.6347 21.9528 15.8559 21.9403 16.1225C21.8911 17.1867 21.7219 17.9125 21.4753 18.55C21.2211 19.2092 20.8769 19.7659 20.3219 20.3217C19.7661 20.8767 19.2069 21.22 18.5503 21.475C17.9128 21.7217 17.1869 21.89 16.1228 21.94C15.8561 21.9519 15.6349 21.9616 15.4107 21.9694L15.2166 21.9757C14.7238 21.9904 14.1535 21.997 13.0281 21.9992L12.2824 22C12.1913 22 12.0973 22 12.0003 22L11.7182 22L10.9725 21.9993C9.8471 21.9975 9.27672 21.9915 8.78397 21.9768L8.58989 21.9705C8.36564 21.9625 8.14444 21.9525 7.87778 21.94C6.81361 21.8909 6.08861 21.7217 5.45028 21.475C4.79194 21.2209 4.23444 20.8767 3.67861 20.3217C3.12278 19.7659 2.78028 19.2067 2.52528 18.55C2.27778 17.9125 2.11028 17.1867 2.06028 16.1225C2.0484 15.8559 2.03871 15.6347 2.03086 15.4104L2.02457 15.2163C2.00994 14.7236 2.00327 14.1532 2.00111 13.0278L2.00098 10.9723C2.00284 9.84686 2.00879 9.27647 2.02346 8.78373L2.02981 8.58964C2.03778 8.3654 2.04778 8.1442 2.06028 7.87753C2.10944 6.81253 2.27778 6.08753 2.52528 5.45003C2.77944 4.7917 3.12278 4.2342 3.67861 3.67837C4.23444 3.12253 4.79278 2.78003 5.45028 2.52503C6.08778 2.27753 6.81278 2.11003 7.87778 2.06003C8.14444 2.04816 8.36564 2.03847 8.58989 2.03062L8.78397 2.02433C9.27672 2.00969 9.8471 2.00302 10.9725 2.00086L13.0281 2.00073ZM12.0003 7.00003C9.23738 7.00003 7.00028 9.23956 7.00028 12C7.00028 14.7629 9.23981 17 12.0003 17C14.7632 17 17.0003 14.7605 17.0003 12C17.0003 9.23713 14.7607 7.00003 12.0003 7.00003ZM12.0003 9.00003C13.6572 9.00003 15.0003 10.3427 15.0003 12C15.0003 13.6569 13.6576 15 12.0003 15C10.3434 15 9.00028 13.6574 9.00028 12C9.00028 10.3431 10.3429 9.00003 12.0003 9.00003ZM17.2503 5.50003C16.561 5.50003 16.0003 6.05994 16.0003 6.74918C16.0003 7.43843 16.5602 7.9992 17.2503 7.9992C17.9395 7.9992 18.5003 7.4393 18.5003 6.74918C18.5003 6.05994 17.9386 5.49917 17.2503 5.50003Z">
                        </path>
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" width="24" height="24"
                        fill="currentColor">
                        <path
                            d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z">
                        </path>
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" width="24" height="24"
                        fill="currentColor">
                        <path
                            d="M17.6874 3.0625L12.6907 8.77425L8.37045 3.0625H2.11328L9.58961 12.8387L2.50378 20.9375H5.53795L11.0068 14.6886L15.7863 20.9375H21.8885L14.095 10.6342L20.7198 3.0625H17.6874ZM16.6232 19.1225L5.65436 4.78217H7.45745L18.3034 19.1225H16.6232Z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </footer>

     <script>
        // Animación de aparición al cargar la página
        window.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('caracteristicas').classList.add('visible');
            }, 150);
        });
    </script>

</body>

</html>