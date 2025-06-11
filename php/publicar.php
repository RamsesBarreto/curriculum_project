<?php
session_start();
include('conexion_be.php');
if(isset($_POST['publicar'])) {
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$ocupacion = $_POST['ocupacion'];
$salario = $_POST['salario'];
$hora_inicio = $_POST['hora-inicio'];
$hora_fin = $_POST['hora-fin'];
$fecha_inicio = date( 'Y-m-d', strtotime($_POST['fecha-inicio']));
$fecha_fin = date( 'Y-m-d', strtotime($_POST['fecha-fin']));
$experiencia = $_POST['experiencia'];
$id_empresa = $_SESSION['id_empresa'];


$query = "INSERT INTO job_publication(job_occupation, title, subtitle, start_shift_hours, end_shift_hours,	job_salary,	start_reclutement_period, end_reclutement_period, required_experience, fk_company_id) 
VALUES ('$ocupacion', '$titulo', '$subtitulo', '$hora_inicio', '$hora_fin', '$salario', '$fecha_inicio', '$fecha_fin', '$experiencia', '$id_empresa')";

 $ejecutar = mysqli_query($conexion, $query);

 if($ejecutar) {

    echo "<script>alert('Vacante de empleo publicada con exito');
        window.location = '../c.sistema/empresa.php';
    </script>";
 }


 else {
    echo "<script>alert('La vacante no se ha podido registrar, intente de nuevo');
        window.location.href = '../b.formularios/publicaciones.php';
    </script>";
}

mysqli_close($conexion);

}

?>