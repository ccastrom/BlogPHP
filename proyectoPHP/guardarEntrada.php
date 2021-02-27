<?php
if(isset($_POST)){
     require_once 'includes/conexion.php';
    $titulo=isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']):false;
    $descripcion=isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']):false;
    $categoria=isset($_POST['categoria']) ?(int)$_POST['categoria']:false;
    $usuario=$_SESSION['usuario']['id'];
    
    //VALIDACIÓN DE ERRORES
    $errores=array();
    
    if(empty($titulo)){
        $errrores["titulo"]='El titulo no es valido';
    }
    
     if(empty($descripcion)){
        $errrores["titulo"]='La descripción no es valida';
    }
    
     if(!empty($categoria && !is_numeric($categoria))){
        $errrores["titulo"]='La categoria no es válida';
    }
   
    
    if(count($errores)==0){
        $sql="INSERT INTO entradas VALUES(NULL,$usuario,$categoria,'$titulo','$descripcion',CURDATE());";
        $guardar= mysqli_query($db,$sql);
        
        
        
       
        
    }else{
        $_SESSION["errores_entradas"]=$errores;
    }
}
header("Location: index.php");