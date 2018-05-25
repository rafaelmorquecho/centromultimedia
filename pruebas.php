<?php
include_once('modelos/Class.Pelicula.php');
include_once('modelos/Class.Artista.php');
include_once('modelos/Class.Rol.php');





$artista = new artista(812);
print_r($artista->getNombre());

$rol = new rol(1);
print_r($rol->getNombre());
?>