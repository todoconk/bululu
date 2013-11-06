<?php

/**
 * BasetiposContactos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Doctrine_Collection $perfilesContactos
 * 
 * @method Doctrine_Collection getPerfilesContactos() Returns the current record's "perfilesContactos" collection
 * @method tiposContactos      setPerfilesContactos() Sets the current record's "perfilesContactos" collection
 * 
 * @package    venexter
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasetiposContactos extends constantes
{
    public function setUp()
    {
        parent::setUp();
        $this->hasMany('perfilesContactos', array(
             'local' => 'id',
             'foreign' => 'tipo_contacto_id'));
    }
}