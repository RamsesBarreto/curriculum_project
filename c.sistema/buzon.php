<?php
session_start();
include('../php/conexion_be.php');

// Suponiendo que el id de la empresa está en la sesión
$id_empresa = $_SESSION['id_empresa'];

// 1. Obtener los curriculums subidos a publicaciones de esta empresa
$query_cv = "
SELECT 
    a.id AS applicant_id, a.name AS applicant_name, a.lastname AS applicant_lastname, a.email AS applicant_email,
    ap.pdf_url,
    jp.id AS job_id, jp.title AS job_title, jp.job_occupation, jp.subtitle,
    c.social_denomination AS company_name
FROM application ap
INNER JOIN applicant a ON ap.fk_applicant_id = a.id
INNER JOIN job_publication jp ON ap.fk_job_publication_id = jp.id
INNER JOIN company c ON jp.fk_company_id = c.id
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buzón de Curriculums</title>
    <link rel="stylesheet" href="../css/buzon.css">
</head>
<body>
    <div class="buzon-container">
        <h1>Buzón de Curriculums</h1>

        <!-- Apartado de filtrado -->
        <div class="filtro-cv">
            <form method="GET" action="">
                <input type="text" name="buscar" placeholder="Buscar por nombre, email o puesto..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
                <button type="submit">Filtrar</button>
            </form>
        </div>

        <!-- Curriculums recibidos -->
        <div class="cv-lista">
            <h2>Curriculums recibidos</h2>
            <?php if (mysqli_num_rows($result_cv) > 0): ?>
                <?php while ($cv = mysqli_fetch_assoc($result_cv)): ?>
                    <div class="cv-card">
                        <div class="cv-datos">
                            <p><b>Nombre:</b> <?php echo $cv['applicant_name'] . ' ' . $cv['applicant_lastname']; ?></p>
                            <p><b>Email:</b> <?php echo $cv['applicant_email']; ?></p>
                            <p><b>Publicación:</b> <?php echo $cv['job_title']; ?> (<?php echo $cv['job_occupation']; ?>)</p>
                            <p><b>Empresa:</b> <?php echo $cv['company_name']; ?></p>
                            <p><b>Subtítulo:</b> <?php echo $cv['subtitle']; ?></p>
                        </div>
                        <div class="cv-archivo">
                            <a href="../<?php echo $cv['pdf_url']; ?>" target="_blank" class="btn-ver-cv">Ver CV PDF</a>
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
                    <div class="pub-card">
                        <p><b>Título:</b> <?php echo $pub['title']; ?></p>
                        <p><b>Puesto:</b> <?php echo $pub['job_occupation']; ?></p>
                        <p><b>Subtítulo:</b> <?php echo $pub['subtitle']; ?></p>
                        <p><b>Salario:</b> <?php echo $pub['job_salary']; ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No hay publicaciones activas.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>