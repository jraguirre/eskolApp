    <?php
    session_start();
    $dni = $_SESSION["dni"];
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    include('parametros.php');
    $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //echo("<" . $dni . ">");
        $email = test_input($_POST["email"]); 
        // Crear token
        $selector = bin2hex(random_bytes(8)); 
        $token = random_bytes(32);
        
        $url = sprintf('%sreset_password.php?%s', $raiz, http_build_query([
            'selector' => $selector,
            'validator' => bin2hex($token)
            ]));
            // echo($url);
            // Expiración de token
            $expira = new DateTime('now');
            $expira->add(new DateInterval('PT01H'));
            $fin = $expira->format('U');
            
            $consulta = "delete from password_reset where email='" . $email . "'";
            $resultado = mysqli_query($con, $consulta);
            //mysqli_close($con);
            // $num_filas = mysqli_num_rows($resultado);
            //echo($email."\n");
            // echo($selector."\n");
            // echo($token."\n");
            //echo($fin);
            //echo ($dni);
            $consulta = "insert into password_reset (dni, email, selector, token, expira) values ('" .
            $dni . "', '" . $email . "', '" .  $selector . "', '" .  hash('sha256', $token) . "', " .  $fin . ")";
            //echo($consulta);
            // if($resultado){
                //     echo($consulta);
                // } else {
                    //     echo("kk");
                    // }
                    $resultado = mysqli_query($con, $consulta);
                    
                    $asunto = "eskolApp: Cambio de contraseña.";
                    $mensaje = "<p>Hemos recibido una petición de restablecimiento de contraseña. El enlace para restablecerla está más abajo.";
                    $mensaje .= "Si no realizó esta petición, por favor, ignore este mensaje</p>";
                    $mensaje .= "<p>Para restablecer su contraseña, siga el siguiente ";
                    $mensaje .= "<a href=".$url.">enlace</a></p>";
                    $mensaje .= "<p>Este enlace sólo es válido durante una hora.<p>";
                    $mensaje .= "<p>Gracias</p><p>eskolApp</p>";
                    
                    $cabeceras = "From: Juan Ramón Aguirre <8513634@us-imm-node4c.000webhost.io>\r\n";
                    $cabeceras .= "Reply-to: 8513634@us-imm-node4c.000webhost.io\r\n";
                    $cabeceras .= "Content-type: text/html\r\n";
                    //echo($cabeceras);
                    
                    mail ($email, $asunto, $mensaje, $cabeceras);
                    //echo ('header("refresh:2;url=index.php")');
                    header('Location: index.php');
                    //echo ('header("refresh:2;url=index.php")');
                }
 
                ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    
</html>
    <div id=formulario>    
    <h2>Creación de contraseña</h2>
    <p>Su cuenta aún no tiene una contraseña. Por favor, introduzca su dirección de correo. Le enviaremos un mensaje a partir del cual puede crear su contraseña.</p>
    <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    <label for="email"><b>Dirección de correo</b>
    <input type='text' name='email'placeholder="Introduzca su dirección de correo" required><br>
    <button type='submit'>Enviar</button><br>
    </form>
</div>
             

</body>
</html>