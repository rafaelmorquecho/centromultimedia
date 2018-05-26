<?php

error_reporting(E_ALL);

/**
 * modelo sin t�tulo - class.Rol.php
 *
 * $Id$
 *
 * This file is part of modelo sin t�tulo.
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

/* user defined includes */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB1-includes begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB1-includes end

/* user defined constants */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB1-constants begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BB1-constants end

/**
 * Short description of class Rol
 *
 * @access public
 * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
 */
class Rol
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute id_rol
     *
     * @access private
     * @var int
     */
    private $id_rol = 0;

    /**
     * Short description of attribute nombre
     *
     * @access private
     * @var String
     */
    private $nombre = null;

    // --- OPERATIONS ---

    /**
     * Short description of method __construct
     *
     * @access public
     * @author Rafael Luis Morquecho Elena, <rlmorquecho@ono.com>
     * @return void
     */
    public function __construct($id)
    {
        
            $this->id_rol = $id;
            $this->db=Conectar::conexion();
            $consulta=$this->db->query("SELECT * FROM `rol` WHERE `id_rol` = $this->id_rol ;");
            $consulta->execute();
            $resultado = $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $resultado = $consulta->fetch();
            $this->nombre = $resultado['nombre_rol'];       
        
    }

    public function getNombre()
    {
        return $this->nombre;
    }



    /**
     * Get short description of attribute id_rol
     *
     * @return  int
     */ 
    public function getId_rol()
    {
        return $this->id_rol;
    }

    /**
     * Set short description of attribute id_rol
     *
     * @param  int  $id_rol  Short description of attribute id_rol
     *
     * @return  self
     */ 
    public function setId_rol(int $id_rol)
    {
        $this->id_rol = $id_rol;

        return $this;
    }
 } /* end of class Rol */

?>