<?php
    session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_r($_POST);
        //echo $_POST["nombre"];
        // $nombre = test_input($_POST["nombre"]);
        // $apellido1 = test_input($_POST["apellido1"]);
        // $apellido2 = test_input($_POST["apellido2"]);
        $dni = test_input($_POST["dni"]);
        // $email = test_input($_POST["email"]);
        // $tipo = test_input($_POST["tipo"]);
        $hoy = getdate();
        $dia = $hoy["mday"];
        $mes = $hoy["mon"];
        $año = $hoy["year"];
        $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        $consulta = "update usuarios set baja = '$fecha' where dni = '$dni'";
         echo $consulta;
        $resultado = mysqli_query($con, $consulta);
        // $num_filas = mysqli_num_rows($resultado);
        if ($resultado) {
            echo json_encode(array("resultado"=>"Usuario borrado"));
        } else {
            echo json_encode(array("resultado"=>"Usuario existente"));
        }
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
