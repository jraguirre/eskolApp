<!<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eskolApp: Menú Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
   <?php
   session_start();
   $usuario = $_SESSION["usuario"];
   include('parametros.php');
   $dni = $_SESSION["dni"];
   $con = mysqli_connect($host, $user, $pass, $db_name) or die("<h1>Error al conectar con la base de datos</h1>");
   $consulta="select * from usuarios where dni = '$dni'";
   $resultado = mysqli_query($con, $consulta);
   $num_filas = mysqli_num_rows($resultado);
//    echo($consulta);
//    echo($num_filas);
   if($num_filas==1){
        $fila = mysqli_fetch_array($resultado);
        extract($fila); 
        // echo $nombre;
   }
   ?> 
   <div id=formulario>
   <h2>Hola <?php echo($nombre);?></h2>
   <h3>Menú de <?php 
   $consulta ="select nombre from tipos_usuario where tipo=$tipo";
   $resultado= mysqli_query($con, $consulta);
   $fila=mysqli_fetch_array($resultado);
   extract($fila);
   echo $nombre;
   ?></h3>
   <?php
   switch ($tipo) {
       case 1:?> 
            <button type='button' onclick='consCalif()'>Consultar calificaciones</button>    
    <?php break;
       case 2:?>
            <button type='button' onclick='crud("GruposU")'>Grupos</button>
            <button type='button' onclick='crud("Calif")'>Calificaciones</button>
        <?php break;
       break;
       case 3:?>
            <button type='button' onclick='consCalif()'>Consultar Profesor calificaciones</button>
        <?php break;
       break;
       case 4:?>
            <button type='button' onclick='consCalif()'>Consultar Tutor calificaciones</button>
        <?php break;
       break;
       case 5: 
       // echo("Opción 1");
       ?>
       <button type='button' onclick='crud("Usuario")'>Usuari@s</button>
       <button type='button' onclick='crud("Tutelas")'>Tutor@s</button>
       <button type='button' onclick='crud("Materias")'>Materias</button>
       <button type='button' onclick='crud("Asignaturas")'>Asignaturas</button>
       <button type='button' onclick='crud("Talleres")'>Especialidades</button>
       <button type='button' onclick='crud("Cursos")'>Cursos</button>
       <button type='button' onclick='crud("Grupos")'>Grupos</button>
       <button type='button' onclick='crud("Evaluaciones")'>Evaluaciones</button>
    <?php
        break;
   }
    ?>
    </div>
</body>
</html>