<?php

if (isset($_POST)) {
    require_once 'includes/conexion.php';
    //Iniciar sesion
    if (!isset($_SESSION)) {
        session_start();
    }

    /* Like an if */
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //ARRAY DE ERRORES
    $errores = array();

    //validar los datos antes de insertar en la base de datos
    //-----------------------NOMBRE----------------------------------
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_valido = true;
    } else {
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    //-----------------------APELLIDOS----------------------------------
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validos = true;
    } else {
        $apellidos_validos = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }
    //-----------------------EMAIL----------------------------------
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valido = true;
    } else {
        $email_valido = false;
        $errores['email'] = "El email no es valido";
    }
    //---------------------CONTRASEÑA--------------------------------
    if (!empty($password)) {
        $password_valido = true;
    } else {
        $password_valido = false;
        $errores['password'] = "La contraseña esta vacia";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {

        $guardar_usuario = true;
        //CIFRAR CONTRASEÑA
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        //INSERTAR EN LA BASE DE DATOS
        $query = "INSERT INTO usuarios VALUES(NULL,'$nombre','$apellidos','$email','$password_segura',CURDATE());";
        $insert = mysqli_query($db, $query);


        if ($insert) {
            $_SESSION['completado'] = 'El registro se ha completado con exito';
        } else {
            $_SESSION['errores']['general'] = 'Fallo al guardar el usuario';
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');
