<?php

error_reporting(E_ALL);

/**
 * class.pelicula.php
 *
 * $Id$
 *
 * This file is part of modelo sin t�tulo.
 *0-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-includes begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-includes end

/* user defined constants */
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-constants begin
// section -87--2-46-102--7a37ee39:16358111845:-8000:0000000000000BAE-constants end

/**
 * Short description of class pelicula
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class pelicula
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute titulo
     *
     * @access private
     * @var string
     */
    private $titulo = '';

    /**
     * Short description of attribute a�o
     *
     * @access private
     * @var date
     */
    private $año = null;

    /**
     * Short description of attribute duracion
     *
     * @access private
     * @var int
     */
    private $duracion = 0;

    /**
     * Short description of attribute sipnosis
     *
     * @access private
     * @var string
     */
    private $sipnosis = '';

    /**
     * Short description of attribute rating
     *
     * @access private
     * @var float
     */
    private $rating = 0.0;

    /**
     * Short description of attribute artista
     *
     * @access private
     * @var artista
     */
    private $artista = null;



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
        $consulta=$this->db->query("SELECT * FROM `artista` WHERE `id_artista` =" .  $this->id_artista .";");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $this->nombre = $resultado[0]['nombre'];
    }


    // --- OPERATIONS ---





} /* end of class pelicula */

?>