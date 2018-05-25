<?php

error_reporting(E_ALL);

/**
 * modelo sin título - class.Artista.php
 *
 * $Id$
 *
 * This file is part of modelo sin título.
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
 * include Pelicula
 *
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
require_once('class.Pelicula.php');

/**
 * include Rol
 *
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
require_once('class.Rol.php');

/* user defined includes */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB0-includes begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB0-includes end

/* user defined constants */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB0-constants begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB0-constants end

/**
 * Short description of class Artista
 *
 * @access public
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
class Artista
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute id_artista
     *
     * @access private
     * @var int
     */
    private $id_artista = 0;

    /**
     * Short description of attribute nombre
     *
     * @access private
     * @var String
     */
    private $nombre = null;

    /**
     * Short description of attribute rol
     *
     * @access private
     * @var Rol
     */
    private $rol = null;

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
        
    }


    /**
     * Get short description of attribute nombre
     *
     * @return  String
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set short description of attribute nombre
     *
     * @param  String  $nombre  Short description of attribute nombre
     *
     * @return  self
     */ 
    public function setNombre(String $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function recuperaArtista($id){
        $this->id_artista = $id;
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("SELECT `id_artista`, `nombre` FROM `artista` WHERE `id_artista` =   $this->id_artista ;");
        $consulta->execute();
        $resultado = $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $consulta->fetch();
        $this->nombre = $resultado['nombre'];
        $this->id_artista = $resultado['id_artista'];

    }

    /**
     * Get short description of attribute rol
     *
     * @return  Rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set short description of attribute rol
     *
     * @param  Rol  $rol  Short description of attribute rol
     *
     * @return  self
     */ 
    public function setRol(Rol $rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get short description of attribute id_artista
     *
     * @return  int
     */ 
    public function getId_artista()
    {
        return $this->id_artista;
    }

    /**
     * Set short description of attribute id_artista
     *
     * @param  int  $id_artista  Short description of attribute id_artista
     *
     * @return  self
     */ 
    public function setId_artista(int $id_artista)
    {
        $this->id_artista = $id_artista;

        return $this;
    }
} /* end of class Artista */

?>