<?php
// session_start();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//Comprobar tokens.
$selector = test_input($_GET["selector"]);
$validator = test_input($_GET["validator"]);

if(false !== ctype_xdigit($selector) && false !== ctype_xdigit($validator)) :
?>
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
       <h2>Restablecer contraseña</h2>
       <form method='post' action='resetear_password.php'>
       <input type="hidden" name="selector" value=<?php echo $selector; ?>>
       <input type="hidden" name="validator" value=<?php echo $validator; ?>>
       <label for="password"><b>Contraseña</b>
       <input type='password' name='password'placeholder="Introduzca su contraseña" required><br>
       <!-- <label for="password2"><b>Confirmación</b>
       <input type='password' name='password2'placeholder="Repita su contraseña" required><br> -->
       <button type='submit'>Enviar</button><br>
       </form>
       <p><a href = "index.php">Iniciar sesión</a></p>
   </div>
<?php endif; ?>