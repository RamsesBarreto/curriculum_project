
<!-- Almacenar variables de los INPUTS DE METODO POST -->

<?php 

session_start();

 ////////////////////////////////////////// ASPIRANTE SUBIDA DE DATOS //////////////////////////////////////////////////////

if(isset($_POST['aspirante'])){
unset($_SESSION['datos_personales']); 
include('conexion_be.php');
$email = $_POST['email'];

$verificar_correo = mysqli_query($conexion, "SELECT * FROM applicant WHERE email = '$email'");

    if(mysqli_num_rows($verificar_correo) > 0) {
        echo "<script>alert('Este correo ya esta registrado, intenta con otro diferente');
            window.location = '../b.formularios/index.php';
            </script>";
            exit();
    }
    else{
        $ejecutar = true;
    }

 if($ejecutar) {

    echo "<script>alert('Datos personales llenados correctamente');
        window.location = '../b.formularios/aspi1.php';
    </script>";

      $_SESSION['datos_personales'] = [
        'name'      => ucwords(strtolower($_POST['name'])),
        'last_name' => ucwords(strtolower($_POST['last_name'])),
        'email'     => strtolower($_POST['email']),
        'password'  => $_POST['password'],
        'gender'    => ucwords($_POST['gender']),
        'birthday'  => date('Y-m-d', strtotime($_POST['dob'])),
        'address'   => ucwords($_POST['address']),
        'phone'     => $_POST['phone'],
        'age'       => $_POST['age']
      ];
 }

//  else {
//     echo "<script>alert('El Usuario no se ha podido registrar, intente de nuevo');
//         window.location.href = '../b.formularios/index.php';
//     </script>";
// }

mysqli_close($conexion);

}

/////////////////////////////////////////////// FORMACION ACADEMICA ///////////////////////////////////////////////////////////

if(isset($_POST['aspirante1'])){
unset($_SESSION['formacion_academica']);

$ejecutar = true;

 if($ejecutar) {
     $_SESSION['formacion_academica'] = [
        'titulo'      => ucwords($_POST['titulo']),
        'institucion' => ucwords($_POST['institucion']),
        'graduacion'=> date( 'Y-m-d', strtotime($_POST['graduacion'])),
        ];

        

    echo "<script>alert('Datos academicos llenados correctamente');
        window.location = '../b.formularios/aspi2.php';
    </script>";
 }
}

/////////////////////////////////////////////// EXPERIENCIA LABORAL ///////////////////////////////////////////////////////////

if(isset($_POST['aspirante2'])){

include('conexion_be.php');


    $_SESSION['experiencia_laboral'] = [
        'empresa'     => ucwords($_POST['empresa']),
        'puesto'       => ucwords($_POST['puesto']),
        'fecha_inicio'=> date( 'Y-m-d', strtotime($_POST['fecha_inicio'])),
        'fecha_fin'   => date( 'Y-m-d', strtotime($_POST['fecha_fin'])),
        'responsabilidades' => $_POST['responsabilidades']
    ];

    $datos = $_SESSION['datos_personales'];
    $query_applicant = "INSERT INTO applicant (name, lastname, email, gender, address, birthday_date, password, phone_number, age)
       
       
        VALUES (
            '{$datos['name']}',
            '{$datos['last_name']}',
            '{$datos['email']}',
            '{$datos['gender']}',
            '{$datos['address']}',
            '{$datos['birthday']}',
            '{$datos['password']}',
            '{$datos['phone']}',
            '{$datos['age']}'
        )";
    $ejecutar_applicant = mysqli_query($conexion, $query_applicant);

    if ($ejecutar_applicant) {
        // Obtener el ID del applicant recién insertado
        $applicant_id = mysqli_insert_id($conexion);

        // --- INSERTAR EN academic_education ---
        $formacion = $_SESSION['formacion_academica'];
        $query_academic = "INSERT INTO academic_education(id, career_degree, institution, graduation_year)
            VALUES (
                $applicant_id,
                '{$formacion['titulo']}',
                '{$formacion['institucion']}',
                '{$formacion['graduacion']}'
            )";

        mysqli_query($conexion, $query_academic);

        // --- INSERTAR EN job_experience ---
        $experiencia = $_SESSION['experiencia_laboral'];
        $query_experience = "INSERT INTO job_experience (id, company_name,job_charge,start_date,end_date, principal_functions)
            VALUES (
                 $applicant_id,
                '{$experiencia['empresa']}',
                '{$experiencia['puesto']}',
                '{$experiencia['fecha_inicio']}',
                '{$experiencia['fecha_fin']}',
                '{$experiencia['responsabilidades']}'
            )";


        mysqli_query($conexion, $query_experience);
       

        // Limpiar variables de sesión
        unset($_SESSION['datos_personales']);
        unset($_SESSION['formacion_academica']);
        unset($_SESSION['experiencia_laboral']);

        echo "<script>alert('Registro completo exitoso'); window.location = '../a.inicio/login_register.php';</script>";
        mysqli_close($conexion);
        exit();

    }

else {
        echo "<script>alert('Error al registrar los datos personales'); window.location = '../b.formularios/index.php';</script>";
        unset($_SESSION['datos_personales']);
        unset($_SESSION['formacion_academica']);
        unset($_SESSION['experiencia_laboral']);
        mysqli_close($conexion);
        exit();
    }

}

////////////////////////////////////////////////  EMPRESA SUBIDA DE DATOS //////////////////////////////////////////////////////////////



if(isset($_POST['empresa'])){

include('conexion_be.php');
$name = ucwords(strtolower($_POST['name']));
$email = strtolower($_POST['email']);
$password = $_POST['password'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$industry = $_POST['industry'];
$rif = ucwords(strtolower($_POST['rif']));


$query = "INSERT INTO company(social_denomination, email, rif, domicile, password, contact_number, industry) VALUES ('$name', '$email', '$rif', '$address', '$password', '$phone', '$industry')";


    $verificar_correo = mysqli_query($conexion, "SELECT * FROM company WHERE email = '$email' OR rif = '$rif' OR social_denomination = '$name'");

    if(mysqli_num_rows($verificar_correo) > 0) {
        echo "<script>alert('Uno de los datos ingresados esta ya registrado, intentelo nuevamente');
            window.location = '../b.formularios/formE.php';
            </script>";
            exit();
    }

 $ejecutar = mysqli_query($conexion, $query);

 if($ejecutar) {

    echo "<script>alert('Registro de Empresa exitoso');
        window.location = '../a.inicio/login_register.php';
    </script>";
 }


 else {
    echo "<script>alert('El Usuario no se ha podido registrar, intente de nuevo');
        window.location.href = '../b.formularios/formE.php';
    </script>";
}

mysqli_close($conexion);

} 

// $verificar_usuario = mysqli_query($conexion, "SELECT * FROM applicant WHERE name = '$name' AND last_name = '$last_name'");

    // if(mysqli_num_rows($verificar_usuario) > 0) {
    //     echo "<script>alert('Este usuario ya esta registrado, intenta con otro diferente');
    //         window.location = '../index.php';
    //         </script>";
    //         exit();
    // }


?>