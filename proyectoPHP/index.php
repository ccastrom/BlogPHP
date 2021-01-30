<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog de videojuegos</title>
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
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 1</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 2</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 3</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 4</a>
                    </li>
                    <li>
                        <a href="index.php">Sobre mi</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>

            </nav>
        </header>
        <div id="contenedor">
            <!-- Barra lateral -->
            <aside id="sidebar">
                <div id="login" class="bloque">
                    <h3>Identificate</h3>
                    <form action="login.php" method="POST">
                        <label for="email">email</label>
                        <input type="email" name="email"/>

                        <label for="password">contraseña</label>
                        <input type="password" name="password"/>
                        <input type="submit" value="Entrar">
                    </form>
                </div>

                <div id="register" class="bloque">
                    <h3>Registrate</h3>
                    <form action="registro.php" method="POST">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre "/>

                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos"/>

                        <label for="email">email</label>
                        <input type="email" name="email"/>

                        <label for="password">contraseña</label>
                        <input type="password" name="password"/>
                        <input type="submit" value="Registrarse">
                    </form>
                </div>
            </aside>
            <!-- Caja principal -->
            <div id="principal">
                <h1>Ultimas entradas</h1>
                <article class="entrada">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing 
                        elit. Maecenas consectetur.                      
                    </p>
                </article>
                <article class="entrada">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing 
                        elit. Maecenas consectetur.                      
                    </p>
                </article>
                <article class="entrada">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing 
                        elit. Maecenas consectetur.                      
                    </p>
                </article>
                <article class="entrada">
                    <h2>Titulo de mi entrada</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing 
                        elit. Maecenas consectetur.                      
                    </p>
                </article>

            </div>
        </div>
        <!-- Pie de pagina -->
        <footer id="pie">
            <p>Desarrollado por Claudio Castro &copy; 2021</p>
        </footer>
    </body>
</html>
