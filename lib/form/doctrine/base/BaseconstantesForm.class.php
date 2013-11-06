<?php

/**
 * constantes form base class.
 *
 * @method constantes getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseconstantesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'titulo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormTextarea(),
      'imagen'      => new sfWidgetFormInputText(),
      'activo'      => new sfWidgetFormInputCheckbox(),
      'tipo'        => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'      => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
      'imagen'      => new sfValidatorPass(array('required' => false)),
      'activo'      => new sfValidatorBoolean(array('required' => false)),
      'tipo'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'constantes', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('constantes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'constantes';
  }

}
