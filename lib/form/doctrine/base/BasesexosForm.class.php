<?php

/**
 * sexos form base class.
 *
 * @method sexos getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesexosForm extends constantesForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('sexos[%s]');
  }

  public function getModelName()
  {
    return 'sexos';
  }

}
