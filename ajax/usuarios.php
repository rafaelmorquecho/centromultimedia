<?php
require("../conexion/conexion.php");
require_once("../modelos/modelo_login.php");

$permisos=array();
$datos = array();
$usuario=new usuario();
$usuarios = $usuario->get_usuario2();


foreach ($usuarios as $key => $value) {
    $datos[$key] = array ('id' => $value['id'],
                    'nombre' => $value['nombre'],
                    'login' => $value['login'],
                    'email' => $value['email'],
                    'password' => $value['password']);
    $permisos= $usuario->get_clase_usuario($value['id']);
    $datos[$key]['tipo'] = array();
    foreach ($permisos as $permiso => $tipo) {
        $datos[$key]['tipo'][] = $tipo['tipo'];
    }
}

echo json_encode ($datos);
?>