<?php

error_reporting(E_ALL);

/**
 * modelo sin título - class.Pelicula.php
 *
 * $Id$
 *
 * This file is part of modelo sin titulo.
 *
 * Automatically generated on 25.05.2018, 19:37:51 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include Artista
 *
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
require_once('class.Artista.php');

/**
 * include Genero
 *
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
require_once('class.Genero.php');

/**
 * include Pais
 *
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
require_once('class.Pais.php');

/* user defined includes */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-includes begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-includes end

/* user defined constants */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-constants begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-constants end

/**
 * Short description of class Pelicula
 *
 * @access public
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
class Pelicula
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute id_pelicula
     *
     * @access private
     * @var int
     */
    private $id_pelicula = 0;

    /**
     * Short description of attribute titulo
     *
     * @access private
     * @var String
     */
    private $titulo = null;

    /**
     * Short description of attribute año
     *
     * @access private
     * @var Date
     */
    private $año = null;

    /**
     * Short description of attribute sinopsis
     *
     * @access private
     * @var String
     */
    private $sinopsis = null;

    /**
     * Short description of attribute duraccion
     *
     * @access private
     * @var int
     */
    private $duraccion = 0;

    /**
     * Short description of attribute rating
     *
     * @access private
     * @var float
     */
    private $rating = 0.0;

    /**
     * Short description of attribute cartel
     *
     * @access private
     * @var String
     */
    private $cartel = null;

    /**
     * Short description of attribute fichero
     *
     * @access private
     * @var String
     */
    private $fichero = null;

    /**
     * Short description of attribute PEGI
     *
     * @access private
     * @var int
     */
    private $PEGI = 0;

    /**
     * Short description of attribute artista
     *
     * @access private
     * @var Artista
     */
    private $artista = null;

    /**
     * Short description of attribute genero
     *
     * @access private
     * @var Genero
     */
    private $genero = null;

    /**
     * Short description of attribute pais
     *
     * @access private
     * @var Pais.
     */
    private $pais = null;

    // --- OPERATIONS ---

    /**
     * Short description of method __construct
     *
     * @access public
     * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
     * @return void
     */
    public function __construct()
    {
        // section -87--2-46-102-25eb090a:16358816f31:-8000:0000000000000BE3 begin
        $this->db=Conectar::conexion();
        

        }
        


        
        //$this->artista = $resultado2['artista'];
        //$this->pais = $resultado['pais'];
        //$this->fichero = $resultado['fichero'];



        // section -87--2-46-102-25eb090a:16358816f31:-8000:0000000000000BE3 end
    

    


    /**
     * Get short description of attribute id_pelicula
     *
     * @return  int
     */ 
    public function getId_pelicula()
    {
        return $this->id_pelicula;
    }

    /**
     * Set short description of attribute id_pelicula
     *
     * @param  int  $id_pelicula  Short description of attribute id_pelicula
     *
     * @return  self
     */ 
    public function setId_pelicula(int $id_pelicula)
    {
        $this->id_pelicula = $id_pelicula;

        return $this;
    }

    /**
     * Get short description of attribute titulo
     *
     * @return  String
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set short description of attribute titulo
     *
     * @param  String  $titulo  Short description of attribute titulo
     *
     * @return  self
     */ 
    public function setTitulo(String $titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get short description of attribute año
     *
     * @return  Date
     */ 
    public function getAño()
    {
        return $this->año;
    }

    /**
     * Set short description of attribute año
     *
     * @param  Date  $año  Short description of attribute año
     *
     * @return  self
     */ 
    public function setAño(Date $año)
    {
        $this->año = $año;

        return $this;
    }

    /**
     * Get short description of attribute pais
     *
     * @return  Pais.
     */ 
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set short description of attribute pais
     *
     * @param  Pais.  $pais  Short description of attribute pais
     *
     * @return  self
     */ 
    public function setPais(Pais $pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get short description of attribute duraccion
     *
     * @return  int
     */ 
    public function getDuraccion()
    {
        return $this->duraccion;
    }

    /**
     * Set short description of attribute duraccion
     *
     * @param  int  $duraccion  Short description of attribute duraccion
     *
     * @return  self
     */ 
    public function setDuraccion(int $duraccion)
    {
        $this->duraccion = $duraccion;

        return $this;
    }

    /**
     * Get short description of attribute artista
     *
     * @return  Artista
     */ 
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * Set short description of attribute artista
     *
     * @param  Artista  $artista  Short description of attribute artista
     *
     * @return  self
     */ 
    public function setArtista(Artista $artista)
    {
        $this->artista = $artista;

        return $this;
    }

    /**
     * Get short description of attribute rating
     *
     * @return  float
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set short description of attribute rating
     *
     * @param  float  $rating  Short description of attribute rating
     *
     * @return  self
     */ 
    public function setRating(float $rating)
    {
        $this->rating = $rating;

        return $this;
    }

    public  function get_pelicula($id){
        $this->id_pelicula = $id;
        $consulta=$this->db->query("SELECT * FROM `pelicula` WHERE `id_pelicula` = $this->id_pelicula ;");
        $consulta->execute();
        $resultado = $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $consulta->fetch();
        $this->titulo = $resultado['titulo'];
        $this->año = $resultado['año'];
        $this->sinopsis = $resultado['sinopsis'];
        //$this->duraccion = $resultado['duraccion'];
        $this->rating = $resultado['rating'];
        $this->cartel = $resultado['cartel'];
        $this->fichero = $resultado['fichero'];
        //$this->PEGI = $resultado['PEGI'];
        $consulta2=$this->db->query("SELECT id_artista ,id_rol FROM `pelicula_artista_rol` WHERE `id_pelicula` = $this->id_pelicula ;");
        $consulta2->execute();
        $resultado2 = $consulta2->setFetchMode(PDO::FETCH_ASSOC);
        $resultado2 = $consulta2->fetchAll();
        $id_artista = array();
        foreach ($resultado2 as $key => $value) {
            $id_artista[] = $value['id_artista'];
            $consulta3=$this->db->query("SELECT * FROM `artista` WHERE `id_artista` =" .  $value['id_artista'] . ";");
            $consulta3->execute();
            $resultado3 = $consulta3->setFetchMode(PDO::FETCH_ASSOC);
            $resultado3 = $consulta3->fetch();
            $actor = new Artista();
            $actor->setId_artista($value['id_artista']);
            $actor->setNombre($resultado3['nombre']);
            $actor->setRol(new Rol($value['id_rol']));
            $this->artista[] = $actor;
    }

    
}

public function get_carteles(){
    $consulta=$this->db->query("SELECT * FROM `pelicula`;");
    $consulta->execute();
    $this->pelicula = $consulta->fetchAll();        
    return $this->pelicula;
}

    /**
     * Get short description of attribute cartel
     *
     * @return  String
     */ 
    public function getCartel()
    {
        return $this->cartel;
    }

    /**
     * Set short description of attribute cartel
     *
     * @param  String  $cartel  Short description of attribute cartel
     *
     * @return  self
     */ 
    public function setCartel(String $cartel)
    {
        $this->cartel = $cartel;

        return $this;
    }

    /**
     * Get short description of attribute sinopsis
     *
     * @return  String
     */ 
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /**
     * Set short description of attribute sinopsis
     *
     * @param  String  $sinopsis  Short description of attribute sinopsis
     *
     * @return  self
     */ 
    public function setSinopsis(String $sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }
} /* end of class Pelicula */

?>