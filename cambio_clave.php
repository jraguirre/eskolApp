<!<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eskolApp: Cambio de clave</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $mensaje = random_bytes(200);
        mail ($email, $"eskolApp: Cambio de contraseña.","http://192.168.0.16:8080/proyecto/reset_password.php");
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>    
    <h2>Cambio de contraseña</h2>
    <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    Dirección de correo: <input type='text' name='email'/><br>
    <input type='submit' name='Entrar'/><br>
    </form>
</body>
</html>