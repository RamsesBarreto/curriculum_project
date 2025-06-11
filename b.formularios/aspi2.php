<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experiencia Laboral - Registro de Aspirantes</title>
    <link rel="stylesheet" href="../css/login-register.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="icon" href="/icon/curriculum-vitae.png" type="image/x-icon">
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
                <div class="paso">
                    <span class="numero-paso">2</span>
                    <span class="etiqueta-paso">Formación Académica</span>
                </div>
                <div class="paso activo">
                    <span class="numero-paso">3</span>
                    <span class="etiqueta-paso">Experiencia Laboral</span>
                </div>
            </div>
        </div>
        <div class="cuerpo-registro">
            <form class="detalles-basicos" action="/login-registro/php/registro_usuario_be.php" method="POST">
            <div class="seccion-laboral">
                <h2>Experiencia Laboral</h2>
                <div class="entrada-laboral">
                    <div class="grupo-formulario en-linea">
                        <div class="subgrupo-formulario">
                            <label for="empresa">Empresa</label>
                            <input type="text" id="empresa" name="empresa" placeholder="Ejemplo: Tech Solutions S.A.">
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="puesto">Puesto</label>
                            <input type="text" id="puesto" name="puesto" placeholder="Ejemplo: Desarrollador Web">
                        </div>
                    </div>
                    <div class="grupo-formulario en-linea">
                        <div class="subgrupo-formulario">
                            <label for="fecha-inicio">Fecha de Inicio</label>
                            <input type="date" id="fecha-inicio" name="fecha_inicio">
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="fecha-fin">Fecha de Fin</label>
                            <input type="date" id="fecha-fin" name="fecha_fin">
                        </div>
                    </div>
                    <div class="grupo-formulario">
                        <label for="responsabilidades">Responsabilidades Principales</label>
                        <textarea id="responsabilidades" name="responsabilidades" placeholder="Describe brevemente tus funciones"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="pie-registro">
            <a href="/Login-Registro/b.formularios/aspi1.php" class="boton secundario grande"
                style="text-align:center;display:inline-block;margin-right:10px;">Volver</a>
                 <input name="aspirante2" class="boton primario grande" type="submit" value="Finalizar registro">
        </div>
        </form>
    </div>
    <!-- Ejemplo para aspi2.html -->

    <div id="alerta-campos" style="display:none;">
        <div class=" alerta-contenido">
             <span id="alerta-mensaje"></span>
    <button id="alerta-cerrar">&times;</button>
    </div>
        </div>
   
    <script src="../JS/validacion.js"></script>
</body>

</html>