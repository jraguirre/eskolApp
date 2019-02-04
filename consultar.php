<?php
    //session_start();
    include('conexion.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = test_input($_POST["nombre"]);
        $apellido1 = test_input($_POST["apellido1"]);
        $apellido2 = test_input($_POST["apellido2"]);
        $dni = test_input($_POST["dni"]);
        $email = test_input($_POST["email"]);
        $tipo = test_input($_POST["tipo"]);
        $hoy = getdate();
        $dia = $hoy["mday"];
        $mes = $hoy["mon"];
        $año = $hoy["year"];
        $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        $consulta = "select * from usuarios where ";
        if ($nombre != "") {
            $consulta .= "nombre like '*". $nombre . "*' and ";
        }
        $consulta .= " dni = '" . $dni ."' and baja is null";
        //echo $consulta;
        $resultado = mysqli_query($con, $consulta);
        //echo $resultado;
        $num_filas = mysqli_num_rows($resultado);
        if ($num_filas != 0) {
            $fila= mysqli_fetch_array($resultado);
            extract($fila);
            //$resultado = '{"nombre" : "'. $nombre .'"}';
        // $consulta = "insert into usuarios (nombre, apellido1, apellido2, dni, email, tipo, alta) values ('" .
        //             $nombre . "', '" . $apellido1 . "', '" . $apellido2 . "', '" . $dni . "', '" . 
        //             $email . "', " . $tipo . ", '" . $fecha . "')" ;
        //             echo( $consulta);
        // $resultado = mysqli_query($con, $consulta);
        //echo json_encode(array($resultado));
        echo json_encode(array("nombre"=>$nombre, "apellido1"=>$apellido1,"apellido2"=>$apellido2,
                                "email"=>$email, "tipo"=>$tipo, "alta"=>$alta));
        } else {
            echo json_encode(array("resultado"=>"Usuario inexistente"));
        }
      }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>