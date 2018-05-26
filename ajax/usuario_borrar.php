<?php
require("../conexion/conexion.php");
require_once("../modelos/modelo_login.php");

$datos=array();
$usuario=new usuario();


//$info['titulo']=$pelicula->get_titulo($id);
//$info['actores']=$pelicula->get_actores($id);
$id = $_POST['id'];
$datos = $usuario->borrar_usuario($id);

echo json_encode ($datos);
?>