<?php

class Conectar{

    public static function conexion(){

        $servername = "bbdd.local.red";
        $username = "rafa";
        $password = "1234";
        $dbname = "centromultimedia";

        try{

            $conexion = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password );
      
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
        echo $e->getMessage();
        }
    
        return $conexion;
    
    }
}
?>