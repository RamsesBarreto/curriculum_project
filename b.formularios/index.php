<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Aspirantes</title>
    <link rel="stylesheet" href="../css/login-register.css">
     <link rel="stylesheet" href="../css/formularios.css">
  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<!-- Este es el primer archivo html, la parte 1 del formulario de aspirantes, se nombran los campos y se separan por clases
en la parte final esta el script del js antes de cerrar el body-->

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

<body>
    <div class="contenedor-registro">
        <div class="encabezado-registro">
            <h1>Registro de Aspirantes</h1>
            <div class="pasos">
                <div class="paso activo">
                    <span class="numero-paso">1</span>
                    <span class="etiqueta-paso">Datos Personales</span>
                </div>
                <div class="paso">
                    <span class="numero-paso">2</span>
                    <span class="etiqueta-paso">Formación Académica</span>
                </div>
                <div class="paso">
                    <span class="numero-paso">3</span>
                    <span class="etiqueta-paso">Experiencia Laboral</span>
                </div>
            </div>
            <p class="ya-miembro">¿Ya tienes una cuenta? <a href="/login-registro/php/registro_usuario_be.php">Inicia Sesión</a></p>
        </div>
        <div class="cuerpo-registro">
            <form class="detalles-basicos" action="../php/registro_usuario_be.php" method="POST">
                <h2>Datos Personales</h2>
                <div class="grupo-formulario en-linea">
                    <div class="subgrupo-formulario">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" placeholder="Ingresa tu nombre" name="name" >
                    </div>
                    <div class="subgrupo-formulario">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" placeholder="Ingresa tu apellido" name="last_name">
                    </div>
                </div>
                <div class="grupo-formulario">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" placeholder="Ingresa tu correo electrónico" name="email"  required pattern=".+\.com$" maxlength="30">
                </div>
                 <div class="grupo-formulario">
                    <label for="correo">Edad</label>
                    <input type="text"  placeholder="Ingresa tu correo electrónico" name="age" >
                </div>
                <div class="grupo-formulario">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" placeholder="Ingresa tu número de teléfono" name="phone">
                </div>
                
                    <div class="grupo-formulario">
                        <label for="Correo">Contraseña</label>
                        <input type="password" id="contrasena" name="password" placeholder="Ingrese contraseña"
                minlength="8" required>
                </div>

                <div class="grupo-formulario en-linea">
                    <div class="subgrupo-formulario">
                        <label for="fecha-nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="dob" id="fecha-nacimiento">
                        <div class="grupo-formulario">
                            <label>Género</label>
                            <div class="grupo-radio">
                                <label class="radio-genero">
                                    <input type="radio" name="gender" value="femenino">
                                    <span class="custom-radio"></span>
                                    Femenino
                                </label>
                                <label class="radio-genero">
                                    <input type="radio" name="gender" value="masculino">
                                    <span class="custom-radio"></span>
                                    Masculino
                                </label>
                            </div>
                        </div>
                        <div class="grupo-formulario">
                            <label for="direccion">Dirección</label>
                            <textarea id="direccion" name="address" placeholder="Ingresa tu dirección"></textarea>
                        </div>
                    </div>
                    

                </div>
                <div class="pie-registro">
                         <input name="aspirante" class="boton primario grande" type="submit" value="Guardar y Continuar">
                </div>
            </form>

            <div id="alerta-campos" style="display:none;">
                <div class="alerta-contenido">
                    <span id="alerta-mensaje"></span>
                    <button id="alerta-cerrar">&times;</button>
                </div>
            </div>
            

    <script src="../JS/validacion.js"></script>


</body>

</html>