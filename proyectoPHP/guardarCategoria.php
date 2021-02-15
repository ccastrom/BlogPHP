<?php
if(isset($_POST)){
     require_once 'includes/conexion.php';
    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']):false;
    
        //ARRAY DE ERRORES
    $errores = array();

    //validar los datos antes de insertar en la base de datos
    //-----------------------NOMBRE----------------------------------
    if (!empty($nombre) && !is_numeric($nombre)) {
        $nombre_valido = true;
    } else {
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    if(count($errores)==0){
        $sql="INSERT INTO categorias VALUES(NULL,'$nombre');";
        $guardar= mysqli_query($db, $sql);
    }
}
header("Location: index.php");