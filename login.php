<?php
    session_start();
    if($_POST['usuario']!=""){
        $_SESSION['nombre']=$_POST['usuario'];
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
        echo '<script language="javascript">';
        echo 'alert("Falta el nombre de usuario")';
        echo '</script>';
    }
    if($_POST['password']!=""){
        $_SESSION['password']=password_hash($_POST['password'],PASSWORD_BCRYPT);
    }


?>