<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empresa</title>
    <link rel="stylesheet" href="../css/login-register.css">
    <link rel="stylesheet" href="../css/formularios.css">
</head>


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
            <h1>Registro de Empresa</h1>
        </div>
        <div class="cuerpo-registro">
              <form class="detalles-basicos" action="../php/registro_usuario_be.php" method="POST">
            <div class="grupo-formulario">
                <label for="nombre-empresa">Denominacion social</label>
                <input type="text" name="name" id="nombre-empresa" placeholder="Ejemplo: Soluciones Luna S.A." >
            </div>
            <div class="grupo-formulario">
                <label for="rif">RIF</label>
                <input type="text" id="rif" name="rif" placeholder="Ejemplo: J123456789" minlength="10" maxlength="10" required">
            </div>

            <div class="grupo-formulario">
                        <label for="Correo">Contraseña</label>
                        <input type="password" id="contrasena-empresa" name="password" placeholder="Ingrese contraseña"
                minlength="8" required>
                </div>

            <div class="grupo-formulario">
                <label for="direccion-empresa">Dirección</label>
                <textarea name="address" id="direccion-empresa" placeholder="Dirección fiscal de la empresa"></textarea>
            </div>
            <div class="grupo-formulario">
                <label for="telefono-empresa">Numero de Contacto</label>
                <input type="tel" name="phone" id="telefono-empresa" placeholder="Ejemplo: 0212-1234567">
            </div>
            <div class="grupo-formulario">
                <label for="correo-empresa">Correo Electrónico</label>
                <input type="email" name="email" id="correo-empresa" placeholder="Ejemplo: contacto@empresa.com">
            </div>
            <div class="grupo-formulario">
                <label for="sector">Sector</label>
                <input type="text" name="industry" id="sector" placeholder="Ejemplo: Tecnología, Alimentos, etc.">
            </div>
            <div class="pie-registro">
                 <input name="empresa" class="boton primario grande" type="submit" value="Guardar y Continuar">
            </div>
            </form>
        </div>
        <script src="../JS/validacion.js"></script>
        <div id="alerta-campos" style="display:none;">>
            <div class=" alerta-contenido">
                <span id="alerta-mensaje"></span>
                <button id="alerta-cerrar">&times;</button>
            </div>
        </div>
        
  </div>

</body>

</html>