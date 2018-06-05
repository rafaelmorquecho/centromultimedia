<?php
require("../conexion/conexion.php");
require_once("../modelos/modelo_login.php");

$datos=array();
$usuario=new usuario();
$id = $_POST['id'];
$datos = $usuario->borrar_usuario($id);

echo json_encode ($datos);
?>