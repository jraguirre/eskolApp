<?php
    session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $dni = test_input($_POST["dni"]);
        $_SESSION["dni"]=$dni;
        $password = test_input($_POST["password"]);
        $consulta = "select clave, tipo from usuarios where dni='". $dni . "' and baja is null";
        // echo($consulta);
        $resultado = mysqli_query($con, $consulta);
        $num_filas = mysqli_num_rows($resultado);
        // echo($num_filas);
        if($num_filas==1){
            $fila = mysqli_fetch_array($resultado);
            extract($fila);
            if(is_null ($clave)) {
                // echo("cambio_clave");
                header('Location: cambio_clave.php');
            } elseif ($clave==$password) {
                header('Location: menu.php');
            } else {
                //$mensaje = '<h2 style="color:blue;">Contraseña incorrecta. Inténtelo otra vez.</h2>';
                echo($mensaje);
                //header("refresh:2;url=index.php");
                 header('Location: index.php');
            }
        }
        }
    
    

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>