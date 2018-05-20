
<?php

if (!empty($_SESSION["usuario"])){
    session_start();
    echo "<pre>" . print_r($_SESSION,true) . "</pre>";
}

