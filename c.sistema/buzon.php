<?php
session_start();
include('../php/conexion_be.php');

// Suponiendo que el id de la empresa está en la sesión
$id_empresa = $_SESSION['id_empresa'];

// 1. Obtener los curriculums subidos a publicaciones de esta empresa
$query_cv = "
SELECT 
    a.id AS applicant_id, a.name AS applicant_name, a.lastname AS applicant_lastname, a.email AS applicant_email,
    ap.pdf_url, ap.id AS application_id,
    jp.id AS job_id, jp.title AS job_title, jp.job_occupation, jp.subtitle,
    c.social_denomination AS company_name
FROM application AS ap
INNER JOIN applicant AS a ON ap.fk_applicant_id = a.id
INNER JOIN job_publication AS jp ON ap.fk_job_publication_id = jp.id
INNER JOIN company AS c ON jp.fk_company_id = c.id
WHERE c.id = $id_empresa
";

// Filtrado de curriculums por nombre, email, o puesto
$filter = "";
if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
    $buscar = mysqli_real_escape_string($conexion, $_GET['buscar']);
    $filter = " AND (
        a.name LIKE '%$buscar%' OR
        a.lastname LIKE '%$buscar%' OR
        a.email LIKE '%$buscar%' OR
        jp.title LIKE '%$buscar%' OR
        jp.job_occupation LIKE '%$buscar%'
    )";
}
$result_cv = mysqli_query($conexion, $query_cv . $filter);

// 2. Obtener publicaciones activas de la empresa
$query_pub = "SELECT * FROM job_publication WHERE fk_company_id = $id_empresa";
$result_pub = mysqli_query($conexion, $query_pub);
?>

<!-- /////////////////////////////////////////////// QUERY ELIMINAR CURRICULUM /////////////////////////////////////// -->

<?php
if (isset($_GET['eliminar_cv'])) {
    $cv_id = intval($_GET['eliminar_cv']);
    // Obtener la ruta del PDF antes de eliminar
    $res = mysqli_query($conexion, "SELECT pdf_url FROM application WHERE id = $cv_id");
    $row = mysqli_fetch_assoc($res);
    if ($row && file_exists("../" . $row['pdf_url'])) {
        unlink("../" . $row['pdf_url']); // Elimina el archivo físico
    }
    // Elimina el registro de la base de datos
    mysqli_query($conexion, "DELETE FROM application WHERE id = $cv_id");
    header("Location: buzon.php");
    exit();
}
?>

<!-- /////////////////////////////////////////////// QUERY ELIMINAR PUBLICACION /////////////////////////////////////// -->

<?php
if (isset($_GET['eliminar_publicacion'])) {
    $pub_id = intval($_GET['eliminar_publicacion']);
    mysqli_query($conexion, "DELETE FROM job_publication WHERE id = $pub_id");
    header("Location: buzon.php");
    exit();
}
?>
<!-- /////////////////////////////////////////////// HTML /////////////////////////////////////// -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buzón de Curriculums</title>
    <link rel="stylesheet" href="../css/vacante.css">
    <link rel="stylesheet" href="../css/buzon.css">
