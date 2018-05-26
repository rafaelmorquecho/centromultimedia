<?php
require("../conexion/conexion.php");
require_once("../modelos/class.Pelicula.php");
$id = $_POST['id'];
$info=array();
$pelicula=new pelicula();
$pelicula->get_pelicula($id);
foreach ($pelicula->getArtista() as $artistas => $artista) {
    if ($artista->getRol()->getNombre()=="actor"){
        $nombreActor[] = $artista->getNombre();
    }
}

$info['titulo']=$pelicula->getTitulo();
$info['cartel']=$pelicula->getCartel();
$info['sinopsis']=$pelicula->getSinopsis();
$info['actores']=$nombreActor;

echo json_encode ($info);
?>