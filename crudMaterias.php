<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
    <title>Mantenimiento de Materias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php session_start()?>
    <div id=formulario>
    <h2>Mantenimiento de Materias</h2>
    <form id="form" method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    Materia: <input type='text' name='nombre' require/><br>
    <button type='button' onclick='crearM()'>Crear</button>
    <button type='button' onclick='consultarM()'>Consultar</button>
    <button type='button' onclick='borrarM()'>Borrar</button>
    <button type='button' onclick='anteriorM()' id="ant" ><</button>
    <button type='button' onclick='siguienteM()'id="sig" >></button><br>
    </form> 
    </div>
    <script src="main.js"></script>  
</body>
</html>