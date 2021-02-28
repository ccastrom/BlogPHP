<?php
require_once 'includes/redireccion.php'; 
require_once 'includes/cabecera.php'; 
require_once './includes/lateral.php';
?>

<div id="principal">
    <h1>Crear Entradas</h1>
    <p>
        Añade nuevas entradas al blog 
    </p>
    <br>
    <form action="guardarEntrada.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo"/>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>
         <label for="descripcion">Descripcion:</label>
         <textarea name="descripcion"/></textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>
        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php 
                $categorias= conseguirCategorias($db);  
                if(!empty($categorias)):
                    while($categoria= mysqli_fetch_assoc($categorias)):   
                    ?>
            <option value="<?=$categoria['id']?>">
                <?=$categoria['nombre']?>
            </option>
            <?php
                endwhile;
                 endif;
                ?>
        </select>

        
        <input type="submit" value="Guardar"/>
    </form>
    <?phpborrarErrores?>
        
</div>
<!-- fin principal-->


<?php require_once './includes/pie.php';?>