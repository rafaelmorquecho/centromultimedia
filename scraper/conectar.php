<?php
function conectar(){
        $bd_host="bbdd.local.red";
        $bd_usuario="rafa";
	$bd_contrasena="1234";
	$bd_nombre = "centromultimedia";
$conexion=mysqli_connect($bd_host, $bd_usuario, $bd_contrasena, $bd_nombre);
	if(mysqli_connect_errno()){
		echo "Fallo al conectar con la base de datos";
		exit();
		}
	mysqli_set_charset($conexion, "utf8");
    
return $conexion;


}

?>    