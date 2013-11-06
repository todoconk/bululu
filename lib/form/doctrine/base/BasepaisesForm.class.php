<?php

/**
 * paises form base class.
 *
 * @method paises getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasepaisesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'titulo'     => new sfWidgetFormInputText(),
      'imagen'     => new sfWidgetFormInputText(),
      'iso2'       => new sfWidgetFormInputText(),
      'iso3'       => new sfWidgetFormInputText(),
      'codigo'     => new sfWidgetFormInputText(),
      'cultura'    => new sfWidgetFormInputText(),
      'activo'     => new sfWidgetFormInputCheckbox(),
      'by_admin'   => new sfWidgetFormInputCheckbox(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'     => new sfValidatorPass(array('required' => false)),
      'imagen'     => new sfValidatorPass(array('required' => false)),
      'iso2'       => new sfValidatorPass(array('required' => false)),
      'iso3'       => new sfValidatorPass(array('required' => false)),
      'codigo'     => new sfValidatorInteger(array('required' => false)),
      'cultura'    => new sfValidatorPass(array('required' => false)),
      'activo'     => new sfValidatorBoolean(array('required' => false)),
      'by_admin'   => new sfValidatorBoolean(array('required' => false)),
      'created_by' => new sfValidatorInteger(array('required' => false)),
      'updated_by' => new sfValidatorInteger(array('required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'paises', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('paises[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'paises';
  }

}
