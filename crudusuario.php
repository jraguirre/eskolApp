<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
    <title>Mantenimiento de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php session_start()?>
    <div id=formulario>
    <h2>Mantenimiento de Usuarios</h2>
    <form id="form" method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    Nombre: <input type='text' name='nombre'/><br>
    Apellido 1: <input type='text' name='apellido1'/><br>
    Apellido 2: <input type='text' name='apellido2'/><br>
    DNI: <input type='text' name='apellido2'/><br>
    Correo electrónico: <input type='text' name='email'/><br>
 

    Tipo de usuario: <select id='tipo'>
    <?php
        include('conexion.php');
        $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
        mysqli_query("SET NAMES 'utf8'");
        //$con->set_charset("utf8");
        $consulta = "select * from tipos_usuario";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo '<option value="'.$tipo.'">'.$nombre.'</option>';
        }
    ?>
    </select><br>
    Fecha Alta: <input type='text' name='alta' readonly><br>
    <button type='button' onclick='crear()'>Crear</button>
    <button type='button' onclick='consultar()'>Consultar</button>
    <button type='button' onclick='borrar()'>Borrar</button>
    <button type='button' onclick='actualizar()'>Actualizar</button>
    <button type='button' onclick='anterior()'><</button>
    <button type='button' onclick='siguiente()'>></button><br>
    </form> 
    </div>
    <script src="main.js"></script>  
</body>
</html>