<?php


class usuario{
    private $db;
    private $usuario;
    private $password;
    private $clase;
    private $cuantas;
    private $login = array();
    
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    public function get_usuario2(){
        $consulta=$this->db->query("SELECT * FROM `usuario`;");
        $consulta->execute();
        $this->usuario = $consulta->fetchAll();        
        return $this->usuario;
    }


    public function get_clase_usuario($id){
        $consulta=$this->db->query("SELECT DISTINCT * FROM  `usuario_clase` INNER join clase USING (id_clase) where id_usuario = ".$id.";");
        $consulta->execute();
        $this->clase = $consulta->fetchAll();        
        return $this->clase;
    }




    public function get_usuario(){
        $consulta=$this->db->query("SELECT DISTINCT * FROM `usuario` INNER join `usuario_clase` on (id = id_usuario) INNER join clase USING (id_clase)") ;
        $consulta->execute();
        $this->usuario = $consulta->fetchAll();        
        return $this->usuario;
    }

    public function get_password($id){
        $consulta=$this->db->query("SELECT * FROM `pelicula`WHERE `id_pelicula` =" . $id .  ";");
        $consulta->execute();
        $this->password = $consulta->fetchAll();        
        return $this->password;
    }
    
    public function get_login2($login, $password){
        $consulta=$this->db->query("SELECT * FROM `usuario`WHERE `login` ='" . $login . "' and  password = " .$password .   ";");
        $consulta->execute();
        $this->login = $consulta->rowCount(); 
        return $this->login;
    }

    public function get_login($login, $password){
        $consulta=$this->db->query("SELECT DISTINCT * FROM `usuario` INNER join `usuario_clase` on (id = id_usuario) INNER join clase USING (id_clase) WHERE `login` ='" . $login . "' and `password` = " .$password .   ";");
        $consulta->execute();
        $this->login = $consulta->fetchAll();
        return $this->login;
    }


    public function borrar_usuario($id){
        $delete=$this->db->query("DELETE FROM `usuario` WHERE `id` = $id");
        $delete->execute();
        $this->cuantas = $delete->rowCount();
        return $this->cuantas;
    }

}
?>