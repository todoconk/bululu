<?php

/**
 * catComunidades form base class.
 *
 * @method catComunidades getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasecatComunidadesForm extends constantesForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('cat_comunidades[%s]');
  }

  public function getModelName()
  {
    return 'catComunidades';
  }

}
