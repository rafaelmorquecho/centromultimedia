
<section id="peliculas_ajax">
                 <seccion>
                <div id="peliculas">
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

    