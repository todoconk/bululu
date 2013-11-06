<?php

/**
 * perfilesContactos form base class.
 *
 * @method perfilesContactos getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseperfilesContactosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'perfil_id'        => new sfWidgetFormInputHidden(),
      'tipo_contacto_id' => new sfWidgetFormInputHidden(),
      'valor'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'perfil_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('perfil_id')), 'empty_value' => $this->getObject()->get('perfil_id'), 'required' => false)),
      'tipo_contacto_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tipo_contacto_id')), 'empty_value' => $this->getObject()->get('tipo_contacto_id'), 'required' => false)),
      'valor'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('perfiles_contactos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'perfilesContactos';
  }

}
