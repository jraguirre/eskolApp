<?php
    //session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_r($_POST);
        //echo $_POST["nombre"];
        $nombre = test_input($_POST["nombre"]);
        $materia = test_input($_POST["materia"]);
        $profesor = test_input($_POST["profesor"]);
        $taller = test_input($_POST["taller"]);
        $curso = test_input($_POST["curso"]);
        $evaluacion = test_input($_POST["evaluacion"]);
        $hoy = getdate();
        $dia = $hoy["mday"];
        $mes = $hoy["mon"];
        $año = $hoy["year"];
        $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        //$consulta = "select dni from usuarios where dni = '" . $dni ."'";
        //$resultado = mysqli_query($con, $consulta);
        //$num_filas = mysqli_num_rows($resultado);
        //if ($num_filas == 0) {
        $consulta = "update asignaturas set nombre = '$nombre' where materia=$materia and profesor='$profesor' and taller=$taller and curso=$curso and evaluacion=$evaluacion";
                     echo( $consulta);
        $resultado = mysqli_query($con, $consulta);
        echo ($resultado);
        echo json_encode(array("resultado"=>"asignatura actualizada"));
        //} else {
        //    echo json_encode(array("resultado"=>"Usuario existente"));
            //$_POST["status"] = "Usuario existente";
            //print_r($_POST);
        //}
      }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>