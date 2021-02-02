<?php

//conectar a la base de datos
$conexion= mysqli_connect("localhost", "root", "123456", "phpmysql");
//comprobar si la conexion es correcta
if(mysqli_connect_errno()){
    echo"Connection to the database MySQL has been failed".mysqli_connect_errno();
    
}else{
    echo"Connection succesfully"."</br>";
}
//Consulta para configurar la codificación de caracteres
mysqli_query($conexion, "SET NAMES 'utf8'");

//consulta select desde PHP
$query=mysqli_query($conexion,"SELECT * FROM notas");
while ($nota=mysqli_fetch_assoc($query)){
//    var_dump($nota);
    echo "<h2>".$nota['titulo']."</h2>";
    echo $nota['descripcion']."</br>";
    
}
//insertar en la base de datos desde PHP
$query="INSERT INTO notas VALUES(NULL,'Nota desde PHP','Esto es una nota de PHP','green')";
$insert= mysqli_query($conexion, $query);
echo"<hr>"; 
if($insert){
    echo"INSERT SUCCESFULLY IN DATABASE";
}else{
    echo"Error: ".mysqli_errno($conexion);
}
?>