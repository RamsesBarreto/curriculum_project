<!DOCTYPE html>
<html lang="es" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto lenguaje 2</title>
    <link rel="stylesheet" href="../css/login-estructura.css">
    <link rel="stylesheet" href="../css/login-register.css">
</head>

<body>
    <section id="hero">

          <header>
        <div class="container">
            <div class="logo">
                <img src="../img/logito.png" alt="">
                <p>TALENTHUNTER</p>
            </div>
            <nav>
                <a href="/login-registro/a.inicio/home.html">Quienes Somos</a>
                <a href="/login-registro/a.inicio/comunidad.html">Comunidad</a>
                <a href="/login-registro/a.inicio/login_register.php">Iniciar Sesion</a>
            </nav>
        </div>
    </header>

        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3 class="mayus">¿Ya posees una cuenta?</h3>
                        <p class="colore_l">Inicia sesión para ingresar</p>
                        <button id="btn__iniciar-sesion"> Iniciar sesión </button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3 class="mayus">¿Aún no tienes una cuenta?</h3>
                        <p class="colore_l">Regístrate para ingresar</p>
                        <button id="btn__registrarse"> Registrarse</button>
                    </div>
                </div>

                <!-- LOGIN -->

                <div class="contenedor__login-register">
                    <form action="../php/login_usuario_be.php" method="POST" class="formulario__login">
                        <h2>Iniciar sesión</h2>
                        <input type="email" maxlength="35" placeholder="Correo electrónico (Gmail)" name="correo"
                            required pattern=".+\.com$" maxlength="30"
                            title="El correo debe ser válido y pertenecer a dominios como gmail.com, hotmail.com, outlook.com."
                        >
                        <!-- Campo de contraseña en el formulario de inicio de sesion :3 -->
                        <input type="password" minlength="8" maxlength="35" placeholder="Contraseña" name="contrasena"
                            required title="La contraseña debe tener al menos 8 caracteres.">
                        <center><button class="ingresar">Ingresar</button></center>
                    </form>

                    <br><br>

                    <!-- // REGISTRO DE DATOS -->

                    <form action="register_aspirante_bd.php" method="POST" enctype="multipart/form-data"
                        class="formulario__register">
                        <h2 class="h2_R">Registrarse</h2>

                        <!-- CARTA ASPIRANTE -->
                        <div class="carta-container">
                                <a class="aspirante-carta" href="/Login-Registro/b.formularios/index.php">
                                <div class="content-container">

                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z">
                                        </path>
                                    </svg>
                                    <h3>Aspirante</h3>
                                </div>


                                <!-- CARTA EMPRESA -->
                            </a>
                            <a class="empresa-carta" href="/Login-Registro/b.formularios/formE.php">
                                <div class="content-container">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M12 19H14V6.00003L20.3939 8.74028C20.7616 8.89786 21 9.2594 21 9.65943V19H23V21H1V19H3V5.6499C3 5.25472 3.23273 4.89659 3.59386 4.73609L11.2969 1.31251C11.5493 1.20035 11.8448 1.314 11.9569 1.56634C11.9853 1.63027 12 1.69945 12 1.76941V19Z">
                                        </path>
                                    </svg>
                                    <h3>Empresa</h3>
                                </div>
                            </a>
                        </div>
                    </form>
                    <!-- FIN SECTION -->
                </div>
            </div>
        </main>

    </section>
    <section id="adicional">
        <div class="container">
    </section>
    <section id="formulario"></section>
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
                <p>&copy; Ramses Barreto 2025. Todos los derechos reservados</p>
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


    <div id="alert-container"></div>
    <script src="../JS/login-register.js"></script>

    

</body>

</html>