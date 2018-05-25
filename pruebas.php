<?php
include_once('conexion/conexion.php');
include_once('modelos/Class.Pelicula.php');
include_once('modelos/Class.Artista.php');
include_once('modelos/Class.Rol.php');



$pelicula = new Pelicula();
$pelicula->get_pelicula(445);
print_r($pelicula);
echo " \n";
print_r($pelicula->getTitulo());
echo " \n";
$artista = new Artista();
print_r($artista->getNombre());
echo " \n";
$rol = new Rol(1);
print_r($rol->getNombre());
?>