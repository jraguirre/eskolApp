<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
    <title>Mantenimiento de Asignaturas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php session_start()?>
    <div id=formulario>
    <h2>Mantenimiento de Asignaturas</h2>
    <form id="form" method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    <!-- Especialidad: <select id='taller'> -->
    <!-- <?php
        $consulta = "select * from talleres";
        $resultado = mysqli_query($con, $consulta);
        echo "<option value=''></option>";
        while ($fila = mysqli_fetch_array($resultado)){ 
            extract($fila);
            echo '<option value="'.$id.'">'. $nombre .'</option>';
        }
        ?>     -->
    <!-- </select><br> -->
    <!-- Asignatura: <input type='text' name='nombre' require/><br> -->
    Materia: <select id='materia'>
    <?php
        include('parametros.php');
        $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
        mysqli_query("SET NAMES 'utf8'");
        $consulta = "select * from materias";
        $resultado = mysqli_query($con, $consulta);
        echo "<option value=''></option>";
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo '<option value="'.$id.'">'. $nombre .'</option>';
        }
    ?>    
    </select><br>
    Grupo: <select id='grupo'>
    <?php
        $consulta = "select grupos.id as id, talleres.nombre as taller, cursos.nombre as curso from grupos inner JOIN talleres INNER JOIN cursos WHERE grupos.curso=cursos.id and grupos.taller=talleres.id";
        $resultado = mysqli_query($con, $consulta);
        echo "<option value=''></option>";
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "<option value='$id'>$taller $curso</option>";
        }
    ?>    
    </select><br>
    Profesor: <select id='profesor'>
    <?php
        $consulta = "select * from usuarios where tipo = 3 and baja is null";
        $resultado = mysqli_query($con, $consulta);
        echo "<option value=''></option>";
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo '<option value="'.$dni.'">'.$nombre. ' ' . $apellido1 .'</option>';
        }
    ?>
    </select><br>
    <!-- Evaluación: <select id='evaluacion'>
    <?php
        $consulta = "select * from evaluaciones";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo '<option value="'.$id.'">'. $nombre .'</option>';
        }
    ?>    
    </select><br> -->
    <button type='button' onclick='crearA()'>Crear</button>
    <!-- <button type='button' onclick='limpiar()'>Limpiar</button> -->
    <button type='button' onclick='consultarA()'>Consultar</button>
    <button type='button' onclick='borrarA()'>Borrar</button>
    <button type='button' onclick='actualizarA()'>Modificar</button>
    <button type='button' onclick='anteriorA()' id="ant" ><</button>
    <button type='button' onclick='siguienteA()'id="sig" >></button><br>
    </form> 
    </div>
    <script src="main.js"></script>  
</body>
</html>