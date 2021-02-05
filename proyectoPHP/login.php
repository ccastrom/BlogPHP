<?php

//iniciar la sesion y conexion a la base de datos
require_once './includes/conexion.php';
//recojer datos del formulario
if (isset($_POST)) {
    //borrar error antiguo
    if (isset($_SESSION['error_login'])) {
        session_unset();
    }
    //Recoger datos del form
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Consulta a la base de datos para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $login = mysqli_query($db, $sql);


    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        
        //Comprobar la contraseña/cifrar
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {
            //Utilizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
        } else {
            //Si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    } else {
        //mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }
}
header("Location: index.php");
//Redirigir al index.php
