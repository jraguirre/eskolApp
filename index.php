<?php session_start(); ?>
<!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="utf-8" />
    <!-- <title>eskolApp: Login</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
<?php
    //session_start();
    include('conexion.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
    $usuario = "";
    $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = test_input($_POST["usuario"]);
        $password = test_input($_POST["password"]);
        //$password = password_hash($password,PASSWORD_BCRYPT);
        // TO-DO validar usuario
        $consulta = "select clave, tipo from usuarios usuario where dni='". $usuario . "'";
        echo $consulta;
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
                echo ("Clave incorrecta");
            }
         } else {
                echo ("Usuario incorrecto");
            }
        }
      

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <h2>Iniciar sesión</h2>
    <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    DNI: <input type='text' name='usuario'/><br>
    Contraseña: <input type='password' name='password'/><br>
    <input type='submit' name='Entrar'/><br>
    <a href='cambio_clave.php'>He olvidado mi contraseña</a>
    </form>

<!-- <?php

echo "<h2>Your Input:</h2>";
echo $usuario;
echo "<br>";
echo $password;
?> -->

    </body>
    </html>
