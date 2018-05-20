<?php


//Llamada al modelo
require_once("modelos/modelo_pelicula.php");


$pelicula=new pelicula();
$carteles=$pelicula->get_pelicula();

//Llamada a la vista

require_once("vistas/pelicula_vista.php");

    

?>