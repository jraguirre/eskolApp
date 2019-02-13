<?php
    //session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_r($_POST);
        //echo $_POST["nombre"];
        $nombre = test_input($_POST["nombre"]);
        // $hoy = getdate();
        // $dia = $hoy["mday"];
        // $mes = $hoy["mon"];
        // $año = $hoy["year"];
        // $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        $consulta = "select * from talleres where nombre='$nombre";
        $resultado = mysqli_query($con, $consulta);
        $num_filas = mysqli_num_rows($resultado);
        if ($num_filas == 0) {
        $consulta = "insert into talleres (nombre) values ('$nombre')";
                    //echo( $consulta);
        $resultado = mysqli_query($con, $consulta);
        // if ($resultado){
        echo json_encode(array("resultado"=>"Taller insertado"));
        } else {
            echo json_encode(array("resultado"=>"Taller existente"));
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