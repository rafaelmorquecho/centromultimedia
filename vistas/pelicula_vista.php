<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Peliculas</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                        <!--<li id="peliculas_menu"><a href="#">Peliculas</a></li>
                        <li id="musica_menu"><a href="#">Musica</a></li>
                        <li id="series_menu"><a href="#">Series</a></li>-->
                    </ul>
                </nav>

                <ul id="main-nav">

                    <li id="peliculas_menu"><a href="#">Peliculas</a>
                        <ul>
                            <li><a href="#">Actores</a></li>
                            <li><a href="#">Directores</a></li>
                            <li><a href="#">Genero</a></li>
                        </ul>
                    </li>
                    <li id="musica_menu"><a href="#">Musica</a>
                        <ul>
                            <li><a href="#">Artista</a></li>
                            <li><a href="#">Genero</a></li>
                            <li><a href="#">Disco</a></li>
                        </ul>
                    </li>
                    <li id="series_menu"><a href="#">Series tv</a>
                        <ul>
                            <li><a href="#">Temporada</a></li>
                            <li><a href="#">Genero</a></li>
                        </ul>
                    </li>
                    
                    <button class="btn sesion derecha"><?php echo "Bienvenido  " . $_SESSION['usuario']; ?></button>
                    <button class="btn derecha" id="logout" type="submit"  onclick= "window.location.href = 'vistas/logout.php'">Logout</button>
                    <input class="buscar select derecha" type="text">
                    <select class="select derecha" >
                        <option>En todo</option>
                        <option value="Titulos">En Titulos</option>
                        <option value="Actores">En Actores</option>
                        <option value="Directores">En Directores</option>
                    </select>
            </div>
        </header>
        <div id="contenedor">
            <section id="peliculas" style="display:none" >
                <seccion>
                    <div>
                        <?php if (!empty($faforitos)) { ?>
                            <div id="barra_favoritas">
                            </div>
                            <div id="favoritas">
                            </div>
                        <?php } ?>       

                        <?php
                        if (!empty($favoritas)) {
                            echo "<h2>Favoritas</h2>";
                            foreach ($favoritas as $favorita) {
                                echo "<img class='cartel' id=" . $favorita['id_pelicula'] . " titulo = " . $favorita['titulo'] . " src= " . $favorita['cartel'] . " alt='Caratula' > ";
                            }
                        }
                        ?>



                    </div>
                    <?php
                    foreach ($carteles as $cartel) {

                        echo "<img class='cartel' id=" . $cartel['id_pelicula'] . " titulo = " . $cartel['titulo'] . " src= " . $cartel['cartel'] . " alt='Caratula' fav='añadir a favoritos'> ";
                    }
                    ?>
                    </div>
                    </div>
                    <div id="musica"  style="display:none">

                    </div >

                    <div id="series"  style="display:none">

                    </div >


            </section>
            <div id="peliculaDialog" style="display:none">
                <div id="peliculas-info" class="container-fluid">
                </div>	
            </div>
            <div id="loginDialog" style="display:none">
                <div id="gestion"> </div>
                <div id="usuario">
                    <?php
                    //echo "<pre><code>" . print_r($_SESSION,true) . "</code></pre>";
                    echo "<p>Login:" . $_SESSION['usuario'] . "</p>";
                    echo "<p>Privilegios:";
                    foreach ($_SESSION['rol'] as $rol) {
                        echo " " . $rol . " ";
                    }
                    echo "</p>";


                    if (in_array('admin', $_SESSION['rol'])) {
                        echo "<button class='boton' style='margin-rigth:25px' id='gestionUsuarios'> Gestion de usuarios</button>";
                        echo "<button class='boton' id='gestionPeliculas'> Gestion de peliculas</button>";
                    }
                    ?>

                </div>
                </section>
            </div>

    </body>
</html>