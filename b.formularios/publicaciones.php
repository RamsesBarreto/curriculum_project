<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones - Registro de Vacantes</title>
    <link rel="stylesheet" href="../css/publicaciones.css">
    <link rel="icon" href="/icon/curriculum-vitae.png" type="image/x-icon">
</head>

<body>
    <div class="contenedor-registro">
        <div class="encabezado-registro">
            <h1>Registro de Vacantes</h1>
        </div>
        <div class="cuerpo-registro">
            <div class="seccion-publicacion">
                <h2>Publicaciones</h2>
                <form id="form-publicacion" action="/login-registro/php/publicar.php" method="POST" autocomplete="off"> 

                <div class="grupo-formulario en-linea">
                        <div class="subgrupo-formulario">
                            <label for="ocupacion">Titulo de la publicacion</label>
                            <input type="text" id="titulo" name="titulo" placeholder="Atrae aspirantes con un titulo atractivo"
                                required>
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="salario">Subtitulo de la publicacion</label>
                            <input type="text" id="subtitulo" name="subtitulo" placeholder="Detalla brevemente la vacante ofertada"
                                required>
                        </div>
                    </div>


                    <div class="grupo-formulario en-linea">
                        <div class="subgrupo-formulario">
                            <label for="ocupacion">Ocupación del puesto / Cargo</label>
                            <input type="text" id="ocupacion" name="ocupacion" placeholder="Ejemplo: Analista de Datos"
                                required>
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="salario">Salario del puesto</label>
                            <input type="number" id="salario" name="salario" placeholder="Ejemplo: 15000" min="0"
                                required>
                        </div>
                    </div>
                    <div class="grupo-formulario en-linea">
                        <div class="subgrupo-formulario">
                            <label for="hora-inicio">Hora de inicio del turno</label>
                            <input type="time" id="hora-inicio" name="hora-inicio" required>
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="hora-fin">Hora de fin del turno</label>
                            <input type="time" id="hora-fin" name="hora-fin" required>
                        </div>
                    </div>
                    <div class="grupo-formulario en-linea">
                        <div class="subgrupo-formulario">
                            <label for="fecha-inicio">Fecha de inicio del período de reclutamiento</label>
                            <input type="date" id="fecha-inicio" name="fecha-inicio" required>
                        </div>
                        <div class="subgrupo-formulario">
                            <label for="fecha-fin">Fecha de fin del período de reclutamiento</label>
                            <input type="date" id="fecha-fin" name="fecha-fin" required>
                        </div>
                    </div>
                    <div class="grupo-formulario">
                        <label for="experiencia">Experiencia Requerida</label>
                        <textarea id="experiencia" name="experiencia" placeholder="Describe la experiencia requerida"
                            required></textarea>
                    </div>
                    <div style="text-align:center;margin-top:20px;">
                        <button name='publicar' type="submit" class="boton primario grande">Publicar Vacante</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="pie-registro">
            <a href="/Login-Registro/c.sistema/empresa.php" class="boton secundario grande"
                style="text-align:center;display:inline-block;margin-right:10px;">Volver</a>
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