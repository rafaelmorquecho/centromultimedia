<?php

error_reporting(E_ALL);
require_once("conexion/conexion.php");

/**
 * modelo sin t�tulo - class.Artista.php
 *
 * $Id$
 *
 * This file is part of modelo sin t�tulo.
 *
 * Automatically generated on 13.05.2018, 11:51:16 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}




/**
 * include Pelicula
 *
 * @author firstname and lastname of author, <author@example.org>
 */
//require_once('class.Pelicula.php');

/**
 * include Rol
 *
 * @author firstname and lastname of author, <author@example.org>
 */
//require_once('class.Rol.php');

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
 * @author firstname and lastname of author, <author@example.org>
 */
class Artista
{


    

    // --- ATTRIBUTES ---

    private $db = null;

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
     * @author firstname and lastname of author, <author@example.org>
     * @return void
     */
    public function __construct($id)
    {
        $this->id_artista = $id;
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("SELECT * FROM `artista` WHERE `id_artista` =" .  $id .";");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $this->nombre = $resultado[0]['nombre'];
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
} /* end of class Artista */



?>