<?php


//Llamada al modelo
require_once("modelos/Class.Pelicula.php");


$pelicula=new pelicula();
$carteles=$pelicula->get_carteles();

//Llamada a la vista

require_once("vistas/pelicula_vista.php");

    

?>