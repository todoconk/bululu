<?php

/**
 * tiposContactos form base class.
 *
 * @method tiposContactos getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasetiposContactosForm extends constantesForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('tipos_contactos[%s]');
  }

  public function getModelName()
  {
    return 'tiposContactos';
  }

}
