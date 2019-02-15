<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
    <title>Calificaciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body onload="consultarCalificaciones()">
    <?php session_start(); 
    $dni = $_SESSION["dni"];?>
    <div id=formulario>  
    <h2>Consulta de calificaciones</h2>

    <?php
    include('parametros.php');
        $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
        mysqli_query("SET NAMES 'utf8'");
        $consulta = "select nombre, apellido1, apellido2, tipo from usuarios where dni='$dni'";
        $resultado = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_array($resultado);
        extract($fila);
        // echo "<h3> $nombre $apellido1 $apellido2</h3>";
        echo "<table style='width:100%'>";
        echo "<caption><h3>$nombre $apellido1 $apellido2</h3></caption>";
        switch ($tipo) {
            case 1:
            echo "<th>Especialidad</th><th>Curso</th><th>Asignatura</th><th>Evaluación</th><th>Nota</th>";
            $consulta="select asignaturas.id as id, asignaturas.grupo as grupo, materias.nombre as nombre, talleres.nombre as taller, cursos.nombre as curso, calificaciones.nota, evaluaciones.nombre as evaluacion from asignaturas, materias,grupos, talleres, cursos, calificaciones, evaluaciones where asignaturas.materia=materias.id and asignaturas.grupo=grupos.id and grupos.taller=talleres.id and grupos.curso=cursos.id and calificaciones.alumno='$dni' and asignaturas.grupo=calificaciones.grupo and evaluaciones.id=calificaciones.evaluacion";
            break;
            case 3:
            $consulta="select asignaturas.id as id, asignaturas.grupo as grupo, materias.nombre as nombre, talleres.nombre as taller, cursos.nombre as curso, calificaciones.nota, evaluaciones.nombre as evaluacion, usuarios.dni as dni from asignaturas, materias,grupos, talleres, cursos, calificaciones, evaluaciones, usuarios where asignaturas.materia=materias.id and asignaturas.grupo=grupos.id and grupos.taller=talleres.id and grupos.curso=cursos.id and calificaciones.alumno='$dni' and asignaturas.grupo=calificaciones.grupo and evaluaciones.id=calificaciones.evaluacion and usuarios.dni=calificaciones.alumno";
            break;
            case 4:
            echo "<th>Alumnx</th><th>Especialidad</th><th>Curso</th><th>Asignatura</th><th>Evaluación</th><th>Nota</th>";
        $consulta="select asignaturas.id as id, asignaturas.grupo as grupo, materias.nombre as nombrea, talleres.nombre as taller, cursos.nombre as curso, calificaciones.nota, evaluaciones.nombre as evaluacion, usuarios.nombre as nombre, usuarios.apellido1 as apellido1, usuarios.apellido2 as apellido2 from asignaturas, materias,grupos, talleres, cursos, calificaciones, evaluaciones, usuarios where asignaturas.materia=materias.id and asignaturas.grupo=grupos.id and grupos.taller=talleres.id and grupos.curso=cursos.id and calificaciones.alumno in (select tutelado from tutelas where tutor = '$dni' ) and asignaturas.grupo=calificaciones.grupo and evaluaciones.id=calificaciones.evaluacion and usuarios.dni=calificaciones.alumno order by dni";
            break;
        }
        // echo $consulta;
        $resultado = mysqli_query($con, $consulta);
        while ($fila = mysqli_fetch_array($resultado)) {
            extract($fila);
            switch ($tipo) {
                case 1:
            echo("<tr><td>$taller</td><td>$curso</td><td>$nombre</td><td>$evaluacion</td><td>$nota</td></tr>") ;
            break;
            case 3:
            echo("<tr><td>$taller</td><td>$curso</td><td>$nombre</td><td>$evaluacion</td><td>$nota</td></tr>") ;
            break;
            case 4:
            echo("<tr><td>$nombre $apellido1 $apellido2</td><td>$taller</td><td>$curso</td><td>$nombrea</td><td>$evaluacion</td><td>$nota</td></tr>") ;
            break;
            }
        }
        echo "</table>";
?>
    <div id=resultado></div>
    </form> 
    </div>
    <script src="main.js"></script> 
</body>
</html>