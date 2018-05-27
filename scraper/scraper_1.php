<?php

require_once('conectar.php');

//require_one('04_conex_peliculas.php');
$peliculas = array();

function optener($nombrefichero) {
    $html = file_get_contents($nombrefichero); //Convierte la información de la URL en cadena
    return $html;
}

function infopelis($html) {
    $infopeli = strstr($html, '<dl class="movie-info">'); //principio de infopeli
    $infopeli = substr_replace($infopeli, '', strpos($infopeli, 'Tu crítica')); //final de infopeli
    $infopeli = str_replace('  ', '', $infopeli); //espacios sobrantes

    $pattern = ['/[[:cntrl:]]/', '/&nbsp;/', '/&quot;/']; // quitar carateres de control cr y lf
    $replace = "";
    $infopeli = preg_replace($pattern, $replace, $infopeli);





    return $infopeli;
}

function titulo($html) {
    preg_match('/<title>(.*)<\/title>/i', $html, $titulo);
    $titulo = str_replace('- FilmAffinity', '', $titulo);
    $titulo[0] = trim($titulo[1]);
    array_pop($titulo);
    return $titulo;
}

function carteles($cartel) {
    $subcadena = strstr($cartel, '<img itemprop=');

    $subcadena = substr_replace($subcadena, '', strpos($subcadena, '" alt='));

    $subcadena = strstr($subcadena, 'src="./');


    $subcadena = str_replace('src="./', '', $subcadena);



    $directorio = "../peliculas/web/";
    $fichero = $directorio . $subcadena;
    $imagen = titulo($cartel);

    $imagen = str_replace(' ', '_', $imagen[0]);


    $url = "../carteles/" . $imagen . "." . "jpg";

    if (copy($fichero, $url)) {
        echo "<p>El fichero $fichero se esta copiando en $url</p>";
    } else {
        echo "<p>Se ha producido un error al intentar copiar el fichero $fichero en $url</p>";
    }
    return $url;
}

function rascar($subcadena, $principio, $final) {
    $subcadena = strstr($subcadena, $principio);
    $subcadena = substr_replace($subcadena, '', strpos($subcadena, $final));
    $subcadena = str_replace($principio, '', $subcadena);
    if ($principio == '<dt>Premios</dt>') {
        $subcadena = premioIndividuales($subcadena);
    } else {

        if ($principio == '<dt>Género</dt>') {
            $subcadena = str_replace('.', ', ', $subcadena);
            $subcadena = str_replace('|', ', ', $subcadena);
        }
        if ($principio == '<dt>Productora</dt>') {
            $subcadena = str_replace('/', ', ', $subcadena);
        }
        if ($principio == '<dt>Críticas</dt>') {
            $subcadena = criticasIndividules($subcadena);
        } else {
            $subcadena = strip_tags($subcadena);
            if ($principio != '<dt>Sinopsis</dt>') {
                $subcadena = preg_split('/,/', $subcadena);
            }
        }
    }
    $subcadena = str_replace('  ', '', $subcadena); //espacios sobrantes



    return $subcadena;
}

function criticasIndividules($subcadena) {

    $cadena = [];
    $subcadena = strstr($subcadena, '<div itemprop="reviewBody">');
    $subcadena = preg_split('/<li/', $subcadena);
    foreach ($subcadena as $critica) {
        $critica = strip_tags($critica);
        $critica = str_replace('>', '', $critica);
        array_push($cadena, $critica);
    }
    return $cadena;
}

function premioIndividuales($subcadena) {
    $cadena = [];
    $subcadena = str_replace('<dd class="award"><divclass="margin-bottom">', '', $subcadena);

    $subcadena = str_replace('<divclass="margin-bottom">', '---', $subcadena);
    $subcadena = preg_split('/---/', $subcadena);
    foreach ($subcadena as $premio) {
        $premio = strip_tags($premio);
        $premio = str_replace('>', '', $premio);
        array_push($cadena, $premio);
    }
    return $cadena;
}

/* function printr($array, $print = true) {
  if ($print)
  return print_r($array, true);
  else
  echo '<pre>' . print_r($array, true) . '</pre>';
  } */

