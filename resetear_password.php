<?php
require("parametros.php");
$con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selector=test_input($_POST["selector"]);
    $ahora = new DateTime('now');
    $consulta = "select * from password_reset where selector ='$selector' and expira >= $ahora";
    $resultado = mysqli_query($con, $consulta);
    $num_filas = mysqli_num_rows($resultado);
    if ($num_filas == 0) {
        echo "Ha habido un error procesando su solicitud.";
    }
}
?>