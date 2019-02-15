<?php
    //session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_r($_POST);
        //echo $_POST["nombre"];
        $alumno = test_input($_POST["alumno"]);
        $grupo = test_input($_POST["grupo"]);
        $evaluacion = test_input($_POST["evaluacion"]);
        $nota = test_input($_POST["nota"]);
        // $hoy = getdate();
        // $dia = $hoy["mday"];
        // $mes = $hoy["mon"];
        // $año = $hoy["year"];
        // $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        $consulta = "select * from calificaciones where alumno='$alumno' and grupo=$grupo and evaluacion=$evaluacion";
        $resultado = mysqli_query($con, $consulta);
        $num_filas = mysqli_num_rows($resultado);
        if ($num_filas == 0) {
        $consulta = "insert into calificaciones (alumno, grupo, evaluacion, nota) values ('$alumno', $grupo, $evaluacion, $nota)";
                    // echo( $consulta);
        $resultado = mysqli_query($con, $consulta); 
        // if ($resultado){
        echo json_encode(array("resultado"=>"Nota insertada"));
        } else {
            $consulta = "update calificaciones set nota=$nota where alumno='$alumno' and grupo=$grupo and evaluacion=$evaluacion";
            // echo( $consulta);
            $resultado = mysqli_query($con, $consulta);
            echo json_encode(array("resultado"=>"Nota actualizada"));
            //$_POST["status"] = "Usuario existente"; 
            //print_r($_POST);
        }
      }
    


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>