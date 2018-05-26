<?php
require("../conexion/conexion.php");
require_once("../modelos/modelo_login.php");
$id = $_POST['id'];
$permisos=array();
$datos = array();
$usuario=new usuario();
$usuarios = $usuario->editar_usuario($id);
//echo "<pre>" . print_r ($usuarios,true) . "</pre>";


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

//print_r($datos);

}
//echo "<pre>" . print_r ($permisos,true) . "</pre>";
//$datos['usuarios']=$usuarios;

//$datos['permisos']=$permisos;
echo json_encode ($datos);
?>