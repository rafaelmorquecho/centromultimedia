<?php

class pelicula{
    private $db;
    private $pelicula;
    private $actores;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->pelicula=array();
    }
    public function get_pelicula(){
        $consulta=$this->db->query("SELECT * FROM `pelicula`;");
        $consulta->execute();
        $this->pelicula = $consulta->fetchAll();        
        return $this->pelicula;
    }

    public function get_titulo($id){
        $consulta=$this->db->query("SELECT * FROM `pelicula`WHERE `id_pelicula` =" . $id .  ";");
        $consulta->execute();
        $this->pelicula = $consulta->fetch(PDO::FETCH_ASSOC);        
        return $this->pelicula;
    }
    
    public function get_actores($id){
        $consulta=$this->db->query("SELECT * FROM `artista` WHERE `id_artista` in (SELECT `id_artista` FROM `pelicula_artista_rol` WHERE `id_rol` = 1 and `id_pelicula` =" .$id . ");
");
        $consulta->execute();
        $this->actores = $consulta->fetchAll();        
        return $this->actores;
    }
    
    



}
?>