<?php

/**
 * catComunidades filter form base class.
 *
 * @package    venexter
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasecatComunidadesFormFilter extends constantesFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('cat_comunidades_filters[%s]');
  }

  public function getModelName()
  {
    return 'catComunidades';
  }
}
