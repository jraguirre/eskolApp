<?php
    session_start();
    include('conexion.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
    $usuario = "";
    $password = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = test_input($_POST["usuario"]);
        $password = test_input($_POST["password"]);
        //$password = password_hash($password,PASSWORD_BCRYPT);
        // TO-DO validar usuario
        $consulta = "select clave, tipo from usuarios usuario where dni='". $usuario . "' and baja not null";
        //echo $consulta;
        $resultado = mysqli_query($con, $consulta);
        $num_filas = mysqli_num_rows($resultado);
        if ($num_filas== 1) {
            $fila = mysqli_fetch_array($resultado);
            extract($fila);
            if ($password == $clave) {
                $tipo_usuario = $tipo;
                $_SESSION["usuario"]=$usuario;
                $_SESSION["tipo_usuario"]=$tipo_usuario;
                header('Location: menu.php');
            } else {
                if(is_null($clave)){
                    echo ("Aqui.");
                } else {
                echo ("Clave incorrecta");
                }
            }
        } else {
            echo ("Usuario incorrecto");
        }
        if (is_null($clave)) {
            echo("http://www.dendap.com/cambio_clave.php");
            header("Location: cambio_clave.php");
        }
    }
    
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>