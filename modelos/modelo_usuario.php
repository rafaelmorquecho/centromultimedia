<?php


class usuario{
    private $db;
    private $usuario;
    private $password;
    private $login = array();
    
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    public function usuario(){
        $consulta=$this->db->query("SELECT * FROM `usuario`;");
        $consulta->execute();
        $this->usuario = $consulta->fetchAll();        
        return $this->usuario;
    }

    public function get_usuario2(){
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



}
?>