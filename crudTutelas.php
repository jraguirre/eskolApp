<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
    <title>Mantenimiento de Tutelados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php session_start()?>
    <div id=formulario>
    <h2>Mantenimiento de Tutelados</h2>
    Tutor: <select id='tutor'>
    <?php
        include('parametros.php');
        $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
        mysqli_query("SET NAMES 'utf8'");
        $consulta = "select * from usuarios where tipo=4 and baja is null";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "<option value=$id>$nombre $apellido1 $apellido2</option>";
        }
    ?>    
    </select><br>
    Alumno: <select id='alumno'>
    <?php
        $consulta = "select * from usuarios where tipo=1 and baja is null";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "<option value=$id>$nombre $apellido1 $apellido2</option>";
        }
    ?>    
    </select><br>
    <button type='button' onclick='asociar()'>Asociar</button>
    <button type='button' onclick='consultarT()'>Consultar</button>
    <button type='button' onclick='borrarT()'>Separar</button>
    <button type='button' onclick='anteriorT()' id="ant" ><</button>
    <button type='button' onclick='siguienteT()'id="sig" >></button><br>
    </form> 
    </div>
    <script src="main.js"></script>  
</body>
</html>