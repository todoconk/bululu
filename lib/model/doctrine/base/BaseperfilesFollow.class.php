<?php

/**
 * BaseperfilesFollow
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $perfil_id
 * @property integer $follow_id
 * @property sfGuardUserBululu $sfGuardUserBululu
 * 
 * @method integer           getPerfilId()          Returns the current record's "perfil_id" value
 * @method integer           getFollowId()          Returns the current record's "follow_id" value
 * @method sfGuardUserBululu getSfGuardUserBululu() Returns the current record's "sfGuardUserBululu" value
 * @method perfilesFollow    setPerfilId()          Sets the current record's "perfil_id" value
 * @method perfilesFollow    setFollowId()          Sets the current record's "follow_id" value
 * @method perfilesFollow    setSfGuardUserBululu() Sets the current record's "sfGuardUserBululu" value
 * 
 * @package    venexter
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseperfilesFollow extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('perfiles_follow');
        $this->hasColumn('perfil_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('follow_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));

        $this->option('type', 'InnoDB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUserBululu', array(
             'local' => 'follow_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));
    }
}