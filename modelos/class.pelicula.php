<?php

error_reporting(E_ALL);

/**
 * modelo sin t�tulo - class.pelicula.php
 *
 * $Id$
 *
 * This file is part of modelo sin t�tulo.
 *
 * Automatically generated on 13.05.2018, 08:19:48 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
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

    // --- OPERATIONS ---

} /* end of class pelicula */

?>