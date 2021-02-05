<!DOCTYPE html>
<?php
    require_once 'conexion.php';
    require_once 'helpers.php';  
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog de videojuegos</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    </head>
    <body>
        <!-- Cabecera -->
        <header id="cabecera">
            <!-- LOGO -->
            <div id="logo">
                <a href="index.php">
                    Blog de videojuegos
                </a>
            </div>  
            <!-- menu-->
            
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php 
                        $categorias= conseguirCategorias($db);
                         while($categoria= mysqli_fetch_assoc($categorias)):
                    ?>
                        <li>
                            <a href="categoria.php?id=<?=$categoria["id"]?>"><?=$categoria['nombre']?> </a>
                        </li>
                    <?php endwhile; ?>
                    <li>
                        <a href="index.php">Sobre mi</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"> </div>

        </header>
        <div id="contenedor">