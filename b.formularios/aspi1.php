<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formación Académica - Registro de Aspirantes</title>
    <link rel="stylesheet" href="../css/login-register.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/aspi1.css">
</head>

<body>
    <div class="contenedor-registro">
        <div class="encabezado-registro">
            <h1>Registro de Aspirantes</h1>
            <div class="pasos">
                <div class="paso">
                    <span class="numero-paso">1</span>
                    <span class="etiqueta-paso">Datos Personales</span>
                </div>
                <div class="paso activo">
                    <span class="numero-paso">2</span>
                    <span class="etiqueta-paso">Formación Académica</span>
                </div>
                <div class="paso">
                    <span class="numero-paso">3</span>
                    <span class="etiqueta-paso">Experiencia Laboral</span>
                </div>
            </div>
        </div>
        <div class="cuerpo-registro">
     <form class="detalles-basicos" action="/login-registro/php/registro_usuario_be.php" method="POST">
            <div class="seccion-educacion">
                <h2>Formación Académica</h2>
                <div class="entrada-educacion">
                    <div class="grupo-formulario en-linea">
                        <div class="subgrupo-formulario">
                            <label for="titulo">Título Obtenido</label>
                            <input type="text" name="titulo" id="titulo" placeholder="Ejemplo: Licenciatura en Informática">
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="institucion">Institución</label>
                            <input type="text" name="institucion" id="institucion" placeholder="Ejemplo: Universidad Nacional">
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="año-graduacion">Año de Graduación</label>
                            <input type="date" name="graduacion" id="año-graduacion">
                        </div>
                    </div>
                </div>
            </div>
       
        <div class="pie-registro">
            <a href="/Login-Registro/b.formularios/index.php" class="boton secundario grande"
                style="text-align:center;display:inline-block;margin-right:10px;">Volver</a>
            <input name="aspirante1" class="boton primario grande" type="submit" value="Guardar y Continuar">
        </div>
</form>
         </div>

    </div>
    <div id="alerta-campos" style="display:none;">
        <div class="alerta-contenido">
            <span id="alerta-mensaje"></span>
            <button id="alerta-cerrar">&times;</button>
        </div>
    </div>
    <script src="../JS/validacion.js"></script>
</body>
</html>