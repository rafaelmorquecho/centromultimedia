<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Peliculas</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"
                integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="vistas/js/pelicula_vista.js"></script>
        <link rel="stylesheet" type="text/css" href="vistas/css/pelicula_vista.css">
    </head>
    <body> 
        <header>
            <h1 id ="titulo"></h1>
            <div class="login">
                <nav>
                    <ul>
                        <li><a href="#">Peliculas</a></li>
                        <li><a href="#">Musica</a></li>
                        <li><a href="#">Series</a></li>
                    </ul>
                </nav>
                <button class="btn btn-signin sesion derecha"><?php echo "Bienvenido  " . $_SESSION['usuario']; ?></button>
                <button class="btn btn-signin derecha" id="logout" type="submit"  onclick= "window.location.href = 'vistas/logout.php'">Logout</button>
                <input class="buscar select derecha" type="text">
                <select class="select derecha" >
                    <option>En todo</option>
                    <option value="Titulos">En Titulos</option>
                    <option value="Actores">En Actores</option>
                    <option value="Directores">En Directores</option>
                </select>
            </div>
        </header>
        <section>
            <div id="peliculas">
                
                <div id="barra_favoritas">
                </div>
                <div id="favoritas">
                </div
                        
                    
                <?php if(!empty($favoritas)){
                     echo "<h2>Favoritas</h2>";
                    foreach ($favoritas as $favorita) {
                        echo "<img class='cartel' id=" . $favorita['id_pelicula'] . " titulo = " . $favorita['titulo'] . " src= " . $favorita['cartel'] . " alt='Caratula' > ";
                    } }
                    ?>
                    
                   
                
                </div>
                    <?php

                    foreach ($carteles as $cartel) {

                        echo "<img class='cartel' id=" . $cartel['id_pelicula'] . " titulo = " . $cartel['titulo'] . " src= " . $cartel['cartel'] . " alt='Caratula' fav='añadir a favoritos'> ";
                    }
                    ?>
                </div>
            </div>
            <div id="musica">
            </div >
        </section>
        <div id="peliculaDialog" style="display:none">
            <div id="peliculas-info" class="container-fluid">
                <button type="submid">quitar</button>
            </div>	
        </div>
        <div id="loginDialog" style="display:none">
        <div id="gestion"> </div>
        <?php //echo "<pre><code>" . print_r($_SESSION,true) . "</code></pre>";
        echo "<p>Login:" .  $_SESSION['usuario'] . "</p>";
        echo "<p>Privilegios:";
        foreach ($_SESSION['rol'] as $rol) {
            echo " " .  $rol . " ";
        }
        echo "</p>";
       

        if (in_array('admin' , $_SESSION['rol'])){ 
        echo "<button class='boton' style='margin-rigth:25px' id='gestionUsuarios'> Gestion de usuarios</button>";
        echo "<button class='boton' id='gestionPeliculas'> Gestion de peliculas</button>";
        }
        ?>

        
            </div>	
        </div>


    </body>
</html>