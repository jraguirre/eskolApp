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
   <h2>Hola <?php echo($nombre);?></h2>
   <div id=formulario>
   <?php
   switch ($tipo) {
       case 1: 
            echo("Opción 1"); ?> 
            <button type='button' onclick='consCalif()'>Consultar calificaciones</button>
            <button type='button' onclick='consultar()'>Consultar</button>     
    <?php break;
       case 2:
       echo("Opción 1"); 
       break;
       case 3:
       echo("Opción 1"); 
       break; 
       case 4:
       echo("Opción 1"); 
       break; 
       case 5: 
            // echo("Opción 1");
             ?>
       <button type='button' onclick='crudUsuario()'>Mantenimiento de usuarios</button>
    <?php
        break;
   }
    ?>
    </div>
</body>
</html>