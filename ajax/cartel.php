<?php
require("../conexion/conexion.php");
require_once("../modelos/modelo_pelicula.php");
$id = $_POST['id'];
$info=array();
$pelicula=new pelicula();


$info['titulo']=$pelicula->get_titulo($id);
$info['actores']=$pelicula->get_actores($id);

echo json_encode ($info);
?>