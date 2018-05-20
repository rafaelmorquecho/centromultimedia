
<?php

require_once("conexion/conexion.php");

if (isset($_SESSION["usuario"])) {
    $_SESSION['rol']=array();
    require_once("controladores/controlador_pelicula.php");
    echo $_SESSION['usuario'];
} else {
    if (!empty($_POST['login']) && !empty($_POST['password'] )) {
        require_once("modelos/modelo_login.php");
        $login = new usuario();
        $datos_login = $login->get_login( $_POST['login'] , $_POST['password'] );
        if (!empty($datos_login)){
        $sesion = session_start();
        $_SESSION["usuario"] = $_POST['login'];
        $_SESSION['loggedin'] = true;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (24 * 60 * 60);
        $_SESSION['rol']=array();
        foreach ($datos_login as $key => $valor) {
                    $_SESSION['rol'][]=$valor['tipo'];
             }
        require_once("controladores/controlador_pelicula.php");
        }else {
            require_once("vistas/login_vista.php");
            require_once("modelos/modelo_login.php");
    }
    } else {
            require_once("vistas/login_vista.php");
            require_once("modelos/modelo_login.php");
    }
}



?>
