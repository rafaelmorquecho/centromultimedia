<?php
require("../conexion/conexion.php");
require_once("../modelos/modelo_login.php");

$datos=array();
$usuario1=new usuario();

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$login = $_POST["login"];
$password = $_POST["password"];

if (isset($_POST["usuario"])) $usuario = $_POST["usuario"]; else $usuario = 'no';
if (isset($_POST["admin"])) $admin = $_POST["admin"]; else $admin = 'no';

$usuario1->insertar_usuario($nombre,$email,$login,$password,$admin,$usuario);

echo json_encode ($nombre . $email . $login . $password . $admin . $usuario);