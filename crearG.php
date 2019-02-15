<?php
    //session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_r($_POST);
        //echo $_POST["nombre"];
        $taller = test_input($_POST["taller"]);
        $curso = test_input($_POST["curso"]);
        // $hoy = getdate();
        // $dia = $hoy["mday"];
        // $mes = $hoy["mon"];
        // $año = $hoy["year"];
        // $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        $consulta = "select * from grupos where taller=$taller and curso =$curso";
        // echo($consulta);
        $resultado = mysqli_query($con, $consulta);
        $num_filas = mysqli_num_rows($resultado);
        if ($num_filas == 0) {
        $consulta = "insert into grupos (curso, taller) values ('$curso', $taller)";
        $resultado = mysqli_query($con, $consulta);
        // if ($resultado){
        echo json_encode(array("resultado"=>"Grupo creado"));
        } else {
            echo json_encode(array("resultado"=>"Grupo existente"));
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