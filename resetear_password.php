<?php
session_start();
require("parametros.php");
$con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}
//echo ($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo ("entro");
    $selector=test_input($_POST["selector"]);
    $validator=test_input($_POST["validator"]);
    $password=test_input($_POST["password"]);
    // echo ($selector);
    $ahora = new DateTime('now');
    $ahora = $ahora->format('U');
    $consulta = "select * from password_reset where selector = '$selector' and expira >= $ahora"; 
    // echo ($consulta);
    // and expira >= $ahora";
    $resultado = mysqli_query($con, $consulta);
    $num_filas = mysqli_num_rows($resultado);
    // echo ($num_filas);
    if ($num_filas == 0) {
        echo ("Ha habido un error procesando su solicitud.");
    } else {
        $fila= mysqli_fetch_array($resultado);
        extract($fila);
        // $dni=$usuario;
        //echo($usuario);
        $calc = hash('sha256', hex2bin($validator));
        // echo($calc . "\n" . $token);
        if (hash_equals($calc, $token)) {
            $hashPassword = hash('sha256', $password);
            $consulta = "update usuarios set clave = '$hashPassword' where dni = '$dni'";
            echo($consulta);
            
            $resultado = mysqli_query($con, $consulta);
        }

        
    }

}
?>