function insertar($nombrefichero) {
    $conexion = conectar();



    echo "leeyendo: " . $nombrefichero;
    $html = optener($nombrefichero);
    $titulo = titulo($html);
    $titulo = '"' . $titulo[0] . '"';
    echo "<p>" . $titulo . "</p>";

    $infopeli = infopelis($html);


    $peliculas['titulo'] = $titulo;
    $peliculas['cartel'] = carteles($html);

    $peliculas['TituloOriginal'] = rascar($infopeli, '<dt>Título original</dt>', '</dd>');
    $peliculas['TituloOriginal'] = $peliculas['TituloOriginal'][0];

    $peliculas['año'] = rascar($infopeli, '<dt>Año</dt>', '</dd>');
    $peliculas['año'] = $peliculas['año'][0];

    $peliculas['duracion'] = rascar($infopeli, '<dt>Duración</dt>', '</dd>');
    $peliculas['duracion'] = $peliculas['duracion'][0];

    $peliculas['pais'] = rascar($infopeli, '<dt>País</dt>', '</dd>');
    $peliculas['director'] = rascar($infopeli, '<dt>Director</dt>', '</dd>');
    $peliculas['guion'] = rascar($infopeli, '<dt>Guión</dt>', '</dd>');
    $peliculas['musica'] = rascar($infopeli, '<dt>Música</dt>', '</dd>');
    $peliculas['fotografia'] = rascar($infopeli, '<dt>Fotografía</dt>', '</dd>');
    $peliculas['reparto'] = rascar($infopeli, '<dt>Reparto</dt>', '</dd>');
    $peliculas['productora'] = rascar($infopeli, '<dt>Productora</dt>', '</dd>');
    $peliculas['genero'] = rascar($infopeli, '<dt>Género</dt>', '</dd>');
    $peliculas['sinopsis'] = rascar($infopeli, '<dt>Sinopsis</dt>', '</dd>');
    $peliculas['premios'] = rascar($infopeli, '<dt>Premios</dt>', '</dd>');
    $peliculas['criticas'] = rascar($infopeli, '<dt>Críticas</dt>', '</dd>');





$consulta = ("SELECT * FROM `pelicula` WHERE `titulo`  LIKE ('" . $peliculas['titulo'] . "') and `año` = '" . $peliculas['año'] . "';");
echo $consulta;
    $sql = "INSERT INTO `pelicula`(`titulo`, `año`, `sinopsis`, `duracion`, `cartel`) VALUES (" . "'" . $peliculas['titulo'] . "'," . "'" . $peliculas['año'] . "'," . "'" . $peliculas['sinopsis'] . "'," . "'" . $peliculas['duracion'] . "'," . "'" . $peliculas['cartel'] . "');";


    echo $sql;
    $resultado = mysqli_query($conexion, $sql);
    $id1 = mysqli_insert_id($conexion);

    echo "<p> <pre>Resultado pelicula: " . print_r($resultado, true) . "</pre></p>";

    foreach ($peliculas['reparto'] as $actor) {

        $consulta = "select id from artista where nombre = '$actor'";




        if ($resultado = mysqli_query($conexion, $consulta)) {

            /* determinar el número de filas del resultado */
            $filas = mysqli_num_rows($resultado);
            echo "<p> Resultado buscar actor : " . print_r($filas) . "</p>";
            echo "<p>Este Artista ya se encuentra en la tabla  $actor</p>";
        } else {
            echo "<p>Añadiendo Actor: $actor</p>";
            $sql = "INSERT INTO artista VALUES ('','$actor');";
            mysqli_query($conexion, $sql);
            echo $sql;
            $id2 = mysqli_insert_id($conexion);
            $consulta = "SELECT `id_artista` FROM `pelicula_artista_rol` WHERE `id_rol` = 1  and  `id_pelicula`= $id1 and `id_artista` =  $id2;";
            echo $consulta;
            $sql = "INSERT INTO pelicula_artista_rol VALUES ( $id2 , 1 ,$id1);";
            mysqli_query($conexion, $sql);
            echo $sql;
        }
        
        
    }
    echo '<pre>' . print_r($peliculas, true) . '</pre>';

    return $peliculas;
}

//mysqli_close($conexion);


foreach (glob("../peliculas/web/*.html") as $nombrefichero) {
    insertar($nombrefichero);
}
?>