</head>
<body>

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

    <div class="buzon-container">
        
        <div class="filtro-container">
            <div class="titulo-container">
        <h1>Buzón de Curriculums</h1>
        </div>
        <!-- Apartado de filtrado -->
        <div class="filtro-cv">
            <form method="GET" action="">
                <input type="text" name="buscar" placeholder="Buscar por nombre, email o puesto..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
                <button type="submit">Filtrar</button>
            </form>
        </div>
        </div>

        <!-- Curriculums recibidos -->
        <h2>Curriculums recibidos</h2>
        <div class="cv-lista">
            <?php if (mysqli_num_rows($result_cv) > 0): ?>
                <?php while ($cv = mysqli_fetch_assoc($result_cv)): ?>
                    <div class="cv-card">
                        <div class="cv-datos">
                            <p><b>Nombre:</b> <?php echo $cv['applicant_name'] . ' ' . $cv['applicant_lastname']; ?></p>
                            <p><b>Email:</b> <?php echo $cv['applicant_email']; ?></p>
                            <p><b>Publicación:</b> <?php echo $cv['job_title']; ?></p>
                            <p><b>Cargo:</b> <?php echo $cv['job_occupation']; ?></p>
                            <p><b>Subtítulo:</b> <?php echo $cv['subtitle']; ?></p>
                        </div>
                        <div class="cv-archivo curriculum">
                            <a href="../<?php echo $cv['pdf_url']; ?>" target="_blank" class="btn-ver-cv">Ver CV</a>
                             <a class="btn-ver-cv" href="buzon.php?eliminar_cv=<?php echo $cv['application_id'];?>" onclick="return confirm('¿Seguro que deseas eliminar este CV?');">Eliminar</a>
                             <a class="btn-ver-cv" href="buzon.php?contactar_cv=<?php echo $cv['application_id']; ?>">Contactar</href=>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No hay curriculums para mostrar.</p>
            <?php endif; ?>
        </div>

        <!-- Publicaciones activas -->
        <div class="publicaciones-activas">
            <h2>Publicaciones activas de la empresa</h2>
            <?php if (mysqli_num_rows($result_pub) > 0): ?>
                <?php while ($pub = mysqli_fetch_assoc($result_pub)): ?>
                    <div class="container-card">
                    <div class="pub-card publicaciones">
                        <p><b>Título:</b> <?php echo $pub['title']; ?></p>
                        <p><b>Puesto:</b> <?php echo $pub['job_occupation']; ?></p>
                        <p><b>Salario:</b> <?php echo $pub['job_salary']; ?></p>
                    </div>
                     <div class="cv-archivo publicaciones">
                            <a id="leer" href="buzon.php?leer_publicacion=<?php echo $pub['id'];?>" class="btn-ver-cv">Leer</a>
                            <a href="buzon.php?modificar_publicacion=<?php echo $pub['id'];?>" class="btn-ver-cv">Modificar</a>
                            <a class="btn-ver-cv" href="buzon.php?eliminar_publicacion=<?php echo $pub['id'];?>" onclick="return confirm('¿Seguro que deseas eliminar esta Publicacion?');">Eliminar</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No hay publicaciones activas.</p>
            <?php endif; ?>
        </div>
    </div>

<!-- /////////////////////////////////////////////// LLAMADO A DIALOG MODIFICACION /////////////////////////////////////// -->

<?php
if (isset($_GET['modificar_publicacion'])) {
    $pub_id = intval($_GET['modificar_publicacion']);
    echo '<script>
    window.addEventListener("DOMContentLoaded", function() {
        showLoginDialog();
    });// Se ejecuta automáticamente si la condición PHP se cumple
</script>';
}
?>

<!-- /////////////////////////////////////////////// DIALOGO DE MODIFICACION /////////////////////////////////////// -->

    <dialog id="login_dialog">
        <h2>Publicacion de Empleo</h2>
        <form action="" method="POST">
                             <label for="titulo">Titulo</label>
                            <input type="text" id="titulo" name="titulo" 
                                required>
                            <label for="salario">Subtitulo</label>
                            <input type="text" id="subtitulo" name="subtitulo" 
                                required>
                            <label for="ocupacion">Ocupación del puesto / Cargo</label>
                            <input type="text" id="ocupacion" name="ocupacion" placeholder="Ejemplo: Analista de Datos"
                                required>
                            <label for="salario">Salario del puesto</label>
                            <input type="number" id="salario" name="salario" placeholder="Ejemplo: 15000" min="0"
                                required>
                            <label for="hora-inicio">Hora de inicio del turno</label>
                            <input type="time" id="hora-inicio" name="hora-inicio" required>
                            <label for="hora-fin">Hora de fin del turno</label>
                            <input type="time" id="hora-fin" name="hora-fin" required>
                            <label for="fecha-inicio">Fecha de inicio del período de reclutamiento</label>
                            <input type="date" id="fecha-inicio" name="fecha-inicio" required>
                            <label for="fecha-fin">Fecha de fin del período de reclutamiento</label>
                            <input type="date" id="fecha-fin" name="fecha-fin" required>
                            <label for="experiencia">Experiencia Requerida</label>
                            <textarea id="experiencia" name="experiencia" placeholder="Describe la experiencia requerida"
                            required></textarea>
                <input type="submit" name="modificacion" value="Enviar" >
            </form>
            <button onclick="dialog.close()">Cancelar</button>
    </dialog>

<!-- /////////////////////////////////////////////// QUERY MODIFICAR PUBLICACION /////////////////////////////////////// -->

<?php
if (isset($_POST['modificacion'])) {
    $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
    $subtitulo = mysqli_real_escape_string($conexion, $_POST['subtitulo']);
    $ocupacion = $_POST['ocupacion'];
    $salario = $_POST['salario'];
    $hora_inicio = $_POST['hora-inicio'];
    $hora_fin = $_POST['hora-fin'];
    $fecha_inicio = date( 'Y-m-d', strtotime($_POST['fecha-inicio']));
    $fecha_fin = date( 'Y-m-d', strtotime($_POST['fecha-fin']));
    $experiencia = $_POST['experiencia'];


    // Agrega aquí los demás campos si los usas
    $update = "UPDATE job_publication SET title='$titulo', subtitle='$subtitulo', job_occupation='$ocupacion', 
    job_salary = '$salario', start_shift_hours = '$hora_inicio', end_shift_hours = '$hora_fin', start_reclutement_period ='$fecha_inicio', end_reclutement_period ='$fecha_fin', required_experience='$experiencia' WHERE id=$pub_id";
    mysqli_query($conexion, $update);
    echo '<meta http-equiv="refresh" content="0;url=buzon.php">';
    exit();
}
?>

