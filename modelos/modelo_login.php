<?php


class usuario{
    private $db;
    private $usuario;
    private $password;
    private $clase;
    private $fecha;
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
        $consulta=$this->db->query("SELECT * FROM `usuario`WHERE `login` ='" . $login . "' and  password = '" .$password .   "';");
        $consulta->execute();
        $this->login = $consulta->rowCount(); 
        return $this->login;
    }

    public function get_login($login, $password){
        //echo "consulta: " . ("SELECT  * FROM `usuario` INNER join `usuario_clase` on (id = id_usuario) INNER join clase USING (id_clase) WHERE `login` ='" . $login . "' and `password` = '" .$password .   "';");
        $consulta=$this->db->query("SELECT  * FROM `usuario` INNER join `usuario_clase` on (id = id_usuario) INNER join clase USING (id_clase) WHERE `login` ='" . $login . "' and `password` = '" .$password .   "';");
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

    public function editar_usuario($id){
        $consulta=$this->db->query("SELECT * FROM `usuario` where `id` = $id;");
        $consulta->execute();
        $this->usuario = $consulta->fetchAll();        
        return $this->usuario;   
    }

    public function update_usuario($id,$nombre,$email,$login,$password,$admin,$usuario){
        $update=$this->db->query("UPDATE `usuario` SET `nombre`='$nombre',`email`='$email',`login`='$login',`password`='$password' WHERE id = $id");
        $delete=$this->db->query("DELETE FROM `usuario_clase` WHERE `id_usuario` = $id;");
        $delete->execute();
        
        if ($admin =='si') {
            $update =$this->db->query("INSERT INTO `usuario_clase`(`id_usuario`, `id_clase`) VALUES ($id,2);"); 
        }
        if ($usuario =='si') {
            $update =$this->db->query("INSERT INTO `usuario_clase`(`id_usuario`, `id_clase`) VALUES ($id,1);"); 
        }
    }

    public function insertar_usuario($nombre,$email,$login,$password,$admin,$usuario){
        $insertar = $this->db->query("INSERT INTO `usuario`(`id`, `nombre`, `email`, `login`, `password`, `fecha_nacimiento`) VALUES ('','$nombre','$email','$login','$password','');");
        $smtp = $this->db->query("SELECT MAX(id) AS id FROM `usuario`");
        $smtp->execute();
        $id = $smtp->fetchAll();
        $id = $id[0]['id'];


        if ($admin =='si') {
            $update =$this->db->query("INSERT INTO `usuario_clase`(`id_usuario`, `id_clase`) VALUES ($id,2);"); 
        }
        if ($usuario =='si') {
            $update =$this->db->query("INSERT INTO `usuario_clase`(`id_usuario`, `id_clase`) VALUES ($id,1);"); 
        }

    print_r($id);
    }
        
        
        
    
    
        
    


    /*$conn->beginTransaction();

        $restar = $conn->prepare($update);
        $restar->execute();

        $insertar = $conn->prepare($sql);
        $insertar->execute();


        $cuenta = $insertar->rowCount();
        $cuenta1 = $restar->rowCount();

        if ($cuenta == 1 && $cuenta1 == 1) {

            $conn->commit();
            
            echo "<div><p> $cuenta registro creado</p>";
        echo "<div><p> $cuenta1 registro modificado</p>";
            echo "<p>commit<p></div>";
        } else {
            $conn->rollBack();
            echo "<div><p>rollBack()</p>";
             echo "><p>no se realizaron cambios</p></div>";
        }


    {"formulario":"nombre=pepe&email=pepe%40correo.com&login=pepe&password=1234&admin=on&usuario=on"}
*/
}
?>