<?php session_start(); ?>
<html lang=es>
<head>
    <meta charset="utf-8" />
    <title>eskolApp: Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
<?php
    //session_start();
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
    $usuario = "";
    $password = "";
    $clave = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = test_input($_POST["usuario"]);
        $password = test_input($_POST["password"]);
        //$password = password_hash($password,PASSWORD_BCRYPT);
        // TO-DO validar usuario
        $consulta = "select clave, tipo from usuarios usuario where dni='". $usuario . "'";
        //echo $consulta;
        $resultado = mysqli_query($con, $consulta);
        $num_filas = mysqli_num_rows($resultado);
        echo($clave);
        if ($num_filas == 1) {
            $fila = mysqli_fetch_array($resultado);
            extract($fila);
            if ($password == $clave) {
                $tipo_usuario = $tipo;
                $_SESSION["usuario"]=$usuario;
                $_SESSION["tipo_usuario"]=$tipo_usuario;
                header('Location: menu.php');
            } elseif (is_null($clave)) {
                //echo("http://www.dendap.com/cambio_clave.php");
                header("Location: cambio_clave.php");
            } else {
                echo ("Usuario incorrecto");
                header("Locacation: index.php");
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
    <div id=formulario>
    <h2>Iniciar sesión</h2>
    <!-- <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> -->
    <form method='post' action='login.php'>
    <label for="usuario"><b>DNI</b></label> 
    <input type='text' placeholder="Introduzca su DNI" name='usuario' required><br>
    <label for="password"><b>Contraseña</b> 
    <input type='password' placeholder="Introduzca su contraseña" name='password'><br>
    <button type='submit'>Entrar</button><br>
    <a href='cambio_clave.php'>He olvidado mi contraseña</a>
    </form>
</div>
    </body>
    </html>
