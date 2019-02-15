<?php
    //session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curso = test_input($_POST["curso"]);
        $taller= test_input($_POST["taller"]);
        $hoy = getdate();
        $dia = $hoy["mday"]; 
        $mes = $hoy["mon"];
        $año = $hoy["year"];
        $fecha = $año . '-' . $mes . '-' . $dia;
        //$password = test_input($_POST["password"]);
        //$consulta = "select id from grupos where taller=$taller";
        //echo $consulta;
        $resultado = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_assoc($resultado);
        extract($fila);

        $consulta = "select * from grupos";
        // echo($consulta);
        // $inserta_and = false;
        // $todos = true;
        // if ($nombre != "") {
        //     $consulta .= "nombre like '%". $nombre . "%' ";
        //     $inserta_and = true;
        //     $todos = false;
        // }
        // if ($apellido1 != "") {
        //     if ($inserta_and) {$consulta .= " and ";}
        //     $consulta .= "apellido1 like '%". $apellido1 . "%' ";
        //     $inserta_and = true;
        //     $todos = false;
        // }
        // if ($apellido2 != "") {
        //     if ($inserta_and) {$consulta .= " and ";}
        //     $consulta .= "apellido2 like '%". $apellido2 . "%' ";
        //     $inserta_and = true;
        //     $todos = false;
        // }
        // if ($dni != "") {
        //     if ($inserta_and) {$consulta .= " and ";}
        //     $consulta .= "dni like '%". $dni . "%' ";
        //     $inserta_and = true;
        //     $todos = false;
        // }
        // if ($email != "") {
        //     if ($inserta_and) {$consulta .= " and ";}
        //     $consulta .= "email like '%". $email . "%' ";
        //     $inserta_and = true;
        //     $todos = false;
        // }

        // $consulta .= " and baja is null";
        // // echo $consulta;
        // if ($todos) {
        //     $consulta = "select nombre, apellido1, apellido2, dni, email, tipo, alta from usuarios where baja is null";
        // }
        $resultado = mysqli_query($con, $consulta);

        $json_array = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $json_array[] = $fila;
        }
        echo json_encode($json_array); 




        //echo $resultado;
        // $num_filas = mysqli_num_rows($resultado);
        // if ($num_filas != 0) {
        //     $fila= mysqli_fetch_array($resultado);
        //     extract($fila);
            //$resultado = '{"nombre" : "'. $nombre .'"}';
        // $consulta = "insert into usuarios (nombre, apellido1, apellido2, dni, email, tipo, alta) values ('" .
        //             $nombre . "', '" . $apellido1 . "', '" . $apellido2 . "', '" . $dni . "', '" . 
        //             $email . "', " . $tipo . ", '" . $fecha . "')" ;
        //             echo( $consulta);
        // $resultado = mysqli_query($con, $consulta);
        //echo json_encode(array($resultado));
        // echo json_encode(array("nombre"=>$nombre, "apellido1"=>$apellido1,"apellido2"=>$apellido2, "dni"=>$dni,
        //                         "email"=>$email, "tipo"=>$tipo, "alta"=>$alta));
        // } else {
        //     echo json_encode(array("resultado"=>"Usuario inexistente"));
        // }
      }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>