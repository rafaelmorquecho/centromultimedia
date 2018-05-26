<?php
include_once('conexion/conexion.php');
include_once('modelos/Class.Pelicula.php');
//include_once('modelos/Class.Artista.php');
//include_once('modelos/Class.Rol.php');



$pelicula = new Pelicula();
$pelicula->get_pelicula(443);
//print_r($pelicula);
echo " \n";
//print_r($pelicula->getTitulo());
echo " \n";
//$artista = new Artista();
//print_r($artista->getNombre());
//echo " \n";
//$rol = new Rol(1);
//print_r($rol->getNombre());
foreach ($pelicula->getArtista() as $artistas => $artista) {
    if ($artista->getRol()->getNombre()=="actor"){
        $nombreActor[] = $artista->getNombre();
    //print_r($artista->getRol()->getNombre());
    }
}
//print_r($pelicula->getArtista());

$info=array();
$pelicula=new pelicula();
$pelicula->get_pelicula(444);

$info['titulo']=$pelicula->getTitulo();
$info['cartel']=$pelicula->getCartel();
$info['sinopsis']=$pelicula->getSinopsis();
$info['actores']=$nombreActor;



print_r ($info);

?>