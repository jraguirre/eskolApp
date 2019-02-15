<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
    <title>Mantenimiento de Grupos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php session_start()?>
    <div id=formulario>
    <h2>Mantenimiento de Grupos</h2>
    <form id="form" method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    Especialidad: <select id='taller'>
    <?php
        include('parametros.php');
        $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
        $consulta = "select * from talleres";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "<option value=$id>$nombre</option>";
        }
        ?>    
    </select><br>
    Grupo: <select id='grupo'>
    <?php
        mysqli_query("SET NAMES 'utf8'");
        $consulta = "select * from grupos";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "<option value=$id>$nombre</option>";
        } 
        ?>    
    </select><br>
        Grupo nuevo: <input type='text' name='nombre' require/><br>

    <button type='button' onclick='crearG()'>Crear</button>
    <button type='button' onclick='asociarA()'>Alumnxs +</button>
    <button type='button' onclick='quitarA()'>Alumnxs -</button>
    <button type='button' onclick='asociarAs()'>Asignaturas +</button>
    <button type='button' onclick='quitarAs()'>Asignaturas -</button>
    <button type='button' onclick='consultarG()'>Consultar</button>
    <button type='button' onclick='borrarG()'>Borrar</button>
    <!-- <button type='button' onclick='anteriorT()' id="ant" ><</button>
    <button type='button' onclick='siguienteT()'id="sig" >></button><br> -->
    <div id=resultado></div>
    </form> 
    </div>
    <script src="main.js"></script>  
</body>
</html>