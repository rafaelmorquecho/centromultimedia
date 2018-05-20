<?php
require("../conexion/conexion.php");
require_once("../modelos/modelo_usuario.php");

$datos=array();
$usuario=new usuario();


//$info['titulo']=$pelicula->get_titulo($id);
//$info['actores']=$pelicula->get_actores($id);
$datos = $usuario->get_usuario();

echo json_encode ($datos);
?>