<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
    <title>Calificaciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php session_start()?> 
    <div id=formulario>
    <h2>Asignación calificaciones</h2>
    Asignatura: <select id='asignatura'>
    <!-- <option value=''></option> -->
    <?php
        include('parametros.php');
        $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
        mysqli_query("SET NAMES 'utf8'");
        // $consulta = "select grupos.id as id, talleres.nombre as taller, cursos.nombre as curso from grupos inner JOIN talleres INNER JOIN cursos WHERE grupos.curso=cursos.id and grupos.taller=talleres.id";
        $consulta = "select asignaturas.id as id, asignaturas.grupo as grupo, materias.nombre as nombre, talleres.nombre as taller, cursos.nombre as curso from asignaturas, materias,grupos, talleres, cursos where asignaturas.materia=materias.id and asignaturas.grupo=grupos.id and grupos.taller=talleres.id and grupos.curso=cursos.id";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "<option value=$grupo>$taller $nombre $curso</option>";

        }
        // $grupo_seleccionado
    ?>    
    </select><br>
    Evaluación: <select id ='evaluacion'>
    <!-- <option value=''></option> -->
    <?php
        $consulta = "select * from evaluaciones";
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "<option value=$id>$nombre</option>";
        }
    ?>    
    </select><br>
    <button type='button' onclick='alumnosAsignatura()'>Alumnos</button>
    <!-- <button type='button' onclick='consultarAG()'>Consultar</button>
    <button type='button' onclick='borrarAG()'>Quitar</button><br> -->
    <!-- <button type='button' onclick='anteriorT()' id="ant" ><</button>
    <button type='button' onclick='siguienteT()'id="sig" >></button><br> -->
    <h3>Calificaciones</h3>
    <div id=resultado></div>
    </form> 
    </div>
    <script src="main.js"></script>  
</body>
</html>