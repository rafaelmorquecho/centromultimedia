<?php

error_reporting(E_ALL);

/**
 * modelo sin t�tulo - class.Pelicula.php
 *
 * $Id$
 *
 * This file is part of modelo sin t�tulo.
 *
 * Automatically generated on 24.05.2018, 22:02:23 with ArgoUML PHP module 
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
     * Short description of attribute pais
     *
     * @access private
     * @var Pais
     */
    private $pais = null;

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
        $this->id = $id;
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("SELECT * FROM `pelicula` WHERE `id` =" .  $this->id .";");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $this->titulo = $resultado[0]['titulo'];
    }


    
    
} /* end of class Pelicula */

?>