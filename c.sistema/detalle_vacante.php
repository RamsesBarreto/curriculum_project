<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/vacante.css">
    <link rel="stylesheet" href="../css/detalles.css">
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
               <div class="imagen-logo"></div>
                <p>TALENTHUNTER</p>
            </div>
            <nav>
                <a href="/login-registro/c.sistema/aspirante.php">Inicio</a>
                <a href="/login-registro/a.inicio/home.html">Vacantes</a>
                <a href="/login-registro/a.inicio/comunidad.html">Manual</a>
                <a href="/login-registro/a.inicio/comunidad.html">Empresas</a>
                 <a href="/login-registro/a.inicio/login_register.php">Perfil</a>
                <a href="/login-registro/php/cerrar_sesion.php">Cerrar Sesion</a>
            </nav>
        </div>
    </header>


    <?php
include('../php/conexion_be.php');
session_start();

// 1. Obtener el id de la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 2. Consultar la base de datos por ese id usando INNER JOIN con company
$query = "
SELECT jp.*, c.social_denomination AS company_name, c.industry AS company_industry, c.rif as company_rif,
c.contact_number as company_number, c.domicile as company_domicile, c.email as company_email
FROM job_publication AS jp
INNER JOIN company AS c ON jp.fk_company_id = c.id
WHERE jp.id = $id
";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);



if ($row) { ?>
    <div class="detalle-vacante">
        
        <div class="title-wrapper">
        <h1><?php echo $row['title']; ?></h1>
        <p><b><?php echo $row['subtitle'];?></b></p>
        </div>
        <h2>Datos de la empresa</h2>
        <div class="titulos-datos"></div>
        
        <div class="mid-wrapper">
            <div class="datos-empresa">
        <p><b>Nombre de la compañia: </b><?php echo $row['company_name'];?></p>
        <p><b>RIF: </b><?php echo $row['company_rif'];?></p>
        <p><b>Numero de Contacto: </b><?php echo $row['company_number'];?></p>
        </div>
            <div class="datos-empresa">
        <p><b>Industria Empresarial: </b><?php echo $row['company_industry'];?></p>
        <p><b>Email: </b><?php echo $row['company_email'];?></p>
        <p><b>Domicilio de la Empresa: </b><?php echo $row['company_domicile'];?></p>
        </div>
        </div>
        <h2>Datos del trabajo</h2>
        <div class="titulos-datos"></div>
        <div class="content-wrapper">
        <div class="datos-puesto">
        <p><b>Horario:</b> <?php echo $row['start_shift_hours']; ?> - <?php echo $row['end_shift_hours']; ?></p>
        <p><b>Salario:</b> <?php echo $row['job_salary']; ?></p>
        <p><b>Periodo de reclutamiento:</b> <?php echo $row['start_reclutement_period']; ?> a <?php echo $row['end_reclutement_period']; ?></p>
        </div>
        <div class="datos-puesto">
          <p><b>Cargo:</b> <?php echo $row['job_occupation']; ?></p>
        </div>
        </div>
        <div class="titulos-datos"></div>

        <p class="title_experiencia"><b>Experiencia requerida</b></p>
        <p class="experiencia"><?php echo $row['required_experience'];?></p>
    
    <form action="" method="POST" enctype="multipart/form-data" class="formulario-pdf">
    <div class="pdf-container">   
    <label for="pdf_file" class="custom-file-label" id="label-pdf">
    <span id="file-name">Subir CV (PDF)</span>
    <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" required>
    </label>
    </div>
    <div class="boton-container">
    <button type="submit" name="subir_pdf">Enviar</button>
    </div>
</form>

    <?php

// Suponiendo que tienes la sesión iniciada y el id del aspirante:

$applicant_id = $_SESSION['id_aspirante']; // O el nombre de tu variable de sesión
$job_application_id = $id; // El id de la vacante actual

if (isset($_POST['subir_pdf']) && isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['pdf_file']['tmp_name'];
    $fileType = mime_content_type($fileTmpPath);

    if ($fileType === 'application/pdf') {
        $uploadsDir = '../uploads/';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }
        $newFileName = uniqid('cv_', true) . '.pdf';
        $destPath = $uploadsDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $relativePath = 'uploads/' . $newFileName;
            // Guarda la relación en la tabla Application
            $insertQuery = "INSERT INTO application (fk_applicant_id, fk_job_publication_id, pdf_url) VALUES ('$applicant_id', '$job_application_id', '$relativePath')";
            if (mysqli_query($conexion, $insertQuery)) {
                echo "<p style='color:green;'>PDF subido correctamente.</p>";
            } else {
                echo "<p style='color:red;'>Error al guardar la ruta en la base de datos.</p>";
            }
        } else {
            echo "<p style='color:red;'>Error al mover el archivo.</p>";
        }
    } else {
        echo "<p style='color:red;'>Solo se permiten archivos PDF.</p>";
    }
}
mysqli_close($conexion);
?>

        <a href="vacantes.php">Volver a vacantes</a>
    </div>
<?php } else { ?>
    <p>Vacante no encontrada.</p>
<?php } 
?>

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

    <script>
    document.getElementById('pdf_file').addEventListener('change', function(e) {
    const fileName = e.target.files[0] ? e.target.files[0].name : 'Subir CV (PDF)';
    document.getElementById('file-name').textContent = fileName;
});
    </script>

</body>
</html>




