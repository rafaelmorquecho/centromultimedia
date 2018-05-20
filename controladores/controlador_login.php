
<?php
if (!empty($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
    $sesion = session_start();
    require_once("modelos/modelo_pelicula.php");
    require_once("vistas/pelicula_vista.php");
}else{require_once("vistas/login_vista.php");}
    
?>