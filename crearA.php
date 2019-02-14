<?php
    //session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_r($_POST);
        //echo $_POST["nombre"];
        $nombre = test_input($_POST["nombre"]);
        $materia = test_input($_POST["materia"]);
        $taller = test_input($_POST["taller"]);
        $profesor = test_input($_POST["profesor"]);
        $curso = test_input($_POST["curso"]);
        $evaluacion = test_input($_POST["evaluacion"]);
        // $hoy = getdate();
        // $dia = $hoy["mday"];
        // $mes = $hoy["mon"];
        // $año = $hoy["year"];
        // $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        $consulta = "select * from asignaturas where materia=$materia and taller=$taller and profesor ='$profesor' and curso =$curso and evaluacion=$evaluacion";
        $resultado = mysqli_query($con, $consulta);
        $num_filas = mysqli_num_rows($resultado);
        if ($num_filas == 0) {
        $consulta = "insert into asignaturas (nombre, materia, profesor, taller, curso, evaluacion) values ('" .
                    "$nombre', $materia, '$profesor', $taller, $curso, $evaluacion)" ;
                    echo( $consulta);
        $resultado = mysqli_query($con, $consulta);
        // if ($resultado){
        echo json_encode(array("resultado"=>"Asignatura insertada"));
        } else {
            echo json_encode(array("resultado"=>"Asignatura existente"));
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