<!-- /////////////////////////////////////////////// QUERY MOSTRAR PUBLICACION /////////////////////////////////////// -->


<?php
if (isset($_GET['leer_publicacion'])) {
    $pub_id = intval($_GET['leer_publicacion']);
    $pub_query = mysqli_query($conexion, "SELECT * FROM job_publication WHERE id = $pub_id");
    $pub_data = mysqli_fetch_assoc($pub_query);
    echo '<script>
    window.addEventListener("DOMContentLoaded", function() {
        showDataDialog();
    });// Se ejecuta automáticamente si la condición PHP se cumple
</script>';
}
?>

<!-- /////////////////////////////////////////////// MOSTRAR PUBLICACION /////////////////////////////////////// -->


<dialog id="data_dialog">
        <h2>Publicacion de Empleo</h2>
        <p><b>Titulo:</b><?php echo $pub_data['title'] ?></p>
        <p><b>Subtitulo:</b><?php echo $pub_data['subtitle'] ?></p>
        <p><b>Ocupación:</b><?php echo $pub_data['job_occupation'] ?></p>
        <p><b>Inicio del turno:</b><?php echo $pub_data['start_shift_hours'] ?></p>
        <p><b>Fin del turno:</b><?php echo $pub_data['end_shift_hours'] ?></p>
        <p><b>Salario:</b><?php echo $pub_data['job_salary'] ?></p>
        <p><b>Inicio del Reclutamiento:</b><?php echo $pub_data['start_reclutement_period'] ?></p>
        <p><b>Fin del reclutamieto:</b><?php echo $pub_data['end_reclutement_period'] ?></p>
        <p><b>Experiencia requerida:</b><?php echo $pub_data['required_experience'] ?></p>
        <button onclick="data.close()">Cancelar</button>
</dialog>

<!-- /////////////////////////////////////////////// QUERY MOSTRAR PUBLICACION /////////////////////////////////////// -->

<?php
if (isset($_GET['contactar_cv'])) {
    $application_id = intval($_GET['contactar_cv']);
    // Obtén los datos del aspirante y la publicación
    $query = "
        SELECT a.email AS applicant_email, a.name AS applicant_name, a.lastname AS applicant_lastname, 
               jp.title AS job_title
        FROM application AS ap
        INNER JOIN applicant AS a ON ap.fk_applicant_id = a.id
        INNER JOIN job_publication AS jp ON ap.fk_job_publication_id = jp.id
        WHERE ap.id = $application_id
        LIMIT 1
    ";
    $result = mysqli_query($conexion, $query);
    $contact_data = mysqli_fetch_assoc($result);

    echo '<script>
    window.addEventListener("DOMContentLoaded", function() {
        showDataDialog();
    });// Se ejecuta automáticamente si la condición PHP se cumple
</script>';

}
?>

<!-- /////////////////////////////////////////////// DIALOGO DE CONTACTO /////////////////////////////////////// -->

<dialog id="contacto_dialog">
         <div class="contactar-form">
        <h2>Contactar a <?php echo $contact_data['applicant_name'] . ' ' . $contact_data['applicant_lastname']; ?></h2>
        <form method="POST" action="">
            <input type="hidden" name="to_email" value="<?php echo $contact_data['applicant_email']; ?>">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject" required>
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message" rows="6" required></textarea>
            <input type="submit" name="enviar_correo" value="Enviar correo">
        </form>
        </div>
        <button onclick="data.close()">Cancelar</button>
</dialog>


<!-- /////////////////////////////////////////////// FOOTER /////////////////////////////////////// -->

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

<!-- /////////////////////////////////////////////// FUNCIONES MOSTRADO DE DIALOG /////////////////////////////////////// -->

<script>
        const dialog = document.getElementById("login_dialog")
        function showLoginDialog() {
            console.log('entra');
            dialog.showModal()
            
        }
        function closeLoginDialog() {
            dialog.close()
        }

        const data = document.getElementById("data_dialog")
        function showDataDialog() {
            data.showModal()
        }
        function closeDataDialog() {
            data.close()
        }
    </script>


</body>
</html>
