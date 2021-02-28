<?php

if (isset($_POST)) {
    require_once 'includes/conexion.php';
   

    /* Like an if */
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;

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

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $usuario=$_SESSION['usuario'];
        //COMPROBAR SI EL EMAIL EXISTE
        $sql="SELECT id, email FROM usuarios WHERE email='$email'";
        $isset_email= mysqli_query($db, $sql);
        $isset_user= mysqli_fetch_assoc($isset_email);
        
        
        if($isset_user['id']==$usuario['id'] || empty($isset_user) ){
                    $guardar_usuario = true;
      
        //ACTUALIZAR EN LA BASE DE DATOS
        
        $login = "UPDATE usuarios SET ".
                "nombre='$nombre',".
                "apellidos='$apellidos',".
                "email='$email'".
                "WHERE id=".$usuario['id'];
        $insert = mysqli_query($db, $login);


        if ($insert) {
            $_SESSION['usuario']['nombre']= $nombre;
            $_SESSION['usuario']['apellidos']= $apellidos;
            $_SESSION['usuario']['email']= $email;
            $_SESSION['completado'] = 'Tus datos se han actualizado con exito';
        } else {
            $_SESSION['errores']['general'] = 'Fallo al actualizar tus datos';
        }
            
        }else{
            $_SESSION['errores']['general'] = 'El usuario ya existe';
        }


    }else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: misdatos.php');