<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restablecer contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>
       <div id=formulario>    
       <h2>Restablecer de contraseña</h2>
       <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
       <label for="password1"><b>Contraseña</b>
       <input type='password' name='password1'placeholder="Introduzca su contraseña" required><br>
       <label for="password2"><b>Confirmación</b>
       <input type='password' name='password2'placeholder="Repita su contraseña" required><br>
       <button type='submit'>Enviar</button><br>
       </form>
   </div>