<?php
    session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_r($_POST);
        //echo $_POST["nombre"];
        $curso = test_input($_POST["curso"]);
        $taller= test_input($_POST["taller"]);
        // $profesor = test_input($_POST["profesor"]);
        // $taller = test_input($_POST["taller"]);
        // $curso = test_input($_POST["curso"]);
        // $evaluacion = test_input($_POST["evaluacion"]);
        // $hoy = getdate();
        // $dia = $hoy["mday"];
        // $mes = $hoy["mon"];
        // $año = $hoy["year"];
        // $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        $consulta = "delete from grupos where curso=$curso and taller=$taller";
        //  echo $consulta;
        $resultado = mysqli_query($con, $consulta);
        // $num_filas = mysqli_num_rows($resultado);
        if ($resultado) {
            echo json_encode(array("resultado"=>"Grupo borrado"));
        } else {
            echo json_encode(array("resultado"=>"Grupo existente"));
        }
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
