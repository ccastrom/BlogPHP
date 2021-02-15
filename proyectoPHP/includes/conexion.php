<?php

//conectar a la base de datos
$db= mysqli_connect("localhost", "root", "123456", "blog");
//comprobar si la conexion es correcta
if(mysqli_connect_errno()){
    echo"Connection to the database MySQL has been failed".mysqli_connect_errno();
    
}
mysqli_query($db, "SET NAMES 'utf8'");

//INICIAR LA SESION
if(!isset($_SESSION)){
    session_start();  
}
 






////consulta select desde PHP
//$query=mysqli_query($conexion,"SELECT * FROM notas");
//while ($nota=mysqli_fetch_assoc($query)){
////    var_dump($nota);
//    echo "<h2>".$nota['titulo']."</h2>";
//    echo $nota['descripcion']."</br>";
//    
//}
////insertar en la base de datos desde PHP
//$query="INSERT INTO notas VALUES(NULL,'Nota desde PHP','Esto es una nota de PHP','green')";
//$insert= mysqli_query($conexion, $query);
//echo"<hr>"; 
//if($insert){
//    echo"INSERT SUCCESFULLY IN DATABASE";
//}else{
//    echo"Error: ".mysqli_errno($conexion);
//}
